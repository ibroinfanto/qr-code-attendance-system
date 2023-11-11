<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewStudentRequest;
use App\Models\Course;
use App\Models\School;
use App\Models\Student;
use App\Utils\Utility;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $students = Auth::user()->school->students;

        return response()->view('backend.students.all', ['students' => $students]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return response()->view('frontend.students.add', ['schools' => School::all(), 'levels' => Utility::STUDENT_LEVELS]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewStudentRequest $request
     */
    public function store(NewStudentRequest $request)
    {
        $request->validated();

        $student = Student::create([
            'name' => $request->get('name'),
            'level' => $request->get('level'),
            'matric' => $request->get('matric'),
            'school_id' => $request->get('school')
        ]);

        session()->put('student', $student->id);
        session()->put('school', $request->get('school'));

        return redirect()->route('students.add.course');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        return response()->view('backend.students.single', ['student' => Student::find($id)]);
    }

    public function storeCourse(Request $request) {

        $student = Student::find($request->id);

        $selectedCourses = Course::whereIn('id', $request->get('courses'))->get();

        $student->courses()->attach($selectedCourses);

        return redirect(route('login'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @return Response|void
     */
    public function courses()
    {
        try {

            $school = session()->get('school');
            $student = session()->get('student');

            $courses = School::find($school)->courses;

            return response()->view('frontend.students.add-course', ['courses' => $courses, 'student' => $student]);

        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
            Redirect::to('/');
        }

        Redirect::to('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy(int $id)
    {
        Student::destroy($id);
        Redirect::route('students.all');

        return redirect(route('students.all'));
    }


}
