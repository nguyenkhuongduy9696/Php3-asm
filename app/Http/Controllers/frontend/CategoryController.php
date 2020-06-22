<?php
namespace App\Http\Controllers\frontend;

use App\Model\Category;
use App\Model\Product;

class CategoryController extends Controller{
    public function index($id){
        $dataview=[];
        $dataview['cates']=Category::all();
        $dataview['cate']=Category::find($id);
        $dataview['products']=Product::where('cate_id',$dataview['cate']->id)->orderBy('created_at','desc')->paginate(8);
        return view('frontend.category',$dataview);
    }
    
}

