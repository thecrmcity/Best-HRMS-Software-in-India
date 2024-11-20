<?php
$pagename = basename(__DIR__);
$fullPage = ucwords($pagename);
$siteaim = basename($_SERVER['SCRIPT_FILENAME'],'.php');
$sitename = str_replace('-', ' ', $siteaim);
$bsurl = dirname(dirname(__DIR__));
include_once $bsurl.'/inc/header.php';
include_once $bsurl.'/inc/sidebar.php';
$states = array("Andhra Pradesh",
                "Arunachal Pradesh",
                "Assam",
                "Bihar",
                "Chhattisgarh",
                "Goa",
                "Gujarat",
                "Haryana",
                "Himachal Pradesh",
                "Jammu and Kashmir",
                "Jharkhand",
                "Karnataka",
                "Kerala",
                "Madhya Pradesh",
                "Maharashtra",
                "Manipur",
                "Meghalaya",
                "Mizoram",
                "Nagaland",
                "Odisha",
                "Punjab",
                "Rajasthan",
                "Sikkim",
                "Tamil Nadu",
                "Telangana",
                "Tripura",
                "Uttarakhand",
                "Uttar Pradesh",
                "West Bengal",
                "Andaman and Nicobar Islands",
                "Chandigarh",
                "Dadra and Nagar Haveli",
                "Daman and Diu",
                "Delhi",
                "Lakshadweep",
                "Puducherry");
$define = new Predefine();
$define->companyInfo();
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
          
          <div class="card rounded-0 p-2">
              <div class="row">
                <div class="col-sm-6 col-lg-6">
                  <div class="searchform">
                    <form class="form-inline" method="GET">
                      <div class="input-group">
                      <select class="form-control rounded-0 border-right-0" name="com" required>
                        <?php
                          if(isset($_GET['com']))
                          {
                            $selid = $_GET['com'];
                            $table = "in_master_card";
                            $cond = " `in_sno`='$selid' AND `in_relation`='company' ";
                            $select = new Selectall();
                            $self = $select->getcondData($table,$cond);
                            $selt = $self['in_prefix'];
                            
                          }
                          else
                          {
                            $selt = "--Select--";
                            $selid = "";
                          }
                        ?>
                        <option value="<?php echo $selid;?>"><?php echo $selt;?></option>
                        <?php
                        $table = "in_master_card";
                        $cond = " `in_relation`='company' ";
                        $select = new Selectall();
                        $selcom = $select->getallCond($table,$cond);
                        if(!empty($selcom))
                        {
                          foreach($selcom as $sel)
                          {
                            
                          ?>
                          <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_prefix'];?></option>
                          <?php
                          }
                          
                        }
                        ?>
                      </select>
                      <div class="input-group-prepend">
                        
                        <input type="submit" value="GO" class="input-group-text rounded-0">
                    </div>
                    </div>
                    </form>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-6"></div>

              </div>
            
          </div>
          
            <!-- --------------------------- Card Body ---------------------- -->

            <div class="company-profile">
                      <?php
                      if(isset($_GET['com']))
                      {
                        $id = $_GET['com'];
                        $select = new Selectall();
                        $setting = $select->compInfo($id);

                        if($setting != "")
                        {
                          $comlogo = $setting['in_logo'];
                          $comfevi = $setting['in_fevicon'];
                          $comname = $setting['in_comid'];
                          $comemail = $setting['in_comemail'];
                          $comphone = $setting['in_comphone'];
                          $website = $setting['in_comwebsite'];
                          $address = $setting['in_address'];
                          $city = $setting['in_comcity'];
                          $statep = $setting['in_comstate'];
                          $code = $setting['in_pincode'];
                          $fevicon = $setting['in_fevicon'];
                          $logo = $setting['in_logo'];
                          $probation = $setting['in_probation'];
                          $notice = $setting['in_notice'];
                          $intime = $setting['in_intime'];
                          $outime = $setting['in_outime'];
                          $lunch = $setting['in_lunch'];
                          $tea = $setting['in_teatime'];
                          $retirement = $setting['in_retirement'];

                          $salarydeduct = $setting['in_deduction'];
                          $latelog = $setting['in_latelogin'];

                          $cospan = $setting['in_cospan'];
                          $costan = $setting['in_costan'];
                          $coscin = $setting['in_coscin'];

                          $fullday = $setting['in_fullhours'];
                          $halfday = $setting['in_halfhours'];

                          $selmonth = $setting['in_salarymonth'];
                          $selday = $setting['in_salarydate'];
                          
                          $case = "updateinfo&id=".$id;
                        }
                        else
                        {
                          $case = "companyinfo";
                          $salarydeduct = "";
                          $latelog = "";
                          $cospan = "";
                          $costan = "";
                          $coscin = "";
                          $fullday = "";
                          $halfday = "";
                          $selmonth = "";
                          $selday = "";
                        }

                      }
                      if(isset($_GET['com']))
                      {

                        ?>
                        <form class="" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=<?php echo $case;?>&f=<?php echo $pagename;?>&p=<?php echo $siteaim;?>" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-sm-3 col-lg-3">
                          <div class="card rounded-0 card-primary card-outline">
                            <div class="card-header p-2">
                              <b>Company Logo</b>
                            </div>
                            <div class="card-body">
                              <?php
                              if($logo != "")
                              {
                                ?>
                                <img src="<?php echo BSURL;?>uploads/<?php echo $logo;?>" class="img-fluid" id="oldlogo">
                                <?php
                              }
                              
                                
                               
                              ?>

                              <img src="" id="outlogo" class="img-fluid">
                              <div class="custom-file my-4">
                              <input type="file" class="custom-file-input rounded-0" id="customLogo" name="comlogo" onchange="changeLogo()" value="<?php echo $comlogo;?>">
                              <label class="custom-file-label rounded-0" for="customLogo">Choose file</label>
                            </div>
                            </div>
                          </div>
                          <div class="card rounded-0 card-primary card-outline">
                            <div class="card-header p-2">
                              <b>Fevicon</b>
                            </div>
                            <div class="card-body">
                              <?php
                              if($fevicon != "")
                              {
                                ?>
                                <img src="<?php echo BSURL;?>uploads/<?php echo $fevicon;?>" class="img-fluid" width="50" height="50" id="oldfevi">
                                <?php
                              }
                              ?>
                              
                              <img src="" id="outfevi" class="img-fluid">
                              <div class="custom-file my-3">
                      <input type="file" class="custom-file-input rounded-0" id="customFevi" name="comfevicon" onchange="changeFevi()" value="<?php echo $comfevi;?>">
                      <label class="custom-file-label rounded-0" for="customFevi">Choose file</label>
                    </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-9 col-lg-9">
                          <div class="card rounded-0">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Company :</label>
                                    <div class="input-group col-sm-8">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rounded-0"><i class="fas fa-industry"></i></span>
                                      </div>
                                      <input type="hidden" name="company" class="" placeholder="Company Name" required value="<?php echo $selid;?>">
                                      <span class="form-control rounded-0 overflow-auto" readonly><?php echo $selt;?></span>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Email :</label>
                                    <div class="input-group col-sm-8">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rounded-0"><i class="fas fa-envelope"></i></span>
                                      </div>
                                      <input type="email" name="comemail" class="form-control rounded-0" placeholder="Email" value="<?php echo $comemail;?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">PAN :</label>
                                    <div class="input-group col-sm-8">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rounded-0"><i class="fas fa-industry"></i></span>
                                      </div>
                                      <input type="text" name="cospan" class="form-control rounded-0" placeholder="PAN" value="<?php echo $cospan;?>">
                                      
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">TAN :</label>
                                    <div class="input-group col-sm-8">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rounded-0"><i class="fas fa-envelope"></i></span>
                                      </div>
                                      <input type="text" name="costan" class="form-control rounded-0" placeholder="TAN" value="<?php echo $costan;?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">CIN No:</label>
                                    <div class="input-group col-sm-8">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rounded-0"><i class="fas fa-envelope"></i></span>
                                      </div>
                                      <input type="text" name="coscin" class="form-control rounded-0" placeholder="CIN" value="<?php echo $coscin;?>">
                                    </div>
                                  </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Phone :</label>
                                    <div class="input-group col-sm-8">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rounded-0"><i class="fas fa-phone"></i></span>
                                      </div>
                                      <input type="text" name="comphone" class="form-control rounded-0" placeholder="Phone" value="<?php echo $comphone;?>">
                                    </div>
                                  </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Website :</label>
                                    <div class="input-group col-sm-8">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rounded-0"><i class="fas fa-globe"></i></span>
                                      </div>
                                      <input type="website" name="comwebsite" class="form-control rounded-0" placeholder="Website URL" value="<?php echo $website;?>">
                                    </div>
                                  </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Address :</label>
                                    <div class="input-group col-sm-8">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rounded-0"><i class="fas fa-map-marker-alt"></i></span>
                                      </div>
                                      <input type="text" name="comadd" class="form-control rounded-0" placeholder="Address" value="<?php echo $address;?>">
                                    </div>
                                  </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">City :</label>
                                    <div class="input-group col-sm-8">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rounded-0"><i class="fas fa-map-marker"></i></span>
                                      </div>
                                      <input type="text" name="comcity" class="form-control rounded-0" placeholder="City" value="<?php echo $city;?>">
                                    </div>
                                  </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">State :</label>
                                    <div class="input-group col-sm-8">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rounded-0"><i class="fas fa-map-marker"></i></span>
                                      </div>
                                      <select name="comstate" class="form-control rounded-0">
                                       <option value="<?php echo $statep;?>"><?php echo $statep;?></option>
                                       <?php
                                        foreach($states as $sts)
                                        {
                                          ?>
                                          <option value="<?php echo $sts;?>"><?php echo $sts;?></option>
                                          <?php
                                        }
                                       ?>
                                     </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Pin Code :</label>
                                    <div class="input-group col-sm-8">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rounded-0"><i class="fas fa-map-pin"></i></span>
                                      </div>
                                      <input type="tel" maxlength="6" name="pincode" class="form-control rounded-0" placeholder="Pin Code" value="<?php echo $code;?>">
                                    </div>
                                  </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Probation :</label>
                                    <div class="input-group col-sm-8">
                                      
                                    <div class="input-group-prepend">
                                      <span class="input-group-text rounded-0"><small>days</small></span>
                                    </div>
                                    <input type="number" class="form-control rounded-0" name="probation" required value="<?php echo $probation;?>">
                  
                                    </div>
                                  </div>
                                </div>

                                

                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Office Time :</label>
                                    <div class="input-group col-sm-8">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rounded-0"><small>In Time :</small></span>
                                      </div>
                                      <input type="time" name="intime" class="form-control rounded-0" required value="<?php echo $intime;?>">
                                      
                                    </div>
                                  </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Out Time :</label>
                                    <div class="input-group col-sm-8">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rounded-0"><input type="checkbox" name="nextday"> <small>&nbsp;Next Day?</small></span>
                                      </div>
                                      <input type="time" name="outtime" class="form-control rounded-0" required value="<?php echo $outime;?>">
                                    </div>
                                  </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Full Day :</label>
                                    <div class="input-group col-sm-8">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rounded-0"><small>In Hours :</small></span>
                                      </div>
                                      <input type="text" name="fullday" class="form-control rounded-0" required value="<?php echo $fullday;?>">
                                      
                                    </div>
                                  </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Half Day :</label>
                                    <div class="input-group col-sm-8">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rounded-0"> <small>In Hours :</small></span>
                                      </div>
                                      <input type="text" name="halfday" class="form-control rounded-0" required value="<?php echo $halfday;?>">
                                    </div>
                                  </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Late Login :</label>
                                    <div class="input-group col-sm-8">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rounded-0"><small>(min) :</small></span>
                                      </div>
                                      <input type="text" name="latelog" class="form-control rounded-0" required value="<?php echo $latelog;?>">
                                      
                                    </div>
                                  </div>
                                </div>
                                

                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Deduction :</label>
                                    <div class="input-group col-sm-8">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rounded-0"><small>(days) :</small></span>
                                      </div>
                                      <input type="text" name="salarydeduct" class="form-control rounded-0" required value="<?php echo $salarydeduct;?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Lunch Break :</label>
                                    <div class="input-group col-sm-8">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rounded-0">Lunch <small>&nbsp; (min) :</small></span>
                                      </div>
                                      <input type="number" name="lunchtime" class="form-control rounded-0" required value="<?php echo $lunch;?>">
                                      
                                    </div>
                                  </div>
                                </div>
                                

                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tea Break :</label>
                                    <div class="input-group col-sm-8">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rounded-0">Tea <small>&nbsp; (min) :</small></span>
                                      </div>
                                      <input type="number" name="teatime" class="form-control rounded-0" required value="<?php echo $tea;?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Notice Period :</label>
                                    <div class="input-group col-sm-8">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rounded-0"><small>days</small></span>
                                      </div>
                                      <input type="number" class="form-control rounded-0" name="notice" required value="<?php echo $notice;?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Retirement :</label>
                                    <div class="input-group col-sm-8">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rounded-0">In Years</span>
                                      </div>
                                      <input type="number" name="retirement" class="form-control rounded-0" required value="<?php echo $retirement;?>">
                                      
                                    </div>
                                  </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Salary Month :</label>
                                    <div class="input-group col-sm-8">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rounded-0"><i class="fas fa-hourglass-half"></i></span>
                                      </div>
                                      <input type="month" class="form-control rounded-0" name="salmonth" required value="<?php echo $selmonth;?>">
                                      
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Salary Day :</label>
                                    <div class="input-group col-sm-8">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rounded-0"><i class="far fa-bell"></i></span>
                                      </div>
                                      <input type="number" name="salday" class="form-control rounded-0" required value="<?php echo $selday;?>" min="1" max="31">
                                      
                                    </div>
                                  </div>
                                </div>

                                <!-- <div class="col-lg-6 col-md-6"></div> -->
                                <div class="col-lg-6 col-md-6">
                                  <div class="clearfix"><input type="submit" name="cominfo" class="btn btn-primary px-5 float-right" value="Save"></div>
                                </div>


                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                       </form>

                        <?php
                      }  
                        
                      ?>
                      
                        
           </div>

          
          
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
    function changeLogo()
    {
      var input = document.getElementById("customLogo");
      if(input.files && input.files[0])
      {
        var reader = new FileReader();

        reader.onload = function(e)
        {
          document.getElementById("outlogo").src = e.target.result;
          document.getElementById("oldlogo").style.display = "none";
        };
        reader.readAsDataURL(input.files[0]);
      }
      
    }

    function changeFevi()
    {
      var cfevi = document.getElementById("customFevi");
      if(cfevi.files && cfevi.files[0])
      {
        var reader = new FileReader();
        reader.onload = function(e)
        {
         document.getElementById("outfevi").src = e.target.result;
         document.getElementById("oldfevi").style.display = "none";
        };
        reader.readAsDataURL(cfevi.files[0]);
      }
    }
   
  </script>
 <?php
include_once $bsurl.'/inc/alert.php';
include_once $bsurl.'/inc/footer.php';
?>