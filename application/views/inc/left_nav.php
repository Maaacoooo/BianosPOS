            <!-- inject:SIDEBAR -->

            <div id="sidebar-main" class="sidebar sidebar-default">
    <div class="sidebar-content">
        <ul class="navigation">

            <li class="navigation-header">
                <span>MAIN NAVIGATION</span>
                <i class="icon-menu"></i>
            </li> 

            <li>
                <a href="<?=base_url('dashboard')?>"><i class="fa fa-home"></i> <span>Dashboard</span></a>
            </li>

        <?php if ($user['usertype'] == 'Administrator'): ?>    

            <li>
                <a href="#"><i class="fa fa-flask"></i> <span> Item Inventory </span></a>
                <ul>
                    <li><a href="<?=base_url('items/inventory')?>">Total Item Inventory</a></li>
                    <li><a href="<?=base_url('items')?>">Item List</a></li>
                    <li><a href="<?=base_url('categories')?>">Item Categories</a></li>
                    <li><a href="<?=base_url('units')?>">Item Units</a></li>
                    <li><a href="<?=base_url('items/restock_inventory')?>">Restock Inventory</a></li>
                </ul>
            </li>
            <li>
                <a href="index.html"><i class="fa fa-list-alt"></i> <span>Sales</span></a>
                <ul>
                    <li><a href="<?=base_url('sales/create')?>">Sales Register</a></li>
                    <li><a href="<?=base_url('sales')?>">Sales Report</a></li>
                </ul>
            </li>   
            <li>
                <a href="<?=base_url('imports')?>"><i class="fa fa-cart-arrow-down"></i> <span>Imports</span></a>
            </li>
                
            <li class="navigation-header">
                <span>ADMIN OPTION</span>
                <i class="icon-menu"></i>
            </li> 
        
            <li>
                <a href="<?=base_url('users')?>"><i class="fa fa-users"></i> <span>Users</span></a>
            </li>
        <?php else: ?>
            <li>
                <a href="<?=base_url('sales/create')?>"><i class="fa fa-shopping-cart"></i> <span>Sales Register</span></a>
            </li>
            <li>
                <a href="<?=base_url('sales')?>"><i class="fa fa-area-chart"></i> <span>Sales</span></a>                
            </li>
        <?php endif ?>

        </ul>
    </div>
</div>

            <!-- inject:/SIDEBAR -->