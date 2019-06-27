<?php

use Illuminate\Database\Seeder;
use App\Contribution;
use App\SchoolStatus;

class ContributionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contribution::create([
            'cont_title' => 'Uniform',
            'cont_amount' => 0,
            'school_year' => SchoolStatus::first()->school_year,
            'semester' => SchoolStatus::first()->semester,
        ]);
    }
}
