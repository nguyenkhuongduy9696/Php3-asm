<?php
namespace App\Http\Controllers\frontend;

use App\Model\Category;
use App\Model\Product;

class ShopController extends Controller{
    public function index(){
        $dataview=[];
        $dataview['cates']=Category::all();
        $dataview['products']=Product::orderBy('created_at','desc')->paginate(8);
        return view('frontend.shop',$dataview);
    }
    
}
