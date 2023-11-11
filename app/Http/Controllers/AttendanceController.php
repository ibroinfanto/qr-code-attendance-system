<?php

namespace App\Http\Controllers;

use App\Models\LectureAttendance;
use App\Models\LectureClass;
use App\Models\Student;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use RuntimeException;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function index(Request $request): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $examinationId = $request->studentId ?? false;

        $attendances = ($examinationId) ? LectureAttendance::where('examination_id', $examinationId) : LectureAttendance::all();
        return view('backend.attendance.all', ['attendances' => $attendances]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Application|Factory|View|\Illuminate\Foundation\Application|RedirectResponse
     */
    public function authenticate(Request $request): \Illuminate\Foundation\Application|View|Factory|RedirectResponse|Application
    {
        if ($request->method() == "GET") {

            $allAttendace = LectureAttendance::all();

            return view('backend.attendance.authenticate', ['attendances' => $allAttendace]);
        }

        $request->validate([
            'matric' => ['required', Rule::exists('students', 'matric')],
            'attendance' => ['required', Rule::exists('attendances', 'id')
            ]]);


        $student = Student::where('matric', $request->get('matric'))->first();
        $attendance = LectureAttendance::find($request->get('attendance'));

        $exam = LectureClass::where('attendance_id', $attendance->id)->get();

        $cheb = array_intersect($student->courses->map(function ($val) {
            return $val->id;
        })->all(), $exam->map(function ($val) {
            return $val->id;
        })->all());

        //Check if student is already marked
        $studentAttendance = $student->attendances->map(function ($att) {
            return $att->id;
        })->all();

        if (in_array($attendance->id, $studentAttendance)) {
            return back()->with('info', "Student with matric " . $request->get('matric') . " already marked for this exam");
        }

        if (count($cheb) > 0) {
            return redirect(route('students.view', ['id' => $student->id]))->with('data', "found")->with('attendance', $attendance->id);
        }

        return back()->with('info', "Student with matric " . $request->get('matric') . " not found for this exam");


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|\Illuminate\Foundation\Application|RedirectResponse|Response|Redirector
     */
    public function mark(Request $request): \Illuminate\Foundation\Application|Response|Redirector|RedirectResponse|Application
    {
        $attendance = $request->get('attendance');

        if ($attendance) {

            $student = Student::find($request->id);

            $student
                ->attendances()
                ->attach(LectureAttendance::find($request->get('attendance')));

            return redirect(route('attendance.authenticate'))->with('success', 'LectureAttendance for ' . $student->matric . ' marked successfully');
        }

        return redirect(route('dashboard'));
    }


    public function report(Request $request)
    {
        try {

            $attendance = LectureAttendance::find($request->id);

            $students = $attendance->students;

            throw_if($students->count() < 1, new RuntimeException("No Student Data found for this attendance"));

            return view('backend.attendance.report', ['students' => $students, 'course' => $attendance->examination]);
        } catch (RuntimeException $ex) {
            return back()->with('info', $ex->getMessage());
        } catch (\Throwable $th) {
            session()->regenerate();
            Auth::logout();

        }
    }

}
