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
                      Employee of the Month
                    </div>
                    <div class="card-tools">
                      
                    </div>

                  </div>
                  <div class="card-body">
                    <div class="row mb-2">
                      <div class="col-sm-4 col-lg-4">
                        <form class="form-inline" method="GET" >
                          <div class="input-group">
                          <input type="text" name="s" class="form-control rounded-0 form-control-sm" placeholder="Employee Name/ID">
                            <div class="input-group-append">
                            <button type="submit" class="input-group-text rounded-0 "><i class="fas fa-search"></i></button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="col-sm-8 col-lg-8">
                        <div class="clearfix">
                          <div class="float-right">
                            <form class="form-inline" method="POST" action="<?php echo BSURL;?>functions/notice.php?case=star">
                              <div class="input-group">
                              <select name="startype" class="form-control rounded-0 form-control-sm" required>
                                <option value="">--Select--</option>
                                <option value="monthStar">Month Star</option>
                                <option value="risingStar">Rising Star</option>

                              </select>
                              <input type="month" name="starmonth" class="form-control rounded-0 form-control-sm" required>
                                <div class="input-group-append">
                                <button type="submit" class="btn-primary btn rounded-0 btn-sm">Submit</button>
                                </div>
                              </div>
                            
                          </div>
                        </div>
                      </div>

                    </div>
                    <div class="table-responsive emptable">
                      <table class="table table-bordered table-striped">
                        <thead class="sticky-top bg-dark">
                          <th>Employee ID</th>
                          <th>Employee Name</th>
                          <th>Email Address</th>
                          <th>Joining Date</th>
                          <th>Department</th>
                          <th>Designation</th>
                          <th>Action</th>
                        </thead>
                        <tbody>
                          <?php
                          if(isset($_GET['s']))
                          {
                            $s = $_GET['s'];

                            $table = "in_employee";
                            $cond = " `in_compid`='$comid' AND `in_delete`='1' AND (`in_empid` LIKE '%$s%' OR `in_fname` LIKE '%$s%' OR `in_lname` LIKE '%$s%' )";
                            $select = new Selectall();
                            $emps = $select->getallCond($table,$cond);
                          }
                          else
                          {
                            $table = "in_employee";
                            $cond = " `in_compid`='$comid' AND `in_delete`='1' ORDER BY `in_empid` ASC";
                            $select = new Selectall();
                            $emps = $select->getallCond($table,$cond);
                          }
                          
                          if(!empty($emps))
                          {
                            foreach($emps as $em)
                            {
                              $pr = $em['in_emprefix'];
                              $dep = $em['in_department'];
                              $des = $em['in_designation'];

                              $table = "in_master_card";
                              $cond = " `in_sno`='$pr' ";
                              $select = new Selectall();
                              $prefx = $select->getcondData($table,$cond);

                              $table = "in_master_card";
                              $cond = " `in_sno`='$dep' ";
                              $select = new Selectall();
                              $depr = $select->getcondData($table,$cond);

                              $table = "in_master_card";
                              $cond = " `in_sno`='$des' ";
                              $select = new Selectall();
                              $desg = $select->getcondData($table,$cond);
                              ?>
                              <tr>
                                <td><?php echo $prefx['in_prefix'].$em['in_empid'];?></td>
                                <td><?php echo $em['in_fname'];?> <?php echo $em['in_lname'];?></td>
                                <td><?php echo $em['in_email'];?></td>
                                <td><?php echo date('d-m-Y', strtotime($em['in_dateofjoining']));?></td>
                                
                                <td><?php echo $depr['in_prefix'];?></td>

                                <td><?php echo $desg['in_prefix'];?></td>

                                <td><input type="radio" name="empis" value="<?php echo $em['in_empid'];?>" required></td>
                              </tr>
                              <?php
                            }
                          }
                          else
                          {
                            ?>
                            <tr>
                              <td colspan="7">No Data</td>
                            </tr>
                            <?php
                          }
                          ?>
                        </tbody>
                      </table>
                      </form>
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