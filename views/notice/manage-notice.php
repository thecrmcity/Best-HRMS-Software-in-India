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

        <div class="card card-primary card-outline">

          <div class="card-header clearfix">

            All Notice

            

            <a href="<?php echo VIEW.$pagename?>/add-notice.php" class="float-right text-dark"><b><i class="fas fa-plus"></i> Add Notice</b></a>

          

          </div>

          

          <div class="card-body">

            <div class="table-responsive">

              <table class="table table-bordered">

                <thead class="bg-info">

                  <th>Sr. No.</th>
                  <td>Notice Type</td>

                  <th width="400px">Notice Title</th>

                  <th>Status</th>

                  <th>Upload On</th>

                  <th><i class="fas fa-edit"></i></th>
                  <th><i class="fas fa-trash"></i></th>
                  <th><i class="fas fa-upload"></i></th>


                </thead>

                <tbody>

                  <?php

                    $table = "in_notice";

                    $select = new Selectall();

                    $selData = $select->onlyAll($table);

                    $xl = 1;

                    foreach($selData as $sel)

                    {

                      ?>

                      <tr>

                        <td><?php echo $xl;?></td>
                        <td><?php echo $sel['in_priority'];?></td>

                        <td><?php echo $sel['in_title'];?></td>

                        <td><?php

                          $act = $sel['in_active'];

                          if($act == "draft")

                          {

                            echo "<span class='badge badge-warning'>".ucwords($act)."</span>";

                          }

                          else

                          {

                            echo "<span class='badge badge-success'>".ucwords($act)."</span>";

                          }

                          

                      ?></td>

                      <td><?php echo date('d-m-y', strtotime($sel['in_date'])) ;?></td>

                      <td><a href="<?php echo VIEW.$pagename?>/add-notice.php?pedit=<?php echo $sel['in_sno'];?>" title="Edit"><i class="fas fa-edit"></i></a></td><td><a href="<?php echo BSURL;?>functions/notice.php?case=del&id=<?php echo $sel['in_sno'];?>&f=<?php echo $pagename;?>&p=<?php echo $siteaim?>" class="ml-2" title="Bin" onclick="return confirm('Are you Sure!');"><i class="fas fa-trash"></i></a></td><td>

                        <?php

                        if($act == "draft")

                        {

                          ?>

                          <a href="<?php echo BSURL;?>functions/notice.php?case=publish&id=<?php echo $sel['in_sno'];?>&f=<?php echo $pagename;?>&p=<?php echo $siteaim?>" class="ml-2" title="Publish"><i class="fas fa-upload"></i></a>

                          <?php

                        }

                        ?>

                      </td>

                      </tr>

                      <?php
                      $xl++;

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