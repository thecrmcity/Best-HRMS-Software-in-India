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

              <li class="breadcrumb-item"><a href="<?php echo BSURL;?>views/dashboard/"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active"><?php echo ucwords($sitename);?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php
    if(isset($_POST['savecheck']))
    {
      $alloc = $_POST['alloc'];
      echo $alloc;
    }
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <div class="card rounded-0" >
          <div class="card-header" style="background: #213764;">
            <div class="card-title text-white font-weight-bold"><?php echo date('F');?>-<?php echo date('Y');?></div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-bordered table-striped text-white">
                <thead>
                  <tr>
                  <th rowspan="2" style="background: linear-gradient(180deg, rgba(12,168,218,1) 0%, rgba(61,99,159,1) 100%);">Employee Name</th>
                  <th style="background: linear-gradient(180deg, rgba(12,168,218,1) 0%, rgba(61,99,159,1) 100%);">P</th>
                  <th style="background: linear-gradient(180deg, rgba(12,168,218,1) 0%, rgba(61,99,159,1) 100%);">A</th>
                  <th style="background: linear-gradient(180deg, rgba(12,168,218,1) 0%, rgba(61,99,159,1) 100%);">L</th>
                  <th style="background: linear-gradient(180deg, rgba(12,168,218,1) 0%, rgba(61,99,159,1) 100%);">WO</th>
                  <?php
                  for($i=1;$i<=31;$i++)
                  {
                    ?>
                    <th style="background: linear-gradient(180deg, rgba(228,108,51,1) 0%, rgba(234,14,11,1) 100%);" class="pt-3 px-0"><p class="p-0 mx-0" style="rotate: 270deg;"><?php echo $i."_".date('M')?></p></th>
                    <?php
                  }
                  ?>
                </tr>
                <tr>
                  <th class="text-success"><i class="fas fa-check"></i></th>
                  <th class="text-danger"><i class="fas fa-times"></i></th>
                  <th class="text-primary"><i class="fas fa-temperature-high"></i></th>
                  <th class="text-secondary"><i class="fas fa-utensils"></i></th>
                   <?php
                   $cyer = date('Y', strtotime($cdate));
                    $cmon = date('m', strtotime($cdate));
                    $mdays = date('t', strtotime($cdate));
                  for($i=1;$i<=31;$i++)
                    
                  {
                    $csday = $cyer."-".$cmon."-".$i;
                    $csdayd = date('D', strtotime($csday));
                    ?>
                    <th style="background: linear-gradient(180deg, rgba(202,219,172,1) 0%, rgba(143,195,92,1) 100%);padding: 5px 0px;" class="text-secondary"><p class="" style="rotate: 270deg;"><?php echo $csdayd;?></p></th>
                    <?php
                  }
                  ?>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $px = 1;
                  $cmon = date('F',strtotime($cdate));
                  $table = "in_monthly_attend";
                  $cond = " `in_month`='$cmon' AND `in_year`='$ydate'";
                  $select = new Selectall();
                  $selData = $select->getallCond($table,$cond);
                  if(!empty($selData))
                  {
                    foreach($selData as $sel)
                    {
                      ?>
                      <tr class="text-dark">
                        <td><?php echo $sel['in_fname']." ".$sel['in_lname'];?></td>
                        <td style="background: linear-gradient(80deg, rgba(253,240,196,1) 0%, rgba(223,201,122,1) 100%);"><?php echo $sel['in_days'];?></td>
                        <td style="background: linear-gradient(80deg, rgba(253,240,196,1) 0%, rgba(223,201,122,1) 100%);"><?php echo $sel['in_days'];?></td>
                        <td style="background: linear-gradient(80deg, rgba(253,240,196,1) 0%, rgba(223,201,122,1) 100%);"><?php echo $sel['in_days'];?></td>
                        <td style="background: linear-gradient(80deg, rgba(253,240,196,1) 0%, rgba(223,201,122,1) 100%);"><?php echo $sel['in_days'];?></td>
                      </tr>
                      <?php
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