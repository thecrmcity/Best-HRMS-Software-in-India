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

        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-stripped table-bordered">
                <thead class="bg-primary">
                  
                  <th>Type</th>
                  <th>Employee ID</th>
                  <th>Employee Name</th>
                  <th>Date</th>
                  <th>Login Time</th>
                  <th>Logout Time</th>
                  <th class="bg-light">Request Login</th>
                  <th class="bg-light">Request Logout</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php
                  
                  $table = "in_emp_attend";
                  $cond = "  `in_rqstatus`='1' ";
                  $select = new Selectall();
                  $empsel = $select->getallCond($table,$cond);
                  if(!empty($empsel))
                  {
                    foreach($empsel as $msel)
                    {
                      ?>
                      <tr>
                      
                      <td>Attendance</td>
                      <td><?php echo $msel['in_empid'];?></td>
                      <td><?php echo $msel['in_fname']." ".$msel['in_lname'];?></td>
                      <td><?php echo $msel['in_logdate'];?></td>
                      <td><?php echo $msel['in_login'];?></td>
                      <td><?php echo $msel['in_logout'];?></td>
                      <td class="bg-light"><?php echo $msel['in_rq_intime'];?></td>
                      <td class="bg-light"><?php echo $msel['in_rq_outime'];?></td>
                      <td><a href="<?php echo VIEW; ?>approvals/attendance-action.php?id=<?php echo $msel['in_sno'];?>" class="badge badge-primary">Action</a></td>
                      </tr>

                      <?php
                      
                    }
                  }
                  ?>
                  <?php
                  
                  $table = "in_empbreak";
                  $cond = "  `in_rqstatus`='1' ";
                  $select = new Selectall();
                  $empsel = $select->getallCond($table,$cond);
                  if(!empty($empsel))
                  {
                    foreach($empsel as $msel)
                    {
                      $table = "in_employee";
                      $cond = " `in_compid`='$comid' AND `in_empid`='{$msel['in_empid']}' ";
                      $select = new Selectall();
                      $selm = $select->getcondData($table,$cond);
                      ?>
                      <tr>
                     
                      <td>Break</td>
                      <td><?php echo $msel['in_empid'];?></td>
                      <td><?php echo $selm['in_fname']." ".$selm['in_lname'];?></td>
                      <td><?php echo $msel['in_logdate'];?></td>
                      <td><?php echo $msel['in_breakin'];?></td>
                      <td><?php echo $msel['in_breakout'];?></td>
                      <td class="bg-light"><?php echo $msel['in_rq_intime'];?></td>
                      <td class="bg-light"><?php echo $msel['in_rq_outime'];?></td>
                      <td><a href="<?php echo VIEW; ?>approvals/attendance-action.php?br=<?php echo $msel['in_sno'];?>" class="badge badge-primary">Action</a></td>
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