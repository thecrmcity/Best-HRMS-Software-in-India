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

          <div class="col-sm-6 col-lg-6 col-md-6">

            <form class="form-inline" method="GET">

                <div class="form-group">

                  

                  <div class="input-group">

                    

                    <input type="text" class=" border pl-2 rounded-0 border-right-0 emsinput" placeholder="Name" name="s" required autocomplete="off">

                    <div class="input-group-prepend">

                      <input type="submit" value="GO" class="rounded-0 border bg-secondary emsinput">

                    </div>

                  </div>

                </div>

              </form>

          </div>

          <?php
          if(isset($adminemail))
          {
            $table = "in_employee";

            $select = new Selectall();

            $cAll = $select->onlyAll($table);

            $table = "in_employee";

            $select = new Selectall();

            $cond = " `in_delete`='1' ";

            $aAll = $select->getallCond($table,$cond);

            $table = "in_employee";

            $cond = " `in_delete`='0' ";

            $select = new Selectall();

            $xAll = $select->getallCond($table,$cond);


          }
          else
          {
            $table = "in_employee";

            $cond = " `in_compid`='$comid' ";

            $select = new Selectall();

            $cAll = $select->getallCond($table,$cond);

            $table = "in_employee";

            $select = new Selectall();

            $cond = " `in_compid`='$comid' AND `in_delete`='1' ";

            $aAll = $select->getallCond($table,$cond);

            $table = "in_employee";

          $cond = " `in_compid`='$comid' AND `in_delete`='0' ";

          $select = new Selectall();

          $xAll = $select->getallCond($table,$cond);

          }
          



          ?>

          <div class="col-sm-6 col-lg-6 col-md-6">

            <div class="clearfix">

              <div class="station">

                  <ul class="stationav">

                    <li><a href="manage-employee.php">All<span class="text-secondary">(<?php echo count($cAll);?>)</span></a></li>

                    <li><a href="active-employee.php">Active<span class="text-secondary">(<?php echo count($aAll);?>)</span></a></li>

                    <li><a href="inactive-employee.php">Inactive<span class="text-secondary">(<?php echo count($xAll);?>)</span></a></li>

                  </ul>

                  <form class="form-inline" method="POST" action="<?php echo BSURL;?>functions/employee.php?case=bulkaction">

                    <div class="form-group">

                      

                      <div class="input-group">

                        <select class="rounded-0 border border-right-0 emsinput" name="bulk" required>

                          <option value="">--Bulk Action--</option>

                          <option value="active">Active</option>

                          <option value="inactive">Inactive</option>

                          <option value="delete">Delete</option>

                        </select>

                        

                        <div class="input-group-prepend">

                          <input type="submit" value="Apply" class="rounded-0 border bg-secondary emsinput">

                        </div>

                      </div>

                    </div>

                  

              </div>

              

            </div>

          </div>

        </div>

        <div class="card mt-2 rounded-0">

          <div class="card-body p-0">

            <div class="table-responsive emptable">

              <table class="table table-bordered table-striped">

                <thead class="sticky-top bg-secondary">

                  <th width="10px">Sr. No.</th>

                  <th width="50px">Employee ID</th>

                  <th width="200px">Employee Name</th>
                  <th width="200px">Joining Date</th>
                  <th width="200px">Designation</th>

                  <th width="200px">User Email</th>

                  <th width="200px">Inactive Date</th>

                  <th width="50px">Attendance</th>

                  

                  <th width="50px">Status</th>



                  <th width="50px">

                    <div class="custom-control custom-switch">

                      <input type="checkbox" class="chk_all custom-control-input" id="customSwitch1">

                     <label class="custom-control-label" for="customSwitch1"></label>

                    </div>

                  </th>

                  

                </thead>

                <tbody>

                  <?php

                  if(isset($_GET['s']))

                  {

                    $s = $_GET['s'];

                    $table = "in_employee";

                    $cond = " `in_username` LIKE '%$s%' OR `in_fname` LIKE '%$s%' OR `in_lname` LIKE '%$s%' ";

                    $select = new Selectall();

                    $res = $select->getallCond($table,$cond);



                  }

                  else

                  {
                    
                    $table = "in_employee";
                    $cond = " `in_compid`='$comid' AND `in_delete`='0' ORDER BY `in_empid` ASC ";

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

                      ?>

                      <tr>

                      <td><?php echo $xl;?></td>

                      <td><a href="view-profile.php?id=<?php echo $rs['in_empid'];?>" title="View Profile"><?php echo $prefix.$rs['in_empid'];?></a></td>

                      <td><?php echo $rs['in_fname']." ".$rs['in_lname'];?></td>
                      <td><?php echo date('d-m-Y', strtotime($rs['in_dateofjoining']));?></td>
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

                      <td><?php echo $rs['in_email'];?></td>

                      <td><?php echo $rs['in_inactivedate'];?></td>

                      <td><a href="<?php echo VIEW?>attendance/static-report.php?id=<?php echo $rs['in_empid'];?>"><i class="fas fa-calendar"></i> view</a></td>

                      

                      <td><?php 

                      $dels = $rs['in_delete'];

                      if($dels == "1")

                      {

                        ?>

                        

                        <a href="<?php echo VIEW?>employee/terminate.php?id=<?php echo $rs['in_empid'];?>" class="badge-info badge-pill" onclick="return confirm('Are you sure?')">Active</a>

                        <?php

                      }

                      else

                      {

                        ?>

                        <a href="<?php echo BSURL?>functions/employee.php?case=empactive&id=<?php echo $rs['in_empid'];?>" class="badge-danger badge-pill" onclick="return confirm('Are you sure? Do you want to Inactive or FNF.')">Inactive</a>

                        <?php

                      }



                      ?></td>



                      <td><input type="checkbox" name="cantrash[]" value="<?php echo $rs['in_empid'];?>" class="chk_me"></td>

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

        </form>

      </div><!-- /.container-fluid -->

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->

<script type="text/javascript">

  $(document).ready(function(){

    $(".chk_all").click(function(){

      $(".chk_me").prop('checked', this.checked);

    });

  });





</script>

 <?php

include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/footer.php';

?>

