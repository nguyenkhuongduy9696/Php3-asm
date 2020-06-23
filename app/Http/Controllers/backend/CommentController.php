<?php

namespace App\Http\Controllers\backend;

use App\Model\Comment;

class CommentController extends Controller
{
    public function index($id)
    {
        $dataview=[];
        $dataview['pro_id']=$id;
        $dataview['comments']=Comment::where('product_id',$id)->orderBy('created_at','desc')->paginate(4);
        return view('backend.comment.list-comment',$dataview);
    }
    public function remove($product,$id){
        if(Comment::destroy($id)){
            return redirect('admin/comment/product/'.$product)->with(['msg' => 'Xóa bình luận thành công!']);
        }
        return redirect('admin/comment/product/'.$product)->with(['msg' => 'Xóa bình luận không thành công!']);
    }
    
}
