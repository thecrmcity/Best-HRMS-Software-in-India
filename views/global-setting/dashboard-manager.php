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

          <div class="card-header p-2">

            <div class="card-title">

              <form class="form-inline" method="GET">

                      <div class="input-group">

                      <select class="form-control rounded-0 border-right-0" name="s" required>

                        <?php

                          if(isset($_GET['s']))

                          {

                            $s = $_GET['s'];

                            $table = "in_super_card";

                            $cond = " `in_sno`='$s' AND `in_cardrelation`='majorcard' ";

                            $select = new Selectall();

                            $self = $select->getcondData($table,$cond);

                            $selt = $self['in_cardname'];

                            

                          }

                          else

                          {

                            $selt = "--Select--";

                            $s = "";

                          }

                        ?>

                        <option value="<?php echo $s;?>"><?php echo $selt;?></option>

                        <?php

                        $table = "in_super_card";

                        $cond = " `in_cardrelation`='majorcard' ";

                        $select = new Selectall();

                        $selcom = $select->getallCond($table,$cond);

                        if(!empty($selcom))

                        {

                          foreach($selcom as $sel)

                          {

                            

                          ?>

                          <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_cardname'];?></option>

                          <?php

                          }

                          

                        }

                        ?>

                      </select>

                      <div class="input-group-prepend">

                        

                        <input type="submit" value="GO" class="input-group-text rounded-0">

                    </div>

                    </div>

                    </form>

            </div>

            <div class="card-tools">

              

            </div>

          </div>

              

                <?php

                if(isset($_GET['s']))

                {

                  $s = $_GET['s'];

                  $slug = array();

                  $sel = new Selectall();

                  $sal = $sel->getDashcontrol($s);

                  if($sal != "")

                  {

                    $chkin = $sal['in_checkin'];

                    $recnt = $sal['in_recentlog'];

                    $emp = $sal['in_empcard'];

                    $attn = $sal['in_attendcard'];

                    $sry = $sal['in_salarycard'];

                    $lev = $sal['in_leavecard'];

                    $rpt = $sal['in_reportcard'];

                    $hols = $sal['in_holidaycard'];

                    $upc = $sal['in_eventcard'];

                    $tem = $sal['in_teamtask'];

                  }

                  else

                  {

                    $chkin = "";

                    $recnt = "";

                    $emp = "";

                    $attn = "";

                    $sry = "";

                    $lev = "";

                    $rpt = "";

                    $hols = "";

                    $upc = "";

                    $tem = "";

                  }

                  ?>



                  <div class="card-body p-0">

                    <div class="row">

                      <div class="col-lg-3 col-md-3">

                        

                          <div class="card-body p-0">

          <form class="" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=dashcontrol&f=<?php echo $pagename;?>&p=<?php echo $siteaim;?>">

                          <div class="table-responsive">

                            <table class="table table-bordered">

                              <thead class="text-center bg-secondary">

                                <th width="400px" class="text-left">Modular Name</th>

                                <th width="10px"><input type="hidden" name="grid" value="<?php echo $s;?>"></th>

                              </thead>

                              <tbody>

                                <tr>

                                  <td>CheckIn Card</td>

                                  

                                  <td><div class="custom-control custom-switch">

                                   <input type="hidden" name="chckinCard" value="">

                                <input type="checkbox" class="custom-control-input" id="chckinCard" name="chckinCard" value="chckinCard" <?php echo $chkin == "chckinCard"? "checked": ""; ?>>

                                <label class="custom-control-label" for="chckinCard"></label>

                                </div></td>

                                   

                                </tr>

                                <tr>

                                  <td>Recently Login</td>

                                  

                                  <td><div class="custom-control custom-switch">

                                   <input type="hidden" name="recentLogin" value="">

                                <input type="checkbox" class="custom-control-input" id="recentLogin" name="recentLogin" value="recentLogin" <?php echo $recnt == "recentLogin"? "checked": ""; ?>>

                                <label class="custom-control-label" for="recentLogin"></label>

                                </div></td>

                                   

                                </tr>

                                <tr>

                                  <td colspan="2" class="font-weight-bold table-info">Quick Cards</td>

                                </tr>

                                <tr>

                                  <td>Employee</td>

                                  

                                  <td><div class="custom-control custom-switch">

                                   <input type="hidden" name="empblock" value="">

                                <input type="radio" class="custom-control-input" id="empblock1" name="empblock" value="empManage" <?php echo $emp == "empManage"? "checked": ""; ?>>

                                <label class="custom-control-label" for="empblock1"></label>

                                </div></td>

                                   

                                </tr>

                               

                                <tr>

                                  <td>Add Employee</td>

                                  

                                  <td><div class="custom-control custom-switch">

                                <input type="radio" class="custom-control-input" id="empblock3" name="empblock" value="empAdd" <?php echo $emp == "empAdd"? "checked": ""; ?>>

                                <label class="custom-control-label" for="empblock3"></label>

                                </div></td>

                                   

                                </tr>

                                <tr>

                                  <td>Static Report</td>

                                  

                                  <td><div class="custom-control custom-switch">

                                <input type="radio" class="custom-control-input" id="empblock4" name="empblock" value="staticReport" <?php echo $emp == "staticReport"? "checked": ""; ?>>

                                <label class="custom-control-label" for="empblock4"></label>

                                </div></td>

                                   

                                </tr>

                                <tr class="table-secondary">

                                  <td colspan="2"></td>

                                </tr>

                                <tr>

                                  <td>Attendance</td>

                                  

                                  <td><div class="custom-control custom-switch">

                                   <input type="hidden" name="attendblock" value="">

                                <input type="radio" class="custom-control-input" id="attendblock1" name="attendblock" value="manageAttend" <?php echo $attn == "manageAttend"? "checked": ""; ?>>

                                <label class="custom-control-label" for="attendblock1"></label>

                                </div></td>

                                   

                                </tr>

                                <tr>

                                  <td>My Attendance</td>

                                  

                                  <td><div class="custom-control custom-switch">

                                <input type="radio" class="custom-control-input" id="attendblock2" name="attendblock" value="myAttendance" <?php echo $attn == "myAttendance"? "checked": ""; ?>>

                                <label class="custom-control-label" for="attendblock2"></label>

                                </div></td>

                                   

                                </tr>

                                

                                <tr>

                                  <td>Monthly Report</td>

                                  

                                  <td><div class="custom-control custom-switch">

                                <input type="radio" class="custom-control-input" id="attendblock4" name="attendblock" value="monthReport" <?php echo $attn == "monthReport"? "checked": ""; ?>>

                                <label class="custom-control-label" for="attendblock4"></label>

                                </div></td>

                                   

                                </tr>

                                <tr class="table-secondary">

                                  <td colspan="2"></td>

                                </tr>

                                <tr>

                                  <td>Salary Report</td>

                                  

                                  <td><div class="custom-control custom-switch">

                                   <input type="hidden" name="salaryblock" value="">

                                <input type="radio" class="custom-control-input" id="salaryblock1" name="salaryblock" value="salaryReport" <?php echo $sry == "salaryReport"? "checked": ""; ?>>

                                <label class="custom-control-label" for="salaryblock1"></label>

                                </div></td>

                                   

                                </tr>

                                <tr>

                                  <td>Posted Salary</td>

                                  

                                  <td><div class="custom-control custom-switch">

                                <input type="radio" class="custom-control-input" id="salaryblock2" name="salaryblock" value="postedSalary" <?php echo $sry == "postedSalary"? "checked": ""; ?>>

                                <label class="custom-control-label" for="salaryblock2"></label>

                                </div></td>

                                   

                                </tr>

                                <tr>

                                  <td>Salary Creation</td>

                                  

                                  <td><div class="custom-control custom-switch">

                                <input type="radio" class="custom-control-input" id="salaryblock3" name="salaryblock" value="salaryCreation" <?php echo $sry == "salaryCreation"? "checked": ""; ?>>

                                <label class="custom-control-label" for="salaryblock3"></label>

                                </div></td>

                                   

                                </tr>

                                <tr class="table-secondary">

                                  <td colspan="2"></td>

                                </tr>

                                <tr>

                                  <td>Balance Leaves</td>

                                 

                                  <td><div class="custom-control custom-switch">

                                   <input type="hidden" name="leaveblock" value="">

                                <input type="radio" class="custom-control-input" id="leaveblock1" name="leaveblock" value="leaveBalance" <?php echo $lev == "leaveBalance"? "checked": ""; ?>>

                                <label class="custom-control-label" for="leaveblock1"></label>

                                </div></td>

                                   

                                </tr>

                                <tr>

                                  <td>Apply Leaves</td>

                                  

                                  <td><div class="custom-control custom-switch">

                                <input type="radio" class="custom-control-input" id="leaveblock2" name="leaveblock" value="leaveApply" <?php echo $lev == "leaveApply"? "checked": ""; ?>>

                                <label class="custom-control-label" for="leaveblock2"></label>

                                </div></td>

                                   

                                </tr>

                                <tr>

                                  <td>Leave Approval</td>

                                  

                                  <td><div class="custom-control custom-switch">

                                <input type="radio" class="custom-control-input" id="leaveblock3" name="leaveblock" value="leaveApproval" <?php echo $lev == "leaveApproval"? "checked": ""; ?>>

                                <label class="custom-control-label" for="leaveblock3"></label>

                                </div></td>

                                   

                                </tr>

                                <tr>

                                  <td colspan="2" class="font-weight-bold table-info">Report Cards</td>



                                </tr>

                                <tr>

                                  <td>Today Reports</td>

                                  

                                  <td><div class="custom-control custom-switch">

                                   <input type="hidden" name="reportblock" value="">

                                <input type="radio" class="custom-control-input" id="reportblock1" name="reportblock" value="todayReports" <?php echo $rpt == "todayReports"? "checked": ""; ?>>

                                <label class="custom-control-label" for="reportblock1"></label>

                                </div></td>

                                   

                                </tr>

                                <tr>

                                  <td>Monthly Reports</td>

                                  

                                  <td><div class="custom-control custom-switch">

                                <input type="radio" class="custom-control-input" id="reportblock2" name="reportblock" value="emplReport" <?php echo $rpt == "emplReport"? "checked": ""; ?>>

                                <label class="custom-control-label" for="reportblock2"></label>

                                </div></td>

                                   

                                </tr>
                                <tr>

                                  <td>Wall of Fame</td>

                                  

                                  <td><div class="custom-control custom-switch">

                                <input type="radio" class="custom-control-input" id="reportblock3" name="reportblock" value="walloFame" <?php echo $rpt == "walloFame"? "checked": ""; ?>>

                                <label class="custom-control-label" for="reportblock3"></label>

                                </div></td>

                                   

                                </tr>



                                <tr>

                                  <td colspan="2" class="font-weight-bold table-info">Others Cards</td>

                                </tr>

                                <tr>

                                  <td>Holidays</td>

                                  

                                  <td><div class="custom-control custom-switch">

                                   <input type="hidden" name="empHolidays" value="">

                                <input type="checkbox" class="custom-control-input" id="empHolidays" name="empHolidays" value="empHolidays" <?php echo $hols == "empHolidays"? "checked": ""; ?>>

                                <label class="custom-control-label" for="empHolidays"></label>

                                </div></td>

                                   

                                </tr>

                                <tr>

                                  <td>Upcoming Events</td>

                                  

                                  <td><div class="custom-control custom-switch">

                                   <input type="hidden" name="upcomingEvents" value="">

                                <input type="checkbox" class="custom-control-input" id="upcomingEvents" name="upcomingEvents" value="upcomingEvents" <?php echo $upc == "upcomingEvents"? "checked": ""; ?>>

                                <label class="custom-control-label" for="upcomingEvents"></label>

                                </div></td>

                                   

                                </tr>

                                <tr>

                                  <td>Team Tasks</td>

                                  

                                  <td><div class="custom-control custom-switch">

                                   <input type="hidden" name="teamTasks" value="">

                                <input type="checkbox" class="custom-control-input" id="teamTasks" name="teamTasks" value="teamTasks" <?php echo $tem == "teamTasks"? "checked": ""; ?>>

                                <label class="custom-control-label" for="teamTasks"></label>

                                </div></td>

                                   

                                </tr>

                                <tr>

                                  <td><input type="submit" class="form-control form-control-sm btn-primary" value="Save"></td>

                                  <td></td>

                                </tr>

                              </tbody>

                            </table>

                          </div>

                          </form>

                        </div>

                      

                      

                      </div>

                      <div class="col-lg-9 col-md-9">

                        <div class="row">

                          <div class="col-sm-3 col-lg-3">

                            <div class="card" id="clocktower" style="display: <?php echo $chkin == "chckinCard" ? "block":"none"; ?>;">

                              <div class="card-body box-profile">

                              <div class="text-center">

                                <canvas id="canvas" width="150" height="150"style="background-color:#fff;box-shadow: 0px 0px 5px #7c7c7c;

                  border-radius: 50%;"></canvas>

                              </div>

                              <p class="text-muted text-center"><?php echo $fullname;?></p>



                                <ul class="list-group list-group-unbordered mb-3">

                                  <li class="list-group-item">

                                  <b>Login Time :</b> <a class="float-right">00:00</a>

                                </li>

                                <li class="list-group-item">

                                  <b>Today</b> <span class="float-right"><?php echo date('d-m-Y');?></span>

                                </li>

                              </ul>

                              <a href="" class="btn btn-primary btn-block"><b>Login</b></a>

                            </div>

                            </div>



                            <div class="card" id="recentblk" style="display: <?php echo $recnt == "recentLogin" ? "block":"none"; ?>;">

                              <div class="card-header">

                                <div class="card-title">Recently Login</div>

                              </div>

                              <div class="card-body">

                                

                              </div>

                            </div>

                          </div>

                          <div class="col-sm-9 col-lg-9">

                            <div class="row">

                              <div class="col-lg-3 col-md-6" id="box1" style="display: <?php echo $emp == "empManage" ? "block":"none"; ?>;">

                                <div class="small-box bg-info">

                                  <div class="inner">

                                    <h3><i class="fas fa-users"></i></h3>



                                    <p>All Employee</p>

                                    

                                  </div>

                                  <div class="icon">

                                    <i class="fas fa-users"></i>

                                  </div>

                                  <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                                </div>

                              </div>

                              

                              <div class="col-lg-3 col-md-6" id="box3" style="display: <?php echo $emp == "empAdd" ? "block":"none"; ?>;">

                                <div class="small-box bg-info">

                                  <div class="inner">

                                    <h3><i class="fas fa-users"></i></h3>



                                    <p>Add Employee</p>

                                    

                                  </div>

                                  <div class="icon">

                                    <i class="fas fa-users"></i>

                                  </div>

                                  <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                                </div>

                              </div>

                              <div class="col-lg-3 col-md-6" id="box4" style="display: <?php echo $emp == "staticReport" ? "block":"none"; ?>;">

                                <div class="small-box bg-info">

                                  <div class="inner">

                                    <h3><i class="fas fa-chart-pie"></i></h3>



                                    <p>Static Report</p>

                                    

                                  </div>

                                  <div class="icon">

                                    <i class="fas fa-chart-pie"></i>

                                  </div>

                                  <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                                </div>

                              </div>

                              <!-- -------------------------Close Employee Card------------------ -->



                              <div class="col-lg-3 col-md-6" id="attend1" style="display: <?php echo $attn == "manageAttend" ? "block":"none"; ?>;">

                                <div class="small-box bg-success">

                                  <div class="inner">

                                    <h3>0<sup><small>P</small></sup>/0<sup><small>A</small></sup></h3>



                                    <p class="mb-0">Attendance 0%</p>

                                    <div class="progress border">

                                      <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width:50%"></div>

                                    </div>

                                  </div>

                                  <div class="icon">

                                    <i class="fas fa-male"></i>

                                  </div>

                                  <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                                </div>

                              </div>

                              <div class="col-lg-3 col-md-6" id="attend2" style="display: <?php echo $attn == "myAttendance" ? "block":"none"; ?>;">

                                <div class="small-box bg-success">

                                  <div class="inner">

                                    <h3><i class="fas fa-user"></i></h3>



                                    <p>My Attendance</p>

                                    

                                  </div>

                                  <div class="icon">

                                    <i class="fas fa-user"></i>

                                  </div>

                                  <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                                </div>

                              </div>

                              

                              <div class="col-lg-3 col-md-6" id="attend4" style="display: <?php echo $attn == "monthReport" ? "block":"none"; ?>;">

                                <div class="small-box bg-success">

                                  <div class="inner">

                                    <h3><i class="fas fa-user"></i></h3>



                                    <p>Monthly Report</p>

                                    

                                  </div>

                                  <div class="icon">

                                    <i class="fas fa-user"></i>

                                  </div>

                                  <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                                </div>

                              </div>



                              <!-- --------------------------Close Attendace Card --------------- -->



                              <div class="col-lg-3 col-md-6" id="salary1" style="display: <?php echo $sry == "salaryReport" ? "block":"none"; ?>;">

                                <div class="small-box bg-warning">

                                  <div class="inner">

                                    <h3><i class="fas fa-coins"></i></h3>



                                    <p>Salary Report</p>

                                    

                                  </div>

                                  <div class="icon">

                                    <i class="fas fa-coins"></i>

                                  </div>

                                  <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                                </div>

                              </div>



                              <div class="col-lg-3 col-md-6" id="salary2" style="display: <?php echo $sry == "postedSalary" ? "block":"none"; ?>;">

                                <div class="small-box bg-warning">

                                  <div class="inner">

                                    <h3><i class="fas fa-donate"></i></h3>



                                    <p>Posted Salary</p>

                                    

                                  </div>

                                  <div class="icon">

                                    <i class="fas fa-donate"></i>

                                  </div>

                                  <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                                </div>

                              </div>



                              <div class="col-lg-3 col-md-6" id="salary3" style="display: <?php echo $sry == "salaryCreation" ? "block":"none"; ?>;">

                                <div class="small-box bg-warning">

                                  <div class="inner">

                                    <h3><i class="fas fa-file-invoice"></i></h3>



                                    <p>Salary Creation</p>

                                    

                                  </div>

                                  <div class="icon">

                                    <i class="fas fa-file-invoice"></i>

                                  </div>

                                  <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                                </div>

                              </div>



                              <!-- --------------------------Close Salary Card --------------- -->



                              <div class="col-lg-3 col-md-6" id="leave1" style="display: <?php echo $lev == "leaveBalance" ? "block":"none"; ?>;">

                                <div class="small-box bg-danger">

                                  <div class="inner">

                                    <h3><i class="fas fa-gifts"></i></h3>



                                    <p>Balance Leave</p>

                                    

                                  </div>

                                  <div class="icon">

                                    <i class="fas fa-gifts"></i>

                                  </div>

                                  <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                                </div>

                              </div>



                              <div class="col-lg-3 col-md-6" id="leave2" style="display: <?php echo $lev == "leaveApply" ? "block":"none"; ?>;">

                                <div class="small-box bg-danger">

                                  <div class="inner">

                                    <h3><i class="fas fa-glass-cheers"></i></h3>



                                    <p>Apply Leave</p>

                                    

                                  </div>

                                  <div class="icon">

                                    <i class="fas fa-glass-cheers"></i>

                                  </div>

                                  <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                                </div>

                              </div>



                              <div class="col-lg-3 col-md-6" id="leave3" style="display: <?php echo $lev == "leaveApproval" ? "block":"none"; ?>;">

                                <div class="small-box bg-danger">

                                  <div class="inner">

                                    <h3><i class="fas fa-mug-hot"></i></h3>



                                    <p>Leaves Approval</p>

                                    

                                  </div>

                                  <div class="icon">

                                    <i class="fas fa-mug-hot"></i>

                                  </div>

                                  <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                                </div>

                              </div>



                              <!-- --------------------------Close Leave Card --------------- -->



                            </div>

                            <div class="row">

                              <div class="col-lg-7 col-md-7 connectedSortable ui-sortable">

                                <div class="card" id="todayreport1" style="display: <?php echo $rpt == "todayReports" ? "block":"none"; ?>;">

                                  <div class="card-header ui-sortable-handle" style="cursor: move;">

                                    <h3 class="card-title">

                                      <i class="fas fa-chart-pie mr-1"></i>

                                      Today Reports

                                    </h3>

                                    <div class="card-tools">

                                <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">

                                  <i class="fas fa-minus"></i>

                                </button>

                                <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">

                                  <i class="fas fa-times"></i>

                                </button>

                              </div>

                                    

                                  </div><!-- /.card-header -->

                                  <div class="card-body p-0">

                                    <div class="tab-content ">

                                      <!-- Morris chart - Sales -->

                                      

                                      <div class="card-body">

                                        <canvas id="donutChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>

                                      </div>

                                    </div>

                                  </div><!-- /.card-body -->

                                </div>

                                <div class="card" id="todayreport2" style="display: <?php echo $rpt == "emplReport" ? "block":"none"; ?>;">

                                  <div class="card-header ui-sortable-handle" style="cursor: move;">

                                    <h3 class="card-title">

                                      <i class="fas fa-chart-pie mr-1"></i>

                                      My Monthly Reports

                                    </h3>

                                    <div class="card-tools">

                                <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">

                                  <i class="fas fa-minus"></i>

                                </button>

                                <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">

                                  <i class="fas fa-times"></i>

                                </button>

                              </div>

                                    

                                  </div><!-- /.card-header -->

                                  <div class="card-body p-0">

                                    <div class="tab-content ">

                                      <!-- Morris chart - Sales -->

                                      

                                      <div class="card-body">

                                        <canvas id="donutChart1" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>

                                      </div>

                                    </div>

                                  </div><!-- /.card-body -->

                                </div>

                                <div class="card" id="todayreport3" style="display: <?php echo $rpt == "walloFame" ? "block":"none"; ?>;">
                                  <div class="progress proheader">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" style="width:100%">Wall Of Fame</div>
                                  </div>
                                  <div class="card-body p-0">

                                    <div class="card-body wallofame">

                                        <div class="row">
                                          <div class="col-lg-6 col-md-6">
                                            <div class="wall-card">
                                              <div class="wall-head">Employee of the Month</div>
                                              <div class="wall-body">

                                                <div class="wall-img mt-2">
                                                  
                                                   <img class="profile-user-img img-fluid " src="<?php echo BSURL;?>assets/dist/img/user2-160x160.jpg" alt="User profile picture">
                                                </div>
                                               <div class="wall-content ">
                                                
                                                    <table width="100%">
                                                      <tr>
                                                        <th>IT-00</th>
                                                      </tr>
                                                      <tr>
                                                        <th>Employee Name</th>
                                                      </tr>
                                                    </table>
                                                    <div class="dropdown-divider"></div>
                                                </div>
                                              </div>
                                            </div>  
                                          </div>
                                          <div class="col-lg-6 col-md-6">
                                            <div class="wall-card">
                                              <div class="wall-head">Employee of the Rising Star</div>
                                              <div class="wall-body">

                                                <div class="wall-img mt-2">
                                                  
                                                   <img class="profile-user-img img-fluid " src="<?php echo BSURL;?>assets/dist/img/user2-160x160.jpg" alt="User profile picture">
                                                </div>
                                               <div class="wall-content ">
                                                
                                                    <table width="100%">
                                                      <tr>
                                                        <th>IT-00</th>
                                                      </tr>
                                                      <tr>
                                                        <th>Employee Name</th>
                                                      </tr>
                                                    </table>
                                                    <div class="dropdown-divider"></div>
                                                </div>
                                              </div>
                                            </div>  
                                          </div>
                                        </div>

                                    </div>

                                  </div><!-- /.card-body -->

                                </div>

                              </div>

                              <div class="col-lg-5 col-md-5">

                                <div class="card" style="background: #d3e1e3; display: <?php echo $hols != "" ? "block":"none"; ?>;" id="anualholi">

                                  <div class="card-body">

                                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                                    

                                    <div class="carousel-inner">

                                      <div class="carousel-item active">

                                        <div class="dashints">

                                          <h3>Annual Holidays</h3>

                                          <span>inoday Inc</span>

                                        </div>

                                      </div>

                                      

                                    </div>

                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">

                                      <span class="carousel-control-custom-icon" aria-hidden="true">

                                        <i class="fas fa-caret-left"></i>

                                      </span>

                                      <span class="sr-only">Previous</span>

                                    </a>

                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">

                                      <span class="carousel-control-custom-icon" aria-hidden="true">

                                        <i class="fas fa-caret-right"></i>

                                      </span>

                                      <span class="sr-only">Next</span>

                                    </a>

                                  </div>

                                </div>

                                </div>



                                <!-- --------------------------- Holiday Card -------------------- -->





                                <div class="card" id="cupevents" style="display: <?php echo $upc != "" ? "block":"none"; ?>;">

                                  <div class="card-header">



                                    <h3 class="card-title">

                                      <i class="far fa-calendar-alt"></i>

                                      Upcoming Events

                                    </h3>

                                    <!-- tools card -->

                                   

                                  </div>

                                  <!-- /.card-header -->

                                  <div class="card-body p-1">

                                    <div id="eventcalander" class="carousel slide" data-ride="carousel" data-interval="false">

                                      

                                      <div class="carousel-inner">

                                        

                                       

                                       

                                          <div class="carousel-item active">

                                          <div class="dashevent mb-3">

                                            <h3><?php echo date('F');?></h3>

                                          </div>

                                        </div>

                                      <a class="carousel-control-prev prevent text-dark" href="#eventcalander" role="button" data-slide="prev">

                                        <span class="carousel-control-custom-icon" aria-hidden="true">

                                          <i class="fas fa-caret-left"></i>

                                        </span>

                                        <span class="sr-only">Previous</span>

                                      </a>

                                      <a class="carousel-control-next prevent text-dark" href="#eventcalander" role="button" data-slide="next">

                                        <span class="carousel-control-custom-icon" aria-hidden="true">

                                          <i class="fas fa-caret-right"></i>

                                        </span>

                                        <span class="sr-only">Next</span>

                                      </a>

                                    </div>

                                  </div>

                                  <!-- /.card-body -->

                                </div>

                              </div>

                            </div>

                          </div>



                          <div class="row">

                            <div class="col-md-12">

                              <div class="card" style="display: <?php echo $tem != "" ? "block":"none"; ?>;" id="teampage">

                                  <div class="card-header">

                                    SOD & EOD Reports

                                    <div class="card-tools">

                              <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">

                                <i class="fas fa-minus"></i>

                              </button>

                              <button type="button" class="btn bg-danger btn-sm" data-card-widget="remove">

                                <i class="fas fa-times"></i>

                              </button>

                            </div>

                                  </div>



                                  <div class="card-body">

                                    <div class="timeline">

                                <!-- timeline time label -->

                                <div class="time-label">

                                  <span class="bg-red"><?php echo date('d F');?></span>

                                </div>

                                

                            </div>

                                  </div>                  

                              </div>

                          </div>

                        </div>



                        </div>

                      </div>



                    </div>

                  </div>

                  <?php

                }

                ?>

              

            

          </div>

        

        <!-- /.row -->

        

      </div><!-- /.container-fluid -->

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->

  

  <script src="<?php echo BSURL;?>assets/dist/js/pages/dashboard-manager.js"></script>

  <script src="<?php echo BSURL;?>assets/dist/js/pages/dashboard.js"></script>

 <?php

include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/footer.php';

?>