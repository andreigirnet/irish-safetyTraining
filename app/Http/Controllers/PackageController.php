<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Package;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::latest()->where('user_id',auth()->user()->id)->simplePaginate(10);
        return view('admin.administrator.package')->with('packages', $packages);
    }

    public function share($id)
    {
        $employeesToShare = DB::select('SELECT * FROM users JOIN company_employee ON users.id = company_employee.employee WHERE company_employee.company=' . auth()->user()->id);
        $packageToShare   = DB::select("SELECT * FROM packages WHERE id=".$id);
        return view('admin.administrator.share')->with('packageToShare',$packageToShare)->with('employeesToShare',$employeesToShare);
    }

    public function sharePackage(Request $request, $id)
    {
        DB::statement('INSERT INTO user_package(`sharing_from`, `sharing_to`, `package_id`) VALUES(' . auth()->user()->id . ',' . $request->shareToEmployee . ','.$id.')');
        DB::statement('UPDATE packages SET user_id=' . $request->shareToEmployee . ' WHERE id=' . $id);
        $userShareTo = DB::select('SELECT name FROM users WHERE id=' . $request->shareToEmployee);
        return(redirect(route('package.index')))->with('success', 'The course was sent successfully to your employee/candidate');
    }

    public function getAllPackages(Request $request){
        $packages =  DB::select("SELECT *, packages.user_id as user_id, (SELECT email FROM users WHERE id = user_id) AS userPackageHolder FROM packages ORDER BY created_at DESC");
        $page = $request->input('page', 1);
        $size = 30;
        $collectedData = collect($packages);
        $paginationData = new LengthAwarePaginator(
            $collectedData->forPage($page, $size),
            $collectedData->count(),
            $size,
            $page
        );
        $paginationData->setPath('/admin/packages');
        return view('admin.admin.packages.index')->with('packages', $paginationData);
    }

    public function searchPackage(Request $request){
        $package= DB::select("SELECT *, packages.user_id as user_id, (SELECT email FROM users WHERE id = user_id) AS userPackageHolder FROM packages WHERE packages.id=" . $request->id);
        if ($package === []){
            return redirect()->back()->with('success', 'No record has been found with this id');
        }
        return view('admin.admin.packages.search')->with('package',$package[0]);
    }

    public function changeStatus(Request $request){
        $package = Package::find($request->id);
        $package->update([
           'status' => 'theory'
        ]);
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
    public function store(Request $request)
    {
        for ($i = 0; $i < $request->quantity; $i++) {
            $package = new Package();
            $package->user_id = $request->userId;
            $package->course_name = $request->course;
            $package->status = "purchased";
            $package->save();
        }
        return redirect()->back()->with('success', 'Packages has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $package= Package::find($id);
        $employees = DB::select("SELECT *, company_employee.id as relationId FROM users JOIN company_employee ON users.id = company_employee.employee WHERE company_employee.company=" . $package->user_id);
        return view('admin.admin.packages.edit')->with('package', $package)->with('employees', $employees);
    }

    public function editOwner($id)
    {
        $package= Package::find($id);
        $employees = DB::select("SELECT *, company_employee.id as relationId FROM users JOIN company_employee ON users.id = company_employee.employee WHERE company_employee.company=" . $package->user_id);
        return view('admin.admin.packages.editOwner')->with('package', $package)->with('employees', $employees);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_name' => 'required|max:50',
            'status'      => 'required',
        ]);
        $order = Package::find($id);
        $order->update([
            'course_name'=>$request->course_name,
            'status'     =>$request->status,
        ]);
        return redirect()->back()->with('success','Package has been updated');
    }

    public function updateOwner(Request $request, $id)
    {
        $order = Package::find($id);
        $order->update([
            'user_id'=>$request->user_id,
        ]);
        return redirect(route('packages.admin.index'))->with('success','Owner of the package has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $package = Package::find($id);
        $package->delete();
        return redirect()->back()->with('success', 'Package has been removed');
    }
}
