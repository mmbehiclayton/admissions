<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Branch;
use App\Models\SchoolClass;
use App\Models\Stream;

class SchoolSeeder extends Seeder
{
    public function run()
    {
        $branches = [
            ['name' => 'Juja Road', 'address' => '123 Juja Road, Nairobi'],
            ['name' => 'South C', 'address' => '456 South C, Nairobi'],
            ['name' => 'Kitisuru', 'address' => '789 Kitisuru, Nairobi']
        ];

        foreach ($branches as $branchData) {
            $branch = Branch::create($branchData);

            for ($i = 1; $i <= 8; $i++) {
                $schoolClass = SchoolClass::create([
                    'name' => "Grade $i",
                    'branch_id' => $branch->id
                ]);

                foreach (['Blue', 'Red', 'Green'] as $streamName) {
                    Stream::create([
                        'name' => $streamName,
                        'school_class_id' => $schoolClass->id
                    ]);
                }
            }
        }
    }
}
