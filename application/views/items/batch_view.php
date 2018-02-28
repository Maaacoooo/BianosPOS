<!DOCTYPE HTML>
<html>

<head>
    <title><?=$site_title?> - <?=$title?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php $this->load->view('inc/css')?>
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
                            <h3 class="page-title">Batch <?=$batch['batch_id']?></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                          <?=$this->sessnotif->showNotif()?>
                        </div><!-- /.col-xs-12 -->
                      </div><!-- /.row -->


                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-block">
                                    <table class="table table-condensed table-striped table-bordered">
                                        <tr>
                                            <th colspan="2">
                                                <?php if ($info['img']): ?>
                                                    <img src="<?=base_url('/uploads/'. $info['img'])?>" style="width: 150px !important; height: 100px !important;" class="img-thumbnail"/>
                                                <?php else: ?>
                                                    <img src="<?=base_url('assets/images/default-img.png')?>" style="width: 150px !important; height: 100px !important;" class="img-thumbnail"/>
                                                <?php endif ?>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th width="40%">Batch ID</th>
                                            <td><?=$batch['batch_id']?></td>
                                        </tr>
                                        <tr>
                                            <th>Item Name</th>
                                            <td><?=$info['name']?></td>
                                        </tr>
                                        <tr>
                                            <th>Serial No. / Control No.</th>
                                            <td><?=$info['serial']?></td>
                                        </tr>
                                        <tr>
                                            <th>Unit</th>
                                            <td><?=$info['unit']?></td>
                                        </tr>
                                        <tr>
                                            <th>Category</th>
                                            <td><?=$info['category']?></td>
                                        </tr>
                                        <tr>
                                            <th>Dealers Price</th>
                                            <td><?=$info['dp']?></td>
                                        </tr>
                                        <tr>
                                            <th>Selling Price</th>
                                            <td><?=$info['srp']?></td>
                                        </tr>
                                        <tr>
                                            <th>Total Stock</th>
                                            <td><?=$batch['qty']?></td>
                                        </tr>
                                        <tr>
                                            <th colspan="2">Description</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><?=$info['description']?></td>
                                        </tr>
                                    </table>

                                    <div class="footer">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-info form-control" data-target="#rebatchModal" data-toggle="modal"><i class="fa fa-gift"></i> Rebatch</button>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-block -->
                            </div>
                            <!-- /.card -->

                        </div>
                        <!-- /.col-sm-4 -->

                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-block text-center">
                                
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Activity Logs</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home" role="tabpanel">
                                            <h6 class="pull-left">Last 50 Activity</h6>
                                            <table class="table table-condensed table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>User</th>
                                                        <th>Action</th>
                                                        <th>IP Address</th>
                                                        <th>Date Time</th>
                                                    </tr>
                                                </thead>
                                            <?php if ($logs): ?>
                                            <?php foreach ($logs as $lg): ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?=$lg['user']?></td>
                                                        <td><?=$lg['action']?></td>
                                                        <td><?=$lg['ip_address']?></td>
                                                        <td><?=$lg['date_time']?></td>
                                                    </tr>
                                                </tbody>
                                            <?php endforeach ?>
                                            <?php else: ?>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="4">
                                                            <div class="alert alert-danger alert-solid">
                                                                No Activity Logs found in the System.
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            <?php endif ?>
                                            </table>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>                    

                </div>
            </div>
            <!-- /PAGE CONTENT -->

            <!-- Modal -->  
            <div class="modal fade" id="rebatchModal">
            <div class="modal-dialog modal-lg">
            <?=form_open('items/rebatch')?>
              <div class="modal-content">
                <div class="modal-header">
                
                <h4 class="modal-title">Rebatch <?=$info['name']?> Batch <?=$batch['batch_id']?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">

                  <p>Rebatching is a process to modify the DP and SRP. <br />
                Once DP and/or SRP are changed, the system will generate a new batch.</p>

                  <p>To rebatch this current batch, please fill up the following:</p>

                  <div class="row form-group">
                  <div class="col-sm-4">
                    <label for="qty">Quantity to Rebatch</label>
                    <input type="number" name="qty" id="qty" class="form-control" value="<?=$batch['qty']?>" required/>
                  </div><!-- /.col-sm-4 -->
                  <div class="col-sm-4">
                    <label for="dp">Dealers Price</label>
                    <input type="text" name="dp" id="dp" class="form-control" value="<?=$batch['dp']?>" required/>
                  </div><!-- /.col-sm-4 -->
                  <div class="col-sm-4">
                    <label for="srp">Selling Price</label>
                    <input type="text" name="srp" id="srp" class="form-control" value="<?=$batch['srp']?>" required/>
                  </div><!-- /.col-sm-4 -->
                </div><!-- /.form-group -->

                  <p>Please note that you <strong class="text-red">CANNOT UNDO</strong> this action.</p>

                </div>
                <!-- /.modal-body -->
                <div class="modal-footer">
                  <input type="hidden" name="id" value="<?=$this->encryption->encrypt($batch['batch_id'])?>" />
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-warning btn-flat">Rebatch</button>
                </div>
              </div>
              <!-- /.modal-content -->
            <?=form_close()?>
            </div>
            <!-- /.modal-dialog -->
            </div>
            <!-- /.Modal -->

        </div>
    </div>

    <?php $this->load->view('inc/js')?>

</body>
</html>