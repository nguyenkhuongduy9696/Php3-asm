<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function Login(Request $request)
    {
        if(Auth::check()){
            return redirect()->route('backend.admin');
        }
        $dataview = ['errs' => []];
        if ($request->isMethod('post')) {
            $rules = [
                'username' => 'required',
                'pass' => 'required',
            ];
            $msgE = [
                'username.required' => 'Tên tài khoản không được để trống!',
                'pass.required' => 'Mật khẩu không được để trống!',
            ];
            $validator = Validator::make($request->all(), $rules, $msgE);
            if ($validator->fails()) {
                $dataview['errs'] = $validator->errors()->toArray();
            } else {
                $data_login = [
                    'username' => $request->username,
                    'password' => $request->pass
                ];
                if (Auth::attempt($data_login)) {
                    // $msg = "Đăng nhập thành công!";
                    return redirect()->route('frontend.homepage')->with(['msg'=>'Đăng nhập thành công!']);
                } else {
                    $dataview['errs'][] = 'Sai tên đăng nhập hoặc mật khẩu';
                }
            }
        }
        return view('Auth.Login', $dataview);
    }
    public function Logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('Auth.login');
    }
}
