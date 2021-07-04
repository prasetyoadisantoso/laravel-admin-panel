@extends('client.index')

@section('home')

{{-- Home Page --}}
<div class="container-fluid" style="margin-top: 80px;">

    {{-- Welcome Greeting --}}
    <div class="container">
        <div class="jumbotron bg-white">
            <h1 class="display-4">Laravel Administrator Panel</h1>
            <p class="lead">Very simple administrator panel without modification. Made with Laravel with AdminLTE</p>
            <hr class="my-4">
            <div class="container">
                <p>Below displaying data from administrator panel</p>
                <ul class="list-unstyled">
                    <li>
                        <blockquote class="blockquote">
                            <p class="mb-0"><span class="font-weight-bold">{{$language->ContentSection->Content['title']}} : </span>{{$site_name}}</p>
                            <footer class="blockquote-footer">{{$language->ContentSection->Content['description']}} : {{$site_description}}</footer>
                        </blockquote>
                    </li>
                    <li>
                        <blockquote class="blockquote">
                            <p class="mb-0"><span class="font-weight-bold">Social</span></p>
                            <footer class="blockquote-footer">{!!$social_facebook!!}</footer>
                            <footer class="blockquote-footer">{!!$social_instagram!!}</footer>
                        </blockquote>
                    </li>
                </ul>
            </div>
            <br>
            <a class="btn btn-primary btn-lg mb-2" href="{{route('about-us')}}" role="button">About Us <i class="bi bi bi-people ml-2"></i></a>
            <a class="btn btn-danger btn-lg mb-2" href="{{route('disclaimer')}}" role="button">Disclaimer<i class="bi bi-patch-exclamation ml-2"></i></a>
        </div>
    </div>

</div>
@endsection
