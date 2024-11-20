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

          <div class="col-lg-6">

            <?php

              if(isset($_GET['eedit']))

              {

                $id = $_GET['eedit'];

                $table = "in_modular";

                $cond = " in_sno='$id' ";

                $select = new Selectall();

                $mdata = $select->getcondData($table,$cond);

               

                if($mdata != "")

                {

                  $mng = $mdata['in_modular'];

                  $icon = $mdata['in_modicon'];

                  $ord = $mdata['in_orderid'];

                  $ast = $mdata['in_status'];

                }

                

                $act = "editmod&id=".$id."&p=".$siteaim;



              }

              else

              {

                $act = "addmod";

                $mng = "";

                $icon = "";

                $ord = "";

                $ast = "";

              }

              

            ?>

            <div class="empinfo mb-3">

              <h4>Main Module</h4>

              <hr>

              <form class="" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=<?php echo $act;?>">

              <div class="form-group row">

                <label class="col-sm-3 col-form-label">Name*</label>

                <div class="input-group col-sm-9">

                  <div class="input-group-prepend">

                    <span class="input-group-text rounded-0"><i class="fas fa-cogs"></i></span>

                  </div>

                  <input type="text" class="form-control rounded-0" placeholder="Module Name" name="sfield" required value="<?php echo $mng;?>">

                  <input type="text" class="form-control rounded-0" placeholder="Module Icon" name="sicon" required value="<?php echo $icon;?>">

                </div>

              </div>

              

               <div class="form-group row">

                <div class="col-sm-3"></div>

                <div class="input-group col-sm-6">

                  <div class="input-group-prepend">

                    <span class="input-group-text rounded-0"><input type="checkbox" name="active" value="1" <?php echo $ast == "1" ? "checked" : ""; ?>></span>

                  </div>

                  <input type="tel" class="form-control rounded-0" name="order" placeholder="Menu Order" required value="<?php echo $ord;?>">

                </div>

                <div class="col-sm-3"><input type="submit" name="savescale" value="Save" class="btn btn-primary btn btn-block"></div>

                

              </div>

              </form>

            </div>

            <div class="empinfo mb-3">

              <table class="table table-bordered table-striped">

                <thead>

                  <th>Sr. No.</th>

                  <th>Name</th>

                  <th>Icon</th>

                  <th>Status</th>

                  <th>Action</th>

                </thead>

                <tbody>

                  <?php

                  $xl = 1;

                    $table = "in_modular";

                    $cond = " `in_relate`='parent' ";

                    $select = new Selectall();

                    $selData = $select->getallCond($table,$cond);

                    if($selData != "") 

                    {

                      foreach($selData as $sel)

                      {

                      ?>

                      <tr>

                      

                      <td><?php echo $sel['in_orderid'];?></td>

                      <td><?php echo $sel['in_modular'];?></td>

                      <td><i class="<?php echo $sel['in_modicon'];?>"></i></td>



                      <td><?php $axs = $sel['in_status']; if($axs == "1"){ echo "Active";}else{ echo "Inactive";} ?></td>

                      <td><a href="?eedit=<?php echo $sel['in_sno'];?>" class="text-success"><i class="fas fa-edit"></i></a></td>

                    </tr>

                      <?php

                      $xl++;

                      }

                      

                    }

                    ?>

                </tbody>

              </table>

            </div>

          </div>

          <div class="col-lg-6">

            <?php

              if(isset($_GET['kedit']))

              {

                $id = $_GET['kedit'];

                $table = "in_modular";

                $cond = " in_sno='$id' ";

                $select = new Selectall();

                $mdata = $select->getcondData($table,$cond);

               

                if($mdata != "")

                {

                  $mng = $mdata['in_modular'];

                  $ord = $mdata['in_orderid'];

                  $acs = $mdata['in_access'];

                  $est = $mdata['in_status'];

                  $acst = explode(",",$acs);

                  $mnid = $mdata['in_mainid'];

                  $table = "in_modular";

                  $cond = " `in_sno`='$mnid' ";

                  $select = new Selectall();

                  $celData = $select->getcondData($table,$cond);

                  $selDo = $celData['in_modular'];

                  





                }

                

                $act = "editsubmod&id=".$id."&p=".$siteaim;



              }

              else

              {

                $act = "addsubmod";

                $mng = "";

                $ord = "";

                $est = "";

                $mnid = "";

                $selDo = "--Select--";

              }

              

            ?>

            <div class="empinfo mb-3">

              <h4>Sub Module</h4>

              <hr>

              <form class="" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=<?php echo $act;?>">

              <div class="form-group row">

                <label class="col-sm-3 col-form-label">Name*</label>

                <div class="input-group col-sm-9">

                  <div class="input-group-prepend">

                    <span class="input-group-text rounded-0"><i class="fas fa-cogs"></i></span>

                  </div>

                  <input type="text" class="form-control rounded-0" placeholder="Sub Module Name" name="sfield" required value="<?php echo $mng;?>">

                  <select class="form-control rounded-0" name="mainmod" required>

                    <?php

                      $table = "in_modular";

                      $cond = " in_relate='parent' ";

                      $select = new Selectall();

                      $mod = $select->getallCond($table,$cond);

                      foreach($mod as $md)

                      {

                        ?>

                        <option value="<?php echo $md['in_sno'];?>" <?php echo $mnid == $md['in_sno'] ? "selected":""; ?> ><?php echo $md['in_modular'];?></option>

                        <?php

                      }

                    ?>

                  </select>

                </div>

              </div>

              

              

               <div class="form-group row">

                <div class="col-sm-3"></div>

                <div class="input-group col-sm-6">

                  <div class="input-group-prepend">

                    <span class="input-group-text rounded-0"><input type="checkbox" name="active" value="1" <?php echo $est == "1" ? "checked" : "";?> ></span>

                  </div>

                  <input type="tel" class="form-control rounded-0" name="order" placeholder="Sub Menu Order" required value="<?php echo $ord;?>">

                  

                </div>

                <div class="col-sm-3"><input type="submit" name="savescale" value="Save" class="btn btn-primary btn btn-block"></div>

                

              </div>

              </form>

            </div>

            <div class="empinfo mb-3">

              <table class="table table-bordered table-striped">

                <thead>

                  

                  <th>Main Module</th>

                  <th>No</th>

                  <th>Sub Module</th>

                  <th>Status</th>

                  <th>Action</th>

                </thead>

                <tbody>

                  <?php

                  $xl = 1;

                    $table = "in_modular";

                    $cond = " `in_relate`='child' ";

                    $select = new Selectall();

                    $selData = $select->getallCond($table,$cond);

                    if($selData != "") 

                    {

                      foreach($selData as $sel)

                      {

                        $mnid = $sel['in_mainid'];

                        $table = "in_modular";

                        $cond = " `in_sno`='$mnid' ";

                        $select = new Selectall();

                        $celData = $select->getcondData($table,$cond);

                      ?>

                      <tr>

                      <td><?php echo $celData['in_modular'];?></td>

                      

                      <td><?php echo $sel['in_orderid'];?></td>

                      <td><?php echo $sel['in_modular']?></td>

                      <td>

                        <?php $axs = $sel['in_status']; if($axs == "1"){ echo "Active";}else{ echo "Inactive";} ?>

                        </td>

                      <td><a href="?kedit=<?php echo $sel['in_sno'];?>" class="text-success"><i class="fas fa-edit"></i></a><a href="<?php echo BSURL;?>functions/setting.php?case=delmod&id=<?php echo $sel['in_sno'];?>" class="text-danger ml-2"><i class="fas fa-trash"></i></a></td>

                    </tr>

                      <?php

                      $xl++;

                      }

                      

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

 <?php

include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/footer.php';

?>