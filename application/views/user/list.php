<!DOCTYPE HTML>
<html>

<head>
    <title><?=$site_title?> - <?=$title?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php $this->load->view('inc/css')?>
    <link rel="stylesheet" href="<?=base_url('assets/css/pagination.css')?>">

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
                                <div class="card-block">
                                    <h5 class="text-bold card-title">User List <span class="badge"><?=$total_result?></span>

                                      <div class="form-group pull-right">
                                        <?=form_open('users', array('method' => 'GET'))?>
                                        <div class="input-group">
                                            <input type="text" name="search" class="form-control" placeholder="Search User...">
                                          <div class="input-group-btn">
                                            <button type="submit" class="btn btn-info"><i class="fa fa-search"></i></button>
                                          </div>
                                        </div>
                                        <?=form_close()?>
                                      </div>

                                    </h5>

                                    <?php if ($results): ?>
                                    <table class="table table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Username</th>
                                                <th>Usertype</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($results AS $user): ?>
                                            <tr>
                                                <td><a href="<?=base_url('users/update/'.$user['username'])?>"><?=$user['name']?></a></td>
                                                <td><a href="<?=base_url('users/update/'.$user['username'])?>"><?=$user['username']?></a></td>
                                                <td><a href="<?=base_url('users/update/'.$user['username'])?>"><?=$user['usertype']?></a></td>
                                            </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
                                    <?php else: ?>
                                        <div class="alert alert-danger">
                                        No Results Found!
                                        </div>
                                    <?php endif ?>

                                    <div class="pull-right">
                                        <?php foreach ($links as $link) { echo $link; } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingThree">
                                    <h5 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Register User
                                    </a>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="card-block">

                                        <div class="row">
                                        <div class="col-md-12">

                                            <div class="alert alert-info alert-solid">
                                                <h4><i class="fa fa-info-circle"></i> Information</h4>
                                                <p>The default password of every new user is <b>Bianos</b> (case-sensitive).</p>
                                                <p>Please advise your New User to change his password after loggin in.</p>
                                            </div>

                                            <?=form_open_multipart('users', array('class' => 'form-horizontal'))?>
                                                <div class="form-group row margin-top-30">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Username</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" name="username" class="form-control" value="<?=set_value('username')?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Full name</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" name="name" class="form-control" value="<?=set_value('name')?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Email Address</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" name="email" class="form-control" value="<?=set_value('email')?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Contact Number</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" name="contact" class="form-control" value="<?=set_value('contact')?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Usertype</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select name="usertype" class="form-control" value="<?=set_value('usertype')?>">
                                                            <option disabled="" selected="">Select Usertype...</option>
                                                             <?php 
                                                                if($usertypes):
                                                                foreach($usertypes as $usr):
                                                              ?>
                                                            <option value="<?=$usr['title']?>"><?=$usr['title']?></option>
                                                            <?php
                                                                endforeach;
                                                                endif;
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Profile Image</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="file" name="img" class="form-control" value="<?=set_value('img')?>">
                                                    </div>
                                                </div>

                                                <div class="pull-right">
                                                    <button type="reset" class="btn btn-secondary">
                                                        Reset
                                                        <i class="fa fa-refresh position-right"></i>
                                                    </button>

                                                    <button type="submit" class="btn btn-primary">
                                                        Submit
                                                        <i class="fa fa-arrow-right position-right"></i>
                                                    </button>
                                                </div>
                                            <?=form_close()?>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>

                          <div class="col-md-10">
                            <div class="pull-right">
                              <?php foreach ($links as $link) { echo $link; } ?>
                            </div>
                          </div><!-- /.col-md-12 -->

                    </div>

                    

                </div>
            </div>
            <!-- /PAGE CONTENT -->
        </div>
    </div>

    <?php $this->load->view('inc/js')?>

</body>
</html>