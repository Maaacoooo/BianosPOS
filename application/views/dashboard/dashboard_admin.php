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
                            <h3 class="page-title">Dashboard</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <?=$this->sessnotif->showNotif()?>
                        </div><!-- /.col-xs-12 -->
                    </div><!-- /.row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <?php if($passwordverify): ?>
                            <div class="callout callout-danger">
                                <h4><i class="fa fa-warning"></i> Change your Password!</h4>
                                <p>The system has detected that you haven't changed your default password. Please change your password for additional security.</p>
                                <p>To change your password, go to your <em>Profile</em> <a href="<?=base_url('settings/profile')?>">Click here to change!</a></p>
                            </div>
                            <?php endif ?>
                        </div>
                    </div>


                    <div class="row">
                        <!--<div class="col-lg-3 col-xs-6">
                            <div class="widget-overview bg-primary-1">
                                <div class="inner">
                                    <h2><?=$count_sales?></h2>
                                    <p>Sales List</p>
                                </div>

                                <div class="icon">
                                    <i class="fa fa-list"></i>
                                </div>

                                <div class="details bg-primary-3">
                                    <span><a href="<?=base_url('sales')?>" style="color: #fff;">View Details <i class="fa fa-arrow-right"></i></a></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-xs-6">
                            <div class="widget-overview bg-danger-1">
                                <div class="inner">
                                    <h2><?=$count_imports?></h2>
                                    <p>Import List</p>
                                </div>

                                <div class="icon">
                                    <i class="fa fa-list"></i>
                                </div>

                                <div class="details bg-danger-3">
                                    <span><a href="<?=base_url('imports')?>" style="color: #fff;">View Details <i class="fa fa-arrow-right"></i></a></span>
                                </div>
                            </div>
                        </div> -->

                        <div class="col-lg-3 col-xs-6">
                            <div class="widget-overview bg-info-1">
                                <div class="inner">
                                    <h2><?=$count_inventory?></h2>
                                    <p>List of Total Inventory</p>
                                </div>

                                <div class="icon">
                                    <i class="fa fa-flask"></i>
                                </div>

                                <div class="details bg-info-3">
                                    <span><a href="<?=base_url('items/inventory')?>" style="color: #fff;">View Details <i class="fa fa-arrow-right"></i></a></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-xs-6">
                            <div class="widget-overview bg-success-1">
                                <div class="inner">
                                    <h2><?=$count_users?></h2>
                                    <p>User Accounts</p>
                                </div>

                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>

                                <div class="details bg-success-3">
                                    <span><a href="<?=base_url('users')?>" style="color: #fff;">View Details <i class="fa fa-arrow-right"></i></a></span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="text-bold card-title">Critical Inventory</h5>
                                    <table class="table table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th>Batch ID</th>
                                                <th>Item Name</th>
                                                <th>Category</th>
                                                <th>Unit</th>
                                                <th>Dealers Price</th>
                                                <th>Selling Price</th>
                                                <th>QTY</th>
                                            </tr>
                                        </thead>
                                        <?php if ($items): ?>
                                        <tbody>
                                        
                                        <?php foreach ($items as $item): ?>
                                            <tr>
                                                <td><a href="<?=base_url('items/view/'. $item['id'] .'/batch/' . $item['batch_id'])?>"><?=$item['batch_id']?></a></td>
                                                <td><a href="<?=base_url('items/view/'. $item['id'] .'/batch/' . $item['batch_id'])?>"><?=$item['name']?></a></td>
                                                <td><a href="<?=base_url('items/view/'. $item['id'] .'/batch/' . $item['batch_id'])?>"><?=$item['category']?></a></td>
                                                <td><a href="<?=base_url('items/view/'. $item['id'] .'/batch/' . $item['batch_id'])?>"><?=$item['unit']?></a></td>
                                                <td><a href="<?=base_url('items/view/'. $item['id'] .'/batch/' . $item['batch_id'])?>"><?=$item['dp']?></a></td>
                                                <td><a href="<?=base_url('items/view/'. $item['id'] .'/batch/' . $item['batch_id'])?>"><?=$item['srp']?></a></td>
                                                <td>
                                                <?php if(!$item['qty']): ?>
                                                            <span class="badge bg-danger">0</span>
                                                            <span class="label bg-danger">Restock</span>
                                                        <?php elseif ($item['critical_level'] >= $item['qty']): ?>
                                                            <span class="badge bg-danger"><?=$item['qty']?></span>
                                                            <span class="badge bg-danger">!</span>
                                                        <?php elseif($item['critical_level'] <= ($item['qty']*1.2)): ?>  
                                                            <span class="badge bg-warning"><?=$item['qty']?></span>                                                        
                                                        <?php endif ?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>                                       
                                        </tbody>
                                        <?php else: ?>
                                        <tbody>
                                            <tr>
                                                <td colspan="7">
                                                    <div class="alert alert-warning alert-solid">
                                                        As of now there's no low stocks found in the System.
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php endif ?>
                                    </table>
                                </div>
                                <!-- /.card-block -->
                            </div>
                            <!-- /.card -->
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