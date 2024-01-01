<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;
	public $table = "product_images";
    protected $fillable = [
        'product_identifier',
        'product_image_identifier',
        'product_identifier',
        'image_path'
    ];
}
