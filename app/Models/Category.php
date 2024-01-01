<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use HasFactory;
    protected $fillable = ['category_identifier',
        'category_english_name',
        'category_arabic_name',
        'category_description',
    ];

}
