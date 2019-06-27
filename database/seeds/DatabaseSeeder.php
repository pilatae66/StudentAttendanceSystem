<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->create();

        $this->call(SchoolStatusSeeder::class);
        $this->call(ContributionSeeder::class);
        $this->call(FineSeeder::class);
    }
}
