<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    use HasFactory;

    public function teacherPicketSchedules()
    {
        return $this->hasMany(TeacherPicketSchedule::class);
    }
}
