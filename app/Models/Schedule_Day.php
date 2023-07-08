<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule_Day extends Model
{
    protected $table = 'schedule_days';

    protected $fillable = [
        'schedule_id',
        'day_id',
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class,'schedule_id','id');
    }

    public function day()
    {
        return $this->belongsTo(Day::class,'day_id','id');
    }}
