<?php

namespace App\Exports;

use App\Models\Learners;
use Maatwebsite\Excel\Concerns\FromCollection;

class AllLearnersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Learners::all();
    }
}
