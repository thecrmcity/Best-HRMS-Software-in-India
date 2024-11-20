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
        
          
          <div class="callout callout-info">
            <div class="card-title">
              <i class="fas fa-tasks"></i>  Tasks
            </div>
            <div class="clearfix">
              <a href="add-task.php" class="text-success float-right nav-item"><b><i class="fas fa-plus-circle"></i> Add Task</b></a>
            </div>
          </div>
          <?php
            if(isset($_GET['id']))
            {
              $table = "in_teamtask";
              $cond = " `in_sno`='$id' ";
              $select = new Selectall();
              $task = $select->getcondData($table,$cond);
            }
            else
            {
              $table = "in_teamtask";
              $cond = " `in_comid`='$comid' AND `in_empid`='$empid' AND `in_sodeodate`='$cdate' AND `in_status`='1' LIMIT 1";
              $select = new Selectall();
              $task = $select->getcondData($table,$cond);
            }
            
            if($task != "")
            {
              
                ?>
                <div class="invoice p-3 mb-3 mt-2">
                  <div class="row">
                      <div class="col-12">
                        <h4>
                          <i class="fas fa-edit"></i> <?php echo $task['in_project'];?>
                          <small class="float-right">Date: <?php echo $task['in_sodeodate'];?></small>
                        </h4>
                      </div>
                      <!-- /.col -->
                    </div>
                    <div class="row invoice-info">
                      <div class="col-sm-4 invoice-col">
                        <br>
                        <br>
                       <address><b>Task Modular :</b> <?php echo $task['in_taskmodular'];?><br>
                       <b>Parent Task : </b><?php echo $task['in_parentask'];?><br>
                       <b>Child Task : </b><?php echo $task['in_childtask'];?></address>


                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                       <br>
                       <br>
                       <address><b>Primary Response:</b> <?php echo $task['in_primaryman'];?><br>
                       <b>Other Response : </b><?php echo $task['in_otherman'];?><br>
                       <b>Dependancy : </b><?php echo $task['in_dependanci'];?></address>
                        
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                        <div class="float-right">
                          <b>Task Type : <?php echo strtoupper($task['in_reportype']);?></b><br>
                        <br>
                        <b>Start Date:</b> <?php echo $task['in_startdate'];?><br>
                        <b>End Date :</b> <?php echo $task['in_endate'];?><br>
                        <b>Billing Month:</b> <?php echo $task['in_billingmonth'];?>
                        </div>
                        
                      </div>
                      <!-- /.col -->
                    </div>
                    <br>
                    <br>
                    <div class="row">
                      <div class="col-12">
                        <div class="task-details border p-3">
                          <?php echo $task['in_anyremarks'];?>
                        </div>
                      </div>
                      <!-- /.col -->
                    </div>
                </div>
                <?php
              }
            
          ?>
          
        
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