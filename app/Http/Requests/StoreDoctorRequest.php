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
            'speacality'=> 'nullable',
            'phone'=> 'required|string|min:8|max:11',
            'password' => 'required|min:8',
            'email' => 'required|unique:doctors,email',
            'avatar'=> 'required|mimes:png,jpg,jpeg',
            'biography'=> 'required|string',
            'gender'=> 'nullable',
            'status'=> 'required|integer|in:0,1',
            'address'=>'required|string',
            'date_of_birth'=> 'required|date|before:today',
        ];
    }
}
