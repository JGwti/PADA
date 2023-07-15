<?php

namespace App\Services;

use App\Models\Eps;
use App\Models\rols;
use App\Models\User;
use App\Models\rol_user;
use App\Models\genders;
use App\Models\Patient;
use App\Models\Cities;
use App\Models\States;
use App\Models\Countries;
use App\Models\document_type;
use App\Models\semesters;
use App\Models\academic_programs;

class Patients{
    public function get_document_type(){
        $document_types= document_type:: get();
        $dt_Array['']='Selecciona un tipo de documento';
        foreach ($document_types as  $document_type){
            $dt_Array[$document_type->id] = $document_type->name;
        }
        return $dt_Array;
    }
    public function get_rol_user(){
        $rol_users= rol_user:: get();
        $dt_Array['']='Selecciona un rol de usuario';
        foreach ($rol_users as  $rol_user){
            $dt_Array[$rol_user->id] = $rol_user->name;
        }
        return $dt_Array;
    }
    public function get_referral_name(){
        $rol_users= User:: get();
        $dt_Array['']='Selecciona un usuario';
        foreach ($rol_users as  $rol_user){
            $dt_Array[$rol_user->id] = $rol_user->name;
        }
        return $dt_Array;
    }
    public function get_psychopedagogical_name(){
        $rol_users= User:: get();
        $dt_Array['']='Selecciona un usuario';
        foreach ($rol_users as  $rol_user){
            $dt_Array[$rol_user->id] = $rol_user->name;
        }
        return $dt_Array;
    }

        public function get_gender(){
            $gender= genders:: get();
            $dt_Array['']='Selecciona un genero';
            foreach ($gender as  $gender){
                $dt_Array[$gender->id] = $gender->name;
            }
            return $dt_Array;
        }
        public function get_rol(){
            $rol= rols:: get();
            $dt_Array['']='Selecciona un rol';
            foreach ($rol as  $rol){
                $dt_Array[$rol->id] = $rol->name;
            }
            return $dt_Array;
        }
        public function getAcademicProgram(){
            $academi_programs= academic_programs:: get();
            $dt_Array['']='Selecciona un programa academico';
            foreach ($academi_programs as  $academi_programs){
                $dt_Array[$academi_programs->id] = $academi_programs->name;
            }
            return $dt_Array;
        }
        public function getSemesters(){
            $semesters= semesters:: get();
            $dt_Array['']='Selecciona un semestre';
            foreach ($semesters as  $semesters){
                $dt_Array[$semesters->id] = $semesters->name;
            }
            return $dt_Array;
        }

        public function getCountries(){
            $countries= Countries:: get();
            $dt_Array['']='Seleccionar un pais:';
            foreach ($countries as  $countries){
                $dt_Array[$countries->id] = $countries->name;
            }
            return $dt_Array;
        }
        public function getStates(){
            $states= States:: get();
            $dt_Array['']='Seleccionar un estado:';
            foreach ($states as  $states){
                $dt_Array[$states->id] = $states->name;
            }
            return $dt_Array;
        }
        public function getCities(){
            $cities= Cities:: get();
            $dt_Array['']='Seleccionar una ciudad:';
            foreach ($cities as  $cities){
                $dt_Array[$cities->id] = $cities->name;
            }
            return $dt_Array;
        }
        public function getEps(){
            $eps= Eps:: get();
            $dt_Array['']='Selecciona una EPS:';
            foreach ($eps as  $eps){
                $dt_Array[$eps->id] = $eps->name;
            }
            return $dt_Array;
        }
}





