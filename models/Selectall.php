<?php



require_once dirname(__DIR__).'/config/Database.php';

date_default_timezone_set('Asia/Kolkata');





class Selectall extends Database

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

	public function loginStatus()

	{

		$tsql = "SELECT * FROM `in_emp_attend` WHERE `in_empid`='$this->empid' AND `in_logdate`='$this->cdate' AND `in_logout`='00:00:00' AND `in_comid`='$this->comid' ";

		$tres = mysqli_query($this->conn,$tsql);

		$trow = mysqli_fetch_assoc($tres);

		return $trow;

	}

	public function companyInfo()

	{

		$sql = "SELECT * FROM `in_companyinfo` WHERE `in_status`='1'";

		$res = mysqli_query($this->conn,$sql);

		$row = mysqli_fetch_assoc($res);

		return $row;

	}
	public function weekOff()
	{
		$sql = "SELECT * FROM `in_weekoff` WHERE `in_comid`='$this->comid' AND `in_status`='1'";

		$res = mysqli_query($this->conn,$sql);
		while($row = mysqli_fetch_assoc($res))
		{
			$this->fetchAll[] = $row;

		}
		return $this->fetchAll;
	}

	public function empShift()

	{

		$sql = "SELECT * FROM `in_assignedshift` WHERE `in_comid`='$this->comid' AND `in_empid`='$this->empid' ";

		$res = mysqli_query($this->conn,$sql);

		$row = mysqli_fetch_assoc($res);

		return $row;

	}

	public function compInfo($id)

	{

		$sql = "SELECT * FROM `in_companyinfo` WHERE `in_comid`='$id'";

		$res = mysqli_query($this->conn,$sql);

		$row = mysqli_fetch_assoc($res);

		return $row;

	}

	public function loginLogs()

	{

		$tsql = "SELECT * FROM `in_attend_logs` WHERE `in_comid`='$this->comid' AND `in_empid`='$this->empid' AND `in_outime`='00:00:00' AND `in_logdate`='$this->cdate' ";

		$tres = mysqli_query($this->conn,$tsql);

		$trow = mysqli_fetch_assoc($tres);

		return $trow;

	}

	public function empBreak()

	{

		$sql = "SELECT * FROM `in_empbreak` WHERE `in_comid`='$this->comid' AND `in_empid`='$this->empid' AND `in_logdate`='$this->cdate' AND `in_breakout`='00:00:00' ORDER BY `in_sno` DESC LIMIT 1";

		$res = mysqli_query($this->conn,$sql);

		$row = mysqli_fetch_assoc($res);

		return $row;



	}

	

	public function groups()

	{

		$sql = "SELECT * FROM `in_supervisors` WHERE `in_status`='1'";

		$res = mysqli_query($this->conn,$sql);

		

		while($row = mysqli_fetch_assoc($res))

		{

			$this->fetchAll[] = $row;

		}

		return $this->fetchAll;

	}

	

	public function department()

	{

		$sql = "SELECT * FROM `in_department` WHERE `in_status`='1'";

		$res = mysqli_query($this->conn,$sql);

		

		while($row = mysqli_fetch_assoc($res))

		{

			$this->fetchAll[] = $row;

		}

		return $this->fetchAll;

	}

	public function themeconfig()

	{

		$sql = "SELECT * FROM `in_themeconfig` WHERE `in_empid`='$this->empid' OR `in_empid`='0'";

		$res = mysqli_query($this->conn,$sql);

		$row = mysqli_fetch_assoc($res);

		return $row;

	}

	public function oneData($table,$id)

	{

		$sql = "SELECT * FROM $table WHERE `in_sno`='$id'";

		$res = mysqli_query($this->conn,$sql);

		$row = mysqli_fetch_assoc($res);

		return $row;



	}

	public function oneSelect($table)

	{

		$sql = "SELECT * FROM $table WHERE `in_status`='1'";

		$res = mysqli_query($this->conn,$sql);

		$row = mysqli_fetch_assoc($res);

		return $row;

	}

	public function allSelect($table)

	{

		$sql = "SELECT * FROM $table WHERE `in_status`='1'";

		$res = mysqli_query($this->conn,$sql);

		while($row = mysqli_fetch_assoc($res))

		{

			$this->fetchAll[] = $row;

		}

		return $this->fetchAll;



	}

	public function onlyAll($table)

	{

		$sql = "SELECT * FROM $table";

		$res = mysqli_query($this->conn,$sql);

		while($row = mysqli_fetch_assoc($res))

		{

			$this->fetchAll[] = $row;

		}

		return $this->fetchAll;



	}

	public function getcondData($table,$cond)

	{

		$sql = "SELECT * FROM $table WHERE $cond";

		$res = mysqli_query($this->conn,$sql);

		$row = mysqli_fetch_assoc($res);

		return $row;

	}

	public function getallCond($table,$cond)

	{

		$sql = "SELECT * FROM $table WHERE $cond";
		
		$res = mysqli_query($this->conn,$sql);

		while($row = mysqli_fetch_assoc($res))

		{

			$this->fetchAll[] = $row;

		}

		return $this->fetchAll;

	}

	public function prefix($id)

	{

		$sql = "SELECT * FROM `in_master_card` WHERE `in_sno`='$id' AND `in_relation`='cardPrefix' ";

		$res = mysqli_query($this->conn,$sql);

		$row = mysqli_fetch_assoc($res);
		if($row != "")
		{
			$prename = $row['in_prefix'];
			return $prename;
		}

		

	}

	public function empName($id)

	{

		$sql = "SELECT * FROM `in_employee` WHERE `in_compid`='$this->comid' AND `in_empid`='$id' AND `in_delete`='1' ";
		$res = mysqli_query($this->conn,$sql);
		$row = mysqli_fetch_assoc($res);
		if($row != "")
		{
			$prename = $row['in_fname']." ".$row['in_lname'];
			return $prename;

		}
		
	}

	public function empPrefix($id)

	{

		$sql = "SELECT * FROM `in_employee` WHERE `in_compid`='$this->comid' AND `in_empid`='$id' AND `in_delete`='1' ";
		$res = mysqli_query($this->conn,$sql);
		$row = mysqli_fetch_assoc($res);
		if($row != "")
		{
			$pid = $row['in_emprefix'];
			$prename = $this->prefix($pid);
			return $prename;

		}
		
	}

	public function emPosition($id)

	{

		$sql = "SELECT * FROM `in_employee` WHERE `in_compid`='$this->comid' AND `in_empid`='$id' AND `in_delete`='1' ";
		$res = mysqli_query($this->conn,$sql);
		$row = mysqli_fetch_assoc($res);
		if($row != "")
		{
			$pid = $row['in_designation'];
			$prename = $this->getPosition($pid);
			return $prename;

		}
		
	}

	public function empReporting($id)

	{

		$sql = "SELECT * FROM `in_employee` WHERE `in_compid`='$this->comid' AND `in_empid`='$id' AND `in_delete`='1' ";
		$res = mysqli_query($this->conn,$sql);
		$row = mysqli_fetch_assoc($res);
		if($row != "")
		{
			$pid = $row['in_reporting'];
			$prename = $this->getReporting($pid);
			return $prename;

		}
		
	}

	public function emDepartment($id)

	{

		$sql = "SELECT * FROM `in_employee` WHERE `in_compid`='$this->comid' AND `in_empid`='$id' AND `in_delete`='1' ";
		$res = mysqli_query($this->conn,$sql);
		$row = mysqli_fetch_assoc($res);
		if($row != "")
		{
			$pid = $row['in_department'];
			$prename = $this->getPosition($pid);
			return $prename;

		}
		
	}

	public function checkPass()

	{

		$pdate = $this->passDate();

        $date1= date_create($pdate);

        $date2= date_create($this->cdate);

        $diff = date_diff($date1,$date2);

        $pdays = $diff->format("%a");

        $cday = date('t');

        $rest = $cday-$pdays;

        return $rest;

	}

	public function passDate()

	{

		$table = "in_employee";

        $cond = " `in_compid`='$this->comid' AND `in_empid`='$this->empid'";

        $pass = $this->getcondData($table,$cond);

        if($pass != "")

        {

        	$pdate = $pass['in_passdate'];

        	return $pdate;

        }

        else

        {

        	$pdate = "";

        	return $pdate;

        }

        

	}



	public function checkExpiry($userpro,$id)
	{

		$table = "in_employee";
		$cond = " `in_empid`='$id' AND (`in_email`='$userpro' OR `in_username`='$userpro') AND `in_delete`='1'";
		$pass = $this->getcondData($table,$cond);

        $pdate = $pass['in_passdate'];
        $date1= date_create($pdate);
        $date2= date_create($this->cdate);
        $diff = date_diff($date1,$date2);
        $pdays = $diff->format("%a");
        $cday = date('t');
        $rest = $cday-$pdays;
        return $rest;

	}

	public function innerAllcond($value,$table1,$table2,$match,$cond)

	{

		$sql = "SELECT $value FROM $table1 INNER JOIN $table2 ON $match WHERE $cond";

		

		$res = mysqli_query($this->conn,$sql);

		while($row = mysqli_fetch_assoc($res))

		{

			$this->fetchAll[] = $row;

		}

		return $this->fetchAll;



	}

	public function getallInnercond($table,$inner,$cond)

	{

		$sql = "SELECT $inner FROM $table WHERE $cond";

		$res = mysqli_query($this->conn,$sql);

		while($row = mysqli_fetch_assoc($res))

		{

			$this->fetchAll[] = $row;

		}

		return $this->fetchAll;

	}

	public function getInnercond($table,$inner,$cond)

	{

		$sql = "SELECT $inner FROM $table WHERE $cond";

		$res = mysqli_query($this->conn,$sql);

		$row = mysqli_fetch_assoc($res);

		return $row;

	}

	public function getControle($id,$val)

	{

		$sql = "SELECT * FROM `in_controller` WHERE `in_comid`='$this->comid' AND `in_groupid`='$id' AND `in_slug`='$val'";

		$res = mysqli_query($this->conn,$sql);

		$row = mysqli_fetch_assoc($res);

		if($row != "")

		{

			$sval = $row['in_action'];

		}

		else

		{

			$sval = "";

		}

		

		return $sval;

	}

	public function getDashcontrol($id)

	{

		$sql = "SELECT * FROM `in_dashcontrol` WHERE `in_comid`='$this->comid' AND `in_groupid`='$id' ";

		$res = mysqli_query($this->conn,$sql);

		$row = mysqli_fetch_assoc($res);

		return $row;

	}

	

	public function getCompany($cid)

	{

		$sql = "SELECT * FROM `in_companyinfo` WHERE `in_comid`='$this->comid' AND `in_comid`='$cid' AND `in_status`='1'";

		$res = mysqli_query($this->conn,$sql);

		$row = mysqli_fetch_assoc($res);

		return $row;

	}
	public function getDepartment($id)
	{
		$table = "in_master_card";
		$cond = " `in_sno`='$id' ";
		$palval = $this->getcondData($table,$cond);
		if($palval != "")
		{
			$palnam = $palval['in_prefix'];
			return $palnam;
		}
	}
	public function getPosition($id)
	{
		$table = "in_master_card";
		$cond = " `in_sno`='$id' ";
		$palval = $this->getcondData($table,$cond);
		if($palval != "")
		{
			$palnam = $palval['in_prefix'];
			return $palnam;
		}
	}

	public function getFullname($id)
	{
		$table = "in_employee";
		$cond = " `in_compid`='$this->comid' AND `in_empid`='$id' AND `in_delete`='1' ";
		$pardata = $this->getcondData($table,$cond);
		if($pardata != "")
		{
			$getData = $pardata['in_fname']." ".$pardata['in_lname'];
			return $getData;
		}
	}

	public function getReporting($id)
	{
		$table = "in_employee";
		$cond = " `in_compid`='$this->comid' AND `in_empid`='$id' AND `in_delete`='1' "; 
		$parset = $this->getcondData($table,$cond);
		if($parset != "")
		{
			$getData = $parset['in_fname']." ".$parset['in_lname'];
			return $getData;
		}
	}

	public function getCategory($id)
	{
		$table = "in_master_card";
		$cond = " `in_sno`='$id' ";
		$palval = $this->getcondData($table,$cond);
		if($palval != "")
		{
			$palnam = $palval['in_prefix'];
			return $palnam;
		}
	}

	public function getMasterdata($id)
	{
		$table = "in_master_card";
		$cond = " `in_sno`='$id' ";
		$palval = $this->getcondData($table,$cond);
		if($palval != "")
		{
			$palnam = $palval['in_prefix'];
			return $palnam;
		}
	}

	public function getTemplate($id)
	{
		$table = "in_templates";
		$cond = " `in_sno`='$id' ";
		$palval = $this->getcondData($table,$cond);
		if($palval != "")
		{
			$palnam = $palval['in_tempname'];
			return $palnam;
		}
	}

	public function getLocation($id)
	{
		$table = "in_master_card";
		$cond = " `in_sno`='$id' ";
		$palval = $this->getcondData($table,$cond);
		if($palval != "")
		{
			$palnam = $palval['in_prefix'];
			return $palnam;
		}
	}

	public function getCaname($id)
	{
		$table = "in_candidates";
		$cond = " `in_sno`='$id' ";
		$palval = $this->getcondData($table,$cond);
		if($palval != "")
		{
			$palnam = $palval['in_caname'];
			return $palnam;
		}
	}
	public function applyPost($id)
	{
		$table = "in_jobapplication";
		$cond = " `in_sno`='$id' ";
		$palval = $this->getcondData($table,$cond);
		if($palval != "")
		{
			$palnam = $palval['in_jobtitle'];
			return $palnam;
		}
	}
	

	public function getResume($id)
	{
		$table = "in_candidates";
		$cond = " `in_sno`='$id' ";
		$palval = $this->getcondData($table,$cond);
		if($palval != "")
		{
			$palnam = $palval['in_resume'];
			return $palnam;
		}
	}
	public function getempState($id)
	{
		$table = "in_candidates";
		$cond = " `in_sno`='$id' ";
		$palval = $this->getcondData($table,$cond);
		if($palval != "")
		{
			$state = $palval['in_permastate'];
			$palnam = $this->getState($state);
			return $palnam;
		}
	}
	public function getState($id)
	{
		$table = "in_worldcity";
		$cond = " `in_sno`='$id' ";
		$palval = $this->getcondData($table,$cond);
		if($palval != "")
		{
			$palnam = $palval['in_statename'];
			return $palnam;
		}
	}

	
	

}