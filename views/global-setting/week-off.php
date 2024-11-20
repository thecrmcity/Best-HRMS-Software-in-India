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
        
        <div class="card rounded-0 p-2">
              <div class="row">
                <div class="col-sm-6 col-lg-6">
                  <div class="searchform">
                    <form class="form-inline" method="GET">
                      <div class="input-group">
                      <select class="form-control rounded-0 border-right-0" name="com" required>
                        <?php
                          if(isset($_GET['com']))
                          {
                            $selid = $_GET['com'];
                            $table = "in_master_card";
                            $cond = " `in_sno`='$selid' AND `in_relation`='company' ";
                            $select = new Selectall();
                            $self = $select->getcondData($table,$cond);
                            $selt = $self['in_prefix'];
                            
                          }
                          else
                          {
                            $selt = "--Select--";
                            $selid = "";
                          }
                        ?>
                        <option value="<?php echo $selid;?>"><?php echo $selt;?></option>
                        <?php
                        $table = "in_master_card";
                        $cond = " `in_relation`='company' ";
                        $select = new Selectall();
                        $selcom = $select->getallCond($table,$cond);
                        if(!empty($selcom))
                        {
                          foreach($selcom as $sel)
                          {
                            
                          ?>
                          <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_prefix'];?></option>
                          <?php
                          }
                          
                        }
                        ?>
                      </select>
                      <div class="input-group-prepend">
                        
                        <input type="submit" value="GO" class="input-group-text rounded-0">
                    </div>
                    </div>
                    </form>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-6"></div>

              </div>
            
          </div>
          <?php
          if(isset($_GET['com']))
          {
            $com = $_GET['com'];
            $table = "in_weekoff";
            $cond = " `in_comid`='$com' ";
            $select = new Selectall();
            $sup = $select->getcondData($table,$cond);
            if($sup != "")
            {
              $days = $sup['in_days'];
              $dats = explode(";",$days);
            }
            else
            {

            }
            ?>

            
          <div class="card rounded-0 p-2">
            <div class="card-header">
              <form class="form-inline" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=weekoff&f=<?php echo $pagename;?>&p=<?php echo $siteaim;?>">
                <input type="hidden" name="comid" value="<?php echo $com;?>">
                <select class="form-control rounded-0" name="dayname" required>
                  <option value="">--Day--</option>
                  <option value="Monday">Monday</option>
                  <option value="Tuesday">Tuesday</option>
                  <option value="Wednesday">Wednesday</option>
                  <option value="Thrusday">Thrusday</option>
                  <option value="Friday">Friday</option>
                  <option value="Saturday">Saturday</option>
                  <option value="Sunday">Sunday</option>
                </select>
                <select class="form-control rounded-0 ml-3" name="numweek" required>
                  <option value="">--Select--</option>
                  <option value="1">First Week</option>
                  <option value="2">Second Week</option>
                  <option value="3">Third Week</option>
                  <option value="4">Fourth Week</option>
                  <option value="5">Fifth Week</option>
                </select>
                <select class="form-control rounded-0 ml-3" name="wisoff">
                  <option value="FH">First Half</option>
                  <option value="SH">Second Half</option>
                  <option value="FD">Full Day</option>
                  <option value="NL">Null</option>
                </select>
                <input type="submit" name="saveweek" value="Submit" class="btn btn-primary rounded-0 ml-3">
              </form>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead class="text-center bg-primary">
                    <th></th>
                    <th>First Week</th>
                    <th>Second Week</th>
                    <th>Third Week</th>
                    <th>Fourth Week</th>
                    <th>Fifth Week</th>

                  </thead>
                <?php

                  $table = "in_weekoff";
                  $cond = " `in_comid`='$com' ORDER BY in_orderid ASC";
                  $select = new Selectall();
                  $sup = $select->getallCond($table,$cond);
                  if(!empty($sup))
                  {
                    foreach($sup as $sp)
                    {
                      ?>
                      <tr>
                        <td><?php echo $sp['in_days'];?></td>
                        <td class="text-center px-0"><?php
                        $fs = $sp['in_firstweek'];
                        switch($fs)
                        {
                          case "FH":
                          ?>
                          <span style="background: linear-gradient(180deg, rgba(247,113,113,1) 0%, rgba(242,205,205,1) 27%, rgba(232,13,13,1) 62%, rgba(240,139,139,1) 98%);" class="px-4">&nbsp;</span><span style="background: linear-gradient(180deg, rgba(199,199,199,1) 0%, rgba(232,228,228,1) 27%, rgba(157,157,157,1) 62%, rgba(190,190,190,1) 98%);" class="px-4">&nbsp;</span>
                          <?php
                          
                          break;
                          case "SH":
                          ?>
                          <span style="background: linear-gradient(180deg, rgba(199,199,199,1) 0%, rgba(232,228,228,1) 27%, rgba(157,157,157,1) 62%, rgba(190,190,190,1) 98%);" class="px-4">&nbsp;</span><span style="background: linear-gradient(180deg, rgba(247,113,113,1) 0%, rgba(242,205,205,1) 27%, rgba(232,13,13,1) 62%, rgba(240,139,139,1) 98%);" class="px-4">&nbsp;</span>
                          <?php
                          break;
                          case "FD":
                          ?>
                          <span style="background: linear-gradient(180deg, rgba(247,113,113,1) 0%, rgba(242,205,205,1) 27%, rgba(232,13,13,1) 62%, rgba(240,139,139,1) 98%);" class="px-5">&nbsp;</span>
                          <?php
                          break;
                          case "NL":
                          echo "";
                          break;
                        }
                        ?></td>
                        <td class="text-center px-0"><?php
                        $ss = $sp['in_secndweek'];
                        switch($ss)
                        {
                          case "FH":
                          ?>
                          <span style="background: linear-gradient(180deg, rgba(247,113,113,1) 0%, rgba(242,205,205,1) 27%, rgba(232,13,13,1) 62%, rgba(240,139,139,1) 98%);" class="px-4">&nbsp;</span><span style="background: linear-gradient(180deg, rgba(199,199,199,1) 0%, rgba(232,228,228,1) 27%, rgba(157,157,157,1) 62%, rgba(190,190,190,1) 98%);" class="px-4">&nbsp;</span>
                          <?php
                          
                          break;
                          case "SH":
                          ?>
                          <span style="background: linear-gradient(180deg, rgba(199,199,199,1) 0%, rgba(232,228,228,1) 27%, rgba(157,157,157,1) 62%, rgba(190,190,190,1) 98%);" class="px-4">&nbsp;</span><span style="background: linear-gradient(180deg, rgba(247,113,113,1) 0%, rgba(242,205,205,1) 27%, rgba(232,13,13,1) 62%, rgba(240,139,139,1) 98%);" class="px-4">&nbsp;</span>
                          <?php
                          break;
                          case "FD":
                          ?>
                          <span style="background: linear-gradient(180deg, rgba(247,113,113,1) 0%, rgba(242,205,205,1) 27%, rgba(232,13,13,1) 62%, rgba(240,139,139,1) 98%);" class="px-5">&nbsp;</span>
                          <?php
                          break;
                          case "NL":
                          echo "";
                          break;
                        }
                        ?></td>
                        <td class="text-center px-0"><?php
                        $trs = $sp['in_thirdweek'];
                        switch($trs)
                        {
                          case "FH":
                          ?>
                          <span style="background: linear-gradient(180deg, rgba(247,113,113,1) 0%, rgba(242,205,205,1) 27%, rgba(232,13,13,1) 62%, rgba(240,139,139,1) 98%);" class="px-4">&nbsp;</span><span style="background: linear-gradient(180deg, rgba(199,199,199,1) 0%, rgba(232,228,228,1) 27%, rgba(157,157,157,1) 62%, rgba(190,190,190,1) 98%);" class="px-4">&nbsp;</span>
                          <?php
                          
                          break;
                          case "SH":
                          ?>
                          <span style="background: linear-gradient(180deg, rgba(199,199,199,1) 0%, rgba(232,228,228,1) 27%, rgba(157,157,157,1) 62%, rgba(190,190,190,1) 98%);" class="px-4">&nbsp;</span><span style="background: linear-gradient(180deg, rgba(247,113,113,1) 0%, rgba(242,205,205,1) 27%, rgba(232,13,13,1) 62%, rgba(240,139,139,1) 98%);" class="px-4">&nbsp;</span>
                          <?php
                          break;
                          case "FD":
                          ?>
                          <span style="background: linear-gradient(180deg, rgba(247,113,113,1) 0%, rgba(242,205,205,1) 27%, rgba(232,13,13,1) 62%, rgba(240,139,139,1) 98%);" class="px-5">&nbsp;</span>
                          <?php
                          break;
                          case "NL":
                          echo "";
                          break;
                        }
                        ?></td>
                        <td class="text-center px-0"><?php
                        $frs = $sp['in_forthweek'];
                        switch($frs)
                        {
                          case "FH":
                          ?>
                          <span style="background: linear-gradient(180deg, rgba(247,113,113,1) 0%, rgba(242,205,205,1) 27%, rgba(232,13,13,1) 62%, rgba(240,139,139,1) 98%);" class="px-4">&nbsp;</span><span style="background: linear-gradient(180deg, rgba(199,199,199,1) 0%, rgba(232,228,228,1) 27%, rgba(157,157,157,1) 62%, rgba(190,190,190,1) 98%);" class="px-4">&nbsp;</span>
                          <?php
                          
                          break;
                          case "SH":
                          ?>
                          <span style="background: linear-gradient(180deg, rgba(199,199,199,1) 0%, rgba(232,228,228,1) 27%, rgba(157,157,157,1) 62%, rgba(190,190,190,1) 98%);" class="px-4">&nbsp;</span><span style="background: linear-gradient(180deg, rgba(247,113,113,1) 0%, rgba(242,205,205,1) 27%, rgba(232,13,13,1) 62%, rgba(240,139,139,1) 98%);" class="px-4">&nbsp;</span>
                          <?php
                          break;
                          case "FD":
                          ?>
                          <span style="background: linear-gradient(180deg, rgba(247,113,113,1) 0%, rgba(242,205,205,1) 27%, rgba(232,13,13,1) 62%, rgba(240,139,139,1) 98%);" class="px-5">&nbsp;</span>
                          <?php
                          break;
                          case "NL":
                          echo "";
                          break;
                        }
                        ?></td>
                        <td class="text-center px-0"><?php
                        $fvs = $sp['in_fifthweek'];
                        switch($fvs)
                        {
                          case "FH":
                          ?>
                          <span style="background: linear-gradient(180deg, rgba(247,113,113,1) 0%, rgba(242,205,205,1) 27%, rgba(232,13,13,1) 62%, rgba(240,139,139,1) 98%);" class="px-4">&nbsp;</span><span style="background: linear-gradient(180deg, rgba(199,199,199,1) 0%, rgba(232,228,228,1) 27%, rgba(157,157,157,1) 62%, rgba(190,190,190,1) 98%);" class="px-4">&nbsp;</span>
                          <?php
                          
                          break;
                          case "SH":
                          ?>
                          <span style="background: linear-gradient(180deg, rgba(199,199,199,1) 0%, rgba(232,228,228,1) 27%, rgba(157,157,157,1) 62%, rgba(190,190,190,1) 98%);" class="px-4">&nbsp;</span><span style="background: linear-gradient(180deg, rgba(247,113,113,1) 0%, rgba(242,205,205,1) 27%, rgba(232,13,13,1) 62%, rgba(240,139,139,1) 98%);" class="px-4">&nbsp;</span>
                          <?php
                          break;
                          case "FD":
                          ?>
                          <span style="background: linear-gradient(180deg, rgba(247,113,113,1) 0%, rgba(242,205,205,1) 27%, rgba(232,13,13,1) 62%, rgba(240,139,139,1) 98%);" class="px-5">&nbsp;</span>
                          <?php
                          break;
                          case "NL":
                          echo "";
                          break;
                        }
                        ?></td>
                      </tr>
                      <?php
                    }
                  }
                  
                ?>

                
                </table>
              </div>
              <br>
              <table class="table border-0 bg-light">
                <tr>
                  <td><span style="background: linear-gradient(180deg, rgba(247,113,113,1) 0%, rgba(242,205,205,1) 27%, rgba(232,13,13,1) 62%, rgba(240,139,139,1) 98%);" class="px-4">&nbsp;</span><span style="background: linear-gradient(180deg, rgba(199,199,199,1) 0%, rgba(232,228,228,1) 27%, rgba(157,157,157,1) 62%, rgba(190,190,190,1) 98%);" class="px-4">&nbsp;</span> <b>First Half </b></td>
                  <td><span style="background: linear-gradient(180deg, rgba(199,199,199,1) 0%, rgba(232,228,228,1) 27%, rgba(157,157,157,1) 62%, rgba(190,190,190,1) 98%);" class="px-4">&nbsp;</span><span style="background: linear-gradient(180deg, rgba(247,113,113,1) 0%, rgba(242,205,205,1) 27%, rgba(232,13,13,1) 62%, rgba(240,139,139,1) 98%);" class="px-4">&nbsp;</span> <b>Second Half </b></td>
                  <td><span style="background: linear-gradient(180deg, rgba(247,113,113,1) 0%, rgba(242,205,205,1) 27%, rgba(232,13,13,1) 62%, rgba(240,139,139,1) 98%);" class="px-5">&nbsp;</span><b> Full Day</b></td>
                </tr>
                
              </table>
              
            </div>
          </div>
          <?php
          }
          ?>
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