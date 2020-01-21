<footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="https://techcloudltd.com/">Tech Cloud Ltd</a>.</strong>
    All rights reserved.

</footer>

</div>


<script src="{{url('public')}}/assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('public')}}/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{url('public')}}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{url('public')}}/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{url('public')}}/assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('public')}}/assets/dist/js/demo.js></script>
<script>{{url('public')}}/assets/pages/dashboard.js"></script>

<script src="{{url('public')}}/assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{url('public')}}/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script src="{{url('public/js/utils.js')}}"></script>

<!-- Rumi added -->
<script src="{{url('public/assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>
<script src="{{url('public/assets/libs/multiselect/jquery.multi-select.js')}}"></script>
<script src="{{url('public/assets/libs/select2/select2.min.js')}}"></script>
<script src="{{url('public/assets/libs/toastr/toastr.min.js')}}"></script>
<script src="{{url('public/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
<script src="{{url('public/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{url('public/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{url('public/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{url('public/assets/libs/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{url('public/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<script src="{{url('public/assets/libs/moment/moment.js')}}"></script>
<script src="{{url('public/assets/libs/switchery/switchery.min.js')}}"></script>
<script src="{{url('public/assets/libs/katex/katex.min.js')}}"></script>
<script src="{{url('public/assets/libs/jquery-mask-plugin/jquery.mask.min.js')}}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    @if(session()->has('success'))
    toastr.success('{{session('success')}}');
    @endif
    @if(session()->has('error'))
    toastr.error('{{session('error')}}');
    @endif
    @if(session()->has('warning'))
    toastr.warning('{{session('warning')}}');
    @endif
</script>

@yield('js')

@stack('scripts')


</body>

</html>
