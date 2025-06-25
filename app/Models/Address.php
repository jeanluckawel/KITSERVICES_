<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //

    protected $fillable = [
        'employee_id', 'house_phone', 'mobile_phone', 'email', 'address1', 'address2', 'city', 'status'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
