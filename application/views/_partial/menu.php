<div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>

                            <li class="text-muted menu-title">MENU</li>

                            <?php echo json_encode($menu) ?>


                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-home"></i> <span> TRANSAKSI </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <?php foreach ($menu as $variant) { ?>
                                    <li><a href="<?php echo $variant->formname; ?>"><?php echo $variant->formname; ?></a></li>                             
                                  <?php } ?>    
                                </ul>
                            </li>


                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>