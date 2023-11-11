@extends('layouts.backend.app')

@section('main')

    @component('layouts.backend.partials.header')
    @endcomponent

    @component('layouts.backend.partials.main.nav-bar')
    @endcomponent

    @component('layouts.backend.partials.main.hero', ['titleMain' => "Staff Management", 'titleSub' => 'Manage all the staff in your school'])
    @endcomponent

    @component('components.backend.users.single', ['user' => $user])
    @endcomponent

    @component('layouts.backend.partials.footer')
    @endcomponent

@endsection
