<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='product';
    protected $fillable=['product_name','product_image','product_price','product_sale_price',
        'product_detail','product_quantity','sold_number','cate_id','created_at','updated_at'];
    public function getCate(){
        return Category::find($this->cate_id);
    }
}
