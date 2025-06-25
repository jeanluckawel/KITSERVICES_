<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    //

    protected $fillable = [
        'company', 'address', 'country', 'id_nat', 'rccm', 'nif',
    ];

    public function invoices()
    {
        return $this->hasMany(invoices::class);
    }
}
