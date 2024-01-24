<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->simplePaginate(10);
        return view('admin.admin.users.index')->with('users',$users);
    }

    public function searchUser(Request $request)
    {
        $users = DB::select("SELECT * FROM users WHERE email LIKE '" . $request->email . "%' OR name LIKE '" . $request->email . "%'");
        if ($users === []){
            return redirect()->back()->with('success', 'No record has been found with this email');
        }
        return view('admin.admin.users.search')->with('users',$users);
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $users = DB::select("SELECT id,email from users WHERE email LIKE '" . $query . "%'");
        return response()->json($users);
    }

    public function searchEmployees(Request $request)
    {
        $query = $request->get('q');
        $users = DB::select('SELECT *, users.id as id FROM users JOIN company_employee ON users.id = company_employee.employee WHERE company_employee.company=' . auth()->user()->id . " AND users.email LIKE '" . $query . "%'");
        return response()->json($users);
    }

    public function searchAllEmployees(Request $request)
    {
        $query = $request->get('q');
        $users = DB::select("SELECT *, users.id as id FROM users WHERE users.email LIKE ?", [$query . "%"]);
        return response()->json($users);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function addExistingEmployee(Request $request){
        $companyId = $request->companyId;
        $employeeId = $request->employeeId;


        $rowExists = DB::selectOne("SELECT COUNT(*) as count FROM company_employee WHERE company = ? AND employee = ?", [$companyId, $employeeId]);
        if ($rowExists->count > 0){
            return redirect()->back()->with('success', 'This employee is already added by the company');
        }else{
            $currentTimestamp = Carbon::now()->format('Y-m-d H:i:s');
            DB::statement("INSERT INTO company_employee(company, employee, created_at) VALUES($request->companyId, $request->employeeId, '$currentTimestamp')");
            return redirect()->back()->with('success', 'Employee added successfully to the company');
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = DB::select("SELECT *, users.id FROM users LEFT JOIN certificates ON users.id=certificates.user_id WHERE users.id=" . $id);
        $packages = DB::select("SELECT p.id as package_id, p.created_at as created_at,p.course_name as course_name, p.status as status, c.id as certificate_id, c.expiration_date as expiration_date FROM packages as p LEFT JOIN certificates as c ON p.id = c.package_id WHERE p.user_id=" . $id);
        $employees =  DB::select("SELECT *, company_employee.id as relationId FROM users JOIN company_employee ON users.id = company_employee.employee WHERE company_employee.company=" . $id);
        $products = Product::all();
        return view('admin.admin.users.info')->with('user', $user[0])->with('employees',$employees)->with('packages',$packages)->with('products',$products);
    }
    public function showPackages(string $id, Request $request)
    {
        $user = DB::select("SELECT *, users.id FROM users LEFT JOIN certificates ON users.id=certificates.user_id WHERE users.id=" . $id);
        $packages = DB::select("SELECT p.id as package_id, p.created_at as created_at,p.course_name as course_name, p.status as status, c.id as certificate_id, c.expiration_date as expiration_date FROM packages as p LEFT JOIN certificates as c ON p.id = c.package_id WHERE p.user_id=" . $id);
        $page = $request->input('page', 1);
        $size = 20;
        $collectedData = collect($packages);
        $paginationData = new LengthAwarePaginator(
            $collectedData->forPage($page, $size),
            $collectedData->count(),
            $size,
            $page
        );
        $paginationData->setPath('/admin/info/user/packages');
        dd($paginationData);
        return view('admin.admin.users.packInfo')->with('user', $user[0])->with('packages',$paginationData[0]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        return view('admin.admin.users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|max:50',
            'email' => 'required'
        ]);

        $user = User::find($id);
        $user->update([
            'name' =>$request->name,
            'email'=>$request->email
        ]);

        return redirect(route('users.index'))->with('success', 'User has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect(route('users.index'))->with('success', 'User has been removed');
    }
}
