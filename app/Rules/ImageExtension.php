<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ImageExtension implements Rule
{
    protected $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $extension = strtolower($value->getClientOriginalExtension());//almacenar el archivo
        return in_array($extension, $this->allowed_extensions);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La extencion de la imagen no es valida.';
    }
}
