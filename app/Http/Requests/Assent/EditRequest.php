<?php

namespace App\Http\Requests\Assent;

use App\Rules\ImageSize;
use App\Rules\ImageError;
use App\Rules\ImageExtension;
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
            'professional_area' => 'required',
            'day' => 'required',
            'mont' => 'required',
            'year' => 'required',
            'city' => 'required',
            'patient_signature' => ['file', new ImageError(), new ImageExtension(), new ImageSize()],
            'representative_signature' => ['file', new ImageError(), new ImageExtension(), new ImageSize()],
            'representative_name' => 'required|string|max:100',
            'representative_document_number' =>'required|numeric',
            'id_psychological' => 'required|exists:users,id',
            'id_psychopedagogical' => 'required|exists:users,id',
        ];
    }
}
