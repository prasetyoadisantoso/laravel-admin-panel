@extends('admin.index')

@section('dashboard')

{{-- Header --}}
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{__('dashboard.breadcrumb.title')}}</h1>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('dashboard.breadcrumb.home')}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{__('dashboard.breadcrumb.administrator')}}</li>
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
                        <h1 class="display-5 font-weight-bold">{{__('dashboard.jumbotron.title')}}</h1>
                        <p class="lead">{{__('dashboard.jumbotron.subtitle')}} </p>
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

            {{-- Module Total --}}
            <div class="col-sm-12 col-xs-12 col-lg-4">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$module_counter}}</h3>
                        <p>{{__('dashboard.content.total_module_installed')}}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-cubes"></i>
                    </div>
                    <a href="#" class="small-box-footer">{{__('dashboard.content.including_default_module')}}</a>
                </div>
            </div>

            {{-- User Total --}}
            <div class="col-sm-12 col-xs-12 col-lg-4">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$user_counter}}</h3>

                        <p>{{__('dashboard.content.user_registration')}}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{url('user')}}" class="small-box-footer">{{__('dashboard.content.more info')}} <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            {{-- Role Total --}}
            <div class="col-sm-12 col-xs-12 col-lg-4">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$role_counter}}</sup></h3>

                        <p>{{__('dashboard.content.total_roles')}}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-unlock-alt"></i>
                    </div>
                    <a href="{{url('role')}}" class="small-box-footer">{{__('dashboard.content.more info')}} <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
