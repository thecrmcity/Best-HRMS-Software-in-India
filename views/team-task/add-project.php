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
        
        <div class="row">
          <div class="col-lg-6">
            <?php
              if(isset($_GET['eedit']))
              {
                $id = $_GET['eedit'];
                $table = "in_project";
                $cond = "in_category='project' AND in_sno='$id'";
                $select = new Selectall();
                $mdata = $select->getcondData($table,$cond);
               
                if($mdata != "")
                {
                  $mng = $mdata['in_proname'];
                  $acs = $mdata['in_status'];
                }
                
                $act = "catedit&id=".$id."&p=".$siteaim;

              }
              else
              {
                $act = "project";
                $mng = "";
                $acs = "";
              }
              
            ?>
            <div class="empinfo mb-3">
              <h4>Project Name</h4>
              <hr>
              <form class="" method="POST" action="<?php echo BSURL;?>functions/task.php?case=<?php echo $act;?>">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Name*</label>
                <div class="input-group col-sm-9">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><input type="checkbox" name="active" value="1" <?php echo $acs == "1" ? "checked" : "";?>></span>
                  </div>
                  <input type="text" class="form-control rounded-0" placeholder="Project Name" name="sfield" required value="<?php echo $mng;?>">
                </div>
              </div>
              
               <div class="form-group row">
                <div class="input-group col-sm-9">
                  
                </div>
                <div class="col-sm-3"><input type="submit" name="savescale" value="Save" class="btn btn-primary btn btn-block"></div>
                
              </div>
              </form>
            </div>
            <div class="empinfo mb-3">
              <table class="table table-bordered table-striped">
                <thead>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php
                  $xl = 1;
                    $table = "in_project";
                    $cond = " `in_category`='project' ";
                    $select = new Selectall();
                    $selData = $select->getallCond($table,$cond);
                    if($selData != "") 
                    {
                      foreach($selData as $sel)
                      {
                      ?>
                      <tr>
                      <td><?php echo $xl;?></td>
                      <td><?php echo $sel['in_proname']?></td>
                      <td><?php $axs = $sel['in_status']; if($axs == "1"){ echo "Active";}else{ echo "Inactive";} ?></td>
                      <td><a href="?eedit=<?php echo $sel['in_sno'];?>" class="text-success"><i class="fas fa-edit"></i></a><a href="<?php echo BSURL;?>functions/task.php?case=del&id=<?php echo $sel['in_sno'];?>" class="text-danger ml-2"><i class="fas fa-trash"></i></a></td>
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
          <div class="col-lg-6">
            <?php
              if(isset($_GET['kedit']))
              {
                $id = $_GET['kedit'];
                $table = "in_project";
                $cond = "in_category='task' AND in_sno='$id'";
                $select = new Selectall();
                $mdata = $select->getcondData($table,$cond);
               
                if($mdata != "")
                {
                  $mng = $mdata['in_proname'];
                  $acs = $mdata['in_status'];
                }
                
                $act = "catedit&id=".$id."&p=".$siteaim;

              }
              else
              {
                $act = "task";
                $mng = "";
                $acs = "";
              }
              
            ?>
            <div class="empinfo mb-3">
              <h4>Modular/ Task Name</h4>
              <hr>
              <form class="" method="POST" action="<?php echo BSURL;?>functions/task.php?case=<?php echo $act;?>">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Name*</label>
                <div class="input-group col-sm-9">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><input type="checkbox" name="active" value="1" <?php echo $acs == "1" ? "checked" : "";?>></span>
                  </div>
                  <input type="text" class="form-control rounded-0" placeholder="Task Name" name="sfield" required value="<?php echo $mng;?>">
                </div>
              </div>
              
               <div class="form-group row">
                <div class="input-group col-sm-9">
                  
                </div>
                <div class="col-sm-3"><input type="submit" name="savescale" value="Save" class="btn btn-primary btn btn-block"></div>
                
              </div>
              </form>
            </div>
            <div class="empinfo mb-3">
              <table class="table table-bordered table-striped">
                <thead>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php
                  $xl = 1;
                    $table = "in_project";
                    $cond = " `in_category`='task' ";
                    $select = new Selectall();
                    $selData = $select->getallCond($table,$cond);
                    if($selData != "") 
                    {
                      foreach($selData as $sel)
                      {
                      ?>
                      <tr>
                      <td><?php echo $xl;?></td>
                      <td><?php echo $sel['in_proname']?></td>
                      <td><?php $axs = $sel['in_status']; if($axs == "1"){ echo "Active";}else{ echo "Inactive";} ?></td>
                      <td><a href="?kedit=<?php echo $sel['in_sno'];?>" class="text-success"><i class="fas fa-edit"></i></a><a href="<?php echo BSURL;?>functions/task.php?case=del&id=<?php echo $sel['in_sno'];?>" class="text-danger ml-2"><i class="fas fa-trash"></i></a></td>
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