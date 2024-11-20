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
            <div class="card-title">FY 2024-2025</div>
            <div class="card-tools">
              <a href="slab-rate.php" class="text-dark font-weight-bold"><i class="fas fa-donate"></i> Slab Rate</a>
            </div>
          </div>
          <div class="card-body">
            <form class="" method="POST" action="<?php echo BSURL;?>functions/payroll.php?case=addslab">

              <div class="form-group row">
                <label class="col-sm-3">Select Financial Year</label>
                <div class="input-group col-sm-4">
                  <select class="form-control" required name="finanace">

                    <option value="<?php echo date('Y')?><?php echo "-".date('Y', strtotime($ydate, strtotime("+ 1 Years")))?>"><?php echo date('Y')?><?php echo "-".date('Y', strtotime($ydate, strtotime("+ 1 Years")))?></option>
                    <?php
                    $s=0;
                    for($i=1;$i<=10;$i++)
                    {
                      $fullyear = date('Y', strtotime($ydate, strtotime("- $i Years")));
                      $oneyear = date('Y', strtotime($ydate, strtotime("- $s Years")));

                      ?>
                      <option value=""><?php echo $fullyear;?><?php echo "-".$oneyear;?></option>
                      <?php
                      $s++;
                    }
                    ?>
                    
                  </select>
                </div>
                <div class="col-sm-5">
                  <div class="clearfix">
                    <input type="submit" class="btn btn-info px-5 float-right" value="Save">
                  </div>
                </div>
              </div>
            
            <div class="row">
              <script type="text/javascript">
              $(document).ready(function(){
              $("#oldslab").click(function(){
                  
                  var lastField = $("#oldslabrow tr:last");
                  var fieldWrapper = $("<tr/>");
                  
                  var sName = $("<td><input type=\"text\" class=\"form-control rounded-0\" name=\"oldslabname[]\" placeholder=\"Slab...\"></td><td><input type=\"text\" class=\"form-control rounded-0\" name=\"oldslabvalue[]\" placeholder=\"Slab Value...\"></td><td><input type=\"text\" class=\"form-control rounded-0\" name=\"olddiffence[]\" placeholder=\"Diffence Value...\"></td>");
                  
                  var removeButton = $("</td><td><span class=\"input-group-text rounded-0 bg-danger remove\"><i class=\"fas fa-times\"></i></span>");
                  removeButton.click(function() {
                      $(this).parent().remove();
                  });
                  
                  fieldWrapper.append(sName);
                  fieldWrapper.append(removeButton);
                  $("#oldslabrow").append(fieldWrapper);
              });
          });
            </script>
              <div class="col-lg-6 col-md-6">
                <div class="table-responsive">
                  <table style="width: 100%;" cellpadding="5" border="1">
                    <tr>
                      <td colspan="4" style="background: #073763;text-align: center;color:#ffffff;"><h4 class="mb-0">Old Regine</h4></td>
                    </tr>
                    <tr style="background: #cfe2f3;" class="font-weight-bold">
                      <td>Slabs</td>
                      <td>Individuals</td>
                      <td>Diffence</td>

                      <td width="50px"><button type="button" class="btn bg-info border-0 btn-sm" id="oldslab"><i class="fas fa-plus"></i></button></td>
                    </tr>
                    <tbody id="oldslabrow">
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <script type="text/javascript">
              $(document).ready(function(){
              $("#proeducate").click(function(){
                  
                  var lastField = $("#education tr:last");
                  var fieldWrapper = $("<tr/>");
                  
                  var sName = $("<td><input type=\"text\" class=\"form-control rounded-0\" name=\"newslabname[]\" placeholder=\"Slab...\"></td><td><input type=\"text\" class=\"form-control rounded-0\" name=\"newslabvalue[]\" placeholder=\"Slab Value...\"></td><td><input type=\"text\" class=\"form-control rounded-0\" name=\"newdiffence[]\" placeholder=\"Diffence Value...\"></td>");
                  
                  var removeButton = $("</td><td><span class=\"input-group-text rounded-0 bg-danger remove\"><i class=\"fas fa-times\"></i></span>");
                  removeButton.click(function() {
                      $(this).parent().remove();
                  });
                  
                  fieldWrapper.append(sName);
                  fieldWrapper.append(removeButton);
                  $("#education").append(fieldWrapper);
              });
          });
            </script>
              <div class="col-lg-6 col-md-6">
                <div class="table-responsive">
                  <table style="width: 100%;" cellpadding="5" border="1">
                    <tr>
                      <td colspan="4" style="background: #073763;text-align: center;color:#ffffff;"><h4 class="mb-0">New Regine</h4></td>
                    </tr>
                    <tr style="background: #cfe2f3;" class="font-weight-bold">
                      <td>Slabs</td>
                      <td>Individuals</td>
                      <td>Diffence</td>

                      <td width="50px"><button type="button" class="btn bg-info border-0 btn-sm" id="proeducate"><i class="fas fa-plus"></i></button></td>
                    </tr>
                    <tbody id="education">
                      
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
            </form>
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