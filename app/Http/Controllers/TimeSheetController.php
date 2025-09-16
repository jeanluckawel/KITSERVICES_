<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\TimeSheet;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class TimeSheetController extends Controller
{




    public function loginForm()
    {
        return view('timesheets.login');
    }

    // Vérifier le matricule et date de naissance
    public function login(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|string',
            'mobile_phone' => 'required|string',
        ]);

        $employee = Employee::where('employee_id', $request->employee_id)
            ->where('mobile_phone', $request->mobile_phone)
            ->first();

        if (!$employee) {
            return back()->withErrors(['employee_id' => 'Matricule ou numéro de téléphone incorrecte']);
        }

        // Stocker l'employé en session
        Session::put('timesheet_employee_id', $employee->id);

        return redirect()->route('timesheets.dashboard');
    }

    // Dashboard avec Start / End
    public function dashboard()
    {
        $employee_id = Session::get('timesheet_employee_id');
        if (!$employee_id) {
            return redirect()->route('timesheets.login');
        }

        $employee = Employee::findOrFail($employee_id);
        $todaySheet = TimeSheet::where('employee_id', $employee_id)
            ->whereDate('date', now()->toDateString())
            ->first();

        return view('timesheets.dashboard', compact('employee', 'todaySheet'));
    }

    // Start
    public function start(Request $request)
    {
        $employee_id = Session::get('timesheet_employee_id');
        $todaySheet = TimeSheet::firstOrCreate(
            ['employee_id' => $employee_id, 'date' => now()->toDateString()],
            ['start_time' => now()]
        );

        if (!$todaySheet->start_time) {
            $todaySheet->start_time = now();
            $todaySheet->save();
        }

        return back()->with('success', 'Heure de début enregistrée.');
    }

    // End
    public function end(Request $request)
    {
        $employee_id = Session::get('timesheet_employee_id');
        $todaySheet = TimeSheet::where('employee_id', $employee_id)
            ->whereDate('date', now()->toDateString())
            ->first();
        if ($todaySheet && !$todaySheet->end_time) {
            $todaySheet->end_time = now();

            // Calcul des heures travaillées
            $start = Carbon::parse($todaySheet->start_time);
            $end = Carbon::parse($todaySheet->end_time);

            // Différence en heures et minutes
            $diff = $end->diff($start);

            // Exemple : "1h 30'" ou "45'"
            $hoursWorked = ($diff->h > 0 ? $diff->h . 'h ' : '') . ($diff->i > 0 ? $diff->i . "'" : '0');

            // Sauvegarde
            $todaySheet->hours_worked = $hoursWorked;
            $todaySheet->save();
        }

        return back()->with('success', 'Heure de fin enregistrée.');
    }

    public function all()
    {
        $employees = Employee::with(['timeSheets' => function($query) {
            $query->whereDate('date', now()->toDateString());
        }])->get();

        return view('timesheets.all', compact('employees'));
    }







    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(TimeSheet $timeSheet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TimeSheet $timeSheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TimeSheet $timeSheet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TimeSheet $timeSheet)
    {
        //
    }
}
