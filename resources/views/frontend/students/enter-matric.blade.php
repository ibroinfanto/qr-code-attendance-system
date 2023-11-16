@extends('layouts.frontend.app')

@section('main')

    @component('components.frontend.students.enter-matric', ['attendance' => $attendance, 'lecture' => $lecture])
    @endcomponent

@endsection
