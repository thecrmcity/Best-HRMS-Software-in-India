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
            <h4 class="m-0"><?php echo $fullPage;?></h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><span onclick="history.back()" class="badge badge-danger" style="cursor: pointer;"><i class="fas fa-arrow-left"></i> Back</span></li>
              <li class="breadcrumb-item"><a href="<?php echo BSURL;?>views/dashboard/"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active"><?php echo $fullPage;?></li>
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
        <div class="card card-primary card-outline rounded-0">
          <div class="card-body">
            <form class="" method="POST">
              <div class="form-group">
                <label class="col-form-label">Write or Paste Single Query <code> (run single query at once ;)</code></label>
              <textarea class="form-control rounded-0" placeholder="SELECT * FORM table_name;" name="sql"></textarea>
              </div>
              
              <div class="form-group clearfix">
                  <input type="submit" value="Execute" class="btn btn-primary float-right">
              </div>
            </form>
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-hover">
                <thead>
                  <?php
                  if(isset($_POST['sql']))
                  {
                    $sql = $_POST['sql'];
                    $db = new Database();
                    $res = mysqli_query($db->conn,$sql);
                    $fetall = mysqli_fetch_all($res, MYSQLI_ASSOC);
                    $fhead = $fetall[0];
                    echo "<tr>";
                    foreach($fhead as $sq => $val)
                    {
                      ?>
                      
                        <th><?php echo $sq;?></th>
                      
                      <?php
                    }
                    echo "</tr>";
                  }
                  ?>
                </thead>
                <tbody>
                  <?php
                  if(isset($_POST['sql']))
                  {
                  $sqltrm = count($fetall);
                  // echo "<pre>";
                  // print_r($fetall);
                  // die;
                  $xl = 0;
                  while($xl<$sqltrm)
                  {
                    echo "<tr>";
                    $selt = $fetall[$xl];
                    foreach($selt as $sq => $val)
                      {
                          ?>
                          <td><?php echo $val;?></td>
                          <?php
                      }
                      echo "</tr>";
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