<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = "products";
    public $timestamps = false;
    protected $fillable = [
        'product_identifier',
        'BID',
        'hs_code',
        'arabic_name',
        'english_name',
        'product_category_id',
        'product_sub_category_id',
        'product_description',
        'product_main_image',
        'product_price',
        'product_status',
    ];

}
