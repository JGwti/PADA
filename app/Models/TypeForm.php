<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TypeForm
 *
 * @property $id
 * @property $name_form
 * @property $code_form
 *
 * @property Form[] $forms
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TypeForm extends Model
{
    
    static $rules = [
		'name_form' => 'required',
		'code_form' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name_form','code_form'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function forms()
    {
        return $this->hasMany('App\Models\Form', 'type_form_id', 'id');
    }
    

}
