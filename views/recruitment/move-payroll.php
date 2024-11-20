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
          <div class="card">
              <div class="card-header headcolor">
                 <div class="card-title"> <i class="fa fa-bars"></i> Dilip Kumar</div>
                 
              </div>
              <div class="card-body">
               <form class="" method="POST" action="">
                  <div class="row">
                     
                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Employee Id</span>
                           <input type="text" name="" class="form-control rounded-0 " value="IT-453">
                        </div>
                     </div>
                      <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Department</span>
                           <input type="text" name="" class="form-control rounded-0 " value="HR">
                        </div>
                     </div>
                      
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Email Id</span>
                           <input type="text" name="" class="form-control rounded-0 " value="mahipal.singh@gmail.com">
                        </div>

                     </div>
                      <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Mobile Number</span>
                           <input type="text" name="" class="form-control rounded-0 " value="8077628224">
                        </div>
                     </div>

                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Joining Date</span>
                           <input type="date" name="" class="form-control rounded-0 ">
                        </div>
                     </div>

                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Joining Time</span>
                           <input type="date" name="" class="form-control rounded-0 ">
                        </div>
                     </div>
                     
                      <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Location</span>
                           <input type="text" name="" class="form-control rounded-0 ">
                        </div>
                     </div>
                      <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Other Information</span>
                           <input type="text" name="" class="form-control rounded-0 ">
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Contact Person</span>
                           <input type="text" name="" class="form-control rounded-0 ">
                        </div>
                     </div>
                      <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Contact Number</span>
                           <input type="text" name="" class="form-control rounded-0 ">
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
  
 <?php
include_once $bsurl.'/inc/alert.php';
include_once $bsurl.'/inc/footer.php';
?>

