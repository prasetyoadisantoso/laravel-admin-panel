@extends('admin.index')

@section('role')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{__('role.breadcrumb.title')}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('role.index')}}">{{__('role.breadcrumb.home')}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{__('role.breadcrumb.roles')}}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@include('admin.partial.flash')

<!-- Main content -->
<section class="content pb-3">
    <div class="container-fluid">

        <!-- Start Jumbotron -->
        <div class="jumbotron bg-transparent pt-0 pb-0">
            <div class="row">

                <div class="col-sm-12 col-md-6">
                    <div class="card bg-transparent border-0 shadow-none py-5 text-center">
                        <h1 class="display-5 font-weight-bold">{{__('role.jumbotron.title')}}</h1>
                        <p class="lead">{{__('role.jumbotron.subtitle')}} </p>
                        <hr class="my-4">
                        <p>{{__('role.jumbotron.info')}}</p>
                        <p class="lead">
                            <a class="btn btn-secondary btn-lg" href="{{route('role.create')}}" role="button">
                                {{__('role.jumbotron.create')}}
                                <i class="fas fa-plus ml-2"></i>
                            </a>
                        </p>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6">
                    <div class="card w-75 mt-2 mx-auto mt-5 mb-5">
                        <img src="{{asset('assets/Admin/AdminLTE/dist/img/photo1.png')}}" alt="Photo 1"
                            class="img-fluid shadow">
                        <div class="ribbon-wrapper ribbon-lg">
                            <div class="ribbon bg-secondary text-lg">
                                Roles
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Jumbotron -->

        <!-- Datatables -->
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <table id="role_datatable" class="table border table-hover rounded-lg w-100">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>{{__('role.table.role_name')}}</th>
                            <th>{{__('role.table.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>No</td>
                            <td>Role Name</td>
                            <td>Action</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- End Datatables -->

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- Confirmation Message -->
{{-- <div class="container">
    <button class="btn btn-sm btn-success" id="success">Success Message</button>
    <button class="btn btn-sm btn-danger" id="failed">Failed Message</button>
</div> --}}
<!-- End Confirmation Message -->



<!-- Modal Pop-Up Area -->
<div class="modal fade" id="modal-role">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-outline-danger">
                <h4 class="modal-title">{{__('role.modal.name')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Profile Section -->
                <div class="card border-0 shadow-none rounded">
                    <div class="card-body border-left">
                        <dl>
                            <dt>{{__('role.modal.name')}}</dt>
                            <dd id="role"></dd>
                            <dt>{{__('role.modal.permissions')}} </dt>
                            <dd id="permissions"></dd>
                        </dl>
                    </div>
                </div>
                <!-- End Profile Section -->
            </div>
        </div>
    </div>
</div>
<!-- End Modal Pop-Up Area -->

@endsection


@push('home-role')

<script alt="Datatables">
    /* Show Datatable Role */
    $(function () {
        var table = $("#role_datatable").DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: '{{route('role.datatable')}}',
            dom: 'lfrtip',
            lengthMenu: [[10, 25, 50, -1], ['10', '25', '50', 'All']],
            columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'name' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
            "oLanguage": {
                "sSearch": "{{__('role.datatable.search')}}",
                "oPaginate": {
                    "sPrevious": "{{__('role.datatable.previous')}}",
                    "sNext": "{{__('role.datatable.next')}}",
                }
            }
        });
    });

</script>

<script alt="SweetAlert">
    /* SweetAlert */

    /* Delete Role */
    $(document).on('click', '#delete', function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            var id = $(this).data('id');
            swal({
            title: "{{__('role.notification.delete_ask')}}",
            text: "{{__('role.notification.delete_information')}}",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "{{__('role.notification.confirm')}}",
            cancelButtonText: "{{__('role.notification.cancel')}}",
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
                            swal("{{__('user.notification.success')}}", results.message, "success");
                            setTimeout(function(){location.reload()}, 1500);
                            } else {
                            swal("{{__('user.notification.error')}}", results.message, "error");
                            }
                        }
                    });
                } else {
                e.dismiss;
                }
            }, function (dismiss) {
        })
    })

    /* Success Message */
    $(document).on('click', '#success', function () {
      Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: 'Create / Edit Role Saved Successfully',
        showConfirmButton: false,
        timer: 1500
      })
    });

    /* Failed Message */
    $(document).on('click', '#failed', function () {
      Swal.fire({
        position: 'top-center',
        icon: 'error',
        title: 'Create / Edit Role Failed to Saved',
        showConfirmButton: false,
        timer: 1500
      })
    });
</script>

<script alt="Modal Detail Role">
    /* Get data user and send to modal */
    $(document).on('click', '#modal', function() {
        var link = $(this).attr('href');
        $.ajax({
            type: 'GET',
            url : link,
            cache: false,
            success : function (data) {
                let item = data[0].permissions;
                let permission =  item.map( function(item) {
                    return item.name + "<br>";
                });
                $("#modal-role").modal('show');
                $("#role").html(data[0].name);
                $("#permissions").html(permission);
            }
        });
    });
</script>
@endpush
