<?php

namespace App\Services;

use App\Models\Ep;
use App\Models\PatientType;
use App\Models\User;
use App\Models\UsersType;
use App\Models\GenderType;
use App\Models\Patient;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\DocumentType;
use App\Models\Semester;
use App\Models\AcademicProgram;

class Selects{
    public function getDocumentType(){
        $document_types= DocumentType:: get();
        $dt_Array['']='Selecciona un tipo de documento';
        foreach ($document_types as  $document_type){
            $dt_Array[$document_type->id] = $document_type->name;
        }
        return $dt_Array;
    }
    public function getUserType(){
        $rol_users= UsersType:: get();
        $dt_Array['']='Selecciona un rol de usuario';
        foreach ($rol_users as  $rol_user){
            $dt_Array[$rol_user->id] = $rol_user->name;
        }
        return $dt_Array;
    }
    public function getUserName(){
        $rol_users= User:: get();
        $dt_Array['']='Selecciona un usuario';
        foreach ($rol_users as  $rol_user){
            $dt_Array[$rol_user->id] = $rol_user->name.' '.$rol_user->last_name;
        }
        return $dt_Array;
    }
    public function getUserPsychological(){
        $rol_users= User:: get()->where('user_type_id',4);
        $dt_Array['']='Selecciona un psicologo';
        foreach ($rol_users as  $rol_user){
            $dt_Array[$rol_user->id] = $rol_user->name.' '.$rol_user->last_name;
        }
        return $dt_Array;
    }
    public function getUserPsychopedagogical(){
        $rol_users= User:: get()->where('user_type_id',3);
        $dt_Array['']='Selecciona un psicologo';
        foreach ($rol_users as  $rol_user){
            $dt_Array[$rol_user->id] = $rol_user->name.' '.$rol_user->last_name;
        }
        return $dt_Array;
    }
    public function getPatientName(){
        $patients= Patient:: get();
        $dt_Array['']='Selecciona un paciente';
        foreach ($patients as  $patient){
            $dt_Array[$patient->id] = $patient->name.' '.$patient->last_name;
        }
        return $dt_Array;
    }
    public function get_psychopedagogical_name(){
        $rol_users= User:: get()->whereBetween('user_type_id', [2, 5]);
        $dt_Array['']='Selecciona un usuario';
        foreach ($rol_users as  $rol_user){
            $dt_Array[$rol_user->id] = $rol_user->name.' '.$rol_user->last_name;
        }
        return $dt_Array;
    }

        public function getGenderType(){
            $gender= GenderType:: get();
            $dt_Array['']='Selecciona el genero del paciente';
            foreach ($gender as  $gender){
                $dt_Array[$gender->id] = $gender->name;
            }
            return $dt_Array;
        }
        public function getPatientType(){
            $rol= PatientType:: get();
            $dt_Array['']='Selecciona el rol del paciente';
            foreach ($rol as  $rol){
                $dt_Array[$rol->id] = $rol->name;
            }
            return $dt_Array;
        }
        public function getAcademicProgram(){
            $academi_programs= AcademicProgram:: get();
            $dt_Array['']='Selecciona un programa academico';
            foreach ($academi_programs as  $academi_programs){
                $dt_Array[$academi_programs->id] = $academi_programs->name;
            }
            return $dt_Array;
        }
        public function getSemesters(){
            $semesters= Semester:: get();
            $dt_Array['']='Selecciona un semestre';
            foreach ($semesters as  $semesters){
                $dt_Array[$semesters->id] = $semesters->name;
            }
            return $dt_Array;
        }

        public function getCountries(){
            $countries= Country:: get();
            $dt_Array['']='Seleccionar un pais:';
            foreach ($countries as  $countries){
                $dt_Array[$countries->id] = $countries->name;
            }
            return $dt_Array;
        }
        public function getStates(){
            $states= State:: get();
            $dt_Array['']='Seleccionar un estado:';
            foreach ($states as  $states){
                $dt_Array[$states->id] = $states->name;
            }
            return $dt_Array;
        }
        public function getCities(){
            $cities= City:: get();
            $dt_Array['']='Seleccionar una ciudad:';
            foreach ($cities as  $cities){
                $dt_Array[$cities->id] = $cities->name;
            }
            return $dt_Array;
        }
        public function getEps(){
            $eps= Ep:: get();
            $dt_Array['']='Selecciona una EPS:';
            foreach ($eps as  $eps){
                $dt_Array[$eps->id] = $eps->name;
            }
            return $dt_Array;
        }

}





