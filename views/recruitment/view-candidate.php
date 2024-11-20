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
              <?php
              if(isset($_GET['can']))
              {
                $can = $_GET['can'];
                $select = new Selectall();
                ?>
                  <i class="fas fa-user"></i> <?php echo $select->getCaname($can);?>
                <?php
              }
              ?>
              
            </div>
            <div class="card-tools">
              <?php
              if(isset($_GET['can']))
              {
                $can = $_GET['can'];
                $select = new Selectall();
                ?>
                  <a href="<?php echo BSURL?>uploads/candidate/<?php echo $select->getResume($can);?>" download class="btn btn-sm btn-primary"><i class="fas fa-download"></i> Download Resume</a>
                <?php
              }
              ?>
              
            </div>
            
          </div>
          <div class="card-body">
              <?php
              if(isset($_GET['can']))
              {
                $can = $_GET['can'];
                $table = "in_candidates";
                $cond = " `in_sno`='$can' AND `in_status`='1' ";
                $select = new Selectall();
                $cans = $select->getcondData($table,$cond);
                if($cans != "")
                {
                  $applypost = $cans['in_applypost'];
                
                  ?>
                    <div class="row">
                      <div class="col-lg-3 col-md-3">
                        <label>Applied Post :</label>
                        <p><?php echo $cans['in_applypost'];?></p>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <label>Candidate Name :</label>
                        <p><?php echo $cans['in_caname'];?></p>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <label>Mobile No :</label>
                        <p><?php echo $cans['in_mobile'];?></p>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <label>Email Address :</label>
                        <p><?php echo $cans['in_email'];?></p>
                      </div>

                      <div class="col-lg-3 col-md-3">
                        <label>Current City :</label>
                        <p><?php echo $cans['in_city'];?></p>
                      </div>

                      <div class="col-lg-3 col-md-3">
                        <label>Current CTC :</label>
                        <p><?php echo $cans['in_ctc'];?></p>
                      </div>

                      <div class="col-lg-3 col-md-3">
                        <label>Expected CTC :</label>
                        <p><?php echo $cans['in_expected'];?></p>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <label>Notice Period :</label>
                        <p><?php echo $cans['in_notice'];?></p>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <label>Last Qualification :</label>
                        <p><?php echo $cans['in_qualification'];?></p>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <label>Expected Date of Joining :</label>
                        <p><?php echo $cans['in_dateofjoin'];?></p>
                      </div>
                      <hr>
                      
                      <div class="col-lg-3 col-md-3">
                        <label>Last Company :</label>
                        <p><?php echo $cans['in_employer'];?></p>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <label>Last Designation :</label>
                        <p><?php echo $cans['in_designation'];?></p>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <label>Technology /Skills :</label>
                        <p><?php echo $cans['in_technology'];?></p>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <label>Fill By :</label>
                        <p><?php $canby = $cans['in_createdby']; echo $select->empName($canby);?></p>
                      </div>
                    </div>
                  <?php
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