<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModuleRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'settings' => 'required|array',
            'settings.clickout' => 'url',
            'settings.dimensions' => 'required|array',
            'settings.dimensions.width' => 'required|integer|min:1|max:100',
            'settings.dimensions.height' => 'required|integer|min:1|max:100',
            'settings.position' => 'required|array',
            'settings.position.X' => 'required|integer|min:1|max:100',
            'settings.position.Y' => 'required|integer|min:1|max:100',
        ];
    }
}
