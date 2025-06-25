<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class purchase_orders extends Model
{
    //

    protected $fillable = [
        'customer_id', 'po_number', 'date', 'description', 'location', 'additional_notes', 'invoice_number', 'amount', 'amount_paid', 'balance', 'status',
    ];

    public function customer()
    {
        return $this->belongsTo(customers::class);
    }
}
