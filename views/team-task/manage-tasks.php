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
          <div class="card-header">
            <div class="card-title">
              <i class="fas fa-tasks"></i> All Tasks
            </div>
            
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead class="bg-secondary">
                <th>No</th>
                <th>Project Name</th>
                <th>Type</th>
                <th>Start_End_Date</th>
                <th>Task_Name</th>
                <th>Parent_Task</th>
                <th>Sub_Task</th>
                <th>Action</th>
              </thead>
              <tbody>
                <?php
                  $xl =1;
                  $table = "in_teamtask";
                  $select = new Selectall();
                  $selData = $select->allSelect($table);
                  foreach($selData as $sel)
                  {
                    ?>
                    <tr>
                      <td><?php echo $xl;?></td>
                      <td><?php echo $sel['in_project'];?></td>
                      <td><?php echo $sel['in_reportype'];?></td>
                      <td><?php echo $sel['in_startdate']." to ".$sel['in_endate'];?></td>
                      <td><?php echo $sel['in_taskmodular'];?></td>
                      <td><?php echo $sel['in_parentask'];?></td>
                      <td><?php echo $sel['in_childtask'];?></td>
                      <td><a href="<?php echo VIEW.$pagename;?>/daily-tasks.php?id=<?php echo $sel['in_sno']?>"><i class="fas fa-eye"></i></a><a href="<?php echo BSURL;?>functions/task.php?case=deltask&id=<?php echo $sel['in_sno'];?>" class="ml-2"><i class="fas fa-trash"></i></a></td>
                      


                    </tr>
                    <?php
                    $xl++;
                  }

                ?>
              </tbody>
            </table>
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