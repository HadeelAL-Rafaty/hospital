<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departmentes';

    protected $fillable = [
        'name',
        'status',


    ];

    public function doctor()
    {
        return $this->hasMany(Doctor::class,'department_id','id');
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class, 'department_id', 'id');
    }
}
