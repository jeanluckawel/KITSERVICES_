<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //

    protected $fillable = [
        'name',
        'id_nat',
        'rccm',
        'nif',
        'province',
        'ville',
        'commune',
        'quartier',
        'avenue',
        'numero',
        'telephone',
        'email'
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }



}
