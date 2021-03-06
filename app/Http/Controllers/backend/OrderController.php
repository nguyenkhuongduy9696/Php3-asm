<?php
namespace App\Http\Controllers\backend;

use App\Model\Order;
use App\Model\Product;
use App\User;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller{
    public function index(){
        $orders=Order::orderBy('created_at','desc')->paginate(4);
        return view('backend.order.list-order',['orders'=>$orders]);
    }
    public function detail(Order $order){
        $dataview['order']=Order::find($order->id);
        $user_id=$dataview['order']->user_id;
        $dataview['user']=User::find($user_id);
        $dataview['order_details']=DB::table('order_detail')->Where('order_id',$order->id)->get();
        $dataview['products']=Product::all();
        return view('backend.order.order-detail',$dataview);
    }
    public function done(Order $order){
        $orders=Order::find($order->id);
        $orders->order_status=2;
        $orders->save();
        return redirect()->route('backend.list-order')->with(['msg' => 'Cập nhật trạng thái đơn hàng thành công!']);
    }
}
