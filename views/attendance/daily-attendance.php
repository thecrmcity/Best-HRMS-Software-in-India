<?php

$pagename = basename(__DIR__);

$fullPage = ucwords($pagename);

$siteaim = basename($_SERVER['SCRIPT_FILENAME'],'.php');

$sitename = str_replace('-', ' ', $siteaim);

$bsurl = dirname(dirname(__DIR__));

include_once $bsurl.'/inc/header.php';

include_once $bsurl.'/inc/sidebar.php';

?>



  



  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper mainbody">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

          <div class="form-inline">
            <h4 class="m-0"><?php echo ucwords($sitename);?></h4>
            <?php
            if(isset($_GET['s']) || isset($_GET['e']))
            {
              ?>
              <a href="<?php echo VIEW.$pagename."/".$siteaim?>.php" class="btn-sm btn-primary ml-3"><i></i> Exit Search</a>
              <?php
            }
            ?>
            </div>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><span onclick="history.back()" class="badge badge-danger" style="cursor: pointer;"><i class="fas fa-arrow-left"></i> Back</span></li><li class="breadcrumb-item"><a href="<?php echo BSURL;?>views/dashboard/"><i class="fas fa-home"></i> Home</a></li>

              <li class="breadcrumb-item active"><?php echo ucwords($sitename);?></li>

            </ol>

          </div><!-- /.col -->

        </div><!-- /.row -->

      </div><!-- /.container-fluid -->

    </div>

    <!-- /.content-header -->



    <!-- Main content -->

    <section class="content">

      <div class="container-fluid">

        <!-- Small boxes (Stat box) -->

        <div class="card rounded-0">

          <div class="card-header">

            <div class="card-title">
              <?php
              if(isset($_GET['s']) || isset($_GET['sd']))
              {
                $s = $_GET['s'];
                $cdate = $_GET['sd'];
                ?>
                <i class="fas fa-users"></i> <b><?php echo date('d-m-Y', strtotime($cdate));?></b> Attendance Report
                <?php
              }
              else
              {
                ?>
                <i class="fas fa-users"></i> Today Attendance Report
                <?php
              }
              ?>
             

            </div>

            <div class="card-tools">

              <form class="form-inline" method="GET" >
                <input type="date" name="sd" class="form-control rounded-0 form-control-sm" required>
                <select class="form-control form-control-sm rounded-0" name="s" required>
                  <option value="">--Select--</option>
                  
                  <option value="late">Late Employee</option>
                  <option value="early">Early Employee</option>
                  <option value="on">On Duty</option>
                  <option value="off">Off Duty</option>
                </select>

                <button type="submit" class="input-group-text rounded-0 "><i class="fas fa-search"></i></button>
              </form>

            </div>

          </div>

          <div class="card-body">

          <div class="row">
                <div class="col-lg-4 col-md-4">
                  <?php
                  if(isset($_GET['s']) || isset($_GET['sd']))
                  {
                      $s = $_GET['s'];
                      $cdate = $_GET['sd'];
                      ?>
                      <form class="form-inline" method="GET" >
                        <div class="input-group">
                        <input type="hidden" name="sd" value="<?php echo $cdate?>">
                          <input type="hidden" name="s" value="<?php echo $s?>">
                          

                        <input type="text" name="e" class="form-control rounded-0 form-control-sm" placeholder="Employee Name/ID">
                          <div class="input-group-append">
                          <button type="submit" class="input-group-text rounded-0 "><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                      <?php
                  }
                  else
                  {
                    ?>
                    <form class="form-inline" method="GET" >
                      <div class="input-group">
                      <input type="text" name="e" class="form-control rounded-0 form-control-sm" placeholder="Employee Name/ID">
                        <div class="input-group-append">
                        <button type="submit" class="input-group-text rounded-0 "><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                    <?php
                  }
                  ?>
                  
                </div>
                <div class="col-lg-8 col-md-8">
                  <?php
                  $table = "in_emp_attend";
                  $cond = " `in_comid`='$comid' AND `in_logdate`='$cdate' AND `in_timestatus`='early'";
                  $select = new Selectall();
                  $selon = $select->getallCond($table,$cond);
                  if($selon != "")
                  {
                    $ontime = count($selon);
                  }
                  else
                  {
                    $ontime = "0";
                  }
                  $table = "in_emp_attend";
                  $cond = " `in_comid`='$comid' AND `in_logdate`='$cdate' AND `in_timestatus`='grace'";
                  $select = new Selectall();
                  $selon = $select->getallCond($table,$cond);
                  if($selon != "")
                  {
                    $gracetime = count($selon);
                  }
                  else
                  {
                    $gracetime = "0";
                  }
                  $table = "in_emp_attend";
                  $cond = " `in_comid`='$comid' AND `in_logdate`='$cdate' AND `in_timestatus`='late'";
                  $select = new Selectall();
                  $selon = $select->getallCond($table,$cond);
                  if($selon != "")
                  {
                    $latime = count($selon);
                  }
                  else
                  {
                    $latime = "0";
                  }

                  $table = "in_empbreak";
                  $cond = " `in_comid`='$comid' AND `in_logdate`='$cdate' AND `in_logname`='Lunch' ";
                  $select = new Selectall();
                  $sellun = $select->getallCond($table,$cond);
                  if(!empty($sellun))
                  {
                    $selunch = count($sellun);
                  }
                  else
                  {
                    $selunch = "0";
                  }

                  $table = "in_empbreak";
                  $cond = " `in_comid`='$comid' AND `in_logdate`='$cdate' AND `in_logname`='Tea' ";
                  $select = new Selectall();
                  $selte = $select->getallCond($table,$cond);
                  if(!empty($selte))
                  {
                    $seltea = count($selte);
                  }
                  else
                  {
                    $seltea = "0";
                  }

                  ?>
                  <div class="clearfix">
                    <div class="float-right">
                      <span class="successlight badge badge-pill">On Time (<?php echo $ontime;?>)</span>
                      <span class="purplelight badge badge-pill">Grace Time (<?php echo $gracetime;?>)</span>
                      <span class="dangerlight badge badge-pill">Late Login (<?php echo $latime;?>)</span>
                      <span class="bg-indigo badge badge-pill">Lunch Break (<?php echo $selunch;?>)</span>
                      <span class="bg-pink badge badge-pill">Tea Break (<?php echo $seltea;?>)</span>

                    </div>
                  </div>
                  
                   
                </div>

              </div>

            <div class="table-responsive mt-3 emptable">

              <table class="table table-bordered">

                <thead class="bg-secondary sticky-top">

                  <th>Sr. No.</th>
                  <th>Login Type</th>
                  <th>Attendance Date</th>

                  <th>Login Status</th>
                  <th>Time Status</th>

                  <th>Employee ID</th>

                  <th width="20">Employee Name</th>

                  <th>Login</th>

                  <th>Logout</th>

                  <th>Working Hours</th>
                  <th>Rest Hours</th>

                  

                  <th>IP Address</th>
                  <th><i class="fas fa-map"></i></th>
                  <th><i class="fas fa-chart-pie"></i></th>

                </thead>

                <tbody>

                  <?php
                  
                  if(isset($_GET['s']) || isset($_GET['sd']))
                  {
                      $s = $_GET['s'];
                      $cdate = @$_GET['sd'];
                      
                      switch($s)
                      {
                        case "off":
                          if(isset($_GET['e']))
                          {
                            $xl = 1;
                            $e = $_GET['e'];
                            $table = "in_employee";
                            $cond = " `in_compid`='$comid' AND (`in_empid` LIKE '%$e%' OR `in_fname` LIKE '%$e%' OR `in_lname` LIKE '%$e%') AND `in_delete`='1' ";
                            $select = new Selectall();
                            $selact = $select->getallCond($table,$cond);
                          }
                          else
                          {
                            $xl = 1;
                            $table = "in_employee";
                            $cond = " `in_compid`='$comid' AND `in_delete`='1' ORDER BY in_empid ASC";
                            $select = new Selectall();
                            $selact = $select->getallCond($table,$cond);
                          }
                          
                          if(!empty($selact))
                          {
                            foreach($selact as $eci)
                            {
                              $emi = $eci['in_empid'];
                              $pr = $eci['in_emprefix'];
                              $table = "in_master_card";
                              $cond = " `in_sno`='$pr' ";
                              $prs = $select->getcondData($table,$cond);
                              
        
                              $table = "in_emp_attend";
                              $cond = " `in_comid`='$comid' AND `in_empid`='$emi' AND `in_logdate`='$cdate' ";
                              $select = new Selectall();
                              $sel = $select->getcondData($table,$cond);
                              if($sel != "")
                              {
                                
                              }
                              else
                              {
                                ?>
                                <tr class="">
          
                                <td><?php echo $xl;?></td>
                                <td></td>
                                <td><?php echo date('d-m-Y', strtotime($cdate));?></td>
                                <td>OFF</td>
                                <td>00:00:00</td>
                                <td><?php echo $prs['in_prefix'].$eci['in_empid'];?></td>
        
                                <td><?php echo $eci['in_fname']." ".$eci['in_lname'];?></td>
        
                                <td>00:00:00</td>
        
                                <td>00:00:00</td>
        
                                <td>00:00:00</td>
                                <td>00:00:00</td>
        
                                
        
                                <td>0.0.0.0</td>
        
                                <td></td>
        
                                </tr>
                                <?php
                                $xl++;
                              }
        
                              
                            }
                            
                          }
                          else
                          {
                            ?>
                            <tr>
                              <td>No Data</td>
                            </tr>
                            <?php
                          } 
                        break;
                        case "late":
                          if(isset($_GET['e']))
                          {
                            $xl = 1;
                            $e = $_GET['e'];
                            $table = "in_employee";
                            $cond = " `in_compid`='$comid' AND (`in_empid` LIKE '%$e%' OR `in_fname` LIKE '%$e%' OR `in_lname` LIKE '%$e%') AND `in_delete`='1' ";
                            $select = new Selectall();
                            $selact = $select->getallCond($table,$cond);
                          }
                          else
                          {
                            $xl = 1;
                            $table = "in_employee";
                            $cond = " `in_compid`='$comid' AND `in_delete`='1' ORDER BY in_empid ASC";
                            $select = new Selectall();
                            $selact = $select->getallCond($table,$cond);
                          }
                          if(!empty($selact))
                          {
                            foreach($selact as $eci)
                            {
                              $emi = $eci['in_empid'];
                              $pr = $eci['in_emprefix'];

                              $tblmonth = date('F', strtotime(date($cdate)));
                              $td = date('j', strtotime($cdate));

                              $table = "in_monthly_attend";
                              $cond = " `in_comid`='$comid' AND `in_empid`='$emi' AND `in_year`='$ydate' AND `in_month`='$tblmonth' ";
                              $select = new Selectall();
                              $logan = $select->getcondData($table,$cond);
                              if($logan != "")
                              {
                                $monty = "in_".$td."_out";
                                $monhour = "in_".$td."_hours";
                                $outset = date('H:i:s', strtotime($logan[$monty]));
                                $outhour = $logan[$monhour];
                              }
                              else
                              {
                                $outset = "00:00:00";
                                $outhour = "00:00:00";
                              }
                              
                              $table = "in_master_card";
                              $cond = " `in_sno`='$pr' ";
                              $prs = $select->getcondData($table,$cond);

                              $table = "in_empbreak";
                              $cond = " `in_comid`='$comid' AND `in_empid`= '$emi' AND `in_logdate`='$cdate' ";
                              $select = new Selectall();
                              $selbrek = $select->getallCond($table,$cond);
                              $time = strtotime('00:00:00');
                              $total_time = 0;
                              if(!empty($selbrek))
                              {
                                foreach($selbrek as $brk)
                                {
                                  $ttlbreak = strtotime($brk['in_totalbreak']);
                                  $sec_time = $ttlbreak - $time;
                                  $total_time = $total_time + $sec_time;
                                }
                                $hours = intval($total_time / 3600);
                                $total_time = $total_time - ($hours * 3600);
                                $min = intval($total_time / 60);
                                $sec = $total_time - ($min * 60);
                                $pbreaks = ("$hours:$min:$sec");
                              }
                              else
                              {
                                $pbreaks = "00:00:00";
                              } 
                              
        
                              $table = "in_emp_attend";
                              $cond = " `in_comid`='$comid' AND `in_empid`='$emi' AND `in_logdate`='$cdate' AND `in_timestatus`='late'";
                              $select = new Selectall();
                              $sel = $select->getcondData($table,$cond);
                              if($sel != "")
                              {
                                $inlat = $sel['in_latitude'];
                                $inlog = $sel['in_longitude'];
                                $inareas = $inlat.",".$inlog;
                                $time = $sel['in_timestatus'];
          
                                switch($time)
                                {
                                  case "late":
                                  $color = "dangerlight";
                                  break;
                                  case "early":
                                  $color = "successlight";
                                  break;
                                  case "grace":
                                  $color = "purplelight";
                                  break;
                                }
                                ?>
                                <tr class="<?php echo $color;?>">
          
                                  <td><?php echo $xl;?></td>
                                  <td>System Login</td>
                                  <td><?php echo date('d-m-Y', strtotime($sel['in_logdate']));?></td>
                                  <td><?php switch($color){ case"dangerlight": echo "Late Login";break; case"successlight": echo "On Time";break; case"purplelight": echo "Grace Time";break; }; ?></td>
                                  <td><?php echo $sel['in_dayleave'];?></td>
                                  <td><?php echo $prs['in_prefix'].$sel['in_empid'];?></td>
        
                                  <td><?php echo $sel['in_fname']." ".$sel['in_lname'];?></td>
        
                                  <td><?php echo $sel['in_login'];?></td>
        
                                  <td><?php echo $outset;?></td>
  
                                  <td><?php echo $outhour;?></td>
                                  <td><?php echo $pbreaks;?></td>
        
                                  
        
                                  <td><?php echo $sel['in_ipaddress'];?></td>
                                  <td><?php
                              if($inlat != "")
                              {
                                ?>
                                <a href="https://www.google.com/maps/place/<?php echo $inareas;?>" class="text-dark" target="_blank"><i class="fas fa-map-marker-alt"></i></a>        
                                <?php
                              }
                            ?></td>
                                  <td><a href="<?php echo VIEW.$pagename?>/static-report.php?id=<?php echo $sel['in_empid'];?>" class="text-dark"><i class="fas fa-chart-pie"></i></a></td>
        
                                  </tr>
                                <?php
                                $xl++;
                              }
                              
        
                              
                            }
                            
                          }
                          else
                          {
                            ?>
                            <tr>
                              <td>No Data</td>
                            </tr>
                            <?php
                          }
                        break;
                        case "early":
                          if(isset($_GET['e']))
                          {
                            $xl = 1;
                            $e = $_GET['e'];
                            $table = "in_employee";
                            $cond = " `in_compid`='$comid' AND (`in_empid` LIKE '%$e%' OR `in_fname` LIKE '%$e%' OR `in_lname` LIKE '%$e%') AND `in_delete`='1' ";
                            $select = new Selectall();
                            $selact = $select->getallCond($table,$cond);
                          }
                          else
                          {
                            $xl = 1;
                            $table = "in_employee";
                            $cond = " `in_compid`='$comid' AND `in_delete`='1' ORDER BY in_empid ASC";
                            $select = new Selectall();
                            $selact = $select->getallCond($table,$cond);
                          }
                          if(!empty($selact))
                          {
                            foreach($selact as $eci)
                            {
                              $emi = $eci['in_empid'];
                              $pr = $eci['in_emprefix'];

                              $tblmonth = date('F', strtotime(date($cdate)));
                              $td = date('j', strtotime($cdate));

                              $table = "in_monthly_attend";
                              $cond = " `in_comid`='$comid' AND `in_empid`='$emi' AND `in_year`='$ydate' AND `in_month`='$tblmonth' ";
                              $select = new Selectall();
                              $logan = $select->getcondData($table,$cond);
                              if($logan != "")
                              {
                                $monty = "in_".$td."_out";
                                $monhour = "in_".$td."_hours";
                                $outset = date('H:i:s', strtotime($logan[$monty]));
                                $outhour = $logan[$monhour];
                              }
                              else
                              {
                                $outset = "00:00:00";
                                $outhour = "00:00:00";
                              }

                              $table = "in_master_card";
                              $cond = " `in_sno`='$pr' ";
                              $prs = $select->getcondData($table,$cond);

                              $table = "in_empbreak";
                              $cond = " `in_comid`='$comid' AND `in_empid`= '$emi' AND `in_logdate`='$cdate' ";
                              $select = new Selectall();
                              $selbrek = $select->getallCond($table,$cond);
                              $time = strtotime('00:00:00');
                              $total_time = 0;
                              if(!empty($selbrek))
                              {
                                foreach($selbrek as $brk)
                                {
                                  $ttlbreak = strtotime($brk['in_totalbreak']);
                                  $sec_time = $ttlbreak - $time;
                                  $total_time = $total_time + $sec_time;
                                }
                                $hours = intval($total_time / 3600);
                                $total_time = $total_time - ($hours * 3600);
                                $min = intval($total_time / 60);
                                $sec = $total_time - ($min * 60);
                                $pbreaks = ("$hours:$min:$sec");
                              }
                              else
                              {
                                $pbreaks = "00:00:00";
                              }
                              
        
                              $table = "in_emp_attend";
                              $cond = " `in_comid`='$comid' AND `in_empid`='$emi' AND `in_logdate`='$cdate' AND `in_timestatus`='early' ";
                              $select = new Selectall();
                              $sel = $select->getcondData($table,$cond);
                              if($sel != "")
                              {
                                $inlat = $sel['in_latitude'];
                                $inlog = $sel['in_longitude'];
                                $inareas = $inlat.",".$inlog;
                                $time = $sel['in_timestatus'];
          
                                switch($time)
                                {
                                  case "late":
                                  $color = "dangerlight";
                                  break;
                                  case "early":
                                  $color = "successlight";
                                  break;
                                  case "grace":
                                  $color = "purplelight";
                                  break;
                                }
                                ?>
                                <tr class="<?php echo $color;?>">
          
                                  <td><?php echo $xl;?></td>
                                  <td>System Login</td>
                                  <td><?php echo date('d-m-Y', strtotime($sel['in_logdate']));?></td>
        
                                  <td><?php switch($color){ case"dangerlight": echo "Late Login";break; case"successlight": echo "On Time";break; case"purplelight": echo "Grace Time";break; }; ?></td>
                                  <td><?php echo $sel['in_dayleave'];?></td>
        
                                  <td><?php echo $prs['in_prefix'].$sel['in_empid'];?></td>
        
                                  <td><?php echo $sel['in_fname']." ".$sel['in_lname'];?></td>
        
                                  <td><?php echo $sel['in_login'];?></td>
        
                                  <td><?php echo $outset;?></td>
  
                                  <td><?php echo $outhour;?></td>
                                  <td><?php echo $pbreaks; ?></td>
        
                                  
        
                                  <td><?php echo $sel['in_ipaddress'];?></td>
                                  <td><?php
                              if($inlat != "")
                              {
                                ?>
                                <a href="https://www.google.com/maps/place/<?php echo $inareas;?>" class="text-dark" target="_blank"><i class="fas fa-map-marker-alt"></i></a>        
                                <?php
                              }
                            ?></td>
                                  <td><a href="<?php echo VIEW.$pagename?>/static-report.php?id=<?php echo $sel['in_empid'];?>" class="text-dark"><i class="fas fa-chart-pie"></i></a></td>
        
                                  </tr>
                                <?php
                                $xl++;
                              }
                              
        
                              
                            }
                            
                          }
                          else
                          {
                            ?>
                            <tr>
                              <td>No Data</td>
                            </tr>
                            <?php
                          }
                        break;
                        case "on":
                          if(isset($_GET['e']))
                          {
                            $xl = 1;
                            $e = $_GET['e'];
                            $table = "in_employee";
                            $cond = " `in_compid`='$comid' AND (`in_empid` LIKE '%$e%' OR `in_fname` LIKE '%$e%' OR `in_lname` LIKE '%$e%') AND `in_delete`='1' ";
                            $select = new Selectall();
                            $selact = $select->getallCond($table,$cond);
                          }
                          else
                          {
                            $xl = 1;
                            $table = "in_employee";
                            $cond = " `in_compid`='$comid' AND `in_delete`='1' ORDER BY in_empid ASC";
                            $select = new Selectall();
                            $selact = $select->getallCond($table,$cond);
                          }
                          if(!empty($selact))
                          {
                            foreach($selact as $eci)
                            {
                              $emi = $eci['in_empid'];
                              $pr = $eci['in_emprefix'];

                              $tblmonth = date('F', strtotime(date($cdate)));
                              $td = date('j', strtotime($cdate));

                              $table = "in_monthly_attend";
                              $cond = " `in_comid`='$comid' AND `in_empid`='$emi' AND `in_year`='$ydate' AND `in_month`='$tblmonth' ";
                              $select = new Selectall();
                              $logan = $select->getcondData($table,$cond);
                              if($logan != "")
                              {
                                $monty = "in_".$td."_out";
                                $monhour = "in_".$td."_hours";
                                $outset = date('H:i:s', strtotime($logan[$monty]));
                                $outhour = $logan[$monhour];
                              }
                              else
                              {
                                $outset = "00:00:00";
                                $outhour = "00:00:00";
                              }

                              $table = "in_master_card";
                              $cond = " `in_sno`='$pr' ";
                              $prs = $select->getcondData($table,$cond);

                              $table = "in_empbreak";
                              $cond = " `in_comid`='$comid' AND `in_empid`= '$emi' AND `in_logdate`='$cdate' ";
                              $select = new Selectall();
                              $selbrek = $select->getallCond($table,$cond);
                              $time = strtotime('00:00:00');
                              $total_time = 0;
                              if(!empty($selbrek))
                              {
                                foreach($selbrek as $brk)
                                {
                                  $ttlbreak = strtotime($brk['in_totalbreak']);
                                  $sec_time = $ttlbreak - $time;
                                  $total_time = $total_time + $sec_time;
                                }
                                $hours = intval($total_time / 3600);
                                $total_time = $total_time - ($hours * 3600);
                                $min = intval($total_time / 60);
                                $sec = $total_time - ($min * 60);
                                $pbreaks = ("$hours:$min:$sec");
                              }
                              else
                              {
                                $pbreaks = "00:00:00";
                              }
                              
        
                              $table = "in_emp_attend";
                              $cond = " `in_comid`='$comid' AND `in_empid`='$emi' AND `in_logdate`='$cdate' ";
                              $select = new Selectall();
                              $sel = $select->getcondData($table,$cond);
                              if($sel != "")
                              {
                                $inlat = $sel['in_latitude'];
                                $inlog = $sel['in_longitude'];
                                $inareas = $inlat.",".$inlog;
                                $time = $sel['in_timestatus'];
          
                                switch($time)
                                {
                                  case "late":
                                  $color = "dangerlight";
                                  break;
                                  case "early":
                                  $color = "successlight";
                                  break;
                                  case "grace":
                                  $color = "purplelight";
                                  break;
                                }
                                ?>
                                <tr class="<?php echo $color;?>">
          
                                  <td><?php echo $xl;?></td>
                                  <td>System Login</td>
                                  <td><?php echo date('d-m-Y', strtotime($sel['in_logdate']));?></td>
        
                                  <td><?php switch($color){ case"dangerlight": echo "Late Login";break; case"successlight": echo "On Time";break; case"purplelight": echo "Grace Time";break; }; ?></td>
                                  <td><?php echo $sel['in_dayleave'];?></td>
                                  <td><?php echo $prs['in_prefix'].$sel['in_empid'];?></td>
        
                                  <td><?php echo $sel['in_fname']." ".$sel['in_lname'];?></td>
        
                                  <td><?php echo $sel['in_login'];?></td>
        
                                  <td><?php echo $outset;?></td>
  
                                  <td><?php echo $outhour;?></td>
                                  <td><?php echo $pbreaks;?></td>
        
                                  
        
                                  <td><?php echo $sel['in_ipaddress'];?></td>
                                  <td><?php
                              if($inlat != "")
                              {
                                ?>
                                <a href="https://www.google.com/maps/place/<?php echo $inareas;?>" class="text-dark" target="_blank"><i class="fas fa-map-marker-alt"></i></a>        
                                <?php
                              }
                            ?></td>
                                  <td><a href="<?php echo VIEW.$pagename?>/static-report.php?id=<?php echo $sel['in_empid'];?>" class="text-dark"><i class="fas fa-chart-pie"></i></a></td>
        
                                  </tr>
                                <?php
                                $xl++;
                              }
                              
        
                              
                            }
                            
                          }
                          else
                          {
                            ?>
                            <tr>
                              <td colspan="12">No Data</td>
                            </tr>
                            <?php
                          } 
                        break;
                      }
                  }
                  
                  else
                  {
                    if(isset($_GET['e']))
                    {
                      $xl = 1;
                      $e = $_GET['e'];
                      $table = "in_employee";
                      $cond = " `in_compid`='$comid' AND (`in_empid` LIKE '%$e%' OR `in_fname` LIKE '%$e%' OR `in_lname` LIKE '%$e%') AND `in_delete`='1' ";
                      $select = new Selectall();
                      $selact = $select->getallCond($table,$cond);
                      

                    }
                    else
                    {
                      $xl = 1;
                      $table = "in_employee";
                      $cond = " `in_compid`='$comid' AND `in_delete`='1' ORDER BY in_empid ASC";
                      $select = new Selectall();
                      $selact = $select->getallCond($table,$cond);
                    }
                    
                    if(!empty($selact))
                    {
                      foreach($selact as $eci)
                      {
                        $emi = $eci['in_empid'];
                        $pr = $eci['in_emprefix'];

                        $tblmonth = date('F', strtotime(date($cdate)));
                        $td = date('j', strtotime($cdate));
                        
                        $table = "in_monthly_attend";
                        $cond = " `in_comid`='$comid' AND `in_empid`='$emi' AND `in_year`='$ydate' AND `in_month`='$tblmonth' ";
                        $select = new Selectall();
                        $logan = $select->getcondData($table,$cond);
                        if($logan != "")
                        {
                          $monty = "in_".$td."_out";
                          $monhour = "in_".$td."_hours";
                          $outset = date('H:i:s', strtotime($logan[$monty]));
                          $outhour = $logan[$monhour];
                        }
                        else
                        {
                          $outset = "00:00:00";
                          $outhour = "00:00:00";
                        }

                        $table = "in_master_card";
                        $cond = " `in_sno`='$pr' ";
                        $prs = $select->getcondData($table,$cond);

                        $table = "in_empbreak";
                        $cond = " `in_comid`='$comid' AND `in_empid`= '$emi' AND `in_logdate`='$cdate' ";
                        $select = new Selectall();
                        $selbrek = $select->getallCond($table,$cond);
                        $time = strtotime('00:00:00');
                        $total_time = 0;
                        if(!empty($selbrek))
                        {
                          foreach($selbrek as $brk)
                          {
                            $ttlbreak = strtotime($brk['in_totalbreak']);
                            $sec_time = $ttlbreak - $time;
                            $total_time = $total_time + $sec_time;
                          }
                          $hours = intval($total_time / 3600);
                          $total_time = $total_time - ($hours * 3600);
                          $min = intval($total_time / 60);
                          $sec = $total_time - ($min * 60);
                          $pbreaks = ("$hours:$min:$sec");
                        }
                        else
                        {
                          $pbreaks = "00:00:00";
                        }
                        
  
                        $table = "in_emp_attend";
                        $cond = " `in_comid`='$comid' AND `in_empid`='$emi' AND `in_logdate`='$cdate' ";
                        $select = new Selectall();
                        $sel = $select->getcondData($table,$cond);
                        if($sel != "")
                        {
                          $inlat = $sel['in_latitude'];
                          $inlog = $sel['in_longitude'];
                          $inareas = $inlat.",".$inlog;
                          $time = $sel['in_timestatus'];
                          switch($time)
                          {
                            case "late":
                            $color = "dangerlight";
                            break;
                            case "early":
                            $color = "successlight";
                            break;
                            case "grace":
                            $color = "purplelight";
                            break;
                          }
    
                         
                          
                          ?>
                          <tr class="<?php echo $color;?>">
    
                            <td><?php echo $xl;?></td>
                            <td>System Login</td>
                            <td><?php echo date('d-m-Y', strtotime($sel['in_logdate']));?></td>
  
                            <td><?php switch($color){ case"dangerlight": echo "Late Login";break; case"successlight": echo "On Time";break; case"purplelight": echo "Grace Time";break; }; ?></td>
                            <td><?php echo $sel['in_dayleave'];?></td>
                            <td><?php echo $prs['in_prefix'].$sel['in_empid'];?></td>
                            <?php
                            if(isset($_GET['b']))
                            {
                              $b = $_GET['b'];
                              switch($b)
                              {
                                case "lunch":
                                  $table = "in_empbreak";
                                  $cond = " `in_comid`='$comid' AND `in_empid`='$emi' AND `in_logdate`='$cdate' AND `in_logname`='Lunch' ";
                                  $select = new Selectall();
                                  $brk = $select->getcondData($table,$cond);
                                  if($brk != "")
                                  {
                                    ?>
                                    <td><span class="bg-indigo breakblink"><i class="fas fa-hamburger"></i> </span><?php echo $sel['in_fname']." ".$sel['in_lname'];?></td>
                                    <?php
                                  }
                                  else
                                  {
                                    ?>
                                    <td ><?php echo $sel['in_fname']." ".$sel['in_lname'];?></td>
                                    <?php
                                  }
                                break;
                                case "tea":
                                  $table = "in_empbreak";
                                  $cond = " `in_comid`='$comid' AND `in_empid`='$emi' AND `in_logdate`='$cdate' AND `in_logname`='Tea' ";
                                  $select = new Selectall();
                                  $brk = $select->getcondData($table,$cond);
                                  if($brk != "")
                                  {
                                    ?>
                                    <td><span class="bg-pink breakblink"><i class="fas fa-mug-hot"></i></span> <?php echo $sel['in_fname']." ".$sel['in_lname'];?></td>
                                    <?php
                                  }
                                  else
                                  {
                                    ?>
                                    <td ><?php echo $sel['in_fname']." ".$sel['in_lname'];?></td>
                                    <?php
                                  }
                                break;
                              }
                            }
                            else
                            {
                              $table = "in_empbreak";
                              $cond = " `in_comid`='$comid' AND `in_empid`='$emi' AND `in_logdate`='$cdate' AND `in_breakout`='00:00:00' ";
                              $select = new Selectall();
                              $brk = $select->getcondData($table,$cond);
                              if($brk != "")
                              {
                                $logn = $brk['in_logname'];
                                switch($logn)
                                {
                                  case "Lunch":
                                  ?>
                                  <td><span class="bg-indigo breakblink"><i class="fas fa-hamburger"> </i></span> <?php echo $sel['in_fname']." ".$sel['in_lname'];?></td>
                                  <?php
                                  break;
                                  case "Tea":
                                  ?>
                                  <td> <span class="bg-pink breakblink"><i class="fas fa-mug-hot"></i> </span><?php echo $sel['in_fname']." ".$sel['in_lname'];?></td>
                                  <?php
                                  break;
                                }
                                
                                ?>

                                <?php
                              }
                              else
                              {
                                ?>
                                <td ><?php echo $sel['in_fname']." ".$sel['in_lname'];?></td>
                                <?php
                              }
                            }
                            ?>
  
                            
  
                            <td><?php echo $sel['in_login'];?></td>
  
                            <td><?php echo $outset;?></td>
  
                            <td><?php echo $outhour;?></td>
                            <td><?php echo $pbreaks;?></td>
  
                            
  
                            <td><?php echo $sel['in_ipaddress'];?></td>
                            <td><?php
                              if($inlat != "")
                              {
                                ?>
                                <a href="https://www.google.com/maps/place/<?php echo $inareas;?>" class="text-dark" target="_blank"><i class="fas fa-map-marker-alt"></i></a>        
                                <?php
                              }
                            ?></td>
  
                            <td><a href="<?php echo VIEW.$pagename?>/static-report.php?id=<?php echo $sel['in_empid'];?>" class="text-dark"><i class="fas fa-chart-pie"></i></a></td>
  
                            </tr>
                          <?php
                        }
                        else
                        {
                          ?>
                          <tr class="">
    
                          <td><?php echo $xl;?></td>
                          <td></td>
                          <td><?php echo date('d-m-Y', strtotime($cdate));?></td>
  
                          <td>OFF</td>
                          <td>00:00:00</td>
                          <td><?php echo $prs['in_prefix'].$eci['in_empid'];?></td>
  
                          <td><?php echo $eci['in_fname']." ".$eci['in_lname'];?></td>
  
                          <td>00:00:00</td>
  
                          <td>00:00:00</td>
  
                          <td>00:00:00</td>
                          <td>00:00:00</td>
  
                          
  
                          <td>0.0.0.0</td>
  
                          <td></td>
                          <td></td>
                          </tr>
                          <?php
                        }
  
                        $xl++;
                      }
                      
                    }
                    else
                    {
                      ?>
                      <tr>
                        <td colspan="11">No Data</td>
                      </tr>
                      <?php
                    }
                  }
                  


                  
                  ?>

                </tbody>

              </table>

            </div>

          </div>

        </div>

        <!-- /.row -->

        

      </div><!-- /.container-fluid -->

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->

 

 <?php

include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/footer.php';

?>

<style type="text/css">
  .table thead th {
    vertical-align: top;
    border-bottom: 2px solid #dee2e6;
}
</style>