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

		case "attendlogin":



		$table = "in_master_card";

		$cond = " `in_relation`='outSider' ";

		$select = new Selectall();

		$setIp = $select->getcondData($table,$cond);
		if($setIp != "")
		{
			$staip = $setIp['in_status'];
		}
		else
		{
			$staip = "";
		}

		

		if($staip != "1")

		{

			$cip = $_SERVER['REMOTE_ADDR'];

		

		$table = "in_master_card";

		$cond = " `in_prefix`='$cip' ";

		$select = new Selectall();

		$getIp = $select->getcondData($table,$cond);



		if($staip != "1" || $getIp)

		{

			

			

			$select = new Selectall();

			$setting = $select->companyInfo();

			if($setting != "")

			{

				$comintime = $setting['in_intime'];

				

			}

			else

			{

				$comintime = "09:30:00";

			}

		
			$grace = $setting['in_latelogin'];
			$grtime = date('H:i:s', strtotime("+ $grace Minutes", strtotime($comintime)));

        


		if($grtime <= $ftime)

		{
			$decimalValue = (strtotime($ftime) - strtotime($comintime)) / 3600;

			$hours = floor($decimalValue);

			$decimalPart = $decimalValue - $hours;

			$minutes = floor($decimalPart * 60);

			$seconds = round(($decimalPart * 60 - $minutes) * 60);

			$timeFormat = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

			$timestuts = "late";
			

		}
		else if($comintime <= $ftime)
		{
			$decimalValue = (strtotime($ftime) - strtotime($comintime)) / 3600;

			$hours = floor($decimalValue);

			$decimalPart = $decimalValue - $hours;

			$minutes = floor($decimalPart * 60);

			$seconds = round(($decimalPart * 60 - $minutes) * 60);

			$timeFormat = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

			$timestuts = "grace";
		}

		else

		{

			$decimalValue = (strtotime($comintime) - strtotime($ftime)) / 3600;

		    $hours = floor($decimalValue);

		    $decimalPart = $decimalValue - $hours;

		    $minutes = floor($decimalPart * 60);

		    $seconds = round(($decimalPart * 60 - $minutes) * 60);

		    $timeFormat = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

		    $timestuts = "early";



		}

        

        $select = new Selectall();

        $break = $select->empBreak();

        $login = $select->loginStatus();

		$logs = $select->loginLogs();



		if($login != "" || $logs != "" || $break != "")

		{

			$params['empid'] = $empid;

			$params['intime'] = $ftime;

			$params['indate'] = $cdate;

			$params['fuldate'] = $fdate;



			$breakin = $break['in_breakin'];



			$decimalValue = (strtotime($ftime) - strtotime($breakin)) / 3600;

		    $hours = floor($decimalValue);

		    $decimalPart = $decimalValue - $hours;

		    $minutes = floor($decimalPart * 60);

		    $seconds = round(($decimalPart * 60 - $minutes) * 60);

		    $breakMat = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

		    $params['totalbreak'] = $breakMat;

		    $params['brid'] = $break['in_sno'];



		    



			$dash = new Dashboard();

			$dash->breakOut($params);

			$res = $dash->logsEmp($params);

			if($res)

			{



				header("Location:".VIEW."dashboard/index.php?case=logedin");

			}

			else

			{

				header("Location:".VIEW."dashboard/index.php?case=err");

			}

		}

		else

		{

			$params['preid'] = $preid;

			$params['empid'] = $empid;

			$params['fname'] = $fname;

			$params['lname'] = $lname;

			$params['intime'] = $ftime;

			$params['indate'] = $cdate;

			$params['inday'] = date('l', strtotime($cdate));

			$params['cmonth'] = date('F', strtotime($cdate));

			$params['timestuts'] = $timestuts;

			$params['delay'] = $timeFormat;

			$params['fuldate'] = $fdate;

			$params['ip'] = $_SERVER['REMOTE_ADDR'];

			$params['year'] = $ydate;

			

			$table = "in_master_card";
			$cond = " `in_relation`='geoLocation' AND `in_status`='1' ";
			$select = new Selectall();
			$geoloc = $select->getcondData($table,$cond);
			
			if($geoloc != "")
			{
				$latitude = $_POST['latitude'];
				$longitude = $_POST['longitude'];

				if($latitude != "" && $longitude != "")
				{
					$params['latitude'] = $latitude;
					$params['longitude'] = $longitude;

					$table = "in_emp_attend";

					$cond = " `in_empid`='{$params['empid']}' AND `in_logdate`='{$params['indate']}'";

					$select = new Selectall();

					$pelpow = $select->getcondData($table,$cond);



					if($pelpow != "")

					{

						$table = "in_master_card";

						$cond = " `in_relation`='empLogin' AND `in_status`='1'";

						$select = new Selectall();

						$selpow = $select->getcondData($table,$cond);

						if($selpow != "")

						{

							header("Location:".VIEW."dashboard/index.php?case=notlogin");

						}

						else

						{

							$dash = new Dashboard();

							$res = $dash->loginEmp($params);

							$pres = $dash->monthlyEmplogin($params);

							if($res)

							{



								header("Location:".VIEW."dashboard/index.php?case=logedin");

							}

						}

					}

					else

					{

						$dash = new Dashboard();

						$res = $dash->loginEmp($params);

						$pres = $dash->monthlyEmplogin($params);

						if($res)

						{



							header("Location:".VIEW."dashboard/index.php?case=logedin");

						}



					}
				}
				else
				{
					header("Location:".VIEW."dashboard/index.php?case=geoerr");
				}
			}
			else
			{
					$params['latitude'] = $_POST['latitude'];
					$params['longitude'] = $_POST['longitude'];

					$table = "in_emp_attend";

					$cond = " `in_empid`='{$params['empid']}' AND `in_logdate`='{$params['indate']}'";

					$select = new Selectall();

					$pelpow = $select->getcondData($table,$cond);



					if($pelpow != "")

					{

						$table = "in_master_card";

						$cond = " `in_relation`='empLogin' AND `in_status`='1'";

						$select = new Selectall();

						$selpow = $select->getcondData($table,$cond);

						if($selpow != "")

						{

							header("Location:".VIEW."dashboard/index.php?case=notlogin");

						}

						else

						{

							$dash = new Dashboard();

							$res = $dash->loginEmp($params);

							$pres = $dash->monthlyEmplogin($params);

							if($res)

							{



								header("Location:".VIEW."dashboard/index.php?case=logedin");

							}

						}

					}

					else

					{

						$dash = new Dashboard();

						$res = $dash->loginEmp($params);

						$pres = $dash->monthlyEmplogin($params);

						if($res)

						{



							header("Location:".VIEW."dashboard/index.php?case=logedin");

						}



					}
			}

			

			

		}

		}

		

		}

		else

		{

			header("Location:".VIEW."dashboard/index.php?case=iperr");

		}



		

		

		break;

		case "signout":
			if(isset($_POST['signout']))
			{
				$break = $_POST['break'];
				$params['break'] = $break;
				$params['intime'] = $ftime;
				
				$select = new Selectall();
				$selinfo = $select->companyInfo();
				$intime = $selinfo['in_intime'];
				$outime = $selinfo['in_outime'];
				
	
				$malValue = (strtotime($outime) - strtotime($intime)) / 3600;
				$hour = floor($malValue);
				$malPart = $malValue - $hour;
				$minute = floor($malPart * 60);
				$second = round(($malPart * 60 - $minute) * 60);
				$timeWork = sprintf("%02d:%02d:%02d", $hour, $minute, $second);
	
				$fulltime = $selinfo['in_fullhours'];
				$halfTime = $selinfo['in_halfhours'];
				
				
				switch($break)
				{
					case "Tea":
					case "Lunch":
						$select = new Selectall();
						$logs = $select->loginLogs();
						$params['id'] = $logs['in_sno'];
	
						$dash = new Dashboard();
						$res = $dash->breakIn($params);
						$dash->breakEmp($params);
						if($res)
						{
	
							header("Location:".VIEW."dashboard/index.php?case=logedin");
						}
						else
						{
							header("Location:".VIEW."dashboard/index.php?case=err");
						}
					break;
					case "Checkout":
	
						$select = new Selectall();
						$login = $select->loginStatus();
						$params['lid'] = $login['in_sno'];
						$logs = $select->loginLogs();
						$params['gid'] = $logs['in_sno'];
	
						$comintime = $login['in_login'];
	
						$decimalValue = (strtotime($ftime) - strtotime($comintime)) / 3600;
						$hours = floor($decimalValue);
						$decimalPart = $decimalValue - $hours;
						$minutes = floor($decimalPart * 60);
						$seconds = round(($decimalPart * 60 - $minutes) * 60);
						$timeFormat = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
		

						$fday = 0;
						$hday = 0;
						
						$params['empid'] = $empid;
						$params['fuldate'] = $fdate;
						$params['year'] = $ydate;
						$params['cmonth'] = date('F', strtotime($cdate));
						$params['cdate'] = $cdate;
						$cday = date('j', strtotime($cdate));
	
						$table = "in_monthly_attend";
						$cond = " `in_empid`='{$params['empid']}' AND `in_year`='{$params['year']}' AND in_month='{$params['cmonth']}'";
						$select = new Selectall();
						$seltime = $select->getcondData($table,$cond);
						
						$cval = "in_{$cday}_hours";
						$lval = $seltime[$cval];
						$tolhours = $seltime['in_totalhours'];
						$fdays = $seltime['in_days'];
						$hdays = $seltime['in_half'];
						

						
						if($lval == "00:00:00" || $lval == "")
						{
							if($fulltime < $timeFormat)
							{
								$fday = ($fdays+1);
								$params['fday'] = $fday;
							}
							else if($halfTime < $timeFormat)
							{
								// echo "1 count hoga";
								 $hday = ($hdays+0.5);
								$params['hday'] = $hday;
							}
							else
							{
								$params['fday'] = $fdays;
								$params['hday'] = $hdays;
							}

							function timeToSeconds($time)
							{
							    list($hours, $minutes, $seconds) = explode(':', $time);
							    return $hours * 3600 + $minutes * 60 + $seconds;
							}

							function secondsToTime($seconds)
							{
							    $hours = floor($seconds / 3600);
							    $seconds -= $hours * 3600;
							    $minutes = floor($seconds / 60);
							    $seconds -= $minutes * 60;
							    return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
							}

							$totalSeconds = timeToSeconds($timeFormat) + timeToSeconds($tolhours);
							$tolendTime = secondsToTime($totalSeconds);
							
								
							$params['out'] = $timeFormat;
							$params['tolhour'] = $tolendTime;
							$dash = new Dashboard();
							$dash->monthlyEmpout($params);
						}
						else
						{
							function timeToSeconds($time)
							{
							    list($hours, $minutes, $seconds) = explode(':', $time);
							    return $hours * 3600 + $minutes * 60 + $seconds;
							}

							function secondsToTime($seconds)
							{
							    $hours = floor($seconds / 3600);
							    $seconds -= $hours * 3600;
							    $minutes = floor($seconds / 60);
							    $seconds -= $minutes * 60;
							    return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
							}

							
							$inter = timeToSeconds($timeFormat) + timeToSeconds($lval);
							$endTime = secondsToTime($inter);
							

							if($fulltime < $endTime)
							{
								$fday = ($fdays+1);
								$params['fday'] = $fday;
							}
							else if($halfTime < $endTime)
							{
								// echo "1 count hoga";
								 $hday = ($hdays+0.5);
								$params['hday'] = $hday;
							}
							else
							{
								$params['fday'] = $fdays;
								$params['hday'] = $hdays;
							}
	
							


							$totalSeconds = timeToSeconds($timeFormat) + timeToSeconds($tolhours);
							$tolendTime = secondsToTime($totalSeconds);

	
							$params['out'] = $endTime;
							$params['tolhour'] = $tolendTime;
							$dash = new Dashboard();
							$dash->monthlyEmpout($params);
						}
						
						$params['latitude'] = $_POST['latitude'];
						$params['longitude'] = $_POST['longitude'];

						$params['out'] = $timeFormat;
						$dash = new Dashboard();
						$res = $dash->signoutEmp($params);
						
						if($res)
						{
	
							header("Location:".VIEW."dashboard/index.php?case=logedin");
						}
						else
						{
							header("Location:".VIEW."dashboard/index.php?case=err");
						}
					break;
				}
			}
			break;

		case "change":

		if(isset($_POST['changepass']))

		{

			$userpass = $_POST['userpass'];

			$confirmpass = $_POST['confirmpass'];



			if($userpass === $confirmpass)

			{

				$userpass = md5($userpass);

				$table = "in_employee";

				$data = " `in_password`='$userpass', `in_passaccess`='1', `in_passdate`='$cdate' ";

				$id = " `in_empid`='$empid'";

				$fun = new Functions();

				$sfun = $fun->updateData($table,$data,$id);

				header("Location:".VIEW."password/index.php?case=passup");

			}

			else

			{

				header("Location:".VIEW."password/index.php?case=passnt");

			}

		}

		break;

		case "adminpass":

		if(isset($_POST['changepass']))

		{

			$userpass = $_POST['userpass'];

			$confirmpass = $_POST['confirmpass'];



			if($userpass === $confirmpass)

			{

				$userpass = md5($userpass);

				$table = "in_operator";

				$data = " `in_password`='$userpass' ";

				$id = " `in_email`='$adminemail'";

				$fun = new Functions();

				$sfun = $fun->updateData($table,$data,$id);

				header("Location:".VIEW."password/admin-password.php?case=passup");

			}

			else

			{

				header("Location:".VIEW."password/admin-password.php?case=passnt");

			}

		}

		break;

		case "passcode":

		if(isset($_POST['changepass']))

		{

			$userpass = $_POST['userpass'];

			$confirmpass = $_POST['confirmpass'];



			if($userpass === $confirmpass)

			{

				$userpass = md5($userpass);

				$table = "in_operator";

				$data = " `in_passcode`='$userpass' ";

				$id = " `in_email`='$adminemail'";

				$fun = new Functions();

				$sfun = $fun->updateData($table,$data,$id);

				header("Location:".VIEW."password/admin-password.php?case=passup");

			}

			else

			{

				header("Location:".VIEW."password/admin-password.php?case=passnt");

			}

		}

		break;

		case "checkin":

		$table = "in_master_card";

		$cond = " `in_relation`='outSider' ";

		$select = new Selectall();

		$setIp = $select->getcondData($table,$cond);

		$staip = $setIp['in_status'];

		if($staip != "1")

		{

			$cip = $_SERVER['REMOTE_ADDR'];

		

		$table = "in_master_card";

		$cond = " `in_prefix`='$cip' ";

		$select = new Selectall();

		$getIp = $select->getcondData($table,$cond);



			if($staip != "1" || $getIp)

			{

				

				$select = new Selectall();

				$eshift = $select->empShift();

				if($eshift != "")

				{

					$shiftid = $eshift['in_shiftid'];

					$table = "in_companyshift";

					$cond = " `in_sno`='$shiftid' AND `in_company`='$comid' ";

					$select = new Selectall();

					$stime = $select->getcondData($table,$cond);

					$comintime = $stime['in_intime'];

				}

				else

				{

					$select = new Selectall();

					$setting = $select->companyInfo();

					if($setting != "")

					{

						$comintime = $setting['in_intime'];

						

					}

					else

					{

						header("Location:".VIEW."dashboard/index.php?case=comInfo");

						exit();

					}

				}



				if($comintime <= $ftime)

				{

					$decimalValue = (strtotime($ftime) - strtotime($comintime)) / 3600;

				    $hours = floor($decimalValue);

				    $decimalPart = $decimalValue - $hours;

				    $minutes = floor($decimalPart * 60);

				    $seconds = round(($decimalPart * 60 - $minutes) * 60);

				    $timeFormat = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

				    $timestuts = "late";

				}

				else

				{

					$decimalValue = (strtotime($comintime) - strtotime($ftime)) / 3600;

				    $hours = floor($decimalValue);

				    $decimalPart = $decimalValue - $hours;

				    $minutes = floor($decimalPart * 60);

				    $seconds = round(($decimalPart * 60 - $minutes) * 60);

				    $timeFormat = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

				    $timestuts = "early";



				}

				// ----------------------- Login Code ------------------



					$params['preid'] = $preid;

					$params['empid'] = $empid;

					$params['intime'] = $ftime;

					$params['indate'] = $cdate;

					$params['inday'] = date('l', strtotime($cdate));

					$params['cmonth'] = date('F', strtotime($cdate));

					$params['timestuts'] = $timestuts;

					$params['delay'] = $timeFormat;

					$params['fuldate'] = $fdate;

					$params['ip'] = $cip;

					$params['year'] = $ydate;



					$table = "in_attendance";

					$cond = " `in_empid`='{$params['empid']}' AND `in_logdate`='{$params['indate']}' AND `in_checkin` = '00:00:00' ";

					$select = new Selectall();

					$pelpow = $select->getcondData($table,$cond);

					

					if($pelpow != "")

					{

						$table = "in_master_card";

						$cond = " `in_relation`='empLogin' AND `in_status`='1'";

						$select = new Selectall();

						$selpow = $select->getcondData($table,$cond);

						if($selpow != "")

						{

							header("Location:".VIEW."dashboard/index.php?case=notlogin");

						}

						else

						{

							$dash = new Dashboard();

							$res = $dash->loginAttend($params);

							$pres = $dash->monthlyEmplogin($params);

							if($res)

							{

								header("Location:".VIEW."dashboard/index.php?case=logedin");

							}

						}

					}

					else

					{

						$dash = new Dashboard();

						$res = $dash->loginAttend($params);

						$pres = $dash->monthlyEmplogin($params);

						if($res)

						{

							header("Location:".VIEW."dashboard/index.php?case=logedin");

						}



					}





				// ------------------------ Close Login Code -----------------

				

			}

		}

		else

		{

			header("Location:".VIEW."dashboard/index.php?case=iperr");

			exit();

		}



		break;

		

	}

}







