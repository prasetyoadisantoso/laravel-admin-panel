@extends('layout.admin')

@section('administrator')

@include('admin.partial.header')

@include('admin.partial.sidebar')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    {{-- Dashboard Page --}}
    @yield('dashboard')

    {{-- User Page --}}
    @yield('user')
    @yield('form-user')

    {{-- Role Page --}}
    @yield('role')
    @yield('form-role')

</div>
<!-- /.content-wrapper -->

@include('admin.partial.footer')

@endsection
