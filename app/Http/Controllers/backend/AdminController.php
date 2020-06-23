<?php
namespace App\Http\Controllers\backend;

use App\Model\Order;
use App\Model\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller{
    public function index(){
        $dataview=[];
        $dataview['pro']=Product::all()->count();
        $dataview['user']=User::all()->count();
        $dataview['order']=Order::all()->count();
        return view('backend.admin.index',$dataview);
    }
    public function search(Request $request){
        if($request->isMethod('post')){
            $search=$request->txt_search;
            $dataview=[];
            $dataview['search']=$search;
            $dataview['product']=Product::where('product_name','like','%'.$search.'%')->orderBy('created_at','desc')->get();
            Log::notice('Tìm kiếm từ khóa '.$search);
            return view('backend.admin.search-result',$dataview);
        } else{
            $dataview=[];
            return view('backend.admin.search-result',$dataview);
        }
    }
    
}
