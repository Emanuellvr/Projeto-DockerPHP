<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\StatefulGuard;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm (){
        return view('auth.admin-login');
    }

    public function login(Request $request){
        
        $this->validate($request, [
            'email'     => 'required|email',
            'password'  => 'required|min:6',
        ]);
                

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            
            return redirect()->intended(route('admin.home'));
            
        }
            

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout;

        return redirect('/');
    }
}
