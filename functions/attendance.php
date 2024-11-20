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
        case "acceptend":
            $id = $_GET['id'];
            $table = "in_emp_attend";
            $cond = " `in_sno`='$id' ";
            $select = new Selectall();
            $attdat = $select->getcondData($table,$cond);
            if($attdat != "")
            {

                $emi = $attdat['in_empid'];
                $emidate = $attdat['in_logdate'];
                $emicom = $attdat['in_comid'];

                $table = "in_emp_attend";
                $cond = " `in_comid`='$emicom' AND `in_empid`='$emi' AND `in_logdate`='$emidate' ";
                $select = new Selectall();
                $attdam = $select->getallCond($table,$cond);
                
                if(!empty($attdam))
                {
                    foreach($attdam as $dam)
                    {
                        
                        $duration = $dam['in_totalhours'];
                        list($hours, $minutes, $seconds) = explode(':', $duration);
                        $total_seconds += ($hours * 3600) + ($minutes * 60) + $seconds;
                    }
                    $lalfirst = array_pop(array_reverse($attdam));
                    $firtlogin = $lalfirst['in_login'];
                    
                    $lalend = end($attdam);
                    $lastend = $lalend['in_logout'];
                }
                $total_hours = floor($total_seconds / 3600);
                $total_seconds %= 3600;
                $total_minutes = floor($total_seconds / 60);
                $total_seconds %= 60;

                $totalhours = sprintf("%02d:%02d:%02d", $total_hours, $total_minutes, $total_seconds);
                

                $prsedate = $attdat['in_logout'];
                
                if($prsedate != "" && $prsedate != "00:00:00")
                {
                    $rlogin = $attdat['in_rq_intime'];
                    $lofff = $attdat['in_rq_outime'];
                    $logtotl = $attdat['in_rq_totaltime'];
                    $lgdate = $attdat['in_logdate'];
                    $lgday = date('j', strtotime($lgdate));
                    $lgyear = date('Y', strtotime($lgdate));
                    $lgmonth = date('F', strtotime($lgdate));
                    $lgempid = $attdat['in_empid'];
                    

                    $mtlogin = "in_".$lgday."_in";
                    $mtlogof = "in_".$lgday."_out";
                    $mttime = "in_".$lgday."_hours";
                    $mslogin = $lgdate.' '.$firtlogin;
                    $mslogof = $lgdate.' ' .$lastend;

                    $select = new Selectall();
                    $cominfo = $select->companyInfo();
                    if($setting != "")
                    {

                        $comintime = $cominfo['in_intime'];
                    }
                    else
                    {

                        $comintime = "09:30:00";

                    }
                    $grace = $cominfo['in_latelogin'];
                    $grtime = date('H:i:s', strtotime("+ $grace Minutes", strtotime($comintime)));

                    
                    if($grtime <= $rlogin)

                    {
                        $decimalValue = (strtotime($rlogin) - strtotime($comintime)) / 3600;

                        $hours = floor($decimalValue);

                        $decimalPart = $decimalValue - $hours;

                        $minutes = floor($decimalPart * 60);

                        $seconds = round(($decimalPart * 60 - $minutes) * 60);

                        $timeFormat = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

                        $timestuts = "late";
                        

                    }
                    else if($comintime <= $rlogin)
                    {
                        $decimalValue = (strtotime($rlogin) - strtotime($comintime)) / 3600;

                        $hours = floor($decimalValue);

                        $decimalPart = $decimalValue - $hours;

                        $minutes = floor($decimalPart * 60);

                        $seconds = round(($decimalPart * 60 - $minutes) * 60);

                        $timeFormat = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

                        $timestuts = "grace";
                    }

                    else

                    {

                        $decimalValue = (strtotime($comintime) - strtotime($rlogin)) / 3600;

                        $hours = floor($decimalValue);

                        $decimalPart = $decimalValue - $hours;

                        $minutes = floor($decimalPart * 60);

                        $seconds = round(($decimalPart * 60 - $minutes) * 60);

                        $timeFormat = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

                        $timestuts = "early";



                    }

                    $table = "in_emp_attend";
                    $data = " `in_login`='$rlogin', `in_logout`='$lofff', `in_totalhours`='$logtotl', `in_timestatus`='$timestuts', `in_dayleave`='$timeFormat', `in_rqstatus`='0' ";
                    $cond = " `in_sno`='$id' ";
                    $fun = new Functions();
                    $fun->updateData($table,$data,$cond);
                    

                    $table = "in_monthly_attend";
                    $data = " $mtlogin= '$mslogin', $mtlogof='$mslogof', $mttime='$totalhours' ";
                    $cond = " `in_comid`='$comid' AND `in_empid`='$lgempid' AND `in_year`='$lgyear' AND `in_month`='$lgmonth' ";
                   
                    $fun = new Functions();
                    $fun->updateData($table,$data,$cond);
                }
                else
                {
                    $rlogin = $attdat['in_rq_intime'];
                    $select = new Selectall();
                    $cominfo = $select->companyInfo();
                    if($setting != "")
                    {

                        $comintime = $cominfo['in_intime'];
                    }
                    else
                    {

                        $comintime = "09:30:00";

                    }
                    $grace = $cominfo['in_latelogin'];
                    $grtime = date('H:i:s', strtotime("+ $grace Minutes", strtotime($comintime)));

                    
                    if($grtime <= $rlogin)

                    {
                        $decimalValue = (strtotime($rlogin) - strtotime($comintime)) / 3600;

                        $hours = floor($decimalValue);

                        $decimalPart = $decimalValue - $hours;

                        $minutes = floor($decimalPart * 60);

                        $seconds = round(($decimalPart * 60 - $minutes) * 60);

                        $timeFormat = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

                        $timestuts = "late";
                        

                    }
                    else if($comintime <= $rlogin)
                    {
                        $decimalValue = (strtotime($rlogin) - strtotime($comintime)) / 3600;

                        $hours = floor($decimalValue);

                        $decimalPart = $decimalValue - $hours;

                        $minutes = floor($decimalPart * 60);

                        $seconds = round(($decimalPart * 60 - $minutes) * 60);

                        $timeFormat = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

                        $timestuts = "grace";
                    }

                    else

                    {

                        $decimalValue = (strtotime($comintime) - strtotime($rlogin)) / 3600;

                        $hours = floor($decimalValue);

                        $decimalPart = $decimalValue - $hours;

                        $minutes = floor($decimalPart * 60);

                        $seconds = round(($decimalPart * 60 - $minutes) * 60);

                        $timeFormat = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

                        $timestuts = "early";



                    }

                    $lofff = $attdat['in_rq_outime'];
                    $logtotl = $attdat['in_rq_totaltime'];
                    $lgdate = $attdat['in_logdate'];
                    $lgday = date('j', strtotime($lgdate));
                    $lgyear = date('Y', strtotime($lgdate));
                    $lgmonth = date('F', strtotime($lgdate));
                    $lgempid = $attdat['in_empid'];
                    

                    $mtlogin = "in_".$lgday."_in";
                    $mtlogof = "in_".$lgday."_out";
                    $mttime = "in_".$lgday."_hours";
                    $mslogin = $lgdate.' '.$rlogin;
                    $mslogof = $lgdate.' ' .$lofff;

                    
                    $table = "in_emp_attend";
                    $data = " `in_login`='$rlogin', `in_timestatus`='$timestuts', `in_dayleave`='$timeFormat', `in_rqstatus`='0' ";
                    $cond = " `in_sno`='$id' ";
                    $fun = new Functions();
                    $fun->updateData($table,$data,$cond);

                    $table = "in_monthly_attend";
                    $data = " $mtlogin = '$mslogin' ";
                    $cond = " `in_comid`='$comid' AND `in_empid`='$lgempid' AND `in_year`='$lgyear' AND `in_month`='$lgmonth' ";
                    
                    $fun = new Functions();
                    $fun->updateData($table,$data,$cond);
                }
                
            }
            
            header('Location:'.VIEW.'approvals/attendance-approval.php');
        break;
        case "rejectend":
        $id = $_GET['id'];
        $table = "in_emp_attend";
        $data = " `in_rqstatus`='2' ";
        $cond = " `in_sno`='$id' ";
        $fun = new Functions();
        $fun->updateData($table,$data,$cond);
        header('Location:'.VIEW.'approvals/attendance-approval.php');
        break;
        case "editend":
        $id = $_POST['sno'];
        $rlogin = $_POST['inlog'];
        $lofff = $_POST['outlog'];

        $table = "in_emp_attend";
        $cond = " `in_sno`='$id' ";
        $select = new Selectall();
        $attdat = $select->getcondData($table,$cond);
        
        if($attdat != "")
        {
            $prsedate = $attdat['in_logdate'];
            if($lofff != "")
            {
                // $logtotl = $attdat['in_rq_totaltime'];
            $lgdate = $attdat['in_logdate'];
            $lgday = date('j', strtotime($lgdate));
            $lgyear = date('Y', strtotime($lgdate));
            $lgmonth = date('F', strtotime($lgdate));
            $lgempid = $attdat['in_empid'];
            

            $mtlogin = "in_".$lgday."_in";
            $mtlogof = "in_".$lgday."_out";
            $mttime = "in_".$lgday."_hours";
            $mslogin = $lgdate.' '.$rlogin;
            $mslogof = $lgdate.' ' .$lofff;

            $select = new Selectall();
            $cominfo = $select->companyInfo();
            if($setting != "")
            {

                $comintime = $cominfo['in_intime'];
            }
            else
            {

                $comintime = "09:30:00";

            }
            $grace = $cominfo['in_latelogin'];
            $grtime = date('H:i:s', strtotime("+ $grace Minutes", strtotime($comintime)));

            
            if($grtime <= $rlogin)

            {
                $decimalValue = (strtotime($rlogin) - strtotime($comintime)) / 3600;

                $hours = floor($decimalValue);

                $decimalPart = $decimalValue - $hours;

                $minutes = floor($decimalPart * 60);

                $seconds = round(($decimalPart * 60 - $minutes) * 60);

                $timeFormat = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

                $timestuts = "late";
                

            }
            else if($comintime <= $rlogin)
            {
                $decimalValue = (strtotime($rlogin) - strtotime($comintime)) / 3600;

                $hours = floor($decimalValue);

                $decimalPart = $decimalValue - $hours;

                $minutes = floor($decimalPart * 60);

                $seconds = round(($decimalPart * 60 - $minutes) * 60);

                $timeFormat = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

                $timestuts = "grace";
            }

            else

            {

                $decimalValue = (strtotime($comintime) - strtotime($rlogin)) / 3600;

                $hours = floor($decimalValue);

                $decimalPart = $decimalValue - $hours;

                $minutes = floor($decimalPart * 60);

                $seconds = round(($decimalPart * 60 - $minutes) * 60);

                $timeFormat = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

                $timestuts = "early";



            }

            $decimalValue = (strtotime($lofff) - strtotime($rlogin)) / 3600;

            $hours = floor($decimalValue);

            $decimalPart = $decimalValue - $hours;

            $minutes = floor($decimalPart * 60);

            $seconds = round(($decimalPart * 60 - $minutes) * 60);

            $logtotl = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

            $table = "in_emp_attend";
            $data = " `in_login`='$rlogin', `in_logout`='$lofff', `in_totalhours`='$logtotl', `in_timestatus`='$timestuts', `in_dayleave`='$timeFormat', `in_rqstatus`='0' ";
            $cond = " `in_sno`='$id' ";
            $fun = new Functions();
            $fun->updateData($table,$data,$cond);

            $table = "in_monthly_attend";
            $data = " $mtlogin= '$mslogin', $mtlogof='$mslogof', $mttime='$logtotl' ";
            $cond = " `in_comid`='$comid' AND `in_empid`='$lgempid' AND `in_year`='$lgyear' AND `in_month`='$lgmonth' ";
            
            $fun = new Functions();
            $fun->updateData($table,$data,$cond);
            }
            else
            {
                // $logtotl = $attdat['in_rq_totaltime'];
            $lgdate = $attdat['in_logdate'];
            $lgday = date('j', strtotime($lgdate));
            $lgyear = date('Y', strtotime($lgdate));
            $lgmonth = date('F', strtotime($lgdate));
            $lgempid = $attdat['in_empid'];
            

            $mtlogin = "in_".$lgday."_in";
            $mtlogof = "in_".$lgday."_out";
            $mttime = "in_".$lgday."_hours";
            $mslogin = $lgdate.' '.$rlogin;
            $mslogof = $lgdate.' ' .$lofff;

            $select = new Selectall();
            $cominfo = $select->companyInfo();
            if($setting != "")
            {

                $comintime = $cominfo['in_intime'];
            }
            else
            {

                $comintime = "09:30:00";

            }
            $grace = $cominfo['in_latelogin'];
            $grtime = date('H:i:s', strtotime("+ $grace Minutes", strtotime($comintime)));

            
            if($grtime <= $rlogin)

            {
                $decimalValue = (strtotime($rlogin) - strtotime($comintime)) / 3600;

                $hours = floor($decimalValue);

                $decimalPart = $decimalValue - $hours;

                $minutes = floor($decimalPart * 60);

                $seconds = round(($decimalPart * 60 - $minutes) * 60);

                $timeFormat = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

                $timestuts = "late";
                

            }
            else if($comintime <= $rlogin)
            {
                $decimalValue = (strtotime($rlogin) - strtotime($comintime)) / 3600;

                $hours = floor($decimalValue);

                $decimalPart = $decimalValue - $hours;

                $minutes = floor($decimalPart * 60);

                $seconds = round(($decimalPart * 60 - $minutes) * 60);

                $timeFormat = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

                $timestuts = "grace";
            }

            else

            {

                $decimalValue = (strtotime($comintime) - strtotime($rlogin)) / 3600;

                $hours = floor($decimalValue);

                $decimalPart = $decimalValue - $hours;

                $minutes = floor($decimalPart * 60);

                $seconds = round(($decimalPart * 60 - $minutes) * 60);

                $timeFormat = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

                $timestuts = "early";



            }

            $table = "in_emp_attend";
            $data = " `in_login`='$rlogin', `in_timestatus`='$timestuts', `in_dayleave`='$timeFormat', `in_rqstatus`='0' ";
            $cond = " `in_sno`='$id' ";
            $fun = new Functions();
            $fun->updateData($table,$data,$cond);

            $table = "in_monthly_attend";
            $data = " $mtlogin= '$mslogin', $mtlogof='$mslogof', $mttime='$logtotl' ";
            $cond = " `in_comid`='$comid' AND `in_empid`='$lgempid' AND `in_year`='$lgyear' AND `in_month`='$lgmonth' ";
            
            $fun = new Functions();
            $fun->updateData($table,$data,$cond);
            }
            
            
        }
        
        header('Location:'.VIEW.'approvals/attendance-approval.php');

        break;
        case "acceptbrk":
        $id = $_GET['id'];
        $table = "in_empbreak";
        $cond = " `in_sno`='$id' ";
        $select = new Selectall();
        $attdat = $select->getcondData($table,$cond);
        if($attdat != "")
        {
            $prsedate = $attdat['in_breakout'];
            if($prsedate != "")
            {
                $rlogin = $attdat['in_rq_intime'];
                $lofff = $attdat['in_rq_outime'];
                $logtotl = $attdat['in_rq_totaltime'];
                $lgdate = $attdat['in_logdate'];

                $decimalValue = (strtotime($rlogin) - strtotime($lofff)) / 3600;
                $hours = floor($decimalValue);
                $decimalPart = $decimalValue - $hours;
                $minutes = floor($decimalPart * 60);
                $seconds = round(($decimalPart * 60 - $minutes) * 60);
                $timeFormat = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

                $table = "in_empbreak";
                $data = " `in_breakin`='$rlogin', `in_breakout`='$lofff', `in_totalbreak`='$logtotl', `in_rqstatus`='0' ";
                $cond = " `in_sno`='$id' ";
                
                $fun = new Functions();
                $fun->updateData($table,$data,$cond);
            }
            else
            {
                $rlogin = $attdat['in_rq_intime'];

                $table = "in_empbreak";
                $data = " `in_breakin`='$rlogin', `in_rqstatus`='0' ";
                $cond = " `in_sno`='$id' ";
                $fun = new Functions();
                $fun->updateData($table,$data,$cond);
            }
        }
        header('Location:'.VIEW.'approvals/attendance-approval.php');
        break;
        case "rejectbrk":
        $id = $_GET['id'];
        $table = "in_empbreak";
        $data = " `in_rqstatus`='2' ";
        $cond = " `in_sno`='$id' ";
        $fun = new Functions();
        $fun->updateData($table,$data,$cond);
        header('Location:'.VIEW.'approvals/attendance-approval.php');
        break;
        case "editbreak":
        $id = $_POST['sno'];
        $rlogin = $_POST['inlog'];
        $lofff = $_POST['outlog'];

        $table = "in_empbreak";
        $cond = " `in_sno`='$id' ";
        $select = new Selectall();
        $attdat = $select->getcondData($table,$cond);
        
        if($attdat != "")
        {
            $prsedate = $attdat['in_logdate'];
            if($lofff != "")
            {
                $rlogin = $attdat['in_rq_intime'];
                $lofff = $attdat['in_rq_outime'];
                $lgdate = $attdat['in_logdate'];

                $decimalValue = (strtotime($rlogin) - strtotime($lofff)) / 3600;
                $hours = floor($decimalValue);
                $decimalPart = $decimalValue - $hours;
                $minutes = floor($decimalPart * 60);
                $seconds = round(($decimalPart * 60 - $minutes) * 60);
                $timeFormat = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

                $table = "in_empbreak";
                $data = " `in_breakin`='$rlogin', `in_breakout`='$lofff', `in_totalbreak`='$timeFormat', `in_rqstatus`='0' ";
                $cond = " `in_sno`='$id' ";
                $fun = new Functions();
                $fun->updateData($table,$data,$cond);
            }
            else
            {
                $rlogin = $attdat['in_rq_intime'];

                $table = "in_empbreak";
                $data = " `in_breakin`='$rlogin', `in_rqstatus`='0' ";
                $cond = " `in_sno`='$id' ";
                $fun = new Functions();
                $fun->updateData($table,$data,$cond);
            }
        }

        break;
        case "attendcorrection":

        $inlog = $_POST['inlog'];

        $outlog = $_POST['outlog'];

        $sno = $_POST['sno'];

        $logday = $_POST['logday'];

        $emi = $_POST['empid'];

        if($outlog != "")
        {
            $decimalValue = (strtotime($outlog) - strtotime($inlog)) / 3600;

            $hours = floor($decimalValue);

            $decimalPart = $decimalValue - $hours;

            $minutes = floor($decimalPart * 60);

            $seconds = round(($decimalPart * 60 - $minutes) * 60);

            $workHors = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

            $table = "in_emp_attend";

            $data = " `in_rq_intime`='$inlog', `in_rq_outime`='$outlog', `in_rq_totaltime`='$workHors', `in_rqstatus`='1' ";

            $cond = " `in_sno`='$sno' ";

            $fun = new Functions();
            $fun->updateCond($table,$data,$cond);
        }
        else
        {
            $table = "in_emp_attend";

            $data = " `in_rq_intime`='$inlog', `in_rqstatus`='1' ";

            $cond = " `in_sno`='$sno' ";

            $fun = new Functions();
            $fun->updateCond($table,$data,$cond);
        }

        

        
        $table = "in_alertcard";
        $value = " `in_comid`, `in_alertname`, `in_alertslug`, `in_alertime`, `in_alertdate` ";
        $data = " '$comid', 'Attendance' ,'approvals/attendance-approval.php', now(), '$cdate' ";
        $fun->insertData($table, $value, $data);
        header('Location:'.VIEW.'attendance/my-attendance.php');
        break;
        case "breakcorrection":

        $inlog = $_POST['inlog'];
        $outlog = $_POST['outlog'];
        $sno = $_POST['sno'];
        $logdate = $_POST['logdate'];
        $emi = $_POST['empid'];

        $decimalValue = (strtotime($outlog) - strtotime($inlog)) / 3600;

        $hours = floor($decimalValue);

        $decimalPart = $decimalValue - $hours;

        $minutes = floor($decimalPart * 60);

        $seconds = round(($decimalPart * 60 - $minutes) * 60);

        $breakHors = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);


        $table = "in_empbreak";
        $data = " `in_rq_intime`='$inlog', `in_rq_outime`='$outlog', `in_rq_totaltime`='$breakHors', `in_rqstatus`='1' ";
        $cond = " `in_sno`='$sno' ";
        $fun = new Functions();
        $fun->updateCond($table,$data,$cond);
        
        $table = "in_alertcard";
        $value = " `in_comid`, `in_alertname`, `in_alertslug`, `in_alertime`, `in_alertdate` ";
        $data = " '$comid', 'Breaks' ,'approvals/attendance-approval.php', now(), '$cdate' ";
        $fun->insertData($table, $value, $data);
        header('Location:'.VIEW.'attendance/my-attendance.php');

        break;
    }
}