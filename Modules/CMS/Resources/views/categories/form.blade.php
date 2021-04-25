@extends('admin.index')

@section('module')

{{-- Header --}}
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{__('cms::category.breadcrumb.title')}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{route('categories.index')}}">{{__('cms::category.breadcrumb.home')}}</a>
                    </li>

                    {{-- Start Create Section --}}
                    @if (isset($create_section))
                    <li class="breadcrumb-item active">{{__('cms::category.breadcrumb.create')}}</li>
                    @endif
                    {{-- End Create Section --}}

                    {{-- Start Edit Section --}}
                    @if (isset($edit_section))
                    <li class="breadcrumb-item active">{{__('cms::category.breadcrumb.edit')}}</li>
                    @endif
                    {{-- End Edit Section --}}

                </ol>
            </div>
        </div>
    </div>
</div>

@include('admin.partial.flash')

{{-- Main Content --}}
<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <h3 class="">{{__('cms::category.form.title_create')}}</h3>
                <p class="card-text"></p>
            </div>
            <div class="card-body">

                {{-- Form --}}
                @if (isset($create_section))
                <form action="{{route('categories.store')}}" method="POST">
                @elseif (isset($edit_section))
                <form action="{{route('categories.update', $id)}}" method="POST">
                    {{-- <input type="hidden" name="id" value="{{$id}}"> --}}
                @method('PATCH')
                @else
                {{-- Nothing to do here --}}
                @endif

                @csrf

                {{-- Title --}}
                <div class="form-group">
                    @if (isset($create_section))
                    <label for="">{{__('cms::category.form.title')}}</label><br>
                    <input type="text" name="title" id="title" class="form-control">
                    @elseif (isset($edit_section))
                    <label for="">{{__('cms::category.form.title')}}</label><br>
                    <input type="text" name="title" id="title" class="form-control" value="{{$title}}">
                    @else
                    {{-- Nothing to do here --}}
                    @endif
                </div>

                {{-- Description --}}
                <div class="form-group">
                    @if (isset($create_section))
                    <label for="">{{__('cms::category.form.description')}}</label><br>
                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                    @elseif ($edit_section)
                    <label for="">{{__('cms::category.form.description')}}</label><br>
                    <textarea class="form-control" name="description" id="description" rows="3">{{$description}}</textarea>
                    @else
                    {{-- Nothing to do here --}}
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="far fa-save mr-2"></i>{{__('cms::category.button.save')}}</button>
                </div>

                </form>

            </div>
        </div>

    </div>
</section>

@endsection

