<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'name'=>'Admin',
                'last_name'=>'es el admin',
                'phone'=>'+57 111111',
                'document_number'=>111111,

                'email'=>'admin@jdc.edu.co',
                'password'=>bcrypt('123456789'),
                'user_type_id'=>1,
                'document_type_id'=>1
            ],
            [
                'name'=>'July Marcela',
                'last_name'=>'Barreto Peña',
                'phone'=>'+57 3118596787',
                'document_number'=>10316399,

                'email'=>'july@jdc.edu.co',
                'password'=>bcrypt('123456789'),
                'user_type_id'=>3,
                'document_type_id'=>1
            ],
            [
                'name'=>'Sergio Andres',
                'last_name'=>'Garcia Rincon',
                'phone'=>'+57 3208948576',
                'document_number'=>10317485,

                'email'=>'sergio@jdc.edu.co',
                'password'=>bcrypt('123456789'),
                'user_type_id'=>4,
                'document_type_id'=>1
            ],
            [
                'name'=>'Juan David ',
                'last_name'=>'Mendoza Abril',
                'phone'=>'+57 3168795267',
                'document_number'=>10327845,

                'email'=>'juan@jdc.edu.co',
                'password'=>bcrypt('123456789'),
                'user_type_id'=>2,
                'document_type_id'=>1
            ],
            [
                'name'=>'Nancy Isabella',
                'last_name'=>'Barrera Caicedo',
                'phone'=>'+57 3177893219',
                'document_number'=>10367519,

                'email'=>'Nancy@jdc.edu.co',
                'password'=>bcrypt('123456789'),
                'user_type_id'=>2,
                'document_type_id'=>1
            ]
        ];
        \DB::table('users')->insert($data);
    }
}
