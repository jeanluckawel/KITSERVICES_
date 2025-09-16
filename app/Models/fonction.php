<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fonction extends Model
{
    //

    protected $table = 'fonctions'; // préciser le nom de la table
    protected $fillable = ['name', 'department_id'];

    // Une fonction appartient à un département
    public function department()
    {
        return $this->belongsTo(department::class);
    }

    // Une fonction peut être utilisée dans plusieurs grilles salariales
    public function salaryGrids()
    {
        return $this->hasMany(salary_grid::class, 'function_id');
    }
}
