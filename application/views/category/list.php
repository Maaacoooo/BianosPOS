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
                            <h3 class="page-title">Item Categories</h3>
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
                                    <h5 class="text-bold card-title">Item Category List <span class="badge badge-pill badge-default"><?=$total_result?></span>

                                    <div class="form-group pull-right">
                                        <?=form_open('categories', array('method' => 'GET'))?>
                                        <div class="input-group">
                                            <input type="text" name="search" class="form-control" id="search" placeholder="Search Item...">
                                            
                                            <div class="input-group-btn">
                                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                            </div>

                                            <div class="input-group-btn">
                                                <a href="#categoryModal" data-toggle="modal" class="btn btn-success">Register Category</a>
                                            </div>
                                        </div>
                                        <?=form_close()?>
                                    </div>

                                    </h5>
                                    <table class="table table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th>Category</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if ($results): ?>
                                        <?php foreach ($results as $res): ?>
                                            <tr>
                                                <td><a href="<?=base_url('categories/view/'.$res['id'])?>"><?=$res['title']?></a></td>
                                            </tr>
                                        <?php endforeach ?>
                                        <?php endif ?>
                                        </tbody>
                                    </table>
                                    <div class="footer">
                                        <div class="form-group pull-right">
                                            <?php foreach ($links as $link) { echo $link; } ?>
                                        </div>
                                    </div>
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
            <div class="modal fade" id="categoryModal">
            <div class="modal-dialog">
            <?=form_open('categories/create')?>
              <div class="modal-content">
                <div class="modal-header">
                
                <h4 class="modal-title">Register Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" name="title" class="form-control" id="category" placeholder="Category..." required>
                        </div>
                    </div>
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.modal-body -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success btn-flat">Register Category</button>
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