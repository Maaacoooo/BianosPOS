<!DOCTYPE HTML>
<html>

<head>
    <title><?=$site_title?> - <?=$title?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/core.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/components.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/icons/fontawesome/styles.min.css')?>">

    <script type="text/javascript" src="<?=base_url('lib/js/jquery.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('lib/js/tether.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('lib/js/bootstrap.min.js')?>"></script>

    <script type="text/javascript" src="<?=base_url('assets/js/app.min.js')?>"></script>
</head>

<body>

    <?=form_open('dashboard/login')?>
        <div class="page-container">
            <!-- PAGE CONTENT -->
            <div class="content h-100">
                <div class="row h-100">
                    <div class="col-lg-12">
                        <div class="login card auth-box mx-auto my-auto">
                            <div class="card-block text-center">
                                <div class="user-icon">
                                    <i class="fa fa-user-circle"></i>
                                </div>

                                <h4 class="text-light">Login</h4>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <?=$this->sessnotif->showNotif()?>
                                    </div><!-- /.col-xs-12 -->
                                </div><!-- /.row -->

                                <div class="user-details">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                    <i class="fa fa-user-o"></i>
                                                </span>
                                            <input type="text" name="username" class="form-control" placeholder="Username" aria-describedby="basic-addon1" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                    <i class="fa fa-key"></i>
                                                </span>
                                            <input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1" required>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /PAGE CONTENT -->
        </div>
    <?=form_close()?>



</body>

</html>