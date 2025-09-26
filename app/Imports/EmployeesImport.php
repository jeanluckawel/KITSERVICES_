<?php

namespace App\Imports;

use App\Mail\NewEmployeeNotification;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

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


        $excelDate = $row['end_contract_date'] ?? null;

        if ($excelDate) {
            // Si c'est un nombre Excel
            if (is_numeric($excelDate)) {
                $endContractDate = Carbon::instance(Date::excelToDateTimeObject($excelDate))->format('Y-m-d');
            } else {
                // Si c'est du texte
                $endContractDate = Carbon::parse($excelDate)->format('Y-m-d');
            }
        } else {
            $endContractDate = null;
        }

        $createdAt = !empty($row['date_debut'])
            ? (is_numeric($row['date_debut'])
                ? Carbon::instance(Date::excelToDateTimeObject($row['date_debut']))
                : Carbon::parse($row['date_debut']))
            : null;


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
            'end_contract_date' => $endContractDate,
            'created_at' => $createdAt,
            'updated_at' => now(),


            'status' => 1,

        ]);




    }


}
