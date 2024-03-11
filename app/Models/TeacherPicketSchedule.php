<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherPicketSchedule extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['days', 'teacher'];

    public function days()
    {
        return $this->belongsTo(Days::class, 'id_hari');
    }

    public function teacher()
    {
        return $this->belongsTo(Teachers::class, 'id_guru');
    }
}
