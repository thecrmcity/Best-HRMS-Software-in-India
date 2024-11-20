<?php
if(isset($comid))
{
    $compid = $comid;
}
else
{
    $compid = "1";
}

$value = " in_leavetype.in_sno as leaveid, in_leavesetup.in_autoleave as autoleave, in_leavesetup.in_autoleaveno as autoleaveno, in_leavesetup.in_autoleavedate as autoleavedate ";
$table1 = "in_leavesetup";
$table2 = "in_leavetype";
$match = " in_leavesetup.in_leavename = in_leavetype.in_sno";
$cond = " in_leavetype.in_comid='$compid' AND in_leavetype.in_status ='1' ";

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

$table = "in_autoclass";
$cond = " `in_comid`='$comid' AND `in_autoname`='AutoLogout' AND `in_date`='$cdate' AND `in_status`='1' ";
$select = new Selectall();
$logan = $select->getcondData($table,$cond);
if($logan == "")
{
    $table = "in_assignedshift";
    $cond = " `in_comid`='$comid' AND `in_empid`='$empid' AND `in_status`='1' ";
    $select = new Selectall();
    $shift = $select->getcondData($table,$cond);
    if($shift != "")
    {
        $shiftid = $shift['in_shiftid'];
        $table = "in_companyshift";
        $cond = " `in_sno`='$shiftid' ";
        $select = new Selectall();
        $shifturn = $select->getcondData($table,$cond);
        $comout = $shifturn['in_outime'];

        $table = "in_emp_attend";
        $cond = " `in_comid`='$comid' AND `in_logout`='00:00:00' AND `in_logdate` != '$cdate' ORDER BY in_logdate DESC LIMIT 1 ";
        $select = new Selectall();
        $attend = $select->getcondData($table,$cond);
        if($attend != "")
        {
            $lastlog = $attend['in_logdate'];
            $lstlogin = $attend['in_login'];
            $table = "in_emp_attend";
            $data = "";
            $cond = " `in_logdate`='$lastlog' ";
            $fun = new Functions();
            $fun->updateCond($table,$data,$cond);
        }

    }
    else
    {
        $select = new Selectall();
        $comif = $select->companyInfo();
        $comout = $comif['in_outime'];
        $comfull = $comif['in_fullhours'];
        $comhalf = $comif['in_halfhours'];
        

        $table = "in_emp_attend";
        $cond = " `in_comid`='$comid' AND `in_logout`='00:00:00' AND `in_logdate` != '$cdate'";
        $select = new Selectall();
        $attend = $select->getallCond($table,$cond);
        
        if(!empty($attend))
        {
            foreach($attend as $att)
            {
                $attin = $att['in_login'];
                $attda = $att['in_logdate'];
                $attcm = $att['in_comid'];
                $attid = $att['in_empid'];
                

                $lastda = date('j', strtotime($attda));
                $lsmont = date('F', strtotime($attda));
                $lsyear = date('Y', strtotime($attda));
                

                $malValue = (strtotime($comout) - strtotime($attin)) / 3600;
                $hour = floor($malValue);
                $malPart = $malValue - $hour;
                $minute = floor($malPart * 60);
                $second = round(($malPart * 60 - $minute) * 60);
                $timeWork = sprintf("%02d:%02d:%02d", $hour, $minute, $second);

                

                $table = "in_emp_attend";
                $data = " `in_logout`='$comout', `in_totalhours`='$timeWork' ";
                $cond = " `in_comid`='$attcm' AND `in_empid`='$attid' AND `in_logdate`='$attda' AND `in_logout`='00:00:00' ";

                $fun = new Functions();
                $fun->updateCond($table,$data,$cond);

                

                $table = "in_monthly_attend";
                $cond = " `in_comid`='$attcm' AND `in_empid`='$attid' AND `in_year`='$lsyear' AND `in_month`='$lsmont' ";
                $select = new Selectall();
                $fullday = $select->getcondData($table,$cond);
                if($fullday != "")
                {
                    $tolhours = $fullday['in_totalhours'];
                    $fday = $fullday['in_days'];
                    $hday = $fullday['in_half'];
                    $tolinter = strtotime($timeWork)-strtotime("00:00:00");
                    $tolendTime = date("H:i:s",strtotime($tolhours)+$tolinter);

                }
                
                if($comfull < $timeWork)
                {
                    $fday = ($fday+1);
                    $pureday = @$fday; 
                    $flsdate = $attda.' '.$comout;

                    $msdate = " in_". $lastda ."_out";
                    $mshour = "in_". $lastda ."_hours";
                    $table = "in_monthly_attend";
                    $data = " $msdate='$flsdate', $mshour = '$timeWork',  `in_totalhours` = '$tolendTime',  `in_days` = '$pureday' ";
                    $cond = " `in_comid`='$attcm' AND `in_empid`='$attid' AND `in_year`='$lsyear' AND `in_month`='$lsmont'";
                    $fun = new Functions();
                    $fun->updateCond($table,$data,$cond);

                }
                else
                {
                    $hday = ($hday+0.5);
                    $purhalf = @$hday;
                    $flsdate = $attda.' '.$comout;
                    
                    $msdate = " in_". $lastda ."_out";
                    $mshour = "in_". $lastda ."_hours";
                    $table = "in_monthly_attend";
                    $data = " $msdate = '$flsdate', $mshour = '$timeWork',  `in_totalhours` = '$tolendTime', `in_half` = '$purhalf' ";
                    $cond = " `in_comid`='$attcm' AND `in_empid`='$attid' AND `in_year`='$lsyear' AND `in_month`='$lsmont'";
                    $fun = new Functions();
                    $fun->updateCond($table,$data,$cond);

                }
                
                

            }
               
            $table = "in_autoclass";
            $value = " `in_comid`, `in_autoname`, `in_date`, `in_datetime`, `in_status` ";
            $data = " '$comid', 'AutoLogout', '$cdate', now(), '1' ";
            $fun = new Functions();
            $fun->insertData($table, $value, $data);
            
        }
    }
    
}
?>
