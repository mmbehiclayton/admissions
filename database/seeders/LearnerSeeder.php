<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Learner;

class LearnerSeeder extends Seeder
{
    public function run()
    {
        $learners = [
            [
                'name' => 'John Doe',
                'adm_no' => 'ADM001',
                'gender' => 'male',
                'dob' => '2010-01-01',
                'birth_cert_no' => 'BC001',
                'nationality' => 'citizen',
                'nemis_code' => 'NEMIS001',
                'doa' => '2020-01-01',
                'contact' => '0712345678',
                'stream_id' => 1, // Ensure this ID exists in your streams table
                'school_class_id' => 1, // Ensure this ID exists in your classes table
                'status' => 'active'
            ],
            [
                'name' => 'Jane Doe',
                'adm_no' => 'ADM002',
                'gender' => 'female',
                'dob' => '2011-02-01',
                'birth_cert_no' => 'BC002',
                'nationality' => 'citizen',
                'nemis_code' => 'NEMIS002',
                'doa' => '2021-02-01',
                'contact' => '0712345679',
                'stream_id' => 2,
                'school_class_id' => 2,
                'status' => 'active'
            ],
            [
                'name' => 'Alice Smith',
                'adm_no' => 'ADM003',
                'gender' => 'female',
                'dob' => '2012-03-01',
                'birth_cert_no' => 'BC003',
                'nationality' => 'citizen',
                'nemis_code' => 'NEMIS003',
                'doa' => '2022-03-01',
                'contact' => '0712345680',
                'stream_id' => 3,
                'school_class_id' => 3,
                'status' => 'active'
            ],
            [
                'name' => 'Bob Johnson',
                'adm_no' => 'ADM004',
                'gender' => 'male',
                'dob' => '2013-04-01',
                'birth_cert_no' => 'BC004',
                'nationality' => 'citizen',
                'nemis_code' => 'NEMIS004',
                'doa' => '2023-04-01',
                'contact' => '0712345681',
                'stream_id' => 4,
                'school_class_id' => 4,
                'status' => 'active'
            ],
            [
                'name' => 'Charlie Brown',
                'adm_no' => 'ADM005',
                'gender' => 'male',
                'dob' => '2014-05-01',
                'birth_cert_no' => 'BC005',
                'nationality' => 'citizen',
                'nemis_code' => 'NEMIS005',
                'doa' => '2024-05-01',
                'contact' => '0712345682',
                'stream_id' => 5,
                'school_class_id' => 5,
                'status' => 'active'
            ],
        ];

        foreach ($learners as $learner) {
            Learner::create($learner);
        }
    }
}
