<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type_form = array(
            array('code_form' => 'FO-BIE-27 V.2' ,'name_form' => "FORMATO REMISIÓN DE ESTUDIANTES"),
            array('code_form' => 'FO-BIE-16 V.2' ,'name_form' => "FORMATO CONSENTIMIENTO INFORMADO"),
            array('code_form' => 'FO-BIE-17 V.2' ,'name_form' => "FORMATO ASENTIMIENTO INFORMADO"),
            array('code_form' => 'FO-BIE-18 V.2' ,'name_form' => "FORMATO CONSENTIMIENTO INFORMADO (Representante Legal)"),
            array('code_form' => 'FO-BIE-19 V.2' ,'name_form' => "FORMATO ACTA DE COMPROMISO"),
            array('code_form' => 'FO-BIE-20 V.3' ,'name_form' => "FORMATO VALORACIÓN INICIAL PSICOLÓGICA"),
            array('code_form' => 'FO-BIE-21 V.3' ,'name_form' => "FORMATO VALORACIÓN INICIAL PSICOPEDAGÓGICA"),
            array('code_form' => 'FO-BIE-22 V.2' ,'name_form' => "FORMATO DE SEGUIMIENTO INDIVIDUAL"),
            array('code_form' => 'FO-BIE-24 V.2' ,'name_form' => "FORMATO CIERRE DE CASO"),
            array('code_form' => 'FO-BIE-25 V.2' ,'name_form' => "FORMATO DISENTIMIENTO INFORMADO"),
            array('code_form' => 'FO-BIE-39 V.1' ,'name_form' => "INSTRUMENTO PARA LA MEDICIÓN DE IMPACTO DEL PROGRAMA DE ACOMPAÑAMIENTO ACADÉMICO"),
            );
            \DB::table('type_forms')->insert($type_form);
        }
}
