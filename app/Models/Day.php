<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $table = 'days';

    protected $fillable = [
        'name',
    ];

    public function schedule_day()
    {
        return $this->hasMany(Schedule_Day::class, 'day_id', 'id');
    }}
