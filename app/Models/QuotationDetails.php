<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationDetails extends Model
{
    use HasFactory;
    public $table = "quotation_details";
    public $timestamps = false;
    protected $fillable = [
        'qt_id',
        'rfq_id',//request for quotation
        'pid',
        'quantity',
        'rate'
    ];
}
