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

              <i class="fas fa-gifts"></i> Pending Leave Approval

            </div>

            <div class="card-tools">

              <a href="<?php echo VIEW?>leaves/leave-history.php" class="font-weight-bold"><i class="fas fa-history"></i> Leaves History</a>

            </div>

          </div>

          <div class="card-body">

            <div class="table-responsive">

              <table class="table table-bordered table-striped">

                <thead class="bg-light sticky-top">

                  <th>Sr. No.</th>

                  <th>Applied Date</th>

                  <th>Employee ID</th>

                  <th>Employee Name</th>

                  <th>Leave Type</th>
                  <th>Balance</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Total Day</th>

                  <th>Balance Rest</th>
                  <th>Reason</th>
                  <th>Status</th>
                  <th>Action</th>

                </thead>

                <tbody>

                  <?php

                  $table = "in_applyleaves";

                  $cond = " `in_approvstatus`='0' ";

                  $select = new Selectall();

                  $leaves = $select->getallCond($table,$cond);

                  if(!empty($leaves))

                  {

                    $xl=1;

                    foreach($leaves as $lv)

                    {

                      $com = $lv['in_comid'];

                      $emi = $lv['in_empid'];



                      $table = "in_employee";

                      $cond = " `in_empid`='$emi' AND `in_compid`='$com' AND `in_delete`='1' ";

                      $select = new Selectall();

                      $ems = $select->getcondData($table,$cond);



                      $prs = $ems['in_emprefix'];

                      $prnam = $select->prefix($prs);



                      $lid = $lv['in_leaveid'];

                      $table = "in_leavetype";

                      $cond = " `in_sno`='$lid' ";

                      $select = new Selectall();

                      $levs = $select->getcondData($table,$cond);

                      if($levs != "")

                      {

                        $lnm = $levs['in_leavetype'];

                        $lab = $levs['in_abbreviation'];

                      }

                      else

                      {

                        $lnm = "Lose of Pay";

                        $lab = "LOP";

                      }

                      $lvday = $lv['in_leavedays'];

                      if($lvday == "")

                      {

                        $lvday = "1";

                      }

                      ?>

                      <tr>

                      <td><?php echo $xl;?></td>

                      <td><?php echo date('d-m-y', strtotime($lv['in_applydate'])) ;?></td>

                      <td><?php echo $prnam.$lv['in_empid'];?></td>

                      <td><?php echo $ems['in_fname']." ".$ems['in_lname'];?></td>

                      <td><?php echo $lnm;?> (<?php echo $lab;?>)</td>

                      <td><?php echo $lv['in_beforebal'];?></td>
                      <td><?php echo date('d-m-y', strtotime($lv['in_startdate'])) ;?></td>
                      <td><?php echo date('d-m-y', strtotime($lv['in_enddate'])) ;?></td>
                      <td><?php echo $lv['in_applyday'];?></td>

                      <td><?php echo $lv['in_afterbalan'];?></td>
                      <td><?php echo $lv['in_reason'];?></td>
                      <td><?php $lstust = $lv['in_approvstatus']; switch($lstust){ case"0": echo "<span class='badge badge-warning'>Pending</span>"; break; case"1": echo "<span class='badge badge-success'>Approved</span>"; break; case "2": echo "<span class='badge badge-danger'>Rejected</span>"; break;}; ?></td>
                      




                      <td><a href="<?php echo VIEW;?>approvals/leave-accept.php?id=<?php echo $lv['in_sno'];?>" class="badge badge-primary btn-sm">Action <i class="fas fa-angle-double-right"></i></a>

                        </td>

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

  <script>

$(document).ready(function(){

  $('[data-toggle="popover"]').popover();   

});

</script>

 <?php

include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/footer.php';

?>