<div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>

                            <li class="text-muted menu-title">MENU</li>      

                            
                                <?php 
                                      $scrgenerator = "";
                                      $headertemp = "";
                                      $headerclose = false;
                                      foreach ($menu as $variant) { 
                                      $header = $variant['formheader'];
                                      $formname = $variant['formname']; 
                                      $formtitle = $variant['formtitle'];
                                      $glyph = $variant['glyph'];

                                          if($header<>$headertemp){
                                             if($headertemp <> ""){
                                                 $scrgenerator .= '</ul>
                                                                   </li>';                                                 
                                             }     
                                 
                                             $scrgenerator .=  '
                                               <li class="has_sub">
                                               <a href="javascript:void(0);" class="waves-effect"><i class="'.$glyph.'"></i> <span> '.$header.' </span> 
                                               <span class="menu-arrow"></span></a>
                                               <ul class="list-unstyled">';

                                          }

                                       $headertemp = $header;
                                       $scrgenerator .= '<li><a href="'.$formname.'">'.$formtitle.'</a></li>'; 
                                       }

                                       echo $scrgenerator;
                                ?>        
                                      
                            



                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>