<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewCourseRequest;
use App\Models\Course;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('backend.course.all', ['courses' => Auth::user()->school->courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Foundation\Application|Application|Factory|View
     */
    public function create(): Application|Factory|View|\Illuminate\Foundation\Application
    {
        return view ('backend.course.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Application|\Illuminate\Foundation\Application|RedirectResponse|Redirector
     */
    public function store(NewCourseRequest $request): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        $request->validated();

        Course::create([
            'title' => $request->get('course_title'),
            'code' => $request->get('course_code'),
            'unit' => $request->get('course_unit'),
            'school_id' => Auth::user()->school->id
        ]);

        return redirect(route('course.all'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return Response
     */
    public function destroy(Request $request)
    {
        Course::destroy($request->id);

        return redirect(route('course.all'));
    }
}
