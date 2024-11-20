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
            <h4 class="m-0"><?php echo ucwords($sitename);?></h4>
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
        
        <div class="card rounded-0">
          <div class="card-header">
            <div class="card-title"><?php echo date('F Y');?></div>
            <div class="card-tools">
              <!-- <form class="form-inline" method="GET">
                <div class="input-group">
                  <select class="form-control" required name="pays">
                  
                  <option value="">--Select--</option>
                  <?php
                  $table = "in_payscale";
                  $cond = " `in_comid`='$comid' AND `in_category`='payscale' AND `in_status`='1' ";
                  $select = new Selectall();
                  $stucture = $select->getallCond($table,$cond);
                  if(!empty($stucture))
                  {
                    foreach($stucture as $struc)
                    {

                      ?>
                      <option value="<?php echo $struc['in_sno'];?>"><?php echo $struc['in_namescle'];?></option>
                      <?php
                    }
                  }
                  ?>
                  
                </select>
                    <div class="input-group-append">
                      <button type="submit" class="input-group-text"><i class="fas fa-search"></i> </button>
                    </div>
                  </div>
                
              </form> -->
            </div>
          </div>
          <div class="card-body">
            <div class="row mb-2">
              <div class="col-lg-6 col-md-6">
                <form class="form-inline" method="GET">
                  <?php
                  if(isset($_GET['s']))
                  {
                    $s = $_GET['s'];
                    ?>
                    <input type="hidden" name="s" value="<?php echo $s;?>">

                    <?php
                  }
                  else
                  {
                    $s = date('F',strtotime($cdate));
                    ?>
                    <input type="hidden" name="s" value="<?php echo $s;?>">
                    <?php
                  }
                  ?>
                  <div class="input-group">
                    <input type="text" name="find" class="form-control form-control-sm" placeholder="Employee Name...">
                    <div class="input-group-append">
                      <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="clearfix">
                  <form class="form-inline float-right" method="GET">
                    <div class="input-group">
                      <select class="form-control form-control-sm" required name="s">
                      
                      <option value="">--Select--</option>
                      <?php
                      $table = "in_monthly_attend";
                      $inner = " DISTINCT in_month";
                      $cond = " `in_comid`='$comid' ";
                      $select = new Selectall();
                      $months = $select->getallInnercond($table,$inner,$cond);
                      if(!empty($months))
                      {
                        foreach($months as $mons)
                        {
                          ?>
                          <option value="<?php echo $mons['in_month'];?>"><?php echo $mons['in_month'];?></option>
                          <?php
                        }
                      }
                      ?>
                      
                    </select>
                        <div class="input-group-append">
                          <button type="submit" class="input-group-text"><i class="fas fa-search"></i> </button>
                        </div>
                      </div>
                
              </form>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <th>No</th>
                  <th>EmpID</th>
                  <th>EmployeeName</th>
                  <th>PresentDay</th>
                  <th>AbsentDay</th>
                  <th>PayableDay</th>
                  <th>GrossSalary</th>
                  <th>TotalDeduction</th>
                  <th>TotalEarning</th>
                  <th>NetAmount</th>
                </thead>
                <tbody>
                  <?php

                  if(isset($_GET['s']))
                  {
                    $s = $_GET['s'];
                  }
                  else
                  {
                    $s = date('F',strtotime($cdate));
                  }
                  if(isset($_GET['find']))
                  {
                    $find = $_GET['find'];
                    $cmon = $s;
                    $mon = date('t', strtotime($cmon));
                    $table = "in_monthly_attend";
                    $cond = " `in_month`='$cmon' AND `in_year`='$ydate' AND (`in_fname` LIKE '%$find%' OR `in_lname` LIKE '%$find%')";
                    $select = new Selectall();
                    $pday = $select->getallCond($table,$cond);
                  }
                  else
                  {
                    $cmon = $s;
                    $mon = date('t', strtotime($cmon));
                    $table = "in_monthly_attend";
                    $cond = " `in_month`='$cmon' AND `in_year`='$ydate'";
                    $select = new Selectall();
                    $pday = $select->getallCond($table,$cond);
                  }
                    
                    
                    
                    $ct =1;
                    $lt = 1;
                    $hli = 1;
                    $leav = 1;
                    $workon = 1;
                    
                    $cyer = date('Y', strtotime($cdate));
                    $cmon = date('m', strtotime($cdate));
                    $mdays = date('t', strtotime($cdate));
                    for($i=1;$i<=$mdays;$i++)
                    {
                      $wday = $cyer."-".$cmon."-".$i;
                      $wsday = date('l', strtotime($wday));
                      
                      // -------------------- Over Loading Script --------------------------

                      

                      $table = "in_holidays";
                      $cond = " `in_leavedate`='$wday' AND `in_status`='1' ";
                      $select = new Selectall();
                      $holi = $select->getcondData($table,$cond);

                      if($holi != "")
                      {
                        $holis = 0;                
                        $holis = $hli++;
                        
                      }
                      else
                      {
                        
                        if($wsday == "Saturday")
                        {
                          $res = $ct++;
                        }
                        elseif($wsday == "Sunday")
                        {
                          $res = $ct++;
                        }
                        else
                        {
                          $wsday = "";
                        }
                      }
                      }

                      // --------------------- Over Loading Script End -------------------------------
                      
                         
                      $pfarray = array();
                      $esiarry = array();
                      $totalctc = array();
                      $netvalue = array();    
                      $totlev = array();
                    if(!empty($pday))
                    {
                      $xl =1;
                      foreach($pday as $rs)
                      {
                        $fwd = $rs['in_days'];
                        $hwd = $rs['in_half'];
                        $fhwd = $fwd+$hwd;
                        $wd = $mdays-($res+$holis); 
                        $ps = $rs['in_preid'];
                        $prs = $select->prefix($ps);

                        $emi = $rs['in_empid'];

                        $table = "in_applyleaves";
                        $cond = " `in_comid`='$comid' AND `in_empid`='$emi' AND MONTH(in_startdate)='$mdate' AND`in_approvstatus`='1' AND `in_leaveid`!='6' ";
                        $select = new Selectall();
                        $leaved = $select->getallCond($table,$cond);
                        
                        if(!empty($leaved))
                        {
                          foreach($leaved as $lved)
                          {
                            $totlev[] = $lved['in_leavedays'];
                            
                          }
                         
                        }
                        $tekkenlev = array_sum($totlev);
                        
                        $table = "in_employee";
                        $cond = " `in_compid`='$comid' AND `in_empid`='$emi' ";
                        $select = new Selectall();
                        $psd = $select->getcondData($table,$cond);
                        if($psd != "")
                        {
                          $pay = $psd['in_payscale'];

                        }
                        

                        $table = "in_salarysetup";
                        $cond = " `in_comid`='$comid' AND `in_payscale`='$pay' AND `in_status`='1' ";
                        $select = new Selectall();
                        $salary = $select->getallCond($table,$cond);

                        if(!empty($salary))
                        {
                         
                          $pfarray = array();
                          $esiarry = array();
                          $ctc = $psd['in_salary'];
                          foreach($salary as $sal)
                          {

                            $compoid = $sal['in_compoid'];
                            $table = "in_payscale";
                            $cond = " `in_sno`='$compoid' ";
                            $select = new Selectall();
                            $cm = $select->getcondData($table,$cond);
                            if($cm != "")
                            {
                              $comname = $cm['in_namescle'];
                              $comcat = $cm['in_category'];
                            }
                            else
                            {
                              $comname = "";
                              $comcat = "";

                            }


                            $flat = $sal['in_flatamount'];
                            $parc = $sal['in_percentage'];
                            $esi = $sal['in_esi'];
                            $pef = $sal['in_pf'];
                            $base = $sal['in_calcubase'];
                            
                            if($comcat == "deduction")
                            {
                              if($flat != "")
                              {
                                $basdedu = $flat;
                                
                              }
                              else
                              {
                                $basdedu = ($ctc*($parc/100));
                              }
                            }
                            else
                            {

                              if($flat != "")
                              {
                                $basval = $flat;
                                $totalctc[] = $basval;
                              }
                              else
                              {
                                $basval = ($ctc*($parc/100));
                                $totalctc[] = $basval;
                              }
                            }
                            // $netdeduct = $pd*($basdedu/$mon);
                            $pd = $holis+$res+$fhwd+$tekkenlev;
                            
                            $netamnt = ($pd*($basval/$mon));

                            $netvalue[] = $netamnt;


                        
                        $plary = $sal['in_pf'];
                              if($plary == "1")
                              {
                                $pfarray[] = $basval;
                                 
                              }
                              $elary = $sal['in_esi'];
                              if($elary == "1")
                              {
                                $esiarry[] = $basval;
                              }

                          }
                          $table = "in_ratesetup";
                          $cond = " `in_comid`='$comid' ";
                          $select = new Selectall();
                          $rate = $select->getcondData($table,$cond);
                          $spf = $psd['in_pfaccess'];
                          $pfcut = $rate['in_epfcutoff'];
                          $pfrate = $rate['in_epfvalue'];
                          
                          if($spf == "1")
                          {

                            $netset = array_sum($pfarray);
                            $catsat = $pd*($netset/$mon);

                            $purearning = ($catsat*($pfrate/100));
                            if($rate != "")
                            {
                              
                              if($catsat > $pfcut)
                              {
                                $purpf = "1800";
                              }
                              else
                              {
                                $purpf = $purearning;
                              }

                              
                            }

                          }
                          else
                          {
                            $purpf = "0";
                          }
                          $sesi = $psd['in_esiaccess'];
                          if($sesi == "1")
                          {
                            $esival = array_sum($esiarry);
                            if($rate != "")
                            {
                              $esicut = $rate['in_esicutoff'];
                              $esrate = $rate['in_esivalue'];
                              if($esival > $esicut)
                              {
                                $setesi = "00";
                              }
                              else
                              {
                                $setesi = ($esival*($esrate/100));
                              }
                            }
                          }
                          else
                          {
                            $setesi = "0";
                          }
                        }
                          $netpf = $purpf;
                          $netesi = $pd*($setesi/$mon);
                          $netset = $pd*($ctc/$mon);
                          $didval = round($netpf)+round($netesi);
                          $mynet = $purpf+$setesi;
                          $payset = array_sum($totalctc);
                        ?>
                        <tr>
                          <td><?php echo $xl;?></td>
                          <td><a href="<?php echo VIEW?>payroll/view-salary.php?id=<?php echo $emi;?>&pd=<?php echo $pd;?>&mon=<?php echo $cmon;?>"><?php echo $prs.$emi?></a></td>
                          <td><?php echo $rs['in_fname']." ".$rs['in_lname'];?></td>
                          <td><?php echo $fhwd;?></td>
                          <td><?php echo $wd-$fhwd-$tekkenlev;?></td>
                          <td><?php echo $pd;?></td>
                          <td><?php echo $ctc;?></td>
                          <td><?php echo round($didval);?></td>
                          <td><?php echo round($netset);?></td>
                          <td><?php echo round($netset-$didval);?></td>
                        </tr>
                        <?php
                        $xl++;
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