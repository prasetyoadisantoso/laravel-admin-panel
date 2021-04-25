{{-- Message Error --}}
@if (count($errors) > 0)
@foreach ($errors->all() as $error)
{{-- Error Sweetalert --}}
<script type="text/javascript">
    swal({
            title:'{{__('user.notification.error')}}',
            text:"{{ $error }}",
            timer:5000,
            type:'error'
            });
</script>
@endforeach
@endif

@if(session()->has('error'))
<script type="text/javascript">
    swal({
            title:'{{__('user.notification.error')}}',
            text:"{{ session()->get('error') }}",
            timer:100000,
            type:'error'
    });
</script>
@endif


@if ($message = Session::get('success'))
{{-- Success Sweetalert --}}
<script type="text/javascript">
    swal({
            title:'{{__('user.notification.success')}}',
            text:"{{Session::get('success')}}",
            timer:5000,
            type:'success'
            });
</script>
@endif
