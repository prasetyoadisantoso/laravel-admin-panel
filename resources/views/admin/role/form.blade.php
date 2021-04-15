@extends('admin.index')

@section('form-role')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{__('role.breadcrumb.title')}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('role.index')}}">{{__('role.breadcrumb.home')}}</a></li>

                    {{-- Start Create Section --}}
                    @if (isset($create_section))
                    <li class="breadcrumb-item active">{{__('role.breadcrumb.create_role')}}</li>
                    @endif
                    {{-- End Create Section --}}


                    {{-- Start Edit Section --}}
                    @if (isset($edit_section))
                    <li class="breadcrumb-item active">{{__('role.breadcrumb.edit_role')}}</li>
                    @endif
                    {{-- End Edit Section --}}

                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@include('admin.partial.flash')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        @if (isset($create_section))
        <form action="{{route('role.store')}}" method="POST">
        @elseif (isset($edit_section))
        <form action="{{route('role.update', $role->id)}}" method="POST">
        @method('PATCH')
        @endif

        @csrf

            <div class="card border-0 shadow-none">
                <div class="card-body">
                    <div class="form-group">
                        <label>{{__('role.form.name')}} :</label>
                        <input type="text" class="form-control" placeholder="{{__('role.form.name_placeholder')}}" name="name" value="{{isset($edit_section) ? $role->name : '' }}">
                    </div>
                    <div class="form-group">
                        <label>{{__('role.form.permission')}} :</label>
                        @foreach ($permission as $item)
                        <div class="custom-control custom-checkbox">

                            {{-- Create Section --}}
                            @if (isset($create_section))
                            <input class="custom-control-input" type="checkbox" id="{{$item->id}}" name="permission[]" value="{{$item->id}}">
                            <label for="{{$item->id}}" class="custom-control-label">{{$item->name}}</label>
                            @endif

                            {{-- Edit Section --}}
                            @if (isset($edit_section))
                            <input class="custom-control-input" type="checkbox" id="{{$item->id}}" name="permission[]" value="{{$item->id}}" {{in_array($item->id, $rolePermission) ? 'checked' : ''}}>
                            <label for="{{$item->id}}" class="custom-control-label">{{$item->name}}</label>
                            @endif

                        </div>
                        @endforeach
                    </div>
                    <button class="btn bg-secondary">{{__('role.form.submit')}} <i class="far fa-save ml-2"></i></button>
                </div>
            </div>
        </form>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
