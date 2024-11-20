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
            <h4 class="m-0"><?php echo $fullPage;?></h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><span onclick="history.back()" class="badge badge-danger" style="cursor: pointer;"><i class="fas fa-arrow-left"></i> Back</span></li>
              <li class="breadcrumb-item"><a href="<?php echo BSURL;?>views/dashboard/"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active"><?php echo $fullPage;?></li>
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
          <div class="col-sm-5 col-5">
            <div class="card card-primary card-outline rounded-0">
              <div class="card-body">
                <form class="" method="POST" action="<?php echo BSURL;?>functions/dashboard.php?case=change">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Password*</label>
                    <div class="input-group col-sm-7">
                      <div class="input-group-prepend">
                        <span class="input-group-text rounded-0 bg-primary"><i class="fas fa-key"></i></span>
                      </div>
                      <input type="password" class="form-control rounded-0" placeholder="Password" name="userpass" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Confirm Password</label>
                    <div class="input-group col-sm-7">
                      <div class="input-group-prepend">
                        <span class="input-group-text rounded-0"><i class="fas fa-key"></i></span>
                      </div>
                      <input type="password" class="form-control rounded-0" placeholder="Password" name="confirmpass" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label"></label>
                    <div class="col-sm-7 clearfix">
                      
                      <input type="submit" class="btn btn-primary rounded-0 float-right" name="changepass" value="Change Password">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-sm-1 col-1">
            <?php
            $select = new Selectall();
            $rest = $select->checkPass();
            $pdate = $select->passDate();
            $cday = date('t');
            $pdayj = $rest/$cday*100;
            $mval = round($pdayj);

            ?>
          </div>
          <div class="col-sm-6 col-md-6">
            <table class="table">
              
              <tr>
                <th>Last Update Date</th>
                <td><?php echo $pdate;?></td>
              </tr>
              <tr>
                <th>Password Expiry In</th>
                <td><?php echo $rest;?></td>
              </tr>
              <tr>
                <td colspan="2">
                  <div class="progress">
                    <?php
                      switch(true)
                      {
                        case $mval <= 15:

                        ?>
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" style="width:<?php echo $mval;?>%"></div>
                        <?php
                        break;
                        case $mval <= 35:
                        ?>
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" style="width:<?php echo $mval;?>%"></div>
                        <?php
                        break;
                        case $mval >= 35:
                        ?>
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width:<?php echo $mval;?>%"></div>
                        <?php
                        break;
                      }
                    ?>
                    
                  </div>
                </td>
              </tr>
            </table>
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