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

            <h4 class="m-0">Leave Setup</h4>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><span onclick="history.back()" class="badge badge-danger" style="cursor: pointer;"><i class="fas fa-arrow-left"></i> Back</span></li>

              <li class="breadcrumb-item"><a href="<?php echo BSURL;?>views/dashboard/"><i class="fas fa-home"></i> Home</a></li>

              <li class="breadcrumb-item active">Leave Setup</li>

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
              Leave Policy Setup 
            </div>
            <div class="card-tools">

              <a href="leave-type.php" class="font-weight-bold form-control"><i class="fas fa-plus-circle"></i> Leave Type</a>

            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-4 col-lg-4">
                <?php
                  $select = new Selectall();
                  $comInfo = $select->companyInfo();
                  if($comInfo != "")
                  {
                    $sand = $comInfo['in_sandwich'];
                  }
                ?>
                <div class="sandwich-strip">
                  <form class="form-inline" method="POST" action="<?php echo BSURL;?>functions/leave.php?case=sandwichrule&f=<?php echo $pagename;?>&p=<?php echo $siteaim;?>">
                    <div class="form-group">
                      <label class="col-form-label">Sandwich Rule</label>
                      <div class="input-group ml-3">
                        <input type="checkbox" name="sandhit" data-bootstrap-switch value="1" data-off-color="danger" data-on-color="success" <?php echo $sand == "1" ? "checked":""; ?>>
                        
                          <input type="submit" value="Save" class="bg-primary border-0 ml-2">
                       
                       
                      </div>
                     
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-sm-4 col-lg-4">
                <?php
            if($sand == "1")
            {

                $select = new Selectall();
                $comInfo = $select->companyInfo();
                if($comInfo != "")
                {
                  $sandholi = $comInfo['in_sandholiday'];
                }
              ?>
              
                <form class="form-inline" method="POST" action="<?php echo BSURL;?>functions/leave.php?case=sandholiday&f=<?php echo $pagename;?>&p=<?php echo $siteaim;?>">
                  <div class="form-group">
                    <label class="col-form-label">Holiday Sandwich Rule</label>
                    <div class="input-group ml-3">
                      <input type="checkbox" name="sandholi" data-bootstrap-switch value="1" data-off-color="danger" data-on-color="success" <?php echo $sandholi == "1" ? "checked":""; ?>>
                      
                        <input type="submit" value="Save" class="bg-secondary border-0 ml-2">
                     
                     
                    </div>
                   
                  </div>
                </form>
              <?php
            }
            ?>
              </div>
              <div class="col-sm-4 col-lg-4">
                <?php
                if(isset($_GET['case']))
                {
                  $case = $_GET['case'];
                  switch($case)
                  {
                    case "setup":
                    ?>
                    <div class="clearfix">
                      <a href="<?php echo VIEW?>leaves/leave-setup.php" class="float-right btn btn-sm btn-primary"><i class="fas fa-plus"></i> Leave Setup</a>
                    </div>
                    
                    <?php
                    break;
                    case "club":
                    ?>
                    <div class="clearfix">
                      <a href="<?php echo VIEW?>leaves/club-group.php" class="float-right btn btn-sm btn-secondary"><i class="fas fa-plus"></i> Leave Club</a>
                    </div>
                    
                    <?php
                    break;
                    case "group":
                    ?>
                    <div class="clearfix">
                      <a href="<?php echo VIEW?>leaves/leave-group.php" class="float-right btn btn-sm btn-info"><i class="fas fa-plus"></i> Leave Group</a>
                    </div>
                    
                    <?php
                    break;
                  }
                }
              ?>
              </div>

            </div>

            <div class="card rounded-0 mt-2">
              <div class="card-body p-0">
                <div class="row">
                  <div class="col-sm-2 col-lg-2">
                    <div class="lightsidbar">
                      <a href="<?php echo VIEW?>leaves/leave-settings.php?case=setup" class=""><i class="fas fa-angle-double-right"></i> Leave Setup</a>

                      <a href="<?php echo VIEW?>leaves/leave-settings.php?case=club" class=""><i class="fas fa-angle-double-right"></i> Club Group</a>
                      <a href="<?php echo VIEW?>leaves/leave-settings.php?case=group" class=""><i class="fas fa-angle-double-right"></i> Leave Group</a>

                    </div>
                     
                      
                  
                  </div>
                  <div class="col-sm-10 col-lg-10">
                    <?php
                      if(isset($_GET['case']))
                      {
                        $case = $_GET['case'];
                        switch($case)
                        {
                          case "setup":
                          ?>
                          <div class="table-responsive emptable">
                            <table class="table table-bordered table-striped">
                              <thead class="bg-secondary">
                                <th>Sr. No.</th>
                                <th>Leave Name</th>
                                <th>Short</th>
                                <th>Setup</th>
                                
                                <th>Action</th>
                              </thead>
                              <tbody>
                                <?php
                                $table = "in_leavetype";
                                $cond = " `in_comid`='$comid' AND `in_status`='1' ";
                                $select = new Selectall();
                                $setup = $select->getallCond($table,$cond);
                                if(!empty($setup))
                                {
                                  $xl = 1;
                                  foreach($setup as $up)
                                  {
                                    $levid = $up['in_sno'];
                                    $table = "in_leavesetup";
                                    $cond = " `in_leavename`='$levid' AND `in_comid`='$comid' AND `in_status`='1' ";
                                    $select = new Selectall();
                                    $leaveup = $select->getcondData($table,$cond);
                                    if($leaveup != "")
                                    {
                                      ?>
                                      <tr>
                                    <td><?php echo $xl;?></td>
                                    <td><?php echo $up['in_leavetype'];?></td>
                                    <td><?php echo $up['in_abbreviation'];?></td>
                                    <td>Already Set</td>
                                    <td><a href="<?php echo VIEW?>leaves/leave-setup.php?id=<?php echo $up['in_sno'];?>" class="badge badge-success">View</a></td>

                                    </tr>
                                      <?php
                                    }
                                    else
                                    {
                                      ?>
                                      <tr>
                                    <td><?php echo $xl;?></td>
                                    <td><?php echo $up['in_leavetype'];?></td>
                                    <td><?php echo $up['in_abbreviation'];?></td>
                                    <td>Not Set</td>
                                    <td><a href="<?php echo VIEW?>leaves/leave-setup.php?id=<?php echo $up['in_sno'];?>" class="badge badge-info">Set Rule</a></td>

                                    </tr>
                                      <?php
                                    }
                                    
                                    ?>
                                    
                                    <?php
                                    $xl++;
                                  }
                                  
                                }
                                ?>
                              </tbody>
                            </table>
                          </div>
                          <?php
                          break;
                          case "club":
                          ?>
                          <div class="table-responsive emptable">
                            <table class="table table-bordered table-striped">
                              <thead class="bg-secondary sticky-top">
                                <th>Sr.No.</th>
                                <th>Group Name</th>
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>Designation</th>
                                <th>Department</th>
                                <th>Clubbing</th>
                                <th>Action</th>
                              </thead>
                              <tbody>
                                <?php
                                $table = "in_leavegrouping";
                                $cond = " `in_comid`='$comid' AND `in_status`='1' AND `in_grouptype`='clubLeave' ";
                                $select = new Selectall();
                                $club = $select->getallCond($table,$cond);
                                if(!empty($club))
                                {
                                  $xl=1;
                                  foreach($club as $clb)
                                  {
                                    $desi = $clb['in_designation'];
                                    
                                    $table = "in_master_card";
                                    $cond = " `in_sno`='$desi' AND `in_status`='1' ";
                                    $select = new Selectall();
                                    $dest = $select->getcondData($table,$cond);

                                    $depi = $clb['in_department'];
                                    $table = "in_master_card";
                                    $cond = " `in_sno`='$depi' AND `in_status`='1' ";
                                    $select = new Selectall();
                                    $desp = $select->getcondData($table,$cond);

                                    ?>
                                    <tr>
                                      <td><?php echo $xl;?></td>
                                      <td><?php echo $clb['in_clubname'];?></td>
                                      <td><?php echo $clb['in_empid'];?></td>
                                      <td><?php echo $clb['in_fullname'];?></td>
                                      <td><?php echo $dest != "" ? $dest['in_prefix']:"";?></td>
                                      <td><?php echo $desp != "" ? $desp['in_prefix']:"";?></td>
                                      <td><?php echo $clb['in_leavetypes'];?></td>
                                      <td></td>
                                      
                                    </tr>
                                    <?php
                                    $xl++;
                                  }
                                }
                                ?>  
                              </tbody>
                            </table>
                          </div>
                          <?php
                          break;
                          case "group":
                          ?>
                          <div class="table-responsive emptable">
                            <table class="table table-bordered table-striped">
                              <thead class="bg-secondary sticky-top">
                                <th>Sr. No.</th>
                                <th>Group Name</th>
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>Designation</th>
                                <th>Department</th>
                                <th>Clubbing</th>
                                <th>Action</th>
                              </thead>

                              <tbody>
                                <?php
                                $table = "in_leavegrouping";
                                $cond = " `in_comid`='$comid' AND `in_status`='1' AND `in_grouptype`='groupLeave' ";
                                $select = new Selectall();
                                $club = $select->getallCond($table,$cond);
                                if(!empty($club))
                                {
                                  foreach($club as $clb)
                                  {
                                    ?>
                                    <tr>
                                      <td></td>
                                      <td><?php echo $clb['in_clubname'];?></td>
                                      <td><?php echo $clb['in_empid'];?></td>
                                      <td><?php echo $clb['in_fullname'];?></td>
                                      <td><?php echo $clb['in_designation'];?></td>
                                      <td><?php echo $clb['in_department'];?></td>
                                      <td><?php echo $clb['in_leavetypes'];?></td>
                                      <td></td>
                                      
                                    </tr>
                                    <?php
                                  }
                                }
                                ?>  
                              </tbody>
                            </table>
                          </div>
                          <?php
                          break;
                        }
                      }
                    ?>
                    
                  </div>
                      
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

  <script src="<?php echo BSURL;?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
      
    });
  </script>

 <?php

include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/footer.php';

?>