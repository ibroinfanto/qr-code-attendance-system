<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LectureClass extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'start_time', 'stop_time', 'date', 'course_id', 'added_by', 'school_id', 'attendance_id'];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function attendance(): HasOne
    {
        return $this->hasOne(LectureAttendance::class, 'attendance_id');
    }

}

