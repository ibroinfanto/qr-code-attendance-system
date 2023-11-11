<?php

namespace App\Http\Controllers;

use App\Models\LectureAttendance;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request) {

        $user = $request->user();

        $examinations = $user->school->examinations->map(function($value) { return $value->attendance_id;});

        $info = [
            'attendance' => LectureAttendance::whereIn('id', $examinations->all())->get(),
            'exams' => $user->school->examinations,
            'students' => $user->school->students,
            'courses' => $user->school->courses
        ];

        return view('backend.dashboard', ['info' => $info]);
    }
}
