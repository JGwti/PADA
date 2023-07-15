<?php

namespace App\Models;

use App\Rules\ImageSize;
use App\Rules\ImageError;
use App\Rules\ImageExtension;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $last_name
 * @property $phone
 * @property $document_number
 * @property $avatar
 * @property $signature_professional
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $user_type_id
 * @property $document_type_id
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @property DocumentType $documentType
 * @property UsersType $usersType
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Authenticatable
{
    public function getImageSize(){
       $imageZize = new ImageSize();
    }

    static function rules()
    {
        return [
            'name' => 'required|string|max:50',
		    'last_name' => 'required|string|max:50',
		    'phone' => 'required|unique:patients,phone|unique:users,phone|string|max:20',
		    'document_number' => 'required|unique:patients,document_number|unique:users,document_number|unique:legal_representatives,representative_document_number',
            'avatar'=>['required','file', new ImageError(), new ImageExtension(), new ImageSize()],
            'signature_professional'=>['required','file', new ImageError(), new ImageExtension(), new ImageSize()],
            'email' => 'required|unique:patients,email|unique:users,email',
            'password'=>'required|string|max:16|min:8|nullable',
            'user_type_id' => 'required|exists:users_types,id',
            'document_type_id' => 'required|exists:document_types,id',
        ];
    }


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','last_name','phone','document_number','email','password','user_type_id','document_type_id'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function documentType()
    {
        return $this->hasOne('App\Models\DocumentType', 'id', 'document_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usersType()
    {
        return $this->hasOne('App\Models\UsersType', 'id', 'user_type_id');
    }

    public function isAdmin(){
        return $this->user_type_id == 1;
    }
}
