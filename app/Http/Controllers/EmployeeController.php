<?php

namespace App\Http\Controllers;

use App\Mail\RegisterEmployeeMail;
use App\Models\CompanyEmployee;
use App\Models\Employee;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use function PHPUnit\Framework\isEmpty;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $employees = DB::select('SELECT *, users.id as id,(SELECT id from certificates WHERE user_id=users.id ORDER BY created_at DESC LIMIT 1) as certificate_id, (SELECT count(*) from packages WHERE user_id=users.id AND status = "purchased") as assigned, company_employee.id as relationId, company_employee.created_at as created_at FROM users JOIN company_employee ON users.id = company_employee.employee WHERE company_employee.company=' . auth()->user()->id . " ORDER BY company_employee.created_at DESC");
        return view('admin.administrator.dashboard')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.administrator.registerEmployee');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $checkEmail = DB::select("SELECT * FROM users WHERE email LIKE '" . $request->email . "'");
        if ($checkEmail === [])
        {
            $request->validate([
                'name'  => 'required|max:50',
                'email' => 'required'
            ]);
            $password = 'User' . rand(10, 9999);
            Mail::to($request->email)->send(new RegisterEmployeeMail($request->email, $password));
            $hashPassword = Hash::make($password, [
                'rounds' => 12,
            ]);
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'phone'    => $request->phone,
                'password' => $hashPassword,
                'unHashedPassword'=>$password,
                'registeredBy'=>auth()->user()->email
            ]);

            CompanyEmployee::create([
                'company'  => auth()->user()->id,
                'employee' => $user->id
            ]);
            return redirect()->back()->with('registered', 'Employee has been created and added to your dashboard');
        }else{
            CompanyEmployee::create([
                'company'  => auth()->user()->id,
                'employee' => $checkEmail[0]->id
            ]);
            return redirect()->back()->with('registered', 'Employee has been added to your dashboard. This account already exists so your employee should login or access the forgot password service');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $user = DB::select("SELECT * FROM users LEFT JOIN certificates ON users.id=certificates.user_id WHERE users.id=" . $id);
        $packages = DB::select("SELECT *,packages.id as package_id,packages.created_at, certificates.id as certificate_id FROM packages LEFT JOIN certificates ON packages.id=certificates.package_id WHERE packages.user_id=" . $id);
        return view('admin.administrator.info')->with('user', $user[0])->with('packages',$packages);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        DB::statement('DELETE FROM company_employee WHERE id='.$id);
        return redirect()->back()->with('success', 'Employer has been deleted successfully');
    }

    public function controller(){
        return view('admin.administrator.controller');
    }

    public function changeSome($id){
        $user = User::find($id);
        $user->update([
            'is_admin' => 0
        ]);

        return redirect(route('home'));
    }
}
