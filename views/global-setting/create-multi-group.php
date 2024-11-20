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
        <?php
        if(isset($_GET['s'])) {
          $s = $_GET['s'];
          $act = "editgroup&id=$s";
          $table = "in_multigroup";
          $select = new Selectall();
          $cond = " `in_sno`='$id' ";
          $mdata = $select->getcondData($table,$cond);
          if($mdata != "")
          {
            $noti = $mdata['in_status'];
            $mval = $mdata['in_groupname'];
            $prent = $mdata['in_perentid'];
          }
        }
        else
        {
          $act = "creategroup";
          $mval = "";
          $noti = "";
        }

        ?>
        
        <div class="row">
          <div class="col-lg-4 col-md-4">
            <div class="empinfo p-4">
              <form action="<?php echo BSURL;?>functions/setting.php?case=<?php echo $act;?>" method="POST">
                <div class="form-group">
                  <label>Group Name</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><input type="checkbox" name="active" value="1"></span>
                    </div>
                    <input type="text" name="grupname" class="form-control" required placeholder="Enter Group Name">
                  </div>
                  
                </div>
                <div class="form-group">
                  <label for="">Mapping With</label>
                  <select name="mapping" id="" class="form-control">
                    <option value="">--Select--</option>
                    <option value="Components">Salary Components</option>
                    <option value="Shift">Working Shift</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="submit" name="" value="Submit"  class="btn btn-primary px-3">
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-8 col-md-8">
            <div class="table-responsive emptable">
              <table class="table table-bordered table-striped">
                <thead class="bg-secondary">
                  <th>No</th>
                  <th>Group Name</th>
                  <th>Mapping With</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php
                    $table = "in_multigroup";
                    $cond = " in_comid='$comid' ";
                    $select = new Selectall();
                    $grlist = $select->getallCond($table,$cond);
                    if(!empty($grlist))
                    {
                      $xl =1;
                      foreach($grlist as $gr)
                      {
                        ?>
                        <tr>
                          <td><?php echo $xl;?></td>
                          <td><?php echo $gr['in_groupname']?></td>
                          <td><?php echo $gr['in_perentid'];?></td>
                          <td><?php echo $gr['in_status'];?></td>
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