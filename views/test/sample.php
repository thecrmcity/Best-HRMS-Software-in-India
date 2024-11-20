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
if(isset($comid))
{
    $comid = $comid;
}
else
{
    $comid = "1";
}

$value = " in_leavetype.in_sno as leaveid, in_leavesetup.in_autoleave as autoleave, in_leavesetup.in_autoleaveno as autoleaveno, in_leavesetup.in_autoleavedate as autoleavedate ";
$table1 = "in_leavesetup";
$table2 = "in_leavetype";
$match = " in_leavesetup.in_leavename = in_leavetype.in_sno";
$cond = " in_leavetype.in_comid='$comid' AND in_leavetype.in_status ='1' ";

$sel = new Selectall();
$lvstup = $sel->innerAllcond($value,$table1,$table2,$match,$cond);

if(!empty($lvstup))
{
    foreach($lvstup as $lsp)
    {
        $autoleave = $lsp['autoleave'];
        $autodate = $lsp['autoleavedate'];
        $classdate = date('Y-m-').$autodate;
        $classdat = date('Y-m-d', strtotime($classdate));

        if($classdat <= $cdate)
        {
            switch($autoleave)
            {
                case "Monthy":

                $autoleaveno = $lsp['autoleaveno'];
                $leavid = $lsp['leaveid'];

                
                $table = "in_autoclass";
                $cond = " `in_comid`='$comid' AND `in_autoname`='AutoLeave' AND `in_date`='$classdat' ";
                $select = new Selectall();
                $autlov = $select->getcondData($table,$cond);

                if($autlov == "")
                {
                    $table = "in_employee";
                    $cond = " `in_compid`='$comid' AND `in_delete`='1' ";
                    $select = new Selectall();
                    $selemp = $select->getallCond($table,$cond);

                    if(!empty($selemp))
                    {
                        foreach($selemp as $em)
                        {
                            $emo = $em['in_empid'];
                            $com = $em['in_compid'];
                            $pr = $em['in_emprefix'];
                            
                            $table = "in_leavebalance";
                            $cond = " `in_comid`='$com' AND `in_empid`='$emo' AND `in_leaveid`='$leavid' ORDER BY in_sno DESC LIMIT 1 ";
                            $select = new Selectall();
                            $lsemp = $select->getcondData($table,$cond);
                           
                            if($lsemp != "")
                            {
                                $sid = $lsemp['in_sno'];
                                $lbal = $lsemp['in_balance'];
                                $nlbal = ($lbal+$autoleaveno);
                                $table = "in_leavebalance";
                                $value = " `in_comid`, `in_preid`, `in_empid`, `in_leaveid`, `in_leavedetails`, `in_credit`, `in_date`, `in_balance`, `in_status` ";
                                $data = " '$com', '$pr', '$emo', '$leavid', 'Month Credit', '$autoleaveno' , now(), '$nlbal', '1' ";
                                $fun = new Functions();
                                $fun->insertData($table, $value, $data);
                            }
                            else
                            {
                              
                              $lbal = 0;
                              $nlbal = ($lbal+$autoleaveno);
                              $table = "in_leavebalance";
                              $value = " `in_comid`, `in_preid`, `in_empid`, `in_leaveid`, `in_leavedetails`, `in_credit`, `in_date`, `in_balance`, `in_status` ";
                                $data = " '$com', '$pr', '$emo', '$leavid', 'Month Credit', '$autoleaveno' , now(), '$nlbal', '1' ";
                              $fun = new Functions();
                              $fun->insertData($table, $value, $data);
                            }

                        }

                        $table = "in_autoclass";
                        $value = " `in_comid`, `in_autoname`,`in_date`, in_datetime, `in_status` ";
                        $data = " '$comid','AutoLeave','$classdat', now(), '1' ";
                        $fun = new Functions();
                        $fun->insertData($table, $value, $data);

                    }
                    
                }
                
                break;
                
                

            }
        }
    }
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