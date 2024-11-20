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
                $can = $_GET['id'];
                $select = new Selectall();
                
            ?>
                <i class="fas fa-user"></i> <?php echo $select->getCaname($can);?>
            <?php
            }
            ?>
            </div>
            
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6 col-lg-6"></div>
              <div class="col-sm-6 col-lg-6"></div>

            </div>
            <div class="table-responsive emptable">
              <table class="table table-bordered table-striped">
                <thead>
                  <th>No</th>
                  <th>Job Title</th>
                  <th>Created By</th>
                  <th>Interview Type</th>
                  <th>Round</th>
                  <th>Status</th>
                  <th>Comment</th>
                  <th>Interviewer(s)</th>
                  <th>Assessment Name</th>
                  <th>Result</th>
                  <th>Action </th>
                  
                </thead>
                <tbody>
                  <?php
                  $table = "in_interviews";
                  $cond = " `in_comid`='$comid' AND `in_candidateid`='$can' AND `in_status`='1' ";
                  $select = new Selectall();
                  $inners = $select->getallCond($table, $cond);
                  if(!empty($inners))
                  {
                    $xl = 1;
                    foreach($inners as $inn)
                    {
                      $canid = $inn['in_interviewer'];
                      $asset = $inn['in_assessment'];
                      $select = new Selectall();
                      ?>
                      <tr>
                        <td><?php echo $xl;?></td>
                        <td><?php $apost = $inn['in_jobtitle']; echo $select->applyPost($apost)?></td>
                        <td><?php $creat = $inn['in_createdby']; echo $select->empName($creat)?></td>
                        <td><?php echo $inn['in_interviewtype'];?></td>
                        
                        
                        
                        <td><?php echo $inn['in_round'];?></td>
                        <td><?php echo $inn['in_roundstatus'];?></td>
                        <td><?php echo $inn['in_comment'];?></td>
                        <td><?php echo $select->empName($canid);?></td>
                        <td><?php $resdata = $select->getMasterdata($asset); echo $resdata;?></td>
                        <td><?php
                        if($resdata != "")
                        {
                          ?>
                          <a href="<?php echo VIEW.$pagename?>/feedback-result.php?id=<?php echo $inn['in_sno'];?>" class="badge badge-pill badge-primary">Result</a>
                          <?php
                        }
                        
                        ?></td>
                        <td>
                        <?php
                        $rdstatus = $inn['in_roundstatus'];
                          if($rdstatus == "")
                          {
                            ?>
                            <a href="<?php echo VIEW.$pagename?>/feedback-interview.php?id=<?php echo $inn['in_sno'];?>" class="badge badge-pill badge-primary">Action <i class="fas fa-angle-double-right"></i> </a></td>
                            <?php
                          }
                        ?>
                        

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