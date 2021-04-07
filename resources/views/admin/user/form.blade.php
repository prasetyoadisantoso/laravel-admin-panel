@extends('admin.index')

@section('form-user')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{__('user.breadcrumb.users')}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('user.index')}}">{{__('user.breadcrumb.home')}}</a>
                    </li>


                    {{-- Start Create Section --}}
                    @if (isset($create_section))
                    <li class="breadcrumb-item active">{{__('user.breadcrumb.create_user')}}</li>
                    @endif
                    {{-- End Create Section --}}


                    {{-- Start Edit Section --}}
                    @if (isset($edit_section))
                    <li class="breadcrumb-item active">{{__('user.breadcrumb.edit_user')}}</li>
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
        <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
            @endif

            @if (isset($edit_section))
            <form action="{{route('user.update', $id)}}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @endif

                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <!-- Profile Image -->
                        <div class="card card-info card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">

                                    {{-- Start Create Section --}}
                                    @if (isset($create_section))
                                    <img class="img-fluid img-circle"
                                        src="{{asset('assets/Admin/AdminLTE/dist/img/avatar.png')}}" alt="User profile picture"
                                        id="profileImage" style="width: 128px;">
                                    @endif
                                    {{-- End Create Section --}}


                                    {{-- Start Edit Section --}}
                                    @if (isset($edit_section))

                                    @if ($image != null)
                                    <img class="img-fluid img-circle" src="{{asset('assets/Admin/Image/' . $image)}}"
                                        alt="User profile picture" id="profileImage" style="width: 128px;">
                                    @endif

                                    @if ($image == null)
                                    <img class="img-fluid img-circle"
                                        src="{{asset('assets/admin/dist/img/avatar2.png')}}" alt="User profile picture"
                                        id="profileImage" style="width: 128px;">
                                    @endif

                                    @endif
                                    {{-- End Edit Section --}}

                                    <i class="fa fa-camera upload-button"></i>
                                    <input type="file" name="image" onchange="readImage(this);" id="imageUpload"
                                        hidden />
                                </div>
                                <h5 class="profile-username font-weight-light text-center" style="font-size: 8pt;">
                                    *{{__('user.form.click_image')}}</h5>
                                <h3 class="profile-username text-center">{{ isset($full_name) ? $full_name : ''}}</h3>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- End Profile Image -->
                    </div>
                    <div class="col-md-8">
                        <!-- Detail User -->
                        <div class="card card-info card-outline">
                            <div class="card-body mx-3 mx-2">
                                <div class="form-group row">
                                    <label for="inputName"
                                        class="col-sm-2 col-form-label">{{__('user.form.full_name')}}</label>
                                    <div class="col-sm-10">
                                        <input name="name" type="text" class="form-control" id="inputName"
                                            placeholder="{{__('user.form.full_name')}}"
                                            value="{{ isset($full_name) ? $full_name : ''}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail"
                                        class="col-sm-2 col-form-label">{{__('user.form.email')}}</label>
                                    <div class="col-sm-10">
                                        <input name="email" type="email" class="form-control" id="inputEmail"
                                            placeholder="{{__('user.form.email')}}"
                                            value="{{ isset($email) ? $email : ''}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience"
                                        class="col-sm-2 col-form-label">{{__('user.form.roles')}}</label>
                                    <div class="col-sm-10">
                                        <select name="roles" class="form-control"
                                            data-placeholder="{{__('user.form.choose_role')}}" style="width: 50%;">
                                            @foreach ($role as $item)

                                            @if (isset($current_role))
                                            <option {{ $item->name == $current_role ? 'selected' : '' }}>{{$item->name}}
                                            </option>
                                            @else
                                            <option>{{$item->name}}</option>
                                            @endif

                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password"
                                        class="col-sm-2 col-form-label">{{__('user.form.password')}}</label>
                                    <div class="col-sm-10">
                                        <input name="password" type="password" class="form-control w-50" id="password"
                                            placeholder="{{__('user.form.password')}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="confirm-password"
                                        class="col-sm-2 col-form-label">{{__('user.form.confirm_password')}}</label>
                                    <div class="col-sm-10">
                                        <input name="confirm-password" type="password" class="form-control w-50"
                                            id="confirm-password" placeholder="{{__('user.form.confirm_password')}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                {{__('user.form.is_confirmed')}} : <input name="status" type="checkbox"
                                                    {{ isset($edit_section) ? $status : '' }}>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-info">{{__('user.form.submit')}} <i
                                                class="fas fa-save ml-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Detail User -->
                    </div>
                </div>

            </form>
    </div><!-- /.container-fluid -->

</section>
<!-- /.content -->
@endsection

@push('form-user')
<!-- Image Profile -->
<script>
    $("#profileImage").click(function (e) {
        $("#imageUpload").click();
    });

    //Preview Image
    function readImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                let my_input = input.id;
                let i = my_input.substr(-1)
                $('#profileImage')
                    .attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
@endpush
