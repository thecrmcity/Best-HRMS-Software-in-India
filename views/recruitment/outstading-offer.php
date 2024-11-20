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
                <div class="card-title"></div>
                <div class="card-tools">
                <form class="form-inline" method="GET">

                <div class="input-group">
                
                <input type="text" name="s" class="form-control form-control-sm" required placeholder="Search Name /Mobile No">

                    <div class="input-group-append">
                        <button type="submit" class="input-group-text rounded-0 "><i class="fas fa-search"></i></button>
                        </div>

                </div>



                </form>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-2"></div>
                <div class="table-responsive emptable">
                    <table class="table table-bordered">
                        <thead class="table-secondary">
                            <th>No</th>
                            <th>Candidate Name</th>
                            <th>Mobile No</th>
                            <th>Job Title</th>
                            <th>Onboarding Status</th>
                            <th>Joining Date</th>
                            <th>Offer Letter Status</th>
                            <th>Days Left</th>
                            <th>Verification</th>
                            <th>Action</th>

                        </thead>
                        <tbody>
                          <?php
                          function dayleft($day)
                          {
                            $future = strtotime($day); //Future date.
                            $timefromdb = strtotime(date('Y-m-d'));//source time
                            $timeleft = $future-$timefromdb;
                            $daysleft = round((($timeleft/24)/60)/60); 
                            return $daysleft;
                          }
                          $table = "in_candidates";
                          $cond = " `in_comid`='$comid' AND `in_negoround`='Accepted' AND `in_status`='1' ";
                          $select = new Selectall();
                          $upsts = $select->getallCond($table, $cond);
                          if(!empty($upsts))
                          {
                            $xl =1;
                            foreach($upsts as $upst){
                              ?>
                              <tr>
                                <td><?php echo $xl;?></td>
                                <td><?php echo $upst['in_caname'];?></td>
                                <td><?php echo $upst['in_mobile'];?></td>
                                <td><?php echo $upst['in_email'];?></td>
                                <td><?php echo $upst['in_negoround'];?></td>
                                <td><?php echo $upst['in_dateofjoin'];?></td>
                                <td><?php echo "Not Sent";?></td>
                                <td><?php echo dayleft($upst['in_dateofjoin']);?></td>
                                <td><?php echo "Pending";?></td>
                                <td><a href="<?php echo VIEW.$pagename?>/email-confirmation.php?id=<?php echo $upst['in_sno'];?>" class="badge badge-pill badge-primary">Action <i class="fas fa-angle-double-right"></i></a></td>
                              </tr>
                              <?php
                              $xl++;
                            }
                          }
              
                          ?>
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