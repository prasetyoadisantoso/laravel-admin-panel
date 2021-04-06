@extends('layout.auth')

@section('email')

<div class="login-box">
    <div class="card card-outline card-primary">

        {{-- Title --}}
        <div class="card-header text-center">
            <a href="" class="h1"><b>{{__('auth.forgot.title_1')}}</b><br>{{__('auth.forgot.title_2')}}</a>
        </div>

        {{-- Form --}}
        <div class="card-body">

            @if (session('status'))
            <div class="alert alert-success alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ session('status') }}
            </div>
            @endif

            <p class="login-box-msg">{{__('auth.forgot.message')}}</p>
            <form method="POST" action="{{ route('password.email') }}">

                @csrf

                <div class="input-group mb-3">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input id="email" name="email" type="email"
                        class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                        value="{{ old('email') }}" autocomplete="email" autofocus required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">{{__('auth.forgot.request')}}</button>
                    </div>
                    <!-- /.col -->
                </div>

            </form>

            <p class="login-box-msg"><a href="{{route('login')}}">{{__('auth.forgot.login')}}</a></p>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->


{{-- <div class="login-box">
    <!-- Logo Image -->
    <div class="login-logo mb-0">
        <img src="{{asset('assets/admin/image/travel-logo.png')}}" alt="User Image" width="50">
    </div>
    <!-- /.logo-image -->
    <div class="login-logo">
        <a href="#">{{__('auth.forgot.title_1')}}</a>
    </div>
    <!-- /.login-logo -->
    <div class="card shadow-none">
        <div class="card-body login-card-body bg-light">

            @if (session('status'))
            <div class="alert alert-success alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ session('status') }}
            </div>
            @endif

            <p class="login-box-msg">{{__('auth.forgot.message')}}</p>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="input-group mb-3">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input id="email" name="email" type="email"
                        class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                        value="{{ old('email') }}" autocomplete="email" autofocus required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-danger btn-block">{{__('auth.forgot.request')}}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <br>

            <p class="login-box-msg"><a href="{{route('login')}}">{{__('auth.forgot.login')}}</a></p>

        </div>
        <!-- /.login-card-body -->
    </div>
</div> --}}
@endsection
