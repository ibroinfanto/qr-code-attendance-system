@extends('layouts.backend.app')

@section('main')

    @component('layouts.backend.partials.header')
    @endcomponent

    @component('layouts.backend.partials.main.nav-bar')
    @endcomponent

    @component('layouts.backend.partials.main.hero', ['titleMain' => "Class Lecture Management", 'titleSub' => 'View all classes you have'])
    @endcomponent

    @component('components.backend.exams.all', ['exams' => $exams])
    @endcomponent

    @component('layouts.backend.partials.footer')
    @endcomponent

@endsection
