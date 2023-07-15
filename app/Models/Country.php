<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 *
 * @property $id
 * @property $code
 * @property $name
 * @property $phonecode
 *
 * @property Patient[] $patients
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Country extends Model
{
    
    static $rules = [
		'code' => 'required',
		'name' => 'required',
		'phonecode' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['code','name','phonecode'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function patients()
    {
        return $this->hasMany('App\Models\Patient', 'countrie_id', 'id');
    }
    

}
