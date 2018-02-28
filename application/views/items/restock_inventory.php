<!DOCTYPE HTML>
<html>

<head>
    <title><?=$site_title?> - <?=$title?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php $this->load->view('inc/css')?>
    <link rel="stylesheet" href="<?=base_url('assets/custom/css/jquery-ui.min.css')?>">  
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
                            <h3 class="page-title">Restock Inventory</h3>
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
                                    <h5 class="text-bold card-title">Items</h5>
                                        <div class="form-group">
                                        <?=form_open('items/add_restock')?>
                                            <div class="input-group">
                                                <input type="text" name="item" class="form-control" id="item" placeholder="Type to Search Item..."/>
                                                <input type="hidden" name="id" value="<?=$this->encryption->encrypt(0)?>"/>
                                                <div class="input-group-btn">
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Add Item</button>
                                                </div>
                                            </div>
                                        <?=form_close()?>
                                        </div>

                                        <?=form_open('items/update_cart')?>
                                        <input type="hidden" name="imp_id" value="<?=$this->encryption->encrypt(0)?>" />
                                        <?php  if ($items): ?>
                                        <table class="table table-condensed table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Item ID</th>
                                                    <th>Item Name</th>
                                                    <th>Dealers Price</th>
                                                    <th>Selling Price</th>
                                                    <th>Qty</th>
                                                    <th>Sub Total</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                            <?php foreach ($items as $itm): ?>
                                                <tr>
                                                    <td><?=$itm['item_id']?></td>
                                                    <td><?=$itm['name']?></td>
                                                    <td><input type="text" name="dp[]" value="<?=$itm['dp']?>"></td>
                                                    <td><input type="text" name="srp[]" value="<?=$itm['srp']?>"></td>
                                                    <td><input type="text" name="qty[]" value="<?=$itm['qty']?>"></td>
                                                    <td><?=decimalize($itm['srp'] * $itm['qty'])?></td>
                                                    <input type="hidden" name="id[]" value="<?=$this->encryption->encrypt($itm['item_id'])?>" />
                                                </tr>
                                            <?php endforeach ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="6">
                                                        <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#submitModal">Submit Import</button>
                                                        <button class="btn btn-primary pull-right" type="submit">Update Cart</button> 
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        <?php else: ?>
                                            <div class="alert alert-info">
                                            Add an Item!
                                            </div>
                                        <?php endif ?>
                                        </table>
                                        <?=form_close()?>

                                </div>
                                <!-- /.card-block -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col-sm-12 -->

                    </div>                    

                </div>
            </div>
            <!-- /PAGE CONTENT -->


        </div>
    </div>


<!-- Modal -->  
    <div class="modal fade" id="submitModal">
    <div class="modal-dialog">
    <?=form_open('items/submit_cart')?>
      <div class="modal-content">
        <div class="modal-header">
        
        <h4 class="modal-title">Import Description</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" rows="4" id="description" placeholder="Place some text here..."></textarea>
                </div>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.modal-body -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success btn-flat">Submit Import</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.Modal -->


        <?php $this->load->view('inc/js')?>
<script type="text/javascript" src="<?=base_url('assets/custom/js/jquery-1.11.2.min.js')?>"></script> 
    <script src="<?=base_url('assets/custom/js/jquery-ui.js');?>" type="text/javascript" language="javascript" charset="UTF-8"></script>    



<script type="text/javascript">
  $(function(){
  $("#item").autocomplete({    
    source: "<?php echo base_url('index.php/items/autocomplete');?>" // path to the get_birds method
  });
});
</script>

</body>
</html>