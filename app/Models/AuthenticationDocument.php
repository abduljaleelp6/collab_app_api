<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthenticationDocument extends Model
{
use HasFactory;
    public $table = "authentication_docs";
    protected $fillable = ['BID','business_uni_id', 'image_url', 'image2_url', 'expiry_date'];

}
