@extends('client.index')

@section('home')

{{-- Home Page --}}
<div class="container-fluid" style="margin-top: 100px;">

    {{-- Welcome Greeting --}}
    <div class="container">
        <div class="jumbotron bg-white">
            <h1 class="display-4">Hello, developer!</h1>
            <p class="lead">Very simple administrator panel without modification has been arrived. </p>
            <hr class="my-4">
            <div class="container">
                <p>Below displaying data from administrator panel</p>
                <ul class="list-unstyled">
                    <li>
                        <blockquote class="blockquote">
                            <p class="mb-0"><span class="font-weight-bold">{{$language->MainContent->Content->Title}} : </span>{{$global->SiteName}}</p>
                            <footer class="blockquote-footer">{{$language->MainContent->Content->Description}} : {{$global->SiteDescription}}</footer>
                        </blockquote>
                    </li>
                    <li>
                        <blockquote class="blockquote">
                            <p class="mb-0"><span class="font-weight-bold">{{$language->MainContent->Content->Title}} : </span>{{$global->SiteName}}</p>
                            <footer class="blockquote-footer">{{$language->MainContent->Content->Description}} : {{$global->SiteDescription}}</footer>
                        </blockquote>
                    </li>
                </ul>
            </div>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>

</div>
@endsection
