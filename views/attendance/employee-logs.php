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

              <li class="breadcrumb-item"><span onclick="history.back()" class="badge badge-danger" style="cursor: pointer;"><i class="fas fa-arrow-left"></i> Back</span></li><li class="breadcrumb-item"><a href="<?php echo BSURL;?>views/dashboard/"><i class="fas fa-home"></i> Home</a></li>

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

          <div class="card-header">

            <div class="card-title">

              

            </div>

            <div class="card-tools">
              <form class="form-inline" method="GET">
                <div class="input-group">
                  <input type="date" name="sd" class="form-control rounded-0 form-control-sm">
                  <div class="input-group-append ">
                    <button type="submit" class="input-group-text rounded-0"><i class="fas fa-search"></i></button>
                  </div>
                </div>
                
              </form>
            </div>

          </div>

          <div class="card-body">
            
              <div class="row">
                <div class="col-lg-6 col-md-6">

                </div>
                <div class="col-lg-6 col-md-6">
                  <?php
                  if(isset($_GET['sd']))
                  {
                    $sd = $_GET['sd'];
                    $act = "&sd=".$sd;
                  }
                  else
                  {
                    $act = "";
                  }
                  ?>
                   <div class="clearfix">
                    
                    <div class="float-right">
                      <ul class="nav nav-pills">
                        <li class="nav-item"><a href="<?php echo VIEW?>attendance/employee-logs.php" class="nav-link">Application Login</a></li>
                        <li class="nav-item"><a href="<?php echo VIEW?>attendance/employee-logs.php?id='lunch'<?php echo $act;?>" class="nav-link">Lunch Break</a></li>
                        <li class="nav-item"><a href="<?php echo VIEW?>attendance/employee-logs.php?id='tea'<?php echo $act;?>" class="nav-link">Tea Break</a></li>

                      </ul>
                    </div>
                  </div>
                </div>

              </div>
            

            <div class="table-responsive emptable">

              <table class="table table-bordered table-striped">

                <thead>

                  <th>No</th>

                  <th>EmpID</th>

                  <th>FirstName</th>

                  <th>UserName</th>

                  <th>Email_Address</th>

                  <th>Activity</th>

                  <th>System_DateTime</th>

                </thead>

                <tbody>

                  <?php

                    if(isset($_GET['sd']))
                    {
                      $sd = $_GET['sd'];
                      
                    }
                    else
                    {
                      
                    }

                    $table = "in_logs";

                    $cond = " `in_comid`='$comid' ORDER BY in_logtime DESC";

                    $select = new Selectall();

                    $sys = $select->getallCond($table,$cond);

                    if(!empty($sys))

                    { 

                      $xl =1;

                      foreach($sys as $sy)

                      {

                        $pure = $sy['in_logtime'];

                        $moral = date('Y-m-d', strtotime($pure));

                        if($cdate == "$moral"){

                        ?>

                        <tr>

                          <td><?php echo $xl;?></td>

                          <td><?php echo $sy['in_empid'];?></td>

                          <td><?php echo $sy['in_fname'];?></td>

                          <td><?php echo $sy['in_username'];?></td>

                          <td><?php echo $sy['in_email'];?></td>

                          <td><?php echo $sy['in_logname'];?></td>

                          <td><?php echo $moral;?></td>





                        </tr>

                        <?php

                        $xl++;

                      }

                      

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