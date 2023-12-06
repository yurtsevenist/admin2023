 <!-- Main Footer -->
 <footer class="main-footer">
    <strong>Tüm hakları saklıdır &copy; 2023 <a href="#">Mustafa YURTSEVEN</a>.</strong>
   
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="tema/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="tema/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="tema/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="tema/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="tema/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="tema/dist/js/pages/dashboard3.js"></script>
<!-- DataTables  & Plugins -->
<script src="tema/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="tema/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="tema/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="tema/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="tema/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="tema/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="tema/plugins/jszip/jszip.min.js"></script>
<script src="tema/plugins/pdfmake/pdfmake.min.js"></script>
<script src="tema/plugins/pdfmake/vfs_fonts.js"></script>
<script src="tema/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="tema/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="tema/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy",  "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  $(function () {
    $("#example2").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy",  "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
