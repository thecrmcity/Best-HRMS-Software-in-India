<?php



require_once dirname(__DIR__).'/config/Database.php';





class Dashboard extends Database

{

	public $empid;

	public $fname;

	public $lname;

	public $grid="";

	public $desig;

	public $pemail;

	public $uname;

	public $comid;
	public $preid;



	public $cdate;

	public $fdate;

	public $ftime;

	public $ydate;

	public $mdate;

	public $ddate;



	public $logday;



	public $fetchAll = array();



	public function __construct()

	{

		parent::__construct();



		$this->empid = @$_SESSION['empid'];

		$this->fname = @$_SESSION['fname'];

		$this->lname = @$_SESSION['lnmae'];

		$this->grid = @$_SESSION['grid'];

		$this->desig = @$_SESSION['post'];

		$this->pemail = @$_SESSION['pemail'];

		$this->uname = @$_SESSION['uname'];

		$this->comid = @$_SESSION['comid'];

		$this->preid = @$_SESSION['preid'];



		$this->cdate = date('Y-m-d');

		$this->fdate = date('Y-m-d H:i:s');

		$this->ftime = date('H:i:s');

		$this->ydate = date('Y');

		$this->mdate = date('m');

		$this->ddate = date('d');



		$this->logday = date('l', strtotime($this->cdate));







	}



	public function loginEmp($params)

	{

		$sql = "INSERT INTO `in_emp_attend`(`in_comid`, `in_preid`, `in_empid`, `in_fname`, `in_lname`, `in_login`, `in_logout`, `in_logdate`,`in_logday`, `in_totalhours`, `in_timestatus`,`in_dayleave`, `in_logmodify`, `in_ipaddress`, `in_latitude`, `in_longitude`) VALUES ('$this->comid','{$params['preid']}','{$params['empid']}','{$params['fname']}','{$params['lname']}','{$params['intime']}','','{$params['indate']}','{$params['inday']}','','{$params['timestuts']}','{$params['delay']}','{$params['fuldate']}','{$params['ip']}','{$params['latitude']}', '{$params['longitude']}')";

		

		mysqli_query($this->conn,$sql);

		



		$nsql = "INSERT INTO `in_attend_logs`(`in_sno`, `in_comid`, `in_empid`, `in_intime`, `in_outime`, `in_logdate`, `in_logreason`) VALUES ('','$this->comid','{$params['empid']}','{$params['intime']}','','{$params['indate']}','CheckIn')";

		$nres = mysqli_query($this->conn,$nsql);

		return $nres;

		

	}



	public function breakEmp($params)

	{

		$upsql = "UPDATE `in_attend_logs` SET `in_outime`='{$params['intime']}', `in_logreason`='{$params['break']}' WHERE `in_sno`='{$params['id']}'";

		

		$nres = mysqli_query($this->conn,$upsql);

		return $nres;

	}

	public function breakIn($params)

	{

		$sql = "INSERT INTO `in_empbreak`(`in_comid`, `in_empid`, `in_logdate`, `in_breakin`, `in_breakout`, `in_logname`, `in_status`) VALUES ('$this->comid','$this->empid','$this->cdate','{$params['intime']}','','{$params['break']}','1')";

		

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function breakOut($params)

	{

		$sql = "UPDATE `in_empbreak` SET `in_breakout`='{$params['intime']}',`in_totalbreak`='{$params['totalbreak']}' WHERE `in_sno`='{$params['brid']}'";

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}



	public function logsEmp($params)

	{

		$nsql = "INSERT INTO `in_attend_logs`(`in_sno`, `in_comid`, `in_empid`, `in_intime`, `in_outime`, `in_logdate`, `in_logreason`) VALUES ('','$this->comid','{$params['empid']}','{$params['intime']}','','{$params['indate']}','CheckIn')";

		$nres = mysqli_query($this->conn,$nsql);

		return $nres;

	}



	public function signoutEmp($params)

	{

		$sql = "UPDATE `in_emp_attend` SET `in_logout`='{$params['intime']}', `in_totalhours`='{$params['out']}', `out_latitude`='{$params['latitude']}', `out_longitude`='{$params['longitude']}' WHERE `in_sno` ='{$params['lid']}'";
		
		mysqli_query($this->conn,$sql);



		$upsql = "UPDATE `in_attend_logs` SET `in_outime`='{$params['intime']}', `in_logreason`='{$params['break']}' WHERE `in_sno`='{$params['gid']}'";

		

		$nres = mysqli_query($this->conn,$upsql);

		return $nres;

	}



	public function monthlyEmplogin($params)

	{

		$cdate = $params['indate'];

		$cday = date('d', strtotime($cdate));

		$cmon = date('t', strtotime($cdate));



		for($i=1;$i<=$cmon;$i++)

		{

			if($cday == $i)

			{

				$csql = "SELECT * FROM `in_monthly_attend` WHERE `in_year`='{$params['year']}' AND `in_month`='{$params['cmonth']}' AND `in_empid`='{$params['empid']}'";

				$cres = mysqli_query($this->conn,$csql);

				$crow = mysqli_fetch_assoc($cres);

				if($crow != "")

				{

					$sql = "UPDATE `in_monthly_attend` SET `in_{$i}_in`='{$params['fuldate']}' WHERE `in_empid`='{$params['empid']}' AND `in_year`='{$params['year']}' AND `in_month`='{$params['cmonth']}'";

				

					$res = mysqli_query($this->conn,$sql);

					return $res;

				}

				else

				{

					$sql = "INSERT INTO `in_monthly_attend`(`in_comid`, `in_preid`, `in_empid`, `in_fname`, `in_lname`,`in_{$i}_in`,`in_year`,`in_month`) VALUES('$this->comid', '$this->preid', '{$params['empid']}','{$params['fname']}','{$params['lname']}','{$params['fuldate']}','{$params['year']}','{$params['cmonth']}')";

				

					$res = mysqli_query($this->conn,$sql);

					return $res;

				}





				

			}

			

			

		}

		

	}

	public function monthlyEmpout($params)

	{

		$cdate = $params['cdate'];

		$cday = date('j', strtotime($cdate));

		$cmon = date('t', strtotime($cdate));

		

		

		for($i=1;$i<=$cmon;$i++)

		{

			if($cday == $i)

			{

				$sql = "UPDATE `in_monthly_attend` SET `in_{$i}_out`='{$params['fuldate']}',`in_{$i}_hours`='{$params['out']}',`in_totalhours`='{$params['tolhour']}',`in_days`='{$params['fday']}', `in_half`='{$params['hday']}' WHERE `in_empid`='{$params['empid']}' AND `in_year`='{$params['year']}' AND `in_month`='{$params['cmonth']}'";
				
				$res = mysqli_query($this->conn,$sql);

				

				return $res;



			}

			

			

		}

	}

	public function birthDay()

	{

		$sql = "SELECT CONCAT(`in_fname`,' ',`in_lname`) as fulname, `in_dateofbirth` as birthdate FROM `in_employee` WHERE `in_delete`='1' AND MONTH(in_dateofbirth)='$this->mdate' AND DAY(in_dateofbirth)='$this->ddate' AND `in_dateofbirth`!='$this->cdate' AND `in_compid`='$this->comid'";

		$res = mysqli_query($this->conn,$sql);

		while($row = mysqli_fetch_assoc($res))

		{

			$this->fetchAll[] = $row;

		}

		return $this->fetchAll;



	}

	public function aniveSary()

	{

		$sql = "SELECT CONCAT(`in_fname`,' ',`in_lname`) as fulname, `in_dateofjoining` as joindate FROM `in_employee` WHERE `in_delete`='1' AND MONTH(in_dateofjoining)='$this->mdate' AND DAY(in_dateofjoining)='$this->ddate' AND `in_dateofjoining`!='$this->cdate' AND `in_compid`='$this->comid'";

		$res = mysqli_query($this->conn,$sql);

		while($row = mysqli_fetch_assoc($res))

		{

			$this->fetchAll[] = $row;

		}

		return $this->fetchAll;

	}

	public function upcomingBirthday($setdate)

	{

		$sql = "SELECT CONCAT(`in_fname`,' ',`in_lname`) as fulname, `in_dateofbirth` as birthdate, `in_photo` as profile FROM `in_employee` WHERE MONTH(in_dateofbirth)='$setdate' AND `in_compid`='$this->comid' ORDER BY `in_dateofbirth` ASC";

		$res = mysqli_query($this->conn,$sql);

		while($row = mysqli_fetch_assoc($res))

		{

			$this->fetchAll[] = $row;

		}

		return $this->fetchAll;

	}

	public function upcomingAniversary($setdate)

	{

		$sql = "SELECT CONCAT(`in_fname`,' ',`in_lname`) as fulname, `in_dateofjoining` as aniversary, `in_photo` as profile FROM `in_employee` WHERE MONTH(in_dateofjoining)='$setdate' AND `in_compid`='$this->comid' ORDER BY `in_dateofjoining` ASC";

		$res = mysqli_query($this->conn,$sql);

		while($row = mysqli_fetch_assoc($res))

		{

			$this->fetchAll[] = $row;

		}

		return $this->fetchAll;

	}

	public function loginUser($params)

	{


		$sql = "INSERT INTO `in_logs`(`in_comid`, `in_empid`, `in_preid`, `in_fname`, `in_username`, `in_email`, `in_logname`, `in_logtime`) VALUES ('$this->comid', '{$params['empid']}','{$params['preid']}', '$this->fname', '$this->uname', '$this->pemail', 'Login','$this->fdate')";

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	// public function loginAttend($params)

	// {

	// 	$sql = "UPDATE `in_attendance` SET `in_checkin`='{$params['intime']}', `in_ipaddress`='{$params['ip']}' WHERE `in_comid`='$this->comid' AND `in_empid`='{$params['empid']}' AND `in_lodate`='{$params['indate']}' AND `in_checkout`='00:00:00' ";

	// 	$res = mysqli_query($this->conn,$sql);

	// 	return $res;

	// }





	

}