<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSchedule extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['classGrade', 'mataPelajaran', 'days'];

    public function classGrade()
    {
        return $this->belongsTo(ClassGrade::class, 'id_kelas');
    }
    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'id_mapel');
    }
    public function days()
    {
        return $this->belongsTo(Days::class, 'id_hari');
    }
}
