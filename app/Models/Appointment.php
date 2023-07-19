<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [ 'patient_id', 'doctor_id','start_date_time','end_date_time','notes'];

    public static function countAppointments()
    {
        $count =Appointment::count();
        return $count;
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id','id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id','id');
    }
    public function department(){
        return $this->belongsTo(Department::class,'department_id','id');
    }
}
