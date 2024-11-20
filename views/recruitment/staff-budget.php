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

            <div class="form-inline">
              <h4 class="m-0"><?php echo ucwords($sitename);?></h4>
              <?php
              if(isset($_GET['s']))
              {
                ?>
                <a href="<?php echo VIEW.$pagename."/".$siteaim?>.php" class="btn-sm btn-primary ml-3"><i></i> Exit Search</a>
                <?php
              }
              ?>
              </div>

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

        
        <div class="card">
          <div class="card-header">
            <div class="card-title"><i class="fas fa-users"></i> Staff Budget Management</div>
            <div class="card-tools">
              <?php
            if(isset($_GET['sec']))
            {
              ?>
              <a href="<?php echo VIEW.$pagename."/".$siteaim?>.php" class="btn-sm btn-info"><i class="fas fa-coins"></i> Staff Budget</a>
              <?php
            }
            else
            {
              ?>
              <a href="<?php echo VIEW.$pagename."/".$siteaim?>.php?sec=budget" class="btn-sm btn-dark"><i class="fas fa-coins"></i> Budget Controller</a>
              <?php
            }
              ?>
              
            </div>

          </div>
          <div class="card-body">
            <?php
            if(isset($_GET['sec']))
            {
              ?>
              
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="empinfo">
                    <form class="" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=staffbudget">
                      <div class="row">
                        <div class="col-lg-12 col-md-12">
                          <label>Department</label>
                          <select name="depart" class="form-control" required>
                            <option value="">--Select Department--</option>
                            <?php

                            $table = "in_master_card";
                            $cond = " `in_relation`='department' AND `in_status`='1' ";
                            $select = new Selectall();
                            $selData = $select->getallCond($table,$cond);
                            if(!empty($selData))
                            {

                              foreach($selData as $sel)
                              {

                                ?>

                                <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_prefix'];?></option>

                                <?php

                              }

                            }

                          ?>
                          </select>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <label>No of Employee</label>
                          <input type="number" name="empno" class="form-control" required>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <label>Total Fix Expense</label>
                          <input type="text" name="expense" class="form-control" required>
                        </div>
                        <div class="col-lg-12 col-md-12">
                          <div class="form-group mt-3">
                            <div class="clearfix">
                              <input type="submit" class="btn btn-dark px-3 float-right" value="Save">
                            </div>
                            
                          </div>
                          
                        </div>
                      </div>
                    </form>
                  </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="table-responsive emptable">
                      <table class="table table-bordered table-striped">
                        <thead class="bg-info sticky-top">
                          <th>Sr. No.</th>
                          <th>Department</th>
                          <th>Count</th>
                          <th>Expense</th>
                        </thead>
                        <tbody>
                          <?php
                          $table = "in_staffbudget";
                          $cond = " `in_comid`='$comid' AND `in_status`='1' ";
                          $select = new Selectall();
                          $staff = $select->getallCond($table,$cond);
                          
                          if(!empty($staff))
                          {
                            $xl=1;
                            foreach($staff as $st)
                            {
                              $id = $st['in_department'];
                              $table = "in_master_card";
                              $cond = " `in_sno`='$id' AND `in_relation`='department' ";
                              $select = new Selectall();
                              $empdot = $select->getcondData($table,$cond);
                              if($empdot != "")
                              {
                                $dapart = $empdot['in_prefix'];
                                ?>
                                <tr>
                                <td><?php echo $xl;?></td>
                                <td><?php echo $dapart;?></td>
                                <td><?php echo $st['in_count'];?></td>
                                <td><?php echo $st['in_budget'];?></td>
                              </tr>
                                <?php
                              }
                              $xl++;
                            }
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>

                </div>
                
              
              <?php

            }
            else
            {
              ?>
              <div class="empinfo">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <form class="form-inline" method="GET">
                    <div class="input-group">
                      <select name="s" class="form-control" required>
                        <option value="">--Select Department--</option>
                        <?php

                        $table = "in_master_card";
                        $cond = " `in_relation`='department' AND `in_status`='1' ";
                        $select = new Selectall();
                        $selData = $select->getallCond($table,$cond);
                        if(!empty($selData))
                        {

                          foreach($selData as $sel)
                          {

                            ?>

                            <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_prefix'];?></option>

                            <?php

                          }

                        }

                      ?>
                      </select>
                      <div class="input-group-append">
                        <input type="submit" class="input-group-text" value="GO">
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-lg-6 col-md-6">
                  <ul class="nav">
                    <li class="nav-item"><span class='badge badge-danger' title='Exceed to Manpower'> <i class='fas fa-chevron-circle-up'></i> Exceed to Manpower</span></li>
                    <li class="nav-item mx-3"><span class='badge badge-warning' title='Below to Manpower'> <i class='fas fa-chevron-circle-down'></i> Below to Manpower</span></li>
                    <li class="nav-item"><span class='badge badge-success' title='Equal to Manpower'><i class='fas fa-thumbs-up'></i> Equal to Manpower</span></li>
                  </ul>
                </div>

              </div>
              <div class="table-responsive mt-3">
                <table class="table table-bordered table-striped">
                  <thead>
                    <th>No</th>
                    <th>Department_Name</th>
                    <th>Staff_Count</th>
                    <th>Group_Expense</th>
                  </thead>
                  <tbody>
                    <?php
                    if(isset($_GET['s']))
                    {
                      $s = $_GET['s'];
                      $table = "in_employee";
                      $inner = " COUNT(in_department) as counter, SUM(in_salary) as salter, in_department ";
                      $cond = " `in_compid`='$comid' AND `in_delete`='1' AND `in_department`='$s' ";
                      $select = new Selectall();
                      $depart = $select->getallInnercond($table,$inner,$cond);
                      if(!empty($depart))
                      {
                        $xl=1;
                        foreach($depart as $dp)
                        {
                          $id = $dp['in_department'];
                          $counts = $dp['counter'];
                          $saltes = $dp['salter'];

                          $table = "in_staffbudget";
                          $cond = " `in_comid`='$comid' AND `in_department`='$id' ";
                          $select = new Selectall();
                          $empot = $select->getcondData($table,$cond);
                          if($empot != "")
                          {
                            $emcount = $empot['in_count'];
                            $embudgt = $empot['in_budget'];
                          }

                          $table = "in_master_card";
                          $cond = " `in_sno`='$id' AND `in_relation`='department' ";
                          $select = new Selectall();
                          $empdot = $select->getcondData($table,$cond);
                          if($empdot != "")
                          {
                            $dapart = $empdot['in_prefix'];
                            ?>
                            <tr>
                            <td><?php echo $xl;?></td>
                            <td><?php echo $dapart;?></td>
                            <td><?php
                            if($counts < $emcount)
                            {
                              echo $counts." <span class='badge badge-danger' title='Exceed to Manpower'> <i class='fas fa-chevron-circle-up'></i> </span>";
                            }
                            else if($counts > $emcount)
                            {
                              
                              echo $counts." <span class='badge badge-warning' title='Below to Manpower'> <i class='fas fa-chevron-circle-down'></i> </span>";
                            }
                            else
                            {
                              echo $counts." <span class='badge badge-success' title='Equal to Manpower'><i class='fas fa-thumbs-up'></i> </span>";
                            }
                            ?></td>
                            <td>
                            <?php
                            if($saltes < $embudgt)
                            {
                              echo $saltes." <span class='badge badge-danger' title='Exceed to Manpower'> <i class='fas fa-chevron-circle-up'></i> </span>";
                            }
                            else if($saltes > $embudgt)
                            {
                              
                              echo $saltes." <span class='badge badge-warning' title='Below to Manpower'> <i class='fas fa-chevron-circle-down'></i> </span>";
                            }
                            else
                            {
                              echo $saltes." <span class='badge badge-success' title='Equal to Manpower'><i class='fas fa-thumbs-up'></i></span>";
                            }
                            ?>
                            </td>
                          </tr>
                            <?php
                          }
                          $xl++;
                          
                        }
                      }
                    }
                    else
                    {

                      $table = "in_employee";
                      $inner = " COUNT(in_department) as counter, SUM(in_salary) as salter, in_department ";
                      $cond = " `in_compid`='$comid' AND `in_delete`='1' GROUP BY in_department ";
                      $select = new Selectall();
                      $depart = $select->getallInnercond($table,$inner,$cond);
                      if(!empty($depart))
                      {
                        $xl=0;
                        foreach($depart as $dp)
                        {
                          $id = $dp['in_department'];
                          $counts = $dp['counter'];
                          $saltes = $dp['salter'];

                          $table = "in_staffbudget";
                          $cond = " `in_comid`='$comid' AND `in_department`='$id' ";
                          $select = new Selectall();
                          $empot = $select->getcondData($table,$cond);
                          if($empot != "")
                          {
                            $emcount = $empot['in_count'];
                            $embudgt = $empot['in_budget'];
                          }

                          $table = "in_master_card";
                          $cond = " `in_sno`='$id' AND `in_relation`='department' ";
                          $select = new Selectall();
                          $empdot = $select->getcondData($table,$cond);
                          if($empdot != "")
                          {
                            $dapart = $empdot['in_prefix'];
                            ?>
                            <tr>
                            <td><?php echo $xl;?></td>
                            <td><?php echo $dapart;?></td>
                            <td><?php
                            if($counts < $emcount)
                            {
                              echo $counts." <span class='badge badge-danger' title='Exceed to Manpower'> <i class='fas fa-chevron-circle-up'></i> </span>";
                            }
                            else if($counts > $emcount)
                            {
                              
                              echo $counts." <span class='badge badge-warning' title='Below to Manpower'> <i class='fas fa-chevron-circle-down'></i> </span>";
                            }
                            else
                            {
                              echo $counts." <span class='badge badge-success' title='Equal to Manpower'><i class='fas fa-thumbs-up'></i> </span>";
                            }
                            ?></td>
                            <td>
                            <?php
                            if($saltes < $embudgt)
                            {
                              echo $saltes." <span class='badge badge-danger' title='Exceed to Manpower'> <i class='fas fa-chevron-circle-up'></i> </span>";
                            }
                            else if($saltes > $embudgt)
                            {
                              
                              echo $saltes." <span class='badge badge-warning' title='Below to Manpower'> <i class='fas fa-chevron-circle-down'></i> </span>";
                            }
                            else
                            {
                              echo $saltes." <span class='badge badge-success' title='Equal to Manpower'><i class='fas fa-thumbs-up'></i></span>";
                            }
                            ?>
                            </td>
                          </tr>
                            <?php
                          }
                          $xl++;
                          
                        }
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
              <?php
            }
            ?>
            
            
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