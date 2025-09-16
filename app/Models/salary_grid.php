<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class salary_grid extends Model
{
    //

    protected $fillable = [
        'department_id',
        'function_id',
        'niveau_id',
        'echelon_id',
        'base_salary',
    ];

    // Relations
    public function department()
    {
        return $this->belongsTo(department::class);
    }

    public function fonction()
    {
        return $this->belongsTo(fonction::class, 'function_id');
    }

    public function niveau()
    {
        return $this->belongsTo(niveau::class);
    }

    public function echelon()
    {
        return $this->belongsTo(echelon::class);
    }
}
