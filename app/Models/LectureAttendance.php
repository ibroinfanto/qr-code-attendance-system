<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LectureAttendance extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'student_attendance', `lecture_attendance_id`, 'student_id');
    }

    public function lectureClass(): HasOne
    {
        return $this->hasOne(LectureClass::class, 'attendance_id');
    }

}
