<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CaseClosure
 *
 * @property $id
 * @property $end_session
 * @property $professional_area
 * @property $number_sessions
 * @property $found_situations
 * @property $process_description
 * @property $progress_issues
 * @property $observations
 * @property $id_professional
 * @property $created_at
 * @property $updated_at
 * @property $form_id
 *
 * @property Form $form
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CaseClosure extends Model
{

    static $rules = [
		'end_session' => 'required|date',
		'professional_area' => 'required',
		'number_sessions' => 'required|numeric|between:1,6',
		'found_situations' => 'required|string',
		'process_description' => 'required|string',
		'progress_issues' => 'required|string',
		'observations' => 'required|string',
		'id_professional' => 'required|exists:users,id'
    ];
    static $rulesEdit = [
		'end_session' => 'required|date',
		'professional_area' => 'required',
		'number_sessions' => 'required|numeric|between:1,6',
		'found_situations' => 'required|string',
		'process_description' => 'required|string',
		'progress_issues' => 'required|string',
		'observations' => 'required|string',
		'id_professional' => 'required|exists:users,id'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['end_session','professional_area','number_sessions','found_situations','process_description','progress_issues','observations','id_professional','form_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function form()
    {
        return $this->hasOne('App\Models\Form', 'id', 'form_id');
    }


}
