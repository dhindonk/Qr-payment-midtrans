<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'invoice_number',
        'amount',
        'status',
        'qr_code', 
    ];
}
