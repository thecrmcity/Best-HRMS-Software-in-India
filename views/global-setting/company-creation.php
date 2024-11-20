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

                

        <div class="card rounded-0">

          <div class="card-body">

            <div class="row">

              <div class="col-sm-6 col-lg-6">

               

              <div class="bg-light p-2 border">

              <?php

                if(isset($_GET['comit']))

                {

                  $id = $_GET['comit'];

                  $table = "in_master_card";

                  $cond = " `in_sno`='$id'";

                  $select = new Selectall();

                  $pre = $select->getcondData($table,$cond);

                  if($pre != "")

                  {

                    $company = $pre['in_prefix'];

                    $comavt = $pre['in_status'];

                    $act = "editcompany&id=".$id;

                  }

                  

                }

                else

                {

                  $act = "company";

                  $company = "";

                  $comavt = "";

                }

                

                

              ?>

              <form class="" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=<?php echo $act;?>">

                <div class="form-group">

                  <label>Create Company</label>



                  <div class="input-group mb-3">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><input type="checkbox" name="comactive" value="1" <?php echo $comavt == "1" ? "checked":"";?>></span>

                    </div>

                  <input type="text" class="form-control" name="company" placeholder="Name of Company" required value="<?php echo $company;?>">

                  <div class="input-group-append">

                    <button type="submit" class="input-group-text">Go</button>

                  </div>

                </div>

               

                </div>

              </form>

              <table class="table table-bordered table-striped">

                <tr class="bg-primary">

                  <td>ID</td>

                  <td>Name</td>

                  <td>Status</td>

                  <td class="text-center"><span class="fas fa-edit"></span></td>

                  <td class="text-center"><span class="fas fa-trash"></span></td>



                </tr>

                <?php

                $comgrp = array();

                $table = "in_master_card";

                $cond = " `in_relation`='company'";

                $select = new Selectall();

                $com = $select->getallCond($table,$cond);

                  if($com != "") 

                  {

                    foreach($com as $cm)

                    { 

                     

                    ?>

                    <tr>

                      <td><?php echo $cm['in_sno'];?></td>

                      <td><?php echo $cm['in_prefix'];?></td>

                      <td><?php $status = $cm['in_status']; echo $status == "1" ? "Active": "Inactive";?></td>

                      <td class="text-center"><a href="?comit=<?php echo $cm['in_sno'];?>" class="text-success"><i class="fas fa-edit"></i></a></td>

                      <td class="text-center"><a href="<?php echo BSURL;?>functions/setting.php?case=delcom&id=<?php echo $cm['in_sno'];?>" class="text-danger" onclick="return confirm('Are you Sure!')"><i class="fas fa-trash"></i></a></td>

                    </tr>

                    <?php

                    }

                  }

                  else

                  {

                    ?>

                    <tr>

                      <td colspan="4" class="text-center">No Data</td>

                      <tr>

                    <?php

                  }

                ?>

              </table>

            </div>

                

              



              



              </div>

              <div class="col-sm-6 col-log-6">

                <?php

                if(isset($_GET['prit']))

                {

                  $id = $_GET['prit'];

                  $table = "in_master_card";

                  $cond = " `in_sno`='$id'";

                  $select = new Selectall();

                  $com = $select->getcondData($table,$cond);

                 

                  if($com != "")

                  {

                    $mng = $com['in_prefix'];

                    $cop = $com['in_parent'];



                    $table = "in_master_card";

                    $cond = " `in_sno`='$cop'";

                    $select = new Selectall();

                    $cod = $select->getcondData($table,$cond);

                    $cods = $cod['in_prefix'];

                    $preavt = $cod['in_status'];



                  }

                  

                  $act = "predit&id=".$id;



                }

                else

                {

                  $act = "prefix";

                  $mng = "";

                  $cods = "--Select--";

                  $preavt = "";

                }

                

              ?>

              <div class="bg-light p-2 border">

                <form class="" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=<?php echo $act;?>">

                <div class="form-group">

                  <label>Employee Card Prefix</label>

                  <div class="input-group mb-3">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><input type="checkbox" name="preavt" value="1" <?php echo $preavt == "1" ? "checked":"";?>></span>

                    </div>

                  <input type="text" class="form-control rounded-0" name="prefix" required value="<?php echo $mng;?>" placeholder="Card Prefix">

                  

                </div>

                <div class="input-group mb-3">

                    <select class="form-control rounded-0" name="comname">

                      <option value="<?php echo $cod['in_sno'];?>"><?php echo $cods;?></option>

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

                  

                  <div class="input-group-append">

                    <button type="submit" class="input-group-text">Go</button>

                  </div>

                </div>

                </div>

              </form>

              <table class="table table-bordered table-striped">

                <tr class="bg-primary">

                  <td>ID</td>

                  <td>Company</td>

                  <td>Prefix</td>

                  <td>Status</td>

                  <td class="text-center"><span class="fas fa-edit"></span></td>

                  <td class="text-center"><span class="fas fa-trash"></span></td>



                </tr>

                <?php

                $table = "in_master_card";

                $cond = " `in_relation`='cardPrefix'";

                $select = new Selectall();

                $precom = $select->getallCond($table,$cond);

                  if($precom != "") 

                  {

                    foreach($precom as $pc)

                    { 

                      $comid = $pc['in_parent'];

                      $table = "in_master_card";

                      $cond = " `in_sno`='$comid'";

                      $select = new Selectall();

                      $comnam = $select->getcondData($table,$cond);

                    ?>

                    <tr>

                      <td><?php echo $pc['in_sno'];?></td>

                      <td><?php echo $comnam['in_prefix'];?></td>

                      <td><?php echo $pc['in_prefix'];?></td>

                      <td><?php $status = $pc['in_status']; echo $status == "1" ? "Active": "Inactive";?></td>

                      <td class="text-center"><a href="?prit=<?php echo $pc['in_sno'];?>" class="text-success"><i class="fas fa-edit"></i></a></td>

                      <td class="text-center"><a href="<?php echo BSURL;?>functions/setting.php?case=delpre&id=<?php echo $pc['in_sno'];?>" class="text-danger" onclick="return confirm('Are you Sure!')"><i class="fas fa-trash"></i></a></td>

                    </tr>

                    <?php

                    }

                  }

                  else

                  {

                    ?>

                    <tr>

                      <td colspan="4" class="text-center">No Data</td>

                      <tr>

                    <?php

                  }

                ?>

              </table>

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