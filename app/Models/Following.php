<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Following extends Model
{
    use HasFactory;
    public $table = "following";
    protected $fillable = [
        'f_id',
        'BID',
        'follows',
		];
}
