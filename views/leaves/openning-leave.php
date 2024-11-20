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
              <i class="fas fa-users"></i> Employee Leave Balance Form
            </div>
          </div>
          

          <div class="card-body">

            <div class="row">
              <div class="col-sm-6 col-lg-6">
                <form class="form-inline mb-2" method="GET">
                  <div class="input-group">
                    <input type="text" name="s" class="form-control rounded-0 form-control-sm" placeholder="Employee ID/Name">
                    <?php
                    if(isset($_GET['lv']))
                    {
                      ?>
                      <input type="hidden" name="lv" value="<?php echo $_GET['lv']?>">
                      <?php
                    }
                    ?>
                    <div class="input-group-append">
                      <button type="submit" class="input-group-text rounded-0"> <i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-sm-6 col-lg-6"></div>

            </div>
            <form class="" method="POST" action="<?php echo BSURL;?>functions/leave.php?case=opennings&f=<?php echo $pagename;?>&p=<?php echo $siteaim;?>">
            <div class="table-responsive mt-2">

              <table class="table table-bordered">

                <thead class="bg-info">
                  <th> Sr. No</th>
                  <th>Employee Id</th>

                  <th>Employee Name</th>
                  <th>Designation</th>
                  <th>Leave Type</th>

                  <th>Balance</th>
                  <th>Value</th>

                </thead>

                <tbody>

                  <?php

                    if(isset($_GET['s']))
                    {
                      $s = $_GET['s'];
                      $table = "in_employee";

                      $cond = " `in_compid`='$comid' AND (`in_empid` LIKE '%$s%' OR `in_fname` LIKE '%$s%' OR `in_lname` LIKE '%$s%') AND `in_delete`='1' ORDER BY `in_empid` ASC";

                      $sel = new Selectall();

                      $selData = $sel->getallCond($table,$cond);

                    }
                    else
                    {
                      $table = "in_employee";

                      $cond = " `in_compid`='$comid' AND `in_delete`='1' ORDER BY `in_empid` ASC";

                      $sel = new Selectall();

                      $selData = $sel->getallCond($table,$cond);

                    }
                    $value = " in_leavetype.in_sno as leaveid ";
                    $table1 = "in_leavesetup";
                    $table2 = "in_leavetype";
                    $match = " in_leavesetup.in_leavename = in_leavetype.in_sno";
                    $cond = " in_leavetype.in_comid='$comid' AND in_leavetype.in_status ='1' ";

                    $sel = new Selectall();

                    $lnam = $sel->innerAllcond($value,$table1,$table2,$match,$cond);
                    $lcount = 0;
                    if(!empty($lnam))

                    {

                      $lconts = count($lnam);

                      if($lconts < 1)
                      {
                        $lcount = $lconts;
                      }
                      else
                      {
                        $lcount = $lconts-1;
                      }
                     

                      



                      if(!empty($selData))

                      {
                        $xl=1;

                        foreach($selData as $sp)

                        {

                          $emi = $sp['in_empid'];

                          $cper = $sp['in_emprefix'];

                          $table = "in_master_card";

                          $cond = " `in_sno`='$cper' ";

                          $sel = new Selectall();

                          $per = $sel->getcondData($table,$cond);

                          $dsp = $sp['in_designation'];

                          $table = "in_master_card";

                          $cond = " `in_sno`='$dsp' ";

                          $sel = new Selectall();

                          $desi = $sel->getcondData($table,$cond);

                          

                          ?>

                          <tr>
                            <td rowspan="<?php echo $lcount;?>"><?php echo $xl;?></td>
                            <td rowspan="<?php echo $lcount;?>"><?php echo $per['in_prefix'];?><?php echo $sp['in_empid'];?>
                            <?php
                            for($j=0;$j<$lcount;$j++)
                            {
                              ?>
                              <input type="hidden" name="eid[]" value="<?php echo $sp['in_empid'];?>">
                              <?php
                            }
                            ?>
                            <input type="hidden" name="preid" value="<?php echo $sp['in_emprefix'];?>">
                            
                           

                            </td>

                            <td rowspan="<?php echo $lcount;?>"><?php echo $sp['in_fname']." ".$sp['in_lname'];?></td>
                            <td rowspan="<?php echo $lcount;?>"><?php echo $desi['in_prefix'];?></td>


                          <?php

                          if(!empty($lnam))

                          {

                            foreach($lnam as $ln)

                            {

                              $lid = $ln['leaveid'];



                              $table = "in_leavebalance";

                              $cond = " `in_comid`='$comid' AND `in_empid`='$emi' AND `in_leaveid`='$lid' ORDER BY in_sno DESC LIMIT 1";

                              $select = new Selectall();

                              $std = $select->getcondData($table,$cond);

                              if($std != "")

                              {

                                $stdbal = $std['in_balance'];

                              }

                              else

                              {

                                $stdbal = "0";

                              }



                              $table = "in_leavetype";

                              $cond = " `in_sno`='$lid'";

                              $sel = new Selectall();

                              $sid = $sel->getcondData($table,$cond);

                              $abs = $sid['in_abbreviation'];

                              if($abs != "LOP")

                              {

                              ?>

                              <td class="bg-light"><?php echo $sid['in_leavetype'];?> (<?php echo $sid['in_abbreviation'];?>)<input type="hidden" name="leavid[]" value="<?php echo $lid;?>"></td>

                              <td width="100px"><?php echo $stdbal;?></td>

                              <td width="100px"><input type="number" class="form-control-sm form-control" name="leaveno[]" value="0" min="0"></td></tr>

                              <?php

                              }

                            }

                          }

                          
                          $xl++;


                          

                        }

                      }

                    }

                    else

                    {

                      ?>

                          

                         <tr>

                          <td colspan="4" class="text-center bg-light">No Data</td>

                         </tr>   

                          

                      <?php

                    }

                  

                  ?>

                  

                </tbody>

              </table>

            </div>

            <?php

            if(!empty($lnam))

            {

              ?>

              <div class="clearfix">

              <input type="submit" value="Submit" class="btn btn-info float-right">

            </div>

              <?php

            }

            ?>

            

            

          </div>

        </form>

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