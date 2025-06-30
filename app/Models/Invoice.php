<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //

    protected $fillable = ['po','customer_id', 'description', 'unite', 'quantity', 'pu', 'pt_mois'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
