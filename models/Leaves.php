<?php



require_once dirname(__DIR__).'/config/Database.php';





class Leaves extends Database

{

	public $empid;

	public $fname;

	public $lname;

	public $grid;

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





	}

	public function leaveSetup($params)

	{

		$sql = "INSERT INTO `in_leavesetup`(`in_comid`,`in_leavename`, `in_effectivedate`, `in_encashment`, `in_minibalance`, `in_autoleave`, `in_autoleaveno`, `in_autoleavedate`, `in_lapsmonth`,`in_leaveallotment`, `in_allotconfirmdate`, `in_leaveavailment`, `in_availconfirmdate`, `in_carryforward`, `in_carrymonth`, `in_lowerlimit`, `in_higherlimit`, `in_createdat`, `in_status`) VALUES ('$this->comid', '{$params['leavetype']}','{$params['effectivefrom']}','{$params['encashment']}','{$params['minibalance']}','{$params['autoleave']}','{$params['leavesno']}','{$params['autoleavedate']}', '{$params['leavexpire']}','{$params['allot']}','{$params['allotdate']}','{$params['avail']}','{$params['availdate']}','{$params['carryforward']}','{$params['carrymonth']}','{$params['lowertext']}','{$params['highertext']}',now(),'{$params['typecheck']}')";

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function updateSetup($params)

	{

		$sql = "UPDATE `in_leavesetup` SET `in_comid`='$this->comid', `in_leavename`='{$params['leavetype']}',`in_effectivedate`='{$params['effectivefrom']}',`in_encashment`='{$params['encashment']}',`in_minibalance`='{$params['minibalance']}',`in_autoleave`='{$params['autoleave']}',`in_autoleaveno`='{$params['leavesno']}', `in_autoleavedate`='{$params['autoleavedate']}' , `in_lapsmonth`='{$params['leavexpire']}',`in_leaveallotment`='{$params['allot']}',`in_allotconfirmdate`='{$params['allotdate']}',`in_leaveavailment`='{$params['avail']}',`in_availconfirmdate`='{$params['availdate']}',`in_carryforward`='{$params['carryforward']}',`in_carrymonth`='{$params['carrymonth']}', `in_lowerlimit`='{$params['lowertext']}',`in_higherlimit`='{$params['highertext']}',`in_createdat`= now(),`in_status`='{$params['typecheck']}' WHERE `in_sno`='{$params['id']}'";



		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	

	public function leaveGroup($params)
	{
		$cantrash = $params['cantrash'];
		foreach($cantrash as $can)
		{
			
			$table = "in_employee";
			$cond = " `in_empid`='$can' AND `in_delete`='1' ";
			$select = new Selectall();
			$silch = $select->getcondData($table,$cond);
			if($silch != "")
			{
				$emi = $silch['in_empid'];
				$pre = $silch['in_emprefix'];
				$fullname = $silch['in_fname']." ".$silch['in_lname'];
				$desi = $silch['in_designation'];
				$depa = $silch['in_department'];

				$sql = "INSERT INTO `in_leavegrouping`(`in_comid`, `in_preid`, `in_empid`, `in_fullname`, `in_designation`, `in_department`, `in_clubname`, `in_leavetypes`, `in_priority`, `in_grouptype`, `in_status`) VALUES ('{$params['comid']}', '$pre', '$emi', '$fullname', '$desi', '$depa', '{$params['clubname']}', '{$params['leavfull']}', '{$params['proxid']}','{$params['grtype']}', '1')";
				

				$res = mysqli_query($this->conn,$sql);

				
			}
			
		}
		return $res;
		
	}

}