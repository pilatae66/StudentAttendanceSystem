<?php

use Illuminate\Database\Seeder;
use App\Fines;

class FineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fines::create([
            'fine_amount' => 15
        ]);
    }
}
