<?php

namespace App\Http\Requests\Patient;

use Illuminate\Routing\Route;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;



class EditRequest extends FormRequest
{
    protected $route;

    public function __construct(Route $route){
        $this->route = $route;
    }
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
            'document_number' => ['required','numeric',Rule::unique('patients')->ignore($this->route->parameter('paciente'))],
            'name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'age' => 'required|integer',
            'date_birth' => 'required|date',
            'address' => 'required|string',
            'phone' => ['required','string','max:20',Rule::unique('patients')->ignore($this->route->parameter('paciente'))],
            'email' => ['required','email:filter',Rule::unique('patients')->ignore($this->route->parameter('paciente'))],
            'password'=>'max:16|min:8|nullable|confirmed',
            'document_type_id' => 'required|exists:document_types,id',
            'patient_type_id' => 'required|exists:patient_types,id',
            'gender_type_id' => 'required|exists:gender_types,id',
            'academic_program_id' => 'required|exists:academic_programs,id',
            'semester_id' => 'required|exists:semesters,id',
            'eps_id' => 'required|exists:eps,id',
            'state_id' => 'required|exists:states,id',
            'countrie_id' => 'required|exists:countries,id',
            'citie_id' => 'exists:cities,id',
            ];
    }
}
