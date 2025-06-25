<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emergency extends Model
{
    //
    protected $fillable = ['employee_id', 'title', 'full_name', 'relationship', 'mobile_phone', 'address', 'city', 'status'];
}
