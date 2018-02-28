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
                    <!-- <div class="row">
                        <div class="col-md-12">
                            <h3 class="page-title">Dashboard</h3>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-lg-12">
                          <?=$this->sessnotif->showNotif()?>
                        </div><!-- /.col-xs-12 -->
                      </div><!-- /.row -->


                    <div class="row">
                        <div class="col-sm-10">
                            <div class="card">
                            <?=form_open_multipart('items/create')?>
                                <div class="card-block">
                                    <h5 class="text-bold card-title">Register Item</h5>
                                    <div class="form-group">
                                        <label for="item_name">Item Name</label>
                                        <input type="text" name="name" class="form-control" id="item_name" value="<?=set_value('name')?>" placeholder="Item Name..." required>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="serial">Serial No. Control No.</label>
                                                <input type="text" name="serial" class="form-control" id="serial" value="<?=set_value('serial')?>" placeholder="Serial No." required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="crit_level">Critical Level</label>
                                                <input type="number" name="critical_level" class="form-control" id="crit_level" value="<?=set_value('critical_level')?>" placeholder="Critical Qty..." required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="dp">Dealers Price</label>
                                                <input type="number" name="dp" class="form-control" id="dp" value="<?=set_value('dp')?>" placeholder="Dealers Price..." required/>
                                            </div>
                                        </div>
                                        <!-- /.col-sm-6 -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="srp">Selling Price</label>
                                                <input type="number" name="srp" class="form-control" id="srp" value="<?=set_value('srp')?>" placeholder="Selling Price..." required/>  
                                            </div>
                                        </div>
                                        <!-- /.col-sm-6 -->
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">    
                                            <div class="form-group">
                                                <label for="unit">Unit</label>
                                                <select name="unit" class="form-control" id="unit" required>
                                                    <option disabled="" selected="">Select Unit...</option>
                                                <?php if ($units): ?>
                                                <?php foreach ($units as $unit): ?>
                                                    <option value="<?=$unit['title']?>"><?=$unit['title']?></option>
                                                <?php endforeach ?>
                                                <?php endif ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="category">Category</label>
                                                <select name="category" class="form-control" id="category" required>
                                                    <option disabled="" selected="">Select Category...</option>
                                                <?php if ($category): ?>
                                                <?php foreach ($category as $cat): ?>    
                                                    <option value="<?=$cat['title']?>"><?=$cat['title']?></option>
                                                <?php endforeach ?>
                                                <?php endif ?>
                                                </select> 
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="img">Image</label>
                                        <input type="file" name="img" class="form-control" id="img" value="<?=set_value('img')?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="desc" id="desc" cols="30" rows="10" class="ckeditor" placeholder="Place some text here..."><?=set_value('desc')?></textarea>

                                    </div>

                                    <div class="footer">
                                        <div class="form-group pull-right">
                                        <label for="check">
                                            <input type="checkbox" name="check" id="check">
                                            <strong>Consumable</strong>
                                        </label>
                                            <button type="submit" class="btn btn-primary">Register New Item</button>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-block -->
                            <?=form_close()?>
                            </div>
                            <!-- /.card -->
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

    <script type="text/javascript" src="<?=base_url('assets/lib/thirdparty/ckeditor/ckeditor.js')?>"></script>
    <?php $this->load->view('inc/js')?>


</body>
</html>