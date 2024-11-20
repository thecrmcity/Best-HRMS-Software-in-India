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
    <?php
        if(isset($_GET['can']))
        {
          $canpost = "";
          $id = $_GET['can'];
          $table = "in_candidates";
          $cond = " in_sno='$id' ";
          $select = new Selectall();
          $can = $select->getcondData($table,$cond);
          $caname = $can['in_caname'];
          $mobile = $can['in_mobile'];
          $email = $can['in_email'];
          $city = $can['in_city'];
          $ctc = $can['in_ctc'];
          $expected = $can['in_expected'];
          $notice = $can['in_notice'];
          $quali = $can['in_qualification'];
          $doj = $can['in_dateofjoin'];
          $emplyr = $can['in_employer'];
          $desig = $can['in_designation'];
          $resume = $can['in_resume'];
          $tech = $can['in_technology'];
          $intdate = $can['in_interviewdate'];
          $intstat = $can['in_interviewsatus'];
          $feedback = $can['in_feedback'];




                    
          $act = "editcan&id=".$id;

        }
        else
        {
          $act = "candidate";
          $caname = "";
          $mobile = "";
          $email = "";
          $city = "";
          $ctc = "";
          $expected = "";
          $notice = "";
          $quali = "";
          $doj = "";
          $emplyr = "";
          $desig = "";
          $resume = "";
          $tech = "";
          $intdate = "";
          $intstat = "";
          $feedback = "";
          $canpost = "";
          
        }
        
      ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <form class="" method="POST" action="<?php echo BSURL;?>functions/candidates.php?case=<?php echo $act;?>" enctype="multipart/form-data">
        <div class="row">
          <div class="col-lg-6">
            <div class="empinfo mb-3">
              <h4>Basic Information</h4>
              <hr>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Job Title*</label>
                  <div class="input-group col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0"><i class="fas fa-user-graduate"></i></span>
                    </div>
                    <select class="form-control" name="applypost">
                      <option value="">--Select--</option>
                      <?php
                        $table = "in_jobapplication";
                        $cond = " `in_comid`='$comid' AND (in_assingto='$empid' OR in_createdby='$empid') AND `in_status`='1' ";
                        $select = new Selectall();
                        $jobapp = $select->getallCond($table,$cond);
                        if(!empty($jobapp))
                        {
                          foreach($jobapp as $app)
                          {
                            ?>
                            <option value="<?php echo $app['in_sno'];?>"><?php echo $app['in_jobtitle'];?></option>
                            <?php
                          }
                        }
                      ?>
                    </select>
                   
                    
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Full Name*</label>
                  <div class="input-group col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control rounded-0" placeholder="Name" name="fulname" required value="<?php echo $caname;?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Mobile*</label>
                  <div class="input-group col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="tel" class="form-control rounded-0" placeholder="Mobile" name="mobile" required value="<?php echo $mobile;?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Email*</label>
                  <div class="input-group col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" class="form-control rounded-0" placeholder="Email" name="email" required value="<?php echo $email;?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Current City</label>
                  <div class="input-group col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0"><i class="fas fa-map-marker-alt"></i></span>
                    </div>
                    <input type="text" class="form-control rounded-0" placeholder="Location" name="location" value="<?php echo $city;?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Current CTC</label>
                  <div class="input-group col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0"><i class="fas fa-tag"></i></span>
                    </div>
                    <input type="text" class="form-control rounded-0" placeholder="in thousand" name="ctc" value="<?php echo $ctc;?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Expected CTC</label>
                  <div class="input-group col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0"><i class="fas fa-tag"></i></span>
                    </div>
                    <input type="text" class="form-control rounded-0" placeholder="in thousand" name="expected" value="<?php echo $expected;?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Notice Period</label>
                  <div class="input-group col-sm-8">
                    
                    <input type="text" class="form-control rounded-0" name="notice" value="<?php echo $notice;?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Last Qualification</label>
                  <div class="input-group col-sm-8">
                    
                    <input type="text" class="form-control rounded-0" name="qulifi" value="<?php echo $quali;?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-5 col-form-label">Expected Joining Date</label>
                  <div class="input-group col-sm-7">
                    
                    <input type="date" class="form-control rounded-0" name="doj" value="<?php echo $doj;?>">
                  </div>
                </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="empinfo mb-3">
              <h4>Professional Information</h4>
              <hr>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Previous Employer</label>
                <div class="input-group col-sm-8">
                  
                  <input type="text" class="form-control rounded-0" placeholder="Company" name="company" value="<?php echo $emplyr;?>">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Last Designation</label>
                <div class="input-group col-sm-8">
                  
                  <input type="text" class="form-control rounded-0" placeholder="Position" name="postion" value="<?php echo $desig;?>">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Resume</label>
                <div class="input-group col-sm-8">
                  
                  <input type="file" class="form-control rounded-0" name="resume" value="<?php echo $resume;?>">

                </div>
                <label class="col-sm-4 col-form-label"></label>
                <div class="input-group col-sm-8">
                   <span><?php echo $resume;?></span>

                </div>
               
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Technology</label>
                <div class="input-group col-sm-8">
                  
                  <input type="text" class="form-control rounded-0" name="techno" value="<?php echo $tech;?>">
                </div>
              </div>
              
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Feedback</label>
                <div class="input-group col-sm-8">
                  
                  <textarea type="text" class="form-control rounded-0" name="feedback"><?php echo $feedback;?></textarea>
                </div>
              </div>
              <div class="form-group row">
                
                <div class="input-group col-sm-9">              
                </div>
                <div class="col-sm-3"><input type="submit" class="btn btn-primary btn-block" name="savecan" value="Save"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
        </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php
include_once $bsurl.'/inc/alert.php';
include_once $bsurl.'/inc/footer.php';
?>