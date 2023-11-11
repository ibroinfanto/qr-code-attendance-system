@extends('layouts.backend.app')

@section('main')

    @component('layouts.backend.partials.header')
    @endcomponent

    @component('layouts.backend.partials.main.nav-bar')
    @endcomponent

    @component('layouts.backend.partials.main.hero', ['titleMain' => "LectureAttendance System", 'titleSub' => 'Manage all your students attendance at ease'])
    @endcomponent

    @component('components.home', ['info' => $info])
    @endcomponent

    @component('layouts.backend.partials.footer')
    @endcomponent

@endsection
