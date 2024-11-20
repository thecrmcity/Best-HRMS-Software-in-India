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
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6 col-lg-6">
               
              <div class="bg-light p-2 border">
              <?php
                if(isset($_GET['comit']))
                {
                  $id = $_GET['comit'];
                  $table = "in_countries";
                  $cond = " `in_sno`='$id'";
                  $select = new Selectall();
                  $pre = $select->getcondData($table,$cond);
                  if($pre != "")
                  {
                    $company = $pre['in_country'];
                    $code = $pre['in_code'];
                    $comavt = $pre['in_status'];
                    $act = "editcounty&id=".$id;
                  }
                  
                }
                else
                {
                  $act = "country";
                  $company = "";
                  $comavt = "";
                  $code = "";
                }
                
                
              ?>
              
              <form class="" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=<?php echo $act;?>">
                <div class="form-group">
                  <label>Add Country</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0"><input type="checkbox" name="comactive" value="1" <?php echo $comavt == "1" ? "checked":"";?>></span>
                    </div>
                  <input type="text" class="form-control" name="company" placeholder="Country" required value="<?php echo $company;?>">
                  <input type="text" class="form-control" name="code" placeholder="Code" required id="coscode" value="<?php echo $code;?>" maxlength="2">
                  <div class="input-group-append">
                    <button type="submit" class="input-group-text">Go</button>
                  </div>
                </div>
                </div>
              </form>
              
            </div>
                
              

              

              </div>
              <div class="col-sm-6 col-log-6">
                <div class="table-responsive emptable">
                  <table class="table table-bordered table-striped">
                <tr class="bg-primary sticky-top">
                  <td>ID</td>
                  <td>Code</td>
                  <td>Name</td>
                  <td>Status</td>
                  <td class="text-center"><span class="fas fa-edit"></span></td>
                  <td class="text-center"><span class="fas fa-trash"></span></td>

                </tr>
                <?php
                $table = "in_countries";
                $cond = " `in_status`='1'";
                $select = new Selectall();
                $com = $select->getallCond($table,$cond);
                  if($com != "") 
                  {
                    foreach($com as $cm)
                    { 
                    ?>
                    <tr>
                      <td><?php echo $cm['in_sno'];?></td>
                      <td><?php echo $cm['in_code'];?></td>
                      <td><?php echo $cm['in_country'];?></td>
                      <td><?php $status = $cm['in_status']; echo $status == "1" ? "Active": "Inactive";?></td>
                      <td class="text-center"><a href="?comit=<?php echo $cm['in_sno'];?>" class="text-success"><i class="fas fa-edit"></i></a></td>
                      <td class="text-center"><a href="<?php echo BSURL;?>functions/setting.php?case=delconty&id=<?php echo $cm['in_sno'];?>" class="text-danger" onclick="return confirm('Are you Sure!')"><i class="fas fa-trash"></i></a></td>
                    </tr>
                    <?php
                    }
                  }
                  else
                  {
                    ?>
                    <tr>
                      <td colspan="4" class="text-center">No Data</td>
                      <tr>
                    <?php
                  }
                ?>
              </table>
                </div>
                
              
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
 <script type="text/javascript">
   const inputField = document.getElementById("coscode");

  inputField.addEventListener("keyup", function() {
    inputField.value = inputField.value.toUpperCase();
  });
 </script>
 <?php
include_once $bsurl.'/inc/alert.php';
include_once $bsurl.'/inc/footer.php';
?>