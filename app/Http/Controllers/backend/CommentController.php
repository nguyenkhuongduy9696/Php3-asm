<?php

namespace App\Http\Controllers\backend;

class CommentController extends Controller
{
    public function index($id)
    {
        return view('backend.comment.list-comment',['id'=>$id]);
    }
    public function remove($product,$id){
        header("location: " . asset('admin/comment/product/'.$product.'?msg=Xóa bình luận thành công!'));
        die;
    }
    
}
