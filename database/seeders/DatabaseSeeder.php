<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AcademicProgramSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(DocumentTypeSeeder::class);
        $this->call(EpsSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(RolUserSeeder::class);
        $this->call(SemesterSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(TypeFormSeeder::class);
        $this->call(PatientSeeder::class);
        $this->call(UserSeeder::class);
    }
}
