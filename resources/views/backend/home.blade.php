@extends('layouts.backend.app')

@section('main')

    @component('layouts.backend.partials.header')
    @endcomponent

    @component('layouts.backend.partials.main.nav-bar')
    @endcomponent

    @component('layouts.backend.partials.main.hero', ['titleMain' => "Home title", 'titleSub' => 'Home subtitle'])
    @endcomponent

    @component('components.home')
    @endcomponent

    @component('layouts.backend.partials.footer')
    @endcomponent

@endsection
