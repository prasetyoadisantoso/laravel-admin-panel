@extends('layout.auth')

@section('reset')

<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="" class="h1"><b>{{__('auth.reset.title_1')}}</b><br>{{__('auth.reset.title_2')}}</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">{{__('auth.reset.message')}}</p>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="input-group mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="{{__('auth.reset.email')}}" name="email" required autocomplete="email" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="{{__('auth.reset.password')}}" name="password" required autocomplete="new-password"
                        autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-key"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="{{__('auth.reset.confirm_password')}}"
                        name="password_confirmation" autocomplete="new-password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">{{__('auth.reset.request')}}</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
