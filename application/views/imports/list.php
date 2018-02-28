<!DOCTYPE HTML>
<html>

<head>
    <title><?=$site_title?> - <?=$title?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php $this->load->view('inc/css')?>
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/pagination.css')?>">

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
                            <h3 class="page-title">Imports</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                          <?=$this->sessnotif->showNotif()?>
                        </div><!-- /.col-xs-12 -->
                      </div><!-- /.row -->


                    <div class="row">
                        <div class="col-sm-10">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="text-bold card-title">Imports <span class="badge badge-pill badge-default"><?=$total_result?></span>

                                    <div class="form-group pull-right">
                                        <?=form_open('items', array('method' => 'GET'))?>
                                        <div class="input-group">
                                            <input type="text" name="search" class="form-control" id="search" placeholder="Search Item...">
                                            
                                            <div class="input-group-btn">
                                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                        <?=form_close()?>
                                    </div>

                                    </h5>

                                    <?php if ($results): ?>
                                    <table class="table table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th>Import ID</th>
                                                <th>Verifier</th>
                                                <th>Date Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($results as $res): ?>
                                            <tr>
                                                <td><a href="<?=base_url('imports/view/'. $res['id'])?>">#<?=prettyID($res['id'])?></a></td>
                                                <td><a href="<?=base_url('imports/view/'. $res['id'])?>"><?=$res['user']?></a></td>
                                                <td><a href="<?=base_url('imports/view/'. $res['id'])?>"><?=$res['created_at']?></a></td>
                                            </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                    <?php else: ?>
                                        <tfoot>
                                            <tr>
                                                <td>
                                                    <div class="alert alert-warning alert-solid">
                                                        <strong>Oh snap!</strong>
                                                        No Results Found!
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    <?php endif ?>
                                    </table>

                                </div>
                                <!-- /.card-block -->
                            </div>
                            <!-- /.card -->
                            <div class="form-group pull-right">
                                <?php foreach ($links as $link) { echo $link; } ?>
                            </div>
                        </div>

                    </div>                    

                </div>
            </div>
            <!-- /PAGE CONTENT -->

            <!-- Modal -->  
            <div class="modal fade" id="closeModal">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                
                <h4 class="modal-title">Cancel Order </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-12">
                    <p>Are you sure to Cancel Order?</p>
                    </div>
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.modal-body -->
                <div class="modal-footer">
                  <input type="hidden" name="id" value=""/>
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger btn-flat">Cancel Order</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
            </div>
            <!-- /.Modal -->


        </div>
    </div>

    <?php $this->load->view('inc/js')?>

</body>
</html>