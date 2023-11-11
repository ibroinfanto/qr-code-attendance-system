@extends('layouts.frontend.app')

@section('main')

    @component('components.frontend.students.attendance-marked', ['message' => $message])
    @endcomponent

@endsection
