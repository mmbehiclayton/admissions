<?php

namespace App\Imports;

use App\Models\Learners;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Carbon\Carbon;

class LearnersImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            // Check if the date fields are not empty and valid Excel date numbers
            $dob = is_numeric($row['dob']) ? Date::excelToDateTimeObject($row['dob'])->format('Y-m-d') : null;
            $date_of_addmission = is_numeric($row['date_of_addmission']) ? Date::excelToDateTimeObject($row['date_of_addmission'])->format('Y-m-d') : null;

            Learners::create([
                'stream_id' => $row['stream_id'],
                'assessment_no' => $row['assessment_no'],
                'name' => $row['name'],
                'admission_no' => $row['admission_no'],
                'gender' => $row['gender'],
                'dob' => $dob,
                'bc_pp_entry_no' => $row['bc_pp_entry_no'],
                'nationality' => $row['nationality'],
                'nemis_code' => $row['nemis_code'],
                'date_of_addmission' => $date_of_addmission,
                'contact' => $row['contact'],
                'status' => 'active',
            ]);
        }
    }
}
