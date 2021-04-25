@extends('admin.index')

{{-- CSS Embed --}}
@push('module-css')
    {{-- Summenote CSS --}}
    <link rel="stylesheet" href="{{asset('assets/Admin/AdminLTE/plugins/summernote/summernote-bs4.min.css')}}">

    {{-- DropZone CSS --}}
    <link rel="stylesheet" href="{{asset('assets/Admin/AdminLTE/plugins/dropzone/min/dropzone.min.css')}}">

    {{-- Custom Style --}}
    <style>
        .dropzones {
            border: 1px dashed gray;
            padding-top: 5px;
            padding-bottom: 5px;
            border-radius: 10px;
            background-color: rgb(243, 243, 243);
        }

        .dropzones:before {
            content: "{{__('cms::post.form.drop_here')}}";
            padding: 10px;
            color: gray;
        }

        .transparent {
            opacity: 0;
        }
    </style>
@endpush

@section('module')

{{-- Header --}}
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{__('cms::post.breadcrumb.title')}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{route('posts.index')}}">{{__('cms::post.breadcrumb.home')}}</a>
                    </li>

                    {{-- Start Create Section --}}
                    @if (isset($create_section))
                    <li class="breadcrumb-item active">{{__('cms::post.breadcrumb.create')}}</li>
                    @endif
                    {{-- End Create Section --}}

                    {{-- Start Edit Section --}}
                    @if (isset($edit_section))
                    <li class="breadcrumb-item active">{{__('cms::post.breadcrumb.edit')}}</li>
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
        {{-- Form Start --}}

            {{-- Form Create --}}
            @if (isset($create_section))
                <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
            @endif

            {{-- Form Edit --}}
            @if (isset($edit_section))
                <form action="{{route('posts.update', $id)}}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
            @endif

            @csrf

            {{-- Form Posts --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="">{{__('cms::post.form.title')}}</h3>
                    <p class="card-text"></p>
                </div>
                <div class="card-body">
                    <div class="row">

                        {{-- Left Side --}}
                        <div class="col-md-6"4>

                            <div class="container mx-2">
                                {{-- Title --}}
                                <div class="form-group">
                                    @if (isset($create_section))
                                        <label for="">{{__('cms::post.form.title_create')}}</label>
                                        <input class="form-control" type="text" name="title" id="title">
                                    @elseif (isset($edit_section))
                                        <label for="">{{__('cms::post.form.title_edit')}}</label>
                                        <input class="form-control" type="text" name="title" id="title" value="{{$title}}">
                                        @method('PATCH')
                                    @endif
                                </div>

                                @csrf

                                {{-- Categories List --}}
                                <div class="form-group">
                                    <label for="">{{__('cms::post.form.categories')}}</label><br>
                                    <select multiple class="form-control selectpicker"
                                        id="categories" name="categories[]" style="width: 100%">

                                        {{-- Categories --}}
                                        @foreach ($list_categories as $item)

                                        @if (isset($create_section))
                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                        @endif

                                        @if (isset($edit_section))
                                            <option {{ in_array($item->id, $category) == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->title}}</option>
                                        @endif

                                        @endforeach

                                    </select>
                                </div>
                            </div>

                        </div>

                        {{-- Right Side --}}
                        <div class="col-md-6">
                            <div class="container mx-5">

                                {{-- Feature Image --}}
                                <div class="form-group">
                                    <label for="">{{__('cms::post.form.feature_image')}}</label><br>
                                    <div class="dropzones w-50">
                                        <br>
                                        <input type="file" onchange="readImage(this);" name="image" class="transparent">
                                    </div>
                                    <label for="">{{__('cms::post.form.preview_image')}}</label><br>
                                    @if (isset($create_section))
                                    <img id="image" class="img-fluid" src="{{asset('assets/Admin/Image/dummy-image.png')}}" style="height: 100px;" />
                                    @endif
                                    @if (isset($edit_section))
                                    <img id="image" src="{{asset('assets/Image/Upload') . '/' . $image}}" alt="" class="img-fluid w-25">
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>


                    {{-- Post --}}
                    <hr>
                    <label for="">{{__('cms::post.form.content')}}</label>

                    {{-- Create Content --}}
                    @if (isset($create_section))
                    <textarea name="content" id="content"></textarea>
                    @endif

                    {{-- Edit Content --}}
                    @if (isset($edit_section))
                    <textarea name="content" id="content">{!!$content!!}</textarea>
                    @endif

                </div>

                <div class="card-footer text-center bg-light border">
                    <button type="submit" class="btn btn-lg btn-primary" id="button"><i class="fas fa-save mr-2"></i>Save</button>
                </div>

            </div>

            </form>
        {{-- Form End --}}
    </div>
</section>

@endsection


{{-- JavaScript Embed --}}
@push('module-js')

{{-- Select2 JS--}}
<script src="{{asset('assets/Admin/AdminLTE/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.selectpicker').select2();
    });
</script>

{{-- CKEditor --}}
<script src="{{asset('assets/Admin/CKEditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('content', {
            filebrowserUploadUrl: "{{route('post.image', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
</script>


{{-- Image Processing --}}
<script>
    /* Preview Image */
    function readImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                let my_input = input.id;
                let i = my_input.substr(-1)
                $('#image' + i)
                    .attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endpush
