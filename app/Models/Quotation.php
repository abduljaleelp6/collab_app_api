<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    public $table = "quotations";
    public $timestamps = false;
    protected $fillable = [
        'rfq_id',//request for quotation
        'RequestedBID',
        'ReceiverBID',
        'qdate',
        'details',
       // 'quote_status',
    ];
}
