@extends('layout.auth')

@section('login')

{{-- Login-box --}}
<div class="login-box">
    <div class="card card-outline card-primary">

        <div class="card-header text-center">
            <a href="" class="h1"><b>{{__('auth.login.title_1')}}</b><br>{{__('auth.login.title_2')}}</a>
        </div>

        <div class="card-body">
            {{-- Sub-title --}}
            <p class="login-box-msg">{{__('auth.login.subtitle')}}</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="{{__('auth.login.email')}}" name="email"
                        id="email" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" id="password" class="form-control"
                        placeholder="{{__('auth.login.password')}}" name="password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">
                                {{ __('auth.login.remember_me') }}
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">{{__('auth.login.sign_in')}}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mb-1">
                <a href="{{route('password.request')}}">{{__('auth.login.forgot_password')}}</a>
            </p>
            <p class="mb-0">
                <a href="{{route('register')}}" class="text-center">{{__('auth.login.register')}}</a>
            </p>
        </div>

    </div>
</div>

@endsection
