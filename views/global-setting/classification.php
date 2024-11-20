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
          
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12 col-lg-12 col-md-12">
                <form class="form-inline" method="GET" action="">
                  <select class="form-control rounded-0" name="headid" id="headid" required onchange="headpack()">
                    <option value="">--Select--</option>
                    <?php
                    $table = "in_master_card";
                    $inner = " DISTINCT in_relation ";
                    $cond = " `in_relation` IN ('groups', 'designation', 'department') ";
                    $select = new Selectall();
                    $selDo = $select->getallInnercond($table,$inner,$cond);
                    if(!empty($selDo))
                    {
                      foreach($selDo as $sel)
                      {
                        ?>
                        <option value="<?php echo $sel['in_relation'];?>"><?php echo ucwords($sel['in_relation']);?></option>
                        <?php
                      }
                    }
                    if(isset($adminemail))
                    {
                      ?>
                      <option value="majorgroup">Major Group</option>
                      <?php
                    }
                    ?>
                   <option value="compgroup">Company Group</option>
                   <option value="company">Company</option>
                   <option value="emprefix">Employee Prefix</option>
                   <option value="reporting">Reporting</option>
                  </select>
                  <select class="form-control rounded-0 ml-3" name="design" id="designcard" style="display: none;">
                    <option value="">--Designation--</option>
                    <?php
                    $table = "in_master_card";
                    $cond = " `in_relation`='designation' AND `in_status`='1' ";
                    $select = new Selectall();
                    $selDo = $select->getallCond($table,$cond);
                    if(!empty($selDo))
                    {
                      foreach($selDo as $sel)
                      {
                        ?>
                        <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_prefix'];?></option>
                        <?php
                      }
                    }
                    ?>
                  </select>
                  <select class="form-control rounded-0 ml-3" name="depart" id="depatcard" style="display: none;">
                    <option value="">--Department--</option>
                    <?php
                    $table = "in_master_card";
                    $cond = " `in_relation`='department' AND `in_status`='1' ";
                    $select = new Selectall();
                    $selDo = $select->getallCond($table,$cond);
                    if(!empty($selDo))
                    {
                      foreach($selDo as $sel)
                      {
                        ?>
                        <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_prefix'];?></option>
                        <?php
                      }
                    }
                    ?>
                  </select>
                  <select class="form-control rounded-0 ml-3" name="groups" id="groupcard" style="display: none;">
                    <option value="">--Groups--</option>
                    <?php
                    $table = "in_master_card";
                    $cond = " `in_relation`='groups' AND `in_status`='1' ";
                    $select = new Selectall();
                    $selDo = $select->getallCond($table,$cond);
                    if(!empty($selDo))
                    {
                      foreach($selDo as $sel)
                      {
                        ?>
                        <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_prefix'];?></option>
                        <?php
                      }
                    }
                    ?>
                  </select>
                  <select class="form-control rounded-0 ml-3" name="majorgroup" id="majorcard" style="display: none;">
                    <option value="">--Major Groups--</option>
                    <?php
                    $table = "in_super_card";
                    $cond = " `in_cardrelation`='majorcard' AND `in_status`='1' ";
                    $select = new Selectall();
                    $selDo = $select->getallCond($table,$cond);
                    if(!empty($selDo))
                    {
                      foreach($selDo as $sel)
                      {
                        ?>
                        <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_cardname'];?></option>
                        <?php
                      }
                    }
                    ?>
                  </select>
                  <select class="form-control rounded-0 ml-3" name="compgroup" id="compgroup" style="display: none;">
                    <option value="">--Company Groups--</option>
                    <?php
                    $table = "in_master_card";
                    $cond = " `in_relation`='companyGroup' AND `in_status`='1' ";
                    $select = new Selectall();
                    $selDo = $select->getallCond($table,$cond);
                    if(!empty($selDo))
                    {
                      foreach($selDo as $sel)
                      {
                        ?>
                        <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_prefix'];?></option>
                        <?php
                      }
                    }
                    ?>
                  </select>
                  <select class="form-control rounded-0 ml-3" name="company" id="company" style="display: none;">
                    <option value="">--Company--</option>
                    <?php
                    $table = "in_master_card";
                    $cond = " `in_relation`='company' AND `in_status`='1' ";
                    $select = new Selectall();
                    $selDo = $select->getallCond($table,$cond);
                    if(!empty($selDo))
                    {
                      foreach($selDo as $sel)
                      {
                        ?>
                        <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_prefix'];?></option>
                        <?php
                      }
                    }
                    ?>
                  </select>
                  <select class="form-control rounded-0 ml-3" name="emprefix" id="emprefix" style="display: none;">
                    <option value="">--Prefix ID--</option>
                    <?php
                    $table = "in_master_card";
                    $cond = " `in_relation`='cardPrefix' AND `in_status`='1' ";
                    $select = new Selectall();
                    $selDo = $select->getallCond($table,$cond);
                    if(!empty($selDo))
                    {
                      foreach($selDo as $sel)
                      {
                        ?>
                        <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_prefix'];?></option>
                        <?php
                      }
                    }
                    ?>
                  </select>
                  
                  <input type="submit" class="input-group-text rounded-0" value="GO">
                </form>
                
              </div>
              

            </div>
            <?php
            if(isset($_GET['headid']))
            {
              $headid = $_GET['headid'];
              $groups = @$_GET['groups'];
              $depart = @$_GET['depart'];
              $design = @$_GET['design'];
              $majorgroup = @$_GET['majorgroup'];
              $compgroup = @$_GET['compgroup'];
              $company = @$_GET['company'];
              $emprefix = @$_GET['emprefix'];


              $table = "in_employee";
              $cond = " `in_groupid`='$majorgroup' OR `in_childid`='$groups' OR `in_comgrpid`='$compgroup' OR `in_compid`='$company' OR `in_emprefix`='$emprefix' OR `in_reporting`='' OR `in_designation`='$design' OR `in_department`='$depart' ";
              $select = new Selectall();
              $res = $select->getallCond($table,$cond);
              ?>
              <div class="table-responsive emptable mt-1">
              <table class="table table-bordered table-striped">
                <thead class="sticky-top bg-secondary">
                  <th>No</th>
                  <th>Emp_ID</th>
                  <th>Employee_Name</th>
                  <th>User_Email</th>
                  <th>Designation</th>
                  <th>Department</th>
                  <th>JoiningDate</th>
                  <th>Reporting</th>
                  <th>
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="chk_all custom-control-input" id="customSwitch1">
                     <label class="custom-control-label" for="customSwitch1"></label>
                    </div>
                  </th>
                  
                </thead>
                <tbody>
              <?php
              $xl = 1;
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
                $table = "in_master_card";
                $cond = " `in_sno`='$dept' ";
                $select = new Selectall();
                $mnge = $select->getcondData($table,$cond);
                ?>
                <tr>
                  <td><?php echo $xl;?></td>
                  <td><?php echo $prefix.$rs['in_empid'];?></td>
                  <td><?php echo $rs['in_fname']." ".$rs['in_lname'];?></td>
                  <td><?php echo $rs['in_email'];?></td>
                  <td><?php echo $desi['in_prefix'];?></td>
                  <td><?php echo $depart['in_prefix'];?></td>
                  <td><?php echo $rs['in_dateofjoining'];?></td>
                  <td><?php echo $mnge['in_prefix'];?></td>
                  <td><input type="checkbox" name="cantrash[]" value="<?php echo $rs['in_empid'];?>" class="chk_me"></td>
                </tr>
                <?php
                $xl++;
              }
              ?>
              </tbody>
              </table>
            </div>
              <?php
            }
            ?>
            
                
          </div>
        </div>
        <!-- /.row -->
          
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
  function headpack()
  {
    var groupcard = document.getElementById("groupcard");
    var depatcard = document.getElementById("depatcard");
    var designcard = document.getElementById("designcard");
    var majorcard = document.getElementById("majorcard");
    var compgroup = document.getElementById("compgroup");
    var company = document.getElementById("company");
    var emprefix = document.getElementById("emprefix");
    var reporting = document.getElementById("reporting");


    var headid = document.getElementById("headid").value;
    
    switch(headid)
    {
      case "designation":
        designcard.style.display = "block";
        depatcard.style.display = "none";
        groupcard.style.display = "none";
        majorcard.style.display = "none";
        compgroup.style.display = "none";
        company.style.display = "none";
        emprefix.style.display = "none";
      break;
      case "department":
        depatcard.style.display = "block";
        designcard.style.display = "none";
        groupcard.style.display = "none";
        majorcard.style.display = "none";
        compgroup.style.display = "none";
        company.style.display = "none";
        emprefix.style.display = "none";
      break;
      case "groups":
        groupcard.style.display = "block";
        depatcard.style.display = "none";
        designcard.style.display = "none";
        majorcard.style.display = "none";
        compgroup.style.display = "none";
        company.style.display = "none";
        emprefix.style.display = "none";
      break; 
      case "majorgroup":
        majorcard.style.display = "block";
        groupcard.style.display = "none";
        depatcard.style.display = "none";
        designcard.style.display = "none";
        compgroup.style.display = "none";
        company.style.display = "none";
        emprefix.style.display = "none";
      break;
      case "compgroup":
        compgroup.style.display = "block";
        majorcard.style.display = "none";
        groupcard.style.display = "none";
        depatcard.style.display = "none";
        designcard.style.display = "none";
        company.style.display = "none";
        emprefix.style.display = "none";
      break;
      case "company":
        company.style.display = "block";
        compgroup.style.display = "none";
        majorcard.style.display = "none";
        groupcard.style.display = "none";
        depatcard.style.display = "none";
        designcard.style.display = "none";
        emprefix.style.display = "none";
      break;
      case "emprefix":
        emprefix.style.display = "block";
        company.style.display = "none";
        compgroup.style.display = "none";
        majorcard.style.display = "none";
        groupcard.style.display = "none";
        depatcard.style.display = "none";
        designcard.style.display = "none";
      break;
    default:
        emprefix.style.display = "none";
        company.style.display = "none";
        compgroup.style.display = "none";
        majorcard.style.display = "none";
        groupcard.style.display = "none";
        depatcard.style.display = "none";
        designcard.style.display = "none";
      break;


    }
  }


</script>
 <?php
include_once $bsurl.'/inc/alert.php';
include_once $bsurl.'/inc/footer.php';
?>