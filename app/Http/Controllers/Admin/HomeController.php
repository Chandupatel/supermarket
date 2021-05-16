<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }


    public function change_password()
    {
        return view('admin.change-password');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function updateProfile(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $user = Admin::findOrFail(Auth::user()->id);
        $user->name =  $request->name;
        $user->email =  $request->email;
        if ($user->save()) {
            return redirect()->route('admin.profile')->with('success', 'Profile Updata Successfully.');
        }else{
            return redirect()->route('admin.profile')->with('error', 'Eror....');
        }
    }

    public function update_password(Request $request)
    {
        $validatedData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ]);

        $user = Admin::findOrFail(Auth::user()->id);
        if ($request->old_password) {
            if (Hash::check($request->old_password, $user->password)) {
                if ($request->new_password == $request->confirm_password) {
                    $input['password'] = Hash::make($request->new_password);
                    $user->update($input);
                    return redirect()->route('admin.change-password')->with('success', 'Password Change Successfully.');
                } else {
                    return redirect()->route('admin.change-password')->with('error', 'Confirm Password Doesnot Match');
                }
            } else {
                return redirect()->route('admin.change-password')->with('error', 'Old Password Does not match');
            }
        }


    }
}
