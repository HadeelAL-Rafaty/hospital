<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';

    protected $fillable = [
        'doctor_id',
        'available_days',
        'start_time',
        'end_time',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }
    public function transactions(){
        return $this->hasMany(Transaction::class,'id');
    }
}
