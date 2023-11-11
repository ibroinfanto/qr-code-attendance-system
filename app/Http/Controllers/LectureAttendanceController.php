<?php

namespace App\Http\Controllers;

use App\Models\LectureAttendance;
use App\Models\LectureClass;
use App\Models\Student;
use Illuminate\Http\Request;


class LectureAttendanceController extends Controller
{
    public function index(Request $request)
    {

        $lectureId = $request->lectureId ?? false;

        $attendances = ($lectureId) ? LectureAttendance::where('lecture_class_id', $lectureId) : LectureAttendance::all();
        return view('backend.attendance.all', ['attendances' => $attendances]);

    }

    public function mark(Request $request)
    {
        $message = "";
        if (!$request->has('lecture') or !$request->has('matric')) {
            $message = "Invalid QR code";
        }

        $lectureClass = LectureClass::find($request->get('lecture'));

        if ($lectureClass) {
            $lectureAttendance = LectureAttendance::find($lectureClass->attendance_id);

            $student = Student::find($request->get('matric'));

            if ($student and $student->courses->contains($lectureClass->course) and !$lectureAttendance->students->contains($student)) {
                $lectureAttendance->students()->attach($student);
            }
            else {
                $message = "You are either not offering this course or you have marked attendance already";

            }
        }

        return view("frontend.students.attendance-marked", ['message' => $message]);
    }
}
