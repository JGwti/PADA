<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class State
 *
 * @property $id
 * @property $name
 * @property $country_id
 *
 * @property Patient[] $patients
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class State extends Model
{
    
    static $rules = [
		'name' => 'required',
		'country_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','country_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function patients()
    {
        return $this->hasMany('App\Models\Patient', 'state_id', 'id');
    }
    

}
