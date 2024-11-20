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
              <div class="card-header headcolor">
                 <div class="card-title"> <i class="fa fa-bars"></i> Salary Part</div>
                 <!-- <div class="card-tools">
                    <a href="" class="badge bg-warning"><i class="fa fa-asterisk"></i> First Enter Leaving Date</a>
                 </div> -->
                 <div class="card-tools">
                    <button type="button" class="btn bg-primary btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                 </div>
              </div>
              <div class="card-body">
               <form class="" method="POST" action="">
                  <div class="row">
                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Employee ID</span>
                           
                           <select class="form-control" name="" required>
                          <option value="">--Select--</option>
                          <option value="A">IT 461</option>
                          <option value="B">IT 461</option>
                          <option value="C">IT 434</option>


                        </select>
                        </div>
                     </div>

                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Employee Name</span>
                          <select class="form-control" name="" required>
                          <option value="">--Select--</option>
                          <option value="A">Tina Rani</option>
                          <option value="B">Dilip Kumar</option>
                          <option value="C">Sonu Kumar</option>
                        </select>
                        </div>
                     </div>

                     

                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Include last month salary</span>
                           <input type="text" name="" class="form-control rounded-0 datepick" placeholder="dd-mm-yyyy">
                        </div>
                     </div>

                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Include Pending Advance/Loan</span>
                           <input type="text" name="" class="form-control rounded-0">
                        </div>
                     </div>
                     <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                           <span></span><br>
                           <input type="checkbox" name="btnonce" data-bootstrap-switch value="1" data-off-color="danger" data-on-color="success">
                        </div>
                     </div>

                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Include Hold Salary</span>
                           <input type="text" name="" class="form-control rounded-0">
                        </div>
                     </div>
                     <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                           <span></span><br>
                           <input type="checkbox" name="btnonce" data-bootstrap-switch value="1" data-off-color="danger" data-on-color="success">
                        </div>
                     </div>

                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Include Pending loan</span>
                           <input type="text" name="" class="form-control rounded-0">
                        </div>
                     </div>
                     <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                           <span></span><br>
                           <input type="checkbox" name="btnonce" data-bootstrap-switch value="1" data-off-color="danger" data-on-color="success">
                        </div>
                     </div>

                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Include Leave Encashment</span>
                           <input type="text" name="" class="form-control rounded-0">
                        </div>
                     </div>
                     <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                           <span></span><br>
                           <input type="checkbox" name="btnonce" data-bootstrap-switch value="1" data-off-color="danger" data-on-color="success">
                        </div>
                     </div>

                     <!-- <div class="col-lg-12 col-md-12">
                        <div class="clearfix">
                           <input type="submit" class="btn btn-primary float-right" name="" value="Submit">
                        </div>
                     </div> -->

                     
                  </div>
               </form>
            </div>
            </div>
<div class="card">
              <div class="card-header headcolor">
                 <div class="card-title"> <i class="fa fa-bars"></i> General</div>
                 <div class="card-tools">
                    <button type="button" class="btn bg-primary btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                 </div> 

              </div>
              

                  

              <div class="card-body">
               <form class="" method="POST" action="">
                  <div class="row">
                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Employee ID</span>
                           <select class="form-control" name="" required>
                          <option value="">--Select--</option>
                          <option value="A">IT 461</option>
                          <option value="B">IT 461</option>
                          <option value="C">IT 434</option>
                       </select>
                        </div>
                     </div>

                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Employee Name</span>
                            <select class="form-control" name="" required>
                          <option value="">--Select--</option>
                          <option value="A">Sonu Kumar</option>
                          <option value="B">Tina rani</option>
                          <option value="C">Dilip Kumr</option>
                       </select>
                        </div>
                     </div>
                     
                     

                      <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                           <span>PF </span><br>
                           <input type="checkbox" name="btnonce" data-bootstrap-switch value="1" data-off-color="danger" data-on-color="success">
                        </div>
                     </div>

                     <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                           <span>ESI</span><br>
                           <input type="checkbox" name="btnonce" data-bootstrap-switch value="1" data-off-color="danger" data-on-color="success">
                        </div>
                     </div>

                     <!-- <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>TDS Deduction</span>
                           <input type="text" name="" class="form-control rounded-0">
                        </div>
                     </div> --> 

                     

                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Previous Month salary</span>
                           <input type="month" name="" class="form-control rounded-0">
                        </div>
                     </div>

                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Branch</span>
                          <select class="form-control" name="" required>
                          <option value="">--Select--</option>
                          <option value="A">Noida</option>
                          <option value="B">Delhi</option>
                          <option value="C">Noida</option>
                       </select>
                        </div>
                     </div>

                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Designation</span>
                          <select class="form-control" name="" required>
                          <option value="">--Select--</option>
                          <option value="A">Software Devloper</option>
                          <option value="B">Functional Consultant</option>
                          <option value="C">Project Management</option>
                       </select>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Department</span>
                           <select class="form-control" name="" required>
                          <option value="">--Select--</option>
                          <option value="A">Admin</option>
                          <option value="B">HR</option>
                          <option value="C">Account</option>
                       </select>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Date of joining</span>
                           <input type="text" name="" class="form-control rounded-0 datepick" placeholder="dd-mm-yyyy">
                        </div>
                     </div>

                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Date of leaving</span>
                           <input type="text" name="" class="form-control rounded-0 datepick" placeholder="dd-mm-yyyy">
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Salary Calc. To</span>
                           <input type="text" name="" class="form-control rounded-0">
                        </div>
                     </div>

                      <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Salary Calc. from</span>
                           <input type="text" name="" class="form-control rounded-0">
                        </div>
                     </div>

                     <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                           <span>TDS</span><br>
                           <input type="checkbox" name="btnonce" data-bootstrap-switch value="1" data-off-color="danger" data-on-color="success">
                        </div>

                     </div>

                     
                     <div class="col-lg-12 col-md-12">
                        <div class="clearfix">
                           <input type="submit" class="btn btn-primary float-right" name="" value="Submit">
                        </div>
                     </div>

                     
                  </div>
               </form>
            </div>
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

