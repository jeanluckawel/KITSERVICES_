<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class items extends Model
{
    //

    protected $fillable = [
        'po_order', 'date', 'description', 'invoice_number', 'amount', 'payment', 'balance',
    ];
}

