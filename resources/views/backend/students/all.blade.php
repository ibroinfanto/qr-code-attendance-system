@extends('layouts.backend.app')

@section('main')

    @component('layouts.backend.partials.header')
    @endcomponent

    @component('layouts.backend.partials.main.nav-bar')
    @endcomponent

    @component('layouts.backend.partials.main.hero', ['titleMain' => "Student Management", 'titleSub' => 'Manage all students in your school'])
    @endcomponent

    @component('components.backend.students.all', ['students' => $students])
    @endcomponent

    @component('layouts.backend.partials.footer')
    @endcomponent

@endsection
