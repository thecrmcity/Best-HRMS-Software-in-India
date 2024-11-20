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
        <?php
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            ?>
            <div class="row">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <i class="fas fa-lock"></i> Generate Password
                            </div>
                        </div>
                        <form class="" method="POST" action="<?php echo BSURL?>functions/login.php?case=password&id=<?php echo $id;?>">
                        <div class="card-body">
                            
                                <div class="form-group row">
                                    <label class="col-lg-5">Enter Password</label>
                                    <div class="input-group col-lg-7">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text rounded-0"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="" class="form-control rounded-0" name="userpass">
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-5">Confirm Password</label>
                                    <div class="input-group col-lg-7">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text rounded-0"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="" class="form-control rounded-0" name="confrmpass">
                                    </div>
                                    
                                </div>
                            
                        </div>
                        <div class="card-footer">
                            <div class="clearfix">
                            
                                <input type="submit" name="generate" class="custombtn" value="Submit">
                            
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        
        
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