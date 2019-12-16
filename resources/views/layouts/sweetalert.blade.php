<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if (\Session::has('success'))
<script type="text/javascript">
  swal("¡Buen Trabajo!", "{!! \Session::get('success') !!}", "success");
</script>
@endif

@if (\Session::has('warning'))
<script type="text/javascript">
  swal("Advertencia", "{!! \Session::get('warning') !!}", "warning");
</script>
@endif

@if (\Session::has('error'))
<script type="text/javascript">
  swal("Error", "{!! \Session::get('error') !!}", "error");
</script>
@endif

@if (\Session::has('info'))
<script type="text/javascript">
  swal("Información", "{!! \Session::get('info') !!}", "info");
</script>
@endif