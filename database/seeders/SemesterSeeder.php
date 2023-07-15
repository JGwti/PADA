<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            ['name'=>'Primero'],
            ['name'=>'Segundo'],
            ['name'=>'Tercero'],
            ['name'=>'Cuarto'],
            ['name'=>'Quinto'],
            ['name'=>'Sexto'],
            ['name'=>'Septimo'],
            ['name'=>'Octavo'],
            ['name'=>'Noveno'],
            ['name'=>'Decimo']
        ];
        \DB::table('semesters')->insert($data);
    }
}
