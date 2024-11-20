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
          <div class="form-inline">
            <h4 class="m-0"><?php echo ucwords($sitename);?></h4>
            <?php
            if(isset($_GET['s']))
            {
              ?>
              <a href="<?php echo VIEW.$pagename."/".$siteaim?>.php" class="btn-sm btn-primary ml-3"><i></i> Exit Search</a>
              <?php
            }
            ?>
            </div>
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
        


                    <!-- DataTales Example -->
                    <div class="card shadow">
                                             
                        <div class="card-header">
                            <div class="card-title"><i class="fas fa-list"></i> IT Declaration Employee</div>
                            <div class="card-tools">
                              <a href="<?php echo VIEW.$pagename?>/add-it-declaration.php" class="text-dark font-weight-bold"><i class="fas fa-plus"></i> Add IT-Declation</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Employee ID</th>
                                            <th>Employee Name</th>
                                            <th>Assessment Year</th>
                                            <th>Income Tax Slab</th>
                                            <th>FY Ending Year Date</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <tr>
                                            <td><a href="http://dev.inoday.us/views/taxation/ittest.php">IT- 461</a></td>

                                            <td>Sonu Kumar</td>
                                            <td>2024-25</td>
                                            <td>New</td>
                                            <td>3/31/2023</td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td><a href="http://dev.inoday.us/views/taxation/d434.php">IT-434</a></td>
                                            <td>Tina Rani</td>
                                            <td>2024-25</td>
                                            <td>Old</td>
                                            <td>3/31/2023</td>
                                            
                                        </tr>
                                        <tr>
                                            
                                            <td><a href="http://dev.inoday.us/views/taxation/dec463.php">IT-463</a></td>
                                            <td>Mahipal Singh</td>
                                            <td>2024-25</td>
                                            <td>Old</td>
                                            <td>3/31/2023</td>
                                           
                                        </tr>
                                       <tr>
                                            
                                            <td><a href="http://dev.inoday.us/views/taxation/d454.php">IT-454</a></td>
                                            <td>Dilip Kumar</td>
                                            <td>2024-25</td>
                                            <td>Old</td>
                                            <td>3/31/2023</td>
                                            
                                        </tr>
                                         <tr>
                                            
                                            <td><a href="http://dev.inoday.us/views/taxation/d442.php">IT-442</a></td>
                                            <td>Gurpreet Kaur</td>
                                            <td>2024-25</td>
                                            <td>Old</td>
                                            <td>3/31/2023</td>
                                            
                                        </tr>
                                       
                                    </tbody>
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