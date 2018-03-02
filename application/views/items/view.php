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
                            <h3 class="page-title"><?=$info['name']?> </h3>
                        </div>
                    </div>

                    <ol class="breadcrumb">
                        <li><a href="<?=base_url('items')?>">Items</a></li>
                        <li class="active"><?=$title?></li>
                    </ol><!-- /.breadcrumb -->

                    <div class="row">
                        <div class="col-lg-12">
                          <?php
                            //ERROR ACTION        
                            $flash_error = $this->session->flashdata('error');
                            $flash_success = $this->session->flashdata('success');
                            $flash_valid =  validation_errors();  
                          ?>
                          <?=$this->sessnotif->showNotif()?>
                        </div><!-- /.col-xs-12 -->
                      </div><!-- /.row -->                   

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-block">
                                    <table class="table table-condensed table-striped table-bordered">
                                        <tr>
                                            <th colspan="2">
                                                <?php if ($info['img']): ?>
                                                <img src="<?=base_url('/uploads/'. $info['img'])?>" width="100px" height="100px" class="img-thumbnail"/>
                                                <?php else: ?>
                                                <img src="<?=base_url('assets/images/default-img.png')?>" width="100px" height="100px" class="img-thumbnail"/>
                                                <?php endif ?>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Item Name</th>
                                            <td><?=$info['name']?></td>
                                        </tr>
                                        <tr>
                                            <th>Serial No. / Control No.</th>
                                            <td><?=$info['serial']?></td>
                                        </tr>
                                        <tr>
                                            <th>Dealers Price</th>
                                            <td><?=$info['dp']?></td>
                                        </tr>
                                        <tr>
                                            <th>Selling Price</th>
                                            <td><?=$info['srp']?></td>
                                        </tr>
                                        <tr>
                                            <th>Unit</th>
                                            <td><?=$info['unit']?></td>
                                        </tr>
                                        <tr>
                                            <th>Category</th>
                                            <td><?=$info['category']?></td>
                                        </tr>
                                        <tr>
                                            <th>Critical Level</th>
                                            <td>
                                                <?php if ($info['critical_level']): ?>
                                                    <?=$info['critical_level']?>
                                                <?php else: ?>
                                                    <span class="label label-success">Prepared Goods</span>
                                                <?php endif ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="2">Description</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><?=$info['description']?></td>
                                        </tr>
                                    </table>

                                </div>
                                <!-- /.card-block -->
                            </div>
                            <!-- /.card -->

                        </div>


                        <div class="col-sm-8">
                            <!-- TABS -->
                            <div class="card">
                                <div class="card-block">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">

                                        <?php if ($info['critical_level']): ?>
                                        <li class="nav-item">
                                            <a class="nav-link <?php if(!($flash_error || $flash_success || $flash_valid))echo'active'?>" data-toggle="tab" href="#home" role="tab">Inventory</a>
                                        </li>   
                                        <?php endif ?>
                                        <li class="nav-item">
                                            <a class="nav-link <?php if(!$info['critical_level'])echo 'active'?>" data-toggle="tab" href="#logs" role="tab">Activity Logs</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?php if($flash_error || $flash_success || $flash_valid)echo'active'?>" data-toggle="tab" href="#settings" role="tab">Settings</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <?php if ($info['critical_level']): ?>
                                        <div class="tab-pane <?php if(!($flash_error || $flash_success || $flash_valid))echo'active'?>" id="home" role="tabpanel">
                                            <?php if ($inventory): ?>
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Batch ID</th>
                                                        <th>Dealers Price</th>
                                                        <th>Selling Price</th>
                                                        <th>QTY</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                
                                                <?php foreach ($inventory as $inv): ?>
                                                    <tr>
                                                        <td><a href="<?=base_url('items/view/'.$inv['item_id'].'/batch/'.$inv['batch_id'])?>"><?=$inv['batch_id']?></a></td>
                                                        <td><a href="<?=base_url('items/view/'.$inv['item_id'].'/batch/'.$inv['batch_id'])?>"><?=$inv['dp']?></a></td>
                                                        <td><a href="<?=base_url('items/view/'.$inv['item_id'].'/batch/'.$inv['batch_id'])?>"><?=$inv['srp']?></a></td>
                                                        <td><a href="<?=base_url('items/view/'.$inv['item_id'].'/batch/'.$inv['batch_id'])?>"><?=$inv['qty']?></a></td>
                                                    </tr>
                                                <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        
                                            <?php else: ?>
                                            
                                                <div class="alert alert-warning alert-solid" role="alert">
                                                    <strong>Oh snap!</strong> No Results Found!
                                                </div>
                                        
                                            <?php endif ?>

                                        </div>
                                        <?php endif ?>
                                        <div class="tab-pane <?php if(!$info['critical_level'])echo 'active'?>" id="logs" role="tabpanel">
                                            <h5 class="title">Last 50 Activity</h5>
                                            <?php if ($logs): ?>
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>User</th>
                                                        <th>Action</th>
                                                        <th>IP Address</th>
                                                        <th>Date Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                
                                                <?php foreach ($logs as $lg): ?>    
                                                    <tr>
                                                        <td><?=$lg['user']?></td>
                                                        <td><?=$lg['action']?></td>
                                                        <td><?=$lg['ip_address']?></td>
                                                        <td><?=$lg['date_time']?></td>
                                                    </tr>
                                                <?php endforeach ?>
                                            
                                                </tbody>
                                            </table>
                                            <?php else: ?>
                                            
                                                <div class="alert alert-warning alert-solid" role="alert">
                                                    <strong>Oh snap!</strong> No Results Found!
                                                </div>
                                        
                                            <?php endif ?>
                                        </div>  
                                        <div class="tab-pane <?php if($flash_error || $flash_success || $flash_valid)echo'active'?>" id="settings" role="tabpanel">
                                        <?=form_open_multipart('items/view/'. $info['id'])?>
                                            <div class="form-group">
                                                <label for="item_name">Item Name</label>
                                                <input type="text" name="name" class="form-control" id="item_name" value="<?=$info['name']?>" placeholder="Item Name..." required>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <label for="serial">Serial No. Control No.</label>
                                                        <input type="text" name="serial" class="form-control" id="serial" value="<?=$info['serial']?>" placeholder="Serial No." required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="crit_level">Critical Level</label>
                                                        <input type="number" name="critical_level" class="form-control" id="crit_level" value="<?=$info['critical_level']?>" placeholder="Critical Qty..." required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="dp">Dealers Price</label>
                                                        <input type="text" name="dp" class="form-control" id="dp" value="<?=$info['dp']?>" placeholder="Dealers Price..." required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="srp">Selling Price</label>
                                                        <input type="text" name="srp" class="form-control" id="srp" value="<?=$info['srp']?>" placeholder="Selling Price..." required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">    
                                                    <div class="form-group">
                                                        <label for="unit">Unit</label>
                                                        <select name="unit" class="form-control" id="unit" required>
                                                            <option disabled="" selected="">Select Unit...</option>
                                                        <?php if ($units): ?>
                                                        <?php foreach ($units as $unit): ?>
                                                            <option value="<?=$unit['title']?>" <?php if($unit['title']==$info['unit'])echo'selected';?>><?=$unit['title']?></option>
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
                                                            <option value="<?=$cat['title']?>" <?php if($cat['title']==$info['category'])echo'selected';?>><?=$cat['title']?></option>
                                                        <?php endforeach ?>
                                                        <?php endif ?>
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="img">Image</label>
                                                <input type="file" name="img" class="form-control" id="img"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea name="desc" id="desc" cols="30" rows="10" class="ckeditor" placeholder="Place some text here..."><?=$info['description']?></textarea>

                                            </div>
                                            <input type="hidden" name="id" value="<?=$this->encryption->encrypt($info['id'])?>" />
                                            <input type="hidden" name="img" value="<?=$this->encryption->encrypt($info['img'])?>"/>
                                            <div class="footer">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <a href="#deleteModal" class="btn btn-danger" data-toggle="modal">Delete</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group pull-right">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?=form_close()?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END TABS -->
                        </div>

                        </div>
                    </div>


                 

                    </div>                    

                </div>
            </div>
            <!-- /PAGE CONTENT -->
        </div>
    </div>


    <!-- Modal -->  
    <div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
    <?=form_open('items/delete')?>
      <div class="modal-content">
        <div class="modal-header">
        
        <h4 class="modal-title">Delete: <?=$info['name']?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <p>Are you sure to delete the record of <strong><?=$info['name']?></strong>?</p>
          <p>You <span class="badge badge-flat badge-danger">CANNOT UNDO</span> this action.</p>
          <input type="hidden" name="id" value="<?=$this->encryption->encrypt($info['id'])?>" />
        </div>
        <!-- /.modal-body -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger btn-flat">Delete</button>
        </div>
      </div>
      <!-- /.modal-content -->
    <?=form_close()?>
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.Modal -->


    <script type="text/javascript" src="<?=base_url('assets/lib/thirdparty/ckeditor/ckeditor.js')?>"></script>
    <?php $this->load->view('inc/js')?>

</body>
</html>