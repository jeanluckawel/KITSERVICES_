<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class echelon extends Model
{
    //

    protected $fillable = ['name', 'niveau_id'];

    public function salaryGrids()
    {
        return $this->hasMany(salary_grid::class);
    }

    public function niveau()
    {
        return $this->belongsTo(niveau::class);
    }
}
