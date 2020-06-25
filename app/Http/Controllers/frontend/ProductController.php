<?php

namespace App\Http\Controllers\frontend;

use App\Model\Category;
use App\Model\Comment;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Product $product)
    {
        $dataview = [];
        $dataview['cates'] = Category::all();
        $dataview['pro'] = Product::find($product->id);
        $dataview['comments'] = Comment::where('product_id', $product->id)->get();
        $cate_id = $dataview['pro']->cate_id;
        $pro_id = $dataview['pro']->id;
        $dataview['relate_pro'] = Product::where('cate_id', $cate_id)->where('id', '!=', $pro_id)->take(4)->get();
        return view('frontend.product-detail', $dataview);
    }
    public function addCart(Product $product)
    {
        // Session::flush();   
        if (!session()->has('cart')) {
            Session::put('cart', [$product->id => 1]);
            $msg = "Thêm sản phẩm vào giỏ hàng thành công!";
            return redirect()->back()->with(['msg' => $msg]);
        } else {
            $cat = session()->get('cart');
            if (isset($cat[$product->id])) {
                $cat[$product->id]++;
            } else {
                $cat[$product->id] = 1;
            }
            Session::put('cart', $cat);
            $msg = "Thêm sản phẩm vào giỏ hàng thành công!";
            return redirect()->back()->with(['msg' => $msg]);
        }
    }
    public function saveComment(Request $request)
    {
        $rules = [
            'comment' => 'required'
        ];
        $msgE = [
            'comment.required' => 'Mời bạn nhập nội dung bình luận!'
        ];
        $validator = Validator::make($request->all(), $rules, $msgE);
        if ($validator->fails()) {
            return redirect('products/' . $request->id)->withErrors($validator)->withInput();
        } else {
            $com = new Comment();
            $com->product_id = $request->id;
            $com->user_id = Auth::user()->id;
            $com->detail = $request->comment;
            $com->save();
            return redirect('products/' . $request->id)->with(['msg' => 'Đăng bình luận thành công!']);
        }
    }
}
