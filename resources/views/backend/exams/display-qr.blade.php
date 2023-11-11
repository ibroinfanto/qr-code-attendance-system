@extends('layouts.backend.app')

@section('main')

    @component('layouts.backend.partials.header')
    @endcomponent

    @component('layouts.backend.partials.main.nav-bar')
    @endcomponent

    @component('layouts.backend.partials.main.hero', ['titleMain' => "View QR CODE", 'titleSub' => 'QR code for class attendance'])
    @endcomponent

    @component('components.backend.exams.display-qr', ['url' => $url, 'data' => $data])
    @endcomponent

    @component('layouts.backend.partials.footer')
    @endcomponent

@endsection
