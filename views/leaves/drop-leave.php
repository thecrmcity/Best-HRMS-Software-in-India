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

    <?php

    if(isset($_GET['id']))

    {

      $id = $_GET['id'];

      $table = "in_applyleaves";

      $cond = " `in_sno`='$id' AND `in_comid`='$comid' ";

      $select = new Selectall();

      $lvs = $select->getcondData($table,$cond);



      $mi = $lvs['in_empid'];

      $table = "in_employee";

      $cond = " `in_empid`='$mi' ";

      $select = new Selectall();

      $emi = $select->getcondData($table,$cond);



      $pr = $emi['in_emprefix'];

      $prf = $select->prefix($pr);

      $empnam = $select->empName($mi);



      $lid = $lvs['in_leaveid'];

      $table = "in_leavetype";

      $cond = " `in_sno`='$lid' ";

      $select = new Selectall();

      $lvty = $select->getcondData($table,$cond);



      $table = "in_leavebalance";

      $cond = " `in_empid`='$mi' AND `in_leaveid`='$lid' ORDER BY in_sno DESC";

      $select = new Selectall();

      $lbal = $select->getcondData($table,$cond);

    }

    ?>

    <!-- Main content -->

    <section class="content">

      <div class="container-fluid">

        <!-- Small boxes (Stat box) -->

        <div class="card">

          <div class="card-body">
            <div class="headetails">
              <h3>Employee Leave Details</h3>

              <table class="bg-light table-bordered" style="width: 100%;" cellpadding="15" cellspacing="15">

              <tr>

                <th>EmpID</th>

                <td><?php echo $prf.$lvs['in_empid'];?></td>

                <th>Employee Name</th>

                <td><?php echo $empnam;?></td>

                <th>Leave Type</th>

                <td><?php echo $lvty['in_leavetype'];?> (<?php echo $lvty['in_abbreviation'];?>)</td>

                <th>Balance</th>

                <td><?php echo $lbal['in_balance'];?></td>

                

              </tr>

              <tr>

                <th>Leave From</th>

                <td><?php echo $lvs['in_startdate'];?></td>

                <th>Day</th>

                <td><?php $daytes = $lvs['in_startday']; echo $daytes == "full_day" ? "Full Day":"Half Day";?></td>

                <th>Leave To</th>

                <td><?php echo $lvs['in_enddate'];?></td>

                <th>Day</th>

                <td><?php $dayents =  $lvs['in_endday'];  echo $dayents == "full_day"? "Full Day":"Half Day"; ?></td>

              </tr>
              <tr>
                <td>Leave Document</td>
                <td>
                  <?php
                  $docs = $lvs['in_attachment'];
                  if($docs != "")
                  {
                    ?>
                    <a href="<?php echo BSURL?>uploads/leavesdoc/<?php echo $docs; ?>" class="text-dark" download=""><i class="fas fa-download"></i> Download</a>
                    <?php
                  }
                  ?>
                </td>
              </tr>

            </table>
            <div class="mt-2">
              <label>Leave Reason</label>
              <p class="form-control rounded-0"><?php echo $lvs['in_reason'];?></p>
            </div>
            </div>

            <div class="headetails mt-3">
              <div class="row">

              <div class="col-md-6 col-lg-6">
                <table class="table table-striped table-bordered">
                  <h3>Leave Summary</h3>
                  <tbody>
                    <tr>
                      <th>Content</th>
                      <th>Applied</th>
                      
                    </tr>
                    <tr>
                      <td>Balance Leave <small class="text-danger"> (after credit)</small></td>
                      <th><?php echo $lvs['in_beforebal']?></th>
                      
                    </tr>
                    <tr>
                      <td>Applied Leave</td>
                      <td><?php echo $lvs['in_applyday']?></td>
                      
                    </tr>
                    <tr>
                      <td>Till Balance</td>
                      <td><?php echo $lvs['in_afterbalan']?></td>
                      
                    </tr>
                    <tr>
                      <td>Loss of Pay</td>
                      <td><?php echo $lvs['in_lossofpay']?></td>
                      
                    </tr>
                    
                    
                  </tbody>
                </table>

                

              </div>

              <div class="col-md-6 col-lg-6">

                <form class="m-3" method="POST" action="<?php echo BSURL;?>functions/leave.php?case=dropleave">

                  <div class="form-group">

                    <input type="hidden" name="id" value="<?php echo $id;?>">

                    <input type="hidden" name="levday" value="<?php echo $lvs['in_applyday']?>">

                    <input type="hidden" name="lid" value="<?php echo $lid;?>">

                    <input type="hidden" name="rest" value="<?php echo $lvs['in_beforebal'];?>">

                    <input type="hidden" name="emi" value="<?php echo $lvs['in_empid'];?>">
                    <input type="hidden" name="prid" value="<?php echo $pr;?>">
                    

                  </div>

                  <div class="form-group">
                    <label>Comment*</label>
                    <textarea class="form-control" name="comment" required rows="4"></textarea>

                  </div>

                  <div class="clearfix">

                    <input type="submit" value="Submit" class="btn btn-info px-3 float-right">

                  </div>

                </form>

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
    $(document).ready(function(){
      $("#customfiled").on('change', function(){
        var custom = $("#customfiled").val();
        if(custom == "custom")
        {
          $("#customline").show();
        }
        else
        {
          $("#customline").hide();
          
        }
      });
    });
  </script>

 <?php

include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/footer.php';

?>