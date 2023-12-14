<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\LectureAttendance;
use App\Models\LectureClass;
use App\Models\Student;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use RuntimeException;


class LectureAttendanceController extends Controller
{
    public function index(Request $request)
    {
        $lectureId = $request->lectureId ?? false;

        $attendances = $lectureId
            ? LectureAttendance::where('lecture_class_id', $lectureId)->get()
            : LectureAttendance::all();

        return view('backend.attendance.all', compact('attendances'));
    }

    public function mark(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $lectureClass = LectureClass::find($request->input('lecture'));

        if ($this->isSubmissionTimeInRange($lectureClass->date, $lectureClass->start_time, $lectureClass->stop_time)) {
            return view("frontend.students.enter-matric", [
                'attendance' => $lectureClass->attendance_id,
                'lecture' => $lectureClass->id,
            ]);
        }

        $message = "Time expired or not yet available";
        return view("frontend.students.attendance-marked", ['message' => $message]);
    }


    public function report(Request $request)
    {
        try {
            $attendance = LectureAttendance::with('lectureClass.course.students')->find($request->id);
            $lecture = $attendance->lectureClass;

            $students = $attendance->lectureClass->course->students;
            $attendedStudents = $attendance->students->pluck('id');

            throw_if($students->isEmpty(), new RuntimeException("No student data found for this attendance"));

            return view('backend.attendance.report', compact('students', 'attendance', 'attendedStudents', 'lecture'));
        } catch (RuntimeException $ex) {
            return back()->with('info', $ex->getMessage());
        }
    }

    function isSubmissionTimeInRange($givenDate, $startTime, $stopTime): bool
    {
        // Get the start and stop times as Carbon instances
        $startDateTime = Carbon::createFromFormat('Y-m-d H:i', $givenDate . ' ' . $startTime);
        $stopDateTime = Carbon::createFromFormat('Y-m-d H:i', $givenDate . ' ' . $stopTime);

        // Get the current time
        $currentTime = Carbon::now();
        // Check if the current time is within the specified range
        return $currentTime->between($startDateTime, $stopDateTime);
    }

    public function enterMatric(Request $request)
    {
        if ($request->attendance && $request->lecture) {
            $request->validate([
                "matric" => 'required',
                'lecture' => [Rule::exists('lecture_classes', 'id')],
            ]);

            $lectureAttendance = LectureAttendance::find($request->attendance);
            $lectureClass = LectureClass::find($request->lecture);

            $student = Student::where('matric', $request->matric)->first();

            if ($student) {
                $attendanceRecord = $student->lectureAttendances()
                    ->where(['origin' => $request->getClientIp(), 'lecture_attendance_id' => $request->attendance])
                    ->first();

                if ($attendanceRecord) {
                    $message = "Attendance already marked from this device. Note you can't mark attendance for different matric numbers from the same device";
                } elseif ($student->courses->contains($lectureClass->course) && !$lectureAttendance->students->contains($student)) {
                    $lectureAttendance->students()->attach($student, ['origin' => $request->getClientIp(), 'taken_at' => now()]);
                    $message = "Attendance marked successfully";
                } else {
                    $message = "You are either not offering this course or you have marked attendance already";
                }
            }

            return view("frontend.students.attendance-marked", compact('message'));
        }
    }


    public function semesterReport(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $lectureClasses = LectureClass::where('added_by', $request->user()->id)->get();

        $lectureInfo = $lectureClasses->map(function ($lectureClass) {
            $lectureCourse = $lectureClass->course;
            $totalStudentCourse = $lectureCourse->students->count();

            $totalAttendedStudents = LectureAttendance::find($lectureClass->attendance_id)->students->count();

            $performance = ($totalStudentCourse > 0) ? ($totalAttendedStudents / $totalStudentCourse) * 100 : 0;

            return [
                "lecture" => $lectureClass,
                "performance" => round($performance, 2),
            ];
        });

        return view('backend.attendance.semester-report', compact('lectureInfo'));
    }

    public function semesterReportCourse(Request $request)
    {
        $info = [];

        $course = Course::find($request->course);

        $students = $course->students;

        $lectureClasses = $course->lectureClass;

        foreach ($students as $student) {
            $stdAvgScore = $this->getStudentAvgScore($student, $lectureClasses);
            $info[] = ['student' => $student, 'score' => $stdAvgScore, 'lecture' => $lectureClasses];
        }

        return view('backend.attendance.semester-report-course', compact('info'));

    }

    private function getStudentAvgScore(Student $student, $lectureClasses): float|int
    {
        $score = 0;

        foreach ($lectureClasses as $lectureClass) {
            $attendance = LectureAttendance::find($lectureClass->attendance_id);
            if ($attendance->students->contains($student)) {
                $score = $score + 1;
            }
        }

        return round(($score / $lectureClasses->count() * 100), 2);
    }

}
