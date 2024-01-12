<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $userPackageId = DB::select("SELECT id FROM packages WHERE user_id=" . auth()->user()->id . " AND status='purchased' ORDER BY created_at DESC LIMIT 1;");
        $certificateId = DB::select("SELECT id FROM certificates WHERE user_id=" . auth()->user()->id . " ORDER BY created_at DESC LIMIT 1;");
        return view('admin.administrator.home')->with('userPackageId', $userPackageId)->with('certificateId', $certificateId);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    public function storeImage(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/profilePic'), $imageName);
        $user = auth()->user();
        DB::statement("UPDATE users SET profilePic='" .$imageName. "' WHERE id=". $user->id);
        return back();
    }
    public function changePassword(Request $request){}


    /**
     * Display the specified resource.
     */
    public function show(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $user = User::find(Auth::user());
        return view('admin.administrator.profile')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $user = User::find($id);
        $request->validate([
            'newPassword' => 'required|min:8'
        ]);
        $oldPassword = DB::select('SELECT password FROM users WHERE id='.$id);
        if ($request->newPassword === $request->confirmNewPassword){
            if (Hash::check($request->oldPassword, $oldPassword[0]->password)){
                $hashed = Hash::make($request->newPassword, [
                    'rounds' => 12,
                ]);
                $user->update([
                   'password'=>$hashed,
                   'unHashedPassword'=>$request->newPassword
                ]);
                return back()->with('success', 'Password has been updated');
            }else{
                return back()->with('error', 'The old password is wrong');
            }
        }else{
            return back()->with('error', 'The new password is different from the confirm password, please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}
