@extends('layout.auth')

@section('register')
<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="" class="h1"><b>{{__('auth.login.title_1')}}</b><br>{{__('auth.login.title_2')}}</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">{{__('auth.register.subtitle')}}</p>

            <form method="POST" action="{{ route('register') }}">

                @csrf

                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" placeholder="{{__('auth.register.full_name')}}"
                        required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="{{__('auth.register.email')}}"
                        required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password"
                        placeholder="{{__('auth.register.password')}}" autocomplete="new-password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-key"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password_confirmation"
                        placeholder="{{__('auth.register.confirm_password')}}" autocomplete="new-password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms">
                                {{__('auth.register.agree')}} <a href="#">{{__('auth.register.terms')}}</a>
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">{{__('auth.register.sign_up')}}</button>
                    </div>
                </div>

            </form>

            <a href="{{route('login')}}" class="text-center">{{__('auth.register.membership')}}</a>

        </div>
</div>
@endsection
