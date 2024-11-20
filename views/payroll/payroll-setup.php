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
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <a href="<?php echo VIEW.$pagename?>/salary-setup.php" class="info-box btn-default">
              <span class="info-box-icon border bg-indigo"><i class="fas fa-exclamation-circle"></i></span>
               <div class="info-box-content">
                <span class="info-box-text">Salary Setup</span>
              </div>
              <span class="small-box-footer text-indigo">
                <i class="fas fa-arrow-circle-right"></i>
              </span>
            </a>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <a href="<?php echo VIEW.$pagename?>/tds-reference.php" class="info-box btn-default">
              <span class="info-box-icon border bg-lightblue"><i class="fas fa-exclamation-circle"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">TDS Reference</span>
              </div>
              <span class="small-box-footer text-lightblue">
                <i class="fas fa-arrow-circle-right"></i>
              </span>
            </a>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <a href="<?php echo VIEW.$pagename?>/payroll-budget.php" class="info-box btn-default">
              <span class="info-box-icon border bg-maroon"><i class="fas fa-exclamation-circle"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Payroll Budget</span>
              </div>
              <span class="small-box-footer text-maroon">
                <i class="fas fa-arrow-circle-right"></i>
              </span>
            </a>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <a href="<?php echo VIEW.$pagename?>/full-and-final.php" class="info-box btn-default">
              <span class="info-box-icon border bg-purple"><i class="fas fa-exclamation-circle"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Full & Final Process</span>
              </div>
              <span class="small-box-footer text-purple">
                <i class="fas fa-arrow-circle-right"></i>
              </span>
            </a>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <a href="<?php echo VIEW.$pagename?>/employee-debt.php" class="info-box btn-default">
              <span class="info-box-icon border bg-info"><i class="fas fa-exclamation-circle"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Employee Loan & Advanced</span>
              </div>
              <span class="small-box-footer text-info">
                <i class="fas fa-arrow-circle-right"></i>
              </span>
            </a>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <a href="<?php echo VIEW.$pagename?>/employee-arrears.php" class="info-box btn-default">
              <span class="info-box-icon border bg-olive"><i class="fas fa-exclamation-circle"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Employee Arrears</span>
              </div>
              <span class="small-box-footer text-olive">
                <i class="fas fa-arrow-circle-right"></i>
              </span>
            </a>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <a href="<?php echo VIEW.$pagename?>/reimbursement.php" class="info-box btn-default">
              <span class="info-box-icon border bg-pink"><i class="fas fa-exclamation-circle"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Reimbursement</span>
              </div>
              <span class="small-box-footer text-pink">
                <i class="fas fa-arrow-circle-right"></i>
              </span>
            </a>
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