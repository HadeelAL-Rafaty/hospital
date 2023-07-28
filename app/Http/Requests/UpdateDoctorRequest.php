<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDoctorRequest extends FormRequest
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
            'name'=> 'required|string|max:255',
            'department'=> 'nullable',
            'phone' => ['required', 'string', 'regex:/^059|056\d{7}$/'],
            'avatar'=> 'nullable|mimes:png,jpg,jpeg',
            'gender'=> 'nullable',
            'address'=>'required|string',
            'date_of_birth'=> 'required|string|before:today',
        ];
    }
}
