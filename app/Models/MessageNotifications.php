<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageNotifications extends Model
{
    
    use HasFactory;
	public $table = "notifications";
    protected $fillable = [
        'nid',
        'title',
        'description',
        'type',
        'notification_value',
       // 'n_date',
		];
}
