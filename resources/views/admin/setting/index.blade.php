@extends('admin.index')

@section('setting')

{{-- Header Content --}}
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{__('setting.breadcrumb.title')}}</h1>
                <small>{{__('setting.breadcrumb.subtitle')}}</small>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a
                            href="{{route('setting.index')}}">{{__('setting.breadcrumb.home')}}</a></li>
                    <li class="breadcrumb-item active">{{__('setting.breadcrumb.setting')}}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

{{-- Main Content --}}
<section class="content pb-3">
    <div class="container-fluid">

        {{-- Setting & Configuration --}}
        <div class="card card-primary card-outline">
            <div class="card-body">
                <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-content-above-logo-tab" data-toggle="pill"
                            href="#custom-content-above-logo" role="tab" aria-controls="custom-content-above-logo"
                            aria-selected="true">{{__('setting.content.tab.logo_favicon')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-content-above-home-tab" data-toggle="pill"
                            href="#custom-content-above-general" role="tab" aria-controls="custom-content-above-home"
                            aria-selected="false">{{__('setting.content.tab.general')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-content-above-seo-tab" data-toggle="pill"
                            href="#custom-content-above-seo" role="tab" aria-controls="custom-content-above-profile"
                            aria-selected="false">{{__('setting.content.tab.seo')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-content-above-additional-tab" data-toggle="pill"
                            href="#custom-content-above-additional" role="tab"
                            aria-controls="custom-content-above-messages"
                            aria-selected="false">{{__('setting.content.tab.additional_pages')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-content-above-personalization-tab" data-toggle="pill"
                            href="#custom-content-above-personalization" role="tab"
                            aria-controls="custom-content-above-personalization"
                            aria-selected="false">{{__('setting.content.tab.personalization')}}</a>
                    </li>
                </ul>
                <div class="tab-content" id="custom-content-above-tabContent">

                    {{-- Content Logo & Favicon --}}
                    <div class="tab-pane fade active show" id="custom-content-above-logo" role="tabpanel"
                        aria-labelledby="custom-content-above-logo-tab">
                        <br>
                        <table id="setting" class="table table-striped w-100">
                            <thead>
                                <tr>
                                    <th class="w-25">{{__('setting.content.table.setting')}}</th>
                                    <th class="w-50">{{__('setting.content.table.value')}}</th>
                                    <th class="w-25">{{__('setting.content.table.action')}}</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($logo_tab as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->value}}</td>
                                    <td>
                                        <button type="button" class="btn btn-md btn-default" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            {{__('setting.content.action.action')}} <i
                                                class="fas fa-cog ml-2"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item text-primary"
                                                href="{{url('setting/'. $item->id . '/edit')}}" id="modal-logo"><i
                                                    class="fas fa-pen-square mr-3"></i>{{__('setting.content.action.edit')}}</button>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    {{-- General Tab --}}
                    <div class="tab-pane fade" id="custom-content-above-general" role="tabpanel"
                        aria-labelledby="custom-content-above-home-tab">
                        <br>
                        <table id="setting" class="table table-striped w-100">
                            <thead>
                                <tr>
                                    <th class="w-25">{{__('setting.content.table.setting')}}</th>
                                    <th class="w-50">{{__('setting.content.table.value')}}</th>
                                    <th class="w-25">{{__('setting.content.table.action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($general_tab as $item)
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->value}}</td>
                                    <td>
                                        <button type="button" class="btn btn-md btn-default"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{__('setting.content.action.action')}} <i
                                                class="fas fa-cog ml-2"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item text-primary"
                                                href="{{url('setting/'. $item->id . '/edit')}}" id="modal-general"><i
                                                    class="fas fa-pen-square mr-3"></i>{{__('setting.content.action.edit')}}</button>
                                        </div>
                                    </td>
                                    </tr>

                                    @endforeach

                            </tbody>
                        </table>
                    </div>


                    {{-- SEO Tab --}}
                    <div class="tab-pane fade" id="custom-content-above-seo" role="tabpanel"
                        aria-labelledby="custom-content-above-profile-tab">
                        <br>
                        <h1 class="my-3">Coming Soon</h1>
                    </div>


                    {{-- Additional Page Tab --}}
                    <div class="tab-pane fade" id="custom-content-above-additional" role="tabpanel"
                        aria-labelledby="custom-content-above-messages-tab">
                        <br>
                        <table id="setting" class="table table-striped w-100">
                            <thead>
                                <tr>
                                    <th class="w-25">{{__('setting.content.table.setting')}}</th>
                                    <th class="w-50">{{__('setting.content.table.value')}}</th>
                                    <th class="w-25">{{__('setting.content.table.action')}}</th>
                                </tr>
                            </thead>
                            <tbody>

                                {{-- Additional Page Foreach --}}
                                @foreach ($additional_tab as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->value}}</td>
                                    <td>
                                        <button type="button" class="btn shadow-sm btn-rounded text-muted"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('setting.content.action.action')}}<i
                                                class="fas fa-cog ml-2"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item text-primary"
                                                href="{{url('setting/'. $item->id . '/edit')}}" id="modal-general"><i
                                                    class="fas fa-pen-square mr-3"></i>{{__('setting.content.action.edit')}}</button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    {{-- Personalization Page Tab --}}
                    <div class="tab-pane fade" id="custom-content-above-personalization" role="tabpanel"
                        aria-labelledby="custom-content-above-personalization-tab">
                        <br>

                        <div class="card">
                            <div class="card-header">
                                <h5>Theme</h5>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
</section>


{{-- Modal Logo Tab --}}
<div class="modal fade" id="modal-setting-logo">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" id="setting-form-logo" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title" id="name"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id-logo">
                        <img src="" alt="" id="image" class="img-fluid">
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary"
                        id="send-form-logo">{{__('setting.content.modal.submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal General Tab --}}
<div class="modal fade" id="modal-setting-general">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="javascript:void(0)" method="POST" id="setting-form-general">
                <div class="modal-header">
                    <h4 class="modal-title" id="named"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id">
                        {{-- <input type="text" class="form-control" id="value" name="value"> --}}
                        <textarea class="form-control" name="value" id="value" cols="30" rows="2"></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary"
                        id="send-form-general">{{__('setting.content.modal.submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


@push('setting')
<script alt="Modal Setting">

    /* Show Modal Logo*/
    $(document).on('click', '#modal-logo', function() {
        var link = $(this).attr('href');
        $.ajax({
            type: 'GET',
            url : link,
            cache: false,
            success : function (data) {
                $("#modal-setting-logo").modal('show');
                $("#image").attr("src", "{{asset('assets/Image/Brand')}}"+"/"+data.value);
                $('#id-logo').val(data.id);
                $('#name').html(data.name);
                // $('#image').val(data.value);
            }
        });
    });

    /* Show Modal General */
    $(document).on('click', '#modal-general', function() {
        var link = $(this).attr('href');
        $.ajax({
            type: 'GET',
            url : link,
            cache: false,
            success : function (data) {
                $("#modal-setting-general").modal('show');
                $('#id').val(data.id);
                $('#named').html(data.name);
                $('#value').val(data.value);
            }
        });
    });

    /* Submit Logo*/
    $(document).ready(function () {
        $("#setting-form-logo").submit(function (event) {
            event.preventDefault();
            var id = document.getElementById("id-logo");
            var url = '{{ route("setting.update", ":id") }}';
            url = url.replace(':id', id.value);
            var formData = new FormData($(this)[0]);

            $.ajax({
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST',
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: function () {
                    swal({
                        position: 'top-center',
                        icon: 'success',
                        title: '{{__('setting.alert.success')}}',
                        showConfirmButton: false,
                        type: 'success',
                        timer: 1500
                    })
                    setTimeout(function(){location.reload()}, 1500);
                },
                error: function(){
                    swal({
                        position: 'top-center',
                        icon: 'error',
                        title: '{{__('setting.alert.error')}}',
                        showConfirmButton: false,
                        type: 'error',
                        timer: 1500
                    })
                    setTimeout(function(){location.reload()}, 1500);
                }
            });

            return false;
        });
    });

    /* Save Setting General*/
    $(document).ready(function(){
        $('#send-form-general').click(function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });

        $('#send-form-general').html('Sending..');

        var id = document.getElementById("id");
        var url = '{{ route("setting.update", ":id") }}';
        url = url.replace(':id', id.value);

        $.ajax({
                url: url,
                type: 'PATCH',
                data: $('#setting-form-general').serialize(),
                success: function(){
                    swal({
                        position: 'top-center',
                        icon: 'success',
                        title: '{{__('setting.alert.success')}}',
                        showConfirmButton: false,
                        type: 'success',
                        timer: 1500
                    })
                    setTimeout(function(){location.reload()}, 1500);
                },
                error: function(){
                    swal({
                        position: 'top-center',
                        icon: 'error',
                        title: '{{__('setting.alert.error')}}',
                        showConfirmButton: false,
                        type: 'error',
                        timer: 1500
                    })
                    setTimeout(function(){location.reload()}, 1500);
                }
                });
            });
    });
</script>
@endpush
