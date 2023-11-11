@extends('layouts.backend.app')

@section('main')

    @component('layouts.backend.partials.header')
    @endcomponent

    @component('layouts.backend.partials.main.nav-bar')
    @endcomponent

    @component('layouts.backend.partials.main.hero', ['titleMain' => "Attendandance Management", 'titleSub' => 'Take Student LectureAttendance'])
    @endcomponent

    @component('components.backend.attendance.authenticate', ['attendances' => $attendances])
    @endcomponent

    @component('layouts.backend.partials.footer')
    @endcomponent

@endsection
