<?php



require_once dirname(__DIR__).'/config/Database.php';

date_default_timezone_set('Asia/Kolkata');





class Functions extends Database

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

	
	public function insertData($table, $value, $data)

	{

		$sql = "INSERT INTO $table ($value) VALUES($data)";
		
		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function updateData($table,$data,$id)

	{

		$sql = "UPDATE $table SET $data WHERE $id";
		
		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function updateCond($table,$data,$cond)

	{

		$sql = "UPDATE $table SET $data WHERE $cond";

			
		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function delData($table,$id)

	{

		$sql = "DELETE FROM $table WHERE $id";

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function insertTask($params)

	{

		$sql = "INSERT INTO `in_teamtask`( `in_comid`, `in_preid`, `in_empid`, `in_project`, `in_reportype`, `in_sodeodate`, `in_invetedhours`,`in_complete`, `in_startdate`, `in_endate`, `in_billingmonth`, `in_taskmodular`, `in_parentask`, `in_childtask`, `in_primaryman`, `in_otherman`, `in_dependanci`, `in_anyremarks`, `in_createdat`, `in_createdby`,`in_modified`, `in_status`) VALUES ('{$params['comid']}','{$params['preid']}','{$params['empid']}', '{$params['project']}','{$params['reportype']}','{$params['prodate']}','{$params['protime']}','{$params['complete']}','{$params['startdate']}','{$params['enddate']}','{$params['billingmonth']}','{$params['taskmodular']}','{$params['parentask']}','{$params['subtask']}','{$params['primaryres']}','{$params['otherrepon']}','{$params['dependenci']}','{$params['remarks']}','{$params['created']}','{$params['createdby']}',now(),'1')";

		
		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function insertShift($params)

	{

		$sql = "INSERT INTO `in_companyshift`(`in_sno`, `in_company`, `in_shiftname`, `in_intime`,`in_sameday`, `in_outime`, `in_hours`,`in_lunch`, `in_break`, `in_createdat`, `in_createdby`, `in_status`) VALUES ('', '{$params['comname']}','{$params['shiftname']}','{$params['intime']}','{$params['nextday']}','{$params['outime']}','{$params['hours']}','{$params['lunch']}','{$params['break']}',now(),'{$params['user']}','{$params['shiftcheck']}')";

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function updateShift($params)

	{

		$sql = "UPDATE `in_companyshift` SET `in_company`='{$params['comname']}', `in_shiftname`='{$params['shiftname']}', `in_intime`='{$params['intime']}', `in_sameday`='{$params['nextday']}',`in_outime`='{$params['outime']}', `in_hours`='{$params['hours']}', `in_lunch`='{$params['lunch']}', `in_break`='{$params['break']}', `in_createdat`=now(), `in_createdby`='{$params['user']}', `in_status`='{$params['shiftcheck']}' WHERE `in_sno`='{$params['id']}'";

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}
	public function alertcard($alertname, $alertslug)
	{
		$sql = "INSERT INTO `in_alertcard` (`in_comid`, `in_alertname`, `in_alertslug`, `in_alertime`, `in_alertdate`, `in_status`) VALUES( '$this->comid', '$alertname', '$alertslug', '$this->fdate', '$this->cdate', '1')";
		$res = mysqli_query($this->conn,$sql);

		return $res;
	}

	

}