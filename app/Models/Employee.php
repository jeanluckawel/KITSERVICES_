<?php

namespace App\Models;

use App\Http\Controllers\ChildController;
use App\Http\Controllers\EmployeeEntrepriseController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Model
{
    //

    use HasFactory;

    protected $fillable = [
        'employee_id', 'first_name', 'last_name', 'middle_name', 'personal_id', 'birth_date',
        'gender', 'marital_status', 'highest_education_level', 'nationality',
        'photo', 'age', 'house_phone', 'mobile_phone', 'email', 'address1', 'address2', 'city',
        'status', 'emergency_full_name',
        'emergency_relationship', 'emergency_mobile_phone', 'emergency_address',
        'emergency_city', 'father_name', 'father_name_status', 'mother_name', 'mother_name_status',
        'spouse_name', 'spouse_phone', 'spouse_birth_date', 'department', 'function', 'niveau',
        'echelon', 'contract_type','taux_horaire_brut', 'situation_avant_embauche','salaire_mensuel_brut',
        'end_contract_date'

    ];

    public function payroll(): HasOne
    {
        return $this->hasOne(Payroll::class, 'employee_id', 'employee_id');
    }
    public function address(): HasOne
    {
        return $this->hasOne(Address::class, 'employee_id', 'employee_id');
    }
    public function family()
    {
        return $this->hasOne(Familly::class, 'employee_id', 'employee_id');
    }

    public function emergency()
    {
        return $this->hasOne(Emergency::class, 'employee_id', 'employee_id');
    }
    public function child()
    {
        return $this->hasMany(Child::class, 'employee_id', 'employee_id');
    }

    public function entreprise()
    {
        return $this->hasOne(EmployeeEntreprise::class, 'employee_id', 'employee_id');
    }

    public function timeSheets()
    {
        return $this->hasMany(TimeSheet::class);
    }

    public function endContract()
    {
        return $this->hasOne(EndContract::class, 'employee_id', 'employee_id');
    }

}
