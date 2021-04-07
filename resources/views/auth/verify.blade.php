@extends('layout.auth')

@section('verify')
<div class="login-box">
    <!-- /.logo-image -->
    <div class="login-logo">
        <a href="#"><b>{{__('auth.verify.title_1')}}</b> {{__('auth.verify.title_2')}}</a>
    </div>
    <!-- /.login-logo -->
    <div class="card shadow-none">
        <div class="card-body login-card-body bg-light">

            @if (session('resent'))
            <div class="alert alert-success alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ __('auth.verify.resend') }}
            </div>
            @endif

            <p class="login-box-msg">{{__('auth.verify.message')}}</p>

            <div class="row">
                <div class="col-12">
                    <form class="form-group" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit"
                            class="btn btn-primary btn-block">{{ __('auth.verify.re-resend') }}</button>
                    </form>
                </div>
            </div>

            <p class="login-box-msg"><a href="{{route('login')}}" >{{__('auth.verify.login')}}</a></p>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>

@endsection
