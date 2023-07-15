<?php

namespace App\Http\Requests\IndividualTracking;

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
            
                'session_number' => 'required',
                'day' => 'required',
                'mont' => 'required',
                'year' => 'required',
                'line' => 'required',
                'process' => 'required',
                'objective' => 'required',
                'session_description' => 'required',
                'observations' => 'required',
                'user_id' => 'required|exists:users,id',

        ];
    }
}
