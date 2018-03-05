<!DOCTYPE HTML>
<html>
    <head>
        <title><?=$site_title?> - <?=$title?></title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->load->view('inc/css')?>
        <link rel="stylesheet" href="<?=base_url('assets/lib/morris/morris.css')?>">
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
                                        <div class="col-sm-12 col-lg-8">
                                            <div class="card">
                                                <div class="card-block">
                                                    <h5 class="text-bold card-title">Top Sold Items</h5>
                                                    <div id="topSoldItems" style="height: 350px;"></div><!-- /#topSoldItems -->
                                                    
                                                </div><!-- /.card-block -->
                                            </div><!-- /.card -->
                                        </div><!-- /.col-sm-12 col-lg-8 -->  
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="row">                                                
                                                <div class="col-sm-6">
                                                    <div class="widget-overview bg-info-1">
                                                        <div class="inner">
                                                            <h2><?=$count_inventory?></h2>
                                                            <p>Total Items</p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="fa fa-flask"></i>
                                                        </div>
                                                        <div class="details bg-info-3">
                                                            <span><a href="<?=base_url('items')?>" style="color: #fff;">View Details <i class="fa fa-arrow-right"></i></a></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
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

                                                <div class="col-sm-12">
                                                    <a href="<?=base_url('sales/create')?>" class="btn btn-lg btn-block btn-success"><i class="fa fa-money"></i> Sales Register</a>
                                                    <a href="<?=base_url('items/restock_inventory')?>" class="btn btn-lg btn-block btn-primary"><i class="fa fa-cube"></i> Restock Inventory</a>
                                                </div><!-- /.col-sm-12 -->

                                            </div><!-- /.row -->
                                        </div><!-- /.col-sm-12 col-lg-4 -->                                          
                                    </div><!-- /.row -->

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
                                </div> <!-- /.row -->

                                <div class="row">
                                    <div class="col-sm-12 col-lg-4">
                                        <h5 class="text-bold card-title">Pending Sales</h5><!-- /.text-bold card-title -->
                                        <?php if ($pending): ?>
                                           <div class="row">
                                            <?php foreach ($pending as $pen): ?>
                                                <div class="col-sm-6">
                                                    <div class="widget-overview bg-success-1">
                                                        <div class="inner">
                                                            <h2>#<?=$pen['id']?></h2>
                                                            <p><?=moneytize($pen['total'])?></p>
                                                        </div>

                                                        <div class="icon">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </div>

                                                        <div class="details bg-success-3">
                                                            <span><a href="<?=base_url('sales/update/'.$pen['id'])?>" style="color: #fff;">Continue <i class="fa fa-arrow-right"></i></a></span>
                                                        </div>
                                                    </div>
                                                </div><!-- /.col-sm-3 -->
                                            <?php endforeach; ?>
                                           </div><!-- /.row -->
                                        <?php else: ?>
                                            <div class="alert alert-success">
                                                <h5><i class="fa fa-check"></i> No Pending Sales to Show </h5>
                                            </div><!-- /.alert alert-success -->
                                        <?php endif ?>

                                    </div><!-- /.col-sm-12 col-lg-4 -->
                                    <div class="col-sm-12 col-lg-8">
                                        <div class="card">
                                            <div class="card-block">
                                                <h5 class="text-bold card-title">Sales</h5>  
                                                <div id="salesRep"></div><!-- /#salesRep -->                                              
                                            </div><!-- /.card-block -->
                                        </div><!-- /.card -->
                                    </div><!-- /.col-sm-12 col-lg-8 -->
                                </div><!-- /.row -->
                                    
                                </div>
                            </div>
                                    <!-- /PAGE CONTENT -->
                        </div>
                    </div>
                            <?php $this->load->view('inc/js')?>
                            <script src="<?=base_url('assets/lib/morris/raphael-min.js')?>"></script>
                            <script src="<?=base_url('assets/lib/morris/morris.min.js')?>"></script>
                            <script type="text/javascript">
                                var topSoldItems = new Morris.Bar({
                                  // ID of the element in which to draw the chart.
                                  element: 'topSoldItems',

                                  data: getTopSoldItems(),

                                  // The name of the data record attribute that contains x-values.
                                  xkey: 'name',
                                  // A list of names of data record attributes that contain y-values.
                                  ykeys: ['count'],
                                  // Labels for the ykeys -- will be displayed when you hover over the
                                  // chart.
                                  labels: ['Sales'],
                                  resize: true,
                                  xLabelAngle: 45
                                  
                                });

                                var test = [
                                    {month: '2011', total: "2666.25"},
                                    {month: '2012', total: "6810.0"},                             
                                    {month: '2013', total: "10687.12"},
                                    {month: '2014', total: "8432.10"}
                                  ];

                                var line = new Morris.Line({
                                  element: 'salesRep',
                                  resize: true,
                                  data: getSales(),
                                  xkey: 'month',
                                  ykeys: ['total'],
                                  labels: ['Total Sales'],
                                  lineColors: ['#3c8dbc']                   
                                });

                               // console.log(getSales());


                                function getTopSoldItems() {

                                    var return_data = function() {
                                        var data = null;
                                        $.ajax(
                                                {
                                                    async: false,
                                                    type: "GET",
                                                    url: "<?=base_url('dashboard/getTopItems')?>",
                                                    data: "[]",
                                                    contentType: "application/json; charset=utf-8",
                                                    dataType: "json",
                                                    cache: false, 
                                                    success: function (datas) {
                                                        
                                                    data = datas;
                                                    
                                                    }
                                        });

                                        return data;
                                    
                                    }();

                                    return return_data;       

                                }


                                function getSales() {

                                    var return_data = function() {
                                        var data = [];
                                        $.ajax(
                                                {
                                                    async: false,
                                                    type: "GET",
                                                    url: "<?=base_url('dashboard/getSales')?>",
                                                    data: "[]",
                                                    contentType: "application/json; charset=utf-8",
                                                    dataType: "json",
                                                    cache: false, 
                                                    success: function (datas) {                                                                                                                                                   
                                                    
                                                      data = datas;
                                                    
                                                    }
                                        });

                                        return data;
                                    
                                    }();

                                    return return_data;       

                                }


                                console.log(test);



                            </script>
                        </body>
                    </html>