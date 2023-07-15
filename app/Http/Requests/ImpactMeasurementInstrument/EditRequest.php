<?php

namespace App\Http\Requests\ImpactMeasurementInstrument;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'item_one' => 'required',
            'item_two' => 'required',
            'item_three' => 'required',
            'item_four' => 'required',
            'item_five' => 'required',
            'item_six' => 'required',
            'program_strengths' => 'required',
            'improvements_program' => 'required',
        ];
    }
}
