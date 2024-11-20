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

      $cond = " `in_sno`='$id' ";

      $select = new Selectall();

      $ap = $select->getcondData($table,$cond);

      if($ap != "")

      {

        $acts ="editapply&id=$id";

        $lids = $ap['in_leaveid'];

        $sdate = $ap['in_startdate'];

        $sday = $ap['in_startday'];
        
        $ndate = $ap['in_enddate'];

        $nday = $ap['in_endday'];

       

        $reason = $ap['in_reason'];

        $balance = $ap['in_beforebal'];
        $applied = $ap['in_applyday'];
        $rest = $ap['in_afterbalan'];
        $loss = $ap['in_lossofpay'];

        $contact = $ap['in_contact'];

        $email = $ap['in_email'];

      }

      

    }

    else

    {

      $table = "in_employee";

      $cond = " `in_empid`='$empid' AND `in_compid`='$comid' ";

      $select = new Selectall();

      $info = $select->getcondData($table,$cond);





      $acts = "applyleave";

      $lids = "";

      $sdate = "";

      $sday = "";

      $ndate = "";

      $nday = "";

      $reason = "";

      $balance = "";
      $applied = "";
      $rest = "";
      $loss = "";

      $contact = $info['in_mobileno'];

      $email = $info['in_email'];



     

    }

    ?>



    <!-- Main content -->

    <section class="content">

      <div class="container-fluid">

        <!-- Small boxes (Stat box) -->

        <form class="" method="POST" action="<?php echo BSURL;?>functions/leave.php?case=<?php echo $acts;?>&f=<?php echo $pagename;?>&p=<?php echo $siteaim;?>" enctype="multipart/form-data">

        <div class="card">
          <div class="card-header">
            <div class="card-title">
              <i class="fas fa-plane"></i> Apply Leave Form
            </div>
            <div class="card-tools">
              <a href="<?php echo VIEW.$pagename?>/my-leaves.php" class="font-weight-bold text-dark"><i class="fas fa-gifts"></i> My Leaves</a>
            </div>
          </div>

          <div class="card-body">

            <div class="row">

              <div class="col-md-7 col-lg-7">

                

                  <div class="form-group row">

                    <label class="col-sm-4 col-form-label">Leave Type</label>

                      <div class="input-group col-sm-8">
                        <select class="form-control rounded-0" name="leavetype" id="leavebal" required>
                          <option hidden>--Select Leave Type--</option>
                        <?php
                          $table = "in_leavesetup";
                          $cond = " `in_status`='1' ";
                          $select = new Selectall();
                          $seleve = $select->getallCond($table,$cond);
                          
                          if(!empty($seleve))

                          {
                            $s =1;
                            foreach($seleve as $lev)

                            {
                              $lid = $lev['in_leavename'];
                              $table = "in_leavebalance";
                              $cond = " `in_comid`='$comid' AND `in_empid`='$empid' AND `in_leaveid`='$lid' ORDER BY in_sno DESC";
                              $select = new Selectall();
                              $levbal = $select->getcondData($table,$cond);
                              if($levbal != "")
                              {
                                $lovbal = $levbal['in_balance'];
                              }
                              else
                              {
                                $lovbal = 0;
                              }
                              
                              if($lovbal != "0")
                              {
                                $table = "in_leavetype";
                                $cond = " `in_comid`='$comid' AND `in_sno`='$lid' ";
                                $select = new Selectall();
                                $levnam = $select->getcondData($table,$cond);
                                $abs = $levnam['in_abbreviation'];
  
                                if($abs != "LOP")
                                {
                                  ?>
                                  <option value="<?php echo $lid;?>" <?php echo $lids == $lid? "selected":""; ?>><?php echo $levnam['in_leavetype']." (". $levnam['in_abbreviation'].")";?> (<?php echo $lovbal;?>)</option>
                                  <?php
                                }
                              }
                              else
                              {
                                
                              }


                              
                            }
                          }
                          $table = "in_leavetype";
                          $cond = " `in_comid`='$comid' AND `in_abbreviation`='LOP' ";
                          $select = new Selectall();
                          $leavset = $select->getcondData($table,$cond);

                          if($leavset != "")
                          {
                            ?>
                            <option value="<?php echo $leavset['in_sno'];?>" class="bg-danger"><?php echo $leavset['in_leavetype']." (". $leavset['in_abbreviation'].")";?> (0)</option>
                            <?php
                          }
                        ?>
                        </select>
                      </div>

                    

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Leave From*</label>

                  <div class="input-group col-sm-8">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><i class="fas fa-calendar"></i></span>

                    </div>

                    <input type="date" class="form-control rounded-0" placeholder="Name" name="startdate" required value="<?php echo $sdate;?>" id="stardata">

                    <select class="form-control rounded-0" name="startday" id="startday" required>

                      

                      <option value="full_day" <?php echo $sday == "full_day"? "selected":"";?>>Full Day</option>

                      <option value="half_day" <?php echo $sday == "half_day"? "selected":"";?>>Half Day</option>

                    </select>

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Leave To</label>

                  <div class="input-group col-sm-8">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><i class="fas fa-calendar"></i></span>

                    </div>

                    <input type="date" class="form-control rounded-0" name="enddate" id="enddate" value="<?php echo $ndate;?>" required>

                    <select class="form-control rounded-0" name="endday" id="enday" required>

                      

                      <option value="full_day" <?php echo $nday == "full_day"? "selected":"";?>>Full Day</option>

                      <option value="half_day" <?php echo $nday == "half_day"? "selected":"";?>>Half Day</option>

                    </select>

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Reason*</label>

                  <div class="input-group col-sm-8">
                    <input type="hidden" name="leaveday" id="leaveday">
                    <input type="hidden" name="leavebolance" id="leavebolance">
                    <textarea class="form-control rounded-0" name="statement" required id="reasont"><?php echo $reason;?></textarea>

                  </div>

                </div>

                <?php



                

                

                ?>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Contact Information*</label>

                  <div class="input-group col-sm-8">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><i class="fas fa-phone"></i></span>

                    </div>

                    <input type="tel" class="form-control rounded-0 border-right-0" placeholder="Mobile" name="contact" required value="<?php echo $contact;?>">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><i class="fas fa-envelope"></i></span>

                    </div>

                    <input type="email" class="form-control rounded-0" placeholder="Email" name="email" required value="<?php echo $email;?>">

                  </div>

                </div>

                  <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Document Upload</label>

                  <div class="input-group col-sm-8">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><i class="fas fa-paperclip"></i></span>

                    </div>

                    <input type="file" class="form-control rounded-0 border-right-0" name="document"  value="">
                  </div>
                </div>


              </div>

              <div class="col-lg-5 col-md-5">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <th>Content Name</th>
                      <th>Value</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Balance Leave</td>
                        <td><span id="balanceleave" class="font-weight-bold"><?php echo $balance;?></span></td>
                      </tr>
                      <tr>
                        <td>Applied Leave</td>
                        <td><span id="appliedleave" class="font-weight-bold"><?php echo $applied;?></span></td>
                      </tr>
                      <tr>
                        <td> Available Balance</td>
                        <td><span id="afterbalance" class="font-weight-bold"><?php echo $rest;?></span></td>
                      </tr>
                      <tr>
                        <td>Loss of Pay</td>
                        <td><span id="loseofpay" class="font-weight-bold"><?php echo $loss;?></span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>

              

              </div>

            </div>

          </div>

          <div class="card-footer">

            <div class="clearfix">

              <input type="submit" name="saveleave" class="btn btn-primary float-right" value="Submit">

            </div>

          </div>

        </div>

        </form>

        <!-- /.row -->

        

      </div><!-- /.container-fluid -->

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->
<script type="text/javascript" language="javascript">

  var startdate;
  var startday;
  var enddate;
  var endday;
  var leavetype;
  var balance;
  var lotday;

$(document).ready(function(){
  $("#leavebal").on('change', function(){
      leavetype = $("#leavebal").val();
    $.ajax({
            url: "ajax-leave.php",
            type: "GET",
            data: { labal: leavetype },
            success: function(data) {
                
                $("#balanceleave").html(data);
                $("#leavebolance").val(data);
                balance = parseInt(data);
                calculateLossOfPay();
            }
        });

  });

   
});

$(document).ready(function() {
  $("#stardata, #startday, #enddate, #enday").change(function(){
    var startdate = $("#stardata").val();
    var startday = $("#startday").val();
    var enddate = $("#enddate").val();
    var endday = $("#enday").val();

    
    $.ajax({
        url: "ajax-leave.php",
        type: "GET",
        data: { start: startdate, srtsort: startday, enden: enddate, endsort: endday },
        cache: false,
        success: function(result) {
          $("#appliedleave").html(result);
          $("#leaveday").val(result);
          lotday = parseInt(result);
          calculateLossOfPay();
          
        }
      });
  });

});

function calculateLossOfPay() {
    
    if (typeof balance !== 'undefined' && typeof lotday !== 'undefined') {
        

        var loseofpay = parseInt(balance) - parseInt(lotday);
          if(loseofpay <= 0)
          {
            document.getElementById('afterbalance').innerHTML = 0;
            document.getElementById('loseofpay').innerHTML = loseofpay;
          }
          else
          {
            document.getElementById('afterbalance').innerHTML = loseofpay;
          }
        

        
        
    }
}

  
 
</script>


 <?php

include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/footer.php';

?>
