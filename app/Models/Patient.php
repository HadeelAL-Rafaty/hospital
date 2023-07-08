<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';
    protected $fillable = ['name','email','age', 'address', 'phone_number'];



public function appointment()
{
    return $this->hasMany(Appointment::class, 'patient_id', 'id');
}

}
