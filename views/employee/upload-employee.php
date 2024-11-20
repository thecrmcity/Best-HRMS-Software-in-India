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
          <div class="col-lg-6">
            
            <div class="empinfo mb-3">
              <h4>Upload Excel File</h4>
              <hr>
              <form class="" method="POST" action="<?php echo BSURL;?>functions/uploadfile.php" enctype="multipart/form-data">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Choose File*</label>
                <div class="input-group col-sm-9">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="fas fa-upload"></i></span>
                  </div>
                  <input type="file" class="form-control rounded-0" name="uploademp" required>
                </div>
              </div>
              
               <div class="form-group row">
                <div class="input-group col-sm-9">
                  
                </div>
                <div class="col-sm-3"><input type="submit" name="savescale" value="Save" class="btn btn-primary btn btn-block"></div>
                
              </div>
              </form>
            </div>
            
          </div>
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <div class="card-title">
                  <i class="fas fa-download"> </i> Generate Excel Format
                </div>
              </div>
              <div class="card-body">
                <form class="" method="POST" action="<?php echo BSURL;?>functions/employee.php?case=generate">
               
              <div class="form-group row mb-2">
                <label class="col-lg-4 col-form-label">Name*</label>
                <div class="input-group col-sm-2">
                  
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><input type="checkbox" name="fname" required value="1"></span>
                  </div>
                  
                </div>

                <label class="col-sm-4 col-form-label">Company Email*</label>
                <div class="input-group col-sm-2">
                  
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><input type="checkbox" name="cemail" value="1" required></span>
                  </div>
                  
                </div>
                
              </div>

              

              <div class="form-group row mb-2">
                <label class="col-sm-4 col-form-label">Date of Birth*</label>
                <div class="input-group col-sm-2">
                  
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><input type="checkbox" value="1" name="dob" required></span>
                  </div>
                  
                </div>
                <label class="col-sm-4 col-form-label">Mobile*</label>
                 <div class="input-group col-sm-2">
                  
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><input type="checkbox" value="1" name="mobile" required></span>
                  </div>
                  
                </div>
              </div>

              <div class="form-group row mb-2">
                <label class="col-sm-4 col-form-label">Gendar</label>
                 <div class="input-group col-sm-2">
                  
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><input type="checkbox" value="1" name="gender"></span>
                  </div>
                  
                </div>
                <label class="col-sm-4 col-form-label">Marital Status</label>
                 <div class="input-group col-sm-2">
                  
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><input type="checkbox" value="1" name="marital"></span>
                  </div>
                  
                </div>
              </div>

              <div class="form-group row mb-2">
                <label class="col-sm-4 col-form-label">Department</label>
                <div class="input-group col-sm-2">
                  
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><input type="checkbox" value="1" name="depart"></span>
                  </div>
                  
                </div>
                <label class="col-sm-4 col-form-label">Designation</label>
                <div class="input-group col-sm-2">
                  
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><input type="checkbox" value="1" name="desig"></span>
                  </div>
                  
                </div>
              </div>

              <div class="form-group row mb-2">
                <label class="col-sm-4 col-form-label">Date of Joining*</label>
                <div class="input-group col-sm-2">
                  
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><input type="checkbox" value="1" name="doj" required></span>
                  </div>
                  
                </div>
                <label class="col-sm-4 col-form-label">Manager</label>
                <div class="input-group col-sm-2">
                  
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><input type="checkbox" value="1" name="manager"></span>
                  </div>
                  
                </div>
              </div>
              
              
               <div class="form-group row">
                <div class="input-group col-sm-9">
                  
                </div>
                <div class="col-sm-3"><input type="submit" name="savescale" value="Generate File" class="btn btn-danger btn btn-block"></div>
                
              </div>
              </form>
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