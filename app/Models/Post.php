<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
	public $table = "posts";
    protected $fillable = [
        'p_id',
        'BID',
        'post_text',
        'post_image',
        'post_type',
        'post_status',
		];
}
