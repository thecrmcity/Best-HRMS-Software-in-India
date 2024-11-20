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

        <div class="row">

              <div class="col-sm-6 col-lg-6 col-6">

                

                  

                

                

              </div>

              <div class="col-sm-6 col-lg-6 col-6">

                <div class="mb-3 clearfix">

                  <a href="modify-form.php" class="text-secondary font-weight-bold float-right ml-3"><i class="fas fa-edit"></i> Modify Form</a>

                  <a href="upload-employee.php" class="font-weight-bold float-right text-secondary"><i class="fas fa-upload"></i> Upload Employee</a>

                </div>

              </div>

            </div>

        

        <form class="" method="POST" action="<?php echo BSURL;?>functions/employee.php?case=addemployee" enctype="multipart/form-data">

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

                if(isset($pemail))

                {

                  $table = "in_master_card";

                  $cond = " `in_parent`='$comid' AND `in_relation`='cardPrefix' ";

                  $select = new Selectall();

                  $prefi = $select->getallCond($table,$cond);

                  ?>

                  <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Card Prefix*</label>

                  <div class="input-group col-sm-8">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0 bg-secondary"><i class="fas fa-user"></i></span>

                    </div>

                    <select class="form-control rounded-0" required name="cardprefix">

                      <option value="">--Select</option>

                    <?php

                    if(!empty($prefi))

                    {

                      foreach($prefi as $pr)

                      {

                        ?>

                        <option value="<?php echo $pr['in_sno'];?>"><?php echo $pr['in_prefix'];?></option>

                        <?php

                      }

                    }

                    ?>

                    </select>

                  </div>

                </div>

                  <?php

                }



                ?>

                

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Employee ID*</label>

                  <div class="input-group col-sm-8">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><i class="fas fa-infinity"></i></span>

                    </div>

                    <input type="number" class="form-control rounded-0" name="emplid" required min="0" value="0">

                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">First Name*</label>

                  <div class="input-group col-sm-8">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0 bg-primary"><i class="fas fa-user"></i></span>

                    </div>

                    <input type="text" class="form-control rounded-0" placeholder="Name" name="fname" required>

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Last Name</label>

                  <div class="input-group col-sm-8">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><i class="fas fa-user"></i></span>

                    </div>

                    <input type="text" class="form-control rounded-0" placeholder="Name" name="lname">

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Father Name</label>

                  <div class="input-group col-sm-8">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><i class="fas fa-user"></i></span>

                    </div>

                    <input type="text" class="form-control rounded-0" placeholder="Father Name" name="fthername">

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label" for="useremail">Company Email*</label>

                  <div class="input-group col-sm-8">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0 bg-primary"><i class="fas fa-envelope"></i></span>

                    </div>

                    <input type="email" class="form-control rounded-0" placeholder="Email" name="useremail" required>

                  </div>

                </div>

                



                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Date Of Birth</label>

                  <div class="input-group col-sm-8">

                    

                    <input type="text" class="form-control rounded-0 " placeholder="dd-mm-yyyy" id="birthpicker">
                    <input type="hidden" name="dateofbirth" id="dateofbirth">


                  </div>

                </div>



                <div id="retirement"></div>

                

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Mobile No*</label>

                  <div class="input-group col-sm-8">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0 bg-primary"><i class="fas fa-phone"></i></span>

                    </div>

                    <input type="tel" class="form-control rounded-0" placeholder="Mobile" name="mobileone" required pattern="[1-9]{1}[0-9]{9}" minlength="10" maxlength="10">

                  </div>

                </div>



                



                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Gender</label>

                  <div class="input-group col-sm-8">

                    

                    <select class="form-control rounded-0" name="gender">

                      <option value="">Select</option>

                      <option value="Male">Male</option>

                      <option value="Female">Female</option>

                      <option value="Other">Other</option>

                    </select>

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Marital Status*</label>

                  <div class="input-group col-sm-8">

                    

                    <select class="form-control rounded-0" name="marital" required>

                      <option value="">Select</option>

                      <option value="Married">Married</option>

                      <option value="Widowed">Widowed</option>

                      <option value="Separated">Separated</option>

                      <option value="Divorced">Divorced</option>

                      <option value="Single">Single</option>



                    </select>

                  </div>

                </div>

                

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Photo</label>

                  <div class="input-group col-sm-8">

                    

                    <input type="file" class="form-control rounded-0" name="profile">

                  </div>

                </div>

                <fieldset class="border p-3 btn-sm my-4">

                  <legend style="font-size: 16px;font-style: italic;">Local Address</legend>

                    <div class="form-group row">

                    <label class="col-sm-4 col-form-label">Address Line 1</label>

                    <div class="input-group col-sm-8">

                      

                      <input type="text" class="form-control rounded-0" name="addone" id="addone" placeholder="Address 1">

                    </div>

                  </div>

                  <div class="form-group row">

                    <label class="col-sm-4 col-form-label">Address Line 2</label>

                    <div class="input-group col-sm-8">

                      

                      <input type="text" class="form-control rounded-0" name="addtwo" id="addtwo" placeholder="Address 2">

                    </div>

                  </div>

                  <div class="form-group row">

                    <label class="col-sm-4 col-form-label">Current City</label>

                    <div class="input-group col-sm-8">

                      

                      <select class="form-control rounded-0" name="city" id="getstate">

                        <option value="">--Select City--</option>

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

                  <div id="curstate"></div>

                  <div class="form-group row">

                    <label class="col-sm-4 col-form-label">Country</label>

                    <div class="input-group col-sm-8">

                      

                      <select class="form-control rounded-0" name="country" id="getcountry">

                        <option value="">--Country--</option>

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

                   <input type="tel" class="form-control rounded-0" name="localpostal" id="postalcode" maxlength="6"> 

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

                      

                      <input type="text" class="form-control rounded-0" name="paddone" id="paddone" placeholder="Address 1">

                    </div>

                  </div>

                  <div class="form-group row">

                    <label class="col-sm-4 col-form-label">Address Line 2</label>

                    <div class="input-group col-sm-8">

                      

                      <input type="text" class="form-control rounded-0" name="paddtwo" id="paddtwo" placeholder="Address 2">

                    </div>

                  </div>

                  <div class="form-group row">

                    <label class="col-sm-4 col-form-label">Current City</label>

                    <div class="input-group col-sm-8">

                      

                      <select class="form-control rounded-0" name="pcity" id="pgetstate">

                        <option value="">--Select City--</option>

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

                  <div id="pcurstate"></div>

                  <div class="form-group row">

                    <label class="col-sm-4 col-form-label">Country</label>

                    <div class="input-group col-sm-8">

                      

                      <select class="form-control rounded-0" name="pcountry" id="pgetcountry">

                        <option value="">--Country--</option>

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

                   <input type="tel" class="form-control rounded-0" name="ppostalcode" id="ppostalcode" maxlength="6"> 

                  </div>

                </div>

                </fieldset>

                



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

                    $column = $bsc['in_column'];

                    $column = str_replace("in_","",$column);



                    ?>

                    <div class="form-group row">

                      <label class="col-sm-4 col-form-label"><?php echo $bsc['in_fieldname'];?></label>

                      <div class="input-group col-sm-8">

                        

                        <input type="<?php echo $bsc['in_fieldtype'];?>" class="form-control rounded-0" name="<?php echo $column;?>" <?php echo $hold == "1" ? "placeholder='".$bsc['in_fieldname']."'" : ""; ?> >

                      </div>

                    </div>

                    <?php

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

                    

                    <select class="form-control rounded-0" name="wcategory" required>

                      <option value="">--Select--</option>

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

                          <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_prefix'];?></option>

                          <?php

                        }

                      }

                      ?>



                    </select>

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Date Of Joining</label>

                  <div class="input-group col-sm-8">

                    

                    <input type="text" class="form-control rounded-0" placeholder="dd-mm-yyyy" id="joinpicker">
                    <input type="hidden" class="form-control rounded-0" name="dateofjoin" id="dateofjoin">


                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Working Location*</label>

                  <div class="input-group col-sm-8">

                    

                    <select class="form-control rounded-0" name="wlocation" required>

                      <option value="">--Select--</option>

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

                          <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_prefix'];?></option>

                          <?php

                        }

                      }

                      ?>



                    </select>

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Department*</label>

                  <div class="input-group col-sm-8">

                    

                    <select class="form-control rounded-0" name="department" required>

                      <option value="">--Select--</option>

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

                          <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_prefix'];?></option>

                          <?php

                        }

                      }

                      ?>



                    </select>

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Designation*</label>

                  <div class="input-group col-sm-8">

                    

                    <select class="form-control rounded-0" name="designation" required>

                      <option value="">--Select--</option>

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

                          <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_prefix'];?></option>

                          <?php

                        }

                        }

                      ?>



                    </select>

                  </div>

                </div>

                

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Reporting To</label>

                  <div class="input-group col-sm-8">

                    

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

                  </div>

                </div>

                

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Role*</label>

                  <div class="input-group col-sm-8">

                    

                    <select class="form-control rounded-0" name="role" required id="mainrole">

                      <option value="">--Select--</option>

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

                          <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_cardname'];?></option>

                          <?php

                        }

                      }

                      ?>



                    </select>

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

                        $column = $com['in_column'];

                        $column = str_replace("in_","",$column);

                        ?>

                        <div class="form-group row">

                          <label class="col-sm-4 col-form-label"><?php echo $com['in_fieldname'];?></label>

                          <div class="input-group col-sm-8">

                            <div class="input-group-prepend">

                              <span class="input-group-text rounded-0"><i class="fas fa-dollar"></i></span>

                            </div>



                            <input type="<?php echo $com['in_fieldtype'];?>" class="form-control rounded-0" name="<?php echo $column;?>" <?php echo $hold == "1" ? "placeholder='".$com['in_fieldname']."'" : ""; ?>>

                          </div>

                        </div>

                        <?php

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

                    <input type="password" class="form-control rounded-0" name="salary" placeholder="Salary" required>

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Payscale*</label>

                  <div class="input-group col-sm-8">

                    

                    <select class="form-control rounded-0" name="payscale" required>

                      <option value="">Select Payscale</option>

                      <?php

                        $table = "in_payscale";

                        $cond = " `in_category` = 'payscale'";

                        $select = new Selectall();

                        $selData = $select->getallCond($table,$cond);

                        foreach($selData as $sel)

                        {

                          ?>

                          <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_namescle'];?></option>

                          <?php

                        }

                      ?>



                    </select>

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

                        $column = $sal['in_column'];

                        $column = str_replace("in_","",$column);

                        ?>

                        <div class="form-group row">

                          <label class="col-sm-4 col-form-label"><?php echo $sal['in_fieldname'];?></label>

                          <div class="input-group col-sm-8">

                            <div class="input-group-prepend">

                              <span class="input-group-text rounded-0"><i class="fas fa-dollar"></i></span>

                            </div>



                            <input type="<?php echo $sal['in_fieldtype'];?>" class="form-control rounded-0" name="<?php echo $column;?>" <?php echo $hold == "1" ? "placeholder='".$sal['in_fieldname']."'" : ""; ?>>

                          </div>

                        </div>

                        <?php

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

                  <label class="col-sm-4 col-form-label">PAN No</label>

                  <div class="input-group col-sm-8">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><i class="fas fa-money-check-alt"></i></span>

                    </div>

                    <input type="text" class="form-control rounded-0" name="panno" placeholder="PAN No" id="propan" onkeyup="propanno()" maxlength="10">

                    <label class="col-form-label mx-3">TDS</label>

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><input type="checkbox" name="tdscheck" value="1"></span>



                    </div>

                  </div>

                </div>

                

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">PF No</label>

                  <div class="input-group col-sm-8">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><input type="checkbox" name="pfcheck" value="1"></span>



                    </div>

                    <input type="text" class="form-control rounded-0" name="pfno" placeholder="PF No">

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">UAN No</label>

                  <div class="input-group col-sm-8">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><i class="fas fa-hryvnia"></i></span>



                    </div>

                    <input type="text" class="form-control rounded-0" name="unno" placeholder="UAN No">

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">PF Effective</label>

                  <div class="input-group col-sm-8">

                    

                    <input type="text" class="form-control rounded-0" placeholder="dd-mm-yyyy" id="pfpicker">
                    <input type="hidden" class="form-control rounded-0" name="pfdate" id="pfeffective">


                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">ESI No</label>

                  <div class="input-group col-sm-8">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><input type="checkbox" name="esicheck" value="1"></span>



                    </div>

                    <input type="text" class="form-control rounded-0" name="esino" placeholder="ESI No">

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">ESI Effective</label>

                  <div class="input-group col-sm-8">

                    

                    <input type="text" class="form-control rounded-0" placeholder="dd-mm-yyyy" id="esipicker">
                    <input type="hidden" class="form-control rounded-0" name="esidate" id="esieffective">




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

                        $column = $emprl['in_column'];

                        $column = str_replace("in_","",$column);

                        ?>

                        <div class="form-group row">

                          <label class="col-sm-4 col-form-label"><?php echo $emprl['in_fieldname'];?></label>

                          <div class="input-group col-sm-8">

                            <div class="input-group-prepend">

                              <span class="input-group-text rounded-0"><i class="fas fa-dollar"></i></span>

                            </div>



                            <input type="<?php echo $emprl['in_fieldtype'];?>" class="form-control rounded-0" name="<?php echo $column;?>" <?php echo $hold == "1" ? "placeholder='".$emprl['in_fieldname']."'" : ""; ?>>

                          </div>

                        </div>

                        <?php

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

                        $column = $bnk['in_column'];

                        $column = str_replace("in_","",$column);

                        ?>

                        <div class="form-group row">

                          <label class="col-sm-4 col-form-label"><?php echo $bnk['in_fieldname'];?></label>

                          <div class="input-group col-sm-8">

                            <div class="input-group-prepend">

                              <span class="input-group-text rounded-0"><i class="fas fa-dollar"></i></span>

                            </div>



                            <input type="<?php echo $bnk['in_fieldtype'];?>" class="form-control rounded-0" name="<?php echo $column;?>" <?php echo $hold == "1" ? "placeholder='".$bnk['in_fieldname']."'" : ""; ?>>

                          </div>

                        </div>

                        <?php

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

                    

                    <button type="button" class="btn bg-info border-0 btn-sm" id="proeducate"><i class="fas fa-plus"></i></button>

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

                    

                    <button type="button" class="btn bg-info border-0 btn-sm" id="proupload"><i class="fas fa-plus"></i></button>

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

                      

                    </tbody>

                  </table>

                  

                </div>

              </div>
               
               <div class="card">
                 <div class="card-body">
                  <label>Key Responsibility Areas :</label>
                      <textarea id="compose-textarea" class="form-control rounded-0" style="height: 400px" name="contents"></textarea>       
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

    
    $("#mainrole").change(function(){

      var mainrole = $("#mainrole").val();

      if(mainrole === "1")

      {

        $.ajax({

          url: 'ajax-card.php',

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

          url: 'ajax-card.php',

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

          url: 'ajax-card.php',

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

        url: 'ajax-card.php',

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

        url: 'ajax-card.php',

        type: 'get',

        data: {pconty:pgetcountry},

        success: function (data) {

          $("#pregioncode").html(data);

        }

      });

    });

    

    var comid = "<?php echo $comid;?>";

    $("#birthpicker").change(function(){

      var birthpicker = $("#birthpicker").val();

      

     $.ajax({

        url: 'ajax-card.php',

        type: 'get',

        data: {dob:birthpicker,ret:comid},

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

  $(function () {
    $('#compose-textarea').summernote()

  })
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