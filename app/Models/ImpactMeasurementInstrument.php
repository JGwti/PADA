<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ImpactMeasurementInstrument
 *
 * @property $id
 * @property $item_one
 * @property $item_two
 * @property $item_three
 * @property $item_four
 * @property $item_five
 * @property $item_six
 * @property $program_strengths
 * @property $improvements_program
 * @property $created_at
 * @property $updated_at
 * @property $form_id
 *
 * @property Form $form
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ImpactMeasurementInstrument extends Model
{

    static $rules = [
		'item_one' => 'required',
		'item_two' => 'required',
		'item_three' => 'required',
		'item_four' => 'required',
		'item_five' => 'required',
		'item_six' => 'required',
		'program_strengths' => 'required',
		'improvements_program' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['item_one','item_two','item_three','item_four','item_five','item_six','program_strengths','improvements_program','form_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function form()
    {
        return $this->hasOne('App\Models\Form', 'id', 'form_id');
    }


}
