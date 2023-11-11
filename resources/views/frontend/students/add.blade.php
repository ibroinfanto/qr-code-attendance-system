@extends('layouts.frontend.app')

@section('main')

    @component('components.frontend.students.add', ['levels' => $levels, 'schools' => $schools])
    @endcomponent

@endsection
