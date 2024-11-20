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
            <div class="card-body">
                <table class="table table-bordered">
                <tr style="background:teal;color:#ffff">
                    <td colspan="4" class="font-weight-bold">Candidate Information</td>
                </tr>
                
                <?php
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                    $table = "in_candidates";
                    $cond = " `in_sno`='$id' ";
                    $select = new Selectall();
                    $upsts = $select->getcondData($table, $cond);
                    if($upsts != "")
                    {
                        ?>
                        <tr>
                            <th>Candidate Name</th>
                            <th><?php echo $upsts['in_caname'];?></th>
                            <td>Mobile No</td>
                            <td><?php echo $upsts['in_mobile'];?></td>
                    </tr><tr>
                            <td>Email Address</td>
                            <td><?php echo $upsts['in_email'];?></td>
                            <td>Joining Date</td>
                            <td><?php echo $upsts['in_dateofjoin'];?></td>
                        </tr> 

                        <?php
                    }
                }

                ?>
                <form method="POST" action="<?php echo BSURL;?>functions/candidates.php?case=joiningemail">
                <tr style="background:teal;color:#ffff">
                    <input type="hidden" name="canid" value="<?php echo $id;?>">
                    <input type="hidden" name="useremail" value="<?php echo $upsts['in_email'];?>">

                    <td colspan="4" class="font-weight-bold">Required Document</td>
                </tr>
                <tr>
                  <td><input type="checkbox" value="1" name="tenth" required> 10th Certificate with Marksheet <span class="text-danger font-weight-bold">*</span></td>
                  <td><input type="checkbox" value="1" name="twelfth" required> 12th Certificate with Marksheet <span class="text-danger font-weight-bold">*</span></td>
              
                  <td><input type="checkbox" value="1" name="graduation"> Graduation Certificate with Marksheet</td>
                  <td><input type="checkbox" value="1" name="postgraduation"> Post Graduation Certificate with Marksheet</td>
                </tr><tr style="background:#e7e7e7;color:#4a4a4a">
                  <td><input type="checkbox" value="1" name="service"> Service Certificates from Previous Employer(s) and / Relieving Letter from Last Employer.</td>
                  <td><input type="checkbox" value="1" name="bankstatement"> Bank Statement of last three months.</td>
                 
                  <td><input type="checkbox" value="1" name="pancard" required> Copy of PAN Card <span class="text-danger font-weight-bold">*</span></td>
                  <td><input type="checkbox" value="1" name="adharcard" required> Copy of Aadhar Card <span class="text-danger font-weight-bold">*</span></td>
                  </tr><tr>
                  <td><input type="checkbox" value="1" name="photographs"> Four Color passport size Photographs.</td>
                  <td><input type="checkbox" value="1" name="voterlicence"> Copy of voter Identity Card / Driving License.</td>
                  <td></td>
                  <td></td>
                </tr>
                </table>
            </div>
        </div>
        <div class="mt-2">
        <textarea id="compose-textarea" class="form-control rounded-0" style="height: 300px" name="contents"></textarea>
        </div>
        <div class="clearfix">
          <input type="submit" class="btn btn-primary px-3 float-right" value="Send Confirmation">
        </div>
        </form>
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
<script>

$(function () {



  $('#compose-textarea').summernote()

})

</script>