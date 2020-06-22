<?php
namespace App\Http\Controllers\frontend;

use App\Model\Category;
use App\Model\Order;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller{
    public function index(){
        $dataview['cates']=Category::all();
        $dataview['products'] = Product::all();
        if (session()->has('cart')) {
            $dataview['carts'] = session('cart');
            $dataview['total'] = 0;
            foreach ($dataview['carts'] as $key => $value) {
                foreach ($dataview['products'] as $pro) {
                    if ($key == $pro->id) {
                        $dataview['total'] += $pro->product_sale_price * $value;
                    }
                }
            }
        }
        return view('frontend.checkout',$dataview);
    }
    public function order(Request $request){
        $rules=[
            'name' => 'required',
            'phone' => ['required','regex:/((09|03|07|08|05)+([0-9]{8})\b)/'],
            'address' => 'required',
        ];
        $msgE=[
            'name.required' => 'Họ tên người nhận không được để trống!',
            'phone.required' => 'Số điện thoại người nhận không được để trống!',
            'phone.regex' => 'Số điện thoại phải đúng dạng!',
            'address.required' => 'Địa chỉ người nhận không được để trống!',
        ];
        $validator = Validator::make($request->all(), $rules, $msgE);
        if($validator->fails()){
            return redirect('checkout')->withErrors($validator)->withInput();
        } else{
            $order=new Order();
            $order->user_id=$request->user_id;
            $order->name=$request->name;
            $order->phone=$request->phone;
            $order->address=$request->address;
            $order->total_price=$request->total_price;
            $order->order_status=1;
            $order->save();
            $id=$order->id;
            $data=array();
            $carts=session('cart');
            foreach($carts as $key=>$value){
                $data[]=[
                    'order_id'=>$id,
                    'product_id'=>$key,
                    'quantity'=>$value,
                ];
                $pro=Product::find($key);
                $new_sold=$pro->sold_number+$value;
                $new_qlt=$pro->product_quantity-$value;
                $pro->sold_number=$new_sold;
                $pro->product_quantity=$new_qlt;
                $pro->save();
            }
            DB::table('order_detail')->insert($data);

            session()->forget('cart');
            return redirect()->route('frontend.homepage')->with(['msg'=>'Đặt mua hàng thành công!']);
        }
    }
    
}
