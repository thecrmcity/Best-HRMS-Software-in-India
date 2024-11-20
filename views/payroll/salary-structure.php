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
        <div class="row">
          <div class="col-lg-6">
            <?php
              if(isset($_GET['pedit']))
              {
                $id = $_GET['pedit'];
                $table = "in_payscale";
                $cond = "in_category='payscale' AND in_sno='$id'";
                $select = new Selectall();
                $mdata = $select->getcondData($table,$cond);
               
                if($mdata != "")
                {
                  $mng = $mdata['in_namescle'];
                  $acs = $mdata['in_status'];
                }
                
                $act = "catedit&id=".$id."&p=".$siteaim;

              }
              else
              {
                $act = "payscale";
                $mng = "";
                $acs = "";
              }
              
            ?>
            <div class="empinfo mb-3">
              <h4>Salary Structure</h4>
              <hr>
              <form class="" method="POST" action="<?php echo BSURL;?>functions/payroll.php?case=<?php echo $act;?>">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Payscale*</label>
                <div class="input-group col-sm-9">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><input type="checkbox" name="active" value="1" <?php echo $acs == "1" ? "checked" : "";?>></span>
                  </div>
                  <input type="text" class="form-control rounded-0" placeholder="Structure Name" name="sfield" required value="<?php echo $mng;?>">
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
                    $table = "in_payscale";
                    $cond = " `in_category`='payscale' ";
                    $select = new Selectall();
                    $selData = $select->getallCond($table,$cond);
                    if($selData != "") 
                    {
                      foreach($selData as $sel)
                      {
                      ?>
                      <tr>
                      <td><?php echo $xl;?></td>
                      <td><?php echo $sel['in_namescle']?></td>
                      <td><?php $axs = $sel['in_status']; if($axs == "1"){ echo "Active";}else{ echo "Inactive";} ?></td>
                      <td><a href="?pedit=<?php echo $sel['in_sno'];?>" class="text-success"><i class="fas fa-edit"></i></a></td>
                      <!-- <a href="<?php echo BSURL;?>functions/payroll.php?case=del&id=<?php echo $sel['in_sno'];?>" class="text-danger ml-2"><i class="fas fa-trash"></i></a> -->
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
            $table = "in_ratesetup";
            $select = new Selectall();
            $sel = $select->oneSelect($table);
            if($sel != "")
            {
              $epvalue = $sel['in_epfvalue'];
              $epcuttof = $sel['in_epfcutoff'];
              $penfund = $sel['in_penfund'];
              $epfund = $sel['in_epfund'];

              $esivalue = $sel['in_esivalue'];
              $esicutof = $sel['in_esicutoff'];
              $employee = $sel['in_employee'];
              $employer = $sel['in_employer'];

            }
            else
            {
              $epvalue = "";
              $epcuttof = "";
              $penfund = "";
              $epfund = "";
              $esivalue = "";
              $esicutof = "";
              $employee = "";
              $employer = "";
            }

            ?>
            <form class="" method="POST" onchange="mratesetup()" action="<?php echo BSURL;?>functions/payroll.php?case=ratesetup">
            <div class="card">
              <div class="card-header">
                <div class="card-title">
                  PF & ESI Rate Setup
                </div>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">EPF%</label>
                  <div class="input-group col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0"><i class="fas fa-percentage"></i></span>
                    </div>
                    <span id="epfper" class="btn btn-default rounded-0 border-right-0" readonly ><?php echo $epvalue;?></span>
                    <input type="number" class="form-control rounded-0" name="pfcutoff" value="<?php echo $epcuttof;?>" placeholder="PF Cut Off">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Pension Fund / EPF</label>
                  <div class="input-group col-sm-8">
                    
                    <input type="number" class="form-control rounded-0" name="penfund" id="penfund" value="<?php echo $penfund;?>" placeholder="Pension Fund" step="0.01">
                    <input type="number" class="form-control rounded-0" name="epfund" id="epfund" value="<?php echo $epfund;?>" placeholder="EPF" step="0.01">
                  </div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Total ESI%</label>
                  <div class="input-group col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0"><i class="fas fa-percentage"></i></span>
                    </div>
                    
                    <span id="esiper" class="btn btn-default rounded-0 border-right-0" readonly><?php echo $esivalue;?></span>
                    <input type="number" class="form-control rounded-0" name="esicutoff" value="<?php echo $esicutof;?>" placeholder="ESI Cut Off">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Company Share</label>
                  <div class="input-group col-sm-8">
                    
                    <input type="number" class="form-control rounded-0" name="employee" id="employee" value="<?php echo $employee;?>" placeholder="Employee" step="0.01">
                    <input type="number" class="form-control rounded-0" name="employer" id="employer" value="<?php echo $employer;?>" placeholder="Employer" step="0.01">
                  </div>
                </div>

              </div>
              <div class="card-footer">
                <div class="clearfix">
                  <input type="submit" name="savepf" value="Save" class="btn btn-primary px-5 float-right">
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
<script type="text/javascript">
  function mratesetup()
{
    var penfund = document.getElementById('penfund').value;
    var epfval = document.getElementById('epfund').value;
    var reslt = parseFloat(epfval) + parseFloat(penfund);
    if(penfund != "" && epfval != "")
    {
      document.getElementById('epfper').innerHTML =  reslt;
    }
    

    var emper = document.getElementById('employee').value;
    var empai = document.getElementById('employer').value;
    var peres = parseFloat(emper) + parseFloat(empai);
    if(emper != "" && empai != "")
    {
      document.getElementById('esiper').innerHTML =  peres;
    }
    
}
</script>