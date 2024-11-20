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

            <h4 class="m-0"><?php echo $fullPage;?></h4>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><span onclick="history.back()" class="badge badge-danger" style="cursor: pointer;"><i class="fas fa-arrow-left"></i> Back</span></li>

              <li class="breadcrumb-item"><a href="<?php echo BSURL;?>views/dashboard/"><i class="fas fa-home"></i> Home</a></li>

              <li class="breadcrumb-item active"><?php echo $fullPage;?></li>

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
              <i class="fas fa-vote-yea"></i> Assign Shift
            </div>
            <div class="card-tools">
              <a href="<?php echo VIEW.$pagename?>/assigned-shift.php" class="btn-sm btn btn-dark"><i class="fas fa-cannabis"></i> Assigned Shifts</a>
            </div>
          </div>
          

          <div class="card-body">

            <div class="row">

              <div class="col-sm-6 col-lg-6 col-md-6">

                

                <form class="form-inline" method="GET">

                  <div class="input-group">

                      

                      <?php

                        if(isset($_GET['s']))

                        {

                          $s = $_GET['s'];

                          $table = "in_companyshift";

                          $cond = " `in_sno`='$s' ";

                          $select = new Selectall();

                          $mods = $select->getcondData($table,$cond);

                          $mnid = $mods['in_sno'];

                          $selDo = $mods['in_shiftname'];

                        }

                        else

                        {

                          $mnid = "";

                          $selDo = "--Select--";

                        }

                      ?>

                      <select class=" rounded-0 form-control form-control-sm " name="s" required>

                        <option value="<?php echo $mnid;?>"><?php echo $selDo;?></option>

                        <?php

                          $table = "in_companyshift";

                          $cond = " `in_company`='$comid' AND `in_status`='1' ";

                          $select = new Selectall();

                          $mod = $select->getallCond($table,$cond);

                          foreach($mod as $md)

                          {

                            ?>

                            <option value="<?php echo $md['in_sno'];?>"><?php echo $md['in_shiftname'];?></option>

                            <?php

                          }

                        ?>

                      </select>

                      <div class="input-group-append">

                        <button type="submit" class="input-group-text rounded-0"><i class="fas fa-search"></i></button>

                      </div>

                    </div>

                </form>

              </div>

              <div class="col-sm-6 col-lg-6 col-md-6">

                <div class="clearfix">

                  <?php
                   if(isset($_GET['s']))
                   {
                      ?>
                      <button class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#modal-default"><i class="fas fa-filter"></i> Filter</button>
                      <?php
                   }
                  ?>

                </div>

                

              </div>



            </div>

            <?php

            if(isset($_GET['s']))

            {

              $s = $_GET['s'];

              $table = "in_companyshift";

              $cond = " `in_sno`='$s' ";

              $select = new Selectall();

              $gs = $select->getcondData($table,$cond);

              if($gs != "")

              {

                ?>

                <table class="table my-2 table-bordered">

                  <thead class="table-info">

                    <th>Shift Name</th>

                    <th>In_Time</th>

                    <th>Out_Time</th>

                    <th>WorkingHours</th>

                    <th>Lunch</th>

                    <th>TeaBreak</th>

                  </thead>

                  <tbody>

                    <tr>

                      <td><?php echo $gs['in_shiftname'];?></td>

                      <td><?php echo $gs['in_intime'];?></td>

                      <td><?php echo $gs['in_outime'];?></td>

                      <td><?php echo $gs['in_hours'];?></td>

                      <td><?php echo $gs['in_lunch'];?></td>

                      <td><?php echo $gs['in_break'];?></td>



                    </tr>

                  </tbody>

                </table>

                <?php

              }

            }

            ?>

            <form class="" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=shiftassign&id=<?php echo $s;?>&f=<?php echo $pagename?>&p=<?php echo $siteaim;?>">

            <div class="table-responsive emptable mt-1">

              <table class="table table-bordered table-striped">

                <thead class="sticky-top bg-secondary">

                  <th>No</th>

                  <th>Employee ID</th>

                  <th>Employee Name</th>

                  <th>User Email</th>

                  <th>Designation</th>

                  <th>Department</th>

                  <th>Joining Date</th>

                  <th>Reporting</th>

                  <th>Work Location</th>

                  <th>

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

                    $d = isset($_GET['d']) ? $_GET['d'] : '';
                    $w = isset($_GET['w']) ? $_GET['w'] : '';
                    $p = isset($_GET['p']) ? $_GET['p'] : '';
                    if($d != "" AND $w != "" AND  $p != "")
                    {
                      $table = "in_employee";
                      $cond = " `in_compid`='$comid' AND `in_delete`='1' AND `in_department`='$d' AND `in_worklocation`='$w' AND `in_designation`='$p' ";
                      $select = new Selectall();
                      $res = $select->getallCond($table,$cond);
                    }
                    else if($d != "")
                    {
                      $table = "in_employee";
                      $cond = " `in_compid`='$comid' AND `in_delete`='1' AND `in_department`='$d' ";
                      $select = new Selectall();
                      $res = $select->getallCond($table,$cond);
                    }
                    else if($w != "")
                    {
                      $table = "in_employee";
                      $cond = " `in_compid`='$comid' AND `in_delete`='1' AND `in_worklocation`='$w' ";
                      $select = new Selectall();
                      $res = $select->getallCond($table,$cond);
                    }
                    else if($p != "")
                    {
                      $table = "in_employee";
                      $cond = " `in_compid`='$comid' AND `in_delete`='1' AND `in_designation`='$p' ";
                      $select = new Selectall();
                      $res = $select->getallCond($table,$cond);
                    }
                    else if($p != "" AND $w != "")
                    {
                      $table = "in_employee";
                      $cond = " `in_compid`='$comid' AND `in_delete`='1' AND `in_designation`='$p' AND `in_worklocation`='$w' ";
                      $select = new Selectall();
                      $res = $select->getallCond($table,$cond);
                    }
                    else if($p != "" AND $d != "")
                    {
                      $table = "in_employee";
                      $cond = " `in_compid`='$comid' AND `in_delete`='1' AND `in_designation`='$p' AND `in_department`='$d' ";
                      $select = new Selectall();
                      $res = $select->getallCond($table,$cond);
                    }
                    else if($w != "" AND $d != "")
                    {
                      $table = "in_employee";
                      $cond = " `in_compid`='$comid' AND `in_delete`='1' AND `in_department`='$d' AND `in_worklocation`='$w' ";
                      $select = new Selectall();
                      $res = $select->getallCond($table,$cond);
                    }
                    else
                    {
                      $table = "in_employee";
                      $cond = " `in_compid`='$comid' AND `in_delete`='1' ";
                      $select = new Selectall();
                      $res = $select->getallCond($table,$cond);
                    }
                    


                    

                    $xl =1;

                    $table = "in_master_card";

                    $cond = " `in_relation`='cardPrefix'";

                    $select = new Selectall();

                    $pres = $select->getcondData($table,$cond);

                    $prefix = $pres['in_prefix'];





                    if(!empty($res))

                    {

                    foreach($res as $rs)

                    {

                      $design = $rs['in_designation'];

                      $table = "in_master_card";

                      $cond = " `in_sno`='$design' ";

                      $select = new Selectall();

                      $desi = $select->getcondData($table,$cond);



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


                      $locw = $rs['in_worklocation'];
                      $table = "in_master_card";
                      $cond = " `in_sno`='$locw'";
                      $select = new Selectall();
                      $wloc = $select->getcondData($table,$cond);
                      $wrkloc = $wloc['in_prefix'];

                      ?>

                      <tr>

                      <td><?php echo $xl;?></td>

                      <td><?php echo $prefix.$rs['in_empid'];?></td>

                      <td><?php echo $rs['in_fname']." ".$rs['in_lname'];?></td>

                      <td><?php echo $rs['in_email'];?></td>

                      <td><?php echo $desi['in_prefix'];?></td>

                      <td><?php echo $depart['in_prefix'];?></td>

                      <td><?php echo $rs['in_dateofjoining'];?></td>

                      <td><?php echo $mnge != "" ? $mnge['in_fname']." ".$mnge['in_lname']:"";?></td>

                      <td><?php echo $wrkloc;?></td>

                      <td><input type="checkbox" name="cantrash[]" value="<?php echo $rs['in_empid'];?>" class="chk_me"></td>

                    </tr>

                      <?php

                      $xl++;

                    }

                  }





                  }

                      

                  ?>

                </tbody>

              </table>

            </div>

            <?php

            if(isset($_GET['s']))

            {

              ?>

              <div class="clearfix">

              <input type="submit" name="assignshift" class="btn btn-primary float-right">

            </div>

              <?php

            }

            ?>

            </form>

          </div>

        </div>

        <!-- /.row -->

          

      </div><!-- /.container-fluid -->

    </section>

    <!-- /.content -->

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <form class="" method="GET">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Mega Filter</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group row">
                <div class="col-sm-6 col-lg-6">
                  <label>Department</label>
                </div>
                <div class="col-sm-6 col-lg-6">
                  <input type="hidden" name="s" value="<?php echo $_GET['s']?>">
                  <select class="form-control" name="d">
                  <option value="">--Select Department--</option>
                  <?php
                  $table = "in_master_card";
                  $cond = " `in_status`='1' AND `in_relation`='department' ";
                  $select = new Selectall();
                  $desi = $select->getallCond($table,$cond);
                  if(!empty($desi))
                  {
                    foreach($desi as $ds)
                    {
                      ?>
                      <option value="<?php echo $ds['in_sno']?>"><?php echo $ds['in_prefix']?></option>
                      <?php
                    }
                  }
                  ?>
                </select>

                </div>

                
              </div>
              <div class="form-group row">
                <div class="col-sm-6 col-lg-6">
                  <label>Designation</label>
                </div>
                <div class="col-sm-6 col-lg-6">
                  <select class="form-control" name="p">
                  <option value="">--Select Designation--</option>
                  <?php
                  $table = "in_master_card";
                  $cond = " `in_status`='1' AND `in_relation` IN ('designation', 'masterDesignation') ";
                  $select = new Selectall();
                  $desi = $select->getallCond($table,$cond);
                  if(!empty($desi))
                  {
                    foreach($desi as $ds)
                    {
                      ?>
                      <option value="<?php echo $ds['in_sno']?>"><?php echo $ds['in_prefix']?></option>
                      <?php
                    }
                  }
                  ?>
                </select>
                </div>

                
              </div>
              <div class="form-group row">
                <div class="col-sm-6 col-lg-6">
                  <label>Work Location</label>
                </div>
                <div class="col-sm-6 col-lg-6">
                  <select class="form-control" name="w">
                  <option value="">--Select Work Location--</option>
                  <?php
                  $table = "in_master_card";
                  $cond = " `in_status`='1' AND `in_relation`='workLocation' ";
                  $select = new Selectall();
                  $desi = $select->getallCond($table,$cond);
                  if(!empty($desi))
                  {
                    foreach($desi as $ds)
                    {
                      ?>
                      <option value="<?php echo $ds['in_sno']?>"><?php echo $ds['in_prefix']?></option>
                      <?php
                    }
                  }
                  ?>
                </select>
                </div>

                
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Search</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </form>
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

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