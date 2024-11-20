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
          <div class="col-sm-4 col-md-4">
            <h5>Employee Reports</h5>
            <ul class="nav flex-column">
              <li class="nav-item"><a class="nav-link" href="<?php echo VIEW.$pagename?>/view-report.php?case=Employee-Details&url=download-employee.php"> <i class="fas fa-chevron-right"></i> Employee Details</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo VIEW.$pagename?>/view-report.php?case=Employee-CTC-Details&url=ctc-details.php"> <i class="fas fa-chevron-right"></i> Employee's CTC Details</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo VIEW.$pagename?>/view-report.php?case=Reimbursement-Summary&url=reimbursement-sumary.php"><i class="fas fa-chevron-right"></i> Reimbursement Summary</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo VIEW.$pagename?>/view-report.php?case=Employees-Perquisite-Summary&url=emoployee-prequisite.php"><i class="fas fa-chevron-right"></i> Employees' Perquisite Summary</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo VIEW.$pagename ?>/view-report.php?case=Employees-Full-and-Final-Settlement&url=full-n-final.php"><i class="fas fa-chevron-right"></i> Employees' Full and Final Settlement</a></li>
              



            </ul>
          </div>

          <div class="col-sm-4 col-md-4">
            <h5>Statutory Reports</h5>
            <ul class="nav flex-column">
              <li class="nav-item"><a class="nav-link" href="<?php echo VIEW.$pagename ?>/view-report.php?case=EPF-Summary&url=epf-summary.php"><i class="fas fa-chevron-right"></i> EPF Summary</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo VIEW.$pagename ?>/view-report.php?case=EPF-ECR-Report&url=epf-ecr-report.php"><i class="fas fa-chevron-right"></i> EPF-ECR Report</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo VIEW.$pagename ?>/view-report.php?case=ESI-Summary&url=esi-summary.php"><i class="fas fa-chevron-right"></i> ESI Summary</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo VIEW.$pagename ?>/view-report.php?case=ESIC-Return-Report&url=esic-return-report.php"><i class="fas fa-chevron-right"></i> ESIC Return Report</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo VIEW.$pagename ?>/view-report.php?case=PT-Summary&url=pt-summary.php"><i class="fas fa-chevron-right"></i> PT Summary</a></li>
              



            </ul>
          </div>

          <div class="col-sm-4 col-md-4">
            <h5>Payroll Overview</h5>
            <ul class="nav flex-column">
              <li class="nav-item"><a class="nav-link" href="<?php echo VIEW.$pagename ?>/view-report.php?case=Payroll-Summary&url=payroll-summary.php"><i class="fas fa-chevron-right"></i> Payroll Summary</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo VIEW.$pagename ?>/view-report.php?case=Salary-Register-Monthly&url=salary-reg-mon.php"><i class="fas fa-chevron-right"></i> Salary Register - Monthly</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo VIEW.$pagename ?>/view-report.php?case=Employees-Salary-Statement&url=emp-s-statement.php"><i class="fas fa-chevron-right"></i> Employees' Salary Statement</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo VIEW.$pagename?>/view-report.php?case=&url=payroll-liability-sum.php"><i class="fas fa-chevron-right"></i> Payroll Liability Summary</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo VIEW.$pagename ?>/view-report.php?case=Leave-Encashment-Summary&url=leave-enc-sum.php"><i class="fas fa-chevron-right"></i> Leave Encashment Summary</a></li>
              



            </ul>
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