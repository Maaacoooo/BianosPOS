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
            document.getElementById("change").innerHTML = (tendered - total_amt).toFixed(2);
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
                            <h3 class="page-title"><?=$title?></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                          <?=$this->sessnotif->showNotif()?>

                          <div class="callout callout-warning">
                              <h6 class="strong"><i class="fa fa-warning"></i> Pending Sale</h6><!-- /.strong -->
                              <p>This  sale is marked pending.</p>
                          </div><!-- /.callout callout-warning -->
                        </div><!-- /.col-xs-12 -->
                      </div><!-- /.row -->                   
                    
                    <div class="row" id="sales_register">
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="text-bold card-title">Particulars</h5>
                                    <div class="form-group">
                                    <?=form_open('sales/add_item')?>
                                        <div class="input-group">
                                            <input type="text" name="item" class="form-control" id="search_item" placeholder="Type to Search Item..." autofocus />
                                            <input type="hidden" name="sale_id" value="<?=$this->encryption->encrypt($info['id'])?>" />
                                            <div class="input-group-btn">
                                                <button type="submit" class="btn btn-default"><i class="fa fa-shopping-cart"></i> Add Item</button>
                                            </div>
                                        </div>
                                    <?=form_close()?>
                                    </div>

                                    <?=form_open('sales/update_items')?>
                                    <input type="hidden" name="sale_id" value="<?=$this->encryption->encrypt($info['id'])?>" />
                                    <table class="table table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Item Name</th>
                                                <th>Selling Price</th>
                                                <th>QTY</th>
                                                <th>Sub Total</th>
                                            </tr>
                                        </thead>
                                        <?php $sub[] = 0; if ($items): ?>
                                        <tbody>
                                        <?php foreach ($items as $t): $qty[]=$t['qty']; $sub[]=(($t['qty']*$t['srp'])); ?>
                                            <tr>
                                                <td>
                                                    <?php if ($t['batch_id']): ?>
                                                        <?=$t['batch_id']?>
                                                    <?php else: ?>
                                                        <?=$t['item_id']?>
                                                    <?php endif ?>
                                                </td>
                                                <td><?=$t['name']?> - <?=$t['unit']?></td>
                                                <td><?=moneytize($t['srp'])?></td>
                                                <td><input type="number" name="qty[]" value="<?=$t['qty']?>" style="width: 60px"/></td>
                                                <td><?=moneytize(($t['qty']*$t['srp']))?></td>
                                            </tr>
                                                <input type="hidden" name="id[]" value="<?=$this->encryption->encrypt($t['id'])?>" />
                                        <?php endforeach ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="3" class="text-right">Total</th>
                                                <th class="table-success text-danger"><?=array_sum($qty)?></th><!-- /.bg-success text-danger -->
                                                <th class="table-success text-danger"><?=moneytize(array_sum($sub))?></th><!-- /.bg-success text-danger -->
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
                                <?=form_open('sales/update/'.$info['id'])?>
                                <h5 class="text-bold card-title">Sales Options</h5>

                                <div class="form-group">
                                    <label for="customer">Customer</label>
                                    <input type="text" name="customer" class="form-control" id="customer" placeholder="Customer..." value="<?=$info['customer']?>" required>
                                </div>      

                                <div class="form-group">
                                    <label for="remarks">Remarks</label>
                                    <textarea name="remarks" class="form-control" id="remarks" cols="30" rows="2"><?=$info['remarks']?></textarea>
                                </div>

                                <div class="form-group">
                                  <label>Senior Citizen</label>
                                  <div class="input-group">                                        
                                    <input type="text" id="senior_field" class="form-control" value="<?=$info['senior']?>" readonly>
                                    <span class="input-group-addon">
                                          <input type="checkbox" name="senior" id="senior" <?php if($info['senior']>0)echo'checked';?>>
                                    </span>
                                  </div>
                                </div><!-- /.form-group -->

                                <?php if (array_sum($sub) >= 700): ?>
                                <div class="form-group">
                                  <label>Loyalty Discount</label>
                                  <div class="input-group">                                        
                                    <input type="text" id="loyalty_field" class="form-control" value="<?=$info['discount']?>" readonly>
                                    <span class="input-group-addon">
                                          <input type="checkbox" name="discount" id="loyalty" <?php if($info['discount']>0)echo'checked';?>>
                                    </span>
                                  </div>
                                </div><!-- /.form-group -->
                                <?php endif ?>

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
                                    <button type="submit" class="btn btn-success form-control"><i class="fa fa-money"></i> SUBMIT SALE</button> 
                                </div>

                                <div class="form-group">
                                    <button type="button" data-target="#cancel" data-toggle="modal" class="btn btn-danger btn-block"><i class="fa fa-ban"></i> CANCEL SALE</button>
                                </div><!-- /.form-group -->
                                    <input type="hidden" name="id" value="<?=$this->encryption->encrypt($info['id'])?>" />
                                <?=form_close()?>
                                </div>
                            </div> <!-- /.card -->
                        </div>
                    </div>                    

                </div>
            </div>
            <!-- /PAGE CONTENT -->

            <!-- Modal -->  
            <div class="modal fade" id="cancel">
                    <div class="modal-dialog modal-sm">
                       <?=form_open('sales/cancel')?>                                                            
                      <div class="modal-content">
                        <div class="modal-header">                        
                        <h4 class="modal-title">Cancel Sale #<?=prettyID($info['id'])?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">                          
                            <p class="text-center">Are you sure to cancel this sale? <br/>You CANNOT UNDO this action</p>
                        </div>
                        <!-- /.modal-body -->
                        <div class="modal-footer">
                          <input type="hidden" name="id" value="<?=$this->encryption->encrypt($info['id'])?>" />

                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-ban"></i> Cancel Sale</button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </form>            
                </div>
                    <!-- /.modal-dialog -->
            </div>
            <!-- /.Modal -->

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

        var total_amt = <?=array_sum($sub)?>; //the total of cart

        $(document).ready(function() {
            
            change_senior();
            change_loyalty();

            $('#loyalty').on('click', function() {
                change_loyalty();
            });

            $('#senior').on('click', function() {
                change_senior();                 
            });



        });


        function change_senior() {
            var amount;

                if ($('#loyalty').prop('checked')) {
                    amount = total_amt - getLoyalty(total_amt);
                } else {
                    amount = total_amt;
                }

                if($('#senior').prop("checked")) {
                    var senior_cit = getSenior();

                    $('#senior_field').val(senior_cit);
                    $('#amt_tendered').val((amount - senior_cit).toFixed(2));
                    $('#totAmt').text((amount - senior_cit).toFixed(2));

                } else {
                    $('#amt_tendered').val((amount).toFixed(2));
                    $('#totAmt').text(amount.toFixed(2));
                    $('#senior_field').val('0.00');
                    
                }

        }

        function change_loyalty() {
              var amount;

                if ($('#senior').prop('checked')) {
                    amount = total_amt - getSenior();
                } else {
                    amount = total_amt;
                }

                if($('#loyalty').prop("checked")) {
                    var discount = getLoyalty(total_amt);

                    $('#loyalty_field').val(discount);
                    $('#amt_tendered').val((amount - discount).toFixed(2));
                    $('#totAmt').text((amount - discount).toFixed(2));

                } else {
                    $('#totAmt').text(amount.toFixed(2));
                    $('#amt_tendered').val((amount).toFixed(2));
                    $('#loyalty_field').val('0.00');
                    
                }
        }


        function getSenior(amount) {


            var return_data = function() {
                var srp = null;
                $.ajax(
                        {
                            async: false,
                            type: "GET",
                            url: "<?=base_url('sales/getSeniorDiscount/'.$info['id'])?>",
                            data: "{}",
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
                            cache: false, 
                            success: function (data) {
                                
                            srp = (data['srp'] * 0.2);
                            
                            }
                });

                return srp;
            
            }();

            return return_data.toFixed(2);       

        }

        function getLoyalty(amount) {
            return (amount * 0.1).toFixed(2);
        }
    </script>  

</body>
</html>