<?php
header("Content-Type: application/vnd.ms-excel"); 
$fileName = "monthly_attendance_report" . date('Ymd') . ".xlsx"; 
header("Content-Disposition: attachment; filename=\"$fileName\""); 

$bsurl = dirname(dirname(__DIR__));
include_once $bsurl.'/core/core.php';

?>
<table border="1">

    <thead>

      <th>Employee ID</th>

      <th>Employee Name</th>

      <th>Month</th>

      <th>Days</th>

      <th>Holidays</th>

      <th>Week Off</th>

      <th>Late Login</th>

      <th>Late Deduction</th>

      <th>Present Days</th>

      <th>Leaves</th>

      <th>Pay Days</th>
    </thead>

    <tbody>

                  <?php
                  function weekOfMonth($date) {
                    $firstOfMonth = strtotime(date("Y-m-01", $date));
                    return weekOfYear($date) - weekOfYear($firstOfMonth) + 1;
                  }

                  function weekOfYear($date) {
                    $weekOfYear = intval(date("W", $date));
                    if (date('n', $date) == "1" && $weekOfYear > 51) {
                        return 0;
                    }
                    else if (date('n', $date) == "12" && $weekOfYear == 1) {
                        return 53;
                    }
                    else {
                        return $weekOfYear;
                    }
                  }

                   if(isset($_GET['s']))
                    {
                      $s = $_GET['s'];
                      $table = "in_employee";
                      $cond = " `in_compid`='$comid' ORDER BY in_empid ASC";
                      $select = new Selectall();
                      $emps = $select->getallCond($table,$cond);

                      $cmon = date('F',strtotime($s));
                      $condy = date('j', strtotime($s));
                      $em = date('m', strtotime($s));
                      $mdays = date('t', strtotime($s));
                    }
                    else
                    {
                      $table = "in_employee";
                      $cond = " `in_compid`='$comid' ORDER BY in_empid ASC";
                      $select = new Selectall();
                      $emps = $select->getallCond($table,$cond);

                      $cmon = date('F',strtotime($cdate));
                      $condy = date('j', strtotime($cdate));
                      $em = date('m', strtotime($cdate));
                      $mdays = date('t', strtotime($cdate));
                    } 

                    
                    

                    
                    if(!empty($emps))
                    {
                      foreach($emps as $emp)
                      {
                        $no = $emp['in_empid'];

                        $table = "in_monthly_attend";
                        $cond = " `in_comid`='$comid' AND `in_empid`='$no' AND `in_month`='$cmon' AND `in_year`='$ydate'";
                        $select = new Selectall();
                        $rs = $select->getcondData($table,$cond);

                        if($rs != "")
                        {
                          $ps = $emp['in_emprefix'];
                          $prs = $select->prefix($ps);
                          ?>
                       <tr>
                        <td><?php echo $prs.$no?></td>
                        <td><?php echo $emp['in_fname']." ".$emp['in_lname'];?></td>
                        <?php
                        $holday = 0;
                        $weeshol = 0;
                        $daycont = 0;
                        $latein = 0;
                        $absent = 0;
                        $leavtak = 0;
                        $losspay = 0; 

                        $table = "in_applyleaves";
                        $cond = " `in_comid`='$comid' AND `in_empid`='$no' AND MONTH(in_startdate)='$em' AND `in_approvstatus`='1' ";
                        $select = new Selectall();
                        $leas = $select->getallCond($table,$cond);
                        if(!empty($leas))
                        {
                          foreach($leas as $les)
                          {
                            $leavtak =  $leavtak + $les['in_applyday'];

                            $losspay = $losspay + $les['in_lossofpay'];
                          }
                        }

                        for($i=1;$i<=$mdays;$i++)
                        {
                          $workday = date('Y-'.$em.'-'.$i);
                          $table = "in_holidays";
                          $cond = " `in_comid`='$comid' AND `in_leavedate`='$workday' AND `in_status`='1' ";
                          $select = new Selectall();
                          $holisd = $select->getcondData($table,$cond);
                          if($holisd != "")
                          {
                            $holday = $holday+1;
                          }
                          else
                          {
                            $holday = 0;
                          }

                          $nofweek = weekOfMonth(strtotime($workday));
                          $wishdat = date('l', strtotime(date('Y-'.$em.'-'.$i)));


                          switch($nofweek)
                          {
                            case "1":
                              $table = "in_weekoff";
                              $cond = " `in_comid`='$comid' AND `in_days`='$wishdat' AND `in_firstweek` NOT IN('', 'NL') ";
                              $select = new Selectall();
                              $wees = $select->getcondData($table,$cond);
                              if($wees != "")
                              {
                               
                                
                                $weeshol = $weeshol+1;

                              }
                              
                            break;
                            case "2":
                              $table = "in_weekoff";
                              $cond = " `in_comid`='$comid' AND `in_days`='$wishdat' AND `in_secndweek` NOT IN('', 'NL') ";
                              $select = new Selectall();
                              $wees = $select->getcondData($table,$cond);
                              if($wees != "")
                              {
                                $weeshol = $weeshol+1;
                              }
                              
                            break;
                            case "3":
                              $table = "in_weekoff";
                              $cond = " `in_comid`='$comid' AND `in_days`='$wishdat' AND `in_thirdweek` NOT IN('', 'NL') ";
                              $select = new Selectall();
                              $wees = $select->getcondData($table,$cond);
                              if($wees != "")
                              {
                                $weeshol = $weeshol+1;
                              }
                              
                            break;
                            case "4":
                              $table = "in_weekoff";
                              $cond = " `in_comid`='$comid' AND `in_days`='$wishdat' AND `in_forthweek` NOT IN('', 'NL') ";
                              $select = new Selectall();
                              $wees = $select->getcondData($table,$cond);
                              if($wees != "")
                              {
                                $weeshol = $weeshol+1;
                              }
                              
                            break;
                            case "5":
                              $table = "in_weekoff";
                              $cond = " `in_comid`='$comid' AND `in_days`='$wishdat' AND `in_fifthweek` NOT IN('', 'NL') ";
                              $select = new Selectall();
                              $wees = $select->getcondData($table,$cond);
                              if($wees != "")
                              {
                                $weeshol = $weeshol+1;
                              }
                              
                            break;
                          }

                          $selted = "in_".$i."_hours";
                          $totalwork = $rs[$selted];
                          
                          $select = new Selectall();
                          $workdot = $select->companyInfo();
                          $fullday = $workdot['in_fullhours'];
                          $halfday = $workdot['in_halfhours'];
                          $deduct = $workdot['in_deduction'];

                          $table = "in_empbreak";
                          $cond = " `in_comid`='$comid' AND `in_empid`='$no' AND `in_logdate`='$workday' ";
                          $select = new Selectall();
                          $selbrek = $select->getallCond($table,$cond);
                          $time = strtotime('00:00:00');
                          $total_time = 0;
                          if(!empty($selbrek))
                          {
                            foreach($selbrek as $brk)
                            {
                              $ttlbreak = strtotime($brk['in_totalbreak']);
                              $sec_time = $ttlbreak - $time;
                              $total_time = $total_time + $sec_time;
                            }
                            $hours = intval($total_time / 3600);
                            $total_time = $total_time - ($hours * 3600);
                            $min = intval($total_time / 60);
                            $sec = $total_time - ($min * 60);
                            $pbreaks = ("$hours:$min:$sec");
                          }
                          else
                          {
                            $pbreaks = "0:00:00";
                          }
                          

                          if($totalwork != "")
                          {
                            $decimalValue = (strtotime($totalwork) - strtotime($pbreaks)) / 3600;
                            $hours = floor($decimalValue);
                            $decimalPart = $decimalValue - $hours;
                            $minutes = floor($decimalPart * 60);
                            $seconds = round(($decimalPart * 60 - $minutes) * 60);
                            $nethour = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
                          }
                          else
                          {
                            $nethour = "";
                            
                          }

                          if($fullday <= $nethour)
                          {
                            $daycont = $daycont+1;
                          }
                          else if($halfday <= $nethour)
                          {
                            $daycont = $daycont+.5;
                          }
                          else
                          {
                            $daycont = $daycont+0;
                          }
                          $table = "in_emp_attend";
                          $cond = " `in_comid`='$comid' AND `in_empid`='$no' AND `in_logdate`='$workday' ";
                          $select = new Selectall();
                          $selted = $select->getcondData($table,$cond);

                          if($selted != "")
                          {
                            $latlog = $selted['in_timestatus'];
                            if($latlog === 'late')
                            {
                              $latein = $latein+1;
                            }
                          }

                            

                          if($i == $condy)
                          {
                            break;
                          }
                        }
                        ?>
                        <td><?php echo $cmon;?></td>
                        <td><?php echo $mdays?></td>
                        <td><?php echo $holday;?></td>
                        <td><?php echo $weeshol;?></td>
                        <td><?php echo $latein;?></td>
                        <td><?php $latin = ($latein*$deduct); $latins = number_format((float)$latin, 2, '.', ''); echo $latins;?></td>

                        <td><?php echo $daycont;?></td>
                        <td>
                          <?php
                            $taketo = ($leavtak-$losspay);
                            if($taketo <= 0)
                            {
                              echo ($losspay-$leavtak);
                            }
                            else
                            {
                              echo ($leavtak-$losspay);
                            }
                          ?>
                        </td>
                        <td><?php echo ($holday+$weeshol+$daycont)-$latins?></td>
                       </tr>
                       <?php

                        }

                      }
                    }
                    ?>
                       

                </tbody>

  </table>