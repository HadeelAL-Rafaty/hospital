<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Doctor extends Model
{
    protected $table = 'doctors';

    protected $fillable = [
        'department_id',
        'firstname',
        'lastname',
        'date_of_birth',
        'email',
        'password',
        'gender',
        'address',
        'phone',
        'avatar',
        'biography',
        'status',


    ];

    public function department(){
        return $this->belongsTo(Department::class,'department_id','id');
    }

    public function transactions(){
        return $this->hasMany(Transaction::class,'id');
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class, 'doctor_id', 'id');
    }
 /*   public function schedule()
    {
        return $this->hasMany(Schedule::class, 'doctor_id', 'id');
    }*/

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];}
