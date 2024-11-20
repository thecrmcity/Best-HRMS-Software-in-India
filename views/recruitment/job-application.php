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
            <div class="card-title">Job Application Form</div>
            <div class="card-tools">
              
            </div>
          </div>
          <div class="card-body">
            <form class="" method="POST" action="<?php echo BSURL?>functions/candidates.php?case=jobapplication">
            <div class="headetails">
              <h3>Job Details</h3>
              <div class="row">
              <div class="col-lg-4 col-md-4">
                  <div class="form-group">
                    <label class="">Job ID* </label>
                    <?php
                    $table = "in_jobapplication";
                    $cond = " in_status IN ('1', '0') ORDER BY in_sno DESC LIMIT 1";
                    $select = new Selectall();
                    $jonbid = $select->getcondData($table,$cond);
                    if($jonbid != "")
                    {
                      $dval = ($jonbid['in_sno']+1);
                      ?>
                      <input type="hidden" name="jobappid" value="<?php echo "SPLJOB_$dval";?>">
                      <span class="form-control"><?php echo "SPLJOB_$dval";?></span>
                      <?php
                    }
                    else
                    {
                      ?>
                      <input type="hidden" name="jobappid" value="<?php echo "SPLJOB_1";?>">
                      <span class="form-control"><?php echo "SPLJOB_1";?></span>
                      <?php
                    }
                    ?>
                    
                  </div>
                </div>
                <div class="col-lg-4 col-md-4">
                  <div class="form-group">
                    <label class="">Job Title* </label>
                    <input type="text" name="jobtitle" class="form-control" required>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4">
                  <div class="form-group">
                    <label class="">Application Type*</label>
                    <select class="form-control" name="apptype" required>
                      <option value="">--Select--</option>
                      
                      <option value="New">New Recruitment</option>
                      <option value="IJP">Internal Job Post</option>
                    </select>
                  </div>
                </div>
                
                <div class="col-lg-4 col-md-4">
                  <div class="form-group">
                    <label class="">Job Type*</label>
                    <select class="form-control" name="jobtype" required>
                      <option value="">--Select--</option>
                      
                      <option value="Permanent">Permanent</option>
                      <option value="Contract">Contract</option>
                      <option value="Trainee">Trainee</option>
                      <option value="Temporary">Temporary</option>

                    </select>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4">
                  <div class="form-group">
                    <label class="">No of Vacancy*</label>
                    <input type="text" name="vacanyno" class="form-control" required>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4">
                  <div class="form-group">
                    <label class="">Experience Level*</label>
                    <input type="text" name="explevel" class="form-control" required>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4">
                  <div class="form-group">
                    <label class="">Assign To* </label>
                    <select class="form-control" name="assignpos" required>
                      <option value="">--Select--</option>
                      <?php
                        $table = "in_employee";
                        $cond = " `in_groupid`='2' AND `in_delete`='1' ";
                        $select = new Selectall();
                        $dep = $select->getallCond($table,$cond);
                        if(!empty($dep))
                        {
                          foreach($dep as $dp)
                          {
                            ?>
                            <option value="<?php echo $dp['in_empid'];?>"><?php echo $dp['in_fname'];?> <?php echo $dp['in_lname'];?></option>
                            <?php
                          }
                        }
                      ?>

                    </select>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4">
                  <div class="form-group">
                    <label class="">Position Name* <a href="<?php echo VIEW?>global-setting/master-card.php" class="badge badge-secondary" title="Add More Position"><i class="fas fa-plus"></i></a></label>
                    <select class="form-control" name="posname" required>
                      <option value="">--Select--</option>
                      <?php
                        $table = "in_master_card";
                        $cond = " `in_relation`='designation' AND `in_status`='1' ";
                        $select = new Selectall();
                        $dep = $select->getallCond($table,$cond);
                        if(!empty($dep))
                        {
                          foreach($dep as $dp)
                          {
                            ?>
                            <option value="<?php echo $dp['in_sno'];?>"><?php echo $dp['in_prefix'];?></option>
                            <?php
                          }
                        }
                      ?>

                    </select>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4">
                  <div class="form-group">
                    <label class="">Department* <a href="<?php echo VIEW?>global-setting/master-card.php" class="badge badge-secondary" title="Add More Department"><i class="fas fa-plus"></i></a></label>
                    <select class="form-control" name="jobdepart" required>
                      <option value="">--Select--</option>
                      <?php
                        $table = "in_master_card";
                        $cond = " `in_relation`='department' AND `in_status`='1' ";
                        $select = new Selectall();
                        $dep = $select->getallCond($table,$cond);
                        if(!empty($dep))
                        {
                          foreach($dep as $dp)
                          {
                            ?>
                            <option value="<?php echo $dp['in_sno'];?>"><?php echo $dp['in_prefix'];?></option>
                            <?php
                          }
                        }
                      ?>

                    </select>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4">
                  <div class="form-group">
                    <label class="">Minimum Qualification* </label>
                    <input type="text" name="miniquality" class="form-control" required>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4">
                  <div class="form-group">
                    <label class="">CTC (LPA)</label>
                    <div class="input-group">
                      <input type="text" name="minictc" class="form-control" placeholder="Min CTC">
                      <input type="text" name="maxctc" class="form-control" placeholder="Max CTC">

                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4">
                  <div class="form-group">
                    <label class="">Job Timeline (Opening Date - Last Date)*</label>
                    <div class="input-group">
                      <input type="date" name="startdate" class="form-control" required>
                      <input type="date" name="enddate" class="form-control" required>

                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <label class="">Role & Responsibilities</label>
                  <textarea id="compose-textarea" class="form-control rounded-0" style="height: 300px" name="contents"></textarea>
                </div>
                <div class="col-lg-12 col-md-12">
                  <div class="clearfix">
                    
                    <input type="submit" name="publish" class="btn btn-primary px-3 float-right" value="Published">
                    <input type="submit" name="draft" class="btn bg-light border px-3 float-right mr-3" value="Save as Draft">
                  </div>
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
<script>

  $(function () {



    $('#compose-textarea').summernote()

  })

</script>