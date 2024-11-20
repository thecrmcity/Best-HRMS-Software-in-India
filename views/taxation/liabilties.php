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
           <!--  <h4 class="m-0"><?php echo ucwords($sitename);?></h4> -->
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
                            <h6 class="m-0 font-weight-bold text-primary">TDS Liabities
</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>TDS</th>
                                            
                                            <th>Deposite Date</th>
                                            <th>BSR Code</th>
                                            <th>Bank Name</th>
                                          
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

                                        <tr>
                                            
                                            <td>02/07/2023</td>
                                            <td>10</td>
                                            
                                              
                                            <td>5/11/2023</td>
                                            <td>203244</td>
                                            <td>HDFC Bank</td>
                                           
                                           
                                        </tr>
                                        <!-- <tr>
                                            
                                            <td>3/31/2023</td>
                                            <td>20</td>
                                           
                                            <td>6/11/2023</td>
                                            <td>203245</td>
                                            <td>ICICI Bank</td>
                                            
                                            
                                        </tr>
                                        <tr>
                                            
                                            <td>3/31/2023</td>
                                            <td>10</td>
                                            
                                            <td>3/11/2023</td>
                                            <td>203246</td>
                                            <td>Punjab National Bank (PNB)</td>
                                            
                                            
                                        </tr>
                                        <tr>

                                            <td>3/31/2023</td>
                                            <td>20</td>
                                            
                                            <td>9/11/2023</td>
                                            <td>203247</td>
                                            <td>Bank of Baroda (BoB)</td>
                                            
                                            
                                        </tr>
                                          -->
                                        

                                        
                                       
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