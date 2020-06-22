<?php
namespace App\Http\Controllers\backend;

use App\Model\Order;
use App\Model\Product;
use App\User;

class AdminController extends Controller{
    public function index(){
        $dataview=[];
        $dataview['pro']=Product::all()->count();
        $dataview['user']=User::all()->count();
        $dataview['order']=Order::all()->count();
        return view('backend.admin.index',$dataview);
    }
    
}
