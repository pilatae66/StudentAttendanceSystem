<?php

use Illuminate\Database\Seeder;
use App\SchoolStatus;

class SchoolStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SchoolStatus::create([
            'school_year' => '2019-2020',
            'semester' => '1st'
        ]);
    }
}
