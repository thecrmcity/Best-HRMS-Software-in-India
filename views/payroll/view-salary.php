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
        
        <?php
        if(isset($_GET['id']))
        {
          $id = $_GET['id'];
          $pd = $_GET['pd'];
          $selmon = $_GET['mon'];
          $mon = date('t', strtotime($selmon));
          $table = "in_employee";
          $cond = " `in_empid`='$id' ";
          $select = new Selectall();
          $res = $select->getcondData($table,$cond);
          $pay = $res['in_payscale'];
          $basdedu = "";
          ?>
          <div class="card">
            <div class="card-header">
                <div class="card-title font-weight-bold text-info"><i class="fas fa-donate"></i> Salary Structure</div>
                <div class="card-tools">
                  Salary Month : <?php echo date('F', strtotime($selmon));?>
                  <span class="font-weight-bold">(Pay Days : <?php echo $pd;?>)</span>
                </div>
              </div>
              <div class="card-body">
                    
                    <table style="width: 100%;" cellspacing="5" cellpadding="5" class="table-striped">
                      <tr class="bg-secondary">
                        <th>Componantes</th>
                        <th>SalaryRate</th>
                        <th class="text-right">PayableAmount</th>
                      </tr>
                      <?php
                        $table = "in_salarysetup";
                        $cond = " `in_comid`='$comid' AND `in_payscale`='$pay' AND `in_status`='1' ";
                        $select = new Selectall();
                        $salary = $select->getallCond($table,$cond);
                        if(!empty($salary))
                        {
                          $pfarray = array();
                          $esiarry = array();
                          $totalctc = array();
                          $netvalue = array();

                          $ctc = $res['in_salary'];
                          foreach($salary as $sal)
                          {
                            $compoid = $sal['in_compoid'];
                            $table = "in_payscale";
                            $cond = " `in_sno`='$compoid' ";
                            $select = new Selectall();
                            $cmname = $select->getcondData($table,$cond);
                            if($cmname != "")
                            {
                              $comname = $cmname['in_namescle'];
                              $comcat = $cmname['in_category'];
                            }
                            else
                            {
                              $comname = "";
                              $comcat = "";

                            }

                            $flat = $sal['in_flatamount'];
                            $parc = $sal['in_percentage'];
                            $esi = $sal['in_esi'];
                            $pef = $sal['in_pf'];
                            $base = $sal['in_calcubase'];
                            
                            if($comcat == "deduction")
                            {
                              if($flat != "")
                              {
                                $basdedu = $flat;
                                
                              }
                              else
                              {
                                $basdedu = ($ctc*($parc/100));
                              }
                            }
                            else
                            {

                              if($flat != "")
                              {
                                $basval = $flat;
                                $totalctc[] = $basval;
                              }
                              else
                              {
                                $basval = ($ctc*($parc/100));
                                $totalctc[] = $basval;
                              }
                            }
                            // $netdeduct = $pd*($basdedu/$mon);

                            $netamnt = $pd*($basval/$mon);

                            $netvalue[] = $netamnt;
                          ?>
                          <tr>
                            <th><?php echo $comname;?> <small class="font-weight-normal" >(<?php echo ucwords($comcat);?>)</small></th>
                            <td><?php echo $basval;?></td>
                            <td class="text-right"><?php echo round($netamnt);?></td>
                          </tr>
                              <?php
                              

                              $plary = $sal['in_pf'];
                              if($plary == "1")
                              {
                                $pfarray[] = $basval;

                                 
                              }
                              $elary = $sal['in_esi'];
                              if($elary == "1")
                              {
                                $esiarry[] = $basval;
                              }

                          }
                          $table = "in_ratesetup";
                          $cond = " `in_comid`='$comid' ";
                          $select = new Selectall();
                          $rate = $select->getcondData($table,$cond);
                          $spf = $res['in_pfaccess'];
                          $pfcut = $rate['in_epfcutoff'];
                          $pfrate = $rate['in_epfvalue'];
                          if($spf == "1")
                          {
                            $pfval = array_sum($pfarray);

                            $myearning = ($pfval*($pfrate/100));

                            
                            if($rate != "")
                            {
                              
                              if($pfval >= $pfcut)
                              {
                                $setpf = "1800";
                              }
                              else
                              {
                                $setpf = $myearning;
                              }

                              
                            }

                          }
                          else
                          {
                            $setpf = "0";
                          }
                          $sesi = $res['in_esiaccess'];
                          if($sesi == "1");
                          {
                            $esival = array_sum($esiarry);
                            if($rate != "")
                            {
                              $esicut = $rate['in_esicutoff'];
                              $esrate = $rate['in_esivalue'];
                              if($esival > $esicut)
                              {
                                $setesi = "00";
                              }
                              else
                              {
                                $setesi = ($esival*($esrate/100));
                              }
                            }
                          }
                          $netpf = $pd*($setpf/$mon);
                          $netesi = $pd*($setesi/$mon);
                          
                          if($spf == "1")
                          {

                            $netset = array_sum($pfarray);
                            $catsat = $pd*($netset/$mon);

                            $purearning = ($catsat*($pfrate/100));
                            if($rate != "")
                            {
                              
                              if($catsat > $pfcut)
                              {
                                $purpf = "1800";
                              }
                              else
                              {
                                $purpf = $purearning;
                              }

                              
                            }

                          }
                          else
                          {
                            $purpf = "0";
                          }
                          
                          $didval = $purpf+$netesi;
                          $mynet = $setpf+$setesi;
                          $payset = array_sum($totalctc);
                          $netamount = $pd*($payset/$mon);
                          ?>
                          <tr class="table-info">
                            <th>Total CTC</th>
                            <td><?php echo array_sum($totalctc);?></td>
                            <td class="text-right"><?php echo round($netamount);?></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="3" class="table-danger text-center">Dedcution</td>
                          </tr>
                          <tr>
                            <th>Employees Provident Fund</th>
                            <td><?php echo $setpf;?></td>
                            <td class="text-right"><?php echo round($purpf);?></td>
                          </tr><tr>
                            <th>Employees State Insurance</th>
                            <td><?php echo $setesi;?></td>
                            <td class="text-right"><?php echo round($netesi);?></td>
                          </tr>
                          <tr class="bg-success">
                            <th>InHand Salary</th>
                            <td><?php echo $payset-$mynet;?></td>
                            <td class="text-right"><?php echo round($netamount-$didval);?></td>
                          </tr>
                          <?php

                        }
                      ?>
                      
                      
                      
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