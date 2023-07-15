<?php

namespace App\Models;

use App\Rules\ImageSize;
use App\Rules\ImageError;
use App\Rules\ImageExtension;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Assent
 *
 * @property $id
 * @property $professional_area
 * @property $day
 * @property $mont
 * @property $year
 * @property $city
 * @property $patient_signature
 * @property $representative_signature
 * @property $representative_name
 * @property $representative_document_number
 * @property $id_psychological
 * @property $id_psychopedagogical
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 * @property $form_id
 *
 * @property Form $form
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Assent extends Model
{

    static function rulesAssent(){
        return [
            'professional_area' => 'required',
            'day' => 'required',
            'mont' => 'required',
            'year' => 'required',
            'city' => 'required',
            'patient_signature' => ['required','file', new ImageError(), new ImageExtension(), new ImageSize()],
            'representative_signature' => ['required','file', new ImageError(), new ImageExtension(), new ImageSize()],
            'representative_name' => 'required|string|max:100',
            'representative_document_number' => 'required|numeric',
            'id_psychological' => 'required|exists:users,id',
            'id_psychopedagogical' => 'required|exists:users,id',
        ];
    }

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['professional_area','day','mont','year','city','patient_signature','representative_signature','representative_name','representative_document_number','id_psychological','id_psychopedagogical','form_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function form()
    {
        return $this->hasOne('App\Models\Form', 'id', 'form_id');
    }


}
