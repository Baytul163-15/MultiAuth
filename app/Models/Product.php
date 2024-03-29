<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    #Relationship between Category and brand to product table
    public function category(){
        return $this->belongsTo(Category::class, 'category_id','id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id','id');
    }

    // protected $fillable = [
    //     'brand_id',
    //     'category_id',
    //     'subcategory_id',
    //     'subsubcategory_id',
    //     'product_name_en',
    //     'product_name_hin',
    //     'product_slug_en',
    //     'product_slug_hin',
    //     'product_code',
    //     'product_qty',
    //     'product_tags_en',
    //     'product_tags_hin',
    //     'product_size_en',
    //     'product_size_hin',
    //     'product_color_en',
    //     'product_color_hin',
    //     'selling_price',
    //     'discount_price',
    //     'short_descp_en',
    //     'short_descp_hin',
    //     'long_descp_en',
    //     'long_descp_hin',
    //     'product_thambnail',
    //     'hot_deals',
    //     'featured',
    //     'special_offer',
    //     'special_deals',
    //     'status',
    // ];
}
