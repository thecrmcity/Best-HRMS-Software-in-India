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

    <?php
    if(isset($_GET['case']) && isset($_GET['url']))
    {
      $case = $_GET['case'];
      $url = $_GET['url'];
      $pageurl = $siteaim = basename($case,'.php');
      $pagenam = ucwords(str_replace('-', ' ', $pageurl));

    }
    ?>
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card">
          <div class="card-header">
            <div class="card-title">
              <?php echo $url != "" ? $pagenam:"";?>
            </div>
            <div class="card-tools">
              <a href="<?php echo VIEW.$pagename."/".$url;?>" class="btn btn-sm btn-primary"><i class="fas fa-file-excel"></i> Download Report</a>
            </div>
          </div>
          <div class="card-body">
            <?php
            if(isset($_GET['case']))
            {
              $case = $_GET['case'];
              switch($case)
              {
                case "Employee-Details":
                ?>
                <div class="table-responsive emptable">
              <table class="table table-bordered table-striped">

                  <thead class="bg-secondary sticky-top">

                    <th>Sr. No.</th>

                    <th>Employee ID</th>

                    <th>Employee Name</th>
                    <th>Joining Date</th>
                    <th>Designation</th>
                    <th>Department</th>
                    <th>Email Address</th>

                    <th>Mobile Number</th>

                    <th>Reporting Manager</th>
                    <th>Status</th>


                    

                  </thead>

                  <tbody>

                    <?php

                    $table = "in_employee";
                    $cond = " `in_compid`='$comid' AND `in_delete`='1' ORDER BY `in_empid` ASC ";

                    $select = new Selectall();

                    $res = $select->getallCond($table,$cond);

                      $xl =1;
                      foreach($res as $rs)

                      {

                        $design = $rs['in_designation'];

                        $table = "in_master_card";
                        $cond = " `in_sno`='$design' ";
                        $select = new Selectall();
                        $desi = $select->getcondData($table,$cond);
                        if($desi != "")
                        {
                          $dmast = $desi['in_relation'];
                        }

                        $dept = $rs['in_department'];

                        $table = "in_master_card";
                        $cond = " `in_sno`='$dept' ";
                        $select = new Selectall();
                        $depts = $select->getcondData($table,$cond);
                        if($depts != "")
                        {
                          $dpval = $depts['in_prefix'];
                        }

                        $rept = $rs['in_reporting'];

                        $table = "in_employee";
                        $cond = " `in_empid`='$rept' ";
                        $select = new Selectall();
                        $empt = $select->getcondData($table,$cond);
                        if($empt != "")
                        {
                          $remon = $empt['in_fname']." ".$empt['in_lname'];
                        }

                        $rno = $rs['in_emprefix'];

                        $table = "in_master_card";
                        $cond = " `in_sno`='$rno'";
                        $select = new Selectall();
                        $pres = $select->getcondData($table,$cond);
                        if($pres != "")
                        {
                          $prefix = $pres['in_prefix'];
                        }
                        

                        ?>

                        <tr>

                        <td><?php echo $xl;?></td>

                        <td><?php echo $prefix.$rs['in_empid'];?></td>

                        <td><?php echo $rs['in_fname']." ".$rs['in_lname'];?></td>
                        <td><?php echo date('d-m-Y', strtotime($rs['in_dateofjoining']));?></td>
                        <td><?php

                          
                          if($dmast == "masterDesignation")
                          {
                            echo "<span>M</span> ".$desi['in_prefix'];
                          }
                          else
                          {
                            echo $desi['in_prefix'];
                          }
                         

                        ?></td>
                        <td><?php echo $dpval;?></td>
                        <td><?php echo $rs['in_email'];?></td>

                        

                        <td><?php echo $rs['in_mobileno'];?></td>
                        <td><?php echo $remon;?></td>
                        <td><?php echo "Active";?></td>

                      </tr>

                        <?php

                        $xl++;

                      }

                    ?>

                  </tbody>

                </table>
            </div>
                <?php
                break;
                case "Employee-CTC-Details":
                ?>
                <div class="table-responsive emptable">
                <table class="table table-bordered table-striped">
                  <thead class="bg-secondary sticky-top">
                      <th>Sr. No.</th>
                      <th>Employee ID</th>
                      <th>Employee Name</th>
                      <th>Joining Date</th>
                      <th>Basic</th>
                      <th>HRA</th>
                      <th>LTA</th>
                      <th>Other Allowances</th>
                      <th>ESI</th>
                      <th>EPF</th>
                    </thead>
                    <tbody>
                      <tbody>
                        <tr class="text-center">
                          <td colspan="10">No Data</td>
                        </tr>
                      </tbody>
                    </tbody>
                  </table>
                </div>
                <?php
                break;
                case "Reimbursement-Summary":
                ?>
                <div class="table-responsive emptable">
                <table class="table table-bordered table-striped">
                  <thead class="bg-secondary sticky-top">
                      <th>Sr. No.</th>
                      <th>Employee ID</th>
                      <th>Employee Name</th>
                      <th>Joining Date</th>
                      <th>Basic</th>
                      <th>HRA</th>
                      <th>LTA</th>
                      <th>Other Allowances</th>
                      <th>ESI</th>
                      <th>EPF</th>
                    </thead>
                    <tbody>
                      <tr class="text-center">
                        <td colspan="10">No Data</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <?php
                break;
                case "Employees-Perquisite-Summary":
                ?>
                <div class="table-responsive emptable">
                <table class="table table-bordered table-striped">
                  <thead class="bg-secondary sticky-top">
                      <th>Sr. No.</th>
                      <th>Employee ID</th>
                      <th>Employee Name</th>
                      <th>Joining Date</th>
                      <th>Basic</th>
                      <th>HRA</th>
                      <th>LTA</th>
                      <th>Other Allowances</th>
                      <th>ESI</th>
                      <th>EPF</th>
                    </thead>
                    <tbody>
                      <tr class="text-center">
                        <td colspan="10">No Data</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <?php
                break;
                case "Employees-Full-and-Final-Settlement":
                ?>
                <div class="table-responsive emptable">
                <table class="table table-bordered table-striped">
                  <thead class="bg-secondary sticky-top">
                      <th>Sr. No</th>
                      <th>Employee ID</th>
                      <th>Employee Name</th>
                      <th>Joining Date</th>
                      <th>Inactive Date</th>
                      <th>FNF Date</th>
                      <th>LTA</th>
                      <th>Other Allowances</th>
                      <th>ESI</th>
                      <th>EPF</th>
                    </thead>
                    <tbody>
                      <tr class="text-center">
                        <td colspan="10">No Data</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <?php
                break;
                case "EPF-Summary":
                ?>
                <div class="table-responsive emptable">
                <table class="table table-bordered table-striped">
                  <thead class="bg-secondary sticky-top">
                      <th>Sr. No</th>
                      <th>Employee ID</th>
                      <th>Employee Name</th>
                      <th>Joining Date</th>
                      <th>Inactive Date</th>
                      <th>FNF Date</th>
                      <th>LTA</th>
                      <th>Other Allowances</th>
                      <th>ESI</th>
                      <th>EPF</th>
                    </thead>
                    <tbody>
                      <tr class="text-center">
                        <td colspan="10">No Data</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <?php
                break;
                case "EPF-ECR-Report":
                ?>
                <div class="table-responsive emptable">
                <table class="table table-bordered table-striped">
                  <thead class="bg-secondary sticky-top">
                      <th>Sr. No</th>
                      <th>Employee ID</th>
                      <th>Employee Name</th>
                      <th>Joining Date</th>
                      <th>Inactive Date</th>
                      <th>FNF Date</th>
                      <th>LTA</th>
                      <th>Other Allowances</th>
                      <th>ESI</th>
                      <th>EPF</th>
                    </thead>
                    <tbody>
                      <tr class="text-center">
                        <td colspan="10">No Data</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <?php
                break;
                case "ESI-Summary":
                ?>
                <div class="table-responsive emptable">
                <table class="table table-bordered table-striped">
                  <thead class="bg-secondary sticky-top">
                      <th>Sr. No</th>
                      <th>Employee ID</th>
                      <th>Employee Name</th>
                      <th>Joining Date</th>
                      <th>Inactive Date</th>
                      <th>FNF Date</th>
                      <th>LTA</th>
                      <th>Other Allowances</th>
                      <th>ESI</th>
                      <th>EPF</th>
                    </thead>
                    <tbody>
                      <tr class="text-center">
                        <td colspan="10">No Data</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <?php
                break;
                case "ESIC-Return-Report":
                ?>
                <div class="table-responsive emptable">
                <table class="table table-bordered table-striped">
                  <thead class="bg-secondary sticky-top">
                      <th>Sr. No</th>
                      <th>Employee ID</th>
                      <th>Employee Name</th>
                      <th>Joining Date</th>
                      <th>Inactive Date</th>
                      <th>FNF Date</th>
                      <th>LTA</th>
                      <th>Other Allowances</th>
                      <th>ESI</th>
                      <th>EPF</th>
                    </thead>
                    <tbody>
                      <tr class="text-center">
                        <td colspan="10">No Data</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <?php
                break;
                case "PT-Summary":
                ?>
                <div class="table-responsive emptable">
                <table class="table table-bordered table-striped">
                  <thead class="bg-secondary sticky-top">
                      <th>Sr. No</th>
                      <th>Employee ID</th>
                      <th>Employee Name</th>
                      <th>Joining Date</th>
                      <th>Inactive Date</th>
                      <th>FNF Date</th>
                      <th>LTA</th>
                      <th>Other Allowances</th>
                      <th>ESI</th>
                      <th>EPF</th>
                    </thead>
                    <tbody>
                      <tr class="text-center">
                        <td colspan="10">No Data</td>
                      </tr>
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