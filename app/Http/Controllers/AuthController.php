<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
        $data = $request->except(['_token']);
        $user = Auth::guard('web')->user();

        if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
            toastr()->success('Đăng nhập thành công', 'Thành công');
            return redirect(route('employees.index'));
        } else {
            toastr()->error('Tài khoản hoặc mật khẩu không chính xác', 'Thất bại');
            return back()->withInput();
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        toastr()->success('Đăng xuất thành công', 'Thành công');
        return redirect(route('admin.login'));
    }


    public function userLogin(){
        return view('user.auth.login');
    }

    public function postUserLogin(Request $request){
        $data = $request->except(['_token']);

        if (Auth::guard('web')->attempt(['email' => $data['email'], 'password' => $data['password']])){
            toastr()->success('Đăng nhập thành công', 'Thành công');
            return redirect(route('portal.infomation'));
        }else{
            toastr()->error('Tài khoản hoặc mật khẩu không chính xác', 'Thất bại');
            return back()->withInput();
        }
    }

    public function userLogout(){
        Auth::guard('web')->logout();
        toastr()->success('Đăng xuất thành công', 'Thành công');
        return redirect(route('user.login'));
    }


}
