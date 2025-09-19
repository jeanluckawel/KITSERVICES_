<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeSheet extends Model
{
    //

    protected $fillable = [
        'employee_id', 'date', 'start_time', 'end_time', 'hours_worked', 'work_location'
    ];

    // Relation avec Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
