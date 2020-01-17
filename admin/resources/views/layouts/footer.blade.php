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
<script src="{{url('public')}}/assets/dist/js/{{url('public')}}/assets/pages/dashboard.js"></script>

<script src="{{url('public')}}/assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{url('public')}}/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

{{--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>--}}
{{--<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>--}}






<script src="{{url('public/assets/plugins/toastr/toastr.min.js')}}"></script>
@toastr_js
@toastr_render
@yield('js')


</body>

</html>
