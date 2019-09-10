<div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                       
                        <!-- Image Logo here -->
                        <a href="Main" class="logo">
                            <i class="icon-c-logo"> <img src="assets/images/logo_sm.png" height="42"/> </i> <!-- Image Logo pada saat minimize menu -->
                            <span><img src="assets/images/logoam.png" height="20"/></span> <!-- Image Logo pada saat maximize menu -->
                        </a>

                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left waves-effect waves-light">
                                    <i class="md md-menu"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <form role="search" class="navbar-left app-search pull-left hidden-xs">
                                 <input type="text" placeholder="Search..." class="form-control">
                                 <a href=""><i class="fa fa-search"></i></a>
                            </form>


                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown top-menu-item-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        <i class="icon-bell"></i>
                                    </a>
                            
                                      <ul class="dropdown-menu dropdown-menu-lg" style="height: 120px;">
                                          <li class="notifi-title">Sisa Saldo</li>
                                          <li class="list-group slimscroll-noti notification-list">
                                             <!-- list item-->
                                             <a href="javascript:void(0);" class="list-group-item">
                                                <div class="media">
                                                   <div class="pull-left p-r-10">
                                                      BANK
                                                   </div>
                                                   <div class="media-body" style="text-align: right;">
                                                      <h5 class="media-heading"><div id="divsaldobank"><?php echo $saldobank; ?></div></h5>
                                                   </div>
                                                </div>
                                                <div class="media">
                                                   <div class="pull-left p-r-10">
                                                      CASH ON HAND
                                                   </div>
                                                   <div class="media-body" style="text-align: right;">
                                                     <h5 class="media-heading"><div id="divsaldocoh"><?php echo $saldoCOH; ?></div></h5>
                                                   </div>
                                                </div>
                                             </a>  
                                          </li>                                        
                                      </ul>

                                </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>
                                <li class="dropdown top-menu-item-xs">
                                    <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="ti-user m-r-10 text-custom"></i> Profile</a></li>
                                        <li><a href="javascript:void(0)"><i class="ti-settings m-r-10 text-custom"></i> Settings</a></li>
                                        <li><a href="Change_Password"><i class="ti-lock m-r-10 text-custom"></i> Change Password </a></li>
                                        <li class="divider"></li>
                                        <li><a href="login/logout"><i class="ti-power-off m-r-10 text-danger"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
 </div>