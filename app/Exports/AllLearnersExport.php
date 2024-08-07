<?php
namespace App\Exports;

use App\Models\Learners;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AllLearnersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Learners::with('streams.classes')->get();
    }

    /**
    * @return array
    */
    public function headings(): array
    {
        return [
            'Class and Stream',
            'Assessment No',
            'Name',
            'Admission Number',
            'Gender',
            'Date of Birth',
            'BC/PP',
            'Nationality',
            'Nemis Code',
            'Date of Admission',
            'Contact',
            'Created At',
            'Updated At',
            'Status',
            // Add other relevant headers based on your Learners model
        ];
    }

    /**
    * @param mixed $learner
    * @return array
    */
    public function map($learner): array
    {
        return [
            ($learner->streams->classes->name ?? 'N/A') . ' ' . ($learner->streams->name ?? 'N/A'), // Display class and stream name
            $learner->assessment_no,
            $learner->name,
            $learner->admission_no,
            $learner->gender,
            $learner->dob,
            $learner->bc_pp_entry_no,
            $learner->nationality,
            $learner->nemis_code,
            $learner->date_of_addmission,
            $learner->contact,
            $learner->created_at,
            $learner->updated_at,
            $learner->status,
            // Add other relevant fields based on your Learners model
        ];
    }
}
