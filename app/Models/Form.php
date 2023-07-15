<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Form
 *
 * @property $id
 * @property $referrals_id
 * @property $type_form_id
 * @property $created_at
 * @property $updated_at
 *
 * @property StudentReferral $studentReferral
 * @property TypeForm $typeForm
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Form extends Model
{
    
    static $rules = [
		'referrals_id' => 'required',
		'type_form_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['referrals_id','type_form_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function studentReferral()
    {
        return $this->hasOne('App\Models\StudentReferral', 'id', 'referrals_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typeForm()
    {
        return $this->hasOne('App\Models\TypeForm', 'id', 'type_form_id');
    }
    

}
