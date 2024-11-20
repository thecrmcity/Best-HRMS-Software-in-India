<?php

$pagename = basename(__DIR__);

$fullPage = ucwords($pagename);

$siteaim = basename($_SERVER['SCRIPT_FILENAME'],'.php');

$sitename = str_replace('-', ' ', $siteaim);

$bsurl = dirname(dirname(__DIR__));

include_once $bsurl.'/inc/header.php';

include_once $bsurl.'/inc/sidebar.php';

$define = new Predefine();

$define->shiftCreation();

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

          <div class="col-lg-12 col-md-12">

            <div class="card rounded-0">

              <div class="card-body">

                <?php

                  if(isset($_GET['shift']))

                  {

                    $id = $_GET['shift'];

                    $table = "in_companyshift";

                    $cond = " `in_sno`='$id' ";

                    $select = new Selectall();

                    $shifs = $select->getcondData($table,$cond);

                    if($shifs != "")

                    {

                      $comid = $shifs['in_company'];



                      $table = "in_master_card";

                      $cond = " `in_sno`='$comid'";

                      $select = new Selectall();

                      $comnam = $select->getcondData($table,$cond);

                      $coms = $comnam['in_prefix'];

                      $cotid = $comnam['in_sno'];



                      $shname = $shifs['in_shiftname'];

                      $intime = $shifs['in_intime'];

                      $outime = $shifs['in_outime'];

                      $check = $shifs['in_status'];

                      $lunch = $shifs['in_lunch'];

                      $break = $shifs['in_break'];

                    }

                    $act = "editshift&id=".$id;



                  }

                  else

                  {

                    $act = "createshift";

                    $coms = "--Select--";

                  }

                ?>

                <form class="" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=<?php echo $act;?>">

                  <table class="table-light">

                    <tr>

                      <td>

                        <div class="form-group row mb-3">

                          <label class="col-sm-4 col-form-label">Shift Name*</label>

                          <div class="input-group col-sm-8">

                            <div class="input-group-prepend">

                              <span class="input-group-text rounded-0"><input type="checkbox" name="shiftcheck" value="1" <?php echo $check == "1" ? "checked":"";?>></span>

                            </div>

                            <input type="text" class="form-control rounded-0" placeholder="Shift Name" name="shiftname" required value="<?php echo $shname;?>">

                          </div>

                        </div>

                      </td>

                      <td>

                        <div class="form-group row mb-3">

                          <label class="col-sm-4 col-form-label">In Time*</label>

                          <div class="input-group col-sm-8">

                            <div class="input-group-prepend">

                              <span class="input-group-text rounded-0"><i class="fas fa-clock"></i></span>

                            </div>

                            <input type="time" class="form-control rounded-0" name="intime" required value="<?php echo $intime;?>">

                          </div>

                        </div>

                      </td>

                      <td>

                        <div class="form-group row mb-3">

                          <label class="col-sm-4 col-form-label">Out Time*</label>

                          <div class="input-group col-sm-8">

                            <div class="input-group-prepend">

                              <span class="input-group-text rounded-0"><input type="checkbox" name="nextday" value="1"><small> &nbsp;Next Day?</small></span>

                            </div>

                            <input type="time" class="form-control rounded-0" name="outtime" required value="<?php echo $outime;?>">

                          </div>

                        </div>

                      </td>

                    </tr>

                    <tr>

                      <td>

                        <div class="form-group row mb-3">

                          <label class="col-sm-4 col-form-label">Lunch</label>

                          <div class="input-group col-sm-8">

                            <div class="input-group-prepend">

                              <span class="input-group-text rounded-0"><i class="fas fa-pizza-slice"></i></span>

                            </div>

                            <input type="number" class="form-control rounded-0" name="lunch" placeholder="in mintus" value="<?php echo $lunch;?>">

                          </div>

                        </div>

                      </td>

                      

                      <td>

                        <div class="form-group row mb-3">

                          <label class="col-sm-4 col-form-label">Break</label>

                          <div class="input-group col-sm-8">

                            <div class="input-group-prepend">

                              <span class="input-group-text rounded-0"><i class="fas fa-coffee"></i></span>

                            </div>

                            <input type="number" class="form-control rounded-0" name="break" placeholder="in mintus" value="<?php echo $break;?>">

                          </div>

                        </div>

                      </td>

                      <td>

                        <div class="form-group row mb-3">

                          <label class="col-sm-4 col-form-label">Company*</label>

                          <div class="input-group col-sm-8">

                            <select class="form-control rounded-0" name="comname">

                            <option value="<?php echo $cotid;?>"><?php echo $coms;?></option>

                            <?php

                            $table = "in_master_card";

                            $cond = " `in_relation`='company'";

                            $select = new Selectall();

                            $com = $select->getallCond($table,$cond);

                              if($com != "") 

                              {

                                foreach($com as $cm)

                                { 

                                ?>

                                <option value="<?php echo $cm['in_sno'];?>"><?php echo $cm['in_prefix'];?></option>

                                

                                <?php

                              }

                            }

                          ?>

                            

                          </select>

                          </div>

                        </div>

                      </td>



                    </tr>

                    <tr><td colspan="3">

                      <div class="clearfix">

                        <input type="submit" name="saveshift" class="btn btn-primary float-right" value="Save">

                      </div>

                    </td></tr>

                  </table>

                  

                </form>

              </div>

            </div>

          </div>

          <div class="col-lg-12 col-md-12">

            <div class="table-responsive">

              <table class="table table-bordered table-striped">

                <thead class="bg-secondary">

                  <th>No</th>

                  <th>For Company</th>

                  <th>Sift Name</th>

                  <th>In Time</th>

                  <th>Out Time</th>

                  <th>Total Time</th>

                  <th>Lunch</th>

                  <th>Break</th>

                  <th>Status</th>

                  <th>Action</th>

                </thead>

                <tbody>

                  <?php

                  $table = "in_companyshift";

                  $select = new Selectall();

                  $shift = $select->onlyAll($table);

                  if(!empty($shift))

                  {

                    $xl =1;

                    foreach($shift as $sh)

                    {

                      $comid = $sh['in_company'];

                      $table = "in_master_card";

                      $cond = " `in_sno`='$comid'";

                      $select = new Selectall();

                      $comnam = $select->getcondData($table,$cond);

                      ?>

                      <tr>

                        <td><?php echo $xl;?></td>

                        <td><?php echo $comnam['in_prefix'];?></td>

                        <td><?php echo $sh['in_shiftname']?></td>

                        <td><?php echo $sh['in_intime']?></td>

                        <td><?php echo $sh['in_outime']?></td>

                        <td><?php echo $sh['in_hours'];?></td>

                        <td><?php echo $sh['in_lunch']?></td>

                        

                        <td><?php echo $sh['in_break']?></td>

                        <td><?php $status = $sh['in_status']; echo $status == "1" ? "Active" : "Inactive";?></td>

                        <td><a href="?shift=<?php echo $sh['in_sno'];?>" class="text-success mr-3"><i class="fas fa-edit"></i></a><a href="<?php echo BSURL;?>functions/setting.php?case=delshift&id=<?php echo $sh['in_sno'];?>" onclick="return confirm('Are you Sure!')" class="text-danger"><i class="fas fa-trash"></i></a></td>

                      </tr>

                      <?php

                      $xl++;

                    }

                  }

                  else

                  {

                    ?>

                    <tr>

                      <td colspan="10" class="text-center">No Data</td>

                    </tr>

                    <?php

                  }

                  ?>

                </tbody>

              </table>

            </div>

          </div>



        </div>

        

        <!-- /.row -->

        

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

  </script>

 <?php

include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/footer.php';

?>