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

          <div class="col-sm-6 col-lg-6 col-md-6">

            <form class="form-inline" method="GET">

                <div class="form-group">

                  

                  <div class="input-group">

                    

                    <input type="text" class=" border pl-2 rounded-0 border-right-0 emsinput" placeholder="Employee ID" name="s" required>

                    <div class="input-group-prepend">

                      <input type="submit" value="GO" class="rounded-0 border bg-secondary emsinput">

                    </div>

                    <?php

                    if(isset($_GET['s']))

                    {

                      ?>

                      <a href="<?php echo VIEW.$pagename."/".$siteaim?>.php" class="btn-sm btn-primary ml-3"><i></i> Exit Search</a>

                      <?php

                    }

                    ?>

                  </div>

                </div>

              </form>



          </div>

         

          <div class="col-sm-6 col-lg-6 col-md-6">

            

          </div>

        </div>

         <div class="card mt-2 rounded-0">

          <div class="card-body p-0">

            <form class="" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=delshifts&f=<?php echo $pagename?>&p=<?php echo $siteaim;?>">

            <div class="table-responsive emptable">

              <table class="table table-bordered table-striped">

                <thead class="sticky-top bg-secondary">

                  <th width="">Sr. No.</th>

                  <th width="">Employee ID</th>

                  <th width="">Employee Name</th>

                  <th width="">Shift Name</th>

                  <th width="">In Time</th>

                  <th width="">Out Time</th>

                  <th width="">Total Time</th>

                  <th width="">Lunch Time</th>

                  <th width="">Break Time</th>

                  <th width="">Status</th>

                  <th width="">

                    <div class="custom-control custom-switch">

                      <input type="checkbox" class="chk_all custom-control-input" id="customSwitch1">

                     <label class="custom-control-label" for="customSwitch1"></label>

                    </div>

                  </th>

                  

                </thead>

                <tbody>

                  <?php

                  if(isset($_GET['s']))

                  {

                    $s = $_GET['s'];



                    $table = "in_assignedshift";

                    $cond = " `in_empid` LIKE '%$s%' ";

                    $select = new Selectall();

                    $res = $select->getallCond($table,$cond);



                  }

                  else

                  {

                    $table = "in_assignedshift";

                    $cond = " `in_comid`='$comid' AND `in_status`='1' ";

                    $select = new Selectall();

                    $res = $select->getallCond($table,$cond);





                  }

                    $xl =1;

                    if(!empty($res))

                    {





                    foreach($res as $rs)

                    {

                      $em = $rs['in_empid'];

                      $table = "in_employee";

                      $cond = " `in_empid`='$em' ";

                      $select = new Selectall();

                      $empinfo = $select->getcondData($table,$cond);





                      $pr = $empinfo['in_emprefix'];

                      $table = "in_master_card";

                      $cond = " `in_sno`='$pr' ";

                      $select = new Selectall();

                      $prfx = $select->getcondData($table,$cond);



                      $sh = $rs['in_shiftid'];

                      $table = "in_companyshift";

                      $cond = " `in_sno`='$sh' ";

                      $select = new Selectall();

                      $shif = $select->getcondData($table,$cond);

                      

                      ?>

                      <tr>

                      <td><?php echo $xl;?></td>

                      <td><?php echo $prfx['in_prefix'].$empinfo['in_empid'];?></td>

                      <td><?php echo $empinfo['in_fname']." ".$empinfo['in_lname'];?></td>

                      <td><?php echo $shif['in_shiftname'];?></td>

                      <td><?php echo $shif['in_intime'];?></td>

                      <td><?php echo $shif['in_outime'];?></td>

                      <td><?php echo $shif['in_hours'];?></td>

                      <td><?php echo $shif['in_lunch'];?></td>

                      <td><?php echo $shif['in_break'];?></td>

                      <td><?php $stat = $shif['in_status'];

                        if($stat == "1")

                        {

                          echo "Active";

                        }

                        else

                        {

                          echo "Inactive";

                        }

                      ?></td>

                      <td><input type="checkbox" name="cantrash[]" value="<?php echo $rs['in_sno'];?>" class="chk_me"></td>

                      

                    </tr>

                      <?php

                      $xl++;

                    }

                  }

                  ?>

                </tbody>

              </table>

            </div>

            <div class="clearfix">

            <input type="submit" class="btn btn-danger float-right my-3 mr-3" value="Delete">

            </div>

          </form>



          </div>

        </div>

        <!-- /.row -->

        

        <!-- /.row -->

        

      </div><!-- /.container-fluid -->

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->

   <script type="text/javascript">

  $(document).ready(function(){

    $(".chk_all").click(function(){

      $(".chk_me").prop('checked', this.checked);

    });

  });





</script>

 <?php

include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/footer.php';

?>