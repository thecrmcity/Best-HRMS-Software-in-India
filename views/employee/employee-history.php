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
              <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                      Employee Case History
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
                  
                  <!-- /.timeline-label -->
                  <?php
                  $table = "in_casehistory";
                  $cond = " `in_comid`='$comid' AND `in_empid`='$empid' ";
                  $select = new Selectall();
                  $sepData = $select->getallCond($table,$cond);
                  if(!empty($sepData))
                  {
                    foreach($sepData as $sep)
                    {
                      ?>
                      <div class="time-label">
                        <span class="bg-red"><?php echo date('F Y', strtotime($sep['in_changedate']));?></span>
                      </div>
                      <div>
                        <i class="fas fa-user-tie bg-blue"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fas fa-clock"></i> <?php echo $sep['in_changedate'];?></span>
                          <h3 class="timeline-header"><b><?php echo $sep['in_casename'];?></b> <small><b class="text-primary"></b></small></h3>

                          <div class="timeline-body">
                            <?php echo $sep['in_casedetail'];?>
                          </div>
                          
                        </div>
                      </div>
                      <?php
                    }
                  }
                  ?>
              <!-- timeline item -->
              
              <!-- END timeline item -->
              </div>
                    </div>                  
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