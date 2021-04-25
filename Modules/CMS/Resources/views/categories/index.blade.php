@extends('admin.index')

@section('module')

{{-- Header --}}
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{__('cms::category.breadcrumb.title')}}</h1>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a
                            href="{{route('categories.index')}}">{{__('cms::category.breadcrumb.home')}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{__('cms::category.breadcrumb.administrator')}}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

@include('admin.partial.flash')

{{-- Main Content and Table --}}
<section class="content pb-3">
    <div class="container-fluid">

        {{-- Jumbotron --}}
        <div class="jumbotron bg-transparent pt-0 pb-0">
            <div class="row">

                {{-- Create and Description --}}
                <div class="col-sm-12 col-md-6">
                    <div class="card bg-transparent border-0 shadow-none py-5 text-center">
                        <h1 class="display-5 font-weight-bold">{{__('cms::category.jumbotron.title')}}</h1>
                        <p class="lead">{{__('cms::category.jumbotron.subtitle')}} </p>
                        <hr class="my-4">
                        <p>{{__('cms::category.jumbotron.info')}}</p>
                        <p class="lead">
                            <a class="btn bg-primary btn-lg" href="{{route('categories.create')}}" role="button">
                                {{__('cms::category.jumbotron.create')}}
                                <i class="fas fa-plus ml-2"></i>
                            </a>
                        </p>
                    </div>
                </div>

                {{-- Image --}}
                <div class="col-sm-12 col-md-6">
                    <div class="card w-75 mt-2 mx-auto mt-5 mb-5">
                        <img src="{{asset('assets/Admin/AdminLTE/dist/img/photo1.png')}}" alt="Photo 1"
                            class="img-fluid shadow">
                        <div class="ribbon-wrapper ribbon-lg">
                            <div class="ribbon bg-primary text-lg">
                                {{__('cms::category.jumbotron.title')}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- Datatable --}}
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <table id="categories_datatable" class="table border rounded-lg table-hover w-100">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>{{__('cms::post.table.title')}}</th>
                            <th>{{__('cms::post.table.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>My First Category</td>
                            <td>Action</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>

@endsection

{{-- Module JS --}}
@push('module-js')
<script alt="Datatables">
    /* Show Datatable Posts */
    $(function () {
        var table = $("#categories_datatable").DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: '{{route('categories.datatable')}}',
            dom: 'lfrtip',
            lengthMenu: [[10, 25, 50, -1], ['10', '25', '50', 'All']],
            columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'title' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
            "oLanguage": {
                "sSearch": "{{__('cms::category.datatable.search')}}",
                "oPaginate": {
                    "sPrevious": "{{__('cms::category.datatable.previous')}}",
                    "sNext": "{{__('cms::category.datatable.next')}}",
                }
            }
        });
    });
</script>

<script alt="SweetAlert">
    /* SweetAlert */

    /* Delete User */
    $(document).on('click', '#delete', function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            var id = $(this).data('id');
            swal({
            title: "{{__('cms::category.notification.delete_ask')}}",
            text: "{{__('cms::category.notification.delete_information')}}",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "{{__('cms::category.notification.confirm')}}",
            cancelButtonText: "{{__('cms::category.notification.cancel')}}",
            reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                    type: 'DELETE',
                    url: url,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        if (results.success === true) {
                            swal("{{__('cms::category.notification.success')}}", results.message, "success");
                            setTimeout(function(){location.reload()}, 1500);
                            } else {
                            swal("{{__('cms::category.notification.error')}}", results.message, "error");
                            }
                        }
                    });
                } else {
                e.dismiss;
                }
            }, function (dismiss) {
        })
    })
</script>
@endpush
