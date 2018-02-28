<!DOCTYPE HTML>
<html>

<head>
    <title><?=$site_title?> - <?=$title?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?=base_url('assets/custom/css/jquery-ui.min.css')?>"> 
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
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="text-bold card-title">Sales Register</h5>
                                    <div class="form-group">
                                    <?=form_open('sales/add_item')?>
                                        <div class="input-group">
                                            <input type="text" name="item" class="form-control" id="search_item" placeholder="Type to Search Item..."/>
                                            <input type="hidden" name="sale_id" value="<?=$this->encryption->encrypt(0)?>" />
                                            <div class="input-group-btn">
                                                <button type="submit" class="btn btn-default"><i class="fa fa-shopping-cart"></i> Add Item</button>
                                            </div>
                                        </div>
                                    <?=form_close()?>
                                    </div>

                                    <?=form_open('sales/update_items')?>
                                    <input type="hidden" name="sale_id" value="<?=$this->encryption->encrypt(0)?>" />
                                    <table class="table table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th>Batch ID</th>
                                                <th>Item ID</th>
                                                <th>Item Name</th>
                                                <th>Selling Price</th>
                                                <th>QTY</th>
                                                <th>DISC</th>
                                                <th>Sub Total</th>
                                            </tr>
                                        </thead>
                                        <?php $sub[] = 0; if ($low_items): ?>
                                        <tbody>
                                        <?php foreach ($low_items as $t): $qty[]=$t['qty']; $sub[]=(($t['qty']*$t['srp']) - ($t['qty'] * $t['discount'])); $disc[] = ($t['qty'] * $t['discount']); ?>
                                            <tr>
                                                <td><?=$t['batch_id']?></td>
                                                <td><?=$t['item_id']?></td>
                                                <td><?=$t['name']?> - <?=$t['unit']?></td>
                                                <td><?=$t['srp']?></td>
                                                <td><input type="number" name="qty[]" value="<?=$t['qty']?>" style="width: 60px"/></td>
                                                <td><input type="text" name="disc[]" value="<?=$t['discount']?>" style="width: 60px"/></td>
                                                <td><?=(($t['qty']*$t['srp']) - ($t['qty'] * $t['discount']))?></td>
                                            </tr>
                                                <input type="hidden" name="id[]" value="<?=$this->encryption->encrypt($t['batch_id'])?>" />
                                        <?php endforeach ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="4" class="text-right">Total</th>
                                                <th class="table-success text-danger"><?=array_sum($qty)?></th><!-- /.bg-success text-danger -->
                                                <th class="table-success text-danger"><?=decimalize(array_sum($disc))?></th><!-- /.bg-success text-danger -->
                                                <th class="table-success text-danger"><?=decimalize(array_sum($sub))?></th><!-- /.bg-success text-danger -->
                                            </tr>
                                          </tfoot>
                                          <button type="submit" style="display: none;">asd</button>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="7">
                                                    <div class="alert alert-info alert-solid">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                        <p>Add an item</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif ?>
                                    </table>
                                    <?=form_close()?>

                                </div>
                                <!-- /.card-block -->
                            </div>
                            <!-- /.card -->
                        </div>

                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-block">
                                <?=form_open('sales/create')?>
                                <h5 class="text-bold card-title">Sales Options</h5>

                                <div class="form-group">
                                    <label for="customer">Customer</label>
                                    <input type="text" name="customer" class="form-control" id="customer" placeholder="Customer..." value="Walk-in" required>
                                </div>      

                                <div class="form-group">
                                    <label for="remarks">Remarks</label>
                                    <textarea name="remarks" class="form-control" id="remarks" cols="30" rows="2"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="customer">Total Amount</label>
                                    <h3 class="text-danger" id="totAmt"><?=decimalize(array_sum($sub))?></h3>
                                </div><!-- /.form-group -->

                                <div class="form-group">
                                    <label for="amt_tendered">Amount Tendered</label>
                                    <input type="text" name="amt_tendered" id="amt_tendered" onkeyup="updateChange()" class="form-control" placeholder="Amount e.g 1000.00" value="<?=decimalize(array_sum($sub))?>" />
                                </div><!-- /.form-group -->

                                <div class="form-group">
                                    <label for="customer">Change</label>
                                    <h3 class="text-success" id="change">00.00</h3>
                                </div><!-- /.form-group -->

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success form-control"><i class="fa fa-money"></i> Submit Sale</button> 
                                </div>
                                <?=form_close()?>
                                </div>
                            </div>
                        </div>

                    </div>                    

                </div>
            </div>
            <!-- /PAGE CONTENT -->

        </div>
    </div>



    <?php $this->load->view('inc/js')?>
    <script type="text/javascript" src="<?=base_url('assets/custom/js/jquery-1.11.2.min.js')?>"></script> 
    <script src="<?=base_url('assets/custom/js/jquery-ui.js');?>" type="text/javascript" language="javascript" charset="UTF-8"></script>    



    <script type="text/javascript">
          $(function(){
          $("#search_item").autocomplete({    
            source: "<?php echo base_url('index.php/sales/autocomplete_items');?>"
          });
        });
    </script>  

</body>
</html>