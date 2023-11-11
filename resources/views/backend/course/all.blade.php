@extends('layouts.backend.app')

@section('main')

    @component('layouts.backend.partials.header')
    @endcomponent

    @component('layouts.backend.partials.main.nav-bar')
    @endcomponent

    @component('layouts.backend.partials.main.hero', ['titleMain' => "Course Management", 'titleSub' => 'View Courses for your institution'])
    @endcomponent

    @component('components.backend.course.all', ['courses' => $courses])
    @endcomponent

    @component('layouts.backend.partials.footer')
    @endcomponent

@endsection
