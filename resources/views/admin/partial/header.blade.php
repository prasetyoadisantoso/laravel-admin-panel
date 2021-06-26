{{-- Navbar --}}
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    {{-- Left Navbar --}}
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('dashboard')}}" class="nav-link"><i
                    class="fas fa-home nav-icon mr-2"></i>{{__('header.home')}}</a>
        </li>
    </ul>


    {{-- Right Navbar --}}
    <ul class="navbar-nav ml-auto">

        {{-- Language Selector --}}
        <li class="nav-item dropdown">

            <a class="nav-link" data-toggle="dropdown" href="#">
                @if ($current_locale == 'id')
                <span class="flag-icon flag-icon-id mr-2"></span>
                <span class="text-muted text-sm">Indonesia</span>

                @elseif ($current_locale == 'en')
                <span class="flag-icon flag-icon-gb"></span>
                <span class="">English</span>

                @else
                <span class="flag-icon flag-icon-jp mr-2"></span>
                <span class="text-muted text-sm">Japan</span>

                @endif
            </a>

            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                {{-- <a href="{{LaravelLocalization::getLocalizedURL('id')}}" class="dropdown-item">
                <span class="flag-icon flag-icon-id mr-2"></span>
                <span class="text-muted text-sm">Indonesia</span>
                </a> --}}
                {{-- <div class="dropdown-divider"></div> --}}
                <a href="{{LaravelLocalization::getLocalizedURL('en')}}" class="dropdown-item">
                    <span class="flag-icon flag-icon-gb mr-2"></span>
                    <span class="text-muted text-sm">English</span>
                </a>
                {{-- <div class="dropdown-divider"></div>
                <a href="{{LaravelLocalization::getLocalizedURL('ja')}}" class="dropdown-item">
                <span class="flag-icon flag-icon-jp mr-2"></span>
                <span class="text-muted text-sm">Japan</span>
                </a> --}}
            </div>

        </li>

        {{-- User Profile --}}
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{Storage::url($user->image)}}"
                    class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">{{$user->name}}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                {{-- User Information --}}
                <li class="user-header bg-primary">
                    <img src="{{Storage::url($user->image)}}"
                        class="user-image img-circle elevation-2" alt="User Image">
                    <p>
                        {{$user->name}}
                        <small>{{__('header.member_verified')}} , {{$member_verified}}</small>
                    </p>
                </li>

                {{-- Logout and Profile --}}
                <li class="user-footer">
                    <a href="{{route('user.edit', Falsifying::falsify($user->id))}}"
                        class="btn btn-default btn-flat">{{__('header.profile')}}</a>
                    <a href="{{route('logout')}}"
                        class="btn btn-default btn-flat float-right">{{__('sidebar.logout')}}</a>
                </li>
            </ul>
        </li>

    </ul>

</nav>
