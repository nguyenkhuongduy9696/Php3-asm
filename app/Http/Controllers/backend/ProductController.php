<?php

namespace App\Http\Controllers\backend;

use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::orderBy('created_at', 'desc')->paginate(4);
        return view('backend.products.list-product', ['product' => $product]);
    }
    public function detail($id)
    {
        $product = Product::find($id);
        return view('backend.products.product-detail', ['pro' => $product]);
    }
    public function remove($id)
    {
        if (Product::destroy($id)) {
            return redirect()->route('backend.list-product')->with(['msg' => 'Xóa sản phẩm thành công!']);
        }
        return redirect()->route('backend.list-product')->with(['msg' => 'Xóa sản phẩm không thành công!']);
    }
    public function edit($id)
    {
        $cates = Category::all();
        $product = Product::find($id);
        return view('backend.products.edit-product', ['pro' => $product, 'cates' => $cates]);
    }
    public function saveEdit(Request $request)
    {
        
        $id = $request->id;
        $pro = Product::find($id);
        if (!$pro) {
            header("location: " . asset('admin/products?msg=Sản phẩm không tồn tại!'));
            die;
        }
        $rules = [
            'product_name' => 'required|between:5,30',
            'product_price' => 'required|min:1|numeric',
            'product_sale_price' => 'required|min:1|numeric|lt:product_price',
            'product_detail' => 'required',
            'product_quantity' => 'required|min:1|numeric',
           
        ];
        $msgE = [
            'product_name.required' => 'Tên sản phẩm không được để trống!',
            'product_name.between' => 'Tên sản phẩm từ 5 đến 30 ký tự!',
            
            'product_price.required' => 'Giá sản phẩm không được để trống!',
            'product_price.min' => 'Giá sản phẩm lớn hơn 1!',
            'product_price.numeric' => 'Giá sản phẩm phải là số!',
            'product_sale_price.required' => 'Giá khuyến mãi sản phẩm không được để trống!',
            'product_sale_price.min' => 'Giá khuyến mãi sản phẩm lớn hơn 1!',
            'product_sale_price.numeric' => 'Giá khuyến mãi phải là số!',
            'product_sale_price.lt' => 'Giá khuyến mãi phải nhỏ hơn giá gốc!',
            'product_detail.required' => 'Thông tin sản phẩm không được để trống!',
            'product_quantity.required' => 'Số lượng sản phẩm không được để trống!',
            'product_quantity.min' => 'Số lượng sản phẩm lớn hơn 1!',
            'product_quantity.numeric' => 'Số lượng sản phẩm phải là số!',
        ];
        $validator = Validator::make($request->all(), $rules, $msgE);
        if ($validator->fails()) {
            return redirect('admin/products/edit/'.$id)->withErrors($validator)->withInput();
        } else {
            $pro->product_name = $request->product_name;
            $pro->cate_id = $request->cate_id;
            $pro->product_price = $request->product_price;
            $pro->product_sale_price = $request->product_sale_price;
            $pro->product_detail = $request->product_detail;
            $pro->product_quantity = $request->product_quantity;
            if ($request->hasFile('product_image')) {
                $image = $request->file('product_image');
                $product_image = $image->getClientOriginalName();
                $destination = public_path('/uploads');
                $image->move($destination, $product_image);
                $pro->product_image = $product_image;
            }
            $pro->save();
            return redirect()->route('backend.list-product')->with(['msg'=>'Cập nhật sản phẩm thành công!']);
        }
    }
    public function add()
    {
        $cates = Category::all();
        return view('backend.products.add-product', ['cates' => $cates]);
    }
    public function saveAdd(Request $request)
    {
       
        $rules = [
            'product_name' => 'required|between:5,30|unique:product,product_name',
            'product_price' => 'required|min:1|numeric',
            'product_sale_price' => 'required|min:1|numeric|lt:product_price',
            'product_detail' => 'required',
            'product_quantity' => 'required|min:1|numeric',
            'product_image' => 'required|image',
        ];
        $msgE = [
            'product_name.required' => 'Tên sản phẩm không được để trống!',
            'product_name.between' => 'Tên sản phẩm từ 5 đến 30 ký tự!',
            'product_name.unique' => 'Tên sản phẩm đã tồn tại!',
            'product_price.required' => 'Giá sản phẩm không được để trống!',
            'product_price.min' => 'Giá sản phẩm lớn hơn 1!',
            'product_price.numeric' => 'Giá sản phẩm phải là số!',
            'product_sale_price.required' => 'Giá khuyến mãi sản phẩm không được để trống!',
            'product_sale_price.min' => 'Giá khuyến mãi sản phẩm lớn hơn 1!',
            'product_sale_price.numeric' => 'Giá khuyến mãi phải là số!',
            'product_sale_price.lt' => 'Giá khuyến mãi phải nhỏ hơn giá gốc!',
            'product_detail.required' => 'Thông tin sản phẩm không được để trống!',
            'product_quantity.required' => 'Số lượng sản phẩm không được để trống!',
            'product_quantity.min' => 'Số lượng sản phẩm lớn hơn 1!',
            'product_quantity.numeric' => 'Số lượng sản phẩm phải là số!',
            'product_image.required' => 'Ảnh sản phẩm không được để trống!',
            'product_image.image' => 'Mời chọn đúng file ảnh!',
        ];
        $validator = Validator::make($request->all(), $rules, $msgE);
        if ($validator->fails()) {
            return redirect('admin/products/add')->withErrors($validator)->withInput();
        } else {
            $obj = new Product();
            $obj->product_name = $request->product_name;
            $obj->cate_id = $request->cate_id;
            $obj->product_price = $request->product_price;
            $obj->product_sale_price = $request->product_sale_price;
            $obj->product_detail = $request->product_detail;
            $obj->product_quantity = $request->product_quantity;
            $obj->sold_number = 0;
            if ($request->hasFile('product_image')) {
                $image = $request->file('product_image');
                $product_image = $image->getClientOriginalName();
                $destination = public_path('/uploads');
                $image->move($destination, $product_image);
                $obj->product_image = $product_image;
            }
            $obj->save();
            return redirect()->route('backend.list-product')->with(['msg'=>'Thêm sản phẩm thành công!']);
        }
    }
}
