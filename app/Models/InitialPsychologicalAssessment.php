<?php

namespace App\Models;

use Illuminate\Routing\Route;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Model;

/**
 * Class InitialPsychologicalAssessment
 *
 * @property $id
 * @property $accept_conditions
 * @property $creation_date
 * @property $patients_laterality
 * @property $marital_status
 * @property $family_name
 * @property $family_relationship
 * @property $family_phone
 * @property $reason_consultation
 * @property $overall_story
 * @property $family_topic
 * @property $social_topic
 * @property $academic_topic
 * @property $personal_topic
 * @property $personal_history
 * @property $family_history
 * @property $healthy_state
 * @property $general_observation
 * @property $id_psychological
 * @property $created_at
 * @property $updated_at
 * @property $form_id
 *
 * @property Form $form
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class InitialPsychologicalAssessment extends Model
{
    static $rules = [
		'accept_conditions' => 'required',
		'day' => 'required',
        'mont' => 'required',
        'year' => 'required',
		'patients_laterality' => 'required|string|max:15',
		'marital_status' => 'required|string|max:15',
		'family_name' => 'required|string|max:50',
		'family_relationship' => 'required',
		'family_phone' => 'required|string|max:15|unique:patients,phone',
		'family_phone' => 'unique:users,phone',
		'family_phone' => 'unique:initial_psychological_assessments,family_phone',
		'reason_consultation' => 'required|string',
		'overall_story' => 'required|string',
		'family_topic' => 'required|string',
		'social_topic' => 'required|string',
		'academic_topic' => 'required|string',
		'personal_topic' => 'required|string',
		'personal_history' => 'required|string',
		'family_history' => 'required|string',
		'healthy_state' => 'required|string',
		'general_observation' => 'required|string',
        'id_psychological' => 'required|exists:users,id',
    ];
    
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['accept_conditions','creation_date','patients_laterality','marital_status','family_name','family_relationship','family_phone','reason_consultation','overall_story','family_topic','social_topic','academic_topic','personal_topic','personal_history','family_history','healthy_state','general_observation','id_psychological','form_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function form()
    {
        return $this->hasOne('App\Models\Form', 'id', 'form_id');
    }
    

}
