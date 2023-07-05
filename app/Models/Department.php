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
/*
  /*  public function schedule()
    {
        return $this->hasMany(Schedule::class, 'department_id', 'id');
    }*/
}
