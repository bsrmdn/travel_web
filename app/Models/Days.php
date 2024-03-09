<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Days extends Model
{
    use HasFactory;

    public function courseSchedules()
    {
        return $this->hasMany(CourseSchedule::class);
    }

    public function teacherPicketSchedule()
    {
        return $this->hasMany(teacherPicketSchedule::class);
    }
}
