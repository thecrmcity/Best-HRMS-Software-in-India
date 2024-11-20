<!-- Main Sidebar Container -->

  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->

    <?php
    global $comid;
    global $grid;
    
    $cid = $comid;

    $select = new Selectall();

    $comino = $select->getCompany($cid);

    

    if($comino != "")

    {

      $fevi = $comino['in_fevicon'];

      $fevis = BSURL."uploads/".$fevi;

    }

    else

    {

      $fevis = BSURL."assets/dist/img/AdminLTELogo.png";

    }

    ?>

    <a href="<?php echo VIEW;?>dashboard" class="brand-link">

      <img src="<?php echo $fevis;?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

      <span class="brand-text font-weight-light">inoday EMS</span>

    </a>



    <!-- Sidebar -->

    <div class="sidebar">

      <!-- Sidebar user panel (optional) -->

      <div class="user-panel mt-3 pb-3 d-flex">

        <div class="image">

          <?php

          if(isset($pemail))

          {

            $table = "in_employee";

            $cond = " `in_empid`='$empid' ";

            $sel = new Selectall();

            $sledata = $sel->getcondData($table,$cond);
            $photos = $sledata['in_photo'];
            if($photos != "")

            {

              ?>

          <img src="<?php echo BSURL;?>uploads/employee/<?php echo $sledata['in_photo'];?>" class="img-circle elevation-2" alt="User Image">

          <?php

            }

            else

            {

              ?>

            <img src="<?php echo BSURL;?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

            <?php

            }

          }

          ?>

          

        </div>

        <div class="info">

          <a href="<?php echo VIEW;?>profile" class="d-block"><?php echo $fullname;?></a>
          

        </div>



        <?php

        if(!isset($adminemail))

        {

          $table = "in_employee";

          $cond = " `in_empid`='$empid' ";

          $select = new Selectall();

          $res = $select->getcondData($table,$cond);

          $res = $select->getcondData($table,$cond);
          if($res != "")
          {
            $joindate = $res['in_dateofjoining'];

            $probation = $res['in_probation'];
          }

          

          $date1= date_create($joindate);

          $date2= date_create($cdate);

          $diff=date_diff($date1,$date2);

          $diffday = $diff->format("%a%");

          $siteday = $probation-$diffday;

              if($siteday > 0)

              {

                ?>

                

              <div class="right">

              <span class="text-warning" title="Probation Period"><i class="fas fa-bookmark"></i></span>

            </div>

                <?php

              }

              else

              {

                ?>

                

              <div class="right">

              <span class="text-success" title="Permanant Employee"><i class="fas fa-bookmark"></i></span>

            </div>

                <?php

              }

        }

        

        ?>

        

        <?php

              

              ?>

        

      </div>

      <div class="user-panel">

        <?php

        $table = "in_master_card";

        $cond = " `in_sno`='$comid' AND `in_relation`='company' ";

        $sel = new Selectall();

        $scom = $sel->getcondData($table,$cond);

        if($scom != "")

        {

          ?>

          <span class="cominfo"> <?php echo $scom['in_prefix'];?></span>

          <?php

        }

        else

        {

          ?>

          <span class="cominfo"> Super Admin</span>

          <?php

        }



        ?>

        

      </div>

      

     

      <!-- Sidebar Menu -->

      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          

           <li class="nav-item">

            <a href="<?php echo BSURL;?>views/dashboard/" class="sidemen nav-link <?php echo ($pagename == 'dashboard') ? 'active' : ''?>">

              <i class="nav-icon fas fa-tachometer-alt"></i>

              <p>

                Dashboard

                

              </p>

            </a>

          </li>

          <?php

            



            $table = "in_modular";

            $cond = " `in_relate`='parent' AND `in_status`='1' ORDER BY `in_orderid`";

            $select = new Selectall();

            $pmenu = $select->getallCond($table,$cond);



            

            foreach($pmenu as $pmn)

            {

              $post = str_replace(" ", "-",$pmn['in_modular']);

              if(!isset($_SESSION['adminemail']))

              {

                

                $sspot = strtolower($post);

                $table = "in_controller";

                $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='$sspot' AND `in_action`='1' ";

                $select = new Selectall();

                $seljar = $select->getcondData($table,$cond);

                

            

                if($seljar != "")

              {

                

              ?>

              <li class="nav-item <?php echo ($pagename == strtolower($post)) ? 'menu-is-opening menu-open' : ''?>">

                <a href="" class="sidemen nav-link <?php echo ($pagename == strtolower($post)) ? 'active' : ''?>">

                  <i class="nav-icon <?php echo $pmn['in_modicon'];?>"></i>

                  <p class="ml-2">

                    <?php echo $post;?>

                    <i class="fas fa-angle-left right"></i>

                  </p>

                </a>

                <ul class="nav nav-treeview">

                  <?php

                    $mid = $pmn['in_sno'];

                    $table = "in_modular";

                    $cond = " `in_relate`='child' AND `in_mainid`='$mid' AND `in_status`='1' ORDER BY `in_orderid`";

                    $select = new Selectall();

                    $smenu = $select->getallCond($table,$cond);

                    foreach($smenu as $smn)

                    {



                      $spost = str_replace(" ", "-",$smn['in_modular']);

                      $psko = strtolower($spost);

                      $table = "in_controller";

                      $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='$psko' AND `in_action`='1' ";

                      $select = new Selectall();

                      $subjar = $select->getcondData($table,$cond);

                      if($subjar != "")

                      {



                    ?>

                    <li class="nav-item">

                      <a href="<?php echo BSURL;?>views/<?php echo strtolower($post);?>/<?php echo strtolower($spost)?>.php" class="nav-link <?php echo ($siteaim == strtolower($spost)) ? 'active' : ''?>">

                        <i class="far fa-circle nav-icon"></i>

                        <p><?php echo $smn['in_modular'];?></p>

                      </a>

                    </li>

                    <?php

                    }

                  }

                  ?>

                </ul>

              </li>

              <?php

              }

              }

              else

              {

                ?>

                <li class="nav-item <?php echo ($pagename == strtolower($post)) ? 'menu-is-opening menu-open' : ''?>">

                <a href="" class="sidemen nav-link <?php echo ($pagename == strtolower($post)) ? 'active' : ''?>">

                  <i class="nav-icon <?php echo $pmn['in_modicon'];?>"></i>

                  <p class="ml-2">

                    <?php echo $post;?>

                    <i class="fas fa-angle-left right"></i>

                  </p>

                </a>

                <ul class="nav nav-treeview">

                  <?php

                    $mid = $pmn['in_sno'];

                    $table = "in_modular";

                    $cond = " `in_relate`='child' AND `in_mainid`='$mid' AND `in_status`='1' ORDER BY `in_orderid`";

                    $select = new Selectall();

                    $smenu = $select->getallCond($table,$cond);

                    foreach($smenu as $smn)

                    {



                      $spost = str_replace(" ", "-",$smn['in_modular']);



                    ?>

                    <li class="nav-item">

                      <a href="<?php echo BSURL;?>views/<?php echo strtolower($post);?>/<?php echo strtolower($spost)?>.php" class="nav-link <?php echo ($siteaim == strtolower($spost)) ? 'active' : ''?>">

                        <i class="far fa-circle nav-icon"></i>

                        <p><?php echo $smn['in_modular'];?></p>

                      </a>

                    </li>

                    <?php

                    }

                  ?>

                </ul>

              </li>

                <?php

              }



              



              

            }

          ?>

          

            

              

              </ul>

      </nav>

      <!-- /.sidebar-menu -->

    </div>

    <!-- /.sidebar -->

  </aside>