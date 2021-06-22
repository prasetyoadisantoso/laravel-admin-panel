@extends('admin.index')

@section('user')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{__('user.breadcrumb.title')}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('user.index')}}">{{__('user.breadcrumb.home')}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{__('user.breadcrumb.users')}}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
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
                        <h1 class="display-5 font-weight-bold">{{__('user.jumbotron.title')}}</h1>
                        <p class="lead">{{__('user.jumbotron.subtitle')}} </p>
                        <hr class="my-4">
                        <p>{{__('user.jumbotron.info')}}</p>
                        <p class="lead">
                            <a class="btn bg-info btn-lg" href="{{route('user.create')}}" role="button">
                                {{__('user.jumbotron.create')}}
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
                            <div class="ribbon bg-info text-lg">
                                {{__('user.jumbotron.title')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Jumbotron -->

        {{-- Datatable --}}
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <table id="user_datatable" class="table border rounded-lg table-hover w-100">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>{{__('user.table.name')}}</th>
                            <th>{{__('user.table.image')}}</th>
                            <th>Email</th>
                            <th>{{__('user.table.role')}}</th>
                            <th>{{__('user.table.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>No</td>
                            <td>Name</td>
                            <td>Image</td>
                            <td>Email</td>
                            <td>Roles</td>
                            <td>Action</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

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
<div class="modal fade" id="modal-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-outline-danger">
                <h4 class="modal-title">{{__('user.modal.profile')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Profile Section -->
                <div class="card border-0 shadow-none rounded">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card-body">
                                <img src="" alt="" class="img-fluid" id="image">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="card-body border-left">
                                <dl>
                                    <dt>{{__('user.modal.full_name')}} </dt>
                                    <dd id="full-name"></dd>
                                    <dt>Email: </dt>
                                    <dd id="email"></dd>
                                    <dt>{{__('user.modal.role')}}</dt>
                                    <dd id="role"></dd>
                                    <dt>Status : </dt>
                                    <dd id="status"><span class="badge bg-success"></span></dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Profile Section -->
            </div>
        </div>
    </div>
</div>
<!-- End Modal Pop-Up Area -->



@endsection


@push('home-user')

<script alt="Datatables">
    /* Show Datatable User */
    $(function () {
        var table = $("#user_datatable").DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: '{{route('user.datatable')}}',
            dom: 'lfrtip',
            lengthMenu: [[10, 25, 50, -1], ['10', '25', '50', 'All']],
            columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'name' },
            { data: 'image', className: "w-25", render: function (data, type, full, meta) {
                if(data === '/storage/'){
                    return 'Image not available';
                } else {
                    return '<img class="img-fluid w-50" src="' + data + '">'
                }
            }},
            { data: 'email'},
            { data: 'roles'},
            { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
            "oLanguage": {
                "sSearch": "{{__('user.datatable.search')}}",
                "oPaginate": {
                    "sPrevious": "{{__('user.datatable.previous')}}",
                    "sNext": "{{__('user.datatable.next')}}",
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
            title: "{{__('user.notification.delete_ask')}}",
            text: "{{__('user.notification.delete_information')}}",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "{{__('user.notification.confirm')}}",
            cancelButtonText: "{{__('user.notification.cancel')}}",
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
                            swal("{{__('role.notification.success')}}", results.message, "success");
                            setTimeout(function(){location.reload()}, 1500);
                            } else {
                            swal("{{__('role.notification.error')}}", results.message, "error");
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

@can('user-show')
<script alt="Modal Detail User">
    /* Get data user and send to modal */
    $(document).on('click', '#modal', function() {
        var link = $(this).attr('href');
        $.ajax({
            type: 'GET',
            url : link,
            cache: false,
            success : function (data) {
                $("#modal-user").modal('show');
                $("#image").attr("src", function() {
                    if(data[0].image == ""){
                        console.clear();
                    } else {
                        return "{{config('app.url') . '/storage/'}}" + data[0].image
                    }
                });
                $('#full-name').html(data[0].name);
                $('#email').html(data[0].email);
                $('#role').html(data[1]);
                $('#status').html(data[2]);
            }
        });
    });
</script>
@endcan

@endpush
