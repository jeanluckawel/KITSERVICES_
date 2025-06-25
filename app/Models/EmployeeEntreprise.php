<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeEntreprise extends Model
{
    //

    protected $fillable = [
        'employee_id', 'function', 'job_title', 'department', 'niveau', 'echelon', 'salaire_mesuel_brut', 'salaire_horaire', 'taux_horaire_brut_fc', 'type_contract', 'situation_avant_debauche', 'status',
    ];
}
