<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class StudentReferral
 *
 * @property $id
 * @property $remission_date
 * @property $remission_to
 * @property $reason_referral
 * @property $accompanying_strategies
 * @property $observations
 * @property $created_at
 * @property $updated_at
 * @property $patient_id
 * @property $user_id
 * @property $status_id
 *
 * @property Patient $patient
 * @property Status $status
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class StudentReferral extends Model
{

    static $rules = [
		'remission_date' => 'required',
		'remission_to' => 'required',
		'reason_referral' => 'required',
		'accompanying_strategies' => 'required',
		'observations' => 'required',
		'patient_id' => 'required',
		'user_id' => 'required',
		
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['remission_date','remission_to','reason_referral','accompanying_strategies','observations','patient_id','user_id','status_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function patient()
    {
        return $this->hasOne('App\Models\Patient', 'id', 'patient_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status()
    {
        return $this->hasOne('App\Models\Status', 'id', 'status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }


}
