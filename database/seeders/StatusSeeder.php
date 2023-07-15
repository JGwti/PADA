<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            ['name'=>'Iniciado proceso'],
            ['name'=>'Acepto el programa'],
            ['name'=>'En progreso'],
            ['name'=>'Finalizado proceso'],
            ['name'=>'Finalizado con novedad']
        ];
        \DB::table('status')->insert($data);
    }
}
