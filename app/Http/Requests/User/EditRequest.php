<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Route;
use App\Rules\ImageSize;
use App\Rules\ImageError;
use App\Rules\ImageExtension;

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
            'name' => 'required|string|max:50',
		    'last_name' => 'required|string|max:50',
		    'phone' => ['required','string','max:20',Rule::unique('users')->ignore($this->route->parameter('usuario'))],
		    'document_number' => ['required',Rule::unique('users')->ignore($this->route->parameter('usuario'))],
            'avatar'=>['file', new ImageError(), new ImageExtension(), new ImageSize()],
            'signature_professional'=>['file', new ImageError(), new ImageExtension(), new ImageSize()],
            'email' => ['required',Rule::unique('users')->ignore($this->route->parameter('usuario'))],
            'password'=>'max:16|min:8|nullable|confirmed',
            'user_type_id' => 'required|exists:users_types,id',
            'document_type_id' => 'required|exists:document_types,id',
        ];
    }
}
