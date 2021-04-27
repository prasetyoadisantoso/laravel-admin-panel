@extends('admin.index')

@section('module')

{{-- Header --}}
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{__('cms::dashboard.breadcrumb.title')}}</h1>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('cms.index')}}">{{__('cms::dashboard.breadcrumb.home')}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{__('cms::dashboard.breadcrumb.administrator')}}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

{{-- Jumbotron --}}
<section class="content pb-3">
    <div class="container-fluid">
        <div class="jumbotron bg-transparent pt-0 pb-0">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="card bg-transparent border-0 shadow-none py-3 text-center">
                        <h1 class="display-5 font-weight-bold">{{__('cms::dashboard.jumbotron.title')}}</h1>
                        <p class="lead">{{__('cms::dashboard.jumbotron.subtitle')}} </p>
                    </div>
                    <hr class="w-50">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Small Box Content --}}
<section class="content">
    <div class="container-fluid">
        <div class="row">

            {{-- Total Posts --}}
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{$total_post}}</h3>
                        <p>{{__('cms::dashboard.content.total_posts')}}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-pen-fancy"></i>
                    </div>
                    <a href="{{route('posts.index')}}" class="small-box-footer">{{__('cms::dashboard.content.more_info')}}</a>
                </div>
            </div>

            {{-- Total Categories --}}
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$total_category}}</h3>
                        <p>{{__('cms::dashboard.content.total_categories')}}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-list-ol"></i>
                    </div>
                    <a href="{{route('categories.index')}}" class="small-box-footer">{{__('cms::dashboard.content.more_info')}} <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            {{-- Latest Post --}}
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="small-box bg-purple">
                    <div class="inner">
                        <h3>{{$late_post->title}}</sup></h3>

                        <p>{{__('cms::dashboard.content.latest_post')}}</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-clock"></i>
                    </div>
                    <a href="{{route('posts.edit', Falsifying::falsify($late_post->id))}}" class="small-box-footer">{{__('dashboard.content.more info')}} <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            {{-- Latest Categories --}}
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="small-box bg-fuchsia">
                    <div class="inner">
                        <h3>{{$late_category->title}}</sup></h3>

                        <p>{{__('cms::dashboard.content.latest_category')}}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <a href="{{route('categories.edit', Falsifying::falsify($late_category->id))}}" class="small-box-footer">{{__('dashboard.content.more info')}} <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
