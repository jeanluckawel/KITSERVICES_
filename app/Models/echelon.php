<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class echelon extends Model
{
    //

    protected $fillable = ['name'];

    // Un échelon peut être utilisé dans plusieurs grilles salariales
    public function salaryGrids()
    {
        return $this->hasMany(salary_grid::class);
    }
}
