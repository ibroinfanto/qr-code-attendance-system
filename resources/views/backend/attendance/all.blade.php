@extends('layouts.backend.app')

@section('main')

    @component('layouts.backend.partials.header')
    @endcomponent

    @component('layouts.backend.partials.main.nav-bar')
    @endcomponent

    @component('layouts.backend.partials.main.hero', ['titleMain' => "LectureAttendance Management", 'titleSub' => 'Manage attendances for your lecture'])
    @endcomponent

    @component('components.backend.attendance.all', ['attendances' => $attendances])
    @endcomponent

    @component('layouts.backend.partials.footer')
    @endcomponent

@endsection
