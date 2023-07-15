<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            ['name'=>'Estudiante'],
            ['name'=>'Docente'],
            ['name'=>'Administrativo']
        ];
        \DB::table('patient_types')->insert($data);
    }
}
