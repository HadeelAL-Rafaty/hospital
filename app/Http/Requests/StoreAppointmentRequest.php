<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
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
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'start_date_time' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'patient_id.required' => 'يرجى تحديد معرف المريض.',
            'day.required' => 'يرجى تحديد اليوم.',
            'time.required' => 'يرجى تحديد الوقت.',
            'time.unique' => 'الوقت المحدد مكرر في المواعيد.',
        ];
    }
}
