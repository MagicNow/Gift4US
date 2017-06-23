<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMd4fF-PNTCuaMCg0oqzi-8OLzxLQ09N4"></script>    

<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/assets/admin/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/admin/js/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/admin/js/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/admin/js/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets/admin/js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('/assets/admin/js/colorpicker/bootstrap-colorpicker.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ asset('/assets/admin/js/jquery.maskedinput.min.js') }}"></script>
<script src="http://malsup.github.com/jquery.form.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.js"></script>
<script src="{{ asset('/assets/admin/js/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('/assets/admin/js/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('/assets/admin/js/datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('/assets/admin/js/jquery.validate.js') }}"></script>
<script type="text/javascript">
	var baseUrl = "{{ url('/') }}";
	var token = "{{ Session::getToken() }}";
</script>
<!-- AdminLTE App -->
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="{{ asset('/assets/admin/js/jQueryUI/jquery-ui.js') }}"></script>
<script src="{{ asset('/assets/admin/js/app.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/admin/js/admin.js') }}" type="text/javascript"></script>
@yield('javascripts')
