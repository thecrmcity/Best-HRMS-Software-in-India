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

        <div class="row">

          

          <div class="col-lg-12 col-md-12">

            <div class="card">

              <div class="card-header">

                <div class="card-title">

                <form class="" method="GET">

                    

                  <div class="input-group">

                      <select class="form-control form-control-sm" required name="s">



                    <option value="">--Select Year--</option>

                    <?php 

                      $table = "in_holidays";

                      $inner = " DISTINCT in_leaveyear ";

                      $cond = " `in_status`='1' ";

                      $select = new Selectall();

                      $holdata = $select->getallInnercond($table,$inner,$cond);

                      if(!empty($holdata))

                      {

                        foreach($holdata as $hol)

                        {

                          ?>

                          <option value="<?php echo $hol['in_leaveyear'];?>"><?php echo $hol['in_leaveyear'];?></option>

                          <?php

                        }

                      }



                    ?>

                  </select>

                      <div class="input-group-append">

                        <button type="submit" class="input-group-text"> <i class="fas fa-search"></i></button>

                      </div>

                    </div>



                  </form>

                </div>

                <div class="card-tools">
                  <?php
                  $table = "in_controller";
                  $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='holiMaster' AND `in_action`='1' ";
                  $select = new Selectall();
                  $holimas = $select->getcondData($table,$cond);
                  if($holimas != "")
                  {
                    ?>
                    <a href="<?php echo VIEW?>leaves/holiday-master.php" class="text-dark form-control form-control-sm"><i class="fas fa-snowman"></i> Holiday Master</a>
                    <?php
                  }
                  else
                  {
                    echo "";
                  }
                  ?>

                  

                </div>

              </div>

              <div class="card-body">

                <div class="table-responsive">

                  <table class="table table-bordered table-striped">

                <thead class="bg-dark">

                  <th>Sr. No.</th>

                  <th width="200px">Leave Name</th>

                  

                  <th>Leave Date</th>

                  <th>Leave Day</th>

                  <th>Status</th>

                </thead>

                <tbody>

                  <?php

                  if(isset($_GET['s']))

                  {

                    $s = $_GET['s'];

                    $table = "in_holidays";

                    $cond = " `in_leaveyear`='$s' ";

                    $select = new Selectall();

                    $selData = $select->getallCond($table,$cond);

                  }

                  else

                  {

                    $table = "in_holidays";

                    $cond = " `in_leaveyear`='$ydate' ";

                    $select = new Selectall();

                    $selData = $select->getallCond($table,$cond);

                  }

                    $xl = 1;

                    

                    if(!empty($selData)) 

                    {

                      foreach($selData as $sel)

                      {

                      ?>

                      <tr>

                      <td><?php echo $xl;?></td>

                      <td><?php echo $sel['in_leavname']?></td>

                      

                      <td><?php echo $sel['in_leavedate']?></td>

                      <td><?php echo $sel['in_leaveday']?></td>



                      <td><?php $axs = $sel['in_status']; if($axs == "1"){ echo "Active";}else{ echo "Inactive";} ?></td>

                      
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