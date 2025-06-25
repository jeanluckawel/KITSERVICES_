<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    //

    public $fillable = [
        'employee_id', 'basic_usd_salary', 'start_contract_date', 'tax_dependants', 'worked_days', 'baremic_salary', 'accommodation_allowance', 'sick_leave', 'overtime_30', 'overtime_60', 'overtime_100', 'total_earnings', 'inss_5', 'monthly_ipr', 'ipr_rate', 'net', 'net_usd', 'cnss_13', 'inpp_2', 'onem_0_2', 'total_taxes_cdf', 'royalties_10_usd', 'inss_tax_base', 'ipr_tax_base', 'annual_ipr_tax_base', 'tranche_2', 'tranche_3', 'tranche_more_3', 'deduction', 'period', 'exchange_rate',
    ];


    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
