@extends('layouts.frontend.app')

@section('main')

    @component('components.frontend.students.add-course', ['courses' => $courses, 'student' => $student])
    @endcomponent

@endsection
