<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PresetRemarkValidationRequest extends FormRequest
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


    public function rules()
    {
        return [
            'preset_remark_type' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'preset_remark_type.required' => 'Preset Remark is required!'
        ];
    }
}
