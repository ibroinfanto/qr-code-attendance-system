<?php

namespace App\Http\Controllers;

use App\Models\LectureAttendance;
use App\Models\LectureClass;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use RuntimeException;


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
        $lectureClass = LectureClass::find($request->get('lecture'));
        return view("frontend.students.enter-matric", ['attendance' => $lectureClass->attendance_id, 'lecture' => $lectureClass->id]);
    }

    public function report(Request $request)
    {
        try {

            $attendance = LectureAttendance::find($request->id);

            $students = $attendance->lectureClass->course->students;
            $attendedStudents = $attendance->students->map(function ($stud) {return $stud->id;});

            throw_if($students->count() < 1, new RuntimeException("No Student Data found for this attendance"));

            return view('backend.attendance.report', ['students' => $students, 'lecture' => $attendance->lectureClass, 'attendedStudents' => $attendedStudents]);
        } catch (RuntimeException $ex) {
            return back()->with('info', $ex->getMessage());
        } catch (\Throwable $th) {
//            session()->regenerate();
//            Auth::logout();

        }
    }

    public function enterMatric(Request $request)
    {

        if ($request->attendance and $request->lecture) {

//            dd("here");

            $request->validate(["matric" => ['required'], 'lecture' => [Rule::exists('lecture_classes', 'id')]]);

            $lectureAttendance = LectureAttendance::find($request->attendance);
            $lectureClass = LectureClass::find($request->lecture);

            $student = Student::where('matric', $request->get('matric'))->first();

            if ($student and $student->courses->contains($lectureClass->course) and !$lectureAttendance->students->contains($student)) {
                $lectureAttendance->students()->attach($student);
                $message = "Attendance marked successfully";
            } else {
                $message = "You are either not offering this course or you have marked attendance already";
            }
            return view("frontend.students.attendance-marked", ['message' => $message]);
        }

    }

}
