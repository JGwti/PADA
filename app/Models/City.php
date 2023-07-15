<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 *
 * @property $id
 * @property $name
 * @property $state_id
 *
 * @property Patient[] $patients
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class City extends Model
{
    
    static $rules = [
		'name' => 'required',
		'state_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','state_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function patients()
    {
        return $this->hasMany('App\Models\Patient', 'citie_id', 'id');
    }
    

}
