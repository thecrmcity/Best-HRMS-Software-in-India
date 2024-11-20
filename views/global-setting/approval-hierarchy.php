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
             <i class="fas fa-list"></i> Hierarchy List
            </div>
            <div class="card-tools">
              <a href="<?php echo VIEW.$pagename?>/create-hierarchy.php" class="font-weight-bold text-dark"><i class="fas fa-plus"></i> Create Hierarchy</a>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-3">
                <div class="sidehint">
                <ul class="hierarchlink">
                  <?php
                  $table = "in_master_card";
                  $cond = " `in_relation`='Hierarchy' AND `in_status`='1' ";
                  $select = new Selectall();
                  $seldata = $select->getallCond($table,$cond);
                  if(!empty($seldata))
                  {
                    foreach($seldata as $sel)
                    {
                      ?>
                      
                        <li><a href="<?php echo VIEW.$pagename;?>/approval-hierarchy.php?id=<?php echo $sel['in_sno'];?>" class="text-dark"><i class="fas fa-angle-double-right"></i> <?php echo $sel['in_prefix'];?></a></li>
                    
                      <?php
                    }
                  }
      
                  ?>
                  </ul>
                </div>
              </div>
              <div class="col-lg-9">
                
                  <?php
                  if(isset($_GET['id']))
                  {
                    $id = $_GET['id'];

                    $table = "in_hierarchy";
                    $cond = " `in_comid`='$comid' AND `in_hierarchyid`='$id' ";
                    $select = new Selectall();
                    $selpo = $select->getcondData($table,$cond);
                    if($selpo != "")
                    {
                      $sid = $selpo['in_headid'];
                      $sid2 = $selpo['in_headid2'];
                      $sid3 = $selpo['in_headid3'];

                      ?>
                      <table class="table table-bordered">
                        <tr class="table-secondary">
                          <td>Hierarchy Name</td>
                          <td><?php echo $selpo['in_hierarchyname'];?></td>
                          <td>Hierarchy For</td>
                          <td><?php echo $selpo['in_hierarchyfor'];?></td>
                          <td><?php echo date('d-m-Y',strtotime($selpo['in_createdat']));?></td>
                          <td><a href="<?php echo VIEW?>global-setting/create-hierarchy.php?id=<?php echo $id;?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a></td>
                        </tr>
                        <tr class="card-footer">
                          <th>First Approval</th>
                          
                          <td><?php  echo $select->empName($sid);?></td>
                          
                          <td><?php echo $select->emPosition($sid);?></td>
                          <td><?php echo " Level ".$selpo['in_headlevel'];?></td>
                          <td><?php echo "Limit Days ".$selpo['in_limitday'];?></td>
                          <td><?php echo "Mandatory "; echo $selpo['in_limitday'] == "0"?"(Yes)":"(No)";?></td>

                        </tr>
                        <tr class="card-footer">
                          <th>Second Approval</th>
                          
                          <td><?php  echo $select->empName($sid2);?></td>
                          
                          <td><?php echo $select->emPosition($sid2);?></td>
                          <td><?php echo " Level ".$selpo['in_headlevel2'];?></td>
                          <td><?php echo "Limit Days ".$selpo['in_limitday2'];?></td>
                          <td><?php echo "Mandatory "; echo $selpo['in_limitday2'] == "0"?"(Yes)":"(No)";?></td>

                        </tr>
                        <tr class="card-footer">
                          <th>Third Approval</th>
                          
                          <td><?php  echo $select->empName($sid3);?></td>
                          
                          <td><?php echo $select->emPosition($sid3);?></td>
                          <td><?php echo " Level ".$selpo['in_headlevel3'];?></td>
                          <td><?php echo "Limit Days ".$selpo['in_limitday3'];?></td>
                          <td><?php echo "Mandatory "; echo $selpo['in_limitday3'] == "0"?"(Yes)":"(No)";?></td>

                        </tr>
                      </table>
                      <?php
                    }

                  }
                  ?>
                    
                <?php
                if(isset($_GET['id']))
                {
                  
                  ?>
                  <div class="table-responsive emptable">
                  <table class="table table-bordered table-striped">
                    <thead class="table-secondary">
                      <th>Employee Id</th>
                      <th>Employee Name</th>
                      <th>Department</th>
                      <th>Designation</th>
                      <th>Reporting</th>

                    </thead>
                    <tbody>
                  <?php
                  $id = $_GET['id'];
                  $table = "in_hierarchy";
                  $cond = " `in_comid`='$comid' AND `in_hierarchyid`='$id' ";
                  $select = new Selectall();
                  $selup = $select->getallCond($table,$cond);
                  if(!empty($selup))
                  {
                    
                    foreach($selup as $up)
                    {
                      $cemi = $up["in_empid"];
                      ?>
                      <tr>
                        <td><?php echo $select->empPrefix($cemi).$cemi; ?></td>
                        <td><?php echo $select->empName($cemi);?></td>
                        <td><?php echo $select->emDepartment($cemi);?></td>
                        <td><?php echo $select->emPosition($cemi);?></td>
                        <td><?php echo $select->getReporting($cemi);?></td>


                      </tr>
                      <?php
                      
                    }
                  }
                  ?>
                  </tbody>
                  </table>
                </div>
                  <?php
                }
                ?>
              </div>
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