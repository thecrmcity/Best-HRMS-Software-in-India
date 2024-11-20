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
                <?php
                if(isset($_GET['id']))
                {
                  $id = $_GET['id'];
                  $table = "in_interviews";
                  $cond = " `in_sno`='$id' AND `in_roundstatus`='' AND `in_status`='1' ";
                  $select = new Selectall();
                  $insican = $select->getcondData($table,$cond);
                  if($insican != "")
                  {
                    $can = $insican['in_candidateid'];
                  }
                ?>
                    <i class="fas fa-user"></i> <?php echo $select->getCaname($can);?>
                <?php
                }
                ?>
                
            </div>
            <div class="card-tools">
                <?php
                if(isset($_GET['id']))
                {
                $id = $_GET['id'];
                $table = "in_interviews";
                $cond = " `in_sno`='$id' AND `in_roundstatus`='' AND `in_status`='1' ";
                $select = new Selectall();
                $insican = $select->getcondData($table,$cond);
                if($insican != "")
                {
                  $can = $insican['in_candidateid'];
                }
                $select = new Selectall();
                $resum = $select->getResume($can);
                if($resum != "")
                {
                ?>
                    <a href="<?php echo BSURL?>uploads/candidate/<?php echo $resum;?>" download class="btn btn-sm btn-primary"><i class="fas fa-download"></i> Download Resume</a>
                <?php
                }
                }
                ?>
                
            </div>
        </div>
        <div class="card-body">
                <div class="row mb-3">
                  <div class="col-lg-3 col-md-3"></div>
                  <div class="col-lg-9 col-md-9">
                    
                      <ul class="nav nav-justified ">
                        <li class="nav-item" style="background:#06bf30;color:#ffffff">5 Exceptional</li>
                        <li class="nav-item" style="background:#78e702;color:#ffffff">4 Above Average</li>
                        <li class="nav-item" style="background:#ffc107;color:#ffffff">3 Average</li>
                        <li class="nav-item" style="background:#fd7e14;color:#ffffff">2 Stisfactory</li>
                        <li class="nav-item" style="background:#eb0505;color:#ffffff">1 Unsatisfactroy</li>
                      </ul>
                    
                  </div>

                </div>
            
              <div class="empinfo">
                <h4 class="border-bottom">Candidate Information</h4>
                <?php
                if(isset($_GET['id']))
                {
                  $id = $_GET['id'];

                  $table = "in_interviews";
                  $cond = " `in_sno`='$id' AND `in_roundstatus`='' AND `in_status`='1' ";
                  $select = new Selectall();
                  $insican = $select->getcondData($table,$cond);
                  if($insican != "")
                  {
                    $can = $insican['in_candidateid'];
                  }
                  
                  $table = "in_candidates";
                  $cond = " `in_sno`='$can' AND `in_status`='1' ";
                  $select = new Selectall();
                  $cans = $select->getcondData($table,$cond);
                  if($cans != "")
                  {
                    $applypost = $cans['in_applypost'];
                  
                    ?>
                    <table class="table table-bordered mt-3">
                      <tr>
                        <th>Applied Post :</th>
                        <td><?php echo $cans['in_applypost'];?></td>
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
                    </table>                    

                    <?php
                  }
                }
                    ?>
                
              </div>
              <form class="mt-3" method="POST" action="<?php echo BSURL;?>functions/candidates.php?case=feedback">
                  
                <?php
                  $table = "in_candidates";
                  $cond = " `in_sno`='$can' AND `in_status`='1' ";
                  $select = new Selectall();
                  $insib = $select->getcondData($table,$cond);
                  if($insib != "")
                  {
                    $sround = $insib["in_interviewround"];
                    $sround = substr($sround,0,1);
                  }
                  $table = "in_interviews";
                  $cond = " `in_sno`='$id' AND `in_status`='1' ";
                  $select = new Selectall();
                  $insi = $select->getcondData($table,$cond);
                  if($insi != "")
                  {
                    $lastroun = $insi["in_round"];
                    $lastroun = substr($lastroun,0,1);

                    $asset = $insi['in_assessment'];
                    $table = "in_questionset";
                    $cond = " `in_setid`='$asset' AND `in_status`='1' ";
                    $select = new Selectall();
                    $assper = $select->getallCond($table,$cond);
                    if(!empty($assper))
                    {
                      $xp =1;
                      foreach($assper as $ass)
                      {
                        ?>
                        
                        <?php
                        if($sround === $lastroun)
                        {
                          ?>
                          <input type="hidden" class="form-control" name="sround" value="<?php echo $sround;?>">
                          <?php
                        }
                        ?>
                        <input type="hidden" class="form-control" name="pround" value="<?php echo $lastroun;?>">
                        <input type="hidden" class="form-control" name="srid" value="<?php echo $id;?>">
                        <input type="hidden" class="form-control" name="canid" value="<?php echo $can;?>">
                        <input type="hidden" class="form-control" name="assetid" value="<?php echo $asset;?>">
                        <div class="form-group row">
                        <div class="col-lg-6 col-md-6">
                            <input type="hidden" class="form-control" name="quesid[]" value="<?php echo $ass['in_sno'];?>">
                          <p><?php echo $ass['in_question'];?></p>
                          <?php
                          $range = $ass['in_range'];
                          if($range == "1")
                          {
                            ?>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="range<?php echo $xp;?>">0</span>
                                </div>
                                <input type="range" min="1" max="5" value="0" class="form-control sliderange" id="rating<?php echo $xp;?>" name="range[]">
                            </div>
                            <?php
                          }
                          
                          ?>
                          
                          
                        </div>
                        <div class="col-lg-6 col-md-6">
                        <?php
                          $comst = $ass['in_comment'];
                          if($comst == "1")
                          {
                            ?>
                            <textarea class="form-control" rows="3" placeholder="Comments" name="content[]"></textarea>
                            <?php
                          }
                          ?>
                          
                        </div>
                        </div>
                        <script>
                          var slider<?php echo $xp;?> = document.getElementById("rating<?php echo $xp;?>");
                          var output<?php echo $xp;?> = document.getElementById("range<?php echo $xp;?>");
                          output<?php echo $xp;?>.innerHTML = slider<?php echo $xp;?>.value;

                          slider<?php echo $xp;?>.oninput = function() {
                            output<?php echo $xp;?>.innerHTML = this.value;
                          }
                          </script>
                        <hr>
                        <?php
                        $xp++;
                      }
                    }
                  }
                ?>
                <div class="form-group">
                  <label>Interview Feedback *</label>
                  <textarea class="form-control" name="intifeedback" required></textarea>
                </div>
                <div class="form-group row">
                  <div class="col-lg-6 col-md-6">
                    <p>Do you recommend we move forward with this candidate?</p>
                  </div>
                  <div class="col-lg-2 col-md-2">
                    <select class="form-control" name="recommend" required id="recommend">
                      <option value="">--Select--</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <div class="clearfix">
                    <input type="submit" class="btn btn-primary px-3 float-right" value="Next Round" id="saverecom" style="display:none">
                    <input type="submit" class="btn btn-danger px-3 float-right" value="Rejected" id="rejectcom" style="display:none">
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
  <script>
    $(document).ready(function(){
        $("#recommend").on('change', function(){
          var recom = $("#recommend").val();
          if(recom == "Yes")
          {
            $("#saverecom").show();
            $("#rejectcom").hide();
          }
          else
          {
            $("#saverecom").hide();
            $("#rejectcom").show();
          }
        });
    });
  </script>
 <?php
include_once $bsurl.'/inc/alert.php';
include_once $bsurl.'/inc/footer.php';
?>