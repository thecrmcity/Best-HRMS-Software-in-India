<?php



require_once dirname(__DIR__).'/config/Database.php';





class Userlogin extends Database

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



	public function loginprocess($userpro,$passpro)

	{

		$sql = "SELECT * FROM in_employee WHERE (in_email='$userpro' OR in_username='$userpro') AND in_password='$passpro' AND in_delete='1' AND in_passaccess='1'";

		$res = mysqli_query($this->conn,$sql);

		$row = mysqli_fetch_assoc($res);

		return $row;

	}



	public function checkLogin($userpro)

	{

		$sql = "SELECT * FROM in_employee WHERE (in_email='$userpro' OR in_username='$userpro') AND in_delete='1'";

		$res = mysqli_query($this->conn,$sql);

		$row = mysqli_fetch_assoc($res);

		return $row;

	}

	public function updatePass($params)

	{

		$sql = "UPDATE in_employee SET in_password='{$params['userpass']}', in_passaccess='1', in_passdate='{$params['date']}' WHERE in_empid='{$params['id']}'";

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}



	public function userlog($params)

	{

		$sql = "INSERT INTO `in_logs`(`in_sno`, `in_comid`, `in_empid`, `in_preid`, `in_fname`, `in_username`, `in_email`, `in_logname`,`in_logtime`) VALUES ('', '{$params['coid']}', '{$params['empid']}','{$params['preid']}','{$params['fname']}', '{$params['fuser']}', '{$params['femail']}', 'Login', now())";

		$res = mysqli_query($this->conn, $sql);

		return $res;

	}

	public function userlogout($params)

	{

		$sql = "INSERT INTO `in_logs`(`in_sno`, `in_comid`, `in_empid`, `in_preid`, `in_fname`, `in_username`, `in_email`, `in_logname`,`in_logtime`) VALUES ('', '{$params['coid']}', '{$params['empid']}','{$params['preid']}','{$params['fname']}', '{$params['fuser']}', '{$params['femail']}', 'Logout', now())";

		$res = mysqli_query($this->conn, $sql);

		return $res;



	}

	public function autologOut($params)

	{

		$sql = "INSERT INTO `in_logs`(`in_sno`, `in_comid`, `in_empid`, `in_preid`, `in_fname`, `in_username`, `in_email`, `in_logname`,`in_logtime`) VALUES ('', '{$params['coid']}', '{$params['empid']}','{$params['preid']}','{$params['fname']}', '{$params['fuser']}', '{$params['femail']}', 'AutoLogout', now())";

		$res = mysqli_query($this->conn, $sql);

		return $res;



	}



	public function loginRest($userpro)

	{

		$sql = "SELECT * FROM in_employee WHERE (in_email='$userpro' OR in_username='$userpro') AND in_delete='1' AND in_passaccess='1'";

		$res = mysqli_query($this->conn,$sql);

		$row = mysqli_fetch_assoc($res);

		if($row == true)

		{

			$uql = "UPDATE in_employee SET in_password='', in_passaccess='2' WHERE (in_email='$userpro' OR in_username='$userpro') AND in_delete='1'";

			$rest = mysqli_query($this->conn,$uql);

			$msg = "Success, Password Request Sent to admin.";

			return $msg;

		}

		else

		{

			$msg = "Warning, Alert! Employee Not Exists.";

			return $msg;

		}

		

		

	}

}