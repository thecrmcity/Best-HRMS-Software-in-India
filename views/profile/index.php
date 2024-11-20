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

      

        $id = $empid;

        $table = "in_employee";

        $cond = " `in_empid`='$id' ";

        $select = new Selectall();

        $res = $select->getcondData($table,$cond);

        if($res != "")
        {
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

        $table = "in_employee";

        $cond = " `in_empid`='$mng' ";

        $select = new Selectall();

        $mnge = $select->getcondData($table,$cond);



        $cat = $res['in_childid'];

        $table = "in_master_card";

        $cond = " `in_sno`='$cat' ";

        $select = new Selectall();

        $cats = $select->getcondData($table,$cond);



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





        $table = "in_master_card";

        $cond = " `in_relation`='cardPrefix'";

        $select = new Selectall();

        $pres = $select->getcondData($table,$cond);

        $prefix = $pres['in_prefix'];



        $joindate = $res['in_dateofjoining'];

        $probation = $res['in_probation'];

        $date1= date_create($joindate);

        $date2= date_create($cdate);

        $diff=date_diff($date1,$date2);

        $diffday = $diff->format("%a%");
        }

        


    ?>

    <!-- Main content -->

    <section class="content">

      <div class="container-fluid">

        <!-- Small boxes (Stat box) -->

        <div class="row">

          <div class="col-md-3">

            <!-- Profile Image -->



            <div class="card card-primary card-outline rounded-0">

              <?php

              $siteday = $probation-$diffday;

              if($siteday > 0)

              {

                ?>

                <div class="card-remain">

                <span class="ml-2">Left Days: <?php echo $siteday;?></span>

              </div>

              <div class="card-badges">

              <span class="text-warning" title="Probation Period"><i class="fas fa-bookmark"></i></span>

            </div>

                <?php

              }

              else

              {

                ?>

                <div class="card-remain">

                <span class="ml-2">Permanant</span>

              </div>

              <div class="card-badges">

              <span class="text-success" title="Probation Period"><i class="fas fa-bookmark"></i></span>

            </div>

                <?php

              }

              ?>

              <div class="card-body box-profile">

                

                <div class="text-center">

                  <?php

                  $proimage = $res['in_photo'];

                  if($proimage != "")

                  {

                    ?>

                    <img class="profile-user-img img-fluid img-circle"

                       src="<?php echo BSURL;?>uploads/employee/<?php echo $proimage;?>"

                       alt="User profile picture">

                    <?php

                  }

                  else

                  {

                    ?>

                    <img class="profile-user-img img-fluid img-circle"

                       src="<?php echo BSURL;?>assets/dist/img/user2-160x160.jpg"

                       alt="User profile picture">

                    <?php

                  }



                  ?>

                  

                </div>



                <h3 class="profile-username text-center"><?php echo $res['in_fname']." ".$res['in_lname'];?></h3>



                <p class="text-muted text-center"><?php echo $desi['in_prefix'];?></p>



                <ul class="list-group list-group-unbordered mb-3">

                  <li class="list-group-item">

                    <b>Employee ID</b> <a class="float-right"><?php echo $prefix.$res['in_empid'];?></a>

                  </li>

                  <li class="list-group-item">

                    <b>JoiningDate</b> <a class="float-right"><?php echo date('d-m-Y', strtotime($res['in_dateofjoining']));?></a>

                  </li>

                  <li class="list-group-item">

                    <b>Birthday</b> <a class="float-right"><?php echo date('d-m-Y', strtotime($res['in_dateofbirth']));?></a>

                  </li>

                </ul>



                <a href="<?php echo VIEW?>profile/edit-profile.php" class="btn btn-primary btn-block"><b> Edit Profile <i class="fas fa-edit"></i></b></a>

              </div>

              <!-- /.card-body -->

            </div>

          </div>

          <div class="col-md-9">

            <div class="card">

              <div class="card-header p-2">
                

                <ul class="nav nav-pills">
                <?php
                $table = "in_controller";
                $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='basicInfotab' AND `in_action`='1' ";
                $select = new Selectall();
                $basicInfotab = $select->getcondData($table,$cond);
                if($basicInfotab != "")
                {
                  ?>
                  <li class="nav-item"><a class="nav-link active" href="#basicinfo" data-toggle="tab">Basic Information</a></li>
                  <?php
                }
                
                
                $table = "in_controller";
                $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='payrollTabs' AND `in_action`='1' ";
                $select = new Selectall();
                $payrollTabs = $select->getcondData($table,$cond);
                if($payrollTabs != "")
                {
                  ?>
                  <li class="nav-item"><a class="nav-link" href="#payrolldetails" data-toggle="tab">Payroll Details</a></li>
                  <?php
                }

                $table = "in_controller";
                $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='bankDetailtab' AND `in_action`='1' ";
                $select = new Selectall();
                $bankDetailtab = $select->getcondData($table,$cond);
                if($bankDetailtab != "")
                {
                  ?>
                  <li class="nav-item"><a class="nav-link" href="#bankdetails" data-toggle="tab">Bank Details</a></li>
                  <?php
                }

                $table = "in_controller";
                $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='educationTabs' AND `in_action`='1' ";
                $select = new Selectall();
                $educationTabs = $select->getcondData($table,$cond);
                if($educationTabs != "")
                {
                  ?>
                  <li class="nav-item"><a class="nav-link" href="#education" data-toggle="tab">Education</a></li>
                  <?php
                }

                $table = "in_controller";
                $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='professionalTabs' AND `in_action`='1' ";
                $select = new Selectall();
                $professionalTabs = $select->getcondData($table,$cond);
                if($professionalTabs != "")
                {
                  ?>
                  <li class="nav-item"><a class="nav-link" href="#professional" data-toggle="tab">Professional</a></li>
                  <?php
                }
                
                
                ?>
                

                  

                  <li class="nav-item dropdown"><a class="nav-link" href="" data-toggle="dropdown">More</a>

                    <div class="dropdown-menu dropdown-menu-right">

                      
                      <?php
                      $table = "in_controller";
                      $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='salaryTabs' AND `in_action`='1' ";
                      $select = new Selectall();
                      $salaryTabs = $select->getcondData($table,$cond);
                      if($salaryTabs != "")
                      {
                        ?>
                        <a href="#salarystructure" class="dropdown-item" data-toggle="tab">Salary Structure</a>

                        <div class="dropdown-divider"></div>
                        <?php
                      }

                      $table = "in_controller";
                      $cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='taxationTabs' AND `in_action`='1' ";
                      $select = new Selectall();
                      $taxationTabs = $select->getcondData($table,$cond);
                      if($taxationTabs != "")
                      {
                        ?>
                        <a href="#salarytaxation" class="dropdown-item" data-toggle="tab">Salary Taxation</a>

                        <div class="dropdown-divider"></div>
                        <?php
                      }
                      ?>
                      

                      

                    </div>



                  </li>

                </ul>

              </div><!-- /.card-header -->

                

              <div class="card-body">

                <div class="tab-content">
                <?php
                if($basicInfotab != "")
                {
                ?>

                  <div class="active tab-pane" id="basicinfo">

                    <table style="width: 100%;" cellspacing="5" cellpadding="5" class="table-striped">

                      <tr>

                        <th>Father Name</th>

                        <td><?php echo $res['in_fathernam'];?></td>

                        <th>Gender</th>

                        <td><?php echo $res['in_gender'];?></td>



                      </tr>

                      <tr>

                        <th>Department</th>

                        <td><?php echo $depart['in_prefix'];?></td>

                        <th>Reporting</th>

                        <td><?php echo $mnge['in_fname']." ".$mnge['in_lname'];?></td>



                      </tr>

                      <tr>

                        <th>Company Email</th>

                        <td><?php echo $res['in_email'];?></td>

                        <th>Role</th>

                        <td><?php echo $role['in_cardname'];?></td>



                      </tr>

                      

                      <tr>

                        <th>Mobile No</th>

                        <td><?php echo $res['in_mobileno'];?></td>

                        <th>Category</th>

                        <td><?php echo $cats['in_prefix'] != "" ? $cats['in_prefix'] : "";?></td>

                      </tr>

                      <tr>

                        <th colspan="2" class="text-info">Local Address</th>

                        <th colspan="2" class="text-info">Permanent Address</th>

                      </tr>

                      <tr>

                        <th>Address 1</th>

                        <td><?php echo $res['in_localadd1'];?></td>

                        <th>Address 1</th>

                        <td><?php echo $res['in_parmaadd1'];?></td>

                      </tr>

                      <tr>

                        <th>Address 2</th>

                        <td><?php echo $res['in_localadd2'];?></td>

                        <th>Address 2</th>

                        <td><?php echo $res['in_permaadd2'];?></td>

                      </tr>

                      <tr>

                        <?php

                          $lcet = $res['in_localcity'];

                          $table = "in_worldcity";

                          $cond = " `in_sno`='$lcet'";

                          $select = new Selectall();

                          $lcity = $select->getcondData($table,$cond);

                          if($lcity != "")

                          {

                            $citynam = $lcity['in_cityname'];

                          }

                          else

                          {

                            $citynam = "";

                          }



                          $pcet = $res['in_parmacity'];

                          $table = "in_worldcity";

                          $cond = " `in_sno`='$pcet'";

                          $select = new Selectall();

                          $pcity = $select->getcondData($table,$cond);

                          if($pcity != "")

                          {

                            $pcityna = $pcity['in_cityname'];

                          }

                          else

                          {

                            $pcityna = "";

                          }

                        ?>

                        <th>City</th>

                        <td><?php echo $citynam;?></td>

                        <th>City</th>

                        <td><?php echo $pcityna;?></td>

                      </tr>



                      <tr>

                        <?php

                          $lset = $res['in_localstate'];

                          $table = "in_worldcity";

                          $cond = " `in_sno`='$lset'";

                          $select = new Selectall();

                          $lsity = $select->getcondData($table,$cond);

                          if($lsity != "")

                          {

                            $statnam = $lsity['in_statename'];

                          }

                          else

                          {

                            $statnam = "";

                          }



                          $pset = $res['in_permastate'];

                          $table = "in_worldcity";

                          $cond = " `in_sno`='$pset'";

                          $select = new Selectall();

                          $psity = $select->getcondData($table,$cond);



                          if($psity != "")

                          {

                            $pstatenam = $psity['in_statename'];

                          }

                          else

                          {

                            $pstatenam = "";

                          }

                        ?>

                        <th>State</th>

                        <td><?php echo $statnam;?></td>

                        <th>State</th>

                        <td><?php echo $pstatenam;?></td>

                      </tr>

                      <tr>

                        <?php

                          $lset = $res['in_localconty'];

                          $table = "in_worldcity";

                          $cond = " `in_sno`='$lset'";

                          $select = new Selectall();

                          $lsity = $select->getcondData($table,$cond);



                          if($lsity != "")

                          {

                            $lcountry = $lsity['in_country'];

                            $lcountrycode = $res['in_localpostal'];

                          }

                          else

                          {

                            $lcountry = "";

                            $lcountrycode = "";

                          }

                          $pset = $res['in_permaconty'];

                          $table = "in_worldcity";

                          $cond = " `in_sno`='$pset'";

                          $select = new Selectall();

                          $psity = $select->getcondData($table,$cond);

                          if($psity != "")

                          {

                            $pcountry = $psity['in_country'];

                            $pcountrycode = $res['in_permapostal'];

                          }

                          else

                          {

                            $pcountry = "";

                            $pcountrycode = "";

                          }

                        ?>

                        <th>Country</th>

                        <td><?php echo $lcountry;?> (<?php echo $lcountrycode;?>)</td>

                        <th>Country</th>

                        <td><?php echo $pcountry;?> (<?php echo $pcountrycode;?>)</td>

                      </tr>
                        <tr>
                          <td colspan="4" class="text-maroon font-weight-bold">Employee Status Information</td>
                        </tr>
                        <tr>
                          <th>Work Nature</th>
                          <td>
                            <?php
                            $siteday = $probation-$diffday;
                            if($siteday > 0)
                            {
                              echo "Probation Period";
                            }
                            else
                            {
                              echo "Permanant";
                            }
                            ?>
                          </td>
                          <th>Employee Status</th>
                          <td>
                            <?php
                            $status = $res['in_delete'];
                            switch($status)
                            {
                              case "1":
                              echo "<span class='badge badge-success'>Active Employee</span>";
                              break;
                              case "0":
                              echo "<span class='badge badge-danger'>Inactive Employee</span>";
                              break;
                            }
                            ?>
                          </td>
                          </tr>
                          <?php
                          $status = $res['in_delete'];
                            if($status != "1")
                            {
                              ?>
                              <tr>
                              <th>Incative Date</th>
                              <td><?php echo $res['in_inactivedate'];?></td>
                              <th>Any Comment</th>
                              <td><?php echo $res['in_inactreason'];?></td>
                            </tr>
                            <tr>
                              <th>FNF Process</th>
                              <td><?php 
                              $fnf = $res['in_fnf'];
                              if($fnf == "1")
                              {
                                echo "<span class='badge badge-success'>Yes</span>";
                              }
                              else
                              {
                                echo "<span class='badge badge-danger'>No</span>";
                              }

                              ?></td>
                              <th>FNF Date</th>
                              <td><?php echo $res['in_fnfdate'];?></td>
                            </tr>
                              <?php
                            }
                          ?>
                        
                        <tr>
                            <td colspan="4"></td>
                          </tr>
                          <tr>
                            <td colspan="4" class="text-maroon font-weight-bold">Additional Field Information</td>
                          </tr>
                          <tr>
                            <td colspan="4"></td>
                          </tr>

                      </table>

                      <table style="width: 100%;" cellspacing="5" cellpadding="5" class="table-striped">

                      <?php

                      $table = "in_empform";

                      $cond = " `in_classname`='Basic Information' AND `in_status`='1' ";

                      $select = new Selectall();

                      $data = $select->getallCond($table,$cond);

                      if(!empty($data))

                      {

                        foreach($data as $dt)

                        {

                          $valt = $dt['in_column'];

                          ?>

                          <tr>

                            <th><?php echo $dt['in_fieldname'];?></th>

                            <td><?php echo $res[$valt];?></td>

                          </tr>

                          <?php

                        }

                      }

                      ?>

                      

                    </table>

                      

                  </div>
                  <?php
                  }
                  if($payrollTabs != "")
                  {
                  ?>

                  <div class="tab-pane" id="payrolldetails">

                    <table style="width: 100%;" cellspacing="5" cellpadding="5" class="table-striped">



                      <tr>

                        <th>PF</th>

                        <td><input type="radio" <?php $spf = $res['in_pfaccess']; echo $spf == "1" ? "checked" : "" ?>></td>

                        <th>ESI</th>

                        <td><input type="radio" <?php $sesi = $res['in_esiaccess']; echo $sesi == "1" ? "checked" : "" ?>></td>

                        <th></th>

                        <td></td>

                      </tr>



                      <tr>

                        <th>Salary</th>

                        <td><?php echo $res['in_salary'];?></td>

                        <th>Payscale</th>

                        <td><?php echo $pys['in_namescle'];?></td>

                        <th>PAN NO</th>

                        <td><?php echo $res['in_panno'];?></td>

                      </tr>

                      <tr>

                        <th>TDS</th>

                        <td><?php $tds = $res['in_tds'];if($tds == "1"){ echo "Active";}?></td>

                        <th>PF No</th>

                        <td><?php echo $res['in_pfnumber'];?></td>

                        <th>PF Effective</th>

                        <td><?php echo $res['in_pfeffective'];?></td>

                      </tr>

                      <tr>

                        <th>ESI No</th>

                        <td><?php echo $res['in_esinumber'];?></td>

                        <th>ESI Effective</th>

                        <td><?php echo $res['in_esiceffective'];?></td>

                        <th>Probation Days</th>

                        <td><?php echo $res['in_probation'];?></td>

                      </tr>

                    </table>

                  </div>
                  <?php
                  }
                  if($bankDetailtab != "")
                  {
                  ?>

                  <div class="tab-pane" id="bankdetails">

                    <table style="width: 100%;" cellspacing="5" cellpadding="5" class="table-striped">

                      <?php

                      $table = "in_empform";

                      $cond = " `in_classname`='Bank Details' AND `in_status`='1' ";

                      $select = new Selectall();

                      $data = $select->getallCond($table,$cond);

                      if(!empty($data))

                      {

                        foreach($data as $dt)

                        {

                          $valt = $dt['in_column'];

                          ?>

                          <tr>

                            <th><?php echo $dt['in_fieldname'];?></th>

                            <td><?php echo $res[$valt];?></td>

                          </tr>

                          <?php

                        }

                      }

                      ?>

                      

                    </table>

                  </div>
                  <?php
                  }
                  if($educationTabs != "")
                  {
                  ?>

                  <div class="tab-pane" id="education">

                    <table style="width: 100%;" cellspacing="5" cellpadding="5" class="table-striped">

                      <tr>

                        <th>Education Level</th>

                        <th>Board/Schooling</th>

                        <th>PassingYear</th>

                        <th>Marks/Grade</th>

                        <th>Download</th>

                      </tr>



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

                              <td><?php echo $edul[$s];?></td>

                              <td><?php echo $edubo[$s];?></td>

                              <td><?php echo $eduyr[$s];?></td>

                              <td><?php echo $edumar[$s];?></td>

                              <td><a href="<?php echo BSURL?>uploads/certificate/<?php echo $eduatt[$s];?>" download class="badge badge-success"><i class="fas fa-download"></i> Download</a></td>

                            </tr>

                            <?php

                          }

                          

                          

                        }

                      ?>

                      

                    </table>

                  </div>
                  <?php
                  }
                  if($professionalTabs != "")
                  {
                  ?>

                  <div class="tab-pane" id="professional">

                    <table style="width: 100%;" cellspacing="5" cellpadding="5" class="table-striped">

                      <tr>

                        <th>Employer</th>

                        <th>LastPosition</th>

                        <th>From</th>

                        <th>To</th>

                        <th>Download</th>

                      </tr>



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

                              <td><?php echo $edul[$s];?></td>

                              <td><?php echo $edubo[$s];?></td>

                              <td><?php echo $eduyr[$s];?></td>

                              <td><?php echo $edumar[$s];?></td>

                              <td><a href="<?php echo BSURL?>uploads/certificate/<?php echo $eduatt[$s];?>" download class="badge badge-success"><i class="fas fa-download"></i> Download</a></td>

                            </tr>

                            <?php

                          }

                          

                          

                        }

                      ?>

                      

                    </table>

                  </div>
                  <?php
                  }
                  if($salaryTabs != "")
                  {
                  ?>

                  <div class="tab-pane" id="salarystructure">

                    <div class="card-header">

                      <div class="card-title font-weight-bold text-info"><i class="fas fa-donate"></i> Salary Structure</div>

                    </div>

                    

                    <table style="width: 100%;" cellspacing="5" cellpadding="5" class="table-striped">

                      <tr class="bg-secondary">

                        <th>Componantes</th>

                        <th>Amount</th>

                      </tr>

                      <?php

                        $table = "in_salarysetup";

                        $cond = " `in_comid`='$comid' AND `in_payscale`='$pay' AND `in_status`='1' ";

                        $select = new Selectall();

                        $salary = $select->getallCond($table,$cond);

                        if(!empty($salary))

                        {

                          $pfarray = array();

                          $esiarry = array();

                          $net = $res['in_salary'];

                          foreach($salary as $sal)

                          {

                            $compoid = $sal['in_compoid'];

                            $table = "in_payscale";

                            $cond = " `in_sno`='$compoid' ";

                            $select = new Selectall();

                            $cmname = $select->getcondData($table,$cond);

                            if($cmname != "")

                            {

                              $comname = $cmname['in_namescle'];

                              $comcat = $cmname['in_category'];

                            }

                            else

                            {

                              $comname = "";

                              $comcat = "";



                            }



                            $flat = $sal['in_flatamount'];

                            $parc = $sal['in_percentage'];

                            $esi = $sal['in_esi'];

                            $pef = $sal['in_pf'];

                            if($flat != "")

                            {

                              $basval = ($net-$flat);

                            }

                            else

                            {

                              $basval = ($net*($parc/100));

                            }

                          ?>

                          <tr>

                            <th><?php echo $comname;?> <small class="font-weight-normal" >(<?php echo ucwords($comcat);?>)</small></th>

                            <td><?php echo $basval;?></td>

                            

                          </tr>

                              <?php

                              



                              $plary = $sal['in_pf'];

                              if($plary == "1")

                              {

                                $pfarray[] = $basval;

                                 

                              }

                              $elary = $sal['in_esi'];

                              if($elary == "1")

                              {

                                $esiarry[] = $basval;

                              }



                          }

                          $table = "in_ratesetup";

                          $cond = " `in_comid`='$comid' ";

                          $select = new Selectall();

                          $rate = $select->getcondData($table,$cond);

                          $spf = $res['in_pfaccess'];

                          $setpf = "00";
                          

                          if($spf == "1")
                          {

                            $pfval = array_sum($pfarray);

                            if($rate != "")

                            {

                              $pfcut = $rate['in_epfcutoff'];

                              $pfrate = $rate['in_epfvalue'];

                              if($pfval > $pfcut)

                              {

                                $setpf = "1800";

                              }

                              else

                              {

                                $setpf = ($pfval*($pfrate/100));

                              }



                              

                            }



                          }

                          $sesi = $res['in_esiaccess'];
                          

                          if($sesi == "1");

                          {
                            $esival = array_sum($esiarry);
                            

                            if($rate != "")

                            {

                              $esicut = $rate['in_esicutoff'];

                              $esrate = $rate['in_esivalue'];

                              if($esival < $esicut)

                              {

                                $setesi = "00";

                              }

                              else

                              {

                                $setesi = ($esival*($esrate/100));

                              }

                            }

                          }

                          ?>

                          <tr>

                            <th>Employees Provident Fund</th>

                            <td><?php echo $setpf;?></td>

                          </tr><tr>

                            <th>Employees State Insurance</th>

                            <td><?php echo $setesi;?></td>

                          </tr>
                          

                          <?php



                        }

                      ?>

                      

                      

                      

                    </table>

                  </div>

                  <?php
                  }
                  if($taxationTabs != "")
                  {
                  ?>

                  <div class="tab-pane" id="salarytaxation">

                    <div class="row">
              <div class="col-lg-7 col-md-7">
                <form class="" method="GET" action="" enctype="multipart/form-data">
                  <div class="form-group row">
                          
                          
                          
                          
                          <label class="col-sm-7 col-form-label">Assessment Year*</label>
                          <div class="input-group col-sm-5">
                            <div class="input-group-prepend">
                              <span class="input-group-text rounded-0 bg-success"><i class="far fa-calendar-alt"></i></span>
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
                          <label class="col-sm-7 col-form-label">Tax Payer*</label>
                          <div class="input-group col-sm-5">
                            
                            <select class="form-control rounded-0" name="payer" required>
                              <option value="">--Select--</option>
                              <option value="Individual">Individual</option>
                              

                            </select>
                          </div>
                        </div>
                        <!-- <div class="form-group row">
                          <label class="col-sm-7 col-form-label">Male / Female / Senior Citizen*</label>
                          <div class="input-group col-sm-5">
                            
                            <select class="form-control rounded-0" name="gender" required>
                              <option value="">--Select--</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              
                              
                            </select>
                          </div>
                        </div> -->
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">Residential Status*</label>
                          <div class="input-group col-sm-5">
                            
                            <select class="form-control rounded-0" name="resident" required>
                              <option value="">--Select--</option>
                              <option value="Resident">Resident</option>
                              <!-- <option value="Non-Resident">Non-Resident</option> -->
                              
                              
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">Whether opting for taxation under Section 115BAC?*</label>
                          <div class="input-group col-sm-5">
                            
                            <select class="form-control rounded-0" name="payscale" required>
                              <option value="">--Select--</option>
                              <option value="OldSlab">No</option>
                              <option value="NewSlab">Yes</option>

                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">Income from Salary Previous Employer</label>
                          <div class="input-group col-sm-5">
                            <div class="input-group-prepend">
                              <span class="input-group-text rounded-0 bg-primary"><i class="fas fa-donate"></i></span>
                            </div>
                            <input type="text" name="salary" class="form-control rounded-0" required>
                          </div>
                        </div>
                        <div class="form-group row">

                          <label class="col-sm-7">Income From House Property</label>

                          <div class="input-group col-sm-5">
                            <span class="form-control rounded-0" readonly id="houseprop"></span>
                            <button type="button" onclick="resetDatabase()" class="btn btn-primary">Yes</button>
                            <button onclick="confirmNo()">No</button> 
                          </div>
                          
                        </div>
                       <div id="confirm" hidden>
                        
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">A) Interest on Housing Loan</label>
                          <div class="input-group col-sm-4">
                            
                            <input type="text" name="" class="form-control rounded-0" id="housingloan">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">B) Income from Let-out Property</label>
                          <div class="input-group col-sm-4">
                            
                            <input type="text" name="" class="form-control rounded-0" id="letout">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">C) Less: Municipal Taxes Paid During the Year</label>
                          <div class="input-group col-sm-4">
                            
                            <input type="text" name="" class="form-control rounded-0" id="mtpaid">

                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">D) Standard Deduction @ 30% of Net Annual Value</label>
                          <div class="input-group col-sm-4">
                            
                            <span class="form-control rounded-0" id="standeduct" readonly></span>

                          </div>
                        </div>
                        
    
                      </div>
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">Capital Gains</label>
                          <div class="input-group col-sm-5">
                            <div class="input-group-prepend">
                              <span class="input-group-text rounded-0"><i class="fas fa-exclamation-circle"></i></span>
                            </div>
                            <input type="text" name="" class="form-control rounded-0">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">Income From Other Sources</label>
                          <div class="input-group col-sm-5">
                            
                            <span class="form-control rounded-0" id="othersources" readonly></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">A) Saving Banks Interest</label>
                          <div class="input-group col-sm-4">
                            
                            <input type="text" name="" class="form-control rounded-0 otherincoms" id="savingbank">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">B) Other Income</label>
                          <div class="input-group col-sm-4">
                            
                            <input type="text" name="" class="form-control rounded-0 otherincoms" id="otherincom">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">Profits and Gains of Business or Profession <small>(enter profit only)</small></label>
                          <div class="input-group col-sm-5">
                            
                            <input type="text" name="" class="form-control rounded-0">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label">Agricultural Income</label>
                          <div class="input-group col-sm-5">
                            
                            <input type="text" name="" class="form-control rounded-0">
                          </div>
                        </div>
                        <div class="p-2 my-2" style="background: #b3e1fd69;">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Less: Exemption U/s 10</label>
                            <div class="input-group col-sm-5">
                              
                              <span class="form-control rounded-0 exemption" id="exemption" readonly></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-6 col-form-label">HRA</label>
                            <div class="input-group col-sm-4">
                              
                              <input type="text" name="" class="form-control rounded-0 exemption" id="exmhra">
                            </div>
                          </div>
                          
                          
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Other Exemption U/s 10</label>
                            <div class="input-group col-sm-5">
                              
                              <span class="form-control rounded-0 exemption" id="exemption" readonly></span>
                            </div>
                          </div>
                        </div>
                        <div class="p-2 my-2" style="background: #fdd9b369;">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Less: Deductions u/s 16</label>
                            <div class="input-group col-sm-5">
                              
                              <span class="form-control rounded-0" id="standardeduct" readonly></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Standard Deduction</label>
                            <div class="input-group col-sm-4">
                              
                              <input type="text" name="" class="form-control rounded-0 deductsn">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Entertainment Allowance</label>
                            <div class="input-group col-sm-4">
                              
                              <input type="text" name="" class="form-control rounded-0 deductsn" id="allowanced">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Profession Tax</label>
                            <div class="input-group col-sm-4">
                              
                              <input type="text" name="" class="form-control rounded-0 deductsn" id="profesiontax">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-7 ">DEDUCTIONS UNDER CHAPTER VI-A </label>
                          <div class="input-group col-sm-5">
                            <span class="form-control rounded-0" readonly id="chapterdeduct"></span>
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">80C (PF, PPF, insurance premium)</label>
                          <div class="input-group col-sm-4">
                            
                            <input type="number" name="" class="form-control rounded-0 deductchap" id="deduct1">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">80CCD (Employee's contribution to NPS)</label>
                          <div class="input-group col-sm-4">
                            
                            <input type="number" name="" class="form-control rounded-0 deductchap" id="deduct2">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">80CCD(1B) (Additional contribution to NPS)</label>
                          <div class="input-group col-sm-4">
                            
                            <input type="number" name="" class="form-control rounded-0 deductchap" id="deduct3">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">80D (Medical insurance premium)</label>
                          <div class="input-group col-sm-4">
                            
                            <input type="number" name="" class="form-control rounded-0 deductchap" id="deduct4">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">80E (Interest paid on education loan)</label>
                          <div class="input-group col-sm-4">
                            
                            <input type="number" name="" class="form-control rounded-0 deductchap" id="deduct5">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">80EEB (Interest paid on loan for purchase of electrical vehicle)</label>
                          <div class="input-group col-sm-4">
                            
                            <input type="number" name="" class="form-control rounded-0 deductchap" id="deduct6">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">80G (Donations to charity)</label>
                          <div class="input-group col-sm-4">
                            
                            <input type="number" name="" class="form-control rounded-0 deductchap" id="deduct7">
                          </div>
                        </div>
                        <div class="clearfix">
                          <input type="submit" name="gettax" value="Calculate" class="btn btn-primary float-right">
                        </div>
                        
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
              
            </div>

                  </div>

                  <?php
                  }
                  ?>

                  

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