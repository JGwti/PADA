<?php

namespace App\Models;

use App\Rules\ImageSize;
use App\Rules\ImageError;
use App\Rules\ImageExtension;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MemorandumOfAssociation
 *
 * @property $id
 * @property $patient_signature
 * @property $id_psychological
 * @property $id_psychopedagogical
 * @property $day
 * @property $mont
 * @property $year
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 * @property $form_id
 *
 * @property Form $form
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MemorandumOfAssociation extends Model
{
    static function rulesAssociation() {

        return [
            'patient_signature' => ['required','file', new ImageError(), new ImageExtension(), new ImageSize()],
            'id_psychological' => 'required|exists:users,id',
            'id_psychopedagogical' => 'required|exists:users,id',
            'day' => 'required',
            'mont' => 'required',
            'year' => 'required',
        ];
    }
    static function rulesAssociationEdit() {

        return [
            'patient_signature' => ['file', new ImageError(), new ImageExtension(), new ImageSize()],
            'id_psychological' => 'required|exists:users,id',
            'id_psychopedagogical' => 'required|exists:users,id',
            'day' => 'required',
            'mont' => 'required',
            'year' => 'required',
        ];
    }

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['patient_signature','id_psychological','id_psychopedagogical','day','mont','year','form_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function form()
    {
        return $this->hasOne('App\Models\Form', 'id', 'form_id');
    }


}
