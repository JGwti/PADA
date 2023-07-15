<?php
namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait UploadImage{
    protected $new_name_avatar ;
    protected $new_name_signature ;
    protected $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    protected $error_message = '';

    public function uploadAvatar($file_avatar, $prefix='', $disk = 'public'){
        $extension = strtolower($file_avatar->getClientOriginalExtension());//almacenar el archivo
        if(!$this->validateAvatar($file_avatar, $extension)){
            return false;
        }
        $this->new_name_avatar = uniqid($prefix, true).'.'.$extension;//crear un nuevo id unico
        $result =Storage::disk($disk)->put('avatars/'.$this->new_name_avatar,File::get($file_avatar));//almacenar en el disco
        if(!$result){
            $this->error_message ='Ocurrio un error al cargar el archivo'.$file_avatar->getClientOriginalName();
            return false;
        }
        return true;
    }
    public function uploadSignature($file_signature, $prefix='', $disk = 'public'){
        $extension = strtolower($file_signature->getClientOriginalExtension());//almacenar el archivo
        if(!$this->validateSignature($file_signature, $extension)){
            return false;
        }
        $this->new_name_signature = uniqid($prefix, true).'.'.$extension;//crear un nuevo id unico
        $result =Storage::disk($disk)->put('signatures/'.$this->new_name_signature,File::get($file_signature));//almacenar en el disco
        if(!$result){
            $this->error_message ='Ocurrio un error al cargar el archivo'.$file_signature->getClientOriginalName();
            return false;
        }
        return true;
    }
    public function validateAvatar($file_avatar, $extension ){
        if($file_avatar->getError()){
            $this->error_message = 'Error de archivo avatar, esta corrupto o excede el tamaño permitido.
                                    Verifica el archivo'.$file_avatar->getClientOriginalName();
        }elseif(!in_array($extension, $this->allowed_extensions)){
            $this->error_message = 'Extencion invalida del archivo avatar'.$file_avatar->getClientOriginalName();
        }elseif($file_avatar->getSize()>1000000){
            $this->error_message ='El archivo avatar excede el tamaño maximo'.$file_avatar->getClientOriginalName();
        }if(!empty($this->error_message)){
            return false;
        }
        return true;
    }
    public function validateSignature($file_signature, $extension ){
        if($file_signature->getError()){
            $this->error_message = 'Error de archivo firma, esta corrupto o excede el tamaño permitido.
                                    Verifica el archivo'.$file_signature->getClientOriginalName();
        }elseif(!in_array($extension, $this->allowed_extensions)){
            $this->error_message = 'Extencion invalida del archivo firma'
            .$file_signature->getClientOriginalName();
        } elseif($file_signature->getSize()>1000000){
            $this->error_message ='El archivo firma excede el tamaño maximo'
            .$file_signature->getClientOriginalName();
        }if(!empty($this->error_message)){
            return false;
        }
        return true;
    }
}

