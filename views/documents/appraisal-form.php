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
              <i class="fas fa-list"></i> Employee Appraisal List
            </div>
            <div class="card-tools">
              
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive emptable">
              <table class="table table-bordered table-striped">
                <thead>
                  <th>No</th>
                  <th>Employee ID</th>
                  <th>Employee Name</th>
                  <th>Designation</th>
                  <th>Department</th>
                  <th>Reporting</th>
                  <th>Date of Joining</th>
                  <th>Appraisal Year</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php

                  if(isset($_GET['s']))

                  {

                    $s = $_GET['s'];

                    $table = "in_employee";

                    $cond = " `in_empid` LIKE '%$s%' OR `in_fname` LIKE '%$s%' OR `in_lname` LIKE '%$s%' ";

                    $select = new Selectall();

                    $res = $select->getallCond($table,$cond);



                  }

                  else

                  {
                    
                    $table = "in_employee";
                    $cond = " `in_compid`='$comid' AND `in_delete`='1' ORDER BY `in_empid` ASC ";

                    $select = new Selectall();

                    $res = $select->getallCond($table,$cond);                    


                  }

                    $xl =1;
                    foreach($res as $rs)

                    {

                      $design = $rs['in_designation'];

                      $table = "in_master_card";

                      $cond = " `in_sno`='$design' ";

                      $select = new Selectall();

                      $desi = $select->getcondData($table,$cond);

                      $rno = $rs['in_emprefix'];

                      $table = "in_master_card";

                      $cond = " `in_sno`='$rno'";

                      $select = new Selectall();

                      $pres = $select->getcondData($table,$cond);

                      $prefix = $pres['in_prefix'];

                      $dept = $rs['in_department'];

                      $table = "in_master_card";

                      $cond = " `in_sno`='$dept' ";

                      $select = new Selectall();

                      $depart = $select->getcondData($table,$cond);

                      $mng = $rs['in_reporting'];

                      $table = "in_employee";

                      $cond = " `in_empid`='$mng' ";

                      $select = new Selectall();

                      $mnge = $select->getcondData($table,$cond);

                      ?>
                      <tr>
                        <td><?php echo $xl;?></td>
                        <td><?php echo $prefix.$rs['in_empid'];?></td>
                        <td><?php echo $rs['in_fname']." ".$rs['in_lname'];?></td>
                        
                        <td><?php

                        $dmast = $desi['in_relation'];
                        if($dmast == "masterDesignation")
                        {
                          echo "<span class='badge badge-danger badge-pill'>M</span> ".$desi['in_prefix'];
                        }
                        else
                        {
                          echo $desi['in_prefix'];
                        }
                       

                      ?></td>
                      <td><?php echo $depart['in_prefix'];?></td>
                      <td><?php echo $mnge['in_fname']." ".$mnge['in_lname'];?></td>
                      <td><?php echo date('d-m-Y', strtotime($rs['in_dateofjoining']));?></td>
                      <td><?php echo date('Y');?></td>
                      <td>
                      </td>
                      <td></td>
                      </tr>
                      <?php
                      $xl++;

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