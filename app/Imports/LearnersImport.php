<?php

namespace App\Imports;

use App\Models\Learners;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
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
            // Convert 'dob' to a Carbon object and format it
            $dob = isset($row['dob']) && !empty($row['dob']) ? Carbon::parse($row['dob'])->format('d-m-Y') : null;

            // Convert 'date_of_admission' to a Carbon object and format it
            $dateOfAdmission = isset($row['date_of_addmission']) && !empty($row['date_of_addmission']) ? Carbon::parse($row['date_of_addmission'])->format('d-m-Y') : null;

            // Create the Learners entry
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
                'date_of_addmission' => $dateOfAdmission,
                'contact' => $row['contact'],
                'status' => 'active',
            ]);
        }
    }
}
