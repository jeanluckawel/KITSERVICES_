<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeesImport implements ToModel, withHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        if (collect($row)->filter()->isEmpty()) {
            return null;
        }

        // Vérifier doublon avant insertion
        if (Employee::where('personal_id', $row['personal_id'] ?? '')->exists()) {
            $this->duplicates[] = $row['personal_id'] ?? 'unknown';
            return null; // on skip cette ligne, on stocke le doublon
        }

        $lastEmployee = Employee::orderBy('id', 'desc')->first();
        $lastNumber = $lastEmployee ? intval(substr($lastEmployee->employee_id, -5)) : 0;
        $newEmployeeId = 'KAM_KIT' . str_pad($lastNumber + 1, 5, '0', STR_PAD_LEFT);

        return new Employee([
            //

            'employee_id' => $newEmployeeId,
            'first_name' => $row['first_name'] ?? '',
            'last_name' => $row['last_name'] ?? '',
            'middle_name' => $row['middle_name'] ?? '',
            'personal_id' => $row['personal_id'] ?? '',
            'birth_date' => $row['birth_date'] ?? '',
            'gender' => $row['gender'] ?? '',
            'marital_status' => $row['marital_status'] ?? '',
            'highest_education_level' => $row['highest_education_level'] ?? '',
            'nationality' => $row['nationality'] ?? '' ,
            'mobile_phone' => $row['mobile_phone'] ?? '',
            'email' => $row['email'] ?? '',
            'address1' => $row['address1'] ?? '',
            'address2' => $row['address2'] ?? '',
            'city' => $row['city'] ?? '',
            'house_phone' => $row['house_phone'] ?? '',
            'department' => $row['department'] ?? '',
            'function' => $row['function'] ?? '',
            'niveau' => $row['niveau'] ?? '',
            'echelon' => $row['echelon'] ?? '',
            'contract_type' => $row['contract_type'] ?? '',
            'salaire_mensuel_brut' => $row['salaire_mensuel_brut'] ?? '',
            'status' => 1,
        ]);
    }
}
