<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportPost extends Model
{
    use HasFactory;
    public $table = "post_reports";
    protected $fillable = [
        'rid',
        'post_id',
        'poster_bid',
        'reporter_bid',
        'comments',
      
		];
}
