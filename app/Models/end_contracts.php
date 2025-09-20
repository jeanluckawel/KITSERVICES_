<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class end_contracts extends Model
{
    protected $fillable = [
        'employee_id',
        'end_date',
        'reason',
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }
}
