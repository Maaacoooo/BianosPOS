<!DOCTYPE HTML>
<html>

<head>
    <title><?=$site_title?> - <?=$title?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?=base_url('assets/custom/css/jquery-ui.min.css')?>"> 
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
                            <h3 class="page-title"><?=$title?></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                          <?=$this->sessnotif->showNotif()?>
                        </div><!-- /.col-xs-12 -->
                      </div><!-- /.row -->
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="callout callout-info">
                                <div class="row">
                                    <div class="col-sm-6 col-lg-8">
                                        <h6 class="strong"><i class="fa fa-info-circle"></i> Pending for Verification</h6>
                                        <p>This Sale is pending for verification. You can still update the order</p>                                
                                    </div><!-- /.col-sm-6 -->
                                    <div class="col-sm-6 col-lg-4">
                                        <button class="btn btn-success btn-block" data-target="#approve" data-toggle="modal"><i class="fa fa-check"></i> Verify</button>
                                        <a href="<?=base_url('sales/update/'.$info['id'])?>" class="btn btn-warning btn-block"><i class="fa fa-edit"></i> Update Sale</a>
                                    </div><!-- /.col-sm-6 -->
                                </div><!-- /.row -->
                            </div><!-- /.callout callout-info -->
                        </div><!-- /.col-sm-12 -->
                    </div><!-- /.row -->

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="text-bold card-title">Particulars</h5>
                                    <div class="row">

                                        <div class="col-sm-8">
                                            <table class="table table-striped table-bordered table-condensed">
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
                                                        <td><?=$item['item_id']?></td>
                                                        <td><?=$item['name']?></td>
                                                        <td><?=moneytize($item['srp'])?></td>
                                                        <td class="table-info"><?=$item['qty']?></td>
                                                        <td><?=moneytize(($item['qty'] * $item['srp']))?></td>
                                                    </tr>
                                                <?php endforeach ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="3" class="text-right">Total</th>
                                                        <th class="table-info text-danger"><?=array_sum($qty)?></th>
                                                        <th class="table-success text-danger"><?=moneytize(array_sum($sub))?></th>
                                                    </tr>
                                                </tfoot>
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

                                        <div class="col-sm-4">                                            
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
                                                    <tr class="bg-yellow">
                                                        <th>Grand Total</th>
                                                        <td><?=moneytize($info['total'])?></td>
                                                    </tr>
                                                    <tr class="bg-yellow">
                                                        <th>Loyalty Discount</th>
                                                        <td class="text-info"><?=moneytize($info['discount'])?></td>
                                                    </tr>
                                                    <tr class="bg-yellow">
                                                        <th>Senior Citizen</th>
                                                        <td class="text-info"><?=moneytize($info['senior'])?></td>
                                                    </tr>
                                                    <tr class="bg-yellow">
                                                        <th>Net Total</th>
                                                        <?php $net = $info['total'] - $info['senior'] - $info['discount']; ?>
                                                        <th class="text-danger"><?=moneytize($net)?></th>
                                                    </tr>
                                                    <tr class="bg-green">
                                                        <th>Amount Tendered</th>
                                                        <td><?=moneytize($info['amount_tendered'])?></td>
                                                    </tr>
                                                    <tr class="bg-green">
                                                        <th>Change</th>
                                                        <th class="text-success"><?=moneytize($info['amount_tendered'] - $net)?></th>
                                                    </tr>                                                   
                                                </tbody>
                                            </table>
                                            <hr />
                                            <table>
                                                <table class="table table-striped table-condensed">
                                                     <tr>
                                                        <th>Prepared by</th>
                                                        <td><?=$info['user']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Date Created</th>
                                                        <td><?=$info['created_at']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2">Remarks</th>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="table-info"><?=$info['remarks']?></td>
                                                    </tr>
                                                </table><!-- /.table table-striped table-condensed -->
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>                    

                </div>
            </div>
            <!-- /PAGE CONTENT -->

            <!-- Modal -->  
            <div class="modal fade" id="approve">
                    <div class="modal-dialog modal-sm">
                       <?=form_open('sales/verify/'.$info['id'])?>                                                            
                      <div class="modal-content">
                        <div class="modal-header">                        
                        <h4 class="modal-title">Verify</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">                          
                            <p class="text-center">Are you sure to verify this sale? <br/>You CANNOT UNDO this action</p>
                        </div>
                        <!-- /.modal-body -->
                        <div class="modal-footer">
                          <input type="hidden" name="id" value="<?=$this->encryption->encrypt($info['id'])?>" />

                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-check"></i> Verify</button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </form>            
                </div>
                    <!-- /.modal-dialog -->
            </div>
            <!-- /.Modal -->


        </div>
    </div>



    <?php $this->load->view('inc/js')?>
    <script type="text/javascript" src="<?=base_url('assets/custom/js/jquery-1.11.2.min.js')?>"></script> 
    <script src="<?=base_url('assets/custom/js/jquery-ui.js');?>" type="text/javascript" language="javascript" charset="UTF-8"></script>    

</body>
</html>