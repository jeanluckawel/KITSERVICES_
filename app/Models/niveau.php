<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class niveau extends Model
{
    //

    protected $fillable = ['name'];

    // Un niveau peut être utilisé dans plusieurs grilles salariales
    public function salaryGrids()
    {
        return $this->hasMany(salary_grid::class);
    }
}
