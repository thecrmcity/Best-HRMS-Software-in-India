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
        


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- <a href="http://dev.inoday.us/views/payroll/img/SalarySlip.pdf" class="btn btn-secondary float-right">View PDF</a> -->
                             <div class="card-title"> <i class=""></i> Posted Salary</div>
                        </div>
                 
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Employee ID</th>
                                            <th>Employee Name</th>
                                            <th>Month</th>
                                            <th>Attendance</th>
                                            <th>Absent Day</th>
                                            <th>Paybles Day</th>
                                            <th>Earning</th>
                                            <th>TDS</th>
                                            <th>PF</th>
                                            <th>ESI</th>
                                            <th>Net Amount</th>
                                            <th>View PDF</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

                                        <tr>

                                            <td><a href="">IT- 463</a></td>
                                            <td>Mahipal Singh</td>
                                            <td>3/31/2023</td>
                                            
                                              
                                            
                                            <td>22</td>
                                            <td>-</td>
                                            <td>31</td>
                                           <td>50000</td>
                                           <td>-</td>
                                           <td>3600</td>
                                           <td>-</td>
                                           <td>46400</td>
                                          <td><a href="http://dev.inoday.us/views/payroll/img/SalarySlip.pdf"> <i class="fa fa-file-pdf" style="font-size:24px" ></i></a> </td>
                                        </tr>
                                        <tr>
                                            <td><a href="">IT-461</a></td>
                                            <td>Sonu Kumar</td>
                                            <td>3/31/2023</td>
                                            
                                            
                                            <td>21</td>
                                            <td>-</td>
                                            <td>31</td>
                                            <td>600000</td>
                                            <td>-</td>
                                            <td>3600</td>
                                            <td>-</td>
                                            <td>596400</td>
                                            <td><a href="http://dev.inoday.us/views/payroll/img/461.pdf"> <i class="fa fa-file-pdf" style="font-size:24px" ></i></a> </td>
                                        </tr>
                                        <tr>
                                             <td><a href="">IT-434</a></td>
                                              <td>Tina Rani</td>
                                            <td>3/31/2023</td>
                                           
                                           
                                            <td>23</td>
                                            <td>-</td>
                                            <td>31</td>
                                            <td>563320</td>
                                            <td>5000</td>
                                            <td>3600</td>
                                            <td>-</td>
                                            <td>554720</td>
                                           <td><a href="http://dev.inoday.us/views/payroll/img/434.pdf"> <i class="fa fa-file-pdf" style="font-size:24px" ></i></a> </td>
                                        </tr>
                                        <tr>
                                            <td><a href="">IT-442</a></td>
                                            <td>Gurpreet Kaur</td>
                                            <td>3/31/2023</td>
                                            
                                            
                                            <td>23</td>
                                            <td>-</td>
                                            <td>31</td>
                                            <td>63330</td>
                                            <td>5000</td>
                                            <td>3600</td>
                                            <td>-</td>
                                            <td>54730</td>
                                            <td><a href="http://dev.inoday.us/views/payroll/img/442.pdf"> <i class="fa fa-file-pdf" style="font-size:24px" ></i></a> </td>

                                        </tr>
                                        <tr>
                                            <td><a href="">IT-454</a></td>
                                            <td>Dilip Kumar</td>
                                            <td>3/31/2023</td>
                                            
                                            
                                            <td>23</td>
                                            <td>-</td>
                                            <td>31</td>
                                            <td>92222</td>
                                            <td>-</td>
                                            <td>3600</td>
                                            <td>-</td>
                                            <td>88622</td>
                                            <td><a href="http://dev.inoday.us/views/payroll/img/454.pdf"> <i class="fa fa-file-pdf" style="font-size:24px" ></i></a> </td>
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