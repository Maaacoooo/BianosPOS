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
                            <h3 class="page-title">Item Inventory</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                          <?=$this->sessnotif->showNotif()?>
                        </div><!-- /.col-xs-12 -->
                      </div><!-- /.row -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="text-bold card-title">Total Inventory List <span class="badge badge-pill badge-default"><?=$total_result?></span>

                                    <div class="form-group pull-right">
                                        <?=form_open('items/inventory', array('method' => 'GET'))?>
                                        <div class="input-group">
                                            <input type="text" name="search" class="form-control" id="search" placeholder="Search Item...">
                                            
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                        <?=form_close()?>
                                    </div>

                                    </h5>
                                
                                    <table class="table table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th>Batch ID</th>
                                                <th>Item ID</th>
                                                <th>Item Name</th>
                                                <th>Unit</th>
                                                <th>Category</th>
                                                <th>Dealers Price</th>
                                                <th>Selling Price</th>
                                                <th>QTY</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if ($results): ?>
                                        <?php foreach ($results as $res): ?>
                                            <tr>
                                                <td><a href="<?=base_url('items/view/'.$res['id'].'/batch/'.$res['batch_id'])?>"><?=$res['batch_id']?></a></td>
                                                <td><a href="<?=base_url('items/view/'.$res['id'].'/batch/'.$res['batch_id'])?>"><?=$res['id']?></a></td>
                                                <td><a href="<?=base_url('items/view/'.$res['id'].'/batch/'.$res['batch_id'])?>"><?=$res['name']?></a></td>
                                                <td><a href="<?=base_url('items/view/'.$res['id'].'/batch/'.$res['batch_id'])?>"><?=$res['unit']?></a></td>
                                                <td><a href="<?=base_url('items/view/'.$res['id'].'/batch/'.$res['batch_id'])?>"><?=$res['category']?></a></td>
                                                <td><a href="<?=base_url('items/view/'.$res['id'].'/batch/'.$res['batch_id'])?>"><?=moneytize($res['dp_inventory'])?></a></td>
                                                <td><a href="<?=base_url('items/view/'.$res['id'].'/batch/'.$res['batch_id'])?>"><?=moneytize($res['srp_inventory'])?></a></td>
                                                <td>
                                                    <a href="<?=base_url('items/view/'.$res['id'])?>">           
                                                    <?php if ($res['critical_level']): ?>
                                                        <?php if(!$res['qty']): ?>
                                                            <span class="badge bg-danger">0</span>
                                                            <span class="label bg-danger">Restock</span>
                                                        <?php elseif ($res['critical_level'] >= $res['qty']): ?>
                                                            <span class="badge bg-danger"><?=$res['qty']?></span>
                                                            <span class="badge bg-danger">!</span>
                                                        <?php elseif(($res['critical_level']*1.2) >= $res['qty']): ?>  
                                                            <span class="badge bg-warning"><?=$res['qty']?></span>
                                                        <?php else: ?>
                                                            <span class="badge bg-success"><?=$res['qty']?></span>                                        
                                                        <?php endif ?>
                                                    <?php else: ?>
                                                        <span class="label label-success">Prepared Goods</span>                                    
                                                    <?php endif ?>                                     
                                                  </a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                        <?php endif ?>
                                        </tbody>
                                    </table>
                                    <div class="footer">
                                        <div class="form-group">
                                            <a href="<?=base_url('items/print_total_inventory')?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print Total Inventory Report</a>
                                        </div>
                                    </div>
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
        </div>
    </div>

    <?php $this->load->view('inc/js')?>

</body>
</html>