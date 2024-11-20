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

            <h4 class="m-0"> <?php echo ucwords($sitename);?></h4>

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

          <div class="col-lg-4">

            <?php

              if(isset($_GET['pedit']))

              {

                $id = $_GET['pedit'];

                $table = "in_holidays";

                $cond = " in_sno='$id' ";

                $select = new Selectall();

                $mdata = $select->getcondData($table,$cond);

               

                if($mdata != "")

                {

                  $mng = $mdata['in_leavname'];

                  $mndat = $mdata['in_leavedate'];

                  $lty = $mdata['in_leavetype'];

                  $acs = $mdata['in_status'];

                }

                

                $act = "editholy&id=".$id;



              }

              else

              {

                $act = "holidays";

                $mng = "";

                $acs = "";

                $mndat = "";

                $mltyp = "Annual Leave";

              }

              

            ?>

            <div class="card">

              <div class="card-header">

                <div class="card-title">

                  <i class="fas fa-glass-cheers"></i> Holidays

                </div>

              </div>

              <div class="card-body">

                <form class="" method="POST" action="<?php echo BSURL;?>functions/leave.php?case=<?php echo $act;?>&p=<?php echo $siteaim?>">

              <div class="form-group row">

                <label class="col-sm-12 col-form-label">Holiday Name*</label>

                <div class="input-group col-sm-12">

                  <div class="input-group-prepend">

                    <span class="input-group-text rounded-0"><input type="checkbox" name="active" value="1" <?php echo $acs == "1" ? "checked" : "";?>></span>

                  </div>

                  <input type="text" class="form-control rounded-0" placeholder="Leave Name" name="leave" required value="<?php echo $mng;?>">

                </div>

              </div>

              <div class="form-group row">

                <label class="col-sm-6 col-form-label">Holiday Type*</label>

                <div class="input-group col-sm-6">

                  <span class="form-control" readonly><?php echo $mltyp;?></span>

                </div>

              </div>
              <div class="form-group row">

                <label class="col-sm-6 col-form-label">Restricted Leave*</label>

                <div class="input-group col-sm-6">
                  <select class="form-control" name="restricted">
                    <option value="No">No</option>
                    <option value="Yes">Yes</option>
                  </select>

                                    

                </div>

              </div>

              <div class="form-group row">

                <label class="col-sm-12 col-form-label">Holiday Date*</label>

                <div class="input-group col-sm-12">

                  <div class="input-group-prepend">

                    <span class="input-group-text rounded-0"><i class="fas fa-calendar"></i></span>

                  </div>

                  <input type="date" class="form-control rounded-0" name="leavdate" required value="<?php echo $mndat;?>">

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

            

            

          </div>

          <div class="col-lg-8">

            <div class="card">

              <div class="card-header">

                <div class="card-title">

                  <i class="fas fa-date"></i> <?php echo date('Y');?> Holidays 

                </div>

                <div class="card-tools">

                  <form class="" method="GET">

                    

                    <div class="input-group">

                        <select class="border" required name="s">



                      <option value="">--Select--</option>

                      <?php 

                        $table = "in_holidays";

                        $inner = " DISTINCT in_leaveyear ";

                        $cond = " `in_status`='1' ";

                        $select = new Selectall();

                        $holdata = $select->getallInnercond($table,$inner,$cond);

                        if(!empty($holdata))

                        {

                          foreach($holdata as $hol)

                          {

                            ?>

                            <option value="<?php echo $hol['in_leaveyear'];?>"><?php echo $hol['in_leaveyear'];?></option>

                            <?php

                          }

                        }



                      ?>

                    </select>

                        <div class="input-group-append">

                          <button type="submit" class="input-group-text"> <i class="fas fa-search"></i></button>

                        </div>

                      </div>

                    

                  </form>

                </div>

              </div>

              <div class="card-body">

                <div class="table-responsive">

                  <table class="table table-bordered table-striped">

                <thead>

                  <th>S.No</th>

                  <th width="200px">Leave Name</th>

                  

                  <th>Leave Date</th>

                  <th>Leave Day</th>
                  <th>Restricted</th>

                  <th>Status</th>

                  <th>Action</th>

                </thead>

                <tbody>

                  <?php

                  if(isset($_GET['s']))

                  {

                    $s = $_GET['s'];

                    $table = "in_holidays";

                    $cond = " `in_leaveyear`='$s' ";

                    $select = new Selectall();

                    $selData = $select->getallCond($table,$cond);

                  }

                  else

                  {

                    $table = "in_holidays";

                    $cond = " `in_leaveyear`='$ydate' ";

                    $select = new Selectall();

                    $selData = $select->getallCond($table,$cond);

                  }

                    $xl = 1;

                    

                    if(!empty($selData)) 

                    {

                      foreach($selData as $sel)

                      {

                      ?>

                      <tr>

                      <td><?php echo $xl;?></td>

                      <td><?php echo $sel['in_leavname']?></td>

                      

                      <td><?php echo $sel['in_leavedate']?></td>

                      <td><?php echo $sel['in_leaveday']?></td>

                      <td><?php echo $sel['in_leavetype']?></td>

                      <td><?php $axs = $sel['in_status']; if($axs == "1"){ echo "Active";}else{ echo "Inactive";} ?></td>

                      <td><a href="?pedit=<?php echo $sel['in_sno'];?>" class="text-success"><i class="fas fa-edit"></i></a><a href="<?php echo BSURL;?>functions/leave.php?case=delholy&id=<?php echo $sel['in_sno'];?>&p=<?php echo $siteaim?>" class="text-danger ml-2"><i class="fas fa-trash"></i></a></td>

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