<?php

namespace App\Http\Controllers\backend;

use App\Model\Comment;
use App\Model\Product;

class CommentController extends Controller
{
    public function index(Product $product)
    {
        $dataview=[];
        $dataview['pro_id']=$product->id;
        $dataview['pro_name']=$product->product_name;
        $dataview['comments']=Comment::where('product_id',$product->id)->orderBy('created_at','desc')->paginate(4);
        return view('backend.comment.list-comment',$dataview);
    }
    public function remove(Product $product,Comment $comment){
        Comment::destroy($comment->id);
        return redirect('admin/comment/product/'.$product->id)->with(['msg' => 'Xóa bình luận thành công!']);
       
    }
    
}
