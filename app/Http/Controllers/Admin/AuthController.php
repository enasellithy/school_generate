<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        return view('admin.auth.login');
    }

    public function login_post(LoginRequest $r)
    {
        if(Auth::attempt(['email' => $r->email, 'password' => $r->password])){
            toast('Login Done','success');
            return redirect('/admin');
        }
        elseif(Auth::attempt(['email' => $r->email, 'password' => $r->password,'role' => 'admin'])){
            toast('Login Done','success');
            return redirect('/admin');
        }
        else{
            toast('Login Error','error');
            return redirect('/admin/login');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect(url('admin/login'));
    }
}
