<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- SEO Tag --}}
    <meta name="description" CONTENT="{{$global->MetaDescription}}">
    <meta name="google-site-verification" content="{{$global->MetaGoogleSiteVerification}}"/>
    <meta name="robots" content="noindex,nofollow">

    {{-- Favicon --}}
    <link rel="icon" href="{{Storage::url($favicon)}}">

    {{-- Title --}}
    <title>{{$global->SiteName}} | {{isset($global->RouteName) ?  ucfirst(strtok($global->RouteName, '.')) : ''}}
    </title>

    {{-- Bootstrap 5 --}}
    <link rel="stylesheet" href="{{asset('assets/Client/bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('assets/Client/bootstrap/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/Client/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/Client/bootstrap/js/popper.min.js')}}"></script>

    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="{{asset('assets/Client/bootstrap/bootstrap-icons/bootstrap-icons.css')}}">

</head>

<body>

    <div class="wrapper">

        {{-- Content --}}
        @yield('main')

    </div>

    {{-- Javascript --}}

</body>

</html>
