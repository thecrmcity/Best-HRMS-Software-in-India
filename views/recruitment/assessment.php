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
                    <i class="fas fa-question-circle"></i> Interview Question Form
                </div>
                <div class="card-tools">
                    <a href="<?php echo VIEW.$pagename?>/assessment-set.php" class="text-dark font-weight-bold"><i class="fas fa-question-circle"></i> Create Assessment</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive emptable">
                  <table class="table table-bordered">
                    <thead>
                      <th>No</th>
                      <th>Assessment Name</th>
                      <th>Questons</th>
                      <th>Range</th>
                      <th>Comment</th>
                      <th>Create By</th>
                    </thead>
                    <tbody>
                      <?php
                      $table = "in_questionset";
                      $cond = " `in_comid`='$comid' AND `in_status`='1' ";
                      $select = new Selectall();
                      $groups = $select->getallCond($table,$cond);
                      if(!empty($groups))
                      {
                        $xl = 1;
                        foreach($groups as $group)
                        {
                          $sid = $group["in_setid"];
                          $stid = $group['in_range'];
                          $ptid = $group['in_comment'];
                          $crby = $group['in_createdby'];
                          $select = new Selectall();
                          ?>
                          <tr>
                            <td><?php echo $xl;?></td>
                            <td><?php echo $select->getMasterdata($sid);?></td>
                            <td><?php echo $group['in_question'];?></td>
                            <td><?php echo $stid == "1"? "Yes":"No";?></td>
                            <td><?php echo $ptid == "1"? "Yes":"No";?></td>
                            <td><?php echo $select->empName($crby);?></td>
                            

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