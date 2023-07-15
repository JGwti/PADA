<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $data=[
                    ['name'=>'Cedula de Ciudadania'],
                    ['name'=>'Tarjeta de Identidad'],
                    ['name'=>'Registro civil'],
                    ['name'=>'Pasaporte']
                ];
                \DB::table('document_types')->insert($data);
        }
    }
}

