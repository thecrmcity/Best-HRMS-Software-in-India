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
            <div class="card-header">
                <div class="card-title">
                    <i class="fas fa-envelope"></i> Email Configuration
                </div>
                <div class="card-tools">
                    <a href="<?php echo VIEW?>global-setting/smtp-setup.php" class="text-dark font-weight-bold"><i class="fas fa-id-card-alt"></i> SMTP Setup</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <div class="empinfo">
                            <form class="" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=documentemail">
                                <div class="form-group">
                                    <label>Select Document / Email Template</label>
                                    <select class="form-control" name="emailtype" required>
                                        <option value="">--Select--</option>
                                        <?php
                                        $table = "in_templates";
                                        $cond = " `in_comid`='$comid' AND `in_status`='1' ";
                                        $select = new Selectall();
                                        $selup = $select->getallCond($table,$cond);
                                        if(!empty($selup))
                                        {
                                            foreach($selup as $up)
                                            {
                                                ?>
                                                <option value="<?php echo $up['in_sno'];?>"><?php echo $up['in_tempname'];?></option>
                                                <?php
                                            }
                                        }

                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>From Email </label>
                                    <div class="input-group">
                                    <select class="form-control" name="emailfrom" required>
                                        <option value="">--Select--</option>
                                        <?php
                                        $table = "in_master_card";
                                        $cond = " `in_relation`='Sendingform' AND in_status='1' ";
                                        $select = new Selectall();
                                        $masters = $select->getallCond($table,$cond);
                                        if(!empty($masters))
                                        {
                                            foreach($masters as $mast)
                                            {
                                                ?>
                                                <option value="<?php echo $mast['in_sno'];?>"><?php echo $mast['in_prefix'];?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <div class="input-group-append" style="cursor:pointer" data-toggle="modal" data-target="#addformemail">
                                        <span class="input-group-text"><i class="fas fa-plus"></i></span>
                                    </div>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label>CC Emails <small class="font-italic">separate with comma (,)</small></label>
                                    <textarea class="form-control" name="emailcc">

                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="" value="Submit" class="btn btn-primary px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="table-responsive emptable">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>No</th>
                                    <th>Document/Email</th>
                                    <th>From Email</th>
                                    <th>CC Emails</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $table = "in_emailsetup";
                                    $cond = " in_comid='$comid' AND in_status='1'";
                                    $select = new Selectall();
                                    $selup = $select->getallCond($table,$cond);
                                    if(!empty($selup))
                                    {
                                        $xl = 1;
                                        foreach($selup as $up)
                                        {
                                            $tid = $up["in_templateid"];
                                            $mid = $up['in_sendingby'];
                                            $select = new Selectall();
                                            ?>
                                            <tr>
                                                <td><?php echo $xl;?></td>
                                                <td><?php echo $select->getTemplate($tid);?></td>
                                                <td><?php echo $select->getMasterdata($mid);?></td>
                                                <td><?php echo $up['in_ccemails'];?></td>

                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
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
  <div class="modal fade" id="addformemail">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fas fa-envelope"></i> Add From Email </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=fromeamil">
              <div class="form-group">
                    <label>Enter Name</label>
                    <div class="input-group">
                    
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="forname" class="form-control" required>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label>Enter Email</label>
                    <div class="input-group">
                    
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" name="foremail" class="form-control" required>
                    </div>
                    
                </div>
                
              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save Email</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
 <?php
include_once $bsurl.'/inc/alert.php';
include_once $bsurl.'/inc/footer.php';
?>