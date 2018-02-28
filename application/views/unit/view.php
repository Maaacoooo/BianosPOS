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
                            <h3 class="page-title"><?=$info['title']?></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                          <?=$this->sessnotif->showNotif()?>
                        </div><!-- /.col-xs-12 -->
                      </div><!-- /.row -->


                    <div class="row">
                        <div class="col-sm-10">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="text-bold card-title"><?=$info['title']?> Inventory <span class="badge badge-pill badge-default"><?=$total_result?></span></h5>

                                    <!-- TABS -->
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Item List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Activity Logs</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home" role="tabpanel">
                                           <?php if ($results): ?>
                                           <table class="table table-striped table-condensed">
                                               <thead>
                                                   <tr>
                                                       <th>ID</th>
                                                       <th>Item Name</th>
                                                       <th>Category</th>
                                                       <th>Unit</th>
                                                       <th>DP</th>
                                                       <th>SRP</th>
                                                       <th>QTY</th>
                                                   </tr>
                                               </thead>
                                               <tbody>
                                                <?php foreach ($results as $item): ?>
                                                   <tr>
                                                       <td><a href="<?=base_url('items/view/'.$item['id'])?>"><?=$item['id']?></a></td>
                                                       <td><a href="<?=base_url('items/view/'.$item['id'])?>"><?=$item['name']?></a></td>
                                                       <td><a href="<?=base_url('items/view/'.$item['id'])?>"><?=$item['category']?></a></td>
                                                       <td><a href="<?=base_url('items/view/'.$item['id'])?>"><?=$item['unit']?></a></td>
                                                       <td><a href="<?=base_url('items/view/'.$item['id'])?>"><?=$item['DP']?></a></td>
                                                       <td><a href="<?=base_url('items/view/'.$item['id'])?>"><?=$item['SRP']?></a></td>
                                                       <td><a href="<?=base_url('items/view/'.$item['id'])?>"><?=$item['qty']?></a></td>
                                                   </tr>
                                                <?php endforeach ?>
                                               </tbody>
                                           </table>
                                           <?php else: ?>
                                            <div class="alert alert-warning alert-solid" alert="role">
                                            <strong>Oh snap!</strong>
                                            No Results Found!
                                            </div>
                                           <?php endif ?>
                                        </div>
                                        <div class="tab-pane" id="profile" role="tabpanel">
                                            <h5>Last 50 Activity</h5>
                                            <?php if ($logs): ?>
                                            <table class="table table-striped table-condensed">
                                                <thead>
                                                    <tr>
                                                        <th>User</th>
                                                        <th>Action</th>
                                                        <th>Date Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($logs as $lg): ?>
                                                    <tr>
                                                        <td><?=$lg['user']?></td>
                                                        <td><?=$lg['action']?></td>
                                                        <td><?=$lg['date_time']?></td>
                                                    </tr>
                                                <?php endforeach ?>
                                                </tbody>
                                            </table>
                                            <?php else: ?>
                                                <div class="alert alert-warning alert-solid" alert="role">
                                                <strong>Oh snap!</strong>
                                                No Results Found!
                                                </div>
                                            <?php endif ?>
                                        </div>
                                        <div class="tab-pane" id="settings" role="tabpanel">
                                            <?=form_open('units/view/'. $info['id'], array('class' => 'form-horizontal'))?>
                                            <div class="form-group row">
                                                <div class="col-sm-3">
                                                    <label class="control-label col-form-label" id="title">Unit</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" name="title" class="form-control" id="title" value="<?=$info['title']?>" placeholder="Title..." required/>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" value="<?=$this->encryption->encrypt($info['id'])?>" />
                                            <div class="form-group row">
                                                <div class="col-sm-3">
                                                    <button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#deleteModal">Delete</button> 
                                                </div>
                                                <div class="col-sm-9">
                                                    <button type="submit" class="btn btn-warning pull-right">Update</button>                                        
                                                    
                                                </div>                                         
                                            </div><!-- /.form-group -->
                                            <?=form_close()?>
                                        </div>
                                    </div>
                                    <!-- END TABS -->


                                </div>
                                <!-- /.card-block -->
                            </div>
                            <!-- /.card -->

                        </div>

                    </div>                    

                </div>
            </div>
            <!-- /PAGE CONTENT -->

            <!-- Modal -->  
            <div class="modal fade" id="deleteModal">
            <div class="modal-dialog">
            <?=form_open('units/delete')?>
              <div class="modal-content">
                <div class="modal-header">
                
                <h4 class="modal-title">Delete <?=$info['title']?> </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                  <p>Are you sure to delete the record of <strong><?=$info['title']?>?</strong><br /></p>
                  <p>You <span class="badge badge-flat badge-danger">CANNOT UNDO</span> this action.</p>
                </div>
                <!-- /.modal-body -->
                <div class="modal-footer">
                  <input type="hidden" name="id" value="<?=$this->encryption->encrypt($info['id'])?>" />
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger btn-flat">Delete Category</button>
                </div>
              </div>
              <!-- /.modal-content -->
            <?=form_close()?>
            </div>
            <!-- /.modal-dialog -->
            </div>
            <!-- /.Modal -->


        </div>
    </div>

    <?php $this->load->view('inc/js')?>

</body>
</html>