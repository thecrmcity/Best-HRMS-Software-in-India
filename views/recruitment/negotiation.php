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
                    <i class="fas fa-donate"></i> Negotiation Round
                </div>
            </div>
            <div class="card-body">
                <?php
                $joindate = "";
                if(isset($_GET['id']))
                {
                    $can = $_GET['id']; 
                    $table = "in_candidates";
                  $cond = " `in_sno`='$can' AND `in_status`='1' ";
                  $select = new Selectall();
                  $cans = $select->getcondData($table,$cond);
                  if($cans != "")
                  {
                    $applypost = $cans['in_applypost'];

                    $joindate = $cans['in_dateofjoin'];
                  
                    ?>
                    <table class="table table-bordered mt-3">
                      <tr class="table-secondary">
                        <th>Applied Post :</th>
                        <td><?php $apost = $cans['in_applypost']; echo $select->applyPost($apost)?></td>
                        <td>Candidate Name :</td>
                        <td><?php echo $cans['in_caname'];?></td>
                        <td>Mobile No :</td>
                        <td><?php echo $cans['in_mobile'];?></td>
                        <td>Email Address :</td>
                        <td><?php echo $cans['in_email'];?></td>
                      </tr>
                      <tr>
                        <td>Current City :</td>
                        <td><?php echo $cans['in_city'];?></td>
                        <td>Current CTC :</td>
                        <td><?php echo $cans['in_ctc'];?></td>
                        <td>Expected CTC :</td>
                        <td><?php echo $cans['in_expected'];?></td>
                        <td>Notice Period :</td>
                        <td><?php echo $cans['in_notice'];?></td>
                      </tr>
                      <tr>
                        <td>Last Qualification :</td>
                        <td><?php echo $cans['in_qualification'];?></td>
                        <td>Expected Date of Joining :</td>
                        <td><?php echo $cans['in_dateofjoin'];?></td>
                        <td>Last Company :</td>
                        <td><?php echo $cans['in_employer'];?></td>
                        <td>Last Designation :</td>
                        <td><?php echo $cans['in_designation'];?></td>
                      </tr>
                      <tr class="table-secondary">
                        <td>Created By :</td>
                        <td><?php $creat = $cans['in_createdby']; echo $select->empName($creat);?></td>
                        <td>Interview Date :</td>
                        <td><?php echo $cans['in_interviewdate'];?></td>
                        <td>Total Rounds :</td>
                        <td><?php echo $cans['in_interviewround'];?></td>
                        <td>Interview Status :</td>
                        <td><?php echo $cans['in_interviewsatus'];?></td>
                      </tr>
                    </table>                    

                    <?php
                  }
                
                }
                ?>
                <form action="<?php echo BSURL;?>functions/candidates.php?case=negotiation" method="POST">
                <div class="form-group row mt-3">
                    <div class="col-lg-6">
                        <label>Select Offer</label>
                        <select class="form-control" name="offer">
                            <option value="">--Select--</option>
                            <option value="Accepted">Offer Accepted</option>
                            <option value="Rejected">Offer Rejected</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label>Joining Date </label>
                        <input type="hidden" value="<?php echo $creat;?>" name="hrid">
                        <input type="hidden" value="<?php echo $apost;?>" name="jobtitle">
                        <input class="form-control" type="date" required name="joiningdate" value="<?php echo $joindate;?>">
                    </div>
                </div>
                    <div class="form-group">
                        <label>Comment *</label>
                        <input type="hidden" name="canid" value="<?php echo $can;?>">
                        <textarea class="form-control" name="comment"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary px-3" value="Save Information">
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