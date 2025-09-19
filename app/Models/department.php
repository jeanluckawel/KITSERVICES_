<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    //

    protected $fillable = ['name'];

    // Un département a plusieurs fonctions
    public function functions()
    {
        return $this->hasMany(fonction::class); // on va utiliser FunctionJob car "Function" est réservé en PHP
    }

    // Un département a plusieurs grilles salariales
    public function salaryGrids()
    {
        return $this->hasMany(salary_grid::class);
    }
}
