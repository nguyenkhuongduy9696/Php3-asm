<?php

namespace App\Http\Controllers\backend;

use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    public function index()
    {
        $obj = Category::orderBy('created_at','desc')->paginate(4);
        return view('backend.category.list-category', ['obj' => $obj]);
    }
    public function add()
    {
        return view('backend.category.add-category');
    }
    public function saveAdd(Request $request)
    {
        $rules = [
            'cate_name' => 'required|unique:category,cate_name'
        ];
        $msgE = [
            'cate_name.required' => 'Tên danh mục không được để trống!',
            'cate_name.unique' => 'Tên danh mục đã tồn tại!'
        ];
        $validator = Validator::make($request->all(), $rules, $msgE);
        if ($validator->fails()) {
            return redirect()->route('backend.add-category')->withErrors($validator)->withInput();
        } else {
            $obj = new Category();
            $obj->cate_name = $request->cate_name;
            $obj->save();
            return redirect()->route('backend.list-category')->with(['msg'=>'Thêm danh mục thành công!']);
        }
    }
    public function remove(Category $category)
    {
            Product::where('cate_id',$category->id)->update(['cate_id'=>29]);
            Category::destroy($category->id);
            Log::notice('Quản trị viên '.Auth::user()->username.' đã xóa danh mục có id là '.$category->id);
            return redirect()->route('backend.list-category')->with(['msg'=>'Xóa danh mục thành công!']);
       
    }
    public function edit(Category $category)
    {
        $obj = Category::find($category->id);
        return view('backend.category.edit-category', ['obj' => $obj]);
    }
    public function saveEdit(Request $request)
    {
        $dataview = [];
        $rules = [
            'cate_name' => 'required|unique:category,cate_name,'.$request->id,
        ];
        $msgE = [
            'cate_name.required' => 'Tên danh mục không được để trống!',
            'cate_name.unique' => 'Tên danh mục đã tồn tại!'
        ];
        $validator = Validator::make($request->all(), $rules, $msgE);
        if ($validator->fails()) {
            return redirect('admin/category/edit/'.$request->id)->withErrors($validator)->withInput();
        } else {
            $id = $request->id;
            $obj = Category::find($id);
            $obj->cate_name = $request->cate_name;
            $obj->save();
            $dataview['msg'] = "Cập nhật danh mục thành công";
            return redirect()->route('backend.list-category')->with(['msg'=>'Cập nhật danh mục thành công!']);
        }
        
    }
}
