l<?php
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
        


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form 24 Q
</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Emp Id</th>
                                            <th>Employee Name</th>
                                            <th>PAN</th>
                                            <th>Designation</th>
                                            <th>Earing</th>
                                            <th>TDS</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

                                        <tr>
                                            <td>3/31/2023</td>
                                            <td><a href="">IT- 463</a></td>
                                              
                                            <td>Mahipal Singh</td>
                                            <td>BAJPC4350M</td>
                                            <td>IT</td>
                                            <td>48000</td>
                                           <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>3/31/2023</td>
                                            <td><a href="">IT-461</a></td>
                                            <td>Sonu Kumar</td>
                                            <td>DAJPC4150P</td>
                                            <td>IT</td>
                                            <td>40000</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>3/31/2023</td>
                                            <td><a href="">IT-434</a></td>
                                            <td>tina Rani</td>
                                            <td>XGZFE7225A</td>
                                            <td>IT</td>
                                            <td>50000</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>3/31/2023</td>
                                            <td><a href="">IT-454</a></td>
                                            <td>Dilip Kumar</td>
                                            <td>CTUGE1616I</td>
                                            <td>IT</td>
                                            <td>65000</td>
                                            <td>5000</td>
                                        </tr>
                                          <tr>
                                            <td>3/31/2023</td>
                                            <td><a href="">IT-442</a></td>
                                            <td>Gurpreet kaur</td>
                                            <td>CTUGE1616I</td>
                                            <td>IT</td>
                                            <td>60000</td>
                                            <td>5000</td>
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