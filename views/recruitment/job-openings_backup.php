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
              <i class="fas fa-tasks"></i> Current Openings
            </div>
            <div class="card-tools">
              <a href="<?php echo VIEW.$pagename?>/job-application.php" class="text-dark font-weight-bold"><i class="fas fa-plus"></i> Job Application</a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive emptable">
              <table class="table table-bordered table-striped">
                <thead class="sticky-top" style="background: #d8e4f3;color: #024f74;">
                  <th>No.</th>
                  <th>Job Type</th>
                  <th>Job Title</th>
                  <th>No of Vacany</th>
                  <th>Position Name</th>
                  <th>Department</th>
                  <th>Assign To</th>
                  <th>Post Date</th>
                  <th>Last Date</th>
                  <th>Post By</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php
                  $table = "in_jobapplication";
                  $cond = " `in_comid`='$comid' AND `in_status`='1' ";
                  $select = new Selectall();
                  $open = $select->getallCond($table,$cond);
                  if(!empty($open))
                  {
                    $xl=1;
                    foreach($open as $op)
                    {
                      $emi = $op['in_createdby'];
                      $table = "in_employee";
                      $cond = " `in_empid`='$emi' ";
                      $select = new Selectall();
                      $can = $select->getcondData($table,$cond);
                      if($can != "")
                      {
                        $caname = $can['in_fname']." ".$can['in_lname'];
                      }

                      $omi = $op['in_openingfor'];
                      $table = "in_master_card";
                      $cond = " `in_sno`='$omi' ";
                      $select = new Selectall();
                      $cano = $select->getcondData($table,$cond);
                      if($cano != "")
                      {
                        $openfor = $cano['in_prefix'];
                      }

                      $dmi = $op['in_department'];
                      $table = "in_master_card";
                      $cond = " `in_sno`='$dmi' ";
                      $select = new Selectall();
                      $dan = $select->getcondData($table,$cond);
                      if($dan != "")
                      {
                        $depats = $dan['in_prefix'];
                      }
                      $assignto = $op['in_assingto'];
                      $select = new Selectall();
                      ?>
                      <tr>
                        <td><?php echo $xl;?></td>
                        <td><?php echo $op['in_jobtype'];?></td>
                        <td><?php echo $op['in_jobtitle'];?></td>
                        <td><?php echo $op['in_noofposition'];?></td>

                        <td><?php echo $openfor;?></td>
                        <td><?php echo $depats;?></td>
                        <td><?php echo $select->empName($assignto);?></td>
                        <td><?php echo date('d-m-y', strtotime($op['in_startdate'])) ;?></td>
                        <td><?php echo date('d-m-y', strtotime($op['in_enddate'])) ;?></td>
                        <td><?php echo $caname;?></td>
                        
                        <td><?php $pub = $op['in_publish']; 
                        if($pub == "1")
                        {
                          ?>
                          <a href="<?php echo BSURL?>functions/candidates.php?case=appdraft&id=<?php echo $op['in_sno'];?>&s=0" class="text-secondary font-weight-bold"  title="Send to Draft">Published</a>
                          <?php
                        }
                        else
                        {
                          ?>
                          <a href="<?php echo BSURL?>functions/candidates.php?case=appdraft&id=<?php echo $op['in_sno'];?>&s=1" class="text-danger font-weight-bold"  title="Send to Draft">Draft</a>
                          <?php
                        } 
                        
                        ?></td>
                        <td><a href="<?php echo BSURL?>functions/candidates.php?case=appdelete&id=<?php echo $op['in_sno'];?>" class="text-danger" title="Delete Job Request"><i class="fas fa-trash"></i></a>
                          
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

  

 <?php

include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/footer.php';

?>