<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('backend.auth.login');
        }

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended(route('backend.dashboard'));
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function register(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('backend.auth.register');
        }

        $request->validate(([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required',
            'retype-password' => 'required|same:password',
        ]));

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $adminAccount = new Admin($data);
        $adminAccount->save();

        return $this->login($request);
    }

    public function logout()
    {
        Session::flush();
        Auth::guard('admin')->logout();
        return redirect()->route('backend.login');
    }
}
