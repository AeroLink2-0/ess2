<script src="{{url('js/app.js')}}"></script>
<script>
$(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    });
    $('.textarea').summernote()

    //select2
  $('#edit_barangay').select2();

});
</script>
