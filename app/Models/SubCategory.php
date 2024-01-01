<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
	 protected $fillable=[
          'category_id',
          'main_category_id',
          'category_identifier',
          'category_name',
          'category_description',
          'category_arabic_name',
      ];
}
