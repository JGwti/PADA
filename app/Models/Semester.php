<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Semester
 *
 * @property $id
 * @property $name
 *
 * @property Patient[] $patients
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Semester extends Model
{
    
    static $rules = [
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function patients()
    {
        return $this->hasMany('App\Models\Patient', 'semester_id', 'id');
    }
    

}
