<?php

namespace App\Http\Controllers;

use App\Mail\PayrollPdfMail;
use App\Models\Employee;
use App\Models\Payroll;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 *
 */
class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $employees = Employee::all();
        return view('payroll.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function oneEmployee($employeeId)
    {
        $employees = Employee::where('employee_id', $employeeId)->firstOrFail();

        return view('payroll.oneEmployee', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $employee_id)
    {
        $employee = Employee::where('employee_id', $employee_id)->firstOrFail();

        $request->validate([
            'worked_days' => 'required|integer',
            'exchange_rate' => 'required|numeric',
            'sick_days' => 'integer',
            'overtime_hours' => 'integer',
        ]);

        // 1. Récupération des données
        $basic_usd_salary = $employee->salaire_mensuel_brut;

        $worked_days = $request->worked_days;
        $exchange_rate = $request->exchange_rate;
        $dependants = $request->tax_dependants;
        $period = (int)$request->period;

//      - Calcul Baremic salary
        $baremic_salary = $basic_usd_salary * $exchange_rate / 22 * $worked_days;

//      - Sick Days
        $sick_days = $request->sick_days;
        $sick_leave = round((((($basic_usd_salary * $exchange_rate) * 2) / 3) / 22) * $sick_days, 2);

//      - Calcul Logement
        $accomodation_allowance = round(($baremic_salary + $sick_leave) * 0.3);

//      - Overtime 30% et 60%
        $overtime_hours = (int) $request->overtime_hours;

        if ($overtime_hours <= 6) {
            $overtime_30_usd = round($basic_usd_salary * $exchange_rate / 22 / 9 * $overtime_hours * 1.3, 2);
            $overtime_60_usd = 0;
        } else {
            $overtime_30_usd = round($basic_usd_salary * $exchange_rate / 22 / 9 * 6 * 1.3, 2);
            $overtime_60_usd = round($basic_usd_salary * $exchange_rate / 22 / 9 * ($overtime_hours - 6) * 1.6, 2);
        }

//      - Total earnings
        $total_earnings_usd = $baremic_salary + $sick_leave + $accomodation_allowance + $overtime_30_usd + $overtime_60_usd;

//      - INSS 5 %
        $inss_5 = round(($total_earnings_usd - $accomodation_allowance) * 0.05, 2);


        $advantage_1 = $accomodation_allowance;
        $advantage_2 = 0;
        $advantage_3 = 0;

        $total_advantages = $advantage_1 + $advantage_2 + $advantage_3;

        if ($total_earnings_usd > 0) {
            $advantages_ratio = $total_advantages / $total_earnings_usd;

            if ($advantages_ratio < 0.3) {
                $monthly_ipr = ($total_advantages - $inss_5) / 12;
            } else {
                $monthly_ipr = (($total_earnings_usd * 0.3) - $inss_5) / 12;
            }
        } else {
            $monthly_ipr = 0;
        }

        $monthly_ipr = round($monthly_ipr, 2);


//        ipr rate %

        $inss_tax_base = $total_earnings_usd - $accomodation_allowance  ;

        $ipr_tax_base = $inss_tax_base -  $inss_5;

        $annual_ipr_tax_base = $ipr_tax_base * 12;


        // Calcul du taux IPR en %
        if ($total_earnings_usd > 0) {
            $ipr_rate = round(($monthly_ipr / $ipr_tax_base) * 100, 2);
        } else {
            $ipr_rate = 0;
        }

//        dd([
//            'Employee' => $employee->employee_id,
//            'Exchange rate' => $exchange_rate,
//            'Worked days' => $worked_days,
//            'Basic USD Salary' => $basic_usd_salary,
//            'Baremic Salary' => $baremic_salary,
//            'Sick Leave' => $sick_leave,
//            'Accomodation Allowance' => $accomodation_allowance,
//            'Overtime 30% USD' => $overtime_30_usd,
//            'Overtime 60% USD' => $overtime_60_usd ?? '',
//            'Total Earnings USD' => $total_earnings_usd,
//            'INSS 5%' => $inss_5,
//            'Monthly IPR' => $monthly_ipr,
//            'inss tax base' => $inss_tax_base,
//            'ipr tax base' => $ipr_tax_base,
//            'annual ipr tax base' => $annual_ipr_tax_base,
//        ]);







        // 2. Dates de paie
//        $year = now()->year;
//        $start = \Carbon\Carbon::LLcreate($year, $period, 16);
//        $end = $start->copy()->addMonth()->day(15);


        \App\Models\Payroll::updateOrCreate(
            [
                'employee_id' => $employee_id,
                'period' => $period,
            ],
            [

                'basic_usd_salary' => $basic_usd_salary,
                'start_contract_date' =>$employee->timestamps,
                'tax_dependants' => 0,
                'worked_days' => $worked_days,
                'baremic_salary' => $baremic_salary,
                'accommodation_allowance' => $accomodation_allowance,
                'sick_leave' => $sick_leave,
                'overtime_30' => $overtime_30_usd,
                'overtime_60' => $overtime_60_usd,
                'overtime_100' => 0,
                'total_earnings' => $total_earnings_usd,
                'inss_5' => $inss_5,
                'monthly_ipr' => $monthly_ipr,
                'ipr_rate' => $ipr_rate,
                'net' => 0,
                'net_usd' => 0,
                'cnss_13' => 0,
                'onem_0_2' => 0,
                'total_taxes_cdf' => 0,
                'royalties_10_usd' => 0,
                'inss_tax_base' => $inss_tax_base,
                'annual_ipr_tax_base' => 0,
                'tranche_2' => 0,
                'tranche_3' => 0,
                'tranche_more_3' => 0,
                'deduction' => 0,
                'period' => 0,
                'exchange_rate' => $exchange_rate,
            ]
        );


        // 🎯 Redirection vers la vue bulletin après paiement
        return redirect()->route('payroll.show', $employee_id)->with('success', 'Paie enregistrée avec succès. Bulletin affiché ci-dessous.');
    }


    /**
     * Display the specified resource.
     */
    public function show($employee_id)
    {
        $employee = Employee::where('employee_id', $employee_id)->firstOrFail();
        $payrolls = Payroll::where('employee_id', $employee_id)->orderByDesc('created_at')->get();

        return view('payroll.show', compact('employee', 'payrolls'));
    }




    public function sendPdf(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        if (!$request->hasFile('pdf')) {
            return response()->json(['message' => 'Aucun fichier PDF reçu.'], 400);
        }

        $pdf = $request->file('pdf');
        $pdfContent = file_get_contents($pdf->getRealPath());

        Mail::to($employee->email)->send(new PayrollPdfMail($employee, $pdfContent));

        return response()->json(['message' => 'Bulletin de paie envoyé avec succès.']);
    }






    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payroll $payroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payroll $payroll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payroll $payroll)
    {
        //
    }
}
