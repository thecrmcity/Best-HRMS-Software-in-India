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

          <div class="col-lg-5">

            <?php

              if(isset($_GET['pedit']))

              {

                $id = $_GET['pedit'];

                $table = "in_leavetype";

                $cond = " in_sno='$id' ";

                $select = new Selectall();

                $mdata = $select->getcondData($table,$cond);

               

                if($mdata != "")

                {

                  $mng = $mdata['in_leavetype'];

                  $acs = $mdata['in_status'];

                  $abbr = $mdata['in_abbreviation'];

                }

                

                $act = "editype&id=".$id;



              }

              else

              {

                $act = "addtype";

                $mng = "";

                $acs = "";

                $abbr = "";

              }

              

            ?>

            <div class="empinfo mb-3">

              <h4>Add Leave Type</h4>

              <hr>

              <form class="" method="POST" action="<?php echo BSURL;?>functions/leave.php?case=<?php echo $act;?>&f=<?php echo $pagename;?>&p=<?php echo $siteaim?>">

              <div class="form-group row">

                <label class="col-sm-4 col-form-label">Name*</label>

                <div class="input-group col-sm-8">

                  <div class="input-group-prepend">

                    <span class="input-group-text rounded-0"><input type="checkbox" name="active" value="1" <?php echo $acs == "1" ? "checked" : "";?>></span>

                  </div>

                  <input type="text" class="form-control rounded-0" placeholder="Type Name" name="ltype" required value="<?php echo $mng;?>">

                </div>

              </div>

              <div class="form-group row">

                <label class="col-sm-4 col-form-label">Abbreviation*</label>

                <div class="input-group col-sm-8">

                  <div class="input-group-prepend">

                    <span class="input-group-text rounded-0"><i class="fas fa-cut"></i></span>

                  </div>

                  <input type="text" class="form-control rounded-0" placeholder="Leave Short Name" name="abbre" required value="<?php echo $abbr;?>">

                </div>

              </div>

              

              

               <div class="form-group row">

                <div class="input-group col-sm-9">

                  

                </div>

                <div class="col-sm-3"><input type="submit" name="savescale" value="Save" class="btn btn-primary btn btn-block"></div>

                

              </div>

              </form>

            </div>

            

          </div>

          <div class="col-lg-7">

            <div class="empinfo mb-3">

              <table class="table table-bordered table-striped">

                <thead>

                  <th>S.No</th>

                  <th width="200px">Leave Type Name</th>

                  <th>Abbreviation</th>

                  <th>Status</th>

                  <th>Action</th>

                </thead>

                <tbody>

                  <?php

                  $xl = 1;

                    $table = "in_leavetype";

                    $select = new Selectall();

                    $selData = $select->onlyAll($table);

                    if($selData != "") 

                    {

                      foreach($selData as $sel)

                      {

                      ?>

                      <tr>

                      <td><?php echo $xl;?></td>

                      <td><?php echo $sel['in_leavetype']?></td>

                      <td><?php echo $sel['in_abbreviation']?></td>

                      <td><?php $axs = $sel['in_status']; if($axs == "1"){ echo "Active";}else{ echo "Inactive";} ?></td>

                      <td>

                        <?php

                        $abs = $sel['in_abbreviation'];

                          if($abs != "LOP")

                          {

                            ?>

                            <a href="?pedit=<?php echo $sel['in_sno'];?>" class="text-success"><i class="fas fa-edit"></i></a>

                            <!-- <a href="<?php echo BSURL;?>functions/leave.php?case=del&id=<?php echo $sel['in_sno'];?>&p=<?php echo $siteaim?>" class="text-danger ml-2"><i class="fas fa-trash"></i></a> -->

                            <?php

                          }

                        ?>

                        </td>

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