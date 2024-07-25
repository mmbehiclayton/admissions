<?php

namespace App\Exports;

use App\Models\Learners;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;

class StreamLearnersExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;

    protected $streamId;

    public function __construct($streamId)
    {
        $this->streamId = $streamId;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Learners::where('stream_id', $this->streamId)
                       ->with('streams.classes')
                       ->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
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
            $learner->id,
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

    /**
     * Generate the file name for the export.
     *
     * @return string
     */
    public function getFileName()
    {
        // Retrieve the first learner to get class and stream names
        $learner = Learners::where('stream_id', $this->streamId)
                           ->with('streams.classes')
                           ->first();

        $className = $learner->streams->classes->name ?? 'ClassName';
        $streamName = $learner->streams->name ?? 'StreamName';

        return "{$className}_{$streamName}_Class_List.xlsx";
    }
}
