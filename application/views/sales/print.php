
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title?> &middot; <?=$site_title?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  
<link rel="stylesheet" href="<?=base_url('assets/custom/css/print.css')?>" />
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/custom/css/AdminLTE.min.css')?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/custom/css/skin-black.min.css')?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/custom/css/bootstrap.min.css')?>">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<style>

</style>

</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <?=$site_title?>
          <small class="pull-right">Printed: <?=unix_to_human(now())?></small>
          <small>Summary Sales Report of <?=$_GET['date']?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
   
    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th></th>
              <th>Sale ID</th>
              <th>Preparer</th>
              <th>Customer</th>
              <th>Total Amount</th>
              <th>Date Time</th>
            </tr>
          </thead>
          <?php if ($results): $x = 1; ?>
          <tbody>
          <?php foreach ($results as $res): $totamt[] = $res['totalAmt'] ?>
            <tr>
                <td class="text-center"><?=$x++?>.</td>
                <td><?=prettyID($res['id'])?></td>
                <td><?=$res['user']?></td>
                <td><?=$res['customer']?></td>
                <td><?=$res['totalAmt']?></td>
                <td><?=$res['created_at']?></td>
            </tr>
          <?php endforeach ?>
          <?php else: ?>
            <tbody>
              <tr>
                <td colspan="6">
                  <div class="alert alert-danger alert-solid">
                    No items found!
                  </div>
                </td>
              </tr>
            </tbody>
          <?php endif ?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <div class="signature-container">
            <div class="signature" style="width: 200px;">
              <span class="signee"><?=$user['name']?></span>
              <span class="signee-title">Verified and Printed by</span>
              </div><!-- /.signature -->
         </div><!-- /.signature-container -->
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Total Sales:</th>
              <td><h3 class="text-red"><?=decimalize(array_sum($totamt))?></h3></td>
            </tr>            
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
