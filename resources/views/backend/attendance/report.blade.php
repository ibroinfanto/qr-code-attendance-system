@extends('layouts.backend.app')

@section('main')

    @component('layouts.backend.partials.header')
    @endcomponent

    @component('layouts.backend.partials.main.nav-bar')
    @endcomponent

    @component('layouts.backend.partials.main.hero', ['titleMain' => "Attendandance Management", 'titleSub' => 'Student LectureAttendance Report for ' . $lecture->course->title])
    @endcomponent

    @component('components.backend.attendance.report', ['students' => $students, 'lecture' => $lecture, 'attendedStudents' => $attendedStudents])
    @endcomponent

    @component('layouts.backend.partials.footer')
    @endcomponent

@endsection
