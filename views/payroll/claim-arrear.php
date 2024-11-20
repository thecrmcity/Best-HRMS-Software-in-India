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
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><span onclick="history.back()" class="badge badge-danger" style="cursor: pointer;"><i class="fas fa-arrow-left"></i> Back</span></li>
                  <li class="breadcrumb-item"><a href="<?php echo BSURL;?>views/dashboard/"><i class="fas fa-home"></i> Home</a></li>
                  <li class="breadcrumb-item active"><?php echo ucwords($sitename);?></li>
               </ol>
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <!-- Small boxes (Stat box) -->
         <div class="card rounded-0">
            <div class="card-header headcolor">
               <div class="card-title"> <i class="fas fa-chess-knight"></i> Arrear Form</div>
               <div class="card-tools">
                  
               </div>
            </div>
            <div class="card-body">
               <form class="" method="POST" action="">
                  <div class="row">
                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Arrears Name</span>
                           <input type="text" name="" class="form-control rounded-0">
                        </div>
                     </div>

                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Description</span>
                           <input type="text" name="" class="form-control rounded-0">
                        </div>
                     </div>

                     

                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>No. Of Days</span>
                           <input type="text" name="" class="form-control rounded-0">
                        </div>
                     </div>

                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Difference</span>
                           <input type="text" name="" class="form-control rounded-0">
                        </div>
                     </div>

                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Arrear From</span>
                           <input type="month" name="" class="form-control rounded-0">
                        </div>
                     </div>

                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Arrear To</span>
                           <input type="month" name="" class="form-control rounded-0">
                        </div>
                     </div>

                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Reference</span>
                           <input type="text" name="" class="form-control rounded-0">
                        </div>
                     </div>

                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <span>Pay Month</span>
                           <input type="text" name="" class="form-control rounded-0">
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-4"></div>

                     <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                           <span>Automated</span><br>
                           <input type="checkbox" name="btnonce" data-bootstrap-switch value="1" data-off-color="danger" data-on-color="success">
                           
                        </div>
                     </div>
                     <div class="col-lg-2 col-md-2">

                        <div class="form-group">
                           <span>Salary Heads</span><br>
                           <input type="checkbox" name="btnonce" data-bootstrap-switch value="1" data-off-color="danger" data-on-color="success">
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
         <!-- close card company details -->
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
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