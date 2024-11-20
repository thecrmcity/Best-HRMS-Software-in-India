
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
            <div class="card-title"><i class="fas fa-piggy-bank"></i> Reimbursement Claim</div>
            <div class="card-tools">
              <!-- <a href="<?php echo VIEW.$pagename?>/reimbusement-master.php" class="font-weight-bold text-dark"><i class="fas fa-cash-register"></i> Reimbursement Master</a> -->
            </div>
          </div>
          <div class="card-body">
            <div class="empinfo">
              <div class="row">
              
              <div class="col-lg-4 col-md-4">
                <label>Reimbursement Type*</label>
                <select class="form-control" name="" required>
                  <option value="">--Select--</option>
                  <option value=""></option>
                </select>
              </div>
              <div class="col-lg-4 col-md-4">
                <label>Proof/Attachment</label>
                <input type="file" class="form-control" name="">
              </div>
              <div class="col-lg-4 col-md-4">
                <label>Claim Date</label>
                <input type="date" class="form-control" name="">
              </div>
              <div class="col-lg-4 col-md-4">
                <label>Amount</label>
                <input type="text" class="form-control" name="">
              </div>
              <div class="col-lg-4 col-md-4">
                <label>Mode of Payment</label>
                <select class="form-control" name="" required>
                  <option value="">--Select--</option>
                  <option value=""></option>
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