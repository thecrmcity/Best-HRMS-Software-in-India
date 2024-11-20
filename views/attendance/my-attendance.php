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
              if(isset($_GET['s']))
              {
                ?>
                <a href="<?php echo VIEW.$pagename."/".$siteaim?>.php" class="btn-sm btn-primary ml-3"><i></i> Exit Search </a>
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
        <div class="row mb-2">
          <div class="col-lg-4 col-md-4">
            <?php
            if(isset($_GET['s']))
            {
              $s = $_GET['s'];
              ?>
              <div class="font-weight-bold"> <i class="fas fa-calendar-alt"></i> <?php echo $s.' '.date('Y');?> </div>
              <?php
            }
            else
            {
              ?>
              <div class="font-weight-bold"> <i class="fas fa-calendar-alt"></i> <?php echo date('F Y', strtotime($cdate));?> </div>
              <?php
            }
            ?>
            
          </div>
          <div class="col-lg-8 col-md-8">
            <div class="rightinfo">
              <?php
                $esttime = "00:00:00";
                $table = "in_emp_attend";
                $cond = " `in_comid`='$comid' AND `in_empid`='$empid' AND `in_logdate`='$cdate' ";
                $select = new Selectall();
                $estilog = $select->getcondData($table,$cond);
                if($estilog != "")
                {
                  $login = $estilog['in_login'];

                  $select = new Selectall();
                  $cmnfo = $select->companyInfo();
                  $cmoff = $cmnfo['in_hours'];

                  $timediff = gmdate("H:i:s",time()-strtotime($login));
                  $subtime = explode(':', $timediff);

                  $custoff = explode(":", $cmoff);
                  
                  $cmhours = $custoff[0];
                  $cmminus = $custoff[1];
                  $cmsecnd = $custoff[2];
                  $esttime = date('H:i:s', strtotime("+$cmhours hour +$cmminus minutes +$cmsecnd seconds", strtotime($login)));
                  
                  
                }
              ?>
                <ul class="form-inline">
                  <li class="font-weight-bold form-control form-control-sm">Estimated Logout : <span> <?php echo $esttime;?></span></li>
                  <li>Count Down : <span class="estimated" id="actual">00:00:00</span></li>
                </ul>
              
              <form class="form-inline" method="GET">
                <div class="input-group">
                
                <select class="form-control form-control-sm rounded-0" name="s" required>
                  <?php
                  $longmon = array('January','February','March', 'April','May','June','July','August','September', 'October','November','December');
                  
                  if(isset($_GET['s']))
                  {
                      $s = $_GET['s'];
                      
                  }
                  else
                  {
                      $s = date('F', strtotime($cdate));
                  }

                  $table = "in_monthly_attend";
                  $inner = " DISTINCT in_month ";
                  $cond = " `in_comid`='$comid' ";
                  $select = new Selectall();
                  $selmon = $select->getallInnercond($table,$inner,$cond);
                  
                  if(!empty($selmon))
                  {
                    foreach($selmon as $mon)
                    {
                      $ntmon = $mon['in_month'];
                      
                    ?>
                    <option value="<?php echo $ntmon;?>" <?php echo $s == $ntmon ? "selected":""; ?>><?php echo $ntmon; ?></option>
                    <?php
                    }
                  }
                  
                 
                  ?>
                 
                </select>
                  <div class="input-group-append">
                  <button type="submit" class="input-group-text rounded-0"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>
        <?php

        function weekOfMonth($date) {
          $firstOfMonth = strtotime(date("Y-m-01", $date));
          return weekOfYear($date) - weekOfYear($firstOfMonth) + 1;
        }

        function weekOfYear($date) {
          $weekOfYear = intval(date("W", $date));
          if (date('n', $date) == "1" && $weekOfYear > 51) {
              return 0;
          }
          else if (date('n', $date) == "12" && $weekOfYear == 1) {
              return 53;
          }
          else {
              return $weekOfYear;
          }
        }

        $daycont = 0;
        $holday = 0;
        $weeshol = 0;
        $offday = 0;
        $latein = 0;
        $ct100 = 0;

        if(isset($_GET['s']))
        {
          $s = $_GET['s'];

          $condy = date('j', strtotime($s));
          $monthday = date('t', strtotime($s));
          $em = date('m', strtotime($s));
        }
        else
        {
          $condy = date('j', strtotime($cdate));
          $monthday = date('t', strtotime($cdate));
          $em = date('m', strtotime($cdate));
        }
        

        
        
        
        for($p=1;$p<$monthday;$p++)
        {
            
            $workday = date('Y-'.$em.'-'.$p);
            $table = "in_emp_attend";
            $cond = " `in_comid`='$comid' AND `in_empid`='$empid' AND `in_logdate`='$workday' ";
            $select = new Selectall();
            $selted = $select->getcondData($table,$cond);

            if($selted != "")
            {
              $logsin = $selted['in_login'];

              $totalwork = $selted['in_totalhours'];
              $select = new Selectall();
              $workdot = $select->companyInfo();
              $fullday = $workdot['in_fullhours'];
              $halfday = $workdot['in_halfhours'];
              $deduct = $workdot['in_deduction'];

            $table = "in_empbreak";
            $cond = " `in_comid`='$comid' AND `in_empid`= '$empid' AND `in_logdate`='$workday' ";
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
              $pbreaks = "0:00:00";
            }
            

            if($totalwork != "")
            {
              $decimalValue = (strtotime($totalwork) - strtotime($pbreaks)) / 3600;
              $hours = floor($decimalValue);
              $decimalPart = $decimalValue - $hours;
              $minutes = floor($decimalPart * 60);
              $seconds = round(($decimalPart * 60 - $minutes) * 60);
              $nethour = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
            }
            else
            {
              $nethour = "";
            }

              if($fullday <= $nethour)
              {
                $daycont = $daycont+1;
              }
              else if($halfday <= $nethour)
              {
                $daycont = $daycont+.5;
              }
              else
              {
                $daycont = $daycont+0;
              }

              $latlog = $selted['in_timestatus'];
              if($latlog === 'late')
              {
                $latein = $latein+1;
              }


            }
            else
            {
              if($cdate != $workday)
              {
                $offday = $offday+1;
              }

              // $table = "in_applyleaves";
              // $cond = " `in_startdate`='$workday' ";

            }
            

            
            $table = "in_holidays";
            $cond = " `in_comid`='$comid' AND `in_leavedate`='$workday' AND `in_status`='1' ";
            $select = new Selectall();
            $holisd = $select->getcondData($table,$cond);
            
            if($holisd != "")
            {
              $holday = $holday+1;
            }
            

            $nofweek = weekOfMonth(strtotime($workday));
            $wishdat = date('l', strtotime(date('Y-'.$em.'-'.$p)));


            switch($nofweek)
            {
              case "1":
                $table = "in_weekoff";
                $cond = " `in_comid`='$comid' AND `in_days`='$wishdat' AND `in_firstweek` NOT IN('', 'NL') ";
                $select = new Selectall();
                $wees = $select->getcondData($table,$cond);
                if($wees != "")
                {
                 
                  
                  $weeshol = $weeshol+1;

                }
                
              break;
              case "2":
                $table = "in_weekoff";
                $cond = " `in_comid`='$comid' AND `in_days`='$wishdat' AND `in_secndweek` NOT IN('', 'NL') ";
                $select = new Selectall();
                $wees = $select->getcondData($table,$cond);
                if($wees != "")
                {
                  $weeshol = $weeshol+1;
                }
                
              break;
              case "3":
                $table = "in_weekoff";
                $cond = " `in_comid`='$comid' AND `in_days`='$wishdat' AND `in_thirdweek` NOT IN('', 'NL') ";
                $select = new Selectall();
                $wees = $select->getcondData($table,$cond);
                if($wees != "")
                {
                  $weeshol = $weeshol+1;
                }
                
              break;
              case "4":
                $table = "in_weekoff";
                $cond = " `in_comid`='$comid' AND `in_days`='$wishdat' AND `in_forthweek` NOT IN('', 'NL') ";
                $select = new Selectall();
                $wees = $select->getcondData($table,$cond);
                if($wees != "")
                {
                  $weeshol = $weeshol+1;
                }
                
              break;
              case "5":
                $table = "in_weekoff";
                $cond = " `in_comid`='$comid' AND `in_days`='$wishdat' AND `in_fifthweek` NOT IN('', 'NL') ";
                $select = new Selectall();
                $wees = $select->getcondData($table,$cond);
                if($wees != "")
                {
                  $weeshol = $weeshol+1;
                }
                
              break;
            }


            if(!isset($_GET['s']))
            {
              if($p == $condy)
              {
                break;
              }
            }
            
        }
        $leavtak = 0;
        $losspay = 0;
        $table = "in_applyleaves";
        $cond = " `in_comid`='$comid' AND `in_empid`='$empid' AND MONTH(in_startdate)='$em' AND `in_approvstatus`='1' ";
        $select = new Selectall();
        $leas = $select->getallCond($table,$cond);
        if(!empty($leas))
        {
          foreach($leas as $les)
          {
            $leavtak =  $leavtak + $les['in_applyday'];

            $losspay = $losspay + $les['in_lossofpay'];
          }
        }
        ?>

        <div class="row">

          <div class="col-sm-2 col-md-2">
            <div class="info-box fillbox">
              
              <div class="info-box-content">
                <span class="info-box-text">Present Days</span>
                <span class="info-box-number"><?php echo $daycont;?></span>
              </div>
              
            </div>
          <!-- /.info-box-content -->
          </div>
          
          <div class="col-sm-2 col-md-2">
            <div class="info-box fillbox">

              <div class="info-box-content">
                <span class="info-box-text">Taken Leaves</span>
                <?php
                $taketo = $leavtak-$losspay;
                if($taketo <= 0)
                {
                  ?>
                  <span class="info-box-number"><?php echo $losspay-$leavtak;?> <span class="badge badge-success">P</span> + <?php echo $losspay;?> <span class="badge badge-danger">L</span></span>
                  <?php
                }
                else
                {
                  ?>
                  <span class="info-box-number"><?php echo $leavtak-$losspay;?> <span class="badge badge-success">P</span> + <?php echo $losspay;?> <span class="badge badge-danger">L</span></span>
                  <?php
                }
                ?>
                
              </div>
              
            </div>
          <!-- /.info-box-content -->
          </div>
          <div class="col-sm-2 col-md-2">
            <div class="info-box fillbox">
              
              <div class="info-box-content">
                <span class="info-box-text">Week Off + Holidays</span>
                <span class="info-box-number"><?php echo $weeshol;?>+<?php echo $holday;?></span>
              </div>
              
            </div>
          <!-- /.info-box-content -->
          </div>
          <div class="col-sm-2 col-md-2">
            <div class="info-box fillbox">
              
              <div class="info-box-content">
                <span class="info-box-text">Late Login</span>
                <span class="info-box-number"><?php echo $latein;?></span>
              </div>
              
            </div>
          <!-- /.info-box-content -->
          </div>
          <div class="col-sm-2 col-md-2">
            <div class="info-box fillbox">
              
              <div class="info-box-content">
                <span class="info-box-text">Late Deduction <sup class="text-danger"></sup></span>
                <span class="info-box-number"><?php $latin = ($latein*$deduct); $latins = number_format((float)$latin, 2, '.', ''); echo $latins;?> Day</span>
              </div>
              
            </div>
          <!-- /.info-box-content -->
          </div>
          <div class="col-sm-2 col-md-2">
            <div class="info-box fillbox">
              
              <div class="info-box-content">
                <span class="info-box-text">Payable Days</span>
                <?php
                $taketo = $leavtak-$losspay;
                if($taketo <= 0)
                {
                  $taketo = $losspay-$leavtak;
                  
                  ?>
                  <span class="info-box-number"><?php echo $taketo+$weeshol+$holday+($daycont-$latins);?> Days</span>
                  <?php
                }
                else
                {
                  $taketo = $leavtak-$losspay;

                  ?>
                  <span class="info-box-number"><?php echo $taketo+$weeshol+$holday+($daycont-$latins);?> Days</span>
                  <?php
                }
                ?>
                
              </div>
              
            </div>
          <!-- /.info-box-content -->
          </div>
          

        </div>

        <div class="row">

          <div class="col-lg-5 col-md-5">

            <div class="card card card-info card-outline">

                  <div class="card-header ui-sortable-handle" style="cursor: move;">

                    <h3 class="card-title">

                      <i class="fas fa-chart-pie mr-1"></i>

                      Monthly Reports

                    </h3>

                    <div class="card-tools">

                

              </div>

                    

                  </div><!-- /.card-header -->

                  <div class="card-body p-0">

                    <div class="tab-content ">

                      <!-- Morris chart - Sales -->

                      

                      <div class="card-body">

                        <canvas id="donutChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>

                      </div>

                    </div>

                  </div><!-- /.card-body -->

                </div>

          </div>

          <div class="col-lg-7 col-md-7">

            <div class="card card card-info card-outline">

                  <div class="card-header ui-sortable-handle" style="cursor: move;">

                    <h3 class="card-title">

                      <i class="fas fa-tasks mr-1"></i>
                      <?php
                        if(isset($_GET['sd']))
                        {
                          echo $_GET['sd']." All Logs";
                        }
                        else
                        {
                          echo "Today All Logs";
                        }
                      ?>

                      

                    </h3>

                    <div class="card-tools">

                      <form class="form-inline" method="GET">
                        <div class="input-group">
                          <?php
                          if(isset($_GET['sd']))
                          {
                            ?>
                            <input type="date" name="sd" class="form-control form-control-sm rounded-0" required value="<?php echo $_GET['sd'];?>">
                            <?php
                          }
                          else
                          {
                            ?>
                            <input type="date" name="sd" class="form-control form-control-sm rounded-0" required value="<?php echo $cdate;?>">
                            <?php
                          }
                          ?>
                          
                          <div class="input-group-append">
                          <button type="submit" class="input-group-text rounded-0"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>

                    </div>

                    

                  </div><!-- /.card-header -->

                  <div class="card-body p-1">
                    <div class="table-responsive" style="height: 355px;">
                    <table class="table table-bordered">

                      <thead class="bg-info">

                        <th>Activities</th>

                        <th>In Time</th>

                        <th>Out Time</th>
                        <th>Total Time</th>
                        <th><i class="fas fa-edit"></i></th>
                      </thead>

                      <tbody>

                        <?php
                        if(isset($_GET['sd']))
                        {
                          $sd = $_GET['sd'];
                          $table = "in_emp_attend";
                          $cond = " `in_comid`='$comid'  AND `in_empid`='$empid' AND `in_logdate`='$sd' ";
                          $select = new Selectall();
                          $alogs = $select->getallCond($table,$cond);

                        }
                        else
                        {
                          $table = "in_emp_attend";
                          $cond = " `in_comid`='$comid'  AND `in_empid`='$empid' AND `in_logdate`='$cdate' ";
                          $select = new Selectall();
                          $alogs = $select->getallCond($table,$cond);
                        }
                        $total_hours = 0;
                        $total_seconds = 0;
                        $total_minutes= 0;
                        
                        $xl=1;
                        if(!empty($alogs))

                        {

                          foreach($alogs as $al)

                          {
                            $punch = $al['in_totalhours'];
                            $timesal = $al['in_rqstatus'];

                            if($punch != "")
                            {
                              $shoot = $xl."-Punch";
                            }
                            else
                            {
                              $shoot = "Check-In";
                            }
                            $duration = $al['in_totalhours'];
                            $duration_parts = explode(':', $duration);
                            if (count($duration_parts) >= 3) {
                              list($hours, $minutes, $seconds) = $duration_parts;
                              $total_seconds += ($hours * 3600) + ($minutes * 60) + $seconds;
                            }
                                                        
                            ?>

                            <tr class="table-secondary">

                              <td><?php echo $shoot;?></td>

                              <td><?php echo $al['in_login'];?></td>

                              <td><?php echo $al['in_logout'];?></td>

                              <td><?php echo $al['in_totalhours'];?></td>
                              <td>
                              <?php
                              $setout = $al['in_logout'];
                              if($timesal != "1")
                              {
                                ?>
                                <a href="<?php echo VIEW;?>attendance/my-attendance.php?id=<?php echo $al['in_sno']?>" class="text-success"><i class="fas fa-edit"></i></a>
                                <?php
                              }
                              ?>
                              </td>
                            </tr>

                            <?php
                            $xl++;

                          }
                          $total_hours = floor($total_seconds / 3600);
                          $total_seconds %= 3600;
                          $total_minutes = floor($total_seconds / 60);
                          $total_seconds %= 60;

                        }
                        else
                        {
                          ?>
                          <tr>
                            <td colspan="5" class="text-center">No Data</td>
                          </tr>
                          <?php
                        }

                        ?>
                        <tr class="bg-dark">
                          <td colspan="4">Total Working Time</td>
                          <td><?php echo sprintf("%02d:%02d:%02d", $total_hours, $total_minutes, $total_seconds);?></td>
                        </tr>
                        <?php
                        if(isset($_GET['sd']))
                        {
                          $sd = $_GET['sd'];
                            $table = "in_empbreak";
                            $cond = " `in_logdate`='$sd' AND `in_empid`='$empid' ";
                            $select = new Selectall();
                            $tlogs = $select->getallCond($table,$cond);
                        }
                        else
                        {
                            $table = "in_empbreak";
                            $cond = " `in_logdate`='$cdate' AND `in_empid`='$empid' ";
                            $select = new Selectall();
                            $tlogs = $select->getallCond($table,$cond);
                        }

                        $totalbreak = 0;
                        $break_minutes = 0;
                        $total_break = 0;

                        if(!empty($tlogs))

                        {

                          foreach($tlogs as $tl)

                          {
                            $breatast = $tl['in_rqstatus']; 
                            
                            $duration = $tl['in_totalbreak'];
                            list($hours, $minutes, $seconds) = explode(':', $duration);
                            $total_break += ($hours * 3600) + ($minutes * 60) + $seconds;

                            ?>

                            <tr class="table-warning">

                              <td><?php echo $tl['in_logname'];?></td>

                              <td><?php echo $tl['in_breakin'];?></td>

                              <td><?php echo $tl['in_breakout'];?></td>

                              <td><?php echo $tl['in_totalbreak'];?></td>
                              <td>
                                <?php
                                if($breatast != "1")
                                {
                                  ?>
                                  <a href="<?php echo VIEW?>attendance/my-attendance.php?br=<?php echo $tl['in_sno'];?>" class="text-success"><i class="fas fa-edit"></i></a>
                                  <?php
                                }
                                ?>
                                </td>
                            </tr>

                            <?php

                          }
                          
                          $totalbreak = floor($total_break / 3600);
                          $total_break %= 3600;
                          $break_minutes = floor($total_break / 60);
                          $total_break %= 60;

                        }
                        else
                        {
                          ?>
                          <tr>
                            <td colspan="5" class="text-center">No Data</td>
                          </tr>
                          <?php
                        }

                        ?>
                        <tr class="bg-dark">
                          <td colspan="4">Total Break Time</td>
                          <td><?php echo sprintf("%02d:%02d:%02d", $totalbreak, $break_minutes, $total_break);?></td>
                        </tr>

                      </tbody>

                    </table>
                  </div>

                    

                  </div><!-- /.card-body -->

                </div>

          </div>

          

          <div class="card-body">

            <div class="table-responsive">

              <table class="table table-bordered table-striped">

                <thead class="bg-info">

                  <th width="30px">No</th>

                  <th>Date</th>

                  <th>Week Day</th>

                  <th>Login</th>

                  <th>Logout</th>

                  <th>Total Hours</th>
                  <th>Rest Hours</th>
                      
                  <th>Net Hours</th>
                  <th>Payable</th>

                  <th>Status</th>

                  <th>Delay/Early</th>

                </thead>

                <tbody>

                  <?php
                  $tolworkhour = 0;
                  $tolbreaks = 0;
                  $tolnethour = 0;
                  $pbreaks = "";

                  $attenlogout = "";
                  $attenhours = "";

                  if(isset($_GET['s']))
                  {
                    

                  $cday = date('t', strtotime($s));

                  $cyer = date('Y', strtotime($s));

                  $cmon = date('m', strtotime($s));
                  }
                  else
                  {
                   
                  $cday = date('d');

                  $cyer = date('Y', strtotime($cdate));

                  $cmon = date('m', strtotime($cdate));
                  }
                  

                  for($i=1;$i<=$cday;$i++)

                  {

                    $tblmonth = date('F', strtotime(date('Y-'.$cmon)));
                    $table = "in_monthly_attend";
                    $cond = " `in_comid`='$comid' AND `in_empid`='$empid' AND `in_year`='$ydate' AND `in_month`='$tblmonth' ";
                    $select = new Selectall();
                    $logan = $select->getallCond($table,$cond);
                    if(!empty($logan))
                    {
                      $monty = "in_".$i."_out";
                      $monhour = "in_".$i."_hours";

                      foreach($logan as $gan)
                      {
                        $attenlogout = $gan[$monty];
                        $attenhours = $gan[$monhour];
                      }
                    }

                    $weekoff = date('l', strtotime(date('Y-'.$cmon.'-'.$i)));
                    
                    $wday = $cyer."-".$cmon."-".$i;

                    $nofweek = weekOfMonth(strtotime($wday));

                    $table = "in_emp_attend";

                    $cond = " `in_comid`='$comid' AND `in_empid`='$empid' AND `in_logdate`='$wday' ";

                    $select = new Selectall();

                    $log = $select->getcondData($table,$cond);

                    if($log != "")

                    {
                      $timescy = $log['in_rqstatus'];

                      

                      $wishday = date('l', strtotime(date('Y-'.$cmon.'-'.$i)));

                      $prdate = date('Y-'.$cmon.'-'.$i);
                      $table = "in_holidays";
                      $cond = " `in_comid`='$comid' AND `in_leavedate`='$prdate' AND `in_status`='1' ";
                      $select = new Selectall();
                      $holisd = $select->getcondData($table,$cond);
                      
                      if($holisd != "")
                      {
                        
                        $holicolor = "sunhight";
                        $holiarail = $holisd['in_leavname'];
                      }
                      else
                      {
                        $holicolor = "";
                        $holiarail = "";
                      }
                    
                    
                      switch($nofweek)
                      {
                        case "1":
                          $table = "in_weekoff";
                          $cond = " `in_comid`='$comid' AND `in_days`='$wishday' AND `in_firstweek` NOT IN('', 'NL') ";
                          $select = new Selectall();
                          $wees = $select->getcondData($table,$cond);
                          if($wees != "")
                          {
                            $colored = "bluehight";
                            $weekarial = "Week OFF";
                          }
                          else
                          {
                            $colored = "";
                            $weekarial = "";
                          }
                        break;
                        case "2":
                          $table = "in_weekoff";
                          $cond = " `in_comid`='$comid' AND `in_days`='$wishday' AND `in_secndweek` NOT IN('', 'NL') ";
                          $select = new Selectall();
                          $wees = $select->getcondData($table,$cond);
                          if($wees != "")
                          {
                            $colored = "bluehight";
                            $weekarial = "Week OFF";
                          }
                          else
                          {
                            $colored = "";
                            $weekarial = "";
                          }
                        break;
                        case "3":
                          $table = "in_weekoff";
                          $cond = " `in_comid`='$comid' AND `in_days`='$wishday' AND `in_thirdweek` NOT IN('', 'NL') ";
                          $select = new Selectall();
                          $wees = $select->getcondData($table,$cond);
                          if($wees != "")
                          {
                            $colored = "bluehight";
                            $weekarial = "Week OFF";
                          }
                          else
                          {
                            $colored = "";
                            $weekarial = "";
                          }
                        break;
                        case "4":
                          $table = "in_weekoff";
                          $cond = " `in_comid`='$comid' AND `in_days`='$wishday' AND `in_forthweek` NOT IN('', 'NL') ";
                          $select = new Selectall();
                          $wees = $select->getcondData($table,$cond);
                          if($wees != "")
                          {
                            $colored = "bluehight";
                            $weekarial = "Week OFF";
                          }
                          else
                          {
                            $colored = "";
                            $weekarial = "";
                          }
                        break;
                        case "5":
                          $table = "in_weekoff";
                          $cond = " `in_comid`='$comid' AND `in_days`='$wishday' AND `in_fifthweek` NOT IN('', 'NL') ";
                          $select = new Selectall();
                          $wees = $select->getcondData($table,$cond);
                          if($wees != "")
                          {
                            $colored = "bluehight";
                            $weekarial = "Week OFF";
                          }
                          else
                          {
                            $colored = "";
                            $weekarial = "";
                          }
                        break;
                      }
                      // $tolworkhour = ($tolworkhour + strtotime($log['in_totalhours']));

                      $logstatus = $log['in_timestatus'];
                      switch($logstatus)
                      {
                        case "early":
                        $colored = "successlight";
                        break;
                        case "grace":
                        $colored = "purplelight";
                        break;
                        case "late":
                        $colored = "dangerlight";
                        break;
                      }

                      ?>

                      <tr class="<?php echo $colored.' '.$holicolor; ?>">

                      <td><?php echo $i;?></td>

                      <td><?php echo date($i.'-'.$cmon.'-Y');?></td>

                      <td><?php echo date('l', strtotime(date('Y-'.$cmon.'-'.$i)));?></td>

                       <td><?php echo $log['in_login'];?></td>

                       <td><?php echo date('H:i:s',strtotime($attenlogout));?></td>
                         <td><?php echo $attenhours;?></td>
                       <?php
                       $pdate = date('Y-'.$cmon.'-'.$i);
                      $table = "in_empbreak";
                      $cond = " `in_comid`='$comid' AND `in_empid`= '$empid' AND `in_logdate`='$pdate' ";
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
                        $total_times = $total_time - ($hours * 3600);
                        $min = intval($total_times / 60);
                        $sec = $total_times - ($min * 60);
                        $pbreaks = ("$hours:$min:$sec");
                      }
                      else
                      {
                        $pbreaks = "00:00:00";
                      }
                      $ttolhour = $attenhours;
                      $tolbreaks = $tolbreaks+$total_time;

                      if($ttolhour != "")
                      {
                        $decimalValue = (strtotime($ttolhour) - strtotime($pbreaks)) / 3600;
                        $hours = floor($decimalValue);
                        $decimalPart = $decimalValue - $hours;
                        $minutes = floor($decimalPart * 60);
                        $seconds = round(($decimalPart * 60 - $minutes) * 60);
                        $nethour = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
                      }
                      else
                      {
                        $nethour = "";
                      }
                      
                      $tolnethour = ($tolnethour + strtotime($nethour));

                      $select = new Selectall();
                      $cominfo = $select->companyInfo();
                      $fday = $cominfo['in_fullhours'];
                      $hday = $cominfo['in_halfhours'];
                      $netambit = date('H:i', strtotime($nethour));

                      $netvalus = explode(":", $nethour);
                      $equalval = $netvalus[0]; 
                      
                      if($fday <= $netambit)
                      {
                        $letday = "1 Day";
                      }
                      else if($hday <= $netambit)
                      {
                        $letday = "0.5 Day";
                      }
                      else
                      {
                        $letday = "0 Day";
                      }
                      
                      ?>
                      <td><?php echo $pbreaks;?></td>
                     <?php
                     if($equalval > 0)
                        {
                          ?>
                          <td><?php echo $nethour;?></td>
                    <td><?php echo $letday;?></td>
                          <?php
                        }
                        else
                        {
                          ?>
                          <td></td>
                          <td></td>
                          <?php
                        }
                     ?>
                       <td><?php echo ucwords($log['in_timestatus'])." Login";
                       
                      ?></td>

                      <td><?php echo $log['in_dayleave'];?></td>

                       

                    </tr>

                      <?php

                      

                  }

                  else

                  {
                    
                    $wishday = date('l', strtotime(date('Y-'.$cmon.'-'.$i)));
                    $prdate = date('Y-'.$cmon.'-'.$i);
                    $table = "in_holidays";
                    $cond = " `in_comid`='$comid' AND `in_leavedate`='$prdate' AND `in_status`='1' ";
                    $select = new Selectall();
                    $holisd = $select->getcondData($table,$cond);
                    
                    if($holisd != "")
                    {
                      
                      $holicolor = "sunhight";
                      $holiarail = $holisd['in_leavname'];
                    }
                    else
                    {
                      $holicolor = "";
                      $holiarail = "";
                    }
                    
                    switch($nofweek)
                    {
                      case "1":
                        $table = "in_weekoff";
                        $cond = " `in_comid`='$comid' AND `in_days`='$wishday' AND `in_firstweek` NOT IN('', 'NL') ";
                        $select = new Selectall();
                        $wees = $select->getcondData($table,$cond);
                        if($wees != "")
                        {
                          $colored = "bluehight";
                          $weekarial = "Week OFF";
                        }
                        else
                        {
                          $colored = "";
                          $weekarial = "Absent";
                        }
                      break;
                      case "2":
                        $table = "in_weekoff";
                        $cond = " `in_comid`='$comid' AND `in_days`='$wishday' AND `in_secndweek` NOT IN('', 'NL') ";
                        $select = new Selectall();
                        $wees = $select->getcondData($table,$cond);
                        if($wees != "")
                        {
                          $colored = "bluehight";
                          $weekarial = "Week OFF";
                        }
                        else
                        {
                          $colored = "";
                          $weekarial = "Absent";
                        }
                      break;
                      case "3":
                        $table = "in_weekoff";
                        $cond = " `in_comid`='$comid' AND `in_days`='$wishday' AND `in_thirdweek` NOT IN('', 'NL') ";
                        $select = new Selectall();
                        $wees = $select->getcondData($table,$cond);
                        if($wees != "")
                        {
                          $colored = "bluehight";
                          $weekarial = "Week OFF";
                        }
                        else
                        {
                          $colored = "";
                          $weekarial = "Absent";
                        }
                      break;
                      case "4":
                        $table = "in_weekoff";
                        $cond = " `in_comid`='$comid' AND `in_days`='$wishday' AND `in_forthweek` NOT IN('', 'NL') ";
                        $select = new Selectall();
                        $wees = $select->getcondData($table,$cond);
                        if($wees != "")
                        {
                          $colored = "bluehight";
                          $weekarial = "Week OFF";
                        }
                        else
                        {
                          $colored = "";
                          $weekarial = "Absent";
                        }
                      break;
                      case "5":
                        $table = "in_weekoff";
                        $cond = " `in_comid`='$comid' AND `in_days`='$wishday' AND `in_fifthweek` NOT IN('', 'NL') ";
                        $select = new Selectall();
                        $wees = $select->getcondData($table,$cond);
                        if($wees != "")
                        {
                          $colored = "bluehight";
                          $weekarial = "Week OFF";
                        }
                        else
                        {
                          $colored = "";
                          $weekarial = "Absent";
                        }
                      break;
                    }

                    ?>

                    <tr class="<?php echo $colored.' '.$holicolor; ?>">

                      <td><?php echo $i;?></td>

                      <td><?php echo date($i.'-'.$cmon.'-Y');?></td>

                      <td><?php echo date('l', strtotime(date('Y-'.$cmon.'-'.$i)));?></td>

                    <td><?php echo "00:00:00";?></td>

                    <td><?php echo "00:00:00";?></td>

                    <td><?php echo "00:00:00";?></td>
                    <td><?php echo "00:00:00";?></td>
                    <td><?php echo "00:00:00";?></td>

                    <td><?php echo $weekarial != "Absent"? "1 Day":""; ?><?php echo $holiarail != ""? "1 Day":"";?></td>

                    <td><?php echo $holiarail != ""? $holiarail:$weekarial;?></td>

                    <td><?php echo "00:00:00";?></td>

                    



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

       </div> <!-- /.container-fluid -->

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->

  <script type="text/javascript">

  $(document).ready(function(){

      var donutChartCanvas = $('#donutChart').get(0).getContext('2d')

        var donutData        = {

          labels: [

              'Present Days',

              'Leave Days',

              'Deduction Days',

              'WeekOff & Holidays',

              'Payable Days'

              

          ],

          datasets: [

            {

              data: [<?php echo $daycont;?>,0,<?php echo $latins;?>,<?php echo $weeshol+$holday;?>,<?php echo $weeshol+$holday+($daycont-$latins);?>],

              backgroundColor : ['#00a65a', '#f56954', '#f39c12','silver','#574bc7'],

            }

          ]

        }

        var donutOptions     = {

          maintainAspectRatio : false,

          responsive : true,

        }

        //Create pie or douhnut chart

        // You can switch between pie and douhnut using the method below.

        new Chart(donutChartCanvas, {

          type: 'doughnut',

          data: donutData,

          options: donutOptions

        });



        

          $("#clickScreen").click(function(){

            $("#screenDown").fadeToggle("slow");

          });
  });

</script>

<script>
var conster = "<?php echo $cdate.' '.$esttime; ?>";
var countDownDate = new Date(conster).getTime();

var x = setInterval(function() {

  var now = new Date().getTime();
  
  var distance = countDownDate - now;
  
  // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  
  document.getElementById("actual").innerHTML = hours + ": "
  + minutes + ": " + seconds;
  
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("actual").innerHTML = "Thank You";
  }
}, 1000);
</script>

<?php

  if(isset($_GET['id']))

  {

    $id = $_GET['id'];

    $table = "in_emp_attend";

    $cond = " `in_sno`='$id' ";

    $select = new Selectall();

    $log = $select->getcondData($table,$cond);

    if($log != "")

    {

      $losout = $log['in_logout'];
      if($losout == "00:00:00")
      {
        $losoutt = "";
      }
      else
      {
        $losoutt = $losout;
      }

     

      ?>

       <div class="balancemodal">

        <div class="innermodal" style="border:10px solid #74d74f;">

          <div class="blowicon"><span>Attendance Correction </span></div>

            

            <form class="" method="POST" action="<?php echo BSURL;?>functions/attendance.php?case=attendcorrection">

            <div class="form-group">

              <label>Login Time</label>

              <input type="hidden" name="sno" value="<?php echo $id;?>">

              <input type="hidden" name="empid" value="<?php echo $log['in_empid'];?>">

              <input type="hidden" name="logday" value="<?php echo $log['in_logday'];?>">

              <input type="time" name="inlog" class="form-control rounded-0" value="<?php echo $log['in_login'];?>">

                

            </div>

            <div class="form-group">

              <label>Out Time</label>

               <input type="time" name="outlog" class="form-control rounded-0" value="<?php echo $losoutt;?>">

              

            </div>

            <div class="clearfix">

              <a href="<?php echo VIEW?>attendance/my-attendance.php" type="button" class="btn btn-default mr-3">Close</a>

              <input type="submit" class="btn px-4" style="background: #74d74f;">

            </div>

          </form>

            

         

          

          

        </div>

        

      </div>

      <?php

    }

  }

      ?>

      <?php

  if(isset($_GET['br']))

  {

    $br = $_GET['br'];

    $table = "in_empbreak";

    $cond = " `in_sno`='$br' ";

    $select = new Selectall();

    $log = $select->getcondData($table,$cond);

    if($log != "")

    {

      $losout = $log['in_breakout'];
      if($losout == "00:00:00")
      {
        $losoutt = "";
      }
      else
      {
        $losoutt = $losout;
      }

     

      ?>

       <div class="balancemodal">

        <div class="innermodal" style="border:10px solid #74d74f;">

          <div class="blowicon"><span>Break Correction </span></div>

            

            <form class="" method="POST" action="<?php echo BSURL;?>functions/attendance.php?case=breakcorrection">

            <div class="form-group">

              <label>Login Time</label>

              <input type="hidden" name="sno" value="<?php echo $br;?>">

              <input type="hidden" name="empid" value="<?php echo $log['in_empid'];?>">

              <input type="hidden" name="logdate" value="<?php echo $log['in_logdate'];?>">

              <input type="time" name="inlog" class="form-control rounded-0" value="<?php echo $log['in_breakin'];?>">

                

            </div>

            <div class="form-group">

              <label>Out Time</label>

               <input type="time" name="outlog" class="form-control rounded-0" value="<?php echo $losoutt;?>">

              

            </div>

            <div class="clearfix">

              <a href="<?php echo VIEW?>attendance/my-attendance.php" type="button" class="btn btn-default mr-3">Close</a>

              <input type="submit" class="btn px-4" style="background: #74d74f;">

            </div>

          </form>

            

         

          

          

        </div>

        

      </div>

      <?php

    }

  }

      ?>

 <?php

include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/footer.php';

?>