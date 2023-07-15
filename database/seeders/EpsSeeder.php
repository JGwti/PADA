<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            ['name'=>'COOSALUD EPS-S'],
            ['name'=>'NUEVA EPS'],
            ['name'=>'MUTUAL SER'],
            ['name'=>'ALIANSALUD EPS'],
            ['name'=>'SALUD TOTAL EPS S.A.'],
            ['name'=>'EPS SANITAS'],
            ['name'=>'EPS SURA'],
            ['name'=>'FAMISANAR'],
            ['name'=>'SERVICIO OCCIDENTAL DE SALUD EPS SOS'],
            ['name'=>'SALUD MIA'],
            ['name'=>'COMFENALCO VALLE'],
            ['name'=>'COMPENSAR EPS'],
            ['name'=>'EPM - EMPRESAS PUBLICAS DE MEDELLIN'],
            ['name'=>'FONDO DE PASIVO SOCIAL DE FERROCARRILES NACIONALES DE COLOMBIA'],
            ['name'=>'CAJACOPI ATLANTICO '],
            ['name'=>'CAPRESOCA'],
            ['name'=>'COMFACHOCO '],
            ['name'=>'COMFAMILIAR DE LA GUAJIRA '],
            ['name'=>'COMFAMILIAR HUILA '],
            ['name'=>'COMFAORIENTE '],
            ['name'=>'EPS FAMILIAR DE COLOMBIA '],
            ['name'=>'ASMET SALUD'],
            ['name'=>'ECOOPSOS ESS EPS-S'],
            ['name'=>'EMSSANAR E.S.S.'],
            ['name'=>'CAPITAL SALUD EPS-S'],
            ['name'=>'CONVIDA'],
            ['name'=>'SAVIA SALUD EPS '],
            ['name'=>'DUSAKAWI EPSI '],
            ['name'=>'ASOCIACION INDIGENA DEL CAUCA EPSI'],
            ['name'=>'ANAS WAYUU EPSI'],
            ['name'=>'MALLAMAS EPSI'],
            ['name'=>'PIJAOS SALUD EPSI '],
            ['name'=>'OTRA... '],
        ];
        \DB::table('eps')->insert($data);
    }
}
