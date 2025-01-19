<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // User has been created using tinker
        if ($validator->passes()) {

            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

                $user = Auth::guard('admin')->user();

                if ($user->role == 'admin') {
                    return redirect()->route('admin.dashboard');
                } else {
                    Auth::guard('admin')->logout();
                    $request->session()->flash('error', 'Either your email or password is incorrect');
                    return redirect()->route('admin.login');
                }

            } else {
                $request->session()->flash('error', 'Either your email or password is incorrect');
                return redirect()->route('admin.login');
            }

        } else {
            return back()->withInput($request->only('email'))->withErrors($validator);
        }

    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('admin.login');
    }

}
