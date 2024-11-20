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

        

        <div class="card rounded-0 mt-3">

          <div class="card-header">

            <div class="card-title">
              <form class="form-inline" method="GET">
                
                <select name="lv" class="form-control rounded-0">
                  <?php
                  $table = "in_leavetype";
                  $cond = " `in_status`='1' ";
                  $select = new Selectall();
                  $levtop = $select->getallCond($table,$cond);
                  if(!empty($levtop))
                  {
                    foreach($levtop as $lt)
                    {
                      
                      $ltid = $lt['in_sno'];
                      $table = "in_leavebalance";
                      $cond = " `in_comid`='$comid' AND in_leaveid='$ltid' AND `in_status`='1' ";
                      $select = new Selectall();
                      $levs = $select->getcondData($table,$cond);
                      if($levs != "")
                      {
                        ?>
                        <option value="<?php echo $ltid;?>"><?php echo $lt['in_leavetype'];?> (<?php echo $lt['in_abbreviation'];?>)</option>
                        <?php
                      }
                    }
                  }
                  
                  
                  ?>
                </select>
                
                <button type="submit" class="btn btn-primary rounded-0"> <i class="fas fa-search"></i></button>
                
              </form>
             
              

              

            </div>

            <div class="card-tools">

              <a href="openning-leave.php" class="form-control"><i class="fas fa-plus-circle"></i> Opening Balance</a>

            </div>

          </div>

          <div class="card-body">
            <form class="form-inline mb-2" method="GET">
              <div class="input-group">
                <input type="text" name="s" class="form-control rounded-0 form-control-sm" placeholder="Employee ID/Name">
                <?php
                if(isset($_GET['lv']))
                {
                  ?>
                  <input type="hidden" name="lv" value="<?php echo $_GET['lv']?>">
                  <?php
                }
                ?>
                <div class="input-group-append">
                  <button type="submit" class="input-group-text rounded-0"> <i class="fas fa-search"></i></button>
                </div>
              </div>
            </form>

            <div class="table-responsive">

              <table class="table table-bordered">

                <thead class="bg-secondary">

                  <th width="50px"> Sr. No.</th>

                  <th width="100px">Employee ID</th>

                  <th>Employee Name</th>
                  <th>Details</th>
                  <th>Last Update</th>
                  <th>Update Month</th>
                  <th>Leave Type</th>

                  <th width="100px">Balance</th>

                  

                </thead>

                <tbody>

                  <?php
                  if(isset($_GET['s']) && isset($_GET['lv']))
                  {
                      $s = $_GET['s'];
                      $lv = $_GET['lv'];

                      $table = "in_employee";
                      $cond = " `in_empid`='$s' OR `in_fname` LIKE '%$s%' OR `in_lname` LIKE '%$s%' ";
                      $select = new Selectall();
                      $emps = $select->getcondData($table,$cond);
                      if($emps != "")
                      {
                        $ss = $emps['in_empid'];
                      }

                      $table = "in_leavebalance";

                      $value = "in_leavetype.in_leavetype as leavname, in_leavetype.in_abbreviation as abbrevsn, in_leavebalance.in_preid as preid, in_leavebalance.in_empid as empid, in_leavebalance.in_leaveid as leaveid, in_leavebalance.in_balance as levbal, in_leavebalance.in_leavedetails as details, in_leavebalance.in_credit as credit, in_leavebalance.in_date as leavedate ";
                      $table1 = "in_leavebalance";
                      $table2 = "in_leavetype";
                      $match = "in_leavetype.in_sno = in_leavebalance.in_leaveid";
                      $cond = " in_leavetype.in_comid='$comid' AND (in_leavebalance.in_empid='$ss' AND in_leavebalance.in_leaveid LIKE '%$lv%') AND in_leavetype.in_status ='1' ";

                      $sel = new Selectall();

                      $selData = $sel->innerAllcond($value,$table1,$table2,$match,$cond);

                  }
                  else if(isset($_GET['s']) && !isset($_GET['lv']))
                  {
                    $s = $_GET['s'];

                    $table = "in_employee";
                      $cond = " `in_empid`='$s' OR `in_fname` LIKE '%$s%' OR `in_lname` LIKE '%$s%' ";
                      $select = new Selectall();
                      $emps = $select->getcondData($table,$cond);
                      if($emps != "")
                      {
                        $ss = $emps['in_empid'];
                      }

                      $table = "in_leavebalance";

                      $value = "in_leavetype.in_leavetype as leavname, in_leavetype.in_abbreviation as abbrevsn, in_leavebalance.in_preid as preid, in_leavebalance.in_empid as empid, in_leavebalance.in_leaveid as leaveid, in_leavebalance.in_balance as levbal, in_leavebalance.in_leavedetails as details, in_leavebalance.in_credit as credit, in_leavebalance.in_date as leavedate ";
                      $table1 = "in_leavebalance";
                      $table2 = "in_leavetype";
                      $match = "in_leavetype.in_sno = in_leavebalance.in_leaveid";
                      $cond = " in_leavetype.in_comid='$comid' AND in_leavebalance.in_empid='$ss' AND in_leavetype.in_status ='1' ";

                      $sel = new Selectall();

                      $selData = $sel->innerAllcond($value,$table1,$table2,$match,$cond);
                      
                  }
                  else if(isset($_GET['lv']) && !isset($_GET['s']))
                  {
                    
                      $lv = $_GET['lv'];

                      $table = "in_leavebalance";

                      $value = "in_leavetype.in_leavetype as leavname, in_leavetype.in_abbreviation as abbrevsn, in_leavebalance.in_preid as preid, in_leavebalance.in_empid as empid, in_leavebalance.in_leaveid as leaveid, in_leavebalance.in_balance as levbal, in_leavebalance.in_leavedetails as details, in_leavebalance.in_credit as credit, in_leavebalance.in_date as leavedate ";
                      $table1 = "in_leavebalance";
                      $table2 = "in_leavetype";
                      $match = "in_leavetype.in_sno = in_leavebalance.in_leaveid";
                      $cond = " in_leavetype.in_comid='$comid' AND in_leavebalance.in_leaveid='$lv' AND in_leavetype.in_status ='1' ";

                      $sel = new Selectall();

                      $selData = $sel->innerAllcond($value,$table1,$table2,$match,$cond);
                     

                  }
                  else
                  {
                    $value = "in_leavetype.in_leavetype as leavname, in_leavetype.in_abbreviation as abbrevsn, in_leavebalance.in_preid as preid, in_leavebalance.in_empid as empid, in_leavebalance.in_leaveid as leaveid, in_leavebalance.in_balance as levbal, in_leavebalance.in_leavedetails as details, in_leavebalance.in_credit as credit, in_leavebalance.in_date as leavedate ";
                    $table1 = "in_leavebalance";
                    $table2 = "in_leavetype";
                    $match = "in_leavetype.in_sno = in_leavebalance.in_leaveid";
                    $cond = " in_leavetype.in_comid='$comid' AND in_leavetype.in_status ='1' ";

                    $sel = new Selectall();

                    $selData = $sel->innerAllcond($value,$table1,$table2,$match,$cond);

                  }

                  



                  if(!empty($selData))

                  {

                    $xl=1;

                    foreach($selData as $res)

                    {



                  

                      $ems = $res['empid'];

                      $lty = $res['leaveid'];

                      $table = "in_employee";

                      $cond = " `in_empid`='$ems' AND `in_compid`='$comid' ";

                      $sel = new Selectall();

                      $gemp = $sel->getcondData($table,$cond);

                      if($gemp != "")

                      {

                        $empre = $gemp['in_emprefix'];

                        $flname = $gemp['in_fname']." ".$gemp['in_lname'];



                        $table = "in_master_card";

                        $cond = " `in_sno`='$empre' AND `in_relation`='cardPrefix' ";

                        $sel = new Selectall();

                        $mpre = $sel->getcondData($table,$cond);




                        $abs = $res['abbrevsn'];

                        if($abs != "LOP")

                        {

                      ?>

                      <tr>

                        <td><?php echo $xl;?></td>

                        <td><?php echo $mpre['in_prefix'].$res['empid'];?></td>

                        <td><?php echo $flname;?></td>

                        <td><?php echo $res['details'];?></td>
                        <td><?php echo date('d-m-Y', strtotime($res['leavedate']));?></td>
                        <td><?php echo date('F', strtotime($res['leavedate']));?></td>


                        <td><?php echo $res['leavname']." (".$res['abbrevsn'].")";?></td>

                        <td><?php echo $res['levbal'];?></td>

                        

                      </tr>

                      <?php

                    }

                      $xl++;

                    }

                  }

                  }

                  else

                  {

                    ?>

                    <tr>

                      <td colspan="8" class="text-center">No Data</td>

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

  <div class="modal" id="findit" style="display: none;">

    <div class="modal-dialog">

      <div class="modal-content">

        <div class="modal-header">

          <div class="modal-title">Data Search</div>

          <button type="button" class="close" onclick="document.getElementById('findit').style.display = 'none'">

            <span aria-hidden="true">&times;</span>

          </button>

        </div>

        <form class="" method="GET">

        <div class="modal-body">

          

            <div class="form-group row">

              <label class="col-sm-4 col-form-label">Search By ID</label>

              <div class="col-sm-8">

                <div class="input-group">

                  <input type="text" name="emps" class="form-control" placeholder="Enter ID">

                  

                </div>

                

              </div>

            </div>

            

            <div class="form-group row">

              <label class="col-sm-4 col-form-label">Search By Name</label>

              <div class="col-sm-8">

                <div class="input-group">

                  <input type="text" name="snam" class="form-control" placeholder="Enter Name">

                  

                </div>

                

              </div>

            </div>

            <div class="form-group row">

              <label class="col-sm-4 col-form-label">Search By Name</label>

              <div class="col-sm-8">

                <div class="input-group">

                  <input type="text" name="snam" class="form-control">

                  <div class="input-group-append">

                    <span class="input-group-text">Short By Name :&nbsp;&nbsp; <input type="checkbox" name="shortid" value="1"></span>

                  </div>

                </div>

                

              </div>

            </div>

          

        </div>

        <div class="modal-footer justify-content-between">

          <button type="button" onclick="document.getElementById('findit').style.display = 'none'" class="btn btn-default">Close</button>

          <button type="submit" class="btn btn-primary">Submit</button>

        </div>

        </form>

      </div>

    </div>

  </div>



  

 <?php

include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/footer.php';

?>