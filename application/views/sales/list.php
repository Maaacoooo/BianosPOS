<!DOCTYPE HTML>
<html>

<head>
    <title><?=$site_title?> - <?=$title?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php $this->load->view('inc/css')?>
    <link rel="stylesheet" href="<?=base_url('assets/custom/css/jquery-ui.min.css')?>">  
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?=base_url('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')?>">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?=base_url('assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')?>">
</head>

<body>

    <?php $this->load->view('inc/header')?>

    <div class="page-container">
        <div class="page-content">

        <?php $this->load->view('inc/left_nav')?>

            <!-- PAGE CONTENT -->
            <div class="content-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="page-title">Sales</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                          <?=$this->sessnotif->showNotif()?>
                        </div><!-- /.col-xs-12 -->
                      </div><!-- /.row -->


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-block">
                                    <div class="form-group">
                                    <h5 class="text-bold card-title">Sales <span class="badge badge-pill badge-default"><?=$total_result?></span>

                                      <div class="row pull-right">
                                            <div class="col-sm-7">
                                            <?=form_open('sales', array('method' => 'GET', 'class' => 'input-group input-group-sm pull-left', 'style' => 'width: 250px;'))?>       
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <button type="submit" class="btn btn-info"><i class="fa fa-calendar"></i></button>
                                                  </div>
                                                <input type="text" name="date" class="form-control input-sm pull-right" placeholder="Type Date..." id="dateSearch">
                                            </div>
                                            <?=form_close()?>
                                            </div>
                                            <div class="col-sm-5">
                                            <?=form_open('sales', array('method' => 'GET'))?>
                                            <div class="input-group">
                                                <input type="text" name="search" class="form-control" placeholder="Search User...">
                                              <div class="input-group-btn">
                                                <button type="submit" class="btn btn-info"><i class="fa fa-search"></i></button>
                                              </div>
                                            </div>
                                            <?=form_close()?>
                                            </div>
                                      </div>

                                    </h5>
                                    </div>

                                    <table class="table table-striped table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Sale ID</th>
                                                <th>Preparer</th>
                                                <th>Customer</th>
                                                <th>Total Amount</th>
                                                <th>Date Time</th>
                                            </tr>
                                        </thead>
                                        <?php if ($results): ?>
                                        <tbody>
                                        <?php foreach ($results as $res): ?>
                                            <?php $sum[] = $res['totalAmt']; ?>
                                            <tr>
                                                <td><a href="<?=base_url('sales/view/'. $res['id'])?>">#<?=prettyID($res['id'])?></a></td>
                                                <td><a href="<?=base_url('sales/view/'. $res['id'])?>"><?=$res['user']?></a></td>
                                                <td><a href="<?=base_url('sales/view/'. $res['id'])?>"><?=$res['customer']?></a></td>
                                                <td><a href="<?=base_url('sales/view/'. $res['id'])?>"><?=moneytize($res['totalAmt'])?></a></td>
                                                <td><a href="<?=base_url('sales/view/'. $res['id'])?>"><?=$res['created_at']?></a></td>
                                            </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                        <?php endif ?>
                                    </table>

                                    <?=array_sum($sum)?>

                                    <div class="footer">
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalPrint"><i class="fa fa-print"></i> Print Sales Report</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-block -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col-sm-12 -->
                    </div>
                    <!-- /.row -->                    
                </div>
                <!-- /.content -->
            </div>
            <!-- /PAGE CONTENT -->
        </div>
        <!-- page-content -->
    </div>
    <!-- page-container -->


    <!-- Modal -->  
    <div class="modal fade" id="modalPrint">
    <div class="modal-dialog modal-lg">
    <?=form_open('sales/print_report', array('method' => 'get', 'target' => '_blank'))?>
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Print Sales Report</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <p>When printing a Summary Sales Report, select the range of date.</p>
          <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" name="date" class="form-control input-sm pull-right" id="dateReport">
            <div class="input-group-btn">
                <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-print"></i> Print Report</button>
            </div>
          </div>
        </div>
        <!-- /.modal-body -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    <?=form_close()?>
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.Modal -->



    <?php $this->load->view('inc/js')?>
    <script type="text/javascript" src="<?=base_url('assets/custom/js/jquery-1.11.2.min.js')?>"></script> 
    <script src="<?=base_url('assets/custom/js/jquery-ui.js');?>" type="text/javascript" language="javascript" charset="UTF-8"></script>    
   
    <!-- PAGE SCRIPTS -->
    <!-- date-range-picker -->
    <script src="<?=base_url('assets/plugins/moment/min/moment.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
    <!-- bootstrap datepicker -->
    <script src="<?=base_url('assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>

   <script>
       $(function () {
        // Date range Picker
        $('#dateSearch').daterangepicker()
        $('#dateReport').daterangepicker()
       })
   </script> 
   <!-- / PAGE SCRIPTS -->

</body>
</html>