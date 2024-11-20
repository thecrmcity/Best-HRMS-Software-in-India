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
              <a href="<?php echo VIEW.$pagename."/".$siteaim?>.php" class="btn-sm btn-primary ml-3"><i></i> Exit Search</a>
              <?php
            }
            ?>
            </div>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><span onclick="history.back()" class="badge badge-danger" style="cursor: pointer;"><i class="fas fa-arrow-left"></i> Back</span></li>


              <li class="breadcrumb-item"><a href="<?php echo BSURL;?>views/dashboard/"><i class="fas fa-home"></i> Home</a></li>

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
                
              </div>

            </div>

            <div class="table-responsive emptable">

              <table class="table table-bordered table-striped">

                <thead class="sticky-top">

                  <tr class="bg-secondary">

                  <th class="fixcolumn1">EmployeeID</th>

                  <th class="fixcolumn2">Employee_Name</th>

                  <?php
                  if(isset($_GET['s']))
                    {
                      $s = $_GET['s'];
                      $cyer = date('Y', strtotime($cdate));

                      $cmon = date('m', strtotime($s));

                      $mdays = date('t', strtotime($s));

                    }
                    else
                    {
                      $cyer = date('Y', strtotime($cdate));

                      $cmon = date('m', strtotime($cdate));

                      $mdays = date('t', strtotime($cdate));
                    }

                    

                    for($i=1;$i<=$mdays;$i++)

                    {

                      $csday = $cyer."-".$cmon."-".$i;

                      $csdayd = date('l', strtotime($csday));

                      ?>

                      <th colspan="3" class="text-center"><?php echo $i."/".$cmon."/".$cyer?><small> (<?php echo $csdayd;?>)</small></th>

                      <?php

                    }

                  ?>

                  <th>Month</th>

                  <th>Days</th>

                  <th>Total_Hours</th>

                  <th>Full_Day</th>

                  <th>Half_Day</th>

                  <th>Weekoff+Holiday</th>

                  <th>Working_Days</th>

                  <th>Leave_Takken</th>

                  <th>AbsentDays</th>

                  <th>Late_Count</th>

                  <th>Payble_Days</th>

                </tr>

                <tr class="bg-light">

                  <th colspan="2"></th>

                  

                  <?php

                    // $mdays = date('t', strtotime($cdate));

                    for($i=1;$i<=$mdays;$i++)

                    {

                      ?>

                      <th>In_Time</th>

                      <th>Out_Time</th>

                      <th>Total_Time</th>

                      <?php

                    }

                  ?>

                  <th colspan="11"></th>

                </tr>

                </thead>

                <tbody>

                  <?php

                    $select = new Selectall();

                    $comInfo = $select->companyInfo();

                    $comintime = $comInfo['in_intime'];

                    $px = 1;

                    if(isset($_GET['s']) && !isset($_GET['e']))
                    {
                      $s = $_GET['s'];
                      $cmon = date('F',strtotime($s));

                      $table = "in_monthly_attend";

                      $cond = " `in_month`='$cmon' AND `in_year`='$ydate'";

                      $select = new Selectall();

                      $selData = $select->getallCond($table,$cond);

                    }
                    else if(isset($_GET['s']) && isset($_GET['e']))
                    {
                      $s = $_GET['s'];
                      $cmon = date('F',strtotime($s));

                      $e = $_GET['e'];

                      $table = "in_monthly_attend";

                      $cond = " `in_month`='$cmon' AND `in_year`='$ydate' AND (`in_empid` LIKE '%$e%' OR `in_fname` LIKE '%$e%' OR `in_lname` LIKE '%$e%' )";

                      $select = new Selectall();

                      $selData = $select->getallCond($table,$cond);

                    }
                    else if(!isset($_GET['s']) && isset($_GET['e']))
                    {
                      $cmon = date('F',strtotime($cdate));

                      $e = $_GET['e'];

                      $table = "in_monthly_attend";

                      $cond = " `in_month`='$cmon' AND `in_year`='$ydate' AND (`in_empid` LIKE '%$e%' OR `in_fname` LIKE '%$e%' OR `in_lname` LIKE '%$e%' )";

                      $select = new Selectall();

                      $selData = $select->getallCond($table,$cond);

                    }
                    else
                    {
                      $cmon = date('F',strtotime($cdate));

                      $table = "in_monthly_attend";

                      $cond = " `in_month`='$cmon' AND `in_year`='$ydate'";

                      $select = new Selectall();

                      $selData = $select->getallCond($table,$cond);
                      
                    }

                    

                    
                  if(!empty($selData))
                  {
                    foreach($selData as $sel)

                    {

                      $emi = $sel['in_empid'];

                      $pr = $sel['in_preid'];

                      $select = new Selectall();

                      $pres = $select->prefix($pr);



                      ?>

                      <tr>

                        

                        <td class="fixcolumn1"><?php echo $pres.$sel['in_empid'];?></td>

                        <td class="fixcolumn2"><?php echo $sel['in_fname']." ".$sel['in_lname'];?></td>

                        <?php

                        $ct =1;

                        $lt = 1;

                        $hli = 1;

                        $leav = 1;

                        $workon = 1;

                        if(isset($_GET['s']))
                        {
                          $s = $_GET['s'];
                          $cyer = date('Y', strtotime($cdate));

                          $cmon = date('m', strtotime($s));

                          $mdays = date('t', strtotime($s));

                        }
                        else
                        {
                          $cyer = date('Y', strtotime($cdate));

                          $cmon = date('m', strtotime($cdate));

                          $mdays = date('t', strtotime($cdate));
                        }

                        

                        for($i=1;$i<=$mdays;$i++)

                        {

                          $wday = $cyer."-".$cmon."-".$i;

                          $wsday = date('l', strtotime($wday));

                          $intime = "in_{$i}_in";

                          $pintime = $sel[$intime];

                          // -------------------- Over Loading Script --------------------------



                          $holis = 0;

                          $table = "in_holidays";

                          $cond = " `in_leavedate`='$wday' AND `in_status`='1'";

                          $select = new Selectall();

                          $holi = $select->getcondData($table,$cond);

                          

                          if($holi != "")

                          {

                            $wsday = "<small>".$holi['in_leavname']."</small>";

                            $holis = $hli++;

                            

                          }

                          else

                          {

                            $table = "in_weekoff";
                            $cond = " `in_comid`='$comid' AND `in_days`='$wsday' AND `in_status`='1' ";
                            $select = new Selectall();
                            $weest = $select->getcondData($table,$cond);
                            if($weest != "")
                            {
                              $wsday = "<span class='far fa-calendar-times'> OFF</span>";

                              $res = $ct++;
                            }
                            else
                            {
                              $wsday = "";
                            }

                            

                          }

                          // --------------------- Over Loading Script End -------------------------------

                          

                          

                          ?>

                          <td><?php  if($pintime === "0000-00-00 00:00:00"){echo "$wsday";

                          $leve = $leav++;

                          }else{ echo date('H:i:s',strtotime($pintime));}

                          if($comintime < $pintime)

                          {

                            $let = $lt++;

                          }

                          

                          ?></td>

                          <td><?php $outime = "in_{$i}_out";if($sel[$outime] === "0000-00-00 00:00:00"){echo "$wsday";}else{ echo date('H:i:s',strtotime($sel[$outime]));}?></td>

                          <td><?php $hours = "in_{$i}_hours";if($sel[$hours] === ""){echo "$wsday";}else{ echo date('H:i:s', strtotime($sel[$hours]));}?></td>

                          <?php

                         

                        }

                        $fwd = $sel['in_days'];

                        $hwd = $sel['in_half'];

                        $fhwd = $fwd+$hwd;

                        $wd = $mdays-($res+$holis);



                        $table = "in_applyleaves";

                        $cond = " `in_comid`='$comid' AND `in_empid`='$emi' AND MONTH(in_startdate)='$mdate' AND`in_approvstatus`='1' AND `in_leaveid`!='6' ";

                        $select = new Selectall();

                        $leaved = $select->getallCond($table,$cond);

                        $totlev = array();

                        if(!empty($leaved))

                        {

                          foreach($leaved as $lved)

                          {

                            $totlev[] = $lved['in_applyday'];

                            

                          }

                         

                        }

                        $tekkenlev = array_sum($totlev);



                      ?>

                      <td><?php echo date('F', strtotime($cdate));?></td>

                      <td><?php echo date('t', strtotime($cdate));?></td>



                      <td><?php echo $sel['in_totalhours'];?></td>

                      <td><?php echo $sel['in_days'];?></td>

                      <td><?php echo $sel['in_half'];?></td>

                      <td><?php echo $res."+".$holis." = ".($res+$holis);?></td>

                      <td><?php echo $fhwd; ?></td>

                      <td><?php echo $tekkenlev;?></td>

                      <td><?php echo $wd-$fhwd-$tekkenlev;?></td>

                      <td><?php echo $let;?></td>

                      <td><?php echo $holis+$res+$fhwd+$tekkenlev?></td>

                      </tr>

                      <?php

                      $px++;

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