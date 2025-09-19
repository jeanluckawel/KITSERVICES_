<?php

namespace App\Http\Controllers;

use App\Mail\NewEmployeeNotification;
use App\Models\department;
use App\Models\echelon;
use App\Models\Employee;
use App\Models\fonction;
use App\Models\niveau;
use App\Models\salary_grid;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
//        $employees = Employee::paginate(100);
        $count = $employees->where('status', '1')->count();
        return view('employees.index',compact('employees','count'));
    }
    public function create()
    {
        return view('employees.create');
    }



    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
//            'first_name'               => 'required|string|max:255',
//            'last_name'                => 'required|string|max:255',
//            'middle_name'              => 'nullable|string|max:255',
//            'personal_id'              => 'required|string|unique:employees,personal_id',
//            'birth_date'               => 'required|date',
//            'gender'                   => 'required|in:M,F',
//            'marital_status'           => 'required|string|max:255',
//            'highest_education_level'  => 'nullable|string|max:255',
//            'nationality'              => 'nullable|string|max:255',
            'photo'                    => 'nullable|image|max:2048',

//            'mobile_phone'             => 'required|string|max:20',
//            'email'                    => 'required|email|max:255',
//            'address1'                 => 'required|string|max:255',
//            'address2'                 => 'nullable|string|max:255',
//            'city'                     => 'required|string|max:100',
//            'house_phone'              => 'nullable|string|max:20',
//
//            'emergency_full_name'      => 'nullable|string|max:255',
//            'emergency_relationship'   => 'nullable|string|max:255',
//            'emergency_mobile_phone'   => 'nullable|string|max:20',
//            'emergency_address'        => 'nullable|string|max:255',
//            'emergency_city'           => 'nullable|string|max:100',

//            'father_name'              => 'nullable|string|max:255',
//            'father_name_status'       => 'nullable|string|max:255',
//            'mother_name'              => 'nullable|string|max:255',
//            'mother_name_status'       => 'nullable|string|max:255',
//            'spouse_name'              => 'nullable|string|max:255',
//            'spouse_phone'             => 'nullable|string|max:20',
//            'spouse_birth_date'        => 'nullable|date',

//            'department'               => 'required|string|max:255',
//            'function'                 => 'required|string|max:255',
//            'niveau'                   => 'required|string|max:255',
//            'echelon'                  => 'required|string|max:255',
//            'contract_type'            => 'required|string|max:255',
//            'salaire_mensuel_brut'     => 'nullable|numeric',
        ]);

        // Génération automatique de l’employee_id
        $lastEmployee = Employee::orderBy('id', 'desc')->first();
        $lastNumber = $lastEmployee ? intval(substr($lastEmployee->employee_id, -5)) : 0;
        $newEmployeeId = 'KAM_KIT' . str_pad($lastNumber + 1, 5, '0', STR_PAD_LEFT);

        $data = $request->all();

        // Gestion de la photo (upload direct ou base64 depuis Croppie)
        if ($request->has('photo_cropped') && !empty($request->photo_cropped)) {
            // si Croppie renvoie en base64
            $image = $request->photo_cropped;
            $image = str_replace('data:image/jpeg;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $fileName = uniqid() . '.jpg';
            \Storage::disk('public')->put("photos/$fileName", base64_decode($image));
            $data['photo'] = "photos/$fileName";
        } elseif ($request->hasFile('photo')) {
            // si upload normal
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        // Champs supplémentaires
        $data['employee_id'] = $newEmployeeId;
        $data['status'] = 1;
        $data['age'] = $this->calculateAge($data['birth_date']);

        // Création en base
        $employee = Employee::create($data);

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employé ajouté avec succès.');
    }

    /**
     * Calcule l’âge à partir de la date de naissance
     */
    private function calculateAge($birthDate)
    {
        return \Carbon\Carbon::parse($birthDate)->age;
    }


    /**
     * Display the specified resource.
     */
    public function show($employee_id)
    {
        $employee = Employee::where('employee_id', $employee_id)->firstOrFail();
        $address = $employee->address ?? null;
        $family = $employee->family ?? null;
        $child = $employee->child ?? null;

        return view('employees.show', compact('employee', 'address', 'family','child'));
    }

    public function profile($employee_id)
    {
        $employee = Employee::where('employee_id', $employee_id)->firstOrFail();

        return view('employees.profile', compact('employee'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }

    public function downloadTemplate() : BinaryFileResponse
    {
        $file = public_path('templates/employees_template.xlsx');

        return response()->download($file, 'employees_template.xlsx');

    }

    public function file()
    {
        return view('file.file');

    }

    public function search(Request $request)
    {

        $employees = [];

        if ($request->has('search')) {
            $query = $request->input('search');

            $employees = Employee::where('employee_id', 'like', "%$query%")
                ->orWhere('first_name', 'like', "%$query%")
                ->orWhere('last_name', 'like', "%$query%")
                ->orWhere('middle_name', 'like', "%$query%")
                ->orWhere('personal_id', 'like', "%$query%")
                ->orWhere('department', 'like', "%$query%")
                ->get();
        }

        return view('employees.search', compact('employees'));

    }
}
