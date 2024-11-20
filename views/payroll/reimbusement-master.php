
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

                <div class="card-header headcolor">

                  <div class="card-title"> <i class="fas fa-cash-register"></i> Reimbursement Master</div>

                  <div class="card-tools">

                    

                  </div>

                </div>

                <div class="card-body">
                  <div class="empinfo">
                    <div class="row">
                      <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                          <label>TDS Applicable</label>
                        <input type="checkbox" name="btnonce" data-bootstrap-switch value="1" data-off-color="danger" data-on-color="success">
                        </div>
                        
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                        <label>Auto Monthly Claim</label>
                        <input type="checkbox" name="btnonce" data-bootstrap-switch value="1" data-off-color="danger" data-on-color="success">
                      </div>
                      </div>
                      <div class="col-md-4 col-lg-4">
                        <label>Reimbursement Name</label>
                        <input type="text" class="form-control rounded-0" name="" required>
                      </div>
                      <div class="col-md-4 col-lg-4">
                        <label>Reimbursement Type</label>
                        <input type="text" class="form-control rounded-0" name="" required>
                      </div>
                      
                      <div class="col-lg-4 col-md-4">
                        <label>Proof/Attachment</label>
                        <input type="file" class="form-control" name="">
                      </div>

                      <div class="col-md-4 col-lg-4">
                        <label>Allotment Type</label>
                        <select class="form-control" name="" required>
                          <option value="">--Select</option>
                          <option value="Monthly">Monthly</option>
                          <option value="Lumsum">Lumsum</option>
                          <option value="No Allotment">No Allotment</option>


                        </select>
                      </div>

                      <div class="col-lg-4 col-md-4">
                        <label>Allotment Amount Proof</label>
                        <input type="text" class="form-control" name="">
                      </div>

                      

                      <div class="col-md-4 col-lg-4">
                        <label>Payment Mode</label>
                        <select class="form-control" name="" required>
                          <option value="">--Select</option>
                          <option value="Cash">Cash</option>
                          <option value="Check">Check</option>
                          <option value="UPI">UPI</option>


                        </select>
                      </div>

                      <div class="col-lg-12 col-md-12">
                      <div class="form-group mt-3">
                        <div class="clearfix">
                          <input type="submit" class="btn btn-dark px-3 float-right" name="" value="Save">
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
<script src="<?php echo BSURL;?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
      
    });
  </script>
<?php

include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/footer.php';

?>