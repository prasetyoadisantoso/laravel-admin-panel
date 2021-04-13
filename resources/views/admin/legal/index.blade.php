@extends('admin.index')

@section('legal')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{__('legal.breadcrumb.title')}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a
                            href="{{route('legal', $page_type)}}">{{__('legal.breadcrumb.home')}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{$page_title}}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content-header -->

@include('admin.partial.flash')

<div class="container">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">
                {{$page_title}}
            </h3>
        </div>
        <!-- /.card-header -->
        <form action="{{route('legal.update', $page_type)}}" method="POST">
            @csrf
            <input type="hidden" name="type" value="{{$page_type}}">
            <div class="card-body">
                <textarea id="summernote" name="description">{{$page_description}}</textarea>
                <button class="btn bg-secondary">{{__('role.form.submit')}} <i class="far fa-save ml-2"></i></button>
            </div>
        </form>
    </div>
</div>


@endsection


@push('legal-css')
<!-- summernote -->
<link rel="stylesheet" href="{{asset('assets/Admin/AdminLTE/plugins/summernote/summernote-bs4.min.css')}}">
@endpush


@push('legal-js')
<!-- Summernote -->
<script src="{{asset('assets/Admin/AdminLTE/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
    $(function () {
      // Summernote
      $('#summernote').summernote({
          height: 300
      });
    })
</script>
@endpush
