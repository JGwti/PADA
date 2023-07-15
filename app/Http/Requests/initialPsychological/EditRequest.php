<?php

namespace App\Http\Requests\initialPsychological;

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
                'accept_conditions' => 'required',
                'day' => 'required',
                'mont' => 'required',
                'year' => 'required',
                'patients_laterality' => 'required|string|max:15',
                'marital_status' => 'required|string|max:15',
                'family_name' => 'required|string|max:50',
                'family_relationship' => 'required',
                'family_phone' => ['required','string','max:15',Rule::unique('initial_psychological_assessments')->ignore($this->route->parameters('initial_psychological_assessman'))],
                'family_phone' => 'unique:users,phone',
                'family_phone' => 'unique:patients,phone',
                'reason_consultation' => 'required|string',
                'overall_story' => 'required|string',
                'family_topic' => 'required|string',
                'social_topic' => 'required|string',
                'personal_topic' => 'required|string',
                'personal_history' => 'required|string',
                'family_history' => 'required|string',
                'healthy_state' => 'required|string',
                'general_observation' => 'required|string',
                'id_psychological' => 'required|exists:users,id',
            
        ];
    }
}
