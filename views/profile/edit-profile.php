<?php

$pagename = basename(__DIR__);

$fullPage = ucwords($pagename);

$siteaim = basename($_SERVER['SCRIPT_FILENAME'],'.php');

$sitename = str_replace('-', ' ', $siteaim);

$bsurl = dirname(dirname(__DIR__));

include_once $bsurl.'/inc/header.php';

include_once $bsurl.'/inc/sidebar.php';

if($grid == "3" && $pagename == "employee")
{
  echo "<script>window.location.href='../dashboard';</script>";
  // header('Location:'.VIEW.'dashboard');
  exit;
}

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

       

        

        <form class="" method="POST" action="<?php echo BSURL;?>functions/employee.php?case=updateEmp" enctype="multipart/form-data">

        <div class="row">

          <div class="col-lg-6">

            <div class="card rounded-0 bodycolor">

              <div class="card-header headcolor">

                <div class="card-title"> <i class="fas fa-list"></i> Basic Information</div>

                <div class="card-tools">

                  <button type="button" class="btn bg-primary btn-sm" data-card-widget="collapse">

                    <i class="fas fa-minus"></i>

                  </button>

                  

                </div>

              </div>

              <div class="card-body">

                
              <?php

              

                $id = $empid;

                $table = "in_employee";

                $cond = " `in_empid`='$id' ";

                $select = new Selectall();

                $res = $select->getcondData($table,$cond);



                $design = $res['in_designation'];

                $table = "in_master_card";

                $cond = " `in_sno`='$design' ";

                $select = new Selectall();

                $desi = $select->getcondData($table,$cond);



                $dept = $res['in_department'];

                $table = "in_master_card";

                $cond = " `in_sno`='$dept' ";

                $select = new Selectall();

                $depart = $select->getcondData($table,$cond);



                $mng = $res['in_reporting'];

                $table = "in_master_card";

                $cond = " `in_sno`='$mng' ";

                $select = new Selectall();

                $mnge = $select->getcondData($table,$cond);



                $cat = $res['in_childid'];

                $table = "in_master_card";

                $cond = " `in_sno`='$cat' ";

                $select = new Selectall();

                $cats = $select->getcondData($table,$cond);



                $wol = $res['in_childid'];

                $table = "in_master_card";

                $cond = " `in_sno`='$wol' ";

                $select = new Selectall();

                $wokl = $select->getcondData($table,$cond);



                $rol = $res['in_groupid'];

                $table = "in_super_card";

                $cond = " `in_sno`='$rol' ";

                $select = new Selectall();

                $role = $select->getcondData($table,$cond);



                $pay = $res['in_payscale'];

                $table = "in_payscale";

                $cond = " `in_sno`='$pay' ";

                $select = new Selectall();

                $pys = $select->getcondData($table,$cond);



                $pist = $res['in_emprefix'];

                $table = "in_master_card";

                $cond = " `in_sno`='$pist'";

                $select = new Selectall();

                $pres = $select->getcondData($table,$cond);

                $prefix = $pres['in_prefix'];



                $esity = $res['in_localcity'];

                $table = "in_worldcity";

                $cond = " `in_sno`='$esity' ";

                $select = new Selectall();

                $ciry = $select->getcondData($table,$cond);

                if($ciry != "")

                {

                  $cid = $ciry['in_sno'];

                  $cinsity = $ciry['in_cityname'];

                  $cinid = $ciry['in_stateid'];

                }

                else

                {

                  $cinsity = "";

                  $cinid = "";

                  $cid = "";

                }



                $psity = $res['in_parmacity'];

                $table = "in_worldcity";

                $cond = " `in_sno`='$psity' ";

                $select = new Selectall();

                $piry = $select->getcondData($table,$cond);

                if($piry != "")

                {

                  $pcid = $piry['in_sno'];

                  $pinsity = $piry['in_cityname'];

                  $piscode = $piry['in_stateid'];

                }

                else

                {

                  $pcid = "";

                  $pinsity = "";

                  $piscode = "";

                }

                



                $cconty = $res['in_localconty'];

                $table = "in_countries";

                $cond = " `in_sno`='$cconty' ";

                $select = new Selectall();

                $kconty = $select->getcondData($table,$cond);

                if($kconty != "")

                {

                  $cascontry = $kconty['in_country'];

                  $casecode = $kconty['in_code'];

                }

                else

                {

                  $cascontry = "";

                  $casecode = "";

                }



                $pconty = $res['in_permaconty'];

                $table = "in_countries";

                $cond = " `in_sno`='$pconty' ";

                $select = new Selectall();

                $jconty = $select->getcondData($table,$cond);

                if($jconty != "")

                {

                  $jakeconty = $jconty['in_country'];

                  $jakecode = $jconty['in_code'];

                }

                else

                {

                  $jakeconty = "";

                  $jakecode = "";

                }



                $wloc = $res['in_worklocation'];

                $table = "in_master_card";

                $cond = " `in_sno`='$wloc' ";

                $select = new Selectall();

                $wlocs = $select->getcondData($table,$cond);

                

              

              ?>

              

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Employee ID</label>

                  <div class="input-group col-sm-8">

                    <span class="form-control rounded-0" readonly><?php echo $prefix.$res['in_empid'];?></span>

                    <input type="hidden" name="preid" value="<?php echo $res['in_emprefix'];?>">

                    <input type="hidden" name="emplid" value="<?php echo $res['in_empid'];?>">

                    <input type="hidden" name="comsid" value="<?php echo $res['in_compid'];?>">

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">First Name*</label>

                  <div class="input-group col-sm-8">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0 bg-primary"><i class="fas fa-user"></i></span>

                    </div>

                    <?php

                    $table = "in_controller";

                    $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='empName' AND `in_action`='1' ";

                    $select = new Selectall();

                    $filed = $select->getcondData($table,$cond);

                    if($filed != "")

                    {

                    ?>
                    
                    <input type="text" class="form-control rounded-0" placeholder="Name" name="fname" required value="<?php echo $res['in_fname'];?>" >

                    <?php  

                    }

                    else

                    {

                      ?>
                      
                      <span class="form-control rounded-0" readonly><?php echo $res['in_fname'];?></span>

                      <?php

                    }

                    

                    ?>

                    

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Last Name</label>

                  <div class="input-group col-sm-8">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><i class="fas fa-user"></i></span>

                    </div>

                    <?php

                    $table = "in_controller";

                    $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='empName' AND `in_action`='1' ";

                    $select = new Selectall();

                    $filed = $select->getcondData($table,$cond);

                    if($filed != "")

                    {

                    ?>

                    <input type="text" class="form-control rounded-0" placeholder="Name" name="lname" value="<?php echo $res['in_lname'];?>" >

                    <?php

                    }

                    else

                    {

                      ?>

                      
                      <span class="form-control rounded-0" readonly><?php echo $res['in_lname'];?></span>

                      <?php

                    }

                    ?>

                    

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Father Name</label>

                  <div class="input-group col-sm-8">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><i class="fas fa-user"></i></span>

                    </div>

                    <?php

                    $table = "in_controller";

                    $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='empFather' AND `in_action`='1' ";

                    $select = new Selectall();

                    $filed = $select->getcondData($table,$cond);

                    if($filed != "")

                    {

                    ?>

                    <input type="text" class="form-control rounded-0" placeholder="Father Name" name="fthername" value="<?php echo $res['in_fathernam'];?>" >

                    <?php

                    }

                    else

                    {

                      ?>

                      
                      <span class="form-control rounded-0" readonly><?php echo $res['in_fathernam'];?></span>

                      <?php

                    }

                    ?>

                    

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label" for="useremail">Company Email*</label>

                  <div class="input-group col-sm-8">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0 bg-primary"><i class="fas fa-envelope"></i></span>

                    </div>

                    <?php

                    $table = "in_controller";

                    $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='companyEmail' AND `in_action`='1' ";

                    $select = new Selectall();

                    $filed = $select->getcondData($table,$cond);

                    if($filed != "")

                    {

                    ?>

                    <input type="email" class="form-control rounded-0" placeholder="Email" name="useremail" required value="<?php echo $res['in_email'];?>" >

                    <?php

                    }

                    else

                    {

                      ?>
                      <span class="form-control rounded-0" readonly><?php echo $res['in_email'];?></span>
                      

                      <?php

                    }

                    ?>

                    

                  </div>

                </div>

                



                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Date Of Birth</label>

                  <div class="input-group col-sm-8">

                    <?php

                    $table = "in_controller";

                    $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='birthDay' AND `in_action`='1' ";

                    $select = new Selectall();

                    $filed = $select->getcondData($table,$cond);

                    if($filed != "")

                    {

                    ?>

                    <input type="text" class="form-control rounded-0 " placeholder="dd-mm-yyyy" id="birthpicker" value="<?php echo $res['in_dateofbirth'];?>">
                    <input type="hidden" name="dateofbirth" id="dateofbirth">

                    <?php

                    }

                    else

                    {

                      ?>
                      <span class="form-control rounded-0" readonly><?php echo $res['in_dateofbirth'];?></span>
                      
                      <?php

                    }

                    ?>

                    



                  </div>

                </div>



                <div id="retirement"></div>

                

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Mobile No*</label>

                  <div class="input-group col-sm-8">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0 bg-primary"><i class="fas fa-phone"></i></span>

                    </div>

                    <?php

                    $table = "in_controller";

                    $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='phoneNumber' AND `in_action`='1' ";

                    $select = new Selectall();

                    $filed = $select->getcondData($table,$cond);

                    if($filed != "")

                    {

                    ?>

                    <input type="tel" class="form-control rounded-0" placeholder="Mobile" name="mobileone" required value="<?php echo $res['in_mobileno'];?>" >

                    <?php

                    }

                    else

                    {

                      ?>
                      <span class="form-control rounded-0" readonly><?php echo $res['in_mobileno'];?></span>
                      

                      <?php

                    }

                    ?>

                    

                  </div>

                </div>



                



                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Gender</label>

                  <div class="input-group col-sm-8">

                    <?php

                    $table = "in_controller";

                    $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='empGender' AND `in_action`='1' ";

                    $select = new Selectall();

                    $filed = $select->getcondData($table,$cond);

                    if($filed != "")

                    {

                    ?>
                    <select class="form-control rounded-0" name="gender" >

                      <option value="Male" <?php echo $res['in_gender'] == "Male" ? "selected":""; ?>>Male</option>

                      <option value="Female" <?php echo $res['in_gender'] == "Female" ? "selected":""; ?>>Female</option>

                      <option value="Third" <?php echo $res['in_gender'] == "Third" ? "selected":""; ?>>Third Gender</option>

                    </select>

                    <?php

                    }

                    else

                    {

                      ?>
                      <span class="form-control rounded-0" readonly><?php echo $res['in_gender'];?></span>
                    
                      <?php

                    }

                    ?>

                    

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Marital Status*</label>

                  <div class="input-group col-sm-8">

                    <?php

                    $table = "in_controller";

                    $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='maritalStatus' AND `in_action`='1' ";

                    $select = new Selectall();

                    $filed = $select->getcondData($table,$cond);

                    if($filed != "")

                    {

                    ?>
                    <select class="form-control rounded-0" name="marital" required >

                      <option value="Married" <?php echo $res['in_marital'] == "Married" ? "selected":""; ?> >Married</option>

                      <option value="Widowed" <?php echo $res['in_marital'] == "Widowed" ? "selected":""; ?>>Widowed</option>

                      <option value="Separated" <?php echo $res['in_marital'] == "Separated" ? "selected":""; ?>>Separated</option>

                      <option value="Divorced" <?php echo $res['in_marital'] == "Divorced" ? "selected":""; ?>>Divorced</option>

                      <option value="Single" <?php echo $res['in_marital'] == "Single" ? "selected":""; ?>>Single</option>



                    </select>

                    <?php

                    }

                    else

                    {

                      ?>
                      <span class="form-control rounded-0" readonly><?php echo $res['in_marital'];?></span>
                  
                      <?php

                    }

                    ?>

                    

                  </div>

                </div>

                

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Photo</label>

                  <div class="input-group col-sm-8">

                    <?php

                    $table = "in_controller";

                    $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='profilePic' AND `in_action`='1' ";

                    $select = new Selectall();

                    $filed = $select->getcondData($table,$cond);

                    if($filed != "")

                    {

                    ?>
                    <input type="file" class="form-control rounded-0" name="profile" value="<?php echo $res['in_photo'];?>" >

                    <?php

                    }

                    else

                    {

                      echo "No Access";

                    }

                    ?>

                    

                  </div>

                </div>

                <?php

                $table = "in_controller";

                $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='localAddress' AND `in_action`='1' ";

                $select = new Selectall();

                $filed = $select->getcondData($table,$cond);

                if($filed != "")

                {

                ?>

                <fieldset class="border p-3 btn-sm my-4">

                  <legend style="font-size: 16px;font-style: italic;">Local Address</legend>

                    <div class="form-group row">

                    <label class="col-sm-4 col-form-label">Address Line 1</label>

                    <div class="input-group col-sm-8">

                      

                      <input type="text" class="form-control rounded-0" name="addone" id="addone" placeholder="Address 1" value="<?php echo $res['in_localadd1'];?>" >

                    </div>

                  </div>

                  <div class="form-group row">

                    <label class="col-sm-4 col-form-label">Address Line 2</label>

                    <div class="input-group col-sm-8">

                      

                      <input type="text" class="form-control rounded-0" name="addtwo" id="addtwo" placeholder="Address 2" value="<?php echo $res['in_localadd2'];?>" >

                    </div>

                  </div>

                  <div class="form-group row">

                    <label class="col-sm-4 col-form-label">Current City</label>

                    <div class="input-group col-sm-8">

                      
                      
                    <input type="hidden" name="cstate" value="<?php echo $res['in_localstate'];?>">
                      <select class="form-control rounded-0" name="city" id="getstate" >

                        

                        <?php
                        

                        $table = "in_worldcity";

                        $cond = " `in_status`='1' ORDER BY in_cityname ASC";

                        $select = new Selectall();

                        $selData = $select->getallCond($table,$cond);

                        if(!empty($selData))

                        {

                          foreach($selData as $sel)

                          {
                            
                            ?>

                            <option value="<?php echo $sel['in_sno'];?>" <?php echo $res['in_localcity'] == $sel['in_sno'] ? "selected" : ""; ?>><?php echo $sel['in_cityname'];?></option>

                            <?php

                          }

                        }



                        ?>

                      </select>

                    </div>

                  </div>

                  <div id="curstate"></div>

                  <div class="form-group row">

                    <label class="col-sm-4 col-form-label">Country</label>

                    <div class="input-group col-sm-8">

                      
                      
                      <select class="form-control rounded-0" name="country" id="getcountry">

                        

                        <?php

                        $table = "in_countries";

                        $cond = " `in_status`='1' ORDER BY in_country ASC";

                        $select = new Selectall();

                        $selData = $select->getallCond($table,$cond);

                        if(!empty($selData))

                        {

                          foreach($selData as $sel)

                          {

                            ?>

                            <option value="<?php echo $sel['in_sno'];?>" <?php echo $res['in_localconty'] == $sel['in_sno'] ? "selected":""; ?>><?php echo $sel['in_country'];?></option>

                            <?php

                          }

                        }



                        ?>

                      </select>

                      <div id="regioncode"></div>

                    </div>

                  </div>

                  <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Postal Code</label>

                  <div class="input-group col-sm-8">

                   <input type="tel" class="form-control rounded-0" name="localpostal" id="postalcode" maxlength="6" value="<?php echo $res['in_localpostal'];?>" > 

                  </div>

                </div>

                </fieldset>

                

                <div class="form-group" style="background: #efefef;">

                  <div class="input-group">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0 "><input type="checkbox" onclick="fixaddress()" id="fixcheck"></span>

                    </div>

                    <span class="ml-3">If Same as Local Address</span>

                  </div>

                </div>



                <fieldset class="border p-3 btn-sm my-4" id="paramadd">

                  <legend style="font-size: 16px;font-style: italic;">Permanent Address</legend>

                    <div class="form-group row">

                    <label class="col-sm-4 col-form-label">Address Line 1</label>

                    <div class="input-group col-sm-8">

                      

                      <input type="text" class="form-control rounded-0" name="paddone" id="paddone" placeholder="Address 1" value="<?php echo $res['in_parmaadd1'];?>" >

                    </div>

                  </div>

                  <div class="form-group row">

                    <label class="col-sm-4 col-form-label">Address Line 2</label>

                    <div class="input-group col-sm-8">

                      

                      <input type="text" class="form-control rounded-0" name="paddtwo" id="paddtwo" placeholder="Address 2" value="<?php echo $res['in_permaadd2'];?>" >

                    </div>

                  </div>

                  <div class="form-group row">

                    <label class="col-sm-4 col-form-label">Parmanant City</label>

                    <div class="input-group col-sm-8">

                      
                        
                    <input type="hidden" name="pstate" value="<?php echo $res['in_permastate'];?>">
                        
                      <select class="form-control rounded-0" name="pcity" id="pgetstate">

                        

                        <?php

                        $table = "in_worldcity";

                        $cond = " `in_status`='1' ORDER BY in_cityname ASC";

                        $select = new Selectall();

                        $selData = $select->getallCond($table,$cond);

                        if(!empty($selData))

                        {

                          foreach($selData as $sel)

                          {

                            ?>

                            <option value="<?php echo $sel['in_sno'];?>" <?php echo $res['in_parmacity'] == $sel['in_sno'] ? "selected":""; ?>><?php echo $sel['in_cityname'];?></option>

                            <?php

                          }

                        }



                        ?>

                      </select>

                    </div>

                  </div>

                  <div id="pcurstate"></div>

                  <div class="form-group row">

                    <label class="col-sm-4 col-form-label">Country</label>

                    <div class="input-group col-sm-8">

                      
                        
                      <select class="form-control rounded-0" name="pcountry" id="pgetcountry">

                        <option value="<?php echo $res['in_permaconty'];?>"><?php echo $jakeconty;?> (<?php echo $jakecode;?>)</option>

                        <?php

                        $table = "in_countries";

                        $cond = " `in_status`='1' ORDER BY in_country ASC";

                        $select = new Selectall();

                        $selData = $select->getallCond($table,$cond);

                        if(!empty($selData))

                        {

                          foreach($selData as $sel)

                          {

                            ?>

                            <option value="<?php echo $sel['in_sno'];?>" <?php echo $res['in_permaconty'] == $sel['in_sno'] ? "selected":""; ?>><?php echo $sel['in_country'];?></option>

                            <?php

                          }

                        }



                        ?>

                      </select>

                      <div id="pregioncode"></div>

                    </div>

                  </div>

                  <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Postal Code</label>

                  <div class="input-group col-sm-8">

                   <input type="tel" class="form-control rounded-0" name="ppostalcode" id="ppostalcode" maxlength="6" value="<?php echo $res['in_permapostal'];?>" > 

                  </div>

                </div>

                </fieldset>

                <?php

                }

                else

                {

                  ?>

                  <fieldset class="border p-3 btn-sm my-4">

                  <legend style="font-size: 16px;font-style: italic;">Local Address</legend>

                    <div class="form-group row">

                    <label class="col-sm-4 col-form-label">Address Line 1</label>

                    <div class="input-group col-sm-8">

                      

                      <input type="text" class="form-control rounded-0" name="addone" id="addone" placeholder="Address 1" value="<?php echo $res['in_localadd1'];?>" readonly>

                    </div>

                  </div>

                  <div class="form-group row">

                    <label class="col-sm-4 col-form-label">Address Line 2</label>

                    <div class="input-group col-sm-8">

                      

                      <input type="text" class="form-control rounded-0" name="addtwo" id="addtwo" placeholder="Address 2" value="<?php echo $res['in_localadd2'];?>" readonly>

                    </div>

                  </div>

                  <div class="form-group row">

                    <label class="col-sm-4 col-form-label">Current City</label>

                    <div class="input-group col-sm-8">

                      
                    <input type="hidden" name="city" value="<?php echo $res['in_localcity'];?>">
                      <input type="hidden" name="cstate" value="<?php echo $res['in_localstate'];?>">

                      <select class="form-control rounded-0" name="city" id="getstate" disabled>

                        <option value="<?php echo $res['in_localcity'];?>"><?php echo $cinsity;?></option>

                        <?php

                        $table = "in_worldcity";

                        $cond = " `in_status`='1' ORDER BY in_cityname ASC";

                        $select = new Selectall();

                        $selData = $select->getallCond($table,$cond);

                        if(!empty($selData))

                        {

                          foreach($selData as $sel)

                          {

                            ?>

                            <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_cityname'];?></option>

                            <?php

                          }

                        }



                        ?>

                      </select>

                    </div>

                  </div>

                  <div class="form-group row">

                    <label class="col-sm-4 col-form-label">Current State</label>

                    <div class="input-group col-sm-8">

                      <input type="hidden" name="cstate" value="<?php echo $cid;?>">

                      <span class="form-control" readonly><?php echo $cinsity;?> (<?php echo $cinid;?>)</span>

                      

                    </div>

                  </div>

                  <div id="curstate"></div>

                  <div class="form-group row">

                    <label class="col-sm-4 col-form-label">Country</label>

                    <div class="input-group col-sm-8">

                    <input type="hidden" name="country" value="<?php echo $res['in_localconty'];?>">

                      <select class="form-control rounded-0" name="country" id="getcountry" disabled>

                        <option value="<?php echo $res['in_localconty'];?>"><?php echo $cascontry;?> (<?php echo $casecode;?>)</option>

                        <?php

                        $table = "in_countries";

                        $cond = " `in_status`='1' ORDER BY in_country ASC";

                        $select = new Selectall();

                        $selData = $select->getallCond($table,$cond);

                        if(!empty($selData))

                        {

                          foreach($selData as $sel)

                          {

                            ?>

                            <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_country'];?></option>

                            <?php

                          }

                        }



                        ?>

                      </select>

                      <div id="regioncode"></div>

                    </div>

                  </div>

                  <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Postal Code</label>

                  <div class="input-group col-sm-8">

                   <input type="tel" class="form-control rounded-0" name="localpostal" id="postalcode" maxlength="6" value="<?php echo $res['in_localpostal'];?>" readonly> 

                  </div>

                </div>

                </fieldset>

                

                <div class="form-group" style="background: #efefef;">

                  <div class="input-group">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0 "><input type="checkbox" onclick="fixaddress()" id="fixcheck" ></span>

                    </div>

                    <span class="ml-3">If Same as Local Address</span>

                  </div>

                </div>



                <fieldset class="border p-3 btn-sm my-4" id="paramadd">

                  <legend style="font-size: 16px;font-style: italic;">Permanent Address</legend>

                    <div class="form-group row">

                    <label class="col-sm-4 col-form-label">Address Line 1</label>

                    <div class="input-group col-sm-8">

                      

                      <input type="text" class="form-control rounded-0" name="paddone" id="paddone" placeholder="Address 1" value="<?php echo $res['in_parmaadd1'];?>" readonly>

                    </div>

                  </div>

                  <div class="form-group row">

                    <label class="col-sm-4 col-form-label">Address Line 2</label>

                    <div class="input-group col-sm-8">

                      

                      <input type="text" class="form-control rounded-0" name="paddtwo" id="paddtwo" placeholder="Address 2" value="<?php echo $res['in_permaadd2'];?>" readonly>

                    </div>

                  </div>

                  <div class="form-group row">

                    <label class="col-sm-4 col-form-label">Permanant City</label>

                    <div class="input-group col-sm-8">

                    <input type="hidden" name="pcity" value="<?php echo $res['in_parmacity'];?>">
                        <input type="hidden" name="pstate" value="<?php echo $res['in_permastate'];?>">

                      <select class="form-control rounded-0" name="pcity" id="pgetstate" disabled>

                        <option value="<?php echo $res['in_parmacity'];?>"><?php echo $pinsity;?></option>

                        <?php

                        $table = "in_worldcity";

                        $cond = " `in_status`='1' ORDER BY in_cityname ASC";

                        $select = new Selectall();

                        $selData = $select->getallCond($table,$cond);

                        if(!empty($selData))

                        {

                          foreach($selData as $sel)

                          {

                            ?>

                            <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_cityname'];?></option>

                            <?php

                          }

                        }



                        ?>

                      </select>

                    </div>

                  </div>

                  <div class="form-group row">

                    <label class="col-sm-4 col-form-label">Permanant State</label>

                    <div class="input-group col-sm-8">

                      <input type="hidden" name="pstate" value="<?php echo $pcid;?>">

                      <span class="form-control" readonly><?php echo $pinsity;?> (<?php echo $piscode;?>)</span>

                      

                    </div>

                  </div>

                  <div id="pcurstate"></div>

                  <div class="form-group row">

                    <label class="col-sm-4 col-form-label">Country</label>

                    <div class="input-group col-sm-8">

                      
                    <input type="hidden" name="pcountry" value="<?php echo $res['in_permaconty'];?>">
                      <select class="form-control rounded-0" name="pcountry" id="pgetcountry" disabled>

                        <option value="<?php echo $res['in_permaconty'];?>"><?php echo $jakeconty;?> (<?php echo $jakecode;?>)</option>

                        <?php

                        $table = "in_countries";

                        $cond = " `in_status`='1' ORDER BY in_country ASC";

                        $select = new Selectall();

                        $selData = $select->getallCond($table,$cond);

                        if(!empty($selData))

                        {

                          foreach($selData as $sel)

                          {

                            ?>

                            <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_country'];?></option>

                            <?php

                          }

                        }



                        ?>

                      </select>

                      <div id="pregioncode"></div>

                    </div>

                  </div>

                  <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Postal Code</label>

                  <div class="input-group col-sm-8">

                   <input type="tel" class="form-control rounded-0" name="ppostalcode" id="ppostalcode" maxlength="6" value="<?php echo $res['in_permapostal'];?>" readonly> 

                  </div>

                </div>

                </fieldset>

                  <?php

                }

                ?>

                

               <?php

                $table = "in_empform";

                $cond = " `in_classname`='Basic Information' AND `in_status`='1' ORDER BY in_orderid ASC ";

                $select = new Selectall();

                $basic = $select->getallCond($table,$cond);

                if(!empty($basic))

                {

                  foreach($basic as $bsc)

                  {

                    $hold = $bsc['in_holder'];

                    $columns = $bsc['in_column'];

                    $column = str_replace("in_","",$columns);
                    
                    $editing = $bsc['in_groupid'];
                    if($editing == $grid)
                    {
                      ?>
                      <div class="form-group row">

                        <label class="col-sm-4 col-form-label"><?php echo $bsc['in_fieldname'];?></label>

                        <div class="input-group col-sm-8">

                          
                          <input type="hidden" name="<?php echo $column;?>" value="<?php echo $res[$columns];?>">
                          <input type="<?php echo $bsc['in_fieldtype'];?>" class="form-control rounded-0" name="<?php echo $column;?>" <?php echo $hold == "1" ? "placeholder='".$bsc['in_fieldname']."'" : ""; ?> value="<?php echo $res[$columns];?>" disabled>

                        </div>

                        </div>
                      <?php
                    }
                    else
                    {
                      ?>
                      <div class="form-group row">

                        <label class="col-sm-4 col-form-label"><?php echo $bsc['in_fieldname'];?></label>

                        <div class="input-group col-sm-8">

                          

                          <input type="<?php echo $bsc['in_fieldtype'];?>" class="form-control rounded-0" name="<?php echo $column;?>" <?php echo $hold == "1" ? "placeholder='".$bsc['in_fieldname']."'" : ""; ?> value="<?php echo $res[$columns];?>">

                        </div>

                        </div>

                      <?php
                    }


                    

                  }

                }

               ?>



              </div>

            </div> <!-- /.close info -->

            

            

          </div>

            <div class="col-sm-6">

              

              

              <div class="card rounded-0">

                <div class="card-header headcolor">

                  <div class="card-title"> <i class="fas fa-industry"></i> Company Details</div>

                  <div class="card-tools">

                    <button type="button" class="btn bg-primary btn-sm" data-card-widget="collapse">

                      <i class="fas fa-minus"></i>

                    </button>

                    

                  </div>

                </div>

                <div class="card-body">

                  <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Category*</label>

                  <div class="input-group col-sm-8">

                    <?php

                    $table = "in_controller";

                    $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='category' AND `in_action`='1' ";

                    $select = new Selectall();

                    $filed = $select->getcondData($table,$cond);

                    if($filed != "")

                    {

                    ?>
                    
                    <select class="form-control rounded-0" name="wcategory" required >

                      

                      <?php

                        $table = "in_master_card";

                        $select = new Selectall();

                        $cond = " `in_relation`='groups' AND `in_status`='1'";

                        $selData = $select->getallCond($table,$cond);

                        if(!empty($selData))

                        {

                        foreach($selData as $sel)

                        {

                          ?>

                          <option value="<?php echo $sel['in_sno'];?>"  <?php echo $res['in_childid'] == $sel['in_sno']? "":""; ?>><?php echo $sel['in_prefix'];?></option>

                          <?php

                        }

                      }

                      ?>



                    </select>

                    <?php

                    }

                    else

                    {

                      ?>
                      <span class="form-control rounded-0" readonly><?php echo $cats['in_prefix'];?></span>
                      

                      <?php

                    }

                    ?>

                    

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">DOJ*</label>

                  <div class="input-group col-sm-8">

                    <?php

                    $table = "in_controller";

                    $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='joiningDate' AND `in_action`='1' ";

                    $select = new Selectall();

                    $filed = $select->getcondData($table,$cond);

                    if($filed != "")

                    {

                    ?>

                    <input type="text" class="form-control rounded-0" placeholder="dd-mm-yyyy" id="joinpicker" value="<?php echo $res['in_dateofjoining'];?>">
                    <input type="hidden" class="form-control rounded-0" name="dateofjoin" id="dateofjoin">
                    <?php

                    }

                    else

                    {

                      ?>
                      <span class="form-control rounded-0" readonly><?php echo $res['in_dateofjoining'];?></span>
                      
                      <?php

                    }

                    ?>

                    



                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Working Location*</label>

                  <div class="input-group col-sm-8">

                    <?php

                    $table = "in_controller";

                    $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='workLocation' AND `in_action`='1' ";

                    $select = new Selectall();

                    $filed = $select->getcondData($table,$cond);

                    if($filed != "")

                    {

                    ?>
                    
                    <select class="form-control rounded-0" name="wlocation" required >

                     

                      <?php

                        $table = "in_master_card";

                        $select = new Selectall();

                        $cond = " `in_relation`='workLocation' ";

                        $selData = $select->getallCond($table,$cond);

                        if(!empty($selData))

                        {

                        foreach($selData as $sel)

                        {

                          ?>

                          <option value="<?php echo $sel['in_sno'];?>" <?php echo $res['in_worklocation'] == $sel['in_sno']? "selected":""; ?>><?php echo $sel['in_prefix'];?></option>

                          <?php

                        }

                      }

                      ?>



                    </select>

                    <?php

                    }

                    else

                    {

                      ?>

                      <span class="form-control rounded-0" readonly><?php echo $wlocs['in_prefix'];?></span>
                      

                      <?php

                    }

                    ?>

                    

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Department*</label>

                  <div class="input-group col-sm-8">

                    <?php

                    $table = "in_controller";

                    $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='empDepart' AND `in_action`='1' ";

                    $select = new Selectall();

                    $filed = $select->getcondData($table,$cond);

                    if($filed != "")

                    {

                    ?>
                    
                    <select class="form-control rounded-0" name="department" required >

                      

                      <?php

                        $table = "in_master_card";

                        $cond = " `in_relation`='department' ";

                        $select = new Selectall();

                        $selData = $select->getallCond($table,$cond);

                        if(!empty($selData))

                        {

                        foreach($selData as $sel)

                        {

                          ?>

                          <option value="<?php echo $sel['in_sno'];?>" <?php echo $res['in_department'] == $sel['in_sno']? "selected":""; ?>><?php echo $sel['in_prefix'];?></option>

                          <?php

                        }

                      }

                      ?>



                    </select>

                    <?php

                    }

                    else

                    {

                      ?>

                      <span class="form-control rounded-0" readonly><?php echo $depart['in_prefix'];?></span>
                      
                      <?php

                    }

                    ?>

                    

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Designation*</label>

                  <div class="input-group col-sm-8">

                    <?php

                    $table = "in_controller";

                    $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='empDesig' AND `in_action`='1' ";

                    $select = new Selectall();

                    $filed = $select->getcondData($table,$cond);

                    if($filed != "")

                    {

                    ?>
                    
                    <select class="form-control rounded-0" name="designation" required >

                      

                      <?php

                        $table = "in_master_card";

                        $cond = " `in_relation` IN ('designation','masterDesignation') ";

                        $select = new Selectall();

                        $selData = $select->getallCond($table,$cond);

                        if(!empty($selData))

                        {

                        foreach($selData as $sel)

                        {

                          ?>

                          <option value="<?php echo $sel['in_sno'];?>" <?php echo $res['in_designation'] == $sel['in_sno']? "selected":""; ?>><?php echo $sel['in_prefix'];?></option>

                          <?php

                        }

                        }

                      ?>



                    </select>

                    <?php

                    }

                    else

                    {

                      ?>

                      <span class="form-control rounded-0" readonly><?php echo $desi['in_prefix'];?></span>
                      

                      <?php

                    }

                    ?>

                    

                  </div>

                </div>

                

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Reporting To</label>

                  <div class="input-group col-sm-8">

                    <?php

                    $table = "in_controller";

                    $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='empReporting' AND `in_action`='1' ";

                    $select = new Selectall();

                    $filed = $select->getcondData($table,$cond);

                    if($filed != "")

                    {

                    ?>
                   
                    <select class="form-control rounded-0" name="reporting">

                      

                     <?php

                        $table = "in_master_card";

                        $cond = " `in_relation`='masterDesignation' ";

                        $select = new Selectall();

                        $selData = $select->getallCond($table,$cond);

                        if(!empty($selData))

                        {

                        foreach($selData as $sel)

                        {
                          $mcode = $sel['in_sno'];
                          $table = "in_employee";
                          $cond = " `in_designation`='$mcode' AND `in_delete`='1' ";
                          $select = new Selectall();
                          $emicode = $select->getallCond($table,$cond);
                          if(!empty($emicode))
                          {
                            foreach($emicode as $amc)
                            {
                              $codname = $amc['in_fname']." ".$amc['in_lname'];
                              $codempi = $amc['in_empid'];
                              ?>

                          <option value="<?php echo $codempi;?>"  <?php echo $res['in_reporting'] == $codempi ? "selected":""; ?> ><?php echo $codname;?></option>

                          <?php
                            }
                            
                          
                          
                        }

                        }

                      }

                      ?>



                    </select>

                    <?php

                    }

                    else

                    {

                      ?>
                      <span class="form-control rounded-0" readonly><?php echo $mnge['in_prefix'];?></span>
                       

                      <?php

                    }

                    ?>

                    

                  </div>

                </div>

                

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Role*</label>

                  <div class="input-group col-sm-8">

                    <?php

                    $table = "in_controller";

                    $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='empRole' AND `in_action`='1' ";

                    $select = new Selectall();

                    $filed = $select->getcondData($table,$cond);

                    if($filed != "")

                    {

                    ?>
                    
                    <select class="form-control rounded-0" name="role" required id="mainrole">

                      

                      <?php

                        $table = "in_super_card";

                        $cond = " `in_cardrelation`='majorcard' ";

                        $select = new Selectall();

                        $selData = $select->getallCond($table,$cond);

                        if(!empty($selData))

                        {

                        foreach($selData as $sel)

                        {

                          ?>

                          <option value="<?php echo $sel['in_sno'];?>" <?php echo $res['in_groupid'] == $sel['in_sno'] ? "selected":""; ?> ><?php echo $sel['in_cardname'];?></option>

                          <?php

                        }

                      }

                      ?>



                    </select>

                    <?php

                    }

                    else

                    {

                      ?>

                      <span class="form-control rounded-0" readonly><?php echo $role['in_cardname'];?></span>

                      

                      <?php

                    }

                    ?>

                    

                  </div>

                </div>

                <div id="companyrole"></div>

                

                <?php

              

                    $table = "in_empform";

                    $cond = " `in_classname`='Company Details' AND `in_status`='1' ORDER BY in_orderid ASC ";

                    $select = new Selectall();

                    $comdetal = $select->getallCond($table,$cond);

                    if(!empty($comdetal))

                    {

                      foreach($comdetal as $com)

                      {

                        $hold = $com['in_holder'];

                        $columns = $com['in_column'];

                        $column = str_replace("in_","",$columns);

                        $editing = $com['in_groupid'];
                        if($editing == $grid)
                        {
                          ?>
                          <div class="form-group row">

                            <label class="col-sm-4 col-form-label"><?php echo $com['in_fieldname'];?></label>

                            <div class="input-group col-sm-8">

                              
                              <input type="hidden" name="<?php echo $column;?>" value="<?php echo $res[$columns];?>">
                              <input type="<?php echo $com['in_fieldtype'];?>" class="form-control rounded-0" name="<?php echo $column;?>" <?php echo $hold == "1" ? "placeholder='".$com['in_fieldname']."'" : ""; ?> value="<?php echo $res[$columns];?>" disabled>

                            </div>

                            </div>
                          <?php
                        }
                        else
                        {
                          ?>
                          <div class="form-group row">

                            <label class="col-sm-4 col-form-label"><?php echo $com['in_fieldname'];?></label>

                            <div class="input-group col-sm-8">

                              

                              <input type="<?php echo $com['in_fieldtype'];?>" class="form-control rounded-0" name="<?php echo $column;?>" <?php echo $hold == "1" ? "placeholder='".$com['in_fieldname']."'" : ""; ?> value="<?php echo $res[$columns];?>">

                            </div>

                            </div>

                          <?php
                        }

                      }

                    }

                  ?>

                </div>

              </div> <!-- close card company details -->

              <div class="card rounded-0">

                <div class="card-header headcolor">

                  <div class="card-title"> <i class="fas fa-money-bill"></i> Salary Details</div>

                  <div class="card-tools">

                    <button type="button" class="btn bg-primary btn-sm" data-card-widget="collapse">

                      <i class="fas fa-minus"></i>

                    </button>

                    

                  </div>

                </div>

                <div class="card-body">

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Salary*</label>

                  <div class="input-group col-sm-8">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0 bg-success"><i class="fas fa-rupee-sign"></i></span>

                    </div>

                    <?php

                    $table = "in_controller";

                    $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='empSalary' AND `in_action`='1' ";

                    $select = new Selectall();

                    $filed = $select->getcondData($table,$cond);

                    if($filed != "")

                    {

                    ?>

                    <input type="password" class="form-control rounded-0" name="salary" placeholder="Salary" required value="<?php echo $res['in_salary'];?>" >

                    <?php

                    }

                    else

                    {

                      ?>
                      <span class="form-control rounded-0" readonly><?php echo $res['in_salary'];?></span>
                      

                      <?php

                    }

                    ?>

                    

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Payscale*</label>

                  <div class="input-group col-sm-8">

                    <?php

                    $table = "in_controller";

                    $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='empPayscale' AND `in_action`='1' ";

                    $select = new Selectall();

                    $filed = $select->getcondData($table,$cond);

                    if($filed != "")

                    {

                    ?>
                    
                    <select class="form-control rounded-0" name="payscale" required>

                      

                      <?php

                        $table = "in_payscale";

                        $cond = " `in_category` = 'payscale'";

                        $select = new Selectall();

                        $selData = $select->getallCond($table,$cond);

                        foreach($selData as $sel)

                        {

                          ?>

                          <option value="<?php echo $sel['in_sno'];?>" <?php echo $res['in_payscale'] == $sel['in_sno']? "selected":""; ?> ><?php echo $sel['in_namescle'];?></option>

                          <?php

                        }

                      ?>



                    </select>

                    <?php

                    }

                    else

                    {

                      ?>

                      <span class="form-control rounded-0" readonly><?php echo $pys['in_namescle'];?></span>

                      

                      <?php

                    }

                    ?>

                    

                  </div>

                </div>

                <?php

                    $table = "in_empform";

                    $cond = " `in_classname`='Salary Details' AND `in_status`='1' ORDER BY in_orderid ASC ";

                    $select = new Selectall();

                    $saldetal = $select->getallCond($table,$cond);

                    if(!empty($saldetal))

                    {

                      foreach($saldetal as $sal)

                      {

                        $hold = $sal['in_holder'];

                        $columns = $sal['in_column'];

                        $column = str_replace("in_","",$columns);

                        $editing = $sal['in_groupid'];
                        if($editing == $grid)
                        {
                          ?>
                          <div class="form-group row">

                            <label class="col-sm-4 col-form-label"><?php echo $sal['in_fieldname'];?></label>

                            <div class="input-group col-sm-8">

                              
                              <input type="hidden" name="<?php echo $column;?>" value="<?php echo $res[$columns];?>">
                              <input type="<?php echo $sal['in_fieldtype'];?>" class="form-control rounded-0" name="<?php echo $column;?>" <?php echo $hold == "1" ? "placeholder='".$sal['in_fieldname']."'" : ""; ?> value="<?php echo $res[$columns];?>" disabled>

                            </div>

                            </div>
                          <?php
                        }
                        else
                        {
                          ?>
                          <div class="form-group row">

                            <label class="col-sm-4 col-form-label"><?php echo $sal['in_fieldname'];?></label>

                            <div class="input-group col-sm-8">

                              

                              <input type="<?php echo $sal['in_fieldtype'];?>" class="form-control rounded-0" name="<?php echo $column;?>" <?php echo $hold == "1" ? "placeholder='".$sal['in_fieldname']."'" : ""; ?> value="<?php echo $res[$columns];?>">

                            </div>

                            </div>

                          <?php
                        }

                      }

                    }

                  ?>

              </div>

              </div> <!-- close salary Details -->

              <div class="card rounded-0">

                <div class="card-header headcolor">

                  <div class="card-title"> <i class="fas fa-wallet"></i> Employee Payroll</div>

                  <div class="card-tools">

                    <button type="button" class="btn bg-secondary btn-sm" data-card-widget="collapse">

                      <i class="fas fa-minus"></i>

                    </button>

                    

                  </div>

                </div>

                <div class="card-body">

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">PAN No*</label>

                  <div class="input-group col-sm-8">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><i class="fas fa-money-check-alt"></i></span>

                    </div>

                    <?php

                    $table = "in_controller";

                    $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='panNumber' AND `in_action`='1' ";

                    $select = new Selectall();

                    $filed = $select->getcondData($table,$cond);

                    if($filed != "")

                    {

                    ?>

                    <input type="text" class="form-control rounded-0" name="panno" placeholder="Pan No" id="propan" onkeyup="propanno()" maxlength="10" value="<?php echo $res['in_panno'];?>" >

                    <?php

                    }

                    else

                    {

                      ?>
                      <span class="form-control rounded-0" readonly><?php echo $res['in_panno'];?></span>

                      
                      <?php

                    }

                    ?>

                    

                    <label class="col-form-label mx-3">TDS</label>

                    <?php

                    $table = "in_controller";

                    $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='empTDS' AND `in_action`='1' ";

                    $select = new Selectall();

                    $filed = $select->getcondData($table,$cond);

                    if($filed != "")

                    {

                    ?>

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><input type="checkbox" name="tdscheck" value="1"></span>



                    </div>

                    <?php

                    }

                    else

                    {

                      ?>

                      <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><input type="checkbox" name="tdscheck" value="1" disabled><input type="hidden" name="tdscheck" value="<?php echo $res['in_tds'];?>" ></span>



                    </div>

                      <?php

                    }

                    ?>

                    

                  </div>

                </div>

                

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">PF No</label>

                  <div class="input-group col-sm-8">

                    <?php

                    $table = "in_controller";

                    $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='pfNumber' AND `in_action`='1' ";

                    $select = new Selectall();

                    $filed = $select->getcondData($table,$cond);

                    if($filed != "")

                    {

                    ?>

                    <div class="input-group-prepend">
                    <?php $pfakk = $res['in_pfaccess'];?>
                      <span class="input-group-text rounded-0"><input type="checkbox" name="pfcheck" value="1" <?php echo $pfakk == "1" ? "checked":""; ?>></span>



                    </div>

                    <input type="text" class="form-control rounded-0" name="pfno" placeholder="PF No" value="<?php echo $res['in_pfnumber'];?>" >

                    <?php

                    }

                    else

                    {

                      ?>

                      <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><input type="checkbox" name="pfcheck" value="1" disabled><input type="hidden" name="pfcheck" value="<?php echo $res['in_pfaccess'];?>"></span>



                    </div>

                    <input type="text" class="form-control rounded-0" name="pfno" placeholder="PF No" value="<?php echo $res['in_pfnumber'];?>" readonly>

                      <?php

                    }

                    ?>

                    

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">UN No</label>

                  <div class="input-group col-sm-8">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><i class="fas fa-hryvnia"></i></span>



                    </div>

                    <?php

                    $table = "in_controller";

                    $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='unNumber' AND `in_action`='1' ";

                    $select = new Selectall();

                    $filed = $select->getcondData($table,$cond);

                    if($filed != "")

                    {

                    ?>

                    <input type="text" class="form-control rounded-0" name="unno" placeholder="UN No" value="<?php echo $res['in_unnumber'];?>" >

                    <?php

                    }

                    else

                    {

                      ?>

                      <input type="text" class="form-control rounded-0" name="unno" placeholder="UN No" value="<?php echo $res['in_unnumber'];?>" readonly>

                      <?php

                    }

                    ?>

                    

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">PF Effective</label>

                  <div class="input-group col-sm-8">

                    <?php

                    $table = "in_controller";

                    $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='pfEffective' AND `in_action`='1' ";

                    $select = new Selectall();

                    $filed = $select->getcondData($table,$cond);

                    if($filed != "")

                    {

                    ?>

                    <input type="text" class="form-control rounded-0" placeholder="dd-mm-yyyy" id="pfpicker" value="<?php echo $res['in_pfeffective'];?>">
                    <input type="hidden" class="form-control rounded-0" name="pfdate" id="pfeffective">
                    <?php

                    }

                    else

                    {

                      ?>
                    <input type="text" class="form-control rounded-0" placeholder="dd-mm-yyyy" value="<?php echo $res['in_pfeffective'];?>" readonly>


                      <?php

                    }

                    ?>

                    



                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">ESI No</label>

                  <div class="input-group col-sm-8">

                    <?php

                    $table = "in_controller";

                    $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='esicNumber' AND `in_action`='1' ";

                    $select = new Selectall();

                    $filed = $select->getcondData($table,$cond);

                    if($filed != "")

                    {

                    ?>

                    <div class="input-group-prepend">
                    <?php $esikk = $res['in_esiaccess'];?>
                      <span class="input-group-text rounded-0"><input type="checkbox" name="esicheck" value="1" <?php echo $esikk == "1" ? "checked":""; ?>></span>



                    </div>

                    <input type="text" class="form-control rounded-0" name="esino" placeholder="ESI No" value="<?php echo $res['in_esinumber'];?>" >

                    <?php

                    }

                    else

                    {

                      ?>

                      <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><input type="checkbox" name="esicheck" value="1" disabled><input type="hidden" name="esicheck" value="<?php echo $res['in_esiaccess'];?>"></span>



                    </div>

                    <input type="text" class="form-control rounded-0" name="esino" placeholder="ESI No" value="<?php echo $res['in_esinumber'];?>" readonly>

                      <?php

                    }

                    ?>

                    

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">ESI Effective</label>

                  <div class="input-group col-sm-8">

                    <?php

                    $table = "in_controller";

                    $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='esicEffective' AND `in_action`='1' ";

                    $select = new Selectall();

                    $filed = $select->getcondData($table,$cond);

                    if($filed != "")

                    {

                    ?>

                    <input type="text" class="form-control rounded-0" placeholder="dd-mm-yyyy" id="esipicker" value="<?php echo $res['in_esiceffective'];?>">
                    <input type="hidden" class="form-control rounded-0" name="esidate" id="esieffective">
                    <?php

                    }

                    else

                    {

                      ?>
                    <input type="text" class="form-control rounded-0" placeholder="dd-mm-yyyy" value="<?php echo $res['in_esiceffective'];?>" readonly>


                      <?php

                    }

                    ?>

                    



                  </div>

                </div>

                <?php

                    $table = "in_empform";

                    $cond = " `in_classname`='Employee Payroll' AND `in_status`='1' ORDER BY in_orderid ASC ";

                    $select = new Selectall();

                    $emproll = $select->getallCond($table,$cond);

                    if(!empty($emproll))

                    {

                      foreach($emproll as $emprl)

                      {

                        $hold = $emprl['in_holder'];

                        $columns = $emprl['in_column'];

                        $column = str_replace("in_","",$columns);

                        $editing = $emprl['in_groupid'];
                        if($editing == $grid)
                        {
                          ?>
                          <div class="form-group row">

                            <label class="col-sm-4 col-form-label"><?php echo $emprl['in_fieldname'];?></label>

                            <div class="input-group col-sm-8">

                              
                              <input type="hidden" name="<?php echo $column;?>" value="<?php echo $res[$columns];?>">
                              <input type="<?php echo $emprl['in_fieldtype'];?>" class="form-control rounded-0" name="<?php echo $column;?>" <?php echo $hold == "1" ? "placeholder='".$emprl['in_fieldname']."'" : ""; ?> value="<?php echo $res[$columns];?>" disabled>

                            </div>

                            </div>
                          <?php
                        }
                        else
                        {
                          ?>
                          <div class="form-group row">

                            <label class="col-sm-4 col-form-label"><?php echo $emprl['in_fieldname'];?></label>

                            <div class="input-group col-sm-8">

                              

                              <input type="<?php echo $emprl['in_fieldtype'];?>" class="form-control rounded-0" name="<?php echo $column;?>" <?php echo $hold == "1" ? "placeholder='".$emprl['in_fieldname']."'" : ""; ?> value="<?php echo $res[$columns];?>">

                            </div>

                            </div>

                          <?php
                        }

                      }

                    }

                  ?>

              </div>

              </div> <!-- close payroll --->

              <div class="card rounded-0">

                <div class="card-header headcolor">

                  <div class="card-title"> <i class="fas fa-piggy-bank"></i> Bank Details</div>

                  <div class="card-tools">

                    <button type="button" class="btn bg-secondary btn-sm" data-card-widget="collapse">

                      <i class="fas fa-minus"></i>

                    </button>

                    

                  </div>

                </div>

                <div class="card-body">

                  <?php

                    $table = "in_empform";

                    $cond = " `in_classname`='Bank Details' AND `in_status`='1' ORDER BY in_orderid ASC ";

                    $select = new Selectall();

                    $bank = $select->getallCond($table,$cond);

                    if(!empty($bank))

                    {

                      foreach($bank as $bnk)

                      {

                        $hold = $bnk['in_holder'];

                        $columns = $bnk['in_column'];

                        $column = str_replace("in_","",$columns);

                        $editing = $bnk['in_groupid'];
                        if($editing == $grid)
                        {
                          ?>
                          <div class="form-group row">

                            <label class="col-sm-4 col-form-label"><?php echo $bnk['in_fieldname'];?></label>

                            <div class="input-group col-sm-8">

                              
                              <input type="hidden" name="<?php echo $column;?>" value="<?php echo $res[$columns];?>">
                              <input type="<?php echo $bnk['in_fieldtype'];?>" class="form-control rounded-0" name="<?php echo $column;?>" <?php echo $hold == "1" ? "placeholder='".$bnk['in_fieldname']."'" : ""; ?> value="<?php echo $res[$columns];?>" disabled>

                            </div>

                            </div>
                          <?php
                        }
                        else
                        {
                          ?>
                          <div class="form-group row">

                            <label class="col-sm-4 col-form-label"><?php echo $bnk['in_fieldname'];?></label>

                            <div class="input-group col-sm-8">

                              

                              <input type="<?php echo $bnk['in_fieldtype'];?>" class="form-control rounded-0" name="<?php echo $column;?>" <?php echo $hold == "1" ? "placeholder='".$bnk['in_fieldname']."'" : ""; ?> value="<?php echo $res[$columns];?>">

                            </div>

                            </div>

                          <?php
                        }

                      }

                    }

                  ?>

                

                </div>

              </div> <!--- bank details --->

            </div>



        </div>

        <div class="row">

          <div class="col-lg-12 col-md-12">

            <script type="text/javascript">

              $(document).ready(function(){

              $("#proeducate").click(function(){

                  

                  var lastField = $("#education tr:last");

                  var fieldWrapper = $("<tr/>");

                  

                  var sName = $("<td><input type=\"text\" class=\"form-control rounded-0\" name=\"eduname[]\" placeholder=\"Name...\"></td><td><input type=\"text\" class=\"form-control rounded-0\" name=\"board[]\" placeholder=\"Board...\">");

                  var lName = $("</td><td><input type=\"text\" class=\"form-control rounded-0\" name=\"eduyear[]\" placeholder=\"Year...\"></td><td><input type=\"text\" class=\"form-control rounded-0\" name=\"marks[]\" placeholder=\"Marks..\"/></td><td><input type=\"file\" class=\"form-control rounded-0\" name=\"upload[]\"/>");

                  var removeButton = $("</td><td><span class=\"input-group-text rounded-0 bg-danger remove\"><i class=\"fas fa-times\"></i></span>");

                  removeButton.click(function() {

                      $(this).parent().remove();

                  });

                  

                  fieldWrapper.append(sName);

                  fieldWrapper.append(lName);

                  fieldWrapper.append(removeButton);

                  $("#education").append(fieldWrapper);

              });

          });

            </script>

            <div class="card rounded-0">

                <div class="card-header headcolor">

                  <div class="card-title"> <i class="fas fa-school"></i> Education</div>

                  <div class="card-tools">

                    <?php

                    $table = "in_controller";

                    $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='educationCont' AND `in_action`='1' ";

                    $select = new Selectall();

                    $filed = $select->getcondData($table,$cond);

                    if($filed != "")

                    {

                    ?>

                    <button type="button" class="btn bg-info border-0 btn-sm" id="proeducate"><i class="fas fa-plus"></i></button>

                    <?php

                    }

                    

                    ?>

                    

                  </div>

                </div>

                <div class="card-body">

                  <table class="table table-bordered">

                    <thead class="bg-secondary">

                      <th>Level</th>

                      <th>Board</th>

                      <th>Year</th>

                      <th>Marks</th>

                      <th>Attachment</th>

                      <th>Action</th>

                    </thead>

                    <tbody id="education">

                      <?php

                      

                        $edulevel = $res['in_edulevel'];

                        $edulevel = rtrim($edulevel,";");

                        $edubord = $res['in_eduboard'];

                        $edubord = rtrim($edubord,";");

                        $edubo = explode(";", $edubord);

                        $eduyear = $res['in_eduyear'];

                        $eduyear = rtrim($eduyear, ";");

                        $eduyr = explode(";",$eduyear);

                        $edumarks = $res['in_edumarks'];

                        $edumarks = rtrim($edumarks,";");

                        $edumar = explode(";",$edumarks);

                        $eduattach = $res['in_eduattachment'];

                        $eduattach = trim($eduattach,";");

                        $eduatt = explode(";",$eduattach);

                        if($edulevel != "")

                        {

                          $edul = explode(";", $edulevel);

                          for($s=0;$s<count($edul);$s++)

                          {

                            ?>

                            <tr>

                              <td><input type="text" name="eduname[]" value="<?php echo $edul[$s];?>" class="form-control rounded-0"></td>

                              <td><input type="text" name="board[]" value="<?php echo $edubo[$s];?>" class="form-control rounded-0"></td>

                              <td><input type="text" name="eduyear[]" value="<?php echo $eduyr[$s];?>" class="form-control rounded-0"></td>

                              <td><input type="text" name="marks[]" value="<?php echo $edumar[$s];?>" class="form-control rounded-0"></td>
                              <td><input type="hidden" name="upload[]" value="<?php echo $eduatt[$s];?>"><input type="file" name="upload[]" value="" class="form-control rounded-0"></td>


                              <td><a href="<?php echo BSURL?>uploads/certificate/<?php echo $eduatt[$s];?>" download class="input-group-text bg-success"><i class="fas fa-download"></i> </a></td>

                            </tr>

                            <?php

                          }

                          

                          

                        }

                      ?>

                      

                    </tbody>

                  </table>

                  

                  

                </div>

              </div>

            

            <script type="text/javascript">

              $(document).ready(function(){

              $("#proupload").click(function(){

                  

                  var lastField = $("#professional div:last");

                  var fieldWrapper = $("<tr/>");

                  

                  var sName = $("<td><input type=\"text\" class=\"form-control rounded-0\" name=\"company[]\" placeholder=\"Company Name...\"></td><td><input type=\"text\" class=\"form-control rounded-0\" name=\"position[]\" placeholder=\"Position...\">");

                  var lName = $("</td><td><input type=\"date\" class=\"form-control rounded-0\" name=\"fromdate[]\" placeholder=\"From...\"></td><td><input type=\"date\" class=\"form-control rounded-0\" name=\"fromend[]\" placeholder=\"End..\"/></td><td><input type=\"file\" class=\"form-control rounded-0\" name=\"uploadcom[]\"/>");

                  var removeButton = $("</td><td><span class=\"input-group-text rounded-0 bg-danger remove\"><i class=\"fas fa-times\"></i></span>");

                  removeButton.click(function() {

                      $(this).parent().remove();

                  });

                  

                  fieldWrapper.append(sName);

                  fieldWrapper.append(lName);

                  fieldWrapper.append(removeButton);

                  $("#professional").append(fieldWrapper);

              });

          });

            </script>

            <div class="card rounded-0">

                <div class="card-header headcolor">

                  <div class="card-title"> <i class="fas fa-trophy"></i> Professional</div>

                  <div class="card-tools">

                    <?php

                    $table = "in_controller";

                    $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='professionCont' AND `in_action`='1' ";

                    $select = new Selectall();

                    $filed = $select->getcondData($table,$cond);

                    if($filed != "")

                    {

                    ?>

                    <button type="button" class="btn bg-info border-0 btn-sm" id="proupload"><i class="fas fa-plus"></i></button>

                    <?php

                    }

                    

                    ?>

                    

                  </div>

                </div>

                <div class="card-body">

                  <table class="table table-bordered">

                    <thead class="bg-secondary">

                      <th>Employer</th>

                      <th>Last Position</th>

                      <th>Start</th>

                      <th>End</th>

                      <th>Attachment</th>

                      <th>Action</th>

                    </thead>

                    <tbody id="professional">

                      <?php

                      

                        $edulevel = $res['in_employer'];

                        $edulevel = rtrim($edulevel,";");

                        $edubord = $res['in_lastposition'];

                        $edubord = rtrim($edubord,";");

                        $edubo = explode(";", $edubord);

                        $eduyear = $res['in_jobfrom'];

                        $eduyear = rtrim($eduyear, ";");

                        $eduyr = explode(";",$eduyear);

                        $edumarks = $res['in_jobto'];

                        $edumarks = rtrim($edumarks,";");

                        $edumar = explode(";",$edumarks);

                        $eduattach = $res['in_jobproof'];

                        $eduattach = trim($eduattach,";");

                        $eduatt = explode(";",$eduattach);

                        if($edulevel != "")

                        {

                          $edul = explode(";", $edulevel);

                          for($s=0;$s<count($edul);$s++)

                          {

                            ?>

                            <tr>

                              <td><input type="text" name="company[]" value="<?php echo $edul[$s];?>" class="form-control rounded-0"></td>

                              <td><input type="text" name="position[]" value="<?php echo $edubo[$s];?>" class="form-control rounded-0"></td>
                              

                              <td><input type="text" name="fromdate[]" value="<?php echo $eduyr[$s];?>" class="form-control rounded-0"></td>
                              

                              <td><input type="text" name="fromend[]" value="<?php echo $edumar[$s];?>" class="form-control rounded-0"></td>
                              
                              <td><input type="hidden" name="uploadcom[]" value="<?php echo $eduatt[$s];?>"><input type="file" name="uploadcom[]" value="<?php echo $eduatt[$s];?>" class="form-control rounded-0"></td>
                              
                              <td><a href="<?php echo BSURL?>uploads/certificate/<?php echo $eduatt[$s];?>" download class="input-group-text bg-success"><i class="fas fa-download"></i> </a></td>

                            </tr>

                            <?php

                          }

                          

                          

                        }

                      ?>


                    </tbody>

                  </table>

                  

                </div>

              </div>

            

          </div>

        </div>

        <!-- /. close row -->

        <div class="row">

          <div class="col-12">

            <div class="empinfo mb-3 text-center">

                <input type="submit" name="saveinfo" value="Save Information" class="btn btn-primary px-5">

              </div>

          </div>

        </div>

        </form>

      </div><!-- /.container-fluid -->

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->

  <script type="text/javascript">

    $("#compgroup").change(function () {

      var comgrup = $("#compgroup").val();

      $.ajax({

          url: '../employee/ajax-card.php',

          type: 'get',

          data: {ids:comgrup},

          success: function (data) {

            $("#cardone").html(data);



          }

        });

    });

    $("#mainrole").change(function(){

      var mainrole = $("#mainrole").val();

      if(mainrole === "1")

      {

        $.ajax({

          url: '../employee/ajax-card.php',

          type: 'get',

          data: {role:mainrole},

          success: function (data) {

            $("#companyrole").html(data);



          }

        });

      }

      else

      {

        data = "";

        $("#companyrole").html(data);

      }

    });

    $("#getstate").change(function(){

      var getstate = $("#getstate").val();

     

     $.ajax({

          url: '../employee/ajax-card.php',

          type: 'get',

          data: {gste:getstate},

          success: function (data) {

            $("#curstate").html(data);

          }

        });

    });

    $("#pgetstate").change(function(){

      var pgetstate = $("#pgetstate").val();

     

     $.ajax({

          url: '../employee/ajax-card.php',

          type: 'get',

          data: {pgste:pgetstate},

          success: function (data) {

            $("#pcurstate").html(data);

          }

        });

    });

    $("#getcountry").change(function(){

      var getcountry = $("#getcountry").val();

     

     $.ajax({

        url: '../employee/ajax-card.php',

        type: 'get',

        data: {conty:getcountry},

        success: function (data) {

          $("#regioncode").html(data);

        }

      });

    });

    $("#pgetcountry").change(function(){

      var pgetcountry = $("#pgetcountry").val();

     

     $.ajax({

        url: '../employee/ajax-card.php',

        type: 'get',

        data: {pconty:pgetcountry},

        success: function (data) {

          $("#pregioncode").html(data);

        }

      });

    });

    var comid = "<?php echo $comid;?>";

    $("#dateofbirth").change(function(){

      var dateofbirth = $("#dateofbirth").val();

      

     $.ajax({

        url: '../employee/ajax-card.php',

        type: 'get',

        data: {dob:dateofbirth,ret:comid},

        success: function (data) {

          $("#retirement").html(data);

        }

      });

    });

      

    

  </script>

<script src="<?php echo BSURL;?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>

<script src="<?php echo BSURL;?>assets/plugins/jquery-validation/additional-methods.min.js"></script>

<script src="<?php echo BSURL;?>assets/dist/js/pages/employee.js"></script>

 <?php

include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/footer.php';

?>
<script>
  $(function() { 
     
     $("#birthpicker").datepicker({dateFormat: 'dd-mm-yy'});
     $("#joinpicker").datepicker({dateFormat: 'dd-mm-yy'});

     // pfpicker
    $("#pfpicker").datepicker({dateFormat: 'dd-mm-yy'});

// esipicker
$("#esipicker").datepicker({dateFormat: 'dd-mm-yy'});
 
     $("#birthpicker").on('change', function(){
       var birthpick = $("#birthpicker").val();
       $("#dateofbirth").val(birthpick);
     });
     $("#joinpicker").on('change', function(){
       var joinpicker = $("#joinpicker").val();
       $("#dateofjoin").val(joinpicker);
     });

     $("#pfpicker").on('change', function(){
      var pfpicker = $("#pfpicker").val();
      $("#pfeffective").val(pfpicker);
    });

    $("#esipicker").on('change', function(){
      var esipicker = $("#esipicker").val();
      $("#esieffective").val(esipicker);
    });
 
   });
</script>