<?php
namespace App\Http\Controllers\backend;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller{
    public function index(){
        $users = User::orderBy('created_at','desc')->paginate(3);
        return view('backend.user.list-user',['users'=>$users]);
    }
    public function detail($id){
        $user=User::find($id);
        return view('backend.user.user-detail',['user'=>$user]);
    }
    public function edit($id){
        return view('backend.user.edit-user',['id'=>$id]);
    }
    public function saveEdit(){
        header("location: " . asset('admin/user?msg=Cập nhật thành viên thành công!'));
        die;
    }
    public function remove($id){
        header("location: " . asset('admin/user?msg=Xóa thành viên thành công!'));
        die;
    }
    public function signup(){
        return view('backend.user.signup');
    }
    public function saveUser(Request $request){
        $rules=[
            'email'=>'required|email:filter',
            'username'=>'required|unique:user,username|regex:/^[0-9a-zA-Z]{5,30}$/',
            'pass'=>'required',
            'repass'=>'same:pass',
            'avatar'=>'required|image',
        ];
        $msgE=[
            'email.required'=>'Email không được để trống!',
            'email.email'=>'Email phải đúng dạng!',
            'username.required'=>'Tên đăng nhập không được để trống!',
            'username.regex'=>'Tên đăng nhập từ 5 đến 30 ký tự!',
            'username.unique'=>'Tên đăng nhập đã tồn tại!',
            'pass.required'=>'Mật khẩu không được để trống!',
            'repass.same'=>'Mật khẩu nhập lại không chính xác!',
            'avatar.required' => 'Ảnh đại diện không được để trống!',
            'avatar.image' => 'Mời chọn đúng file ảnh!',
        ];
        $validator=Validator::make($request->all(),$rules,$msgE);
        if($validator->fails()){
            return redirect('signup')->withErrors($validator)->withInput();
        } else{
            $obj=new User();
            $obj->email=$request->email;
            $obj->username=$request->username;
            $obj->pass=Hash::make($request->repass);
            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $avatar = $image->getClientOriginalName();
                $destination = public_path('/uploads');
                $image->move($destination, $avatar);
                $obj->avatar = $avatar;
            }
            $obj->save();
            $msg="Đăng ký thành viên thành công! Giờ bạn có thể đăng nhập";
            return redirect()->route('Auth.login')->with(['msg'=>$msg]);
        }
    }
}
