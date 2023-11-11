<?php

namespace App\Http\Controllers;

use App\Http\Requests\LectureClassRequest;
use App\Models\LectureAttendance;
use App\Models\LectureClass;
use App\Models\Student;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use chillerlan\QRCode\QRCode;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LectureClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $examinations = Auth::user()->school->examinations;
        return view('backend.exams.all', ['exams' => $examinations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function create(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('backend.exams.add', ['courses' => Auth::user()->school->courses]);

    }

    public function mark(Request $request) {

        $matric = $request->get("matric");
        $lecture = $request->get("lecture");

        if($matric and $lecture) {

            $student = Student::where('matric', $matric)->first();
            $classLecture = LectureClass::find($lecture);

            //Create LectureAttendance

            LectureAttendance::create([

            ]);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param LectureClassRequest $request
     * @return Application|\Illuminate\Foundation\Application|RedirectResponse|Redirector
     */
    public function store(LectureClassRequest $request): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        $attendance = LectureAttendance::create(['title' => $request->get('exam_title') . "LectureAttendance"]);

        LectureClass::create([
            'title' => $request->get('exam_title'),
            'course_id' => $request->get('exam_course'),
            'date' => $request->get('exam_date'),
            'start_time' => $request->get('exam_start_time'),
            'stop_time' => $request->get('exam_stop_time'),
            'attendance_id' => $attendance->id,
            'school_id' => $request->user()->school->id,
            'added_by' => $request->user()->id,
        ]);

        return redirect(route('exam.all'));
    }

    /**
     * @param Request $request
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function getQr(Request $request): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $data = $request->getSchemeAndHttpHost() . "/qr/mark?lecture=" . $request->id;
        return view('backend.exams.display-qr', ['url' => "https://api.qrserver.com/v1/create-qr-code/?size=500x500&data=", 'data' => urldecode($data)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return Application|\Illuminate\Foundation\Application|Redirector|RedirectResponse
     */
    public function destroy(Request $request)
    {
        LectureClass::destroy($request->id);
        return redirect(route('exam.all'));

    }
}
