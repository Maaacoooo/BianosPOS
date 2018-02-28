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
                            <h3 class="page-title">Users</h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                          <?=$this->sessnotif->showNotif()?>
                        </div><!-- /.col-xs-12 -->
                      </div><!-- /.row -->

                    <div class="row">

                        <div class="col-lg-10">
                            <div class="card">
                                <?=form_open_multipart('users/update/'. $info['username'])?>
                                    <div class="card-block">
                                        <h5 class="text-bold card-title">Update: <?=$info['name']?></h5>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="form-group">

                                                <?php if ($info['img']): ?>
                                                    <img src="<?=base_url('/uploads/'. $info['img'])?>" class="img-thumbnail img-custom">
                                                <?php else: ?>
                                                    <img src="<?=base_url('assets/images/user.jpg')?>" class="img-thumbnail img-custom"/>
                                                <?php endif ?>

                                                </div>
                                            </div>

                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name" class="form-control" id="name" value="<?=$info['name']?>"/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="text" name="email" class="form-control" id="email" value="<?=$info['email']?>"/>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="contact">Contact</label>
                                                            <input type="text" name="contact" class="form-control" id="contact" value="<?=$info['contact']?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6"> 
                                                        <div class="form-group">
                                                            <label for="usertype">Usertype</label>
                                                            <select name="usertype" class="form-control" id="usertype" required>
                                                                <option disabled="" selected="">Select Usertype</option>
                                                            <?php if ($usertypes): ?>
                                                            <?php foreach ($usertypes AS $type): ?>
                                                                <option value="<?=$type['title']?>" <?php if ($info['usertype'] == $type['title']) { echo 'selected'; } ?>><?=$type['title']?></option>
                                                            <?php endforeach; ?>
                                                            <?php endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="img">Profile Image</label>
                                                    <input type="file" name="img" class="form-control" id="img"/>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="input-group">
                                                            <div class="input-group-btn">
                                                                <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-info">Reset Password</button>
                                                            </div>
                                                            <div class="input-group-btn">

                                                                <button type="button" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group pull-right">
                                                            <input type="hidden" name="id" value="<?=$this->encryption->encrypt($info['username'])?>"/>
                                                            <button class="btn btn-success">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?=form_close()?>
                            </div>


                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                              <?=form_open('users/resetpassword')?>
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <p>Are you sure you want to reset password to <b>Bianos</b>.</p>
                                        </div>
                                    </div>
                                  </div>
                                  <input type="hidden" name="id" value="<?=$this->encryption->encrypt($info['username'])?>"/>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Reset</button>
                                  </div>
                                </div>
                                <?=form_close()?>
                              </div>
                            </div>
                            <!-- /.modal -->


                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                              <?=form_open('users/delete')?>
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete <?=$info['name']?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <p>Are you sure you want to delete <em><b><?=$info['name']?></b></em> the <b><?=$info['usertype']?></b>.</p>
                                        </div>
                                    </div>
                                  </div>
                                  <input type="hidden" name="id" value="<?=$this->encryption->encrypt($info['username'])?>"/>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                  </div>
                                </div>
                                <?=form_close()?>
                              </div>
                            </div>
                            <!-- /.modal -->

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