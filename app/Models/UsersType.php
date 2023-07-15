<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersType
 *
 * @property $id
 * @property $name
 *
 * @property User[] $users
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class UsersType extends Model
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
    public function users()
    {
        return $this->hasMany('App\Models\User', 'user_type_id', 'id');
    }
    

}
