<?php
$pagename = basename(__DIR__);
$fullPage = ucwords($pagename);
$siteaim = basename($_SERVER['SCRIPT_FILENAME'],'.php');
$sitename = str_replace('-', ' ', $siteaim);
$bsurl = dirname(dirname(__DIR__));
include_once $bsurl.'/inc/header.php';
include_once $bsurl.'/inc/sidebar.php';
$define = new Predefine();
$define->masterSetup();
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
          <?php
          $table = "in_controller";
          $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='masterSetup' AND `in_action`='1' ";
          $select = new Selectall();
          $mcard = $select->getcondData($table,$cond);
          if($mcard != "" )
          {
            ?>
            <div class="col-md-3 col-sm-6 col-12">
            <a href="<?php echo VIEW.$pagename?>/master-setup.php" class="info-box btn-default">
              <span class="info-box-icon border bg-indigo"><i class="fas fa-exclamation-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Master Setup</span>
                
              </div>
              <span class="small-box-footer text-indigo">
                <i class="fas fa-arrow-circle-right"></i>
              </span>
            </a>
          </div>
            <?php
          }
          
          $table = "in_controller";
          $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='companyCreate' AND `in_action`='1' ";
          $select = new Selectall();
          $mcard = $select->getcondData($table,$cond);
          if($mcard != "" )
          {
            ?>
            <div class="col-md-3 col-sm-6 col-12">
            <a href="<?php echo VIEW.$pagename?>/company-creation.php" class="info-box btn-default">
              <span class="info-box-icon border bg-lightblue"><i class="fas fa-exclamation-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Company Creation</span>
                
              </div>
              <span class="small-box-footer text-lightblue">
                <i class="fas fa-arrow-circle-right"></i>
              </span>
            </a>
          </div>
            <?php
          }
          $table = "in_controller";
          $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='workShift' AND `in_action`='1' ";
          $select = new Selectall();
          $mcard = $select->getcondData($table,$cond);
          if($mcard != "" )
          {
            ?>
            <div class="col-md-3 col-sm-6 col-12">
            <a href="<?php echo VIEW.$pagename?>/shift-creation.php" class="info-box btn-default">
              <span class="info-box-icon border bg-pink"><i class="fas fa-exclamation-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Shift Creation</span>
                
              </div>
              <span class="small-box-footer text-pink">
                <i class="fas fa-arrow-circle-right"></i>
              </span>
            </a>
          </div>
            <?php
          }
          $table = "in_controller";
          $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='assignShift' AND `in_action`='1' ";
          $select = new Selectall();
          $mcard = $select->getcondData($table,$cond);
          if($mcard != "" )
          {
            ?>
            <div class="col-md-3 col-sm-6 col-12">
            <a href="<?php echo VIEW.$pagename?>/assign-shifts.php" class="info-box btn-default">
              <span class="info-box-icon border bg-fuchsia"><i class="fas fa-exclamation-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Assign Shift</span>
                
              </div>
              <span class="small-box-footer text-fuchsia">
                <i class="fas fa-arrow-circle-right"></i>
              </span>
            </a>
          </div>
            <?php
          }
          $table = "in_controller";
          $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='workingLocation' AND `in_action`='1' ";
          $select = new Selectall();
          $mcard = $select->getcondData($table,$cond);
          if($mcard != "" )
          {
            ?>
            <div class="col-md-3 col-sm-6 col-12">
            <a href="<?php echo VIEW.$pagename?>/working-location.php" class="info-box btn-default">
              <span class="info-box-icon border bg-maroon"><i class="fas fa-exclamation-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Working Location</span>
                
              </div>
              <span class="small-box-footer text-maroon">
                <i class="fas fa-arrow-circle-right"></i>
              </span>
            </a>
          </div>
            <?php
          }
          $table = "in_controller";
          $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='worldCity' AND `in_action`='1' ";
          $select = new Selectall();
          $mcard = $select->getcondData($table,$cond);
          if($mcard != "" )
          {
            ?>
            <div class="col-md-3 col-sm-6 col-12">
            <a href="<?php echo VIEW.$pagename?>/world-city.php" class="info-box btn-default">
              <span class="info-box-icon border bg-purple"><i class="fas fa-exclamation-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">World City</span>
                
              </div>
              <span class="small-box-footer text-purple">
                <i class="fas fa-arrow-circle-right"></i>
              </span>
            </a>
          </div>
            <?php
          }
          $table = "in_controller";
          $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='regionCode' AND `in_action`='1' ";
          $select = new Selectall();
          $mcard = $select->getcondData($table,$cond);
          if($mcard != "" )
          {
            ?>
            <div class="col-md-3 col-sm-6 col-12">
            <a href="<?php echo VIEW.$pagename?>/country-code.php" class="info-box btn-default">
              <span class="info-box-icon border bg-olive"><i class="fas fa-exclamation-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Country Code</span>
                
              </div>
              <span class="small-box-footer text-olive">
                <i class="fas fa-arrow-circle-right"></i>
              </span>
            </a>
          </div>
            <?php
          }
          
          
          $table = "in_controller";
          $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='multilevelGroup' AND `in_action`='1' ";
          $select = new Selectall();
          $mcard = $select->getcondData($table,$cond);
          if($mcard != "" )
          {
            ?>
            <div class="col-md-3 col-sm-6 col-12">
            <a href="<?php echo VIEW.$pagename?>/multi-level-group.php" class="info-box btn-default">
              <span class="info-box-icon border bg-info"><i class="fas fa-exclamation-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Multi Level Group</span>
                
              </div>
              <span class="small-box-footer text-info">
                <i class="fas fa-arrow-circle-right"></i>
              </span>
            </a>
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