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

        <div class="card">

          <div class="card-header">

            <div class="card-title">

              Manage Applied Leave

            </div>

            <div class="card-tools">

              <form class="form-inline" method="POST" action="">

                

                <div class="input-group">

                  <input type="date" name="s" class="form-control rounded-0">

                  <div class="input-group-append">

                    <button class="input-group-text rounded-0" type="submit"><i class="fas fa-search"></i></button>

                    

                  </div>

                </div>

              </form>

            </div>

          </div>

          <div class="card-body">

            <div class="table-responsive emptable">

              <table class="table table-bordered table-striped">

                <thead>

                  <th>Sr. No.</th>

                  <th>Applied Date</th>

                  <th>Leave Name</th>
                  <th>Balance</th>

                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Total Day</th>
                  <th>Rest Balance</th>
                  <th>Reason</th>
                  <th>Status</th>

                  <th>Action</th>

                </thead>

                <tbody>

                  <?php

                  $table = "in_applyleaves";

                  $cond = " `in_comid`='$comid' AND `in_empid`='$empid' AND `in_status`='1' ";

                  $select = new Selectall();

                  $leavData = $select->getallCond($table,$cond);

                  if(!empty($leavData))

                  {

                    $xl =1;

                    foreach($leavData as $ld)

                    {

                      $lid = $ld['in_leaveid'];

                      $table = "in_leavetype";

                      $cond = " `in_sno`='$lid' ";

                      $select = new Selectall();

                      $leav = $select->getcondData($table,$cond);

                      if($leav != "")

                      {

                        $lvname = $leav['in_leavetype'];

                        $lvabr = $leav['in_abbreviation'];

                      }

                      else

                      {

                        $lvname = "";

                        $lvabr = "";

                      }

                      ?>

                      <tr>

                      <td><?php echo $xl;?></td>

                      <td><?php echo $ld['in_applydate'];?></td>

                      <td><?php echo $lvname;?> (<?php echo $lvabr;?>)</td>

                      <td><?php echo $ld['in_beforebal'];?></td>

                      <td><?php echo $ld['in_startdate'];?></td>

                      <td><?php echo $ld['in_enddate'];?></td>

                      <td><?php echo $ld['in_applyday'];?></td>
                      <td><?php echo $ld['in_afterbalan'];?></td>

                      <td><?php echo $ld['in_reason'];?></td>
                      
                      <td><?php $lstust = $ld['in_approvstatus']; switch($lstust){ case"0": echo "<span class='badge badge-warning'>Pending</span>"; break; case"1": echo "<span class='badge badge-success'>Approved</span>"; break; case "2": echo "<span class='badge badge-danger'>Rejected</span>"; break;}; ?></td>
                      <td>
                        <?php

                          $lstust = $ld['in_approvstatus'];
                          if($lstust == "0")
                          {
                            ?>
                            <a href="<?php echo VIEW.$pagename;?>/apply-leave.php?id=<?php echo $ld['in_sno'];?>" class="text-success"><i class="fas fa-edit"></i></a>
                            <a href="<?php echo BSURL;?>functions/leave.php?case=deleave&id=<?php echo $ld['in_sno'];?>" class="text-danger" onclick="return confirm('Are You Sure? You Want to Delete.')"><i class="fas fa-trash"></i></a>
                            <?php
                          }

                        ?>
                        
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