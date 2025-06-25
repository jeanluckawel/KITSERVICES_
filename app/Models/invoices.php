<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class invoices extends Model
{
    //

    protected $fillable = [
        'client_id', 'po_order', 'date', 'description', 'amount', 'payment', 'balance',
    ];




    public function client()
    {
        return $this->belongsTo(clients::class);
    }
}
