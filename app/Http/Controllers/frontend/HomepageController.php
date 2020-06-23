<?php
namespace App\Http\Controllers\frontend;

use App\Model\Category;
use App\Model\Product;
use Illuminate\Support\Facades\Log;

class HomepageController extends Controller{
    public function index(){
        $dataview=[];
        $cates=Category::all();
        $dataview['cates']=$cates;
        $new_pros=Product::orderBy('created_at','desc')->take(8)->get();
        $dataview['new_pros']=$new_pros;
        $products=Product::orderBy('created_at','desc')->get();
        $dataview['pros']=$products;
        $dataview['cate_count']=0;
        $dataview['pro_count']=0;
        $sold_pros=Product::orderBy('sold_number','desc')->take(4)->get();
        $dataview['sold_pros']=$sold_pros;
        return view('frontend.homepage',$dataview);
    }
    public function log(){
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
