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
              <i class="fas fa-tasks"></i> Current Openings
            </div>
            <div class="card-tools">
              <a href="<?php echo VIEW.$pagename?>/job-application.php" class="text-dark font-weight-bold"><i class="fas fa-plus"></i> Job Application</a>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              
                <?php
                $table = " in_jobapplication ";
                $cond = " in_comid='$comid' AND in_status='1' ";
                $select = new Selectall();
                $status = $select->getallCond($table,$cond);
                if(!empty($status))
                {
                  $xl =1;
                  foreach($status as $step)
                  {
                    $dept = $step["in_department"];
                    $crte = $step["in_createdby"];
                    $assign = $step["in_assingto"];
                    $publed = $step["in_publish"];
                    $select = new Selectall();
                    ?>
                    <div class="col-lg-3 col-md-3">
                <div class="job-card">
                  <div class="job-inner-card">
                    <div class="job-top">
                      <?php
                      if($publed == "1")
                      {
                        ?>
                        <div class="job-date">Post Date : <?php echo date('d-m-Y', strtotime($step['in_createdat']));?> <br><p class="badge badge-success badge-pill text-white">Published</p></div>
                      <button class="job-priority bg-success" id="jobpriority<?php echo $xl;?>"><i class="far fa-calendar-check"></i></button>
                        <?php
                      }
                      else
                      {
                        ?>
                        <div class="job-date">Post Date : <?php echo date('d-m-Y', strtotime($step['in_createdat']));?> <br><p class="badge badge-warning badge-pill text-dark">Draft</p></div>
                      <button class="job-priority bg-warning" id="jobpriority<?php echo $xl;?>"><i class="far fa-calendar-times"></i></button>
                        <?php
                      }
                      ?>
                      
                      <div class="job-quickstrip" id="jobquickstrip<?php echo $xl;?>">
                        <ul>
                          <li><a href="<?php echo BSURL?>functions/candidates.php?case=jobpostpublish&id=<?php echo $step['in_sno'];?>" class="child-priority bg-success" title="Publish Post" ><i class="far fa-calendar-check"></i></a></li>
                          <li><a href="<?php echo BSURL?>functions/candidates.php?case=jobpostunpublish&id=<?php echo $step['in_sno'];?>" class="child-priority bg-warning" title="Unpublish Post" ><i class="far fa-calendar-times"></i></a></li>
                          <li><a href="<?php echo BSURL?>functions/candidates.php?case=jobpostdelete&id=<?php echo $step['in_sno'];?>" class="child-priority bg-danger" title="Delete Post" ><i class="fas fa-trash"></i></a></li>

                        </ul>
                      </div>
                    </div>
                    <div class="job-body">
                      <h2><?php echo $step['in_noofposition'];?></h2>
                      <h3><?php echo $step['in_jobtitle'];?></h3>
                      <h6><?php echo $select->getMasterdata($dept);?></h6>
                      <div class="job-body-footer mt-3">
                        <div class="createdby">Created By: <p><?php echo $select->empName($crte);?></p></div>
                        <div class="lastdate">Last Date :<p><?php echo date('d-m-Y', strtotime($step['in_enddate']));?></p></div>
                      </div>
                    </div>
                    <div class="job-footer">
                      <div class="job-assign">
                          <p>Job Assign To</p>
                          <?php echo $select->empName($assign);?>
                      </div>
                      <a href="<?php echo VIEW?>recruitment/job-application.php" class="btn btn-sm"  style="background-color: #5a7c9b;border-color: #5a7c9b;color:#ffffff;">View Post</a>
                    </div>
                  </div>
                </div>
              </div>
              <script>
                $(document).ready(function(){
                  $("#jobpriority<?php echo $xl;?>").on('click', function(){
                    $("#jobquickstrip<?php echo $xl;?>").toggle(300);
                        
                  }); 
                });
              </script>
                    <?php
                    $xl++;
                  }
                }
                ?>
                
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