<?php

namespace App\Http\Controllers\frontend;

use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class HomepageController extends Controller
{
    public function index()
    {
        $dataview = [];
        $cates = Category::all();
        $dataview['cates'] = $cates;
        $new_pros = Product::orderBy('created_at', 'desc')->take(8)->get();
        $dataview['new_pros'] = $new_pros;
        $products = Product::orderBy('created_at', 'desc')->get();
        $dataview['pros'] = $products;
        $dataview['cate_count'] = 0;
        $dataview['pro_count'] = 0;
        $sold_pros = Product::orderBy('sold_number', 'desc')->take(4)->get();
        $dataview['sold_pros'] = $sold_pros;
        return view('frontend.homepage', $dataview);
    }
    public function search(Request $request)
    {
        if ($request->isMethod('post')) {
            $rules = [
                'search' => 'required'
            ];
            $msg = [
                'search.required' => 'Nội dung tìm kiếm không được để trống!'
            ];
            $validator = Validator::make($request->all(), $rules, $msg);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $search = $request->search;
                return redirect('search/' . $search);
            }
        } else{
            return redirect()->route('frontend.homepage');
        }
    }
    public function searchResult($name)
    {
        $dataview = [];
        $cates = Category::all();
        $dataview['cates'] = $cates;
        $dataview['search'] = $name;
        $dataview['products'] = Product::where('product_name', 'like', '%' . $name . '%')->orderBy('created_at', 'desc')->paginate(8);
        return view('frontend.search', $dataview);
    }
    public function log()
    {
        $message = 'Test chuc nang log: ';


        Log::emergency($message);

        Log::alert($message);

        Log::critical($message);

        Log::error($message);

        Log::warning($message);

        Log::notice($message);

        Log::info($message);

        Log::debug($message);
    }
}
