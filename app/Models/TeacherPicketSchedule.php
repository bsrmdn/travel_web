<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherPicketSchedule extends Model
{
    use HasFactory;

    public function days()
    {
        return $this->belongsTo(Days::class, 'id_hari');
    }
}
