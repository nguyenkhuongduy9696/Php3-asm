<?php

namespace App\Http\Controllers\frontend;

use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RequestContact;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $dataview = [];
        $dataview['cates'] = Category::all();
        if ($request->isMethod('post')) {
            $rules = [
                'name' => 'required',
                'phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/'],
                'email' => 'required|email:filter',
            ];
            $msgE = [
                'name.required' => 'Họ tên người nhận không được để trống!',
                'phone.required' => 'Số điện thoại người nhận không được để trống!',
                'phone.regex' => 'Số điện thoại phải đúng dạng!',
                'email.required' => 'Email không được để trống!',
                'email.email' => 'Email phải đúng dạng!',
            ];
            $validator = Validator::make($request->all(), $rules, $msgE);
            if ($validator->fails()) {
                return redirect('contact')->withErrors($validator)->withInput();
            } else{
                $data=[
                    'name'=>$request->name,
                    'phone'=>$request->phone,
                    'email'=>$request->email,
                ];
                Mail::send([],$data,function($message) use ($data){
                    $message->to($data['email'],$data['name'])
                    ->from('duynkph07116@fpt.edu.vn','Nguyễn Khương Duy')
                    ->SetBody('Nội dung Mail <br> Họ tên người gửi: '.$data['name'].
                                            '<br> Số điện thoại: '.$data['phone'].
                                            '<br> Email: '.$data['email'],'text/html')
                    ->setSubject('Tiêu đề Mail'); 
                });
                return redirect()->route('frontend.contact')->with(['msg'=>'Gửi thông tin thành công!']);
            }
        }
        return view('frontend.contact', $dataview);
    }
}
