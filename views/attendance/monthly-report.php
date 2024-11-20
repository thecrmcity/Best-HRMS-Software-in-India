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

        <div class="card">

          <div class="card-header">

            <div class="card-title">

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

            <div class="card-tools">
              <form class="form-inline" method="GET">
                <div class="input-group">
                  <select class="form-control form-control-sm rounded-0" name="s" required>
                  <?php
                  $longmon = array('January','February','March', 'April','May','June','July','August','September', 'October','November','December');
                  
                  if(isset($_GET['s']))
                  {
                      $s = $_GET['s'];
                      $ptmon = date('F', strtotime($s));
                  }
                  else
                  {
                      $ptmon = date('F', strtotime($cdate));
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
                    <option value="<?php echo $ntmon;?>" <?php echo $ptmon == $ntmon ? "selected":""; ?>><?php echo $ntmon; ?></option>
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

          <div class="card-body">
            <div class="row mb-2">
              <div class="col-sm-6 col-lg-6">
                <?php
                  if(isset($_GET['s']))
                  {
                      $s = $_GET['s'];
                      ?>
                      <form class="form-inline" method="GET" >
                        <div class="input-group">
                        
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
              <div class="col-sm-6 col-lg-6">
                <div class="clearfix">
                  <?php
                  if(isset($_GET['s']))
                  {
                    $s = $_GET['s'];
                    ?>
                    <a href="<?php echo VIEW.$pagename?>/monthly-report-download.php?s=<?php echo $s;?>" class="btn btn-sm bg-olive  float-right mb-2"><i class="fas fa-download"></i> Download</a>
                    <?php
                  }
                  else
                  {
                    ?>
                    <a href="<?php echo VIEW.$pagename?>/monthly-report-download.php" class="btn btn-sm bg-olive  float-right mb-2"><i class="fas fa-download"></i> Download</a>
                    <?php
                  }
                  ?>
                  
                </div>
              </div>

            </div>

            <div class="table-responsive emptable">

              <table class="table table-bordered table-striped">

                <thead class="bg-info sticky-top">

                  <th>Employee ID</th>

                  <th>Employee Name</th>

                  <th>Month</th>

                  <th>Days</th>

                  <th>Holidays</th>

                  <th>Week Off</th>

                  <th>Late Login</th>

                  <th>Late Deduction</th>

                  <th>Present Days</th>

                  <th>Leaves</th>

                  <th>Pay Days</th>



                </thead>

                <tbody>

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

                    if(isset($_GET['e']))
                    {
                      $e = $_GET['e'];
                      $table = "in_employee";
                      $cond = " `in_compid`='$comid' AND (`in_empid` LIKE '%$e%' OR `in_fname` LIKE '%$e%' OR `in_lname` LIKE '%$e%' ) ";
                      $select = new Selectall();
                      $emps = $select->getallCond($table,$cond);

                      $cmon = date('F',strtotime($cdate));
                      $condy = date('j', strtotime($cdate));
                      $em = date('m', strtotime($cdate));
                      $mdays = date('t', strtotime($cdate));

                    }
                    elseif(isset($_GET['e']) && isset($_GET['s']))
                    {
                      $e = $_GET['e'];
                      $s = $_GET['s'];
                      $table = "in_employee";
                      $cond = " `in_compid`='$comid' AND (`in_empid` LIKE '%$e%' OR `in_fname` LIKE '%$e%' OR `in_lname` LIKE '%$e%' ) ORDER BY in_empid ASC";
                      $select = new Selectall();
                      $emps = $select->getallCond($table,$cond);
                      $cmon = date('F',strtotime($s));
                      $condy = date('j', strtotime($s));
                      $em = date('m', strtotime($s));
                      $mdays = date('t', strtotime($s));
                    }
                    elseif(!isset($_GET['e']) && isset($_GET['s']))
                    {
                      $s = $_GET['s'];
                      $table = "in_employee";
                      $cond = " `in_compid`='$comid' ORDER BY in_empid ASC";
                      $select = new Selectall();
                      $emps = $select->getallCond($table,$cond);

                      $cmon = date('F',strtotime($s));
                      $condy = date('j', strtotime($s));
                      $em = date('m', strtotime($s));
                      $mdays = date('t', strtotime($s));
                    }
                    else
                    {
                      $table = "in_employee";
                      $cond = " `in_compid`='$comid' ORDER BY in_empid ASC";
                      $select = new Selectall();
                      $emps = $select->getallCond($table,$cond);

                      $cmon = date('F',strtotime($cdate));
                      $condy = date('j', strtotime($cdate));
                      $em = date('m', strtotime($cdate));
                      $mdays = date('t', strtotime($cdate));
                    } 

                    
                    

                    
                    if(!empty($emps))
                    {
                      foreach($emps as $emp)
                      {
                        $no = $emp['in_empid'];

                        $table = "in_monthly_attend";
                        $cond = " `in_comid`='$comid' AND `in_empid`='$no' AND `in_month`='$cmon' AND `in_year`='$ydate'";
                        $select = new Selectall();
                        $rs = $select->getcondData($table,$cond);

                        if($rs != "")
                        {
                          $ps = $emp['in_emprefix'];
                          $prs = $select->prefix($ps);
                          ?>
                       <tr>
                        <td><a href="<?php echo VIEW?>attendance/static-report.php?id=<?php echo $no;?>"><?php echo $prs.$no?></a></td>
                        <td><?php echo $emp['in_fname']." ".$emp['in_lname'];?></td>
                        <?php
                        $holday = 0;
                        $weeshol = 0;
                        $daycont = 0;
                        $latein = 0;
                        $absent = 0;
                        $leavtak = 0;
                        $losspay = 0; 

                        $table = "in_applyleaves";
                        $cond = " `in_comid`='$comid' AND `in_empid`='$no' AND MONTH(in_startdate)='$em' AND `in_approvstatus`='1' ";
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

                        for($i=1;$i<=$mdays;$i++)
                        {
                          $workday = date('Y-'.$em.'-'.$i);
                          $table = "in_holidays";
                          $cond = " `in_comid`='$comid' AND `in_leavedate`='$workday' AND `in_status`='1' ";
                          $select = new Selectall();
                          $holisd = $select->getcondData($table,$cond);
                          if($holisd != "")
                          {
                            $holday = $holday+1;
                          }
                          else
                          {
                            $holday = 0;
                          }

                          $nofweek = weekOfMonth(strtotime($workday));
                          $wishdat = date('l', strtotime(date('Y-'.$em.'-'.$i)));


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

                          $selted = "in_".$i."_hours";
                          $totalwork = $rs[$selted];
                          
                          $select = new Selectall();
                          $workdot = $select->companyInfo();
                          $fullday = $workdot['in_fullhours'];
                          $halfday = $workdot['in_halfhours'];
                          $deduct = $workdot['in_deduction'];

                          $table = "in_empbreak";
                          $cond = " `in_comid`='$comid' AND `in_empid`='$no' AND `in_logdate`='$workday' ";
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
                          $table = "in_emp_attend";
                          $cond = " `in_comid`='$comid' AND `in_empid`='$no' AND `in_logdate`='$workday' ";
                          $select = new Selectall();
                          $selted = $select->getcondData($table,$cond);

                          if($selted != "")
                          {
                            $latlog = $selted['in_timestatus'];
                            if($latlog === 'late')
                            {
                              $latein = $latein+1;
                            }
                          }

                            

                         if(!isset($_GET['s']))
                          {
                            if($i == $condy)
                            {
                              break;
                            }
                          }
                        }
                        ?>
                        <td><?php echo $cmon;?></td>
                        <td><?php echo $mdays?></td>
                        <td><?php echo $holday;?></td>
                        <td><?php echo $weeshol;?></td>
                        <td><?php echo $latein;?></td>
                        <td><?php $latin = ($latein*$deduct); $latins = number_format((float)$latin, 2, '.', ''); echo $latins;?></td>

                        <td><?php echo $daycont;?></td>
                        <td>
                          <?php
                            $taketo = ($leavtak-$losspay);
                            if($taketo <= 0)
                            {
                              echo ($losspay-$leavtak);
                            }
                            else
                            {
                              echo ($leavtak-$losspay);
                            }
                          ?>
                        </td>
                        <td><?php echo ($holday+$weeshol+$daycont)-$latins?></td>
                       </tr>
                       <?php

                        }

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