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
        <div class="card rounded-0">
          <div class="card-header">
            <div class="card-title">
             <i class="fas fa-list"></i> Approval Hierarchy
            </div>
            <div class="card-tools">
              
            </div>
          </div>
          <?php
          if(isset($_GET['id']))
          {
            $id = $_GET['id'];
            $table = "in_hierarchy";
            $cond = " `in_hierarchyid`='$id'  ";
            $select = new Selectall();
            $ems = $select->getcondData($table,$cond);
            if($ems != "")
            {
              $hrname = $ems["in_hierarchyname"];
              $hrfor = $ems['in_hierarchyfor'];
              $hrhead1 = $ems['in_headid'];
              $hrhead2 = $ems['in_headid2'];
              $hrhead3 = $ems['in_headid3'];

              $hrlevel1 = $ems['in_headlevel'];
              $hrlevel2 = $ems['in_headlevel2'];
              $hrlevel3 = $ems['in_headlevel3'];

              $hrlimit1 = $ems['in_limitday'];
              $hrlimit2 = $ems['in_limitday2'];
              $hrlimit3 = $ems['in_limitday3'];


            }
            $act = "updateHierarchy&id=$id";
          }
          else
          {
            $act = "insertHierarchy";
            $hrname = "";
            $hrfor = "";
            $hrhead1 = "";
            $hrhead2 = "";
            $hrhead3 = "";

            $hrlevel1 = "";
            $hrlevel2 = "";
            $hrlevel3 = "";

            $hrlimit1 = 0;
            $hrlimit2 = 0;
            $hrlimit3 = 0;
          }

          ?>
          <form class="" method="POST" action="<?php echo BSURL?>functions/setting.php?case=<?php echo $act;?>">
          <div class="card-body">
              <div class="row">
                <div class="col-lg-5 col-md-5">
                  <div class="form-group">
                    <label>Hierarchy Name</label>
                    <input type="text" name="archyname" class="form-control" required placeholder="Hierarchy Name" value="<?php echo $hrname;?>">
                  </div>
                  <div class="form-group">
                  <span>Hierarchy For</span>
                  <select class="form-control" name="archypage">
                    <option value="">--Select--</option>
                    <option value="Attendance" <?php echo $hrfor == "Attendance"? "Selected":""; ?>>Attendance Approval</option>
                    <option value="Leave" <?php echo $hrfor == "Leave"? "Selected":""; ?>>Leave Approval</option>
                    <option value="Riebursement" <?php echo $hrfor == "Riebursement"? "Selected":""; ?>>Riebursement Approval</option>
                  </select>
                  </div>
                  
                    <?php
                    if(!isset($_GET['id']))
                    {
                      ?>
                      <div class="form-group">
                      <span>Assign To</span>
                        <select class="form-control" name="assignpage" id="assignpage">
                          <option value="">--Select--</option>
                          <option value="All">All Employee</option>
                          <option value="Department">Department</option>
                          <option value="Designation">Designation</option>
                          <option value="Groups">Group</option>
                        </select>
                        </div>
                        <div id="assignto"></div>
                      <?php
                    }
                    ?>
                  
                  
                  <table class="table table-bordered">

                    <thead class="bg-secondary">

                      <th>Master Employee</th>

                      <th>Assign Level</th>

                      <th width="80px">Days</th>

                    </thead>

                    <tbody>
                    <tr>
                    <td><select class="form-control form-control-sm rounded-0" name="reporting1" required>
                    <option value="">--Select--</option>
                      <?php
                          $table = "in_employee";
                          $cond = " `in_compid`='$comid' AND `in_delete`='1' ";
                          $select = new Selectall();
                          $emicode = $select->getallCond($table,$cond);
                          if(!empty($emicode))
                          {
                            foreach($emicode as $amc)
                            {
                              $codname = $amc['in_fname']." ".$amc['in_lname'];
                              $codempi = $amc['in_empid'];
                              $posid = $amc['in_designation'];
                              $select = new Selectall();
                              $gtpos = $select->getPosition($posid);
                                                                                          
                              ?>
                              <optgroup label="<?php echo $gtpos;?>"><option value="<?php echo $codempi;?>" <?php echo $codempi == $hrhead1 ? "Selected":"";?>><?php echo $codname;?></option></optgroup><?php
                            }
                            
                          
                          
                        }
                         ?></select></td>
                         <td><select class="form-control form-control-sm rounded-0" name="heirarchylevel1" required><option value="1" <?php echo $hrlevel1 == "1"? "selected":""; ?>>Level 1</option><option value="2" <?php echo $hrlevel2 == "2"? "selected":""; ?>>Level 2</option><option value="3" <?php echo $hrlevel3 == "3"? "selected":""; ?>>Level 3</option></select></td>
                         <td><input type="number" class="form-control form-control-sm rounded-0" name="limitday1" value="<?php echo $hrlimit1;?>" required></td>
                        </tr>
                        <tr>
                    <td><select class="form-control form-control-sm rounded-0" name="reporting2">
                    <option value="">--Select--</option>
                      <?php
                          $table = "in_employee";
                          $cond = " `in_compid`='$comid' AND `in_delete`='1' ";
                          $select = new Selectall();
                          $emicode = $select->getallCond($table,$cond);
                          if(!empty($emicode))
                          {
                            foreach($emicode as $amc)
                            {
                              $codname = $amc['in_fname']." ".$amc['in_lname'];
                              $codempi = $amc['in_empid'];
                              $posid = $amc['in_designation'];
                              $select = new Selectall();
                              $gtpos = $select->getPosition($posid);
                                                                                          
                              ?>
                              <optgroup label="<?php echo $gtpos;?>"><option value="<?php echo $codempi;?>" <?php echo $codempi == $hrhead2 ? "Selected":"";?>><?php echo $codname;?></option></optgroup><?php
                            }
                            
                          
                          
                        }
                         ?></select></td>
                         <td><select class="form-control form-control-sm rounded-0" name="heirarchylevel2"><option value="1" <?php echo $hrlevel1 == "1"? "Selected":""; ?>>Level 1</option><option value="2" <?php echo $hrlevel2 == "2"? "selected":""; ?>>Level 2</option><option value="3" <?php echo $hrlevel3 == "3"? "selected":""; ?>>Level 3</option></select></td>
                         <td><input type="number" class="form-control form-control-sm rounded-0" name="limitday2" value="<?php echo $hrlimit1;?>"></td>
                        </tr>
                        <tr>
                    <td><select class="form-control form-control-sm rounded-0" name="reporting3">
                      <option value="">--Select--</option>
                      <?php
                          $table = "in_employee";
                          $cond = " `in_compid`='$comid' AND `in_delete`='1' ";
                          $select = new Selectall();
                          $emicode = $select->getallCond($table,$cond);
                          if(!empty($emicode))
                          {
                            foreach($emicode as $amc)
                            {
                              $codname = $amc['in_fname']." ".$amc['in_lname'];
                              $codempi = $amc['in_empid'];
                              $posid = $amc['in_designation'];
                              $select = new Selectall();
                              $gtpos = $select->getPosition($posid);
                                                                                          
                              ?>
                              <optgroup label="<?php echo $gtpos;?>"><option value="<?php echo $codempi;?>" <?php echo $codempi == $hrhead3 ? "Selected":"";?>><?php echo $codname;?></option></optgroup><?php
                            }
                            
                          
                          
                        }
                         ?></select></td>
                         <td><select class="form-control form-control-sm rounded-0" name="heirarchylevel3"><option value="1" <?php echo $hrlevel1 == "1"? "selected":""; ?>>Level 1</option><option value="2" <?php echo $hrlevel2 == "2"? "selected":""; ?>>Level 2</option><option value="3" <?php echo $hrlevel3 == "3"? "selected":""; ?>>Level 3</option></select></td>
                         <td><input type="number" class="form-control form-control-sm rounded-0" name="limitday3" value="<?php echo $hrlimit1;?>"></td>
                        </tr>

                      

                    </tbody>

                  </table>
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary px-3" value="Submit"> 
                  </div>
                </div>
                <div class="col-lg-7 col-md-7">
                  <div class="table-responsive emptable">
                    <table class="table table-bordered table-striped">
                      <thead class="bg-secondary">
                        
                        <th>EmpID</th>
                        <th>Employee Name</th>
                        <th>Designation</th>
                        <th>Department</th>
                        <th>Reporting</th>
                        <th width="50px">
                          <div class="custom-control custom-switch">
                             <input type="checkbox" class="chk_all custom-control-input" id="customSwitch1">
                             <label class="custom-control-label" for="customSwitch1"></label>
                            </div>
                          </th>
                      </thead>
                      <?php
                      if(!isset($_GET['id']))
                      {
                        ?>
                        <tbody id="empdata">
                      </tbody>
                        <?php
                      }
                      else
                      {
                        ?>
                        <tbody>
                          <?php
                            $id = $_GET['id'];
                            $table = "in_hierarchy";
                            $cond = " in_hierarchyid='$id' ";
                            $select = new Selectall();
                            $seldata = $select->getallCond($table,$cond);
                            if(!empty( $seldata ))
                            {
                                foreach( $seldata as $amc)
                                {
                                  $emi = $amc['in_empid'];
                                  $table = "in_employee";
                                  $cond = " `in_empid`='$emi' ";
                                  $select = new Selectall();
                                  $ims = $select->getcondData($table,$cond);
                                  if($ims != "")
                                  {
                                    $per = $ims['in_emprefix'];
                                    ?>
                                      <tr>
                                        <td><?php echo $select->empPrefix($emi).$ims['in_empid'];?></td>
                                        <td><?php echo $ims['in_fname']." ".$ims['in_lname'];?></td>
                                        <td><?php echo $select->emPosition($emi);?></td>
                                        <td><?php echo $select->emDepartment($emi);?></td>
                                        <td><?php echo $select->empReporting($emi);?></td>
                                        <td><input type="checkbox" name="cantrash[]" value="<?php echo $emi;?>" class="chk_me" checked></td>
                                      </tr>
                                    <?php
                                  }
                                  ?>

                                  <?php
                                }
                            }
                          ?>
                        </tbody>
                        <?php
                      }
                      ?>
                      
                    </table>
                  </div>
                </div>
              
              </div>
          </div>
          </form>
        </div>
        
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
    $(document).ready(function(){
      $("#assignpage").on('change', function(){
        var assign = $("#assignpage").val();
        
        switch(assign)
        {
          case "All":
            $.ajax({
              url : "global-ajax.php",
              type : "GET",
              data : {case:'approval',id:assign},
              success : function(data){
                $("#empdata").html(data);
              }
          });
          break;
          case "Department":
            $.ajax({
              url : "global-ajax.php",
              type : "GET",
              data : {case:'approval',id:assign},
              success : function(data){
                $("#assignto").html(data);

                $("#assignfil").on('change', function(){
                    var assignfil = $("#assignfil").val();
                    $.ajax({
                      url : "global-ajax.php",
                      type : "GET",
                      data : {case:'approval',id:'Departmentval',val:assignfil},
                      success : function(data){
                        $("#empdata").html(data);
                      }
                    });
                });
              }
          });
          break;
          case "Designation":
            $.ajax({
              url : "global-ajax.php",
              type : "GET",
              data : {case:'approval',id:assign},
              success : function(data){
                $("#assignto").html(data);

                $("#assignfil").on('change', function(){
                    var assignfil = $("#assignfil").val();
                    $.ajax({
                      url : "global-ajax.php",
                      type : "GET",
                      data : {case:'approval',id:'Designationval',val:assignfil},
                      success : function(data){
                        $("#empdata").html(data);
                      }
                    });
                });
              }
          });
          break;
        }
        
      });
    });
  </script>
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