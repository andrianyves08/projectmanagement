<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
  $('table.display').DataTable();
} );
</script>

<script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>

<script type="text/javascript">
  $(function() {  
  <?php if($this->session->flashdata('user_loggedin')): ?>
    <?php echo "toastr.success('".$this->session->flashdata('user_loggedin')." ')"; ?>
  <?php endif; ?>


  <?php if($this->session->flashdata('user_loggedout')): ?>
    <?php echo "toastr.success('".$this->session->flashdata('user_loggedout')." ')"; ?>
  <?php endif; ?>

   <?php if($this->session->flashdata('project_created')): ?>
    <?php echo "toastr.success('".$this->session->flashdata('project_created')." ')"; ?>
  <?php endif; ?>

     <?php if($this->session->flashdata('team_created')): ?>
    <?php echo "toastr.success('".$this->session->flashdata('team_created')." ')"; ?>
  <?php endif; ?>

   <?php if($this->session->flashdata('team_invited')): ?>
    <?php echo "toastr.success('".$this->session->flashdata('team_invited')." ')"; ?>
  <?php endif; ?>

  });

</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

  })
</script>

  <?php echo validation_errors(); ?>
</body>
</html>
