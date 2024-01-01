<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class QuestUsers extends Model
{
    use HasFactory;
    use HasFactory;
	public $table = "quest_users";
    protected $fillable = [
        'guest_id',
        'GID',
        'guest_name',
        'guest_email',
        'guest_phone',
        'guest_otp',
        'guest_status',
		];
}
