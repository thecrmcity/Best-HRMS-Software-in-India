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
            <div class="card-title"><i class="fas fa-gifts"></i> My Balance Leaves</div>
            <div class="card-tools">
            <form class="font-italic" method="GET">
              <div class="input-group">
                <select class="form-control form-control-sm" name="s">
                <option value="">--Select Leave--</option>
                <?php
                $table = "in_leavebalance";
                $inner = " DISTINCT in_leaveid ";
                $cond = " `in_comid`='$comid' AND `in_empid`='$empid'";
                $select = new Selectall();
                $ledata = $select->getallInnercond($table,$inner,$cond);
                if(!empty($ledata))
                {
                  foreach($ledata as $ldata)
                  {
                    $lid = $ldata['in_leaveid'];

                    $table = "in_leavesetup";
                    $cond = " in_comid='$comid' AND `in_leavename`='$lid' AND in_status='1' ";
                    $select = new Selectall();
                    $leups = $select->getcondData($table,$cond);
                    if($leups != "")
                    {
                      $table = "in_leavetype";
                      $cond = " in_sno='$lid' AND in_status='1' ";
                      $select = new Selectall();
                      $leup = $select->getcondData($table,$cond);
                      if($leup != "")
                      {
                        ?>
                        <option value="<?php echo $lid;?>"><?php echo $leup['in_leavetype'];?></option>
                        <?php
                      }
                    }


                    
                    
                  }
                }
                ?>
              </select>
              <div class="input-group-append">
                <button class="input-group-text" type="submit"><i class="fas fa-search"></i></button>
              </div>
              </div>
              

            </form>
          </div>
          </div>
          
          <div class="card-body">
            <div class="table-responsive emptable">
              <table class="table table-bordered table-striped">
                <thead>
                  <th>No</th>
                  <th>Leave Name</th>
                  <th>Leave Details</th>
                  <th>Credit Leave</th>
                  <th>Debit Leave</th>
                  <th>Transaction Date</th>
                  <th>Balance</th>
                </thead>
                <tbody>
                  <?php
                  if(isset($_GET['s']))
                  {
                    $s = $_GET['s'];

                    $value = " in_leavesetup.in_leavename as leavid, in_leavetype.in_leavetype as lvname, in_leavetype.in_abbreviation as abbre ";
                    $table1 = "in_leavetype";
                    $table2 = "in_leavesetup";
                    $match = " in_leavetype.in_sno = in_leavesetup.in_leavename";
                    $cond = " in_leavesetup.in_status='1' AND in_leavetype.in_status='1' AND in_leavetype.in_sno='$s' ";
                    $select = new Selectall();
                    $inshow = $select->innerAllcond($value,$table1,$table2,$match,$cond);

                  }
                  else
                  {
                    $value = " in_leavesetup.in_leavename as leavid, in_leavetype.in_leavetype as lvname, in_leavetype.in_abbreviation as abbre ";
                    $table1 = "in_leavetype";
                    $table2 = "in_leavesetup";
                    $match = " in_leavetype.in_sno = in_leavesetup.in_leavename";
                    $cond = " in_leavesetup.in_status='1' AND in_leavetype.in_status='1' ";
                    $select = new Selectall();
                    $inshow = $select->innerAllcond($value,$table1,$table2,$match,$cond);
                  }
                  
                  
                  if(!empty($inshow))
                  {
                    $xl=1;
                    foreach($inshow as $in)
                    {
                      $ins = $in['leavid'];
                      $table = "in_leavebalance";
                      $cond = " `in_comid`='$comid' AND `in_empid`='$empid' AND `in_leaveid`='$ins' ORDER BY in_date DESC ";
                      $select = new Selectall();
                      $leas = $select->getallCond($table,$cond);
                      if(!empty($leas))
                      {
                        foreach($leas as $les)
                        {
                        ?>
                      <tr>
                        <td><?php echo $xl;?></td>
                        <td><?php echo $in['lvname']?> (<?php echo $in['abbre'];?>)</td>
                        <td><?php echo $les['in_leavedetails'];?></td>
                        <td><?php echo $les['in_credit'];?></td>
                        <td><?php echo $les['in_debit'];?></td>
                        <td><?php echo $les['in_date'];?></td>
                        <td><?php echo $les['in_balance'];?></td>
                      </tr>
                      <?php
                      $xl++;
                        }
                      }
                      
                    }
                  }
                  else
                  {
                    ?>
                    <tr>
                      <td class="text-center" colspan="7">No Data</td>
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