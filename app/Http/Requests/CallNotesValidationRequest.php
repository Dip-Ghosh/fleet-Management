<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CallNotesValidationRequest extends FormRequest
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
            'call_note_type' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'call_note_type.required' => 'Call Note is required!'
        ];
    }
}
