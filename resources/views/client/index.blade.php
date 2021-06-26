@extends('layout.client')

@section('main')

{{-- Header --}}
@include('client.partial.header')

<main role="main">

    {{-- Home Content --}}
    @yield('home')

</main>

{{-- Footer --}}
@include('client.partial.footer')

@endsection
