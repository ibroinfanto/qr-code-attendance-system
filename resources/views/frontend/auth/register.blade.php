@extends('layouts.frontend.app')

@section('main')

    @component('components.frontend.auth.register', ['schools' => $schools])
    @endcomponent

@endsection
