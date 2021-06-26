@extends('layout.client')

@section('main')

{{-- Header --}}
@include('client.partial.header')

<main role="main">

    {{-- Home Content --}}
    @yield('home')

    {{-- Page Content --}}
    @yield('page')

</main>

{{-- Footer --}}
@include('client.partial.footer')

@endsection
