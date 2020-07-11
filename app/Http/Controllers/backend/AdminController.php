<?php

namespace App\Http\Controllers\backend;

use App\Model\Order;
use App\Model\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $dataview = [];
        $dataview['pro'] = Product::all()->count();
        $dataview['user'] = User::all()->count();
        $dataview['order'] = Order::all()->count();
        return view('backend.admin.index', $dataview);
    }
    public function search(Request $request)
    {
        if ($request->isMethod('post')) {
            $rules = [
                'txt_search' => 'required'
            ];
            $msg = [
                'txt_search.required' => 'Nội dung tìm kiếm không được để trống!'
            ];
            $validator = Validator::make($request->all(), $rules, $msg);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $search = $request->txt_search;
                return redirect('admin/search/' . $search);
            }
        } else{
            return redirect()->route('backend.admin');
        }
    }
    public function searchResult($name){
        $dataview=[];
        $dataview['search']=$name;
        $dataview['products'] = Product::where('product_name', 'like', '%' . $name . '%')->orderBy('created_at', 'desc')->paginate(4);
        return view('backend.admin.search-result',$dataview);
    }
}
