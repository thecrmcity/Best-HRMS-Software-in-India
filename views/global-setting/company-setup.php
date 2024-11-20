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

          $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='comDetails' AND `in_action`='1' ";

          $select = new Selectall();

          $mcard = $select->getcondData($table,$cond);

          if($mcard != "")

          {

            ?>

            <div class="col-md-3 col-sm-6 col-12">

            <a href="<?php echo VIEW.$pagename?>/company-details.php" class="info-box btn-default">

              <span class="info-box-icon border bg-indigo"><i class="fas fa-exclamation-circle"></i></span>



              <div class="info-box-content">

                <span class="info-box-text">Company Details</span>

                

              </div>

              <span class="small-box-footer text-indigo">

                <i class="fas fa-arrow-circle-right"></i>

              </span>

            </a>

          </div>

            <?php

          }

          

          $table = "in_controller";

          $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='weekOff' AND `in_action`='1' ";

          $select = new Selectall();

          $mcard = $select->getcondData($table,$cond);

          if($mcard != "")

          {

            ?>

            <div class="col-md-3 col-sm-6 col-12">

            <a href="<?php echo VIEW.$pagename?>/week-off.php" class="info-box btn-default">

              <span class="info-box-icon border bg-lightblue"><i class="fas fa-exclamation-circle"></i></span>



              <div class="info-box-content">

                <span class="info-box-text">Week Off</span>

                

              </div>

              <span class="small-box-footer text-lightblue">

                <i class="fas fa-arrow-circle-right"></i>

              </span>

            </a>

          </div>

            <?php

          }

          $table = "in_controller";

          $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='smtpAccess' AND `in_action`='1' ";

          $select = new Selectall();

          $mcard = $select->getcondData($table,$cond);

          if($mcard != "")

          {

            ?>

            <div class="col-md-3 col-sm-6 col-12">

            <a href="<?php echo VIEW.$pagename?>/email-setup.php" class="info-box btn-default">

              <span class="info-box-icon border bg-pink"><i class="fas fa-exclamation-circle"></i></span>



              <div class="info-box-content">

                <span class="info-box-text">Email Setup</span>

                

              </div>

              <span class="small-box-footer text-pink">

                <i class="fas fa-arrow-circle-right"></i>

              </span>

            </a>

          </div>

            <?php

          }

          $table = "in_controller";

          $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='masterCard' AND `in_action`='1' ";

          $select = new Selectall();

          $mcard = $select->getcondData($table,$cond);

          if($mcard != "")

          {

            ?>

            <div class="col-md-3 col-sm-6 col-12">

            <a href="<?php echo VIEW.$pagename?>/master-card.php" class="info-box btn-default">

              <span class="info-box-icon border bg-fuchsia"><i class="fas fa-exclamation-circle"></i></span>



              <div class="info-box-content">

                <span class="info-box-text">Master Card</span>

                

              </div>

              <span class="small-box-footer text-fuchsia">

                <i class="fas fa-arrow-circle-right"></i>

              </span>

            </a>

          </div>

            <?php

          }

          $table = "in_controller";

          $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='classicAccess' AND `in_action`='1' ";

          $select = new Selectall();

          $mcard = $select->getcondData($table,$cond);

          if($mcard != "")

          {

            ?>

            <div class="col-md-3 col-sm-6 col-12">

            <a href="<?php echo VIEW.$pagename?>/classification.php" class="info-box btn-default">

              <span class="info-box-icon border bg-maroon"><i class="fas fa-exclamation-circle"></i></span>



              <div class="info-box-content">

                <span class="info-box-text">Classification</span>

                

              </div>

              <span class="small-box-footer text-maroon">

                <i class="fas fa-arrow-circle-right"></i>

              </span>

            </a>

          </div>

            <?php

          }

          $table = "in_controller";

          $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='emailTemplates' AND `in_action`='1' ";

          $select = new Selectall();

          $mcard = $select->getcondData($table,$cond);

          if($mcard != "")

          {

            ?>

            <div class="col-md-3 col-sm-6 col-12">

            <a href="<?php echo VIEW.$pagename?>/email-templates.php" class="info-box btn-default">

              <span class="info-box-icon border bg-purple"><i class="fas fa-exclamation-circle"></i></span>



              <div class="info-box-content">

                <span class="info-box-text">Email Templates</span>

                

              </div>

              <span class="small-box-footer text-purple">

                <i class="fas fa-arrow-circle-right"></i>

              </span>

            </a>

          </div>

            <?php

          }

          $table = "in_controller";

          $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='documnetTemp' AND `in_action`='1' ";

          $select = new Selectall();

          $mcard = $select->getcondData($table,$cond);

          if($mcard != "")

          {

            ?>

            <div class="col-md-3 col-sm-6 col-12">

            <a href="<?php echo VIEW.$pagename?>/document-templates.php" class="info-box btn-default">

              <span class="info-box-icon border bg-olive"><i class="fas fa-exclamation-circle"></i></span>



              <div class="info-box-content">

                <span class="info-box-text">Document Templates</span>

                

              </div>

              <span class="small-box-footer text-olive">

                <i class="fas fa-arrow-circle-right"></i>

              </span>

            </a>

          </div>

            <?php

          }

          $table = "in_controller";

          $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='dashManager' AND `in_action`='1' ";

          $select = new Selectall();

          $mcard = $select->getcondData($table,$cond);

          if($mcard != "")

          {

            ?>

            <div class="col-md-3 col-sm-6 col-12">

            <a href="<?php echo VIEW.$pagename?>/dashboard-manager.php" class="info-box btn-default">

              <span class="info-box-icon border bg-primary"><i class="fas fa-exclamation-circle"></i></span>



              <div class="info-box-content">

                <span class="info-box-text">Dashboard Manager</span>

                

              </div>

              <span class="small-box-footer text-primary">

                <i class="fas fa-arrow-circle-right"></i>

              </span>

            </a>

          </div>

            <?php

          }
          $table = "in_controller";

          $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='approvalHierarchy' AND `in_action`='1' ";

          $select = new Selectall();

          $mcard = $select->getcondData($table,$cond);

          if($mcard != "")

          {

          ?>
          <div class="col-md-3 col-sm-6 col-12">

            <a href="<?php echo VIEW.$pagename?>/approval-hierarchy.php" class="info-box btn-default">

              <span class="info-box-icon border bg-secondary"><i class="fas fa-exclamation-circle"></i></span>



              <div class="info-box-content">

                <span class="info-box-text">Approval Hierarchy</span>

                

              </div>

              <span class="small-box-footer text-secondary">

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