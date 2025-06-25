<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Familly extends Model
{
    //
    protected $fillable = [
        'employee_id',
        'father_name',
        'father_name_status',
        'mother_name',
        'mother_name_status',
        'married',
        'married_status',
        'status',
    ];


    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }


}
