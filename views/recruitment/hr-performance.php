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
          <div class="col-lg-4">
          <div class="card">

              <div class="card-header">

                <h3 class="card-title">Top Performers</h3>



                <div class="card-tools">

                  <button type="button" class="btn btn-tool" data-card-widget="collapse">

                    <i class="fas fa-minus"></i>

                  </button>

                  <button type="button" class="btn btn-tool" data-card-widget="remove">

                    <i class="fas fa-times"></i>

                  </button>

                </div>

              </div>



              <!-- /.card-header -->

              <div class="card-body p-0">

                <ul class="products-list product-list-in-card pl-2 pr-2">
                  <?php
                   $table = "in_hrperformance";
                   $cond = " in_comid='$comid' AND `in_status`='1' ";
                   $select = new Selectall();
                   $apps = $select->getallCond($table,$cond);
                   if(!empty($apps))
                   {
                    foreach($apps as $app)
                    {
                      ?>
                          <li class="item">

                            <div class="product-img">

                              <img src="<?php echo BSURL;?>assets/dist/img/default-150x150.png" alt="Profile Image" class="img-size-50">

                            </div>

                            <div class="product-info">

                              <a href="javascript:void(0)" class="product-title">Dilip Kumar

                                <span class="badge badge-secondary float-right slights">50%</span></a>

                              <span class="product-description">

                                <?php echo date('d-m-Y');?>

                              </span>

                            </div>

                            </li>
                      <?php
                    }
                   }
                  ?>

                

                </ul>

              </div>

              <!-- /.card-body -->

              
              <!-- /.card-footer -->

              </div>
          </div>
          <div class="col-lg-8">
            <div class="row">
              <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box">
                  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cogs"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Total Opennings</span>
                    <span class="info-box-number">
                      10
                      
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-history"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Total Applications</span>
                    <span class="info-box-number">110</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Total Selection</span>
                    <span class="info-box-number">60</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <div class="card-title">
                  <i class="fas fa-users"></i> Company Resources
                </div>
                <div class="card-tools">
                  <a href="" class="text-dark font-weight-bold"><i class="fas fa-plus"></i> Resources Planings</a>
                </div>
              </div>
              <div class="card-body">
              <div class="col-md-12 col-lg-12">
            
            <div class="progress-group">
              Software Department
              <span class="float-right"><b>16</b>/20</span>
              <div class="progress progress-sm">
                <div class="progress-bar bg-primary" style="width: 80%"></div>
              </div>
            </div>
            <!-- /.progress-group -->

            <div class="progress-group">
              Functional Department
              <span class="float-right"><b>30</b>/40</span>
              <div class="progress progress-sm">
                <div class="progress-bar bg-danger" style="width: 75%"></div>
              </div>
            </div>

            <!-- /.progress-group -->
            <div class="progress-group">
              <span class="progress-text">Technical Department</span>
              <span class="float-right"><b>80</b>/80</span>
              <div class="progress progress-sm">
                <div class="progress-bar bg-success" style="width: 100%"></div>
              </div>
            </div>

            <!-- /.progress-group -->
            <div class="progress-group">
              HR Department
              <span class="float-right"><b>25</b>/50</span>
              <div class="progress progress-sm">
                <div class="progress-bar bg-warning" style="width: 50%"></div>
              </div>
            </div>
            <!-- /.progress-group -->
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