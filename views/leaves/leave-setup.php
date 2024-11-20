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

  $table = "in_leavesetup";

  $cond = " in_sno='$id' ";

  $select = new Selectall();

  $setup = $select->getcondData($table,$cond);

 

  if($setup != "")

  {

    $leave = $setup['in_leavename'];

    $table = "in_leavetype";

    $cond = " in_sno='$leave' ";

    $select = new Selectall();

    $lvtp = $select->getcondData($table,$cond);

    $leavtyp = $lvtp['in_leavetype'];

    $effdate = $setup['in_effectivedate'];

    $encash = $setup['in_encashment'];

    $mini = $setup['in_minibalance'];

    $auto = $setup['in_autoleave'];

    $leavsno = $setup['in_autoleaveno'];

    $autoleavedate = $setup['in_autoleavedate'];


    $laps = $setup['in_lapsmonth'];

    $allot = $setup['in_leaveallotment'];

    $allotdate = $setup['in_allotconfirmdate'];

    $avail = $setup['in_leaveavailment'];

    $availdate = $setup['in_availconfirmdate'];

    $carry = $setup['in_carryforward'];

    $carrymonth = $setup['in_carrymonth'];

    $lower = $setup['in_lowerlimit'];

    $high = $setup['in_higherlimit'];

    $act = "editsetup&id=".$id;

    $check = $setup['in_status'];

  }

  else

  {

    $act = "leavesetup";

    $effdate = "";

    $encash = "";

    $mini = "";

    $auto = "None";

    $allot = "";

    $allotdate = "";

    $avail = "";

    $availdate = "";

    $carry = "";

    $lower = "";

    $high = "";

    $leavsno = "";

    $laps = "";

    $carrymonth = "";

    $table = "in_leavetype";

    $cond = " in_sno='$id' ";

    $select = new Selectall();

    $lvtp = $select->getcondData($table,$cond);

    $leavtyp = $lvtp['in_leavetype'];

    $leave = $lvtp['in_sno'];

    $check = "";
    $autoleavedate = "1";

  }

  

  



}

else

{

  $leavtyp = "--Select--";

  $leave = "";

}





?>

    <!-- Main content -->

    <section class="content">

      <div class="container-fluid">

        <!-- Small boxes (Stat box) -->

        <div class="card rounded-0">

          <div class="card-header">

            <div class="card-title">

              <form class="" method="GET">



              

              <div class="input-group">

                <select class="form-control rounded-0" name="id" required>

                  <option value="<?php echo $leave;?>"><?php echo $leavtyp;?></option>

                

                <?php

                  $table = "in_leavetype";

                  $select = new Selectall();

                  $selData = $select->allSelect($table);

                  if($selData != "") 

                  {

                    foreach($selData as $sel)

                    {

                      



                      ?>



                      <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_leavetype'];?></option>

                      <?php

                    }

                  }

                ?>

                </select>

                <div class="input-group-append">

                  <button type="submit" class="input-group-text rounded-0"><i class="fas fa-search"></i></button>

                </div>

              </div>

            </form>

            </div>

            

            

            

          </div>

          

        </div>

        <!-- /.row -->

        <?php

        if(isset($_GET['id']))

        {

        ?>



        <form class="" method="POST" action="<?php echo BSURL;?>functions/leave.php?case=<?php echo $act;?>">

          

        <div class="row">

          <div class="col-sm-6 col-lg-6 col-md-6">

            <div class="empinfo mb-3">

              <h4>General</h4>

              <hr>



                <div class="form-group row">

                  <label class="col-form-label col-5 col-lg-5">Leave Type</label>

                  <div class="input-group col-sm-8 col-7 col-lg-7">

                    <input type="hidden" name="leavetype" value="<?php echo $leave;?>">

                    <div class="input-group-prepend">

                      <input type="hidden" name="typecheck" value="0">

                      <span class="input-group-text"><input type="checkbox" name="typecheck" value="1" <?php echo $check == "1" ? "checked" : ""; ?>></span>



                    </div>

                    <span class="form-control rounded-0" readonly><?php echo $leavtyp;?></span>

                   

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-5 col-form-label">Effective From*</label>

                  <div class="input-group col-sm-7">

                    

                    <input type="date" class="form-control rounded-0" name="effectivefrom" required value="<?php echo $effdate;?>">



                  </div>

                </div>

                

                <div class="form-group row">

                  <label class="col-sm-5 col-form-label">Leave Encashment</label>

                  <div class="input-group col-sm-7">

                    

                    <input type="checkbox" name="encashment" data-bootstrap-switch value="1" <?php echo $encash == "1" ? "checked" : "";?>>

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-5 col-form-label">Minium Balance</label>

                  <div class="input-group col-sm-7">

                    

                    <input type="text" class="form-control rounded-0" name="minibalance" value="<?php echo $mini;?>">



                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-5 col-form-label">Auto Leave Allotment</label>

                  <div class="input-group col-sm-7">

                    

                    <select class="form-control rounded-0" name="autoleave">

                      <option value="Monthy" <?php echo $auto == "Monthy"? "selected":""; ?>>Monthy</option>

                      <option value="Yearly" <?php echo $auto == "Yearly"? "selected":""; ?>>Yearly</option>

                      <option value="Quarterly" <?php echo $auto == "Quarterly"? "selected":""; ?>>Quarterly</option>

                      <option value="Half_yearly" <?php echo $auto == "Half_yearly"? "selected":""; ?>>Half Yearly</option>

                      <option value="None" <?php echo $auto == "None"? "selected":""; ?>>None</option>

                    </select>



                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-5 col-form-label">Leave Allotment No</label>

                  <div class="input-group col-sm-7">

                    

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><i class="fas fa-utensils"></i></span>

                    </div>

                    <input type="number" name="leavesno" class="form-control rounded-0" placeholder="Qunty." value="<?php echo $leavsno;?>">

                  </div>

                </div>
                <div class="form-group row">

                  <label class="col-sm-5 col-form-label">Leave Allotment Date</label>

                  <div class="input-group col-sm-7">

                    

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><i class="fas fa-calendar-check"></i></span>

                    </div>

                    <input type="number" name="autodate" class="form-control rounded-0" placeholder="Qunty." value="<?php echo $autoleavedate;?>" min="1" max="31">

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-5 col-form-label">Laps Month (Expiry)</label>

                  <div class="input-group col-sm-7">

                    

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><i class="fas fa-calendar-alt"></i></span>

                    </div>

                    <select class="form-control rounded-0" name="leavexpire">

                      <option value="<?php echo $laps;?>"><?php echo $laps;?></option>

                      <?php

                      $monthnams = array("January","February","March","April","May","June","July","August","September","October","November","December");

                      foreach($monthnams as $month)

                      {

                        ?>

                        <option value="<?php echo $month;?>"><?php echo $month;?></option>

                        <?php

                      }

                      ?>

                      



                    </select>

                    

                  </div>

                </div>

            </div>

            <div class="empinfo mb-3">

              <h4>Carry Forward Setting</h4>

              <hr>

              <div class="form-group row">

                  <label class="col-sm-5 col-form-label">Carry Forward</label>

                  <div class="input-group col-sm-7">

                    

                    <input type="checkbox" name="carryforward" data-bootstrap-switch value="1" <?php echo $carry == "1" ? "checked" : "";?>>

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-5 col-form-label">Carry Forward Month</label>

                  <div class="input-group col-sm-7">

                    

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><i class="fas fa-calendar-alt"></i></span>

                    </div>

                    <select class="form-control rounded-0" name="carrymonth">

                      <option value="<?php echo $carrymonth;?>"><?php echo $carrymonth;?></option>

                      <?php

                      $monthnams = array("January","February","March","April","May","June","July","August","September","October","November","December");

                      foreach($monthnams as $month)

                      {

                        ?>

                        <option value="<?php echo $month;?>"><?php echo $month;?></option>

                        <?php

                      }

                      ?>

                      



                    </select>

                    

                  </div>

                </div>

                

                <div class="form-group row">

                  <label class="col-sm-5 col-form-label">Lower Limit</label>

                  <div class="input-group col-sm-2">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><input type="checkbox" name="lowerlimit" value="1" id="lowerlimit" onclick="mylowerlimit()" <?php echo $lower != "" ? "checked" : "";?> ></span>



                    </div>

                  </div>

                  <div class="input-group col-sm-5">

                    <div id="lowerlimitinput" style="display: <?php echo $lower != "" ? "block" : "none";?>;">

                      <div class="input-group-prepend">

                        <input type="text" class="form-control rounded-0" name="lowertext" placeholder="Enter Limit" value="<?php echo $lower;?>">

                      

                      </div>

                      

                    </div>

                  </div>

              

                </div>

                <div class="form-group row">

                  <label class="col-sm-5 col-form-label">Higher limit</label>

                  <div class="input-group col-sm-2">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><input type="checkbox" name="higherlimit" value="1" id="higherlimit" onclick="myhigherlimit()" <?php echo $high != "" ? "checked" : "";?>></span>



                    </div>

                  </div>

                  <div class="input-group col-sm-5">

                    <div id="higherlimitinput" style="display: <?php echo $high != "" ? "block" : "none";?>;">

                      <div class="input-group-prepend">

                        <input type="text" class="form-control rounded-0" name="highertext" placeholder="Enter Limit" value="<?php echo $high;?>">

                      

                      </div>

                      

                    </div>

                  </div>

              

                </div>

                

            </div>



          </div>

          <div class="col-sm-6 col-lg-6 col-md-6">

            <div class="empinfo mb-3">

              <h4>Leave Allotment Setting</h4>

              <hr>

              <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Joining Date</label>

                  <div class="input-group col-sm-8">

                    

                    <input type="radio" name="allot" data-bootstrap-switch value="allotjoining" <?php echo $allot == "allotjoining" ? "checked" : "";?>>

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Probation Date</label>

                  <div class="input-group col-sm-8">

                    

                    <input type="radio" name="allot" data-bootstrap-switch value="allotprobation" <?php echo $allot == "allotprobation" ? "checked" : "";?>>

                  </div>

                </div>

                

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Confirmation Date</label>

                  <div class="input-group col-sm-4">

                      <input type="radio" name="allot" data-bootstrap-switch value="allotconfdate" <?php echo $allot == "allotconfdate" ? "checked" : "";?>>

                      

                  </div>

                  <div class="input-group col-sm-4">

                    <div id="allotinput" onchange="myallotcheck()">

                      <div class="row input-group-prepend">

                        <input type="text" class="form-control rounded-0 col-md-6 border-right-0" name="allotmonth" placeholder="Month">

                      <input type="text" class="form-control rounded-0 col-md-6" name="allotdays" placeholder="Days">

                      </div>

                      

                    </div>

                  </div>

                    

                    

                  

                </div>

                

            </div>

            <div class="empinfo mb-3">

              <h4>Availment Setting</h4>

              <hr>

              <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Joining Date</label>

                  <div class="input-group col-sm-8">

                    

                    <input type="radio" name="avail" data-bootstrap-switch value="availjoining" <?php echo $avail == "availjoining" ? "checked" : "";?>>

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Probation Date</label>

                  <div class="input-group col-sm-8">

                    

                    <input type="radio" name="avail" data-bootstrap-switch value="availprobation" <?php echo $avail == "availprobation" ? "checked" : "";?>>

                  </div>

                </div>

                

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Confirmation Date</label>

                  <div class="input-group col-sm-4">

                    <input type="radio" name="avail" data-bootstrap-switch value="confirmdate" <?php echo $avail == "confirmdate" ? "checked" : "";?>>

                  </div>

                  <div class="input-group col-sm-4">

                    <div id="availinput">

                      <div class="row input-group-prepend">

                        <input type="text" class="form-control rounded-0 col-md-6 border-right-0" name="availmonth" placeholder="Month">

                      <input type="text" class="form-control rounded-0 col-md-6" name="availdays" placeholder="Days">

                      </div>

                      

                    </div>

                  </div>

                    

                    

                  

                </div>

                

            </div>

            <div class="empinfo mb-3">

              <div class="input-group">

                <input type="submit" value="Save" class="btn btn-primary px-5">

              </div>

            </div>

          </div>



        </div>

        </form>

        <?php

        }

        ?>

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

    function myallotcheck()

    {

      var allotcheck = document.getElementById("allotcheck");

      var allotinput = document.getElementById("allotinput");

      if(allotcheck.checked == true)

      {

        allotinput.style.display = "block";

      }

      else

      {

        allotinput.style.display = "none";

      }

    }

    function myavailcheck()

    {

      var availcheck = document.getElementById("availcheck");

      var availinput = document.getElementById("availinput");

      if(availcheck.checked == true)

      {

        availinput.style.display = "block";

      }

      else

      {

        availinput.style.display = "none";

      }

    }

    function mylowerlimit()

    {

      var lowerlimit = document.getElementById("lowerlimit");

      var lowerlimitinput = document.getElementById("lowerlimitinput");

      if(lowerlimit.checked == true)

      {

        lowerlimitinput.style.display = "block";

      }

      else

      {

        lowerlimitinput.style.display = "none";

      }

    }

    function myhigherlimit()

    {

      var higherlimit = document.getElementById("higherlimit");

      var higherlimitinput = document.getElementById("higherlimitinput");

      if(higherlimit.checked == true)

      {

        higherlimitinput.style.display = "block";

      }

      else

      {

        higherlimitinput.style.display = "none";

      }

    }

  </script>

 <?php

include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/footer.php';



?>