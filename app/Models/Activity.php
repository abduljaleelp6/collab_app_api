<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
	use HasFactory;
    public $table = "activities";

    protected $fillable = [
        'activity_name',
        'activity_code',
        'activity_description',
        'licence_type',
    ];
}
