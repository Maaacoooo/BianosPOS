<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$title?> &middot; <?=$site_title?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <link rel="stylesheet" href="<?=base_url('assets/custom/css/print.css')?>" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/custom/css/AdminLTE.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/custom/css/bootstrap.min.css')?>">
    <style>
    .table-items {
      min-height: 350px !important;
    }
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
            <small>Sale #<?=prettyID($info['id'])?></small>
            </h2>
          </div>
          <!-- /.col -->
        </div>
        
        <!-- Table row -->
        <div class="row">
          <div class="col-xs-8 table-responsive">
            <table class="table table-striped table-bordered table-condensed table-items">
              <thead>
                <tr>
                  <th>Item ID</th>
                  <th>Item Name</th>
                  <th>Price</th>
                  <th class="table-info">QTY</th>
                  <th>Sub Total</th>
                </tr>
              </thead>
              <?php if ($items): ?>
              <tbody>
                <?php foreach($items as $item):
                $qty[] = $item['qty'];
                $sub[] = (($item['qty'] * $item['srp'])); ?>
                <tr>
                  <td>
                    <?php if ($item['batch_id']): ?>
                      <?=$item['batch_id']?>     
                    <?php else: ?>
                      <?=$item['item_id']?>                    
                    <?php endif ?>               
                  </td>
                  <td><?=$item['name']?></td>
                  <td><?=moneytize($item['srp'])?></td>
                  <td class="table-info"><?=$item['qty']?></td>
                  <td><?=moneytize(($item['qty'] * $item['srp']))?></td>
                </tr>
                <?php endforeach; ?>      
              </tbody>  
              <tr>
                <th colspan="3" class="text-right">Total</th>
                <th class="table-info text-danger"><?=array_sum($qty)?></th>
                <th class="table-success text-danger"><?=moneytize(array_sum($sub))?></th>
              </tr>
              
              <?php else: ?>
              <tr>
                <td colspan="6">
                  <div class="alert alert-warning alert-solid">
                    <strong>Oh snap!</strong>
                    No Results Found!
                  </div>
                </td>
              </tr>
              <?php endif ?>
            </table>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <table class="table table-striped table-condensed">
              <tbody>
                <tr>
                  <th>Customer</th>
                  <td><?=$info['customer']?></td>
                </tr>
                <tr>
                  <th>Status</th>
                  <td>
                    <?php if ($info['status']): ?>
                    <span class="badge bg-success">PAID</span>
                    <?php else: ?>
                    <span class="badge bg-danger">PENDING</span>
                    <?php endif ?>
                  </td>
                </tr>
                <tr>
                  <th>Grand Total</th>
                  <td><?=moneytize($info['total'])?></td>
                </tr>
                <tr>
                  <th>Loyalty Discount</th>
                  <td class="text-info"><?=moneytize($info['discount'])?></td>
                </tr>
                <tr>
                  <th>Senior Citizen</th>
                  <td class="text-info"><?=moneytize($info['senior'])?></td>
                </tr>
                <tr>
                  <th>Net Total</th>
                  <?php $net = $info['total'] - $info['senior'] - $info['discount']; ?>
                  <th class="text-danger"><?=moneytize($net)?></th>
                </tr>
                <tr>
                  <th>Amount Tendered</th>
                  <td><?=moneytize($info['amount_tendered'])?></td>
                </tr>
                <tr>
                  <th>Change</th>
                  <th class="text-success"><?=moneytize($info['amount_tendered'] - $net)?></th>
                </tr>
              </tbody>
            </table>
            <hr />
            <table>
              <table class="table table-condensed">
                <tr>
                  <th>Prepared by</th>
                  <td><?=$info['user']?></td>
                </tr>
                <tr>
                  <th>Date</th>
                  <td><?=$info['created_at']?></td>
                </tr>
                <tr>
                  </table><!-- /.table table-striped table-condensed -->
                </table>
                </div><!-- /.col-xs-4 -->
              </div>
              <!-- /.row -->
              
            </section>
            <!-- /.content -->
          </div>
          <!-- ./wrapper -->
        </body>
      </html>