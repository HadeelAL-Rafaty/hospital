<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreScheduleRequest extends FormRequest
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
            'doctor_id' => 'required',
            'available_days' => 'required|unique:schedules,available_days,NULL,id,doctor_id,' . $this->input('doctor_id'),
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',

        ];
    }
}
