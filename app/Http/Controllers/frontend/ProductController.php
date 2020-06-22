<?php

namespace App\Http\Controllers\frontend;

use App\Model\Category;
use App\Model\Product;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index($id)
    {
        $dataview = [];
        $dataview['cates'] = Category::all();
        $dataview['pro'] = Product::find($id);
        $cate_id = $dataview['pro']->cate_id;
        $pro_id = $dataview['pro']->id;
        $dataview['relate_pro'] = Product::where('cate_id', $cate_id)->where('id', '!=', $pro_id)->take(4)->get();
        return view('frontend.product-detail', $dataview);
    }
    public function addCart($id)
    {
        // Session::flush();   
        if (!session()->has('cart')) {
            Session::put('cart', [$id => 1]);
            $msg = "Thêm sản phẩm vào giỏ hàng thành công!";
            return redirect()->back()->with(['msg' => $msg]);
        } else {
            $cat = session()->get('cart');
            if (isset($cat[$id])) {
                $cat[$id]++;
            } else {
                $cat[$id] = 1;
            }
            Session::put('cart', $cat);
            $msg = "Thêm sản phẩm vào giỏ hàng thành công!";
            return redirect()->back()->with(['msg' => $msg]);
        }
    }
}
