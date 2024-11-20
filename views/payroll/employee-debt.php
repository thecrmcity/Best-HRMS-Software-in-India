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
              <i class="fas fa-donate"></i> Employee Loan & Advanced
            </div>
            <div class="card-tools"></div>
          </div>
          <div class="card-body">
            <div class="row mb-2">
              <div class="col-lg-6 col-md-6">
                <form class="form-inline" method="GET">
                  <div class="input-group">
                    <select class="form-control" name="e" required>
                      <option value="">--Select--</option>
                      <?php
                      $table = "in_employee";
                      $cond = " `in_compid`='$comid' AND `in_delete`='1' ";
                      $select = new Selectall();
                      $emploee = $select->getallCond($table,$cond);
                      if(!empty($emploee))
                      {
                        foreach($emploee as $emi)
                        {
                          ?>
                          <option value="<?php echo $emi['in_empid'];?>"><?php echo $emi['in_fname']." ".$emi['in_lname'];?></option>
                          <?php
                        }
                      }
                      ?>
                    </select>
                    <select class="form-control" name="t" required>
                      <option value="">--Select--</option>
                      <option value="Loan">Loan</option>
                      <option value="Advance">Advance</option>

                    </select>
                    <div class="input-group-append">
                      <input type="submit" name="" class="input-group-text" value="GO">
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-lg-6 col-md-6"></div>

            </div>
            <?php
            if(isset($_GET['e']) && isset($_GET['t']))
            {
              $e = $_GET['e'];
              $t = $_GET['t'];
              
              switch($t)
              {
                case "Loan":
                ?>
                <form class="" method="POST" action="">
                <div class="empinfo mb-3">
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <h4 class="mb-3" style="background: #dee7f5;padding: 5px 10px;">Employee Details</h4>

                </div>

                <div class="col-lg-4 col-md-4">
                  <label>EmployeeID :</label>
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Employee Name :</label>
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Email Address :</label>
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Mobile Number</label>
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Designation :</label>
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Department :</label>
                </div>

              </div>
            </div>
                 <div class="empinfo mb-3">
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <h4 class="mb-3" style="background: #dee7f5;padding: 5px 10px;">Loan Form</h4>

                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Document No</label>
                  <input type="text" name="" class="form-control rounded-0">
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Loan Name</label>
                  <input type="text" name="" class="form-control rounded-0">
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Date</label>
                  <input type="date" name="" class="form-control rounded-0">
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Amount</label>
                  <input type="text" name="" class="form-control rounded-0">
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Institution Name</label>
                  <input type="text" name="" class="form-control rounded-0">
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Loan A/C No.</label>
                  <input type="text" name="" class="form-control rounded-0">
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Interest</label>
                  <input type="text" name="" class="form-control rounded-0">
                </div>
               <!--  <div class="col-lg-4 col-md-4">
                  <label>Lumsum</label>
                  <input type="text" name="" class="form-control rounded-0">
                </div> -->
                <div class="col-lg-4 col-md-4">
                  <label>Lumsum Amount</label>
                  <input type="text" name="" class="form-control rounded-0">
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>No. of Installments</label>
                  <input type="text" name="" class="form-control rounded-0">
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Total Installment</label>
                  <input type="text" name="" class="form-control rounded-0">
                </div>
                <div class="col-lg-12 col-md-12">
                  <label>Remarks</label>
                  <textarea class="form-control rounded-0"></textarea>
                </div>

                <div class="col-lg-12 col-md-12">
                  <div class="form-group mt-3">
                    <div class="clearfix">
                      <button type="submit" class="btn btn-dark px-3 float-right">Submit</button>
                    </div>
                  </div>
                  
                  
                </div>
              </div>
            </div>
            </form>
                <?php
                break;
                case "Advance":
                ?>
                <form class="" method="POST" action="">
                <div class="empinfo mb-3">
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <h4 class="mb-3" style="background: #dee7f5;padding: 5px 10px;">Employee Details</h4>

                </div>

                <div class="col-lg-4 col-md-4">
                  <label>EmployeeID :</label>
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Employee Name :</label>
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Email Address :</label>
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Mobile Number</label>
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Designation :</label>
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Department :</label>
                </div>

              </div>
            </div>
                <div class="empinfo mb-3">
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <h4 class="mb-3" style="background: #dee7f5;padding: 5px 10px;">Advance Form</h4>

                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Document No</label>
                  <input type="text" name="" class="form-control rounded-0">
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Advance Name</label>
                  <input type="text" name="" class="form-control rounded-0">
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Date</label>
                  <input type="date" name="" class="form-control rounded-0">
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Amount</label>
                  <input type="text" name="" class="form-control rounded-0">
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Interest</label>
                  <input type="text" name="" class="form-control rounded-0">
                </div>
                <!-- <div class="col-lg-4 col-md-4">
                  <label>Lumsum</label>
                  <input type="text" name="" class="form-control rounded-0">
                </div> -->
                <div class="col-lg-4 col-md-4">
                  <label>Lumsum Amount</label>
                  <input type="text" name="" class="form-control rounded-0">
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>No. of Installments</label>
                  <input type="text" name="" class="form-control rounded-0">
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Total Installment</label>
                  <input type="text" name="" class="form-control rounded-0">
                </div>
                <div class="col-lg-12 col-md-12">
                  <label>Remarks</label>
                  <textarea class="form-control rounded-0"></textarea>
                </div>
                <br>
                <br>
                <div class="col-lg-12 col-md-12">
                  <div class="form-group mt-3">
                    <div class="clearfix">
                      <button type="submit" class="btn btn-dark px-3 float-right">Submit</button>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </form>
                <?php
                break;
              }
            }
            ?>
            
            

           

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