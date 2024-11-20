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

        <div class="card">

          



          <div class="card-body">

            <div class="row">

              <div class="col-sm-4 col-md-4">

              

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

                    $noti = $mdata['in_parent'];

                    $mng = $mdata['in_prefix'];


                  }

                  

                  $act = "desgiedit&id=".$id;



                }

                else

                {

                  $act = "designation";

                  $mng = "";

                  $noti = "";

                }

                

              ?>

              <div class="bg-light p-2 border">

                <form class="" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=<?php echo $act;?>">

                <div class="form-group">

                  <label>Add Designation</label>

                  <div class="input-group mb-3">

                    

                  <input type="text" class="form-control rounded-0" name="group" required value="<?php echo $mng;?>" placeholder="Designation Name">

                  

                </div>

                <div class="input-group mb-3">

                    

                  

                  <div class="input-group-append">

                   <span class="input-group-text rounded-0 py-2"><input type="checkbox" name="desigroup" value="1"></span>

                  </div>

                  <em class="text-danger ml-3">Want to Create As Group</em>

                </div>

                <div class="input-group mb-3">

                    

                  <input type="text" class="form-control rounded-0" name="notice" value="<?php echo $noti;?>" placeholder="Notice Period (in days)">

                  <div class="input-group-append">

                    <button type="submit" class="input-group-text">Go</button>

                  </div>

                </div>

                

                </div>

              </form>
              <div class="table-responsive emptable">
              <table class="table table-bordered table-striped">

                <tr class="bg-primary">

                  <td>ID</td>

                  <td>Notice</td>

                  <td>Name</td>

                  

                  <td class="text-center"><span class="fas fa-edit"></span></td>

                  <td class="text-center"><span class="fas fa-trash"></span></td>



                </tr>

                <?php

                $table = "in_master_card";
                $cond = " `in_relation` IN ('designation', 'masterDesignation') AND `in_status`='1' ";
                $select = new Selectall();
                $design = $select->getallCond($table,$cond);

                  if($design != "") 

                  {

                    foreach($design as $mg)

                    { 
                      $cardpos = $mg['in_relation'];
                    ?>

                    <tr>

                      <td><?php echo $mg['in_sno'];?></td>
                      <td><?php echo $mg['in_parent'];?></td>
                      <td><?php 
                      if($cardpos == "masterDesignation")
                      {
                        echo "<span class='badge badge-danger badge-pill'>M</span> ".$mg['in_prefix'];
                      }
                      else
                      {
                        echo $mg['in_prefix'];
                      }
                        ?></td>

                      

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

            <div class="col-sm-4 col-md-4">

             

              <?php

                if(isset($_GET['dedit']))

                {

                  $id = $_GET['dedit'];

                  $table = "in_master_card";

                  $select = new Selectall();

                  $cond = " `in_sno`='$id' ";

                  $mdata = $select->getcondData($table,$cond);

                 

                  if($mdata != "")

                  {

                    $mng = $mdata['in_prefix'];

                  }

                  

                  $act = "departedit&id=".$id;



                }

                else

                {

                  $act = "depart";

                  $mng = "";

                }

                

              ?>

              <div class="bg-light p-2 border">

                <form class="" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=<?php echo $act;?>">

                <div class="form-group">

                  <label>Add Department</label>

                  <div class="input-group mb-3">

                  <input type="text" class="form-control" name="group" required value="<?php echo $mng;?>">

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

                $table = "in_master_card";

                $select = new Selectall();

                $cond = " `in_relation`='department' ";

                $depart = $select->getallCond($table,$cond);

                  if($depart != "") 

                  {

                    foreach($depart as $dp)

                    {

                    ?>

                    <tr>

                      <td><?php echo $dp['in_sno'];?></td>

                      <td><?php echo $dp['in_prefix'];?></td>

                      <td class="text-center"><a href="?dedit=<?php echo $dp['in_sno'];?>" class="text-success"><i class="fas fa-edit"></i></a></td>

                      <td class="text-center"><a href="<?php echo BSURL;?>functions/setting.php?case=del&id=<?php echo $dp['in_sno'];?>&tbl=in_master_card" class="text-danger"><i class="fas fa-trash"></i></a></td>

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

            <?php

                if(isset($_GET['sedit']))

                {

                  $id = $_GET['sedit'];

                  $table = "in_master_card";

                  $select = new Selectall();

                  $cond = " `in_sno`='$id' ";

                  $mdata = $select->getcondData($table,$cond);

                 

                  if($mdata != "")

                  {

                    $mng = $mdata['in_prefix'];

                  }

                  

                  $act = "superedit&id=".$id;



                }

                else

                {

                  $act = "group";

                  $mng = "";

                }

                

              ?>

            <div class="col-sm-4 col-md-4">

              <div class="bg-light p-2 border">

                <form class="" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=<?php echo $act;?>">

                <div class="form-group">

                  <label>Work Category</label>

                  <div class="input-group mb-3">

                  <input type="text" class="form-control" name="group" required value="<?php echo $mng;?>">

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

                $table = "in_master_card";

                $select = new Selectall();

                $cond = " `in_relation`='groups' ";

                $gre = $select->getallCond($table,$cond);

                  if(!empty($gre)) 

                  {

                    foreach($gre as $g)

                    {

                    ?>

                    <tr>

                      <td><?php echo $g['in_sno'];?></td>

                      <td><?php echo $g['in_prefix'];?></td>

                      <td class="text-center"><a href="?sedit=<?php echo $g['in_sno'];?>" class="text-success"><i class="fas fa-edit"></i></a></td>

                      <td class="text-center"><a href="<?php echo BSURL;?>functions/setting.php?case=del&id=<?php echo $g['in_sno'];?>&tbl=in_master_card" class="text-danger"><i class="fas fa-trash"></i></a></td>

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