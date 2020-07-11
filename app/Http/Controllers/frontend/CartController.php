<?php

namespace App\Http\Controllers\frontend;

use App\Model\Category;
use App\Model\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $dataview = [];
        $dataview['cates'] = Category::all();
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
        return view('frontend.cart', $dataview);
    }
    public function downCart($id)
    {
        if (session()->has('cart')) {
            $cat = session()->get('cart');
            if (isset($cat[$id])) {
                $cat[$id]--;
                if ($cat[$id] == 0) {
                    unset($cat[$id]);
                    Session::put('cart', $cat);
                    return redirect()->back();
                } else {
                    Session::put('cart', $cat);
                    return redirect()->back();
                }
            }
        }
    }
    
    public function upCart($id)
    {
        if (session()->has('cart')) {
            $pro=Product::find($id);
            $qlt=$pro->product_quantity;
            $cat = session()->get('cart');
            if (isset($cat[$id])) {
                $cat[$id]++;
                if($cat[$id]>$qlt){
                    $cat[$id]=$qlt;
                };
                Session::put('cart', $cat);
                return redirect()->back();
            }
        }
    }
    public function delCart($id)
    {
        if (session()->has('cart')) {
            $cat = session()->get('cart');
            if (isset($cat[$id])) {
                unset($cat[$id]);
                Session::put('cart', $cat);
                return redirect()->back();
            }
        }
    }
}
