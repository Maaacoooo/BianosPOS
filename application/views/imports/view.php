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
                            <h3 class="page-title">Imports #<?=prettyID($info['id'])?></h3>
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
                                    <h5 class="text-bold card-title">Import Details</h5>

                                    <table class="table table-condensed table-striped">
                                        <tbody>
                                            <tr>
                                                <th>Import ID</th>
                                                <td>#<?=prettyID($info['id'])?></td>
                                            </tr>
                                            <tr>
                                                <th>Verified by</th>
                                                <td><?=$info['user']?></td>
                                            </tr>   
                                            <tr>
                                                <th>Date Created</th>
                                                <td><?=$info['created_at']?></td>
                                            </tr>
                                            <tr>
                                                <th colspan="2">Remarks</th>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><?=$info['remarks']?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <!-- /.card-block -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col-sm-4 -->

                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="text-bold card-title">Import Items</h5>
                                    <?php if ($items): ?>
                                    <table class="table table-striped table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Item ID</th>
                                                <th>Item Name</th>
                                                <th>Unit</th>
                                                <th>Dealers Price</th>
                                                <th>Selling Price</th>
                                                <th class="table-info">QTY</th>
                                                <th>Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($items as $item): $qty[] = $item['qty']; 
                                                                         $sub[] = ($item['qty'] * $item['srp']);
                                        ?>
                                            <tr>
                                                <td><?=$item['item_id']?></td>
                                                <td><?=$item['name']?></td>
                                                <td><?=$item['unit']?></td>
                                                <td><?=$item['dp']?></td>
                                                <td><?=$item['srp']?></td>
                                                <td class="table-info"><?=$item['qty']?></td>
                                                <td><?=($item['srp'] * $item['qty'])?></td>
                                            </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="5" class="text-right">Total</th>
                                                <th class="table-info text-danger"><?=array_sum($qty)?></th>
                                                <th class="table-success text-danger"><?=array_sum($sub)?></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <?php else: ?>
                                        <div class="alert alert-warning alert-solid">
                                            <strong>Oh snap!</strong>
                                            No Results Found!
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-sm-8 -->

                    </div>             
                    <!-- /.row -->       

                </div>
            </div>
            <!-- /PAGE CONTENT -->


        </div>
    </div>

    <?php $this->load->view('inc/js')?>

</body>
</html>
