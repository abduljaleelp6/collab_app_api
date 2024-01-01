<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubActivity extends Model
{
    use HasFactory;
	protected $fillable=[
         'activity_code',
         'main_activity_id',
         'activity_arabic_name',
         'activity_english_name',
         'activity_description',
     ];
}
