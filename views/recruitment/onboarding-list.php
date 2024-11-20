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
                <div class="card-title"></div>
                <div class="card-tools">
                <form class="form-inline" method="GET">

                <div class="input-group">
                
                <input type="text" name="s" class="form-control form-control-sm" required placeholder="Search Name /Mobile No">

                    <div class="input-group-append">
                        <button type="submit" class="input-group-text rounded-0 "><i class="fas fa-search"></i></button>
                        </div>

                </div>



                </form>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-2"></div>
                <div class="table-responsive emptable">
                    <table class="table table-bordered">
                        <thead class="table-secondary">
                            <th>No</th>
                            <th>Candidate Name</th>
                            <th>Mobile No</th>
                            <th>Job Title</th>
                            <th>Onboarding Status</th>
                            <th>Joining Date</th>
                            <th>Offer Letter Status</th>
                            <th>Days Left</th>
                            <th>Status</th>
                            <th>Action</th>

                        </thead>
                    </table>
                </div>
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