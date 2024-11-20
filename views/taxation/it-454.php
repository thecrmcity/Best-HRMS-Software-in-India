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
            <!-- <h4 class="m-0"><?php echo ucwords($sitename);?></h4> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

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
            <div class="text-center">
              <!-- <i class="fas fa-donate"></i>  -->Post Computation
            </div>
            <div class="card-tools"></div>
          </div>
          <div class="card-body">
            <!-- <div class="row mb-2">
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
                          <option value="<?php echo $emi['in_empid'];?>">(IT-<?php echo $emi['in_empid'];?> )  <?php echo $emi['in_fname']." ".$emi['in_lname'];?></option>

                          <?php
                        }
                      }
                      ?>
                    </select>
                    <select class="form-control" name="t" required>
                      <option value="">--TAX--</option>
                      <option value="IT">IT Declaration(12BB)</option>
                      <option value="Pre Computation">Pre Computation</option>
                       <option value="TDS Laiabilities">TDS Laiabilities</option>
                       <option value="Form 24Q">Form 24Q</option>
                    </select>
                    <div class="input-group-append">
                      <input type="submit" name="" class="input-group-text" value="GO">
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-lg-6 col-md-6"></div>

            </div> -->
                            <form class="" method="POST" action="">
                <div class="empinfo mb-3">
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <h4 class="mb-3" style="background: #dee7f5;padding: 5px 10px;">Employee Details</h4>

                </div>

                <div class="col-lg-4 col-md-4">
                  <label>Employee ID : 454</label>
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Employee Name : Dilip Kumar</label>

                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Email : dilip.kumar@inoday.com</label>
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Mobile Number: 907768224</label>
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Designation : Software Developer</label>
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>PAN : XGZFE7225A</label>
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>DOJ : 06/12/2023</label>
                </div>
                <div class="col-lg-4 col-md-4">
                  <label>Gender : M</label>
                </div>
              </div>
            </div>

            </form>
                            
            

           

          </div>
        </div>

         
        <div class="card rounded-0">
          <!-- <div class="card-header">
            <div class="card-title">FY 2024-2025</div>
            <div class="card-tools">
              <button type="button" class="form-control" data-toggle="modal" data-target="#cessrate"><i class="fas fa-donate"></i> Cess Rate</button>
            </div>
          </div> -->
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <form class="" method="GET" action="" enctype="multipart/form-data">
                  <div class="form-group row">
                          <label class="col-sm-8 col-form-label">Assessment Year*</label>
                          <div class="input-group col-sm-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text rounded-0"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <select class="form-control rounded-0" name="payer" required>
                              <!-- <option value="Individual">--Select--</option> -->
                              <option value="Individual">2024-25</option>
                              

                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-8 col-form-label">Tax Payer*</label>
                          <div class="input-group col-sm-3">
                            
                            <select class="form-control rounded-0" name="payer" required>
                              <!-- <option value="">--Select--</option> -->
                              <option value="Individual">Individual</option>
                              

                            </select>
                          </div>
                        </div>
                        <!-- <div class="form-group row">
                          <label class="col-sm-8 col-form-label">Male / Female / Senior Citizen*</label>
                          <div class="input-group col-sm-3">
                            
                            <select class="form-control rounded-0" name="gender" required>
                              <option value="">--Select--</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              
                              
                            </select>
                          </div>
                        </div> -->
                        <div class="form-group row">
                          <label class="col-sm-8 col-form-label">Residential Status*</label>
                          <div class="input-group col-sm-3">
                            
                            <select class="form-control rounded-0" name="resident" required>
                              <!-- <option value="">--Select--</option> -->
                              <option value="Resident">Resident</option>
                              <!-- <option value="Non-Resident">Non-Resident</option> -->
                              
                              
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-8 col-form-label">Whether opting for taxation under Section 115BAC?*</label>
                          <div class="input-group col-sm-3">
                            
                            <select class="form-control rounded-0" name="payscale" required>
                              <!-- <option value="">--Select--</option> -->
                               <option value="OldSlab">No</option>
                              <!-- <option value="NewSlab">Yes</option> -->

                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-8 col-form-label">Income from Salary*</label>
                          <div class="input-group col-sm-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text rounded-0"><i class="fas fa-rupee-sign"></i></span>
                            </div>
                            <input type="text" name="salary" class="form-control rounded-0" required placeholder="65000">
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
                            
                            <input type="text" name="" class="form-control rounded-0" id="housingloan">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">B) Income from Let-out Property</label>
                          <div class="input-group col-sm-2">
                            
                            <input type="text" name="" class="form-control rounded-0" id="letout">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">C) Less: Municipal Taxes Paid During the Year</label>
                          <div class="input-group col-sm-2">
                            
                            <input type="text" name="" class="form-control rounded-0" id="mtpaid">

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
                            <input type="text" name="" class="form-control rounded-0">
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
                            
                            <input type="text" name="" class="form-control rounded-0 otherincoms" id="savingbank">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">B) Other Income</label>
                          <div class="input-group col-sm-2">
                            
                            <input type="text" name="" class="form-control rounded-0 otherincoms" id="otherincom">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-8 col-form-label">Profits and Gains of Business or Profession <small>(enter profit only)</small></label>
                          <div class="input-group col-sm-3">
                            
                            <input type="text" name="" class="form-control rounded-0">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-8 col-form-label">Agricultural Income</label>
                          <div class="input-group col-sm-3">
                            
                            <input type="text" name="" class="form-control rounded-0">
                          </div>
                        </div>
                        <div class="my-2">
                          <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Less: Exemption U/s 10</label>
                            <div class="input-group col-sm-3">
                              
                              <span class="form-control rounded-0 exemption" id="exemption" readonly></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">HRA</label>
                            <div class="input-group col-sm-2">
                              
                              <input type="text" name="" class="form-control rounded-0 exemption" id="exmhra">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Column A</label>
                            <div class="input-group col-sm-2">
                              
                              <input type="text" name="" class="form-control rounded-0 exemption" id="exmcola">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Column B</label>
                            <div class="input-group col-sm-2">
                              
                              <input type="text" name="" class="form-control rounded-0 exemption" id="exmcolb">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Column C</label>
                            <div class="input-group col-sm-2">
                              
                              <input type="text" name="" class="form-control rounded-0 exemption" id="exmcolc">
                            </div>
                          </div>
                        </div>
                        <div class="my-2">
                          <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Less: Deductions u/s 16</label>
                            <div class="input-group col-sm-3">
                              
                              <span class="form-control rounded-0" id="standardeduct" readonly></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Standard Deduction</label>
                            <div class="input-group col-sm-2">
                              
                              <input type="text" name="" class="form-control rounded-0 deductsn" placeholder="50000">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Entertainment Allowance</label>
                            <div class="input-group col-sm-2">
                              
                              <input type="text" name="" class="form-control rounded-0 deductsn" id="allowanced">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Profession Tax</label>
                            <div class="input-group col-sm-2">
                              
                              <input type="text" name="" class="form-control rounded-0 deductsn" id="profesiontax">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-8">DEDUCTIONS UNDER CHAPTER VI-A </label>
                          <div class="input-group col-sm-3">
                            <span class="form-control rounded-0" readonly id="chapterdeduct">90000</span>
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">80C (PF, PPF, insurance premium)</label>
                          <div class="input-group col-sm-2">
                            
                            <input type="number" name="" class="form-control rounded-0 deductchap" id="deduct1" placeholder="90000">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">80CCD (Employee's contribution to NPS)</label>
                          <div class="input-group col-sm-2">
                            
                            <input type="number" name="" class="form-control rounded-0 deductchap" id="deduct2">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">80CCD(1B) (Additional contribution to NPS)</label>
                          <div class="input-group col-sm-2">
                            
                            <input type="number" name="" class="form-control rounded-0 deductchap" id="deduct3">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">80D (Medical insurance premium)</label>
                          <div class="input-group col-sm-2">
                            
                            <input type="number" name="" class="form-control rounded-0 deductchap" id="deduct4">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">80E (Interest paid on education loan)</label>
                          <div class="input-group col-sm-2">
                            
                            <input type="number" name="" class="form-control rounded-0 deductchap" id="deduct5">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">80EEB (Interest paid on loan for purchase of electrical vehicle)</label>
                          <div class="input-group col-sm-2">
                            
                            <input type="number" name="" class="form-control rounded-0 deductchap" id="deduct6">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">80G (Donations to charity)</label>
                          <div class="input-group col-sm-2">
                            
                            <input type="number" name="" class="form-control rounded-0 deductchap" id="deduct7">
                          </div>
                        </div>
                        <!-- <div class="clearfix">
                          <input type="submit" name="gettax" value="Calculate" class="btn btn-primary float-right">
                        </div> -->
                        
                </form>
              </div>
              <?php
              if(isset($_GET['gettax']))
                {
                  $finance = $_GET['finance'];
                  $payer = $_GET['payer'];
                  $gender = $_GET['gender'];
                  $resident = $_GET['resident'];
                  
                  

                  $salary = $_GET['salary'];
                  $payscale = $_GET['payscale'];
                  $results = array();
                  $madvalue = array();
                  $slab = array();
                  $rested = array();

                  $table = "in_taxslab";
                  $cond = " `in_financenam`='$payscale' ";
                  $select= new Selectall();
                  $selData = $select->getallCond($table,$cond);
                  
                  if(!empty($selData))
                  {
                    foreach($selData as $sel)
                    {
                      $madvalue[] = $sel['in_diffence'];
                      $slab[] = $sel['in_slabvalue'];
                    }
                  }

                  
                  $results[] = $salary - $madvalue[0];
                  
                  for($i=1; $i < count($madvalue); $i++)
                  {

                    
                    if($madvalue[$i] == "0")
                    {
                      break;
                    }
                    else
                    {
                      $results[] = $results[$i-1]-$madvalue[$i];
                    }
                    
                   
                  }
                  $negative = array_filter($results, function ($item) {
                    return $item < 0;
                  });
                  if($negative != "")
                  {
                    $results = array_filter($results, function ($item) {
                      return $item > 0;
                    });
                    $endslab = end($results);

                    $matres = count($results);
                    for($j=0;$j<=$matres;$j++)
                    {
                      if($matres == $j)
                      {
                        $rested[] = (($slab[$j]*$endslab)/100);
                      }
                      else
                      {
                        $rested[] = (($slab[$j]*$madvalue[$j])/100);
                      }
                      
                      
                    }

                  }
                  else
                  {
                    $endslab = end($results);
                    for($j=0;$j<count($slab);$j++)
                    {
                      if($madvalue[$j] == "0")
                      {
                        $rested[] = (($slab[$j] * $endslab)/100);
                      }
                      else
                      {
                        $rested[] = (($slab[$j]*$madvalue[$j])/100);
                      }
                      
                    }
                  }
                  
                  
                $tax = array_sum($rested);
                $table = "in_master_card";
                $cond = " `in_relation`='CessRate' ";
                $select = new Selectall();
                $cess = $select->getcondData($table,$cond);
                if($cess != "")
                {
                  $ceval = $cess['in_prefix'];
                  $health = ($tax*($ceval/100));
                  $totaltax = ($tax+$health);
                }

                }
                else
                {
                  $salary = "";
                  $tax = "";
                  $health = "";
                  $totaltax = "";
                }
              ?>
              <div class="col-lg-11 col-md-11">
                
                <div class="card">
                  <div class="card-footer p-0">
                    <table style="width: 100%;" cellpadding="5px" cellspacing="5px" border="1">
                      <tr>
                        <th width="73%">Net Taxable Income</th>
                        <td width="27%">-75000</td>
                      </tr>
                      <tr>
                        <th>Income Tax</th>
                        <td>5000</td>
                      </tr>
                      <tr>
                        <th>Surcharge</th>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <th>Health and Education Cess @ 4%</th>
                        <td><?php echo $health;?></td>
                      </tr>
                      <tr class="bg-secondary">
                        <th>Total Tax Liability</th>
                        <td>200</td>
                      </tr>
                    </table>
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