<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Status
 *
 * @property $id
 * @property $name
 *
 * @property StudentReferral[] $studentReferrals
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Status extends Model
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
    public function studentReferrals()
    {
        return $this->hasMany('App\Models\StudentReferral', 'status_id', 'id');
    }
    

}
