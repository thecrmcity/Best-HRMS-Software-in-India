<?php

$pagename = basename(__DIR__);

$fullPage = ucwords($pagename);

$siteaim = basename($_SERVER['SCRIPT_FILENAME'],'.php');

$sitename = str_replace('-', ' ', $siteaim);

$bsurl = dirname(dirname(__DIR__));

include_once $bsurl.'/inc/header.php';

include_once $bsurl.'/inc/sidebar.php';

$define = new Predefine();

$define->masterSetup();

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

              <div class="col-sm-4 col-4">

               

               <?php

                $table = "in_master_card";

                $cond = " `in_relation` ='empLogin'";

                $select = new Selectall();

                $prec = $select->getcondData($table,$cond);

                if($prec != "")

                {

                  $once = $prec['in_status'];

                }

                else

                {

                  $once = "";

                }

                

              ?>

                <form class="bg-light p-2 border" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=once">

                <div class="form-group row">

                  <label class="col-lg-12 col-12 col-form-label">Employee Once Login</label>

                  <div class="input-group col-sm-9">

                    

                    <input type="checkbox" name="btnonce" data-bootstrap-switch value="1" data-off-color="danger" data-on-color="success" <?php echo $once == "1" ? "checked":"";?>>

                  </div>

                  <div class="input-group col-sm-3">

                    

                    <input type="submit" name="oncesave" value="Save" class="bg-secondary">

                  </div>

                </div>

              </form>



              <?php

                $table = "in_master_card";

                $cond = " `in_relation` ='outSider'";

                $select = new Selectall();

                $prec = $select->getcondData($table,$cond);

                if($prec != "")

                {

                  $outsider = $prec['in_status'];

                }

                else

                {

                  $outsider = "";

                }

                

              ?>

                <form class="bg-light p-2 border mt-3" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=outsider">

                <div class="form-group row">

                  <label class="col-lg-12 col-12 col-form-label">Restricted Outsider Login</label>

                  <div class="input-group col-sm-9">

                    

                    <input type="checkbox" name="restricted" data-bootstrap-switch value="1" data-off-color="danger" data-on-color="success" <?php echo $outsider == "1" ? "checked":"";?>>

                  </div>

                  <div class="input-group col-sm-3">

                    

                    <input type="submit" name="outsider" value="Save" class="bg-secondary">

                  </div>

                </div>

              </form>

              <?php

                $table = "in_master_card";

                $cond = " `in_relation` ='geoLocation'";

                $select = new Selectall();

                $prec = $select->getcondData($table,$cond);

                if($prec != "")

                {

                  $geolocation = $prec['in_status'];

                }

                else

                {

                  $geolocation = "";

                }

                

              ?>

                <form class="bg-light p-2 border mt-3" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=geolocation">

                <div class="form-group row">

                  <label class="col-lg-12 col-12 col-form-label">Login/Logout Location</label>

                  <div class="input-group col-sm-9">

                    

                    <input type="checkbox" name="restricted" data-bootstrap-switch value="1" data-off-color="danger" data-on-color="success" <?php echo $geolocation == "1" ? "checked":"";?>>

                  </div>

                  <div class="input-group col-sm-3">

                    

                    <input type="submit" name="outsider" value="Save" class="bg-secondary">

                  </div>

                </div>

              </form>



              <div class="card bg-light rounded-0 shadow-none border mt-3">

                <div class="card-header">

                  <div class="card-title"><i class="fas fa-chess-king"></i> SuperAdmin</div>

                </div>

                <div class="card-body">

                  <?php

                if(isset($_GET['medit']))

                {

                  $id = $_GET['medit'];

                  $table = "in_master_card";

                  $select = new Selectall();

                  $cond = " `in_sno`='$id' ";

                  $mdata = $select->getcondData($table,$cond);

                 

                  if($mdata != "")

                  {

                    $mng = $mdata['in_prefix'];

                  }

                  

                  $act = "desgiedit&id=".$id;



                }

                else

                {

                  $act = "majorgroup";

                  $mng = "";

                }

                

              ?>

              

                <form class="" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=<?php echo $act;?>">

                <div class="form-group">

                  <label>Create Major Group</label>

                  <div class="input-group mb-3">

                    

                  <input type="text" class="form-control rounded-0" name="group" required value="<?php echo $mng;?>" placeholder="Group Name">

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

                  <td class="text-center"><span class="fas fa-edit"></span></td>

                  <td class="text-center"><span class="fas fa-trash"></span></td>

                </tr>

                <?php

                $table = "in_super_card";

                $select = new Selectall();

                $cond = " `in_cardrelation`='majorcard' ";

                $group = $select->getallCond($table,$cond);

                  if($group != "") 

                  {

                    foreach($group as $mg)

                    { 

                      $sno = $mg['in_sno']; 

                    ?>

                    <tr>

                      <td><?php echo $mg['in_sno'];?></td>

                      <td><?php echo $mg['in_cardname'];?></td>

                      <td class="text-center"><a href="?medit=<?php echo $mg['in_sno'];?>" class="text-success"><i class="fas fa-edit"></i></a></td>

                      <td class="text-center">

                        <?php

                          if($sno != "1" && $sno != "2" && $sno != "3")

                          {

                            ?>

                            <a href="<?php echo BSURL;?>functions/setting.php?case=delgrp&id=<?php echo $mg['in_sno'];?>&f=<?php echo $pagename;?>&p=<?php echo $siteaim;?>" class="text-danger"><i class="fas fa-trash"></i></a>

                            <?php

                          }

                        ?>

                        

                      </td>

                    </tr>

                    <?php

                    }

                  }

                  else

                  {

                    ?>

                    <tr>

                      <td colspan="2" class="text-center">No Data</td>

                      <tr>

                    <?php

                  }

                ?>

              </table>

             

                </div>

              </div>

              </div>

              <div class="col-sm-8 col-8">

               

                

              

              <div class="card bg-light rounded-0 shadow-none border">

                <div class="card-header">

                  <div class="card-title"><i class="fas fa-satellite"></i> Computer IP</div>

                </div>

                <div class="card-body">

                  <?php

                if(isset($_GET['medit']))

                {

                  $id = $_GET['medit'];

                  $table = "in_master_card";

                  $select = new Selectall();

                  $cond = " `in_sno`='$id' ";

                  $mdata = $select->getcondData($table,$cond);

                 

                  if($mdata != "")

                  {

                    $mng = $mdata['in_prefix'];

                  }

                  

                  $act = "editip&id=".$id;



                }

                else

                {

                  $act = "mainip";

                  $mng = "";

                }

                

              ?>

              <label>Add Inhouse IPs</label>

                <form class="form-inline" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=<?php echo $act;?>">

                <div class="form-group">



                  <div class="input-group mb-3">

                    <select class="form-control rounded-0 mr-3" name="comname">

                    <option value="">--Select Company--</option>

                    <?php

                    $table = "in_master_card";

                    $cond = " `in_relation`='company' ";

                    $select = new Selectall();

                    $selDo = $select->getallCond($table,$cond);

                    if(!empty($selDo))

                    {

                      foreach($selDo as $sel)

                      {

                        ?>

                        <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_prefix'];?></option>

                        <?php

                      }

                    }



                    ?>

                  </select>



                  <input type="text" class="form-control rounded-0" name="ipaddress" required value="<?php echo $mng;?>" placeholder="IP Address">

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

                  <td>IP Address</td>

                  <td class="text-center"><span class="fas fa-edit"></span></td>

                  <td class="text-center"><span class="fas fa-trash"></span></td>

                </tr>

                <?php

                $table = "in_master_card";

                $select = new Selectall();

                $cond = " `in_relation`='ipAddress' ";

                $group = $select->getallCond($table,$cond);

                  if($group != "") 

                  {

                    foreach($group as $mg)

                    { 

                      $ip = $mg['in_parent'];

                      $table = "in_master_card";

                      $cond = " `in_sno`='$ip' ";

                      $select = new Selectall();

                      $pr = $select->getcondData($table,$cond);

                    ?>

                    <tr>

                      <td><?php echo $mg['in_sno'];?></td>

                      <td><?php echo $pr['in_prefix'];?></td>

                      <td><?php echo $mg['in_prefix'];?></td>

                      <td class="text-center"><a href="?medit=<?php echo $mg['in_sno'];?>" class="text-success"><i class="fas fa-edit"></i></a></td>

                      <td class="text-center"><a href="<?php echo BSURL;?>functions/setting.php?case=del&id=<?php echo $mg['in_sno'];?>&tbl=in_master_card" class="text-danger"><i class="fas fa-trash"></i></a></td>

                    </tr>

                    <?php

                    }

                  }

                  else

                  {

                    ?>

                    <tr>

                      <td colspan="2" class="text-center">No Data</td>

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