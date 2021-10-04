<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiImg extends Model
{
    use HasFactory;
    protected $guarded = [];

    #Relationship between Product table
    public function category(){
        return $this->belongsTo(Product::class, 'product_id','id');
    }
}
