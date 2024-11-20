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
        
        <div class="card rounded-0 p-2">
              <div class="row">
                <div class="col-sm-6 col-lg-6">
                  <div class="searchform">
                    <form class="form-inline" method="GET">
                      <div class="input-group">
                      <select class="form-control rounded-0 border-right-0" name="com" required>
                        <?php
                          if(isset($_GET['com']))
                          {
                            $selid = $_GET['com'];
                            $table = "in_master_card";
                            $cond = " `in_sno`='$selid' AND `in_relation`='company' ";
                            $select = new Selectall();
                            $self = $select->getcondData($table,$cond);
                            $selt = $self['in_prefix'];
                            
                          }
                          else
                          {
                            $selt = "--Select--";
                            $selid = "";
                          }
                        ?>
                        <option value="<?php echo $selid;?>"><?php echo $selt;?></option>
                        <?php
                        $table = "in_master_card";
                        $cond = " `in_relation`='company' ";
                        $select = new Selectall();
                        $selcom = $select->getallCond($table,$cond);
                        if(!empty($selcom))
                        {
                          foreach($selcom as $sel)
                          {
                            
                          ?>
                          <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_prefix'];?></option>
                          <?php
                          }
                          
                        }
                        ?>
                      </select>
                      <div class="input-group-prepend">
                        
                        <input type="submit" value="GO" class="input-group-text rounded-0">
                    </div>
                    </div>
                    </form>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-6"></div>

              </div>
            
          </div>
          <?php
            if(isset($_GET['com']))
            {
              $com = $_GET['com'];
              $table = "in_smtpsetup";
              $cond = " `in_comid`='$com' ";
              $select = new Selectall();
              $rdata = $select->getcondData($table,$cond);
              if($rdata != "")
              {
                $fname = $rdata['in_name'];
                $smtpemail = $rdata['in_eamil'];
                $hostname = $rdata['in_host'];
                $port = $rdata['in_port'];
                $smtpuser = $rdata['in_username'];
                $smtpass = $rdata['in_password'];
                $secrity = '<option value="'.$rdata['in_ssl'].'">'.$rdata['in_ssl'].'</option>';
                $act = "editsmtp&id=$com";

              }
              else
              {
                $smtpemail = "";
                $hostname = "";
                $port = "";
                $smtpuser = "";
                $smtpass = "";
                $secrity = "";
                $fname = "";
                $act = "smtpsetup&id=$com";
              }

              ?>
              <div class="card rounded-0">
            <div class="card-body">
              <p class="text-danger"><em>SMTP (Simple Mail Transfer Protocol) enables you to send your email through the specified server setting.</em></p>
              <form class="" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=<?php echo $act;?>">
                <div class="row">
                  <div class="col-sm-6 col-lg-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Name*</label>
                      <div class="input-group col-sm-8">
                        <div class="input-group-prepend">
                          <span class="input-group-text rounded-0"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="text" class="form-control rounded-0" placeholder="Name" name="fname" required value="<?php echo $fname;?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Email Address*</label>
                      <div class="input-group col-sm-8">
                        <div class="input-group-prepend">
                          <span class="input-group-text rounded-0"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control rounded-0" placeholder="Email" name="smtpemail" required value="<?php echo $smtpemail;?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Host Name*</label>
                      <div class="input-group col-sm-8">
                        <div class="input-group-prepend">
                          <span class="input-group-text rounded-0"><i class="fas fa-satellite"></i></span>
                        </div>
                        <input type="text" class="form-control rounded-0" placeholder="Host Name" name="hostname" required value="<?php echo $hostname;?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Port*</label>
                      <div class="input-group col-sm-8">
                        <div class="input-group-prepend">
                          <span class="input-group-text rounded-0"><i class="fas fa-plug"></i></span>
                        </div>
                        <input type="text" class="form-control rounded-0" placeholder="Port" name="port" required value="<?php echo $port;?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Username</label>
                      <div class="input-group col-sm-8">
                        <div class="input-group-prepend">
                          <span class="input-group-text rounded-0"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control rounded-0" placeholder="Username" name="smtpuser" required value="<?php echo $smtpuser;?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Password</label>
                      <div class="input-group col-sm-8">
                        <div class="input-group-prepend">
                          <span class="input-group-text rounded-0"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control rounded-0" placeholder="Password" name="smtpass" required value="<?php echo $smtpass;?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Security Protocol</label>
                      <div class="input-group col-sm-8">
                        <div class="input-group-prepend">
                          <span class="input-group-text rounded-0"><i class="fas fa-key"></i></span>
                        </div>
                        <select class="form-control rounded-0" name="secrity">
                          <?php echo $secrity;?>
                          <option value="TLS">TLS</option>
                          <option value="SSL">SSL</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <div class="row">
                  <div class="col-sm-6 col-lg-6">
                    <span class="btn btn-success" id="testport">Email Test</span>
                  </div>
                  <div class="col-sm-6 col-lg-6">
                    <div class="clearfix">
                      <input type="submit" name="savesmtp" class="btn btn-primary float-right" value="Save SMTP">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="card rounded-0" id="testgaurd" style="display: none;">
            <div class="card-body">
              <form class="" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=emailtest&id=<?php echo $com;?>">
                <div class="form-group row">
                  <label class="col-sm-4">Email Address</label>
                  <div class="input-group col-sm-8">
                    <input type="text" class="form-control rounded-0" placeholder="Test Email" name="email">
                  </div>

                </div>
                <div class="form-group">
                  <textarea class="form-control rounded-0" placeholder="Test Content" name="content"></textarea>
                </div>
                <div class="form-group">
                  <div class="clearfix">
                    <input type="submit" name="testemail" value="Send Test" class="btn btn-dark float-right">
                  </div>
                </div>
              </form>
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
  <script>
  $(document).ready(function(){
    $("#testport").click(function(){
      $("#testgaurd").toggle(500);
    });
  });
</script>
 <?php
include_once $bsurl.'/inc/alert.php';
include_once $bsurl.'/inc/footer.php';
?>