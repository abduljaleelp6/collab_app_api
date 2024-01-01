<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    
    use HasFactory;
	public $table = "advertisement";
    protected $fillable = [
        'ad_id',
        'BID',
        'ad_title',
        'ad_text',
        'ad_image',
        'ad_type',
        'ad_status',
		];
}
