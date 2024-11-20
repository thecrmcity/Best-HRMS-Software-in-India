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
        
        <?php
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $table = "in_emp_attend";
            $cond = " `in_sno`='$id' ";
            $select = new Selectall();
            $empsel = $select->getcondData($table,$cond);
            if($empsel != "")
            {
                ?>
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                    <th>Date</th>
                                    <td><?php echo $empsel['in_logdate'];?></td>
                                    </tr>
                                    <tr>
                                    <th>Login Time</th>
                                    <td><?php echo $empsel['in_login'];?></td> 
                                    </tr>
                                    <tr>
                                    <th>Logout Time</th>
                                    <td><?php echo $empsel['in_logout'];?></td> 
                                    </tr>
                                    <tr>
                                    <th>Request Login</th>
                                    <td><?php echo $empsel['in_rq_intime'];?></td>
                                    </tr>
                                    <tr>
                                    <th>Request Logout</th>
                                    <td><?php echo $empsel['in_rq_outime'];?></td> 
                                    </tr>
                                    <tr>
                                        <td class="text-center"><a href="<?php echo BSURL?>functions/attendance.php?case=acceptend&id=<?php echo $id;?>" class="btn btn-success btn-sm">Accepted</a></td>
                                        <td class="text-center"><a href="<?php echo BSURL?>functions/attendance.php?case=rejectend&id=<?php echo $id;?>" class="btn btn-danger btn-sm">Rejected</a></td>


                                    </tr>
                                    <tr>
                                    <td colspan="2"><button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#myeditmodal" ><i class="fas fa-edit"></i> Edit</a></td>
                                    </tr>

                                </table>
                                
                                
                            </div>
                        </div>
                    
                    </div>
                    <div class="col-lg-8 col-md-6">
                        <div class="table-responsive">
                          <table class="table table-stripped table-bordered">
                            <thead class="bg-dark">
                              <th>No</th>
                              <th>EmpID</th>
                              <th>EmployeeName</th>
                              <th>Email_Address</th>
                              <th>System Login</th>
                            </thead>
                            <tbody>
                              <?php
                              $xl =1;
                              $ldat = $empsel['in_logdate'];
                              $emi =  $empsel['in_empid'];
                              $table = "in_logs";
                              $cond = " `in_empid`='$emi' AND DATE(in_logtime) = '$ldat' ";
                              $select = new Selectall();
                              $logan = $select->getallCond($table,$cond);
                              
                              if(!empty($logan))
                              {
                                foreach($logan as $lg)
                                {
                                  ?>
                                  <tr>
                                <td><?php echo $xl;?></td>
                                <td><?php echo $lg['in_empid'];?></td>
                                <td><?php echo $lg['in_fname'];?></td>
                                <td><?php echo $lg['in_email'];?></td>
                                <td><?php echo $lg['in_logtime'];?></td>
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
                <?php
            }
        }
        ?>
         <?php
        if(isset($_GET['br']))
        {
            $br = $_GET['br'];
            $table = "in_empbreak";
            $cond = " `in_sno`='$br' ";
            $select = new Selectall();
            $empseb = $select->getcondData($table,$cond);
            if($empseb != "")
            {
                ?>
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                    <th>Date</th>
                                    <td><?php echo $empseb['in_logdate'];?></td>
                                    </tr>
                                    <tr>
                                    <th>Login Time</th>
                                    <td><?php echo $empseb['in_breakin'];?></td> 
                                    </tr>
                                    <tr>
                                    <th>Logout Time</th>
                                    <td><?php echo $empseb['in_breakout'];?></td> 
                                    </tr>
                                    <tr>
                                    <th>Request Login</th>
                                    <td><?php echo $empseb['in_rq_intime'];?></td>
                                    </tr>
                                    <tr>
                                    <th>Request Logout</th>
                                    <td><?php echo $empseb['in_rq_outime'];?></td> 
                                    </tr>
                                    <tr>
                                        <td class="text-center"><a href="<?php echo BSURL?>functions/attendance.php?case=acceptbrk&id=<?php echo $br;?>" class="btn btn-success btn-sm">Accepted</a></td>
                                        <td class="text-center"><a href="<?php echo BSURL?>functions/attendance.php?case=rejectbrk&id=<?php echo $br;?>" class="btn btn-danger btn-sm">Rejected</a></td>


                                    </tr>
                                    <tr>
                                    <td colspan="2"><button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#mybreakborder" ><i class="fas fa-edit"></i> Edit</a></td>
                                    </tr>

                                </table>
                                
                                
                            </div>
                        </div>
                    
                    </div>
                    <div class="col-lg-8 col-md-6">
                        <div class="table-responsive">
                          <table class="table table-stripped table-bordered">
                            <thead class="bg-dark">
                              <th>No</th>
                              <th>EmpID</th>
                              <th>EmployeeName</th>
                              <th>Email_Address</th>
                              <th>System Login</th>
                            </thead>
                            <tbody>
                              <?php
                              $xl =1;
                              if(isset($_GET['id']))
                              {
                                  $id = $_GET['id'];
                                  $table = "in_emp_attend";
                                  $cond = " `in_sno`='$id' ";
                                  $select = new Selectall();
                                  $empsel = $select->getcondData($table,$cond);
                                  if($empsel != "")
                                  {
                                    $table = "in_logs";
                                    $cond = " `in_empid`='$emi' AND DATE(in_logtime) = '$ldat' ";
                                    $select = new Selectall();
                                    $logan = $select->getallCond($table,$cond);
                                  }
                                }
                              
                              
                              
                              if(!empty($logan))
                              {
                                foreach($logan as $lg)
                                {
                                  ?>
                                  <tr>
                                <td><?php echo $xl;?></td>
                                <td><?php echo $lg['in_empid'];?></td>
                                <td><?php echo $lg['in_fname'];?></td>
                                <td><?php echo $lg['in_email'];?></td>
                                <td><?php echo $lg['in_logtime'];?></td>
                                </tr>
                                <?php
                                }
                                $xl++;
                                
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                    </div>

                </div>
                <?php
            }
        }
        ?>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal" id="myeditmodal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="card-header">
          <h4 class="card-title">Edit Attendance</h4>
          <div class="card-tools">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span></button>
          </div>
          
        </div>
        <div class="modal-body">
        <form class="" action="<?php echo BSURL?>functions/attendance.php?case=editend" method="POST">
          <div class="form-group">
            <label>Request In Time</label>
            <input type="hidden" name="sno" value="<?php echo $empsel['in_sno'];?>">
            <input type="time" name="inlog" value="<?php echo $empsel['in_rq_intime'];?>" class="form-control">
          </div>
          <div class="form-group">
            <label>Request Out Time</label>
            <input type="time" name="outlog" value="<?php echo $empsel['in_rq_outime'];?>" class="form-control">
            <input type="hidden" name="totaltime" value="<?php echo $empsel['in_rq_totaltime'];?>">
          </div>
            
            

        
        </div>
        <div class="card-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary ml-3">Submit</button>
      </div>
      </form>
      </div>
    </div>
  </div>

  <div class="modal" id="mybreakborder">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="card-header">
          <h4 class="card-title">Edit Break</h4>
          <div class="card-tools">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span></button>
          </div>
          
        </div>
        <div class="modal-body">
        <form class="" action="<?php echo BSURL?>functions/attendance.php?case=editbreak" method="POST">
          <div class="form-group">
            <label>Request In Time</label>
            <input type="hidden" name="sno" value="<?php echo $empseb['in_sno'];?>">
            <input type="time" name="inlog" value="<?php echo $empseb['in_rq_intime'];?>" class="form-control">
          </div>
          <div class="form-group">
            <label>Request Out Time</label>
            <input type="time" name="outlog" value="<?php echo $empseb['in_rq_outime'];?>" class="form-control">
            <input type="hidden" name="totaltime" value="<?php echo $empseb['in_rq_totaltime'];?>">
          </div>
            
            

        
        </div>
        <div class="card-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary ml-3">Submit</button>
      </div>
      </form>
      </div>
    </div>
  </div>
  
 <?php
include_once $bsurl.'/inc/alert.php';
include_once $bsurl.'/inc/footer.php';
?>