<!DOCTYPE HTML>
<html>

<head>
    <title><?=$site_title?> - <?=$title?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php $this->load->view('inc/css')?>

     <script type="text/javascript">
      function enablereset() {
        if(document.getElementById("resetpass").checked == true) {
          document.getElementById("oldpass").disabled = false; 
          document.getElementById("newpass").disabled = false; 
          document.getElementById("confpass").disabled = false; 
        } else {
          document.getElementById("oldpass").disabled = true; 
          document.getElementById("newpass").disabled = true; 
          document.getElementById("confpass").disabled = true; 
        }
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
                            <h3 class="page-title">Users</h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                          <?=$this->sessnotif->showNotif()?>
                        </div><!-- /.col-xs-12 -->
                      </div><!-- /.row -->

                    <div class="row">

                        <div class="col-lg-12">
                            <div class="card">
                                <?=form_open_multipart('settings/profile')?>
                                <div class="card-block">
                                    <h5 class="text-bold card-title">Profile: <?=$user['name']?></h5>
                                    <div class="row">
                                    	<div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-4">
        	                                    	<div class="form-group">
        	                                    		<img src="<?=base_url('uploads/'.$user['img'])?>" class="img-responsive img-thumbnail" style="width:320px !important; height: 200px;"/>
        	                                    	</div>
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="img">Profile Image</label>
                                                        <input type="file" name="img" class="form-control" id="img"/>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <label for="name">Full name</label>
                                                        <input type="text" name="name" class="form-control" id="name" value="<?=$user['name']?>" required/>
                                                    </div>

                                                    <div class="row">    
                                                        <div class="col-sm-6">
                                                            <label for="email">Email</label>
                                                            <input type="text" name="email" class="form-control" id="email" value="<?=$user['email']?>" required/>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for="contact">Contact</label>
                                                            <input type="text" name="contact" class="form-control" id="contact" value="<?=$user['contact']?>" required/>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    <div class="form-group">
                                                        <label>
                                                            <input type="checkbox" name="resetpass" id="resetpass" onclick="enablereset()"/>
                                                            Check to Update Password
                                                        </label>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="old_password">Old Password</label>
                                                        <input type="password" name="oldpass" class="form-control" id="oldpass" placeholder="Old Password..." disabled/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="newpass">New Password</label>
                                                        <input type="password" name="newpass" class="form-control" id="newpass" placeholder="New Password..." disabled/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="newpass">Confirm Password</label>
                                                        <input type="password" name="confpass" class="form-control" id="confpass" placeholder="Confirm Password..." disabled/>
                                                    </div>
                                                    <input type="hidden" name="id" value="<?=$this->encryption->encrypt($user['username'])?>"/>
                                                    <div class="form-group pull-right">
                                                        <button type="submit" class="btn btn-success">Update</button>
                                                    </div>

                                                </div>

                                            </div>
                                            <!-- .row -->
                                    	</div>
                                    </div>
                                </div>
                                <?=form_close()?>
                            </div>
                        </div>

                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                      <?=form_open('user/resetpassword')?>
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
                                <p>Are you sure you want to reset password to <b>Biaños2018</b>.</p>
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

                </div>
            </div>
            <!-- /PAGE CONTENT -->
        </div>
    </div>

    <?php $this->load->view('inc/js')?>

</body>
</html>