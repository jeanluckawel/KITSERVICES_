<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //

    use HasFactory;

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
