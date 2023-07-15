<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            ['name'=>'Administrador'],
            ['name'=>'Docente asociado al programa'],
            ['name'=>'Psicopedagogo'],
            ['name'=>'Psicologo']
        ];
        \DB::table('users_types')->insert($data);
    }
}
