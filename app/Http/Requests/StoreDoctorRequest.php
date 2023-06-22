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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'firstname'=> 'required|string',
            'lastname'=> 'required|string',
            'speacality'=> 'required|string',
            'phone'=> 'required|string|min:8|max:11',
            'avatar'=> 'required|mimes:png,jpg,jpeg',
            'biography'=> 'required|text',
            'status'=> 'required|string',
            'gender'=> 'required|string',
            'address'=>'required|text',
            'date_of_birth'=> 'required|date|before_or_equal:today',
        ];
    }
}
