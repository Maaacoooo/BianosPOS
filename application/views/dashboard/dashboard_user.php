<!DOCTYPE HTML>
<html>

<head>
    <title><?=$site_title?> - <?=$title?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?=base_url('assets/lib/morris/morris.css')?>">
    <?php $this->load->view('inc/css')?> 

    <script type="text/javascript">
        function updateChange() {
            var tendered = document.getElementById("amt_tendered").value;
            var total_amt = document.getElementById("totAmt").innerHTML;

            // Set Change
            document.getElementById("change").innerHTML = tendered - total_amt;
        }
    </script>
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
                            <div class="alert alert-danger alert-solid">
                                <h4><i class="fa fa-warning"></i> Change your Password!</h4>
                                <p>The system has detected that you haven't changed your default password. Please change your password for additional security.</p>
                                <p>To change your password, go to your <em>Profile</em> <a href="<?=base_url('settings/profile')?>">Click here to change!</a></p>
                            </div>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-lg-4">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="text-bold card-title">Pending Sales</h5>
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
                                </div><!-- /.card-block -->
                            </div><!-- /.card -->
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

                                var line = new Morris.Line({
                                  element: 'salesRep',
                                  resize: true,
                                  data: getSales(),
                                  xkey: 'month',
                                  ykeys: ['total'],
                                  labels: ['Total Sales'],
                                  lineColors: ['#3c8dbc']                   
                                });


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