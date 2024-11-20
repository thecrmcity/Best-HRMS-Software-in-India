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

            <div class="form-inline">
              <h4 class="m-0"><?php echo ucwords($sitename);?></h4>
              <?php
              if(isset($_GET['s']))
              {
                ?>
              <a href="<?php echo VIEW.$pagename."/".$siteaim?>.php" class="btn-sm btn-primary ml-3"><i></i> Exit Search</a>
              <?php
              }
              ?>
              </div>

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

        <div class="card card-primary card-outline">

          <div class="card-header">

            <div class="card-title">

              <i class="fas fa-users"></i> All Candidates

            </div>
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
              <div class="table-responsive emptable">
            <table class="table table-bordered table-striped">

              <thead class="bg-secondary">

                <th>No</th>
                
                <th>Interview Status</th>
                <th>Interview Date</th>
                <th>Interview Stage</th>
                <th>Candidate Name</th>

                <th>Mobile</th>

                <th>Location</th>

                <th>Current CTC</th>

                <th>Expected CTC</th>

                <th>Notice</th>
                <th>Created By</th>

                <th>Action</th>

              </thead>

              <tbody>

                <?php


                  if(isset($_GET['s']))
                  {
                    $s = $_GET['s'];
                    $table = "in_candidates";
                    $cond = " `in_caname` LIKE '%$s%' OR `in_mobile` LIKE '%$s%' ";
                    $select = new Selectall();
                    $selData = $select->getallCond($table,$cond);
                  } 
                  else
                  {
                    $table = "in_candidates";
                    $select = new Selectall();
                    $selData = $select->allSelect($table);
                  }
                  $xl = 1;

                  
                  if(!empty($selData))
                  {


                  foreach($selData as $sel)

                  {

                    ?>

                    <tr>

                      <td><?php echo $xl;?></td>

                      <td>
                      <?php 
                      $innstatus = $sel['in_interviewsatus'];
                      if($innstatus == "")
                      {
                        ?>
                        <a href="<?php echo VIEW.$pagename;?>/create-interview.php?id=<?php echo $sel['in_sno'];?>" class="badge badge-pill badge-primary"><b><i class="fas fa-question-circle"></i> Action</b></a>
                        <?php
                      }
                      else
                      {
                        echo $innstatus;
                      }
                      ?>  
                      </td>
                      <td>
                        <?php
                          $innstatus = $sel['in_interviewsatus'];
                          if($innstatus != "")
                          {
                            echo date('d-m-Y', strtotime($sel['in_interviewdate']));
                          }
                          else
                          {
                            echo "";
                          }
                          
                        ?>
                      </td>
                      <td><?php echo $sel['in_interviewround'];?></td>

                      <td><a href="<?php echo VIEW.$pagename;?>/view-candidate.php?can=<?php echo $sel['in_sno'];?>" class="text-danger"><b><?php echo $sel['in_caname'];?></b></a></td>

                      <td><?php echo $sel['in_mobile'];?></td>

                      <td><?php echo $sel['in_city'];?></td>

                      <td><?php echo $sel['in_ctc'];?></td>

                      <td><?php echo $sel['in_expected'];?></td>

                      <td><?php echo $sel['in_notice'];?></td>
                      <td><?php $asid = $sel['in_createdby']; echo $select->empName($asid);?></td>
                     
                      <td><a href="candidates.php?can=<?php echo $sel['in_sno'];?>" class="text-success"><i class="fas fa-edit"></i></a><a href="<?php echo BSURL;?>functions/candidates.php?case=delData&id=<?php echo $sel['in_sno'];?>" class="ml-2 text-danger" onclick="return confirm('Are you Sure!');"><i class="fas fa-trash"></i></a></td>

                    </tr>

                    <?php

                    $xl++;

                  }
                  }
                  else
                  {
                    ?>
                    <tr>
                      <td colspan="10" class="text-center">No Data</td>
                    </tr>
                    <?php
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