<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
                ['name'=>'Medicina Veterinaria'],
                ['name'=>'Administracion de empresas'],
                ['name'=>'Turistica y hoteleria'],
                ['name'=>'Artes visuales'],
                ['name'=>'Ciencias del deporte y la actividad fisica'],
                ['name'=>'Ingieneria ambiental'],
                ['name'=>'Contaduria publica'],
                ['name'=>'Derecho'],
                ['name'=>'Ingieneria industrial'],
                ['name'=>'Licenciatura en educacion fisica, recreación y deportes'],
                ['name'=>'Ingieneria en sistemas'],
                ['name'=>'Musica'],
                ['name'=>'Trabajo social'],
                ['name'=>'Ingenieria civil']
            ];
            \DB::table('academic_programs')->insert($data);
    }
}







