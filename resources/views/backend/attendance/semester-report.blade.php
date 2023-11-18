@extends('layouts.backend.app')

@section('main')

    @component('layouts.backend.partials.header')
    @endcomponent

    @component('layouts.backend.partials.main.nav-bar')
    @endcomponent

    @component('layouts.backend.partials.main.hero', ['titleMain' => "Lecture Class Semester Report", 'titleSub' => 'View report for Lecture classes for various courses in a semester'])
    @endcomponent

    @component('components.backend.attendance.semester-report', ['lectureInfo' => $lectureInfo])
    @endcomponent

    @component('layouts.backend.partials.footer')
    @endcomponent

@endsection
