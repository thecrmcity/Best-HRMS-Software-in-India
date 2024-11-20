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
              <i class="fas fa-users"></i> Interview Process
            </div>
            <div class="card-tools">
              <a href="<?php echo VIEW.$pagename?>/assessment.php" class="text-dark font-weight-bold"><i class="fas fa-question-circle"></i> Assessment</a>
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
                  <th>Interview Type</th>
                  <th>Candidate Name</th>
                  <th>Interview Date</th>
                  <th>Post Title </th>
                  <th>Total Rounds</th>
                  
                  <th>Create By</th>
                  <th>Status</th>
                  <th colspan="2" class="text-center">View Status</th>
                </thead>
                <tbody>
                  <?php
                  $table = "in_candidates";
                  $cond = " `in_comid`='$comid' AND `in_status`='1' ";
                  $select = new Selectall();
                  $inners = $select->getallCond($table, $cond);
                  if(!empty($inners))
                  {
                    $xl = 1;
                    foreach($inners as $inn)
                    {
                      $canid = $inn['in_sno'];
                      $select = new Selectall();

                      
                      ?>
                      <tr>
                        <td><?php echo $xl;?></td>
                        <td><?php $apost = $inn['in_applypost']; echo $select->applyPost($apost)?></td>
                        <td><?php echo $inn['in_interviewtype'];?></td>
                        <td><?php echo $select->getCaname($canid);?></td>
                        <td><?php echo date('d-m-Y', strtotime($inn['in_interviewdate']));?></td>
                        <td><?php echo $inn['in_applypost'];?></td>
                        <td><?php echo $inn['in_interviewround'];?></td>
                        <td><?php $creat = $inn['in_createdby']; echo $select->empName($creat)?></td>
                        <td><?php echo $inn['in_interviewsatus'];?></td>
                        
                        <td><a href="<?php echo VIEW.$pagename?>/interview-list.php?id=<?php echo $inn['in_sno'];?>" class="badge badge-pill badge-primary">View <i class="fas fa-angle-double-right"></i> </a></td>
                        <td>
                        <?php
                        $instatu = $inn['in_interviewsatus'];
                        $negoround = $inn['in_negoround'];
                        if($instatu == 'All Round Clear' && $negoround == 'Null')
                        {
                          ?>
                          <a href="<?php echo VIEW.$pagename?>/negotiation.php?id=<?php echo $inn['in_sno'];?>" class="badge badge-pill badge-success ml-3"> Final Round <i class="fas fa-angle-double-right"></i> </a>
                        <?php
                        }
                        ?>
                        </td>

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