<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class IndividualTracking
 *
 * @property $id
 * @property $session_number
 * @property $date_tracking
 * @property $line
 * @property $process
 * @property $objective
 * @property $session_description
 * @property $observations
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 * @property $form_id
 *
 * @property Form $form
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class IndividualTracking extends Model
{

    static $rules = [
		'session_number' => 'required',
		'day' => 'required',
        'mont' => 'required',
        'year' => 'required',
		'line' => 'required',
		'process' => 'required',
		'objective' => 'required',
		'session_description' => 'required',
		'observations' => 'required',
        'user_id' => 'required|exists:users,id',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['session_number','date_tracking','line','process','objective','session_description','observations','user_id','form_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function form()
    {
        return $this->hasOne('App\Models\Form', 'id', 'form_id');
    }


}
