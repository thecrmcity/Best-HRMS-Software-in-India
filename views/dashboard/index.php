<?php

$pagename = basename(__DIR__);

$fullPage = ucwords($pagename);

$siteaim = basename($_SERVER['SCRIPT_FILENAME'],'.php');

$sitename = str_replace('-', ' ', $siteaim);

$bsurl = dirname(dirname(__DIR__));

include_once $bsurl.'/inc/header.php';
$predefine = new Predefine();
$predefine->majorVariable();
include_once $bsurl.'/inc/sidebar.php';

?>



  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper mainbody">

    <!-- Content Header (Page header) -->

    

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h4 class="m-0"><?php echo $fullPage;?></h4>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">



              <li class="breadcrumb-item"><a href="<?php echo BSURL;?>views/dashboard/"><i class="fas fa-home"></i> Home</a></li>

              <li class="breadcrumb-item active"><?php echo $fullPage;?></li>

            </ol>

          </div><!-- /.col -->

        </div><!-- /.row -->

      </div><!-- /.container-fluid -->

    </div>

    <!-- /.content-header -->

    <?php

    if(isset($grid) || isset($adminemail))

    {
      if(isset($adminemail))
      {
        $table = "in_dashcontrol";

        $cond = " `in_groupid`='1' ";

        $select = new Selectall();

        $dashq = $select->getcondData($table,$cond);
      }
      else
      {
        $table = "in_dashcontrol";

        $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' ";

        $select = new Selectall();

        $dashq = $select->getcondData($table,$cond);
      }
      

      if($dashq != "")

      { 

        $chckinCard = $dashq['in_checkin'];

        $recentLogin = $dashq['in_recentlog'];

        $empcard = $dashq['in_empcard'];

        $attend = $dashq['in_attendcard'];

        $salcard = $dashq['in_salarycard'];

        $levcard = $dashq['in_leavecard'];

        $rptcard = $dashq['in_reportcard'];

        $holcard = $dashq['in_holidaycard'];

        $evencard = $dashq['in_eventcard'];

        $teamcard = $dashq['in_teamtask'];

        



        

      }

      else

      {

        

        ?>

        <div class="text-center">No Dashbord Decided of this Group of Employee</div>

        <?php

      }

    }

    ?>

    <!-- Main content -->

    <section class="content">

      <div class="container-fluid">

        <!-- Small boxes (Stat box) -->

        <div class="row">

          <div class="col-sm-3 col-lg-3">

            

              <?php

              if($chckinCard != "")

              {

                $table = "in_employee";

                $cond = " `in_compid`='$comid' AND `in_empid`='$empid' ";

                $select = new Selectall();

                $row = $select->getcondData($table,$cond);

                if($row != "")

                {

                  

              ?>

              <div class="card card-primary card-outline">

              <div class="card-body box-profile">

                <div class="text-center">

                  <canvas id="canvas" width="150" height="150"style="background-color:#fff;box-shadow: 0px 0px 5px #7c7c7c;

    border-radius: 50%;"></canvas>

                </div>

                <?php

                  $core->goodWishes();

                ?>

             

                <p class="text-muted text-center"><?php echo $fullname;?></p>



                <ul class="list-group list-group-unbordered mb-3">

                  

                  <?php

                    $select = new Selectall();

                    $login = $select->loginStatus();

                    $logs = $select->loginLogs();



                    // print_r($login);

                    // $arrcnt = count($login);

                    if($logs != "")

                    {

                      $intime = $login['in_login'];

                      $delay = $login['in_dayleave'];

                      $timediff = gmdate("H:i:s",time()-strtotime($intime));

                      $subtime = explode(':', $timediff);

                      ?>

                      <li class="list-group-item">

                    <b>Login Time :</b> <a class="float-right"><?php echo $intime;?></a>

                  </li>

                  <li class="list-group-item">

                    <?php

                    $id = $comid;

                    $select = new Selectall();

                    $setting = $select->compInfo($id);

                    $comintime = $setting['in_intime'];

                    

                    if($intime > $comintime)

                    {

                      ?>

                      <b class="text-danger">Late <small>[<?php echo $delay;?>]</small></b>

                      <?php

                    }

                    else

                    {

                      ?>

                      <b class="text-success">Early <small>[<?php echo $delay;?>]</small></b>

                      <?php

                    }

                    ?>

                     <span class="float-right timers" id="timer"></span>

                  </li>

                  

                  <form class="" method="POST" action="<?php echo BSURL;?>functions/dashboard.php?case=signout">

                  <li class="list-group-item">

                    <select class="form-control" name="break" onchange="yesCheck(this);">

                      <option value="">---Select---</option>

                      <option value="Lunch">Lunch Break</option>

                      <option value="Tea">Tea Break</option>

                      <option value="Checkout">Sign-Out</option>

                    </select>
                    <input type="hidden" name="latitude" id="latitude_out">
                    <input type="hidden" name="longitude" id="longitude_out">

                  </li>

                  <li class="list-group-item" style="display: none;" id="signout">

                    <input type="submit" name="signout" value="Logout" class="btn btn-danger btn-block">

                  </li>

                </form>

                      <?php

                      

                    }

                    else

                    {

                      ?>

                      <li class="list-group-item">

                    <b>Today</b> <span class="float-right"><?php echo date('d-m-Y');?></span>

                  </li>

                      </ul>

                      <form class="" method="POST" action="<?php echo BSURL;?>functions/dashboard.php?case=attendlogin">
                        <input type="hidden" name="latitude" id="latitude">
                        <input type="hidden" name="longitude" id="longitude">
                        <input type="submit" value="Login" class="btn btn-primary btn-block">
                      </form>

                

                      <?php

                    }

                  ?>

                  

                

              </div>

              </div>

              <?php

            }

          }

          if($recentLogin != "")

          {

              ?>

              <!-- /.card-body -->

            

            <!-- PRODUCT LIST -->

            <div class="card">

              <div class="card-header">

                <h3 class="card-title">Recently Login</h3>



                <div class="card-tools">

                  <button type="button" class="btn btn-tool" data-card-widget="collapse">

                    <i class="fas fa-minus"></i>

                  </button>

                  <button type="button" class="btn btn-tool" data-card-widget="remove">

                    <i class="fas fa-times"></i>

                  </button>

                </div>

              </div>



              <!-- /.card-header -->

              <div class="card-body p-0">

                <ul class="products-list product-list-in-card pl-2 pr-2">

                  <?php

                  $table1 = "in_attend_logs AS logs";

                  $table2 = "in_employee AS emp";

                  $value = " emp.in_fname as fname, emp.in_lname as lname, emp.in_photo as photo, logs.in_intime as intime, logs.in_logdate as date ";

                  $match = " emp.in_empid = logs.in_empid ";

                  $cond = " logs.in_logdate='$cdate' and emp.in_compid='$comid' ORDER BY logs.in_sno DESC LIMIT 10 ";

                  $select = new Selectall();

                  $selData = $select->innerAllcond($value,$table1,$table2,$match,$cond);

                  if(!empty($selData))

                  {

                    foreach($selData as $sel)

                    {

                      $profile = $sel['photo'];

                      if($profile != "")

                      {

                        ?>

                        <li class="item">

                        <div class="product-img">

                          <img src="<?php echo BSURL;?>uploads/employee/<?php echo $profile;?>" alt="Profile Image" class="img-size-50">

                        </div>

                        <div class="product-info">

                          <a href="javascript:void(0)" class="product-title"><?php echo $sel['fname']." ".$sel['lname'];?>

                            <span class="badge badge-secondary float-right"><?php echo $sel['intime'];?></span></a>

                          <span class="product-description">

                            <?php echo $sel['date'];?>

                          </span>

                        </div>

                      </li>

                        <?php

                      }

                      else

                      {

                        ?>

                        <li class="item">

                        <div class="product-img">

                          <img src="<?php echo BSURL;?>assets/dist/img/default-150x150.png" alt="Profile Image" class="img-size-50">

                        </div>

                        <div class="product-info">

                          <a href="javascript:void(0)" class="product-title"><?php echo $sel['fname']." ".$sel['lname'];?>

                            <span class="badge badge-secondary float-right"><?php echo $sel['intime'];?></span></a>

                          <span class="product-description">

                            <?php echo $sel['date'];?>

                          </span>

                        </div>

                      </li>

                        <?php

                      }

                      ?>

                      

                      

                      <?php

                    }

                  }

                  else

                  {

                    ?>

                    <li class="item">

                      No Data

                    </li>

                    <?php

                  }

                  

                ?>

                  

                  <!-- /.item -->

                 

                  

                  <!-- /.item -->

                </ul>

              </div>

              <!-- /.card-body -->

              <div class="card-footer text-center">

                <a href="<?php echo VIEW;?>attendance/daily-attendance.php" class="uppercase">View All Logins</a>

              </div>

              <!-- /.card-footer -->

            </div>

            <?php

          }

          $table = "in_employee";

          $cond = " `in_compid`='$comid' AND `in_delete`='1' ";

          $select = new Selectall();

          $allEmp = $select->getallCond($table,$cond);

          if(!empty($allEmp))

          {

            $contEmp = count($allEmp);

          }

          else

          {

            $contEmp = "0";

          }

            ?>

          </div>
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
              $custoff = explode(":", $cmoff);
              
              $cmhours = $custoff[0];
              $cmminus = $custoff[1];
              $cmsecnd = $custoff[2];
              $esttime = date('H:i:s', strtotime("+$cmhours hour +$cmminus minutes +$cmsecnd seconds", strtotime($login)));
              
              
            }
            $breakhours = array();
            $table = "in_empbreak";
            $cond = " `in_comid`='$comid' AND `in_empid`='$empid' AND `in_logdate`='$cdate' ";
            $select = new Selectall();
            $breaks = $select->getallCond($table,$cond);
           
            if(!empty($breaks))
            {
              foreach($breaks as $brk)
              {
                $breakhours[] = $brk['in_totalbreak'];
              }
            }

            $select = new Selectall();
            $logip = $select->loginStatus();

            if($logip != "")
            {

              $intimp = $logip['in_login'];
             
              $tolbrek = AddPlayTime($breakhours);
              $tolbrep = explode(":", $tolbrek);
              $brhour = $tolbrep[0];
              $brmint = $tolbrep[1];
              $brsned = $tolbrep[2];
              $actual = date('H:i:s', strtotime("+$brhour hour +$brmint minutes +$brsned seconds", strtotime($intimp)));
              

              $timediph = gmdate("H:i:s", time()-strtotime($actual));
              $subbrek = explode(':', $timediph);

            }

           function AddPlayTime($times)
            {
                $seconds = 0;
                foreach ($times as $time) {
                    list($hour, $minute, $second) = explode(':', $time);
                    $seconds += $hour * 3600;
                    $seconds += $minute * 60;
                    $seconds += $second;
                }

                $hours = floor($seconds / 3600);
                $seconds -= $hours * 3600;
                $minutes = floor($seconds / 60);
                $seconds -= $minutes * 60;

                return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
            }
            $select = new Selectall();
            $cmnfo = $select->companyInfo();
            $comlun = $cmnfo['in_lunch'];
            $comtea = $cmnfo['in_teatime'];
            $combrek = ($comlun+$comtea);

            $hours = floor($combrek / 60);
            $minutes = floor($hours / 60);
            $seconds = $minutes * 60;
            $realbrk = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);

            $totlbrak = AddPlayTime($breakhours);

          ?>


          <div class="col-lg-9 col-md-9">
            <div class="lookstrip rightinfo">
              <ul class="form-inline">
                  <li>Estimated Logout : <span style="background: #a5b2bf;color: #fff;padding: 0px 9px 1px 9px;border-radius: 3px;"> <?php echo $esttime;?></span></li>
                  <li>Count Down : <span class="estimated" id="actual">00:00:00</span></li>
                  <li>Total Breaks: 
                    <?php
                    if($realbrk < $totlbrak)
                    {
                      ?>
                      <span style="background: #dc3545;color: #fff;padding: 0px 9px 1px 9px;border-radius: 3px;" title="Limit Exceed" class="blinker"><?php echo $totlbrak;?></span>
                      <?php
                    }
                    else
                    {
                      ?>
                      <span style="background: #90c3cb;color: #fff;padding: 0px 9px 1px 9px;border-radius: 3px;" title="In Limit"><?php echo $totlbrak;?></span>
                      <?php
                    }
                    ?>
                    </li>
                  <li>Real Hours : <span style="background: #b19bd9;color: #fff;padding: 0px 9px 1px 9px;border-radius: 3px;" id="realhour">00:00:00</span></li>
                </ul>
            </div>
            

            <div class="row">

              

                <!-- small box -->

                <?php

                switch($empcard)

                {

                  case "empManage":

                  

                  ?>

                  <div class="col-lg-3 col-md-6">

                    <div class="small-box bg-info">

                      <div class="inner">

                        <h3><?php echo $contEmp;?></h3>



                        <p>All Employee</p>

                      </div>

                      <div class="icon">

                        <i class="fas fa-user-tie"></i>

                      </div>

                      <a href="<?php echo VIEW;?>employee/manage-employee.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                    </div>

                  </div>

                  <?php

                  break;

                  case "empAdd":

                  ?>

                  <div class="col-lg-3 col-md-6">

                    <div class="small-box bg-info">

                      <div class="inner">

                        <h3><i class="fas fa-users"></i></h3>



                        <p>Add Employee</p>

                        

                      </div>

                      <div class="icon">

                        <i class="fas fa-users"></i>

                      </div>

                      <a href="<?php echo VIEW;?>employee/add-employee.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                    </div>

                  </div>

                  <?php

                  break;

                  case "staticReport":

                  ?>

                  <div class="col-lg-3 col-md-6">

                    <div class="small-box bg-info">

                      <div class="inner">

                        <h3><i class="fas fa-chart-pie"></i></h3>



                        <p>Static Report</p>

                        

                      </div>

                      <div class="icon">

                        <i class="fas fa-chart-pie"></i>

                      </div>

                      <a href="<?php echo VIEW;?>attendance/static-report.php?id=<?php echo $empid?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                    </div>

                  </div>

                  <?php

                  break;

                }

                $table = "in_emp_attend";

                $inner = " DISTINCT `in_empid` ";

                $cond = " `in_comid`='$comid' AND `in_logdate`='$cdate' ";

                $select = new Selectall();

                $attEmp = $select->getallInnercond($table,$inner,$cond);

                if(!empty($attEmp))

                {

                  $presetEmp = count($attEmp);

                  $absentEmp = ($contEmp - $presetEmp);

                  $persnt = round($presetEmp/$contEmp*100);

                }

                else

                {

                  $presetEmp = "0";

                  $absentEmp = $contEmp;

                  $persnt = "";

                }

                switch($attend)

                {

                  case "manageAttend":



                ?>

                <div class="col-lg-3 col-md-6">

                  <div class="small-box bg-success">

                    <div class="inner">

                      <h3><?php echo $presetEmp;?><sup><small>P</small></sup>/<?php echo $absentEmp;?><sup><small>A</small></sup></h3>



                      <p class="mb-0">Attendance <?php echo $persnt;?>%</p>

                      <div class="progress border">

                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width:<?php echo $persnt;?>%"></div>

                      </div>

                    </div>

                    <div class="icon">

                      <i class="fas fa-male"></i>

                    </div>

                    <a href="<?php echo VIEW;?>attendance/daily-attendance.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                  </div>

                </div>

                  <?php

                  break;

                  case "myAttendance";

                  ?>

                  <div class="col-lg-3 col-md-6">

                    <div class="small-box bg-success">

                      <div class="inner">

                        <h3><i class="fas fa-user"></i></h3>



                        <p>My Attendance</p>

                        

                      </div>

                      <div class="icon">

                        <i class="fas fa-user"></i>

                      </div>

                      <a href="<?php echo VIEW;?>attendance/my-attendance.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                    </div>

                  </div>

                  <?php

                  break;

                  case "monthReport":

                  ?>

                  <div class="col-lg-3 col-md-6">

                    <div class="small-box bg-success">

                      <div class="inner">

                        <h3><i class="fas fa-user"></i></h3>



                        <p>Monthly Report</p>

                        

                      </div>

                      <div class="icon">

                        <i class="fas fa-user"></i>

                      </div>

                      <a href="<?php echo VIEW;?>attendance/monthly-report.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                    </div>

                  </div>

                  <?php

                  break;

                  

                

                }

                switch($salcard)

                {

                  case "salaryReport":

                  ?>

                  <div class="col-lg-3 col-md-6">

                    <div class="small-box bg-warning">

                      <div class="inner">

                        <h3><i class="fas fa-coins"></i></h3>



                        <p>Salary Report</p>

                        

                      </div>

                      <div class="icon">

                        <i class="fas fa-coins"></i>

                      </div>

                      <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                    </div>

                  </div>

                  <?php

                  break;

                  case "postedSalary":

                  ?>

                  <div class="col-lg-3 col-md-6">

                    <div class="small-box bg-warning">

                      <div class="inner">

                        <h3><i class="fas fa-donate"></i></h3>



                        <p>Posted Salary</p>

                        

                      </div>

                      <div class="icon">

                        <i class="fas fa-donate"></i>

                      </div>

                      <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                    </div>

                  </div>

                  <?php

                  break;

                  case "salaryCreation":

                  ?>

                  <div class="col-lg-3 col-md-6">

                    <div class="small-box bg-warning">

                      <div class="inner">

                        <h3><i class="fas fa-file-invoice"></i></h3>



                        <p>Salary Creation</p>

                        

                      </div>

                      <div class="icon">

                        <i class="fas fa-file-invoice"></i>

                      </div>

                      <a href="<?php echo VIEW;?>payroll/salary-creation.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                    </div>

                  </div>

                  <?php

                  break;

                }

                switch($levcard)

                {

                  case "leaveBalance":

                  ?>

                  <div class="col-lg-3 col-md-6">

                    <div class="small-box bg-danger">

                      <div class="inner">

                        <h3><i class="fas fa-gifts"></i></h3>



                        <p>Balance Leave</p>

                        

                      </div>

                      <div class="icon">

                        <i class="fas fa-gifts"></i>

                      </div>

                      <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                    </div>

                  </div>

                  <?php

                  break;

                  case "leaveApply":

                  ?>

                  <div class="col-lg-3 col-md-6">

                    <div class="small-box bg-danger">

                      <div class="inner">

                        <h3><i class="fas fa-glass-cheers"></i></h3>



                        <p>Apply Leave</p>

                        

                      </div>

                      <div class="icon">

                        <i class="fas fa-glass-cheers"></i>

                      </div>

                      <a href="<?php echo VIEW?>leaves/apply-leave.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                    </div>

                  </div>

                  <?php

                  break;

                  case "leaveApproval":

                  ?>

                  <div class="col-lg-3 col-md-6">

                    <div class="small-box bg-danger">

                      <div class="inner">

                        <h3><i class="fas fa-mug-hot"></i></h3>



                        <p>Leaves Approval</p>

                        

                      </div>

                      <div class="icon">

                        <i class="fas fa-mug-hot"></i>

                      </div>

                      <a href="<?php echo VIEW?>approvals/leave-approval.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                    </div>

                  </div>

                  <?php

                  break;

                }

                ?>

              

              

              <section class="col-lg-7 col-md-7 connectedSortable ui-sortable">

                <!-- Custom tabs (Charts with tabs)-->

                <?php

                  switch($rptcard)

                  {

                    case "todayReports":

                    ?>

                    <div class="card ">

                      <div class="card-header ui-sortable-handle" style="cursor: move;">

                        <h3 class="card-title">

                          <i class="fas fa-chart-pie mr-1"></i>

                          Today Reports

                        </h3>

                        <div class="card-tools">

                        <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">

                          <i class="fas fa-minus"></i>

                        </button>

                        <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">

                          <i class="fas fa-times"></i>

                        </button>

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

                    <?php

                    break;

                    case "emplReport":

                    ?>

                    <div class="card">

                        <div class="card-header ui-sortable-handle" style="cursor: move;">

                          <h3 class="card-title">

                            <i class="fas fa-chart-pie mr-1"></i>

                            My Monthly Reports

                          </h3>

                          <div class="card-tools">

                      <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">

                        <i class="fas fa-minus"></i>

                      </button>

                      <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">

                        <i class="fas fa-times"></i>

                      </button>

                    </div>

                          

                        </div><!-- /.card-header -->

                        <div class="card-body p-0">

                          <div class="tab-content ">

                            <!-- Morris chart - Sales -->

                            

                            <div class="card-body">

                              <canvas id="donutChart1" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>

                            </div>

                          </div>

                        </div><!-- /.card-body -->

                      </div>

                    <?php

                    break;
                    case "walloFame":
                    ?>
                    <div class="wallofame">
                      
                      <div class="row">
                        <div class="col-lg-12 col-md-12">
                          <div class="progress proheader">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width:100%">Wall Of Fame</div>
                          </div>
                        </div>
                        

                      </div>
                      <div class="row">
                        <?php 
                        $month = date('F', strtotime(date('Y-m')));
                        
                        $table = "in_starmonth";
                        $cond = " `in_month`='$month' AND `in_status`='1' ";
                        $select = new Selectall();
                        $mons = $select->getallCond($table,$cond);
                       
                        if(!empty($mons))
                        {
                          foreach($mons as $mn)
                          {
                            $mnid = $mn['in_empid']; 
                            $table = "in_employee";
                            $cond = " `in_compid`='$comid' AND `in_empid`='$mnid' AND `in_delete`='1' ";
                            $select = new Selectall();
                            $res = $select->getcondData($table,$cond);
                            if($res != "")
                            {
                              $proimage = "uploads/employee/".$res['in_photo'];
                            }
                            else
                            {
                              $proimage = "assets/dist/img/user2-160x160.jpg";
                            }
                            ?>
                            <div class="col-lg-6 col-md-6">
                              <div class="wall-card">
                                <div class="wall-head"><?php $strype = $mn['in_startype']; echo $strype == "monthStar" ? "Employee of the Month":"Rising Star of the Month"; ?> </div>
                                <div class="wall-body">

                                  <div class="wall-img mt-2">
                                    
                                     <img class="profile-user-img img-fluid " src="<?php echo BSURL;?><?php echo $proimage;?>" alt="User profile picture">
                                  </div>
                                 <div class="wall-content ">
                                  
                                      <table width="100%">
                                        <tr>
                                          <th><?php echo $res['in_empid'];?></th>
                                        </tr>
                                        <tr>
                                          <th><?php echo $res['in_fname'].' '.$res['in_lname'];?></th>
                                        </tr>
                                      </table>
                                      <div class="dropdown-divider"></div>
                                  </div>
                                </div>
                              </div>  
                            </div>
                            <?php
                          }
                        }
                        ?>
                        
                      </div>
                    </div>
                    <?php
                    break;

                  }

                ?>

                

            <!-- /.card -->

          </section>



          <section class="col-lg-5 col-md-5">

            <?php

            if($holcard != "")

            {

              ?>

              <div class="card card-dark card-outline" style="background: #d3e1e3;">

              

              <!-- /.card-header -->

              <div class="card-body">

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                  

                  <div class="carousel-inner">

                    <div class="carousel-item active">

                      <div class="dashints">

                        <h3>Annual Holidays</h3>

                        <span>inoday Inc</span>

                      </div>

                    </div>

                    <?php

                      $table = "in_holidays";

                      $cond = " `in_comid` IN ('$comid', '0') AND `in_status`='1' AND `in_leaveyear`='$ydate' ORDER BY `in_leavedate` ASC";

                      $select = new Selectall();

                      $holi = $select->getallCond($table,$cond);

                      if(!empty($holi))

                      {



                      foreach($holi as $hl)

                      {

                        ?>

                        <div class="carousel-item">

                          <div class="dashints">

                            <h3><?php echo $hl['in_leavname'];?></h3>

                            <span><?php echo $hl['in_leavedate'];?> (<?php echo $hl['in_leaveday'];?>)</span>

                          </div>

                          

                        </div>

                        <?php

                      }

                    }

                    ?>

                    

                    

                  </div>

                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">

                    <span class="carousel-control-custom-icon" aria-hidden="true">

                      <i class="fas fa-caret-left"></i>

                    </span>

                    <span class="sr-only">Previous</span>

                  </a>

                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">

                    <span class="carousel-control-custom-icon" aria-hidden="true">

                      <i class="fas fa-caret-right"></i>

                    </span>

                    <span class="sr-only">Next</span>

                  </a>

                </div>

              </div>

              <!-- /.card-body -->

            </div>

            <!-- /. Holiday card -->

              <?php

            }

            if($evencard != "")

            {

              ?>

              <!-- Calendar -->

            <div class="card">

              <div class="card-header">



                <h3 class="card-title">

                  <i class="far fa-calendar-alt"></i>

                  Upcoming Events

                </h3>

                <!-- tools card -->

                <div class="card-tools">

                  <!-- button with a dropdown -->

                  

                  <button type="button" class="btn btn-secondary btn-sm" data-card-widget="collapse">

                    <i class="fas fa-minus"></i>

                  </button>

                  <button type="button" class="btn btn-danger btn-sm" data-card-widget="remove">

                    <i class="fas fa-times"></i>

                  </button>

                </div>

                <!-- /. tools -->

              </div>

              <!-- /.card-header -->

              <div class="card-body p-1">

                <div id="eventcalander" class="carousel slide" data-ride="carousel" data-interval="false">

                  

                  <div class="carousel-inner">

                    

                   

                   <?php

                    for($cs=1;$cs<=12;$cs++)

                    {

                      $phir = date("Y-$cs");

                      $msdate = date('F', strtotime($phir));
                      


                      ?>

                      <div class="carousel-item <?php echo $cs == $mdate ? 'active' : '';?>">

                      <div class="dashevent mb-3">

                        <h3><?php echo $msdate;?></h3>

                      </div>

                      

                      <ul class="products-list product-list-in-card pl-2 pr-2 eventbody">



                        <?php

                        

                        $dash = new Dashboard();

                        $bird = $dash->upcomingBirthday($cs);

                        if(!empty($bird))

                        {

                          foreach($bird as $brd)

                          {

                            $profile = $brd['profile'];

                            $birth = $brd['birthdate'];
                           

                            $cbirth = date('Y').substr($birth, 4);

                            if($profile != "")

                            {

                              $imgpro = BSURL."uploads/employee/".$profile;

                            }

                            else

                            {

                              $imgpro = BSURL."assets/dist/img/default-150x150.png";

                            }

                            ?>

                            

                            <li class="item">

                            <div class="product-img">

                              <img src="<?php echo $imgpro;?>" alt="Profile Image" class="img-size-50">

                            </div>

                            <div class="product-info">

                              <a href="javascript:void(0)" class="product-title"><?php echo $brd['fulname'];?>

                                </a>

                              <span class="product-description">

                                Happy Birthday : <?php echo date('d, D F', strtotime($cbirth));?>
                                

                              </span>

                            </div>

                          </li>

                        

                            <?php

                          }

                        }

                        ?>

                      

                        <?php

                        $dash = new Dashboard();

                        $aniv = $dash->upcomingAniversary($cs);

                        if(!empty($aniv))

                        {

                          foreach($aniv as $ani)

                          {
                            
                            $profiled = $ani['profile'];

                            $aniver = $ani['aniversary'];

                            $caniver = date('Y').substr($aniver, 4);
                            

                            $ages = date_diff(date_create($aniver), date_create($cdate))->y;

                            if($ages != "0")
                            {

                              if($profiled != "")

                              {

                                $imgpros = BSURL."uploads/employee/".$profiled;

                              }

                              else

                              {

                                $imgpros = BSURL."assets/dist/img/default-150x150.png";

                              }

                              ?>

                              <li class="item">

                                <div class="product-img">

                                  <img src="<?php echo $imgpros;?>" alt="Profile Image" class="img-size-50">

                                </div>

                                <div class="product-info">

                                  <a href="javascript:void(0)" class="product-title"><?php echo $ani['fulname'];?> (<?php echo $ages+1;?>)

                                    </a>

                                  <span class="product-description">

                                    Anniversary : <?php echo date('d, D F', strtotime($caniver));?>

                                  </span>

                                </div>

                              </li>

                              <?php

                            }

                            

                            

                          }

                        }

                       

                        ?>

                        

                        

                      </ul>

                    

                    </div>

                      <?php

                    }

                   ?>



                    

                  </div>

                  <a class="carousel-control-prev prevent text-dark" href="#eventcalander" role="button" data-slide="prev">

                    <span class="carousel-control-custom-icon" aria-hidden="true">

                      <i class="fas fa-caret-left"></i>

                    </span>

                    <span class="sr-only">Previous</span>

                  </a>

                  <a class="carousel-control-next prevent text-dark" href="#eventcalander" role="button" data-slide="next">

                    <span class="carousel-control-custom-icon" aria-hidden="true">

                      <i class="fas fa-caret-right"></i>

                    </span>

                    <span class="sr-only">Next</span>

                  </a>

                </div>

              </div>

              <!-- /.card-body -->

            </div>

              <?php

            }

            ?>

            

            

          </section>

            </div> <!-- /. close inner small box row -->

            <?php

            if($teamcard != "")

            {

              ?>

              <div class="row">

              <div class="col-md-12">

                <div class="card">

                    <div class="card-header">

                      SOD & EOD Reports

                      <div class="card-tools">

                <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">

                  <i class="fas fa-minus"></i>

                </button>

                <button type="button" class="btn bg-danger btn-sm" data-card-widget="remove">

                  <i class="fas fa-times"></i>

                </button>

              </div>

                    </div>



                    <div class="card-body">

                      <div class="timeline">

                  <!-- timeline time label -->

                  <div class="time-label">

                    <span class="bg-red"><?php echo date('d F');?></span>

                  </div>

                  <!-- /.timeline-label -->

                  <?php

                  $table1 = "in_teamtask AS task";

                  $table2 = "in_employee AS emp";

                  $value = " emp.in_fname as fname, emp.in_lname as lname, task.in_project as project, task.in_reportype as rtype, task.in_primaryman as assignby, task.in_anyremarks as details, task.in_complete as complete ";

                  $match = " emp.in_empid = task.in_empid ";

                  $cond = " task.in_sodeodate='$cdate' and emp.in_compid='$comid' ORDER BY task.in_sno DESC LIMIT 10 ";

                  $select = new Selectall();

                  $sepData = $select->innerAllcond($value,$table1,$table2,$match,$cond);

                  if($sepData != "")

                  {

                    foreach($sepData as $sep)

                    {

                      ?>

                      <div>

                        <i class="fas fa-database bg-blue"></i>

                        <div class="timeline-item">

                          <span class="time"><i class="fas fa-chart-line"></i> <?php echo $sep['complete'];?></span>

                          <h3 class="timeline-header"><b><?php echo $sep['fname']." ".$sep['lname'];?></b> <small><b class="text-primary"><?php echo $sep['project'];?></b> Assign By : <?php echo $sep['assignby'];?></small></h3>



                          <div class="timeline-body">

                            <?php echo $sep['details'];?>

                          </div>

                          

                        </div>

                      </div>

                      <?php

                    }

                  }

                  ?>

              <!-- timeline item -->

              

              <!-- END timeline item -->

              </div>

                    </div>                  

                </div>

            </div>

          </div>

              <?php

            }

            ?>

            

          

        </div>

        

      </div><!-- /.container-fluid -->

    </section>

    <!-- /.content -->



  </div>

  <!-- /.content-wrapper -->

<script type="text/javascript">
  //realhour

  var realhour = document.getElementById('realhour');

  

  var secondt = 0, minutet = 0, hourt = 0, q;

  secondt = "<?php echo @$subbrek[2];?>";

  minutet = "<?php echo @$subbrek[1];?>";

  hourt = "<?php echo @$subbrek[0];?>";



  function addon() {

      secondt++;

      if (secondt >= 60) {

          secondt = 0;

          minutet++;

          if (minutet >= 60) {

              minutet = 0;

              hourt++;

          }

      }

      

      realhour.innerHTML = (hourt ? (hourt > 9 ? hourt : hourt) : "00") + ":" + (minutet ? (minutet > 9 ? minutet : minutet) : "00") + ":" + (secondt > 9 ? secondt : "0" + secondt);



      timerq();

  }

  function timerq() {

      q = setTimeout(addon, 1000);

  }

  timerq();

  realhour.innerHTML = "<?php echo @$timediph;?>";   

</script>

<script type="text/javascript">
  

  var h1 = document.getElementById('timer');

  

  var seconds = 0, minutes = 0, hours = 0, t;

  seconds = "<?php echo @$subtime[2];?>";

  minutes = "<?php echo @$subtime[1];?>";

  hours = "<?php echo @$subtime[0];?>";



  function add() {

      seconds++;

      if (seconds >= 60) {

          seconds = 0;

          minutes++;

          if (minutes >= 60) {

              minutes = 0;

              hours++;

          }

      }

      

      h1.innerHTML = (hours ? (hours > 9 ? hours : hours) : "00") + ":" + (minutes ? (minutes > 9 ? minutes : minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);



      timer();

  }

  function timer() {

      t = setTimeout(add, 1000);

  }

  timer();

  h1.innerHTML = "<?php echo @$timediff;?>";   

</script>


 <script type="text/javascript">

  $(document).ready(function(){

      var donutChartCanvas = $('#donutChart').get(0).getContext('2d')

        var donutData        = {

          labels: [

              'Today Present',

              'Today Absent',

              'Today Leave',

              

          ],

          datasets: [

            {

              data: [<?php echo $presetEmp;?>,<?php echo $absentEmp;?>,0],

              backgroundColor : ['#00a65a', '#f56954', '#f39c12'],

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
  function getLocation() {
    
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
      alert("Geolocation is not supported by this browser.");
    }
  }

  function showPosition(position) {
    var latit = position.coords.latitude;
    var longi = position.coords.longitude;
    // console.log(latit);
    $("#latitude").val(latit);
    $("#longitude").val(longi);
    $("#latitude_out").val(latit);
    $("#longitude_out").val(longi);
  }

//   function showError(error) {
//   switch(error.code) {
//     case error.PERMISSION_DENIED:
//       alert("User denied the request for Geolocation.");
//       break;
//     case error.POSITION_UNAVAILABLE:
//       alert("Location information is unavailable.");
//       break;
//     case error.TIMEOUT:
//       alert("The request to get user location timed out.");
//       break;
//     case error.UNKNOWN_ERROR:
//       alert("An unknown error occurred.");
//       break;
//   }
// }

</script>


<script type="text/javascript">

  $(document).ready(function(){

      var donutChartCanvas = $('#donutChart1').get(0).getContext('2d')

        var donutData        = {

          labels: [

              'Today Present',

              'Today Absent',

              'Today Leave',

              

          ],

          datasets: [

            {

              data: [<?php echo $presetEmp;?>,<?php echo $absentEmp;?>,0],

              backgroundColor : ['#00a65a', '#f56954', '#f39c12'],

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




<script src="<?php echo BSURL;?>assets/dist/js/pages/dashboard.js"></script>

 <?php
include_once 'autoclass.php';
include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/footer.php';

?>