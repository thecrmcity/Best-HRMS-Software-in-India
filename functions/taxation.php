<?php
if(!defined('BSPATH'))
{
	$bspath = dirname((__DIR__));
	include_once $bspath.'/core/core.php';
}
$params = array();

if(isset($_GET['case']))
{
	$case = $_GET['case'];

	switch($case)
	{
        case "addslab":
            
            $params['finanace'] = $_POST['finanace'];
            $params['oldslabname'] = @$_POST['oldslabname'];
            $params['oldslabvalue'] = @$_POST['oldslabvalue'];
            $params['newslabname'] = @$_POST['newslabname'];
            $params['newslabvalue'] = @$_POST['newslabvalue'];
            $params['olddiffence'] = @$_POST['olddiffence'];
            $params['newdiffence'] = @$_POST['newdiffence'];
    
            
            
            if($_POST['oldslabname'] != "")
            {
                $oldcount = count($_POST['oldslabname']);
                for($i=0;$i<$oldcount;$i++)
                {
                    $table = "in_taxslab";
                    $value = " `in_financeyear`, `in_financenam`, `in_slabname`, `in_slabvalue`, `in_diffence`, `in_createdat`, `in_status` ";
                    $data = " '{$params['finanace']}', 'OldSlab', '{$params['oldslabname'][$i]}', '{$params['oldslabvalue'][$i]}', '{$params['olddiffence'][$i]}', now(), '1'";
                    $fun = new Functions();
                    $fun->insertData($table, $value, $data);
                }
            }
            if($_POST['newslabname'] != "")
            {
                $newcount = count($_POST['newslabname']);
                for($i=0;$i<$newcount;$i++)
                {
                    $table = "in_taxslab";
                    $value = " `in_financeyear`, `in_financenam`, `in_slabname`, `in_slabvalue`, `in_diffence`, `in_createdat`, `in_status` ";
                    $data = " '{$params['finanace']}', 'NewSlab', '{$params['newslabname'][$i]}', '{$params['newslabvalue'][$i]}','{$params['newdiffence'][$i]}', now(), '1'";
                    $fun = new Functions();
                    $fun->insertData($table, $value, $data);
                }
    
            }
            header("Location:".VIEW."taxation/slab-rate.php?case=save");
            
            
            break;
            case "setrate":
            $cessrate = $_POST['cessrate'];
            $table = "in_master_card";
            $value = " `in_prefix`, `in_relation`, `in_status` ";
            $data = " '$cessrate','CessRate','1' ";
            $fun = new Functions();
            $fun->insertData($table, $value, $data);
            header("Location:".VIEW."taxation/tax-calculator.php?case=save");
            break;
            case "editrate":
            $cessrate = $_POST['cessrate'];
            $table = "in_master_card";
            $cond = " `in_relation`='CessRate' ";
            $data = " `in_prefix`='$cessrate' ";
            $fun = new Functions();
            $fun->updateCond($table,$data,$cond);
            header("Location:".VIEW."taxation/tax-calculator.php?case=save");
            break;
            case "itdeclaration":
               $finance = $_POST['finance'];
               $empidc = $_POST['empid'];
               $payer = $_POST['payer'];
               $resident = $_POST['resident'];
               $payscale = $_POST['payscale'];
               $salary = $_POST['salary'];
               $housingloan = $_POST['housingloan'];
               $letoutpay = $_POST['letoutpay'];
               $mcdtax = $_POST['mcdtax'];
               $capitalgain = $_POST['capitalgain'];
               $banksaving = $_POST['banksaving'];
               $otherincome = $_POST['otherincome'];
               $profitgain = $_POST['profitgain'];
               $aggricult = $_POST['aggricult'];
               $hraoxx = $_POST['hraoxx'];
               $columna = $_POST['columna'];
               $columnb = $_POST['columnb'];
               $columnc = $_POST['columnc'];
               $eppf = $_POST['eppf'];
               $empcontri = $_POST['empcontri'];
               $contribution = $_POST['contribution'];
               $medical = $_POST['medical'];
               $eduloan = $_POST['eduloan'];
               $loanfor = $_POST['loanfor'];
               $charity = $_POST['charity'];
               $gettax = $_POST['gettax'];

               $table = "in_itdecalation";
               $value = " `in_comid`, `in_empid`, `in_financeyear`, `in_taxpayer`, `in_residential`, `in_115bac`, `in_previouspay`, `in_housepay`, `in_housingloan`, `in_letoutpay`, `in_mcdtax`, `in_deduction`, `in_capitalgain`, `in_othersource`, `in_savingbank`, `in_otherincome`, `in_profitgain`, `in_agriculture`, `in_houserent`, `in_hra`, `in_columna`, `in_columnb`, `in_columnc`, `in_topdeduction`, `in_80ppf`, `in_80ccd`, `in_80ccdone`, `in_80medical`, `in_80education`, `in_80eeb`, `in_80charity`, `in_columnd`, `in_columne`, `in_columnf`, `in_columng`, `in_createdate`, `in_createdby`, `in_status` ";
               $data = " '$comid', '$empidc', '$finance', '$payer' , '$resident', '$' ";
               $fun = new Functions();
               $fun->insertData($table, $value, $data);
               header("Location:".VIEW."taxation/it-declaration.php?case=save");

            break;
    }
}