{{-- {{dd($language)}} --}}
<!-- Header -->
<header class="fixed-top bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <img src="{{Storage::url($site_logo)}}" alt="" class="img-fluid py-2" style="width: 50px;">
        <h1 class="my-2 text-white"> &nbsp; + &nbsp; </h1>
        <img src="{{asset('assets/Image/Brand/adminlte-logo.png')}}" alt="" class="img-fluid py-2" style="width: 50px;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active mx-2">
                    <a class="nav-link" href="{{route('home')}}"><i class="bi bi-house"></i><br><span>{{$language->HeaderSection->Content['home']}}</span></a>
                </li>
                <li class="nav-item dropdown active mx-2">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-person-circle"></i><br><span>{{$language->HeaderSection->Content['my_account']}}</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if (isset(Auth::user()->name))
                        <a class="dropdown-item" href="{{route('user.edit', Falsifying::falsify(Auth::user()->id))}}">{{Auth::user()->name}}</a>
                        <a class="dropdown-item" href="{{route('logout')}}">{{$language->HeaderSection->Content['logout']}}</a>
                        @elseif(!isset(Auth::user()->name))
                        <a class="dropdown-item" href="{{route('login')}}">{{$language->HeaderSection->Content['login']}}</a>
                        <a class="dropdown-item" href="{{route('register')}}">{{$language->HeaderSection->Content['register']}}</a>
                        @else
                        @endif
                    </div>
                </li>
                <li class="nav-item active mx-2">
                    <a class="nav-link text-center" href="{{route('faq')}}"><i class="bi bi-question-circle"></i><br><span>{{$language->HeaderSection->Content['faq']}}</span></a>
                </li>
                <li class="nav-item active mx-2">
                    <a class="nav-link text-center" href="{{route('terms-conditions')}}"><i class="bi bi-exclamation-triangle"></i><br><span>{{$language->HeaderSection->Content['terms_conditions']}}</span></a>
                </li>
                <li class="nav-item active mx-2">
                    <a class="nav-link text-center" href="{{route('privacy-policy')}}"><i class="bi bi-shield-fill-exclamation"></i><br><span>{{$language->HeaderSection->Content['privacy']}}</span></a>
                </li>
            </ul>
        </div>
    </nav>
</header>


