<?php

namespace App\Http\Controllers;

use App\Mail\CertificateMail;
use App\Mail\RegisterEmployeeMail;
use App\Models\Certificate;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificates = DB::table('certificates')
            ->select('certificates.id as certificateId', 'certificates.*', 'certificates.created_at as valid_from', 'packages.*')
            ->join('packages', 'certificates.package_id', '=', 'packages.id')
            ->where('certificates.user_id', auth()->user()->id)
            ->orderBy('valid_from', 'DESC')
            ->paginate(10);
        return view('admin.administrator.certificate')->with('certificates', $certificates);
    }

    public function getAllCertificates(Request $request){
        $certificates = DB::select("SELECT *, certificates.user_id as user_id, (SELECT email FROM users WHERE id=user_id) as email, (SELECT name FROM users WHERE id=user_id) as holderName FROM certificates ORDER BY created_at DESC");
        $page = $request->input('page', 1);
        $size = 30;
        $collectedData = collect($certificates);
        $paginationData = new LengthAwarePaginator(
            $collectedData->forPage($page, $size),
            $collectedData->count(),
            $size,
            $page
        );
        $paginationData->setPath('/admin/certificates');
        return view('admin.admin.certificates.index')->with('certificates',$paginationData);
    }

    public function getAllCertificatesTrainer(Request $request){
        $certificates = DB::table('certificates')
            ->select(
                'certificates.*',
                'certificates.user_id as user_id',
                DB::raw('(SELECT email FROM users WHERE id = certificates.user_id) as email'),
                DB::raw('(SELECT name FROM users WHERE id = certificates.user_id) as holderName')
            )
            ->join('packages', 'certificates.package_id', '=', 'packages.id')
            ->whereIn('packages.product_id', [2, 3, 4, 5, 6, 11, 12])
            ->orderBy('certificates.created_at', 'DESC')
            ->get();
        $page = $request->input('page', 1);
        $size = 30;
        $collectedData = collect($certificates);
        $paginationData = new LengthAwarePaginator(
            $collectedData->forPage($page, $size),
            $collectedData->count(),
            $size,
            $page
        );
        $paginationData->setPath('/trainer/certificates');
        return view('admin.trainer.certificates.index')->with('certificates',$paginationData);
    }

    public function searchCertificate(Request $request){
        $certificates = DB::table('certificates')
            ->select(
                'certificates.*',
                'certificates.user_id as user_id',
                DB::raw('(SELECT email FROM users WHERE id = certificates.user_id) as email'),
                DB::raw('(SELECT name FROM users WHERE id = certificates.user_id) as holderName')
            )
            ->join('packages', 'certificates.package_id', '=', 'packages.id')
            ->where('certificates.unique_id', 'LIKE', $request->unique_id . '%')
            ->whereIn('packages.product_id', [2, 3, 4, 5, 6, 11, 12])
            ->get();
        if ($certificates->isEmpty()){
            return redirect()->back()->with('success', 'No record has been found with this id');
        }
        return view('admin.trainer.certificates.search')->with('certificates',$certificates);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request, $packageId)
    {
        $uniqueCertificateId = 'CERT' . rand(10000, 1000000);
        $now = new \DateTime();
        $now->add(new \DateInterval('P3Y'));
        $date_three_years_ahead = $now->format('Y-m-d');


        $certificateCreated = Certificate::create([
            'user_id'         => $request->userId,
            'package_id'      => $packageId,
            'unique_id'       => $uniqueCertificateId,
            'expiration_date' => $date_three_years_ahead
        ]);
        $holder = User::find($request->userId);
        $certificateUrl = env('APP_URL') .'/certificate/' . $certificateCreated->id;

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->setPaper('letter', 'landscape');
        $certificate = DB::select("SELECT *, certificates.created_at as valid_from FROM certificates JOIN packages ON certificates.package_id = packages.id WHERE certificates.id =" . $certificateCreated->id);
        $package     = Package::find($certificate[0]->package_id);
        $image       = $package->product_id;
        $dompdf->loadHtml(view('admin.administrator.certificateAttach', compact('certificate', 'holder','image'))->render());
        $dompdf->render();
        $output = $dompdf->output();
        $pdfFilePath = tempnam(sys_get_temp_dir(), 'pdf_');
        file_put_contents($pdfFilePath, $output);

        // Attach the PDF file to the email
        Mail::to($holder->email)->send(new CertificateMail($certificateUrl, $pdfFilePath));

        // Delete the temporary PDF file
        unlink($pdfFilePath);

        $packageToUpdate = Package::find($packageId);
        $packageToUpdate->update([
            'certificate_id' => $certificateCreated->id
        ]);
        if ($request->productId === 1) {
            return redirect()->back()->with('success', 'Certificate Generated');
        } else {
            return redirect()->route('certificate.index')->with('success', 'Certificate Generated');
        }
    }

    //Downloand certificate
    public function certificateDownload($id)
    {
        $certificate = DB::select("SELECT *, certificates.created_at as valid_from FROM certificates JOIN packages ON certificates.package_id = packages.id WHERE certificates.id =" . $id);

        $holder      = User::find($certificate[0]->user_id);

        $package     = Package::find($certificate[0]->package_id);

        $image       = $package->product_id;

        $data        = ['certificate' => $certificate, 'holder' => $holder, 'image' => $image];

        $pdf         = Pdf::loadView('admin.administrator.generateCertificate', $data);

        $pdf->setPaper('a4', 'landscape');

        return $pdf->download('certificate.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certificate $certificate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $certificate = Certificate::find($id);
        $certificate->delete();
        return redirect()->back()->with('success', 'Certificate has been removed');
    }
}
