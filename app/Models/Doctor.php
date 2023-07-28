<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;


class Doctor extends  Model
{
 use Notifiable ,HasFactory;

    protected $table = 'doctors';

    protected $fillable = [
        'department_id',
        'user_id',
        'date_of_birth',
        'gender',
        'address',
        'phone',
        'avatar',



    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public static function countDoctors()
    {
        $count =Doctor::count();
        return $count;
    }
    public function user()
    {

        return $this->belongsTo(User::class,'user_id','id');
    }
    public function department(){
        return $this->belongsTo(Department::class,'department_id','id');
    }

    public function transactions(){
        return $this->hasMany(Transaction::class,'id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'doctor_id', 'id');
    }
    public function schedule()
    {
        return $this->hasMany(Schedule::class, 'doctor_id', 'id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];}
