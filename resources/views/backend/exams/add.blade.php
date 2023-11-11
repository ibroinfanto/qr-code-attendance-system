@extends('layouts.backend.app')

@section('main')

    @component('layouts.backend.partials.header')
    @endcomponent

    @component('layouts.backend.partials.main.nav-bar')
    @endcomponent

    @component('layouts.backend.partials.main.hero', ['titleMain' => "Class Lecture Management", 'titleSub' => 'Create a new class lecture'])
    @endcomponent

    @component('components.backend.exams.add', ['courses' => $courses])
    @endcomponent

    @component('layouts.backend.partials.footer')
    @endcomponent

@endsection
