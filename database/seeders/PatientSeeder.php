<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
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
                'document_number'=>10496399,
                'name'=>'Javier Esteban',
                'last_name'=>'Gutierrez Luna',
                'age'=>28,
                'date_birth'=>'1994-10-06',
                'address'=>'Trv 3 #60A-41',
                'phone'=>'+57 3213035251',
                'email'=>'jgutierrezl@jdc.edu.co',
                'password'=>bcrypt('123456789'),
                'document_type_id'=>1,
                'patient_type_id'=>1,
                'gender_type_id'=>2,
                'academic_program_id'=>11,
                'semester_id'=>9,
                'eps_id'=>8,
                'state_id'=>781,
                'countrie_id'=>47,
                'citie_id'=>12848
            ],
            [
                'document_number'=>10489899,
                'name'=>'Andres Fernando',
                'last_name'=>'Melo Mojica',
                'age'=>23,
                'date_birth'=>'1999-09-09',
                'address'=>'Cra 1 #58-78',
                'phone'=>'+57 3182331004',
                'email'=>'+57 Afmm@jdc.edu.co',
                'password'=>bcrypt('123456789'),
                'document_type_id'=>1,
                'patient_type_id'=>1,
                'gender_type_id'=>2,
                'academic_program_id'=>4,
                'semester_id'=>7,
                'eps_id'=>21,
                'state_id'=>781,
                'countrie_id'=>47,
                'citie_id'=>12848
            ],
            [
                'document_number'=>94100615,
                'name'=>'Juan Sebastian',
                'last_name'=>'Cardenas Castro',
                'age'=>17,
                'date_birth'=>'2005-01-01',
                'address'=>'Cra 4 #3a-90',
                'phone'=>'+57 3123033831',
                'email'=>'+57 Jscc@jdc.edu.co',
                'password'=>bcrypt('123456789'),
                'document_type_id'=>2,
                'patient_type_id'=>1,
                'gender_type_id'=>2,
                'academic_program_id'=>8,
                'semester_id'=>2,
                'eps_id'=>3,
                'state_id'=>781,
                'countrie_id'=>47,
                'citie_id'=>12848
            ],
            [
                'document_number'=>96032108,
                'name'=>'Maria Ximena',
                'last_name'=>'Rosas Dias',
                'age'=>17,
                'date_birth'=>'2005-02-02',
                'address'=>'calle 36 #1a-18',
                'phone'=>'+57 3005963435',
                'email'=>'+57 Mxrd@jdc.edu.co',
                'password'=>bcrypt('123456789'),
                'document_type_id'=>2,
                'patient_type_id'=>1,
                'gender_type_id'=>1,
                'academic_program_id'=>9,
                'semester_id'=>5,
                'eps_id'=>10,
                'state_id'=>781,
                'countrie_id'=>47,
                'citie_id'=>12848
            ],
        ];
        \DB::table('patients')->insert($data);
    }
}
