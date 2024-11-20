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

    <?php
    $monter = date('F', strtotime($mdate));
    $table = "in_monthly_attend";
    $cond = " `in_comid`='$comid' AND `in_empid`='$empid' AND `in_year`='$ydate' AND `in_month`='$monter' ";
    $select = new Selectall();
    $cash = $select->getcondData($table,$cond);
    if($cash != "")
    {
      $totaltime = $cash['in_totalhours'];
      $indays = $cash['in_days'];
      $inhalf = $cash['in_half'];
    }
    else
    {
      $totaltime = "0";
      $indays = "0";
      $inhalf = "0";
    }
    $table = "in_empbreak";
    $cond = " `in_comid`='$comid' AND `in_empid`='$empid' AND MONTH(in_logdate)='$mdate' AND YEAR(in_logdate)='$ydate' ";
    $select = new Selectall();
    $talk = $select->getcondData($table,$cond);
    if($talk != "")
    {
      $restime = $talk['in_totalbreak'];
    }
    else
    {
      $restime = "0";
    }
    ?>

    <!-- Main content -->

    <section class="content">

      <div class="container-fluid">

        <!-- Small boxes (Stat box) -->

        <div class="row">

          <div class="col-sm-3">

            <div class="small-box bg-white">

              <div class="inner">

                <h3><?php echo $totaltime;?></h3>



                <p>Total Work Time</p>

              </div>

              <div class="icon">

                <i class="fas fa-user-tie"></i>

              </div>

              

            </div>

          </div>

          <div class="col-sm-3">

            <div class="small-box bg-white">

              <div class="inner">

                <h3><?php echo $totaltime-$restime;?></h3>



                <p>Active Time</p>

              </div>

              <div class="icon">

                <i class="fas fa-user-tie"></i>

              </div>

              

            </div>

          </div>

          <div class="col-sm-3">

            <div class="small-box bg-white">

              <div class="inner">

                <h3><?php echo $restime;?></h3>



                <p>Rest Time</p>

              </div>

              <div class="icon">

                <i class="fas fa-user-tie"></i>

              </div>

              

            </div>

          </div>

          <div class="col-sm-3">

            <div class="small-box bg-white">

              <div class="inner">
                <?php 
                $table = "in_master_card";
                $cond = " `in_sno`='$preid' ";
                $select = new Selectall();
                $par = $select->getcondData($table,$cond);
                if($par != "")
                {
                  $perid = $par['in_prefix'];
                }
                else
                {
                  $perid = "";
                }

                ?>
                <h3><?php echo $perid.$empid;?></h3>



                <p>Employee</p>

              </div>

              <div class="icon">

                <i class="fas fa-user-tie"></i>

              </div>

              

            </div>

          </div>

        </div>

        <!-- /.row -->

        <div class="table-responsive">

              <table class="table table-bordered table-striped">

                <thead class="bg-info">

                  <th width="30px">No</th>

                  <th>Date</th>

                  <th>Login</th>

                  <th>Logout</th>

                  <th>Status</th>

                  

                </thead>

                <tbody>

                  <?php

                    $xl=1;

                    $table = "in_attend_logs";

                    $cond = " `in_comid`='$comid' AND `in_empid`='$empid' ORDER BY in_logdate ASC";

                    $select = new Selectall();

                    $logData = $select->getallCond($table,$cond);

                    if(!empty($logData))

                    {

                      foreach($logData as $log)

                      {

                        ?>

                        <tr>

                          <td><?php echo $xl;?></td>

                          <td><?php echo $log['in_logdate'];?></td>

                          <td><?php echo $log['in_intime'];?></td>

                          <td><?php echo $log['in_outime'];?></td>

                          <td><?php echo $log['in_logreason'];?></td>

                          

                          



                        </tr>

                        <?php

                        $xl++;

                      }

                    }

                  ?>

                </tbody>

              </table>

            </div>

        

      </div><!-- /.container-fluid -->

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->

  

 <?php

include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/footer.php';

?>