
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title?> &middot; <?=$site_title?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php $this->load->view('frontend/inc/css')?>
   
</head>
<body class="hold-transition skin-black sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <?php $this->load->view('frontend/inc/header')?>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <?php $this->load->view('frontend/inc/left_nav')?>    
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$title?>        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active"><?=$title?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <div class="col-xs-12">
          <?=$this->sessnotif->showNotif()?>
        </div><!-- /.col-xs-12 -->
      </div><!-- /.row -->

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>      
          </div>
        </div>
        <div class="box-body">
          <input type="text" name="" id="immu" class="form-control">
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


</div>
<!-- ./wrapper -->

    <!-- jQuery 3 -->
<script src="http://192.168.43.125/ci_clinic/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="http://192.168.43.125/ci_clinic/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- SlimScroll -->
<script src="http://192.168.43.125/ci_clinic/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="http://192.168.43.125/ci_clinic/assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="http://192.168.43.125/ci_clinic/assets/dist/js/adminlte.min.js"></script>
    
<!-- SELECT2 -->
<script type="text/javascript" src="http://192.168.43.125/ci_clinic/assets/custom/js/jquery-1.11.2.min.js"></script> 
<script src="http://192.168.43.125/ci_clinic/assets/custom/js/jquery-ui.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<!-- Custom Magni -->
<script src="http://192.168.43.125/ci_clinic/assets/custom/img-custom/js/jquery.magnific-popup.min.js"></script>  
<script src="http://192.168.43.125/ci_clinic/assets/custom/img-custom/js/magnific-popup-options.js"></script>
<script src="http://192.168.43.125/ci_clinic/assets/custom/img-custom/js/jquery.stellar.min.js"></script>
<script src="http://192.168.43.125/ci_clinic/assets/custom/img-custom/js/jquery.waypoints.min.js"></script>
<!-- Page Script -->
<script type="text/javascript">

   $(function(){
  $("#immu").autocomplete({    
    source: "http://localhost/bianos1/index.php/menu/autocomplete" // path to the get_birds method
  });
});
</script>

  
</body>
</html>
