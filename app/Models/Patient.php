<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Patient extends Model
{
    protected $table = 'patients';
    protected $fillable = [
        'fullname',
        'idnumber',
        'phone',

    ];

    public function getAge()
    {
        return Carbon::createFromFormat('d/m/Y', $this->date_of_birth)->age;
    }

public function appointment()
{
    return $this->hasMany(Appointment::class, 'patient_id', 'id');
}

}
