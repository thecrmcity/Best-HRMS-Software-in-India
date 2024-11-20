<?php
$pagename = basename(__DIR__);
$fullPage = ucwords($pagename);
$siteaim = basename($_SERVER['SCRIPT_FILENAME'],'.php');
$sitename = str_replace('-', ' ', $siteaim);
$bsurl = dirname(dirname(__DIR__));
include_once $bsurl.'/inc/header.php';
include_once $bsurl.'/inc/sidebar.php';
?>

  <style type="text/css">
    .rounded-0 {
      border: solid 1px #605d5d;
    }
  </style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mainbody">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0"><?php echo "IT Declaration Form";?></h4>
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
                        <form action="" method="GET">
                            <div class="input-group">
                                
                                <select class="form-control form-control-sm rounded-0" name="s">
                                    <option value="">--Select--</option>
                                    <?php
                                    $table = "in_employee";
                                    $cond = " `in_compid`='$comid' AND `in_delete`='1' ";
                                    $select = new Selectall();
                                    $emps = $select->getallCond($table,$cond);
                                    if(!empty($emps)){
                                        foreach($emps as $emp){
                                            ?>
                                            <option value="<?php echo $emp['in_empid'];?>"><?php echo $select->empPrefix($emp['in_empid']).$emp['in_empid'];?> || <?php echo $emp['in_fname']." ".$emp['in_lname'];?></option>
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
            <?php
            if(isset($_GET['s']))
            {
                $s = $_GET['s'];
                $table = "in_employee";
                $cond = " `in_compid`='$comid' AND `in_empid`='$s' AND `in_delete`='1' ";
                $select = new Selectall();
                $empo = $select->getcondData($table,$cond);
                if($empo != "")
                {
                    $select = new Selectall();
                    ?>
                    <div class="empinfo mb-3">
                        <h4 class="mb-3" style="background: #dee7f5;padding: 5px 10px;">Employee Details</h4>
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <label>Employee ID : </label> <?php echo $select->empPrefix($s).$s;?>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label>Employee Name : </label> <?php echo $select->empName($s);?>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label>Department : </label> <?php echo $select->getDepartment($empo['in_department']);?>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label>Designation : </label> <?php echo $select->getPosition($empo['in_designation']);?>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label>Reporting : </label> <?php echo $select->getReporting($empo['in_reporting']);?>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label>Date of Joining : </label> <?php echo date('d-m-Y', strtotime($empo['in_dateofjoining']));?>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label>Gender : </label> <?php echo $empo['in_gender'];?>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label>Company Email : </label> <?php echo $empo['in_email'];?>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label>Mobile No : </label> <?php echo $empo['in_mobileno'];?>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label>Pan No : </label> <?php echo $empo['in_panno'];?>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label>City : </label> <?php echo $select->getState($empo['in_permastate']);?>
                            </div>
                            
                        </div>
                    </div>
                    <?php
                }

            }
            ?>
            

        
         
        <div class="card rounded-0">
          
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <form class="" method="POST" action="<?php echo BSURL;?>functions/taxation.php?case=itdeclaration" enctype="multipart/form-data">
                  <div class="form-group row">
                          <label class="col-sm-8 col-form-label">Assessment Year*</label>
                          <div class="input-group col-sm-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text rounded-0"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            
                            <select class="form-control rounded-0" name="finance">
                              <?php
                                $table = "in_taxslab";
                                $inner = " DISTINCT in_financeyear";
                                $cond = " `in_status`='1' ";
                                $select = new Selectall();
                                $taslab = $select->getallInnercond($table,$inner,$cond);
                                if(!empty($taslab))
                                {
                                  foreach($taslab as $lab)
                                  {
                                    ?>
                                    <option value="<?php echo $lab['in_financeyear'];?>"><?php echo $lab['in_financeyear'];?></option>
                                    <?php
                                  }
                                }
                              ?>
                              
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-8 col-form-label">Tax Payer*</label>
                          <div class="input-group col-sm-3">
                            <input type="hidden" name="empid" value="<?php echo $s;?>">
                            <select class="form-control rounded-0" name="payer" required>
                              <option value="Individual">Individual</option>
                              

                            </select>
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <label class="col-sm-8 col-form-label">Residential Status*</label>
                          <div class="input-group col-sm-3">
                            
                            <select class="form-control rounded-0" name="resident" required>
                              <option value="">--Select--</option>
                              <option value="Resident">Resident</option>
                              <option value="Non-Resident">Non-Resident</option>
                              
                              
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-8 col-form-label">Whether opting for taxation under Section 115BAC?*</label>
                          <div class="input-group col-sm-3">
                            
                            <select class="form-control rounded-0" name="payscale" required>
                              <option value="">--Select--</option>
                              <option value="OldSlab">No</option>
                              <option value="NewSlab">Yes</option>

                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-8 col-form-label">Income from Previous Employer</label>
                          <div class="input-group col-sm-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text rounded-0"><i class="fas fa-rupee-sign"></i></span>
                            </div>
                            <input type="text" name="salary" class="form-control rounded-0" required placeholder="0">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-8">Income From House Property</label>
                          <div class="input-group col-sm-3">
                            <span class="form-control rounded-0" readonly id="houseprop"></span>
                          </div>
                          
                        </div>
                        
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">A) Interest on Housing Loan</label>
                          <div class="input-group col-sm-2">
                            
                            <input type="text" name="housingloan" class="form-control rounded-0" id="housingloan">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">B) Income from Let-out Property</label>
                          <div class="input-group col-sm-2">
                            
                            <input type="text" name="letoutpay" class="form-control rounded-0" id="letout">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">C) Less: Municipal Taxes Paid During the Year</label>
                          <div class="input-group col-sm-2">
                            
                            <input type="text" name="mcdtax" class="form-control rounded-0" id="mtpaid">

                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">D) Standard Deduction @ 30% of Net Annual Value</label>
                          <div class="input-group col-sm-2">
                            
                            <span class="form-control rounded-0" id="standeduct" readonly></span>

                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-8 col-form-label">Capital Gains</label>
                          <div class="input-group col-sm-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text rounded-0"><i class="fas fa-exclamation-circle"></i></span>
                            </div>
                            <input type="text" name="capitalgain" class="form-control rounded-0">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-8 col-form-label">Income From Other Sources</label>
                          <div class="input-group col-sm-3">
                            
                            <span class="form-control rounded-0" id="othersources" readonly></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">A) Saving Banks Interest</label>
                          <div class="input-group col-sm-2">
                            
                            <input type="text" name="banksaving" class="form-control rounded-0 otherincoms" id="savingbank">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">B) Other Income</label>
                          <div class="input-group col-sm-2">
                            
                            <input type="text" name="otherincome" class="form-control rounded-0 otherincoms" id="otherincom">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-8 col-form-label">Profits and Gains of Business or Profession <small>(enter profit only)</small></label>
                          <div class="input-group col-sm-3">
                            
                            <input type="text" name="profitgain" class="form-control rounded-0">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-8 col-form-label">Agricultural Income</label>
                          <div class="input-group col-sm-3">
                            
                            <input type="text" name="aggricult" class="form-control rounded-0">
                          </div>
                        </div>
                        <div class="my-2">
                          <div class="form-group row">
                            <label class="col-sm-8 col-form-label">House Rent Details</label>
                            <div class="input-group col-sm-3">
                              
                              <span class="form-control rounded-0 exemption" id="exemption" readonly></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">HRA</label>
                            <div class="input-group col-sm-2">
                              
                              <input type="text" name="hraoxx" class="form-control rounded-0 exemption" id="exmhra">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Column A</label>
                            <div class="input-group col-sm-2">
                              
                              <input type="text" name="columna" class="form-control rounded-0 exemption" id="exmcola">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Column B</label>
                            <div class="input-group col-sm-2">
                              
                              <input type="text" name="columnb" class="form-control rounded-0 exemption" id="exmcolb">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Column C</label>
                            <div class="input-group col-sm-2">
                              
                              <input type="text" name="columnc" class="form-control rounded-0 exemption" id="exmcolc">
                            </div>
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <label class="col-sm-8">DEDUCTIONS UNDER CHAPTER VI-A </label>
                          <div class="input-group col-sm-3">
                            <span class="form-control rounded-0" readonly id="chapterdeduct"></span>
                            
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">80C (PF, PPF, insurance premium)</label>
                          <div class="input-group col-sm-2">
                            
                            <input type="number" name="eppf" class="form-control rounded-0 deductchap" id="deduct1" placeholder="">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">80CCD (Employee's contribution to NPS)</label>
                          <div class="input-group col-sm-2">
                            
                            <input type="number" name="empcontri" class="form-control rounded-0 deductchap" id="deduct2">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">80CCD(1B) (Additional contribution to NPS)</label>
                          <div class="input-group col-sm-2">
                            
                            <input type="number" name="contribution" class="form-control rounded-0 deductchap" id="deduct3">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">80D (Medical insurance premium)</label>
                          <div class="input-group col-sm-2">
                            
                            <input type="number" name="medical" class="form-control rounded-0 deductchap" id="deduct4">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">80E (Interest paid on education loan)</label>
                          <div class="input-group col-sm-2">
                            
                            <input type="number" name="eduloan" class="form-control rounded-0 deductchap" id="deduct5">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">80EEB (Interest paid on loan for purchase of electrical vehicle)</label>
                          <div class="input-group col-sm-2">
                            
                            <input type="number" name="loanfor" class="form-control rounded-0 deductchap" id="deduct6">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">80G (Donations to charity)</label>
                          <div class="input-group col-sm-2">
                            
                            <input type="number" name="charity" class="form-control rounded-0 deductchap" id="deduct7">
                          </div>
                        </div>
                        <div class="clearfix">
                          <input type="submit" name="gettax" value="Submit" class="btn btn-primary float-right">
                        </div>
                        
                </form>
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
  $table = "in_master_card";
  $cond = " `in_relation`='CessRate' ";
  $select = new Selectall();
  $cess = $select->getcondData($table,$cond);
  if($cess != "")
  {
    $act = "editrate";
    $rate = $cess['in_prefix'];
  }
  else
  {
    $act = "setrate";
    $rate = "";
  }
  ?>
  <div class="modal fade" id="cessrate">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><i class="fas fa-donate"></i> Health and Education Cess</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form class="" method="POST" action="<?php echo BSURL;?>functions/payroll.php?case=<?php echo $act;?>">
        <div class="modal-body">
          
            <div class="form-group row">
              <label class="col-sm-7 col-form-label">Set Cess Rate : </label>
              <div class="input-group col-sm-5">
                <div class="input-group-prepend">
                  <span class="input-group-text rounded-0"><i class="fas fa-exclamation-circle"></i></span>
                </div>
                <input type="text" name="cessrate" class="form-control rounded-0" value="<?php echo $rate;?>">
              </div>
            </div>
          
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <script type="text/javascript">
    $("#letout").on('change', function(){
        var letout = $("#letout").val();
        $("#mtpaid").on('change', function(){
           var mtpaid = $("#mtpaid").val();
        var result = (letout-mtpaid);
        var rest = (result*(30/100));

      document.getElementById("standeduct").innerHTML = rest;
        });


    });

    
        
        
        $("#housingloan").on('change', function(){
            var housingloan = $("#housingloan").val();
              if(housingloan > 200000)
              {
                alert("This should be maximums limit of 200000 not exceeds");
              }
              else
              {
                document.getElementById("houseprop").innerHTML = housingloan;
              }
            

            $("#letout").on('change', function(){
                var letout = $("#letout").val();
                var results = letout-housingloan;
                document.getElementById("houseprop").innerHTML = results;
                $("#mtpaid").on('change', function(){
                   var mtpaid = $("#mtpaid").val();
                var result = (letout-mtpaid);
                var rest = (result*(30/100));
                var parset = result-rest-housingloan;

              document.getElementById("houseprop").innerHTML = parset;
                });


            });

        });
       
      // exemption
    // houseprop
    // chapterdeduct
        // otherincoms
   $(document).ready(function(){
      $(".deductchap").change(function(){
          // deduct1
        var result = 0;
        $(".deductchap").each(function(){
          result += parseInt($(this).val()) || 0;
        });
        $("#chapterdeduct").text(-result);
      });
   });

   $(document).ready(function(){
      $(".otherincoms").change(function(){
          // deduct1
        var resulp = 0;
        $(".otherincoms").each(function(){
          resulp += parseInt($(this).val()) || 0;
        });
        $("#othersources").text(resulp);
      });
   });

// deductsn
   $(document).ready(function(){
      $(".deductsn").change(function(){
          // deduct1
        var detox = 0;
        $(".deductsn").each(function(){
          detox += parseInt($(this).val()) || 0;
        });
        $("#standardeduct").text(-detox);
      });
   });


   $(document).ready(function(){
      $(".exemption").change(function(){
          // deduct1
        var examp = 0;
        $(".exemption").each(function(){
          examp += parseInt($(this).val()) || 0;
        });
        $("#exemption").text(-examp);
      });
   });

  </script>
  
 <?php
include_once $bsurl.'/inc/alert.php';
include_once $bsurl.'/inc/footer.php';
?>