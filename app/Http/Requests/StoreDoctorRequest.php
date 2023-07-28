<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
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

            'firstname'=> 'required|string|max:255',
            'lastname'=> 'required|string|max:255',
            'department'=> 'nullable',
            'phone' => ['required', 'string', 'regex:/^059|056\d{7}$/'],
            'password' => 'required|min:8',
            'email' => 'required|unique:users,email',
            'avatar'=> 'required|mimes:png,jpg,jpeg',
            'gender'=> 'nullable',
            'address'=>'required|string',
            'date_of_birth'=> 'required|before:today',
        ];
    }
}
