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
        
        <div class="card rounded-0">
          <div class="card-header">
            <div class="card-title"><i class="fas fa-list"></i> Multi Level Group List</div>
            <div class="card-tools">
              <a href="<?php echo VIEW.$pagename;?>/create-multi-group.php" class="font-weight-bold text-dark"><i class="fas fa-plus"></i> Create Group</a>
            </div>
          </div>
          <div class="card-body">
              <div  class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead class="bg-info sticky-top">
                    <th>No</th>
                    <th>Employee Name</th>
                    <th>Group Name</th>
                    <th>Mapping With</th>
                    <th>Created Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                    <?php
                    if(isset($_GET['id']))
                    {
                      $id = $_GET['id'];
                    }
                    $xl=1;
                    $table = "in_multigroup";
                    $cond = " `in_comid`='$comid' AND `in_groupname`='$id' AND `in_status`='1' ";
                    $select = new Selectall();
                    $group = $select->getallCond($table,$cond);
                    if(!empty($group))
                    {
                      foreach($group as $gp)
                      {
                        $gip = $gp["in_empid"];
                        $table = "in_employee";
                        $cond = " `in_empid`='$gip' ";
                        $select = new Selectall(); 
                        $emi = $select->getcondData($table,$cond);
                        if($emi != "")
                        {
                        ?>
                        <tr>
                          <td><?php echo $xl;?></td>
                          <td><?php echo $emi['in_fname']." ".$emi['in_lname'];?></td>
                          <td><?php echo $gp['in_groupname'];?></td>
                          <td><?php echo $gp['in_perentid'];?></td>
                          <td><?php echo $gp['in_createdate'];?></td>
                          <td><?php echo $gp['in_status'] == "1" ? "Active":"Inactive";?></td>
                          <td></td>
                        </tr>
                        <?php
                        $xl++;
                        }
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