<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRequest extends FormRequest
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
            'fullname'=> 'required|string|max:255',
            'phone' => ['required', 'string', 'regex:/^059|056\d{7}$/'],
            'idnumber' => 'required|unique:patients|digits:11',
        ];
    }
}
