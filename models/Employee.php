<?php



require_once dirname(__DIR__).'/config/Database.php';





class Employee extends Database

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

	public function addEmployee($params,$datafiled,$datavalue)

	{
		if($datafiled != "" || $datavalue != "")
		{
			$sql = "INSERT INTO `in_employee`(`in_empid`, `in_groupid`, `in_childid`, `in_multicom`, `in_compid`, `in_emprefix`, `in_fname`, `in_lname`, `in_email`, `in_username`, `in_delete`, `in_createdon`, `in_reporting`, `in_designation`, `in_mobileno`, `in_fathernam`, `in_dateofbirth`, `in_gender`, `in_marital`, `in_photo`, `in_localadd1`, `in_localadd2`, `in_localcity`, `in_localstate`, `in_localconty`, `in_localpostal`, `in_parmaadd1`, `in_permaadd2`, `in_parmacity`, `in_permastate`, `in_permaconty`, `in_permapostal`, `in_worklocation`, `in_department`, `in_dateofjoining`, `in_probation`, `in_salary`, `in_payscale`, `in_panno`, `in_tds`, `in_pfaccess`, `in_pfnumber`, `in_unnumber`, `in_pfeffective`, `in_esiaccess`, `in_esinumber`, `in_esiceffective`,  `in_retirement`, `in_retirementage`, `in_edulevel`, `in_eduboard`, `in_eduyear`, `in_edumarks`, `in_eduattachment`, `in_employer`, `in_lastposition`, `in_jobfrom`, `in_jobto`, `in_jobproof`, $datafiled) VALUES ('{$params['emplid']}', '{$params['role']}','{$params['wcategory']}','{$params['multicom']}','{$params['comid']}','{$params['cardprefix']}','{$params['fname']}','{$params['lname']}','{$params['useremail']}','{$params['usrename']}','1', now(), '{$params['reporting']}','{$params['designation']}','{$params['mobileone']}','{$params['fthername']}','{$params['dateofbirth']}', '{$params['gender']}','{$params['marital']}','{$params['profile']}','{$params['addone']}','{$params['addtwo']}','{$params['city']}','{$params['cstate']}','{$params['country']}','{$params['localpostal']}','{$params['paddone']}','{$params['paddtwo']}','{$params['pcity']}','{$params['pstate']}','{$params['pcountry']}','{$params['ppostalcode']}', '{$params['wlocation']}','{$params['department']}','{$params['dateofjoin']}', '{$params['probation']}','{$params['salary']}','{$params['payscale']}', '{$params['panno']}','{$params['tdscheck']}','{$params['pfcheck']}','{$params['pfno']}','{$params['unno']}', '{$params['pfdate']}','{$params['esicheck']}','{$params['esino']}','{$params['esidate']}','{$params['retiredate']}','{$params['retireage']}', '{$params['edulevel']}','{$params['edubord']}','{$params['eduyear']}','{$params['edumarks']}','{$params['eduattach']}','{$params['comname']}','{$params['compos']}','{$params['comfrom']}','{$params['comend']}','{$params['comattach']}',$datavalue)";


			$res = mysqli_query($this->conn,$sql);

			return $res;
		}
		else
		{
			$sql = "INSERT INTO `in_employee`(`in_empid`, `in_groupid`, `in_childid`, `in_multicom`, `in_compid`, `in_emprefix`, `in_fname`, `in_lname`, `in_email`, `in_username`, `in_delete`, `in_createdon`, `in_reporting`, `in_designation`, `in_mobileno`, `in_fathernam`, `in_dateofbirth`, `in_gender`, `in_marital`, `in_photo`, `in_localadd1`, `in_localadd2`, `in_localcity`, `in_localstate`, `in_localconty`, `in_localpostal`, `in_parmaadd1`, `in_permaadd2`, `in_parmacity`, `in_permastate`, `in_permaconty`, `in_permapostal`, `in_worklocation`, `in_department`, `in_dateofjoining`, `in_probation`, `in_salary`, `in_payscale`, `in_panno`, `in_tds`, `in_pfaccess`, `in_pfnumber`, `in_unnumber`, `in_pfeffective`, `in_esiaccess`, `in_esinumber`, `in_esiceffective`,  `in_retirement`, `in_retirementage`, `in_edulevel`, `in_eduboard`, `in_eduyear`, `in_edumarks`, `in_eduattachment`, `in_employer`, `in_lastposition`, `in_jobfrom`, `in_jobto`, `in_jobproof`) VALUES ('{$params['emplid']}', '{$params['role']}','{$params['wcategory']}','{$params['multicom']}','{$params['comid']}','{$params['cardprefix']}','{$params['fname']}','{$params['lname']}','{$params['useremail']}','{$params['usrename']}','1', now(), '{$params['reporting']}','{$params['designation']}','{$params['mobileone']}','{$params['fthername']}','{$params['dateofbirth']}', '{$params['gender']}','{$params['marital']}','{$params['profile']}','{$params['addone']}','{$params['addtwo']}','{$params['city']}','{$params['cstate']}','{$params['country']}','{$params['localpostal']}','{$params['paddone']}','{$params['paddtwo']}','{$params['pcity']}','{$params['pstate']}','{$params['pcountry']}','{$params['ppostalcode']}', '{$params['wlocation']}','{$params['department']}','{$params['dateofjoin']}', '{$params['probation']}','{$params['salary']}','{$params['payscale']}', '{$params['panno']}','{$params['tdscheck']}','{$params['pfcheck']}','{$params['pfno']}','{$params['unno']}', '{$params['pfdate']}','{$params['esicheck']}','{$params['esino']}','{$params['esidate']}','{$params['retiredate']}','{$params['retireage']}', '{$params['edulevel']}','{$params['edubord']}','{$params['eduyear']}','{$params['edumarks']}','{$params['eduattach']}','{$params['comname']}','{$params['compos']}','{$params['comfrom']}','{$params['comend']}','{$params['comattach']}')";

			
			$res = mysqli_query($this->conn,$sql);

			return $res;
		}
		



	}

	public function updateEmployee($params,$datafiled)

	{
		if($datafiled != "")
		{
			$sql = "UPDATE `in_employee` SET `in_empid`='{$params['id']}' , `in_groupid`='{$params['role']}',`in_childid`='{$params['wcategory']}',`in_multicom`='{$params['multicom']}',`in_compid`='{$params['comid']}',`in_emprefix`='{$params['preid']}',`in_fname`='{$params['fname']}',`in_lname`='{$params['lname']}',`in_email`='{$params['useremail']}', `in_modifyat`=now(), `in_reporting`='{$params['reporting']}',`in_designation`='{$params['designation']}',`in_mobileno`='{$params['mobileone']}',`in_fathernam`='{$params['fthername']}',`in_dateofbirth`='{$params['dateofbirth']}',`in_gender`='{$params['gender']}',`in_marital`='{$params['marital']}',`in_photo`='{$params['profile']}',`in_localadd1`='{$params['addone']}',`in_localadd2`='{$params['addtwo']}',`in_localcity`='{$params['city']}',`in_localstate`='{$params['cstate']}',`in_localconty`='{$params['country']}',`in_localpostal`='{$params['localpostal']}',`in_parmaadd1`='{$params['paddone']}',`in_permaadd2`='{$params['paddtwo']}',`in_parmacity`='{$params['pcity']}',`in_permastate`='{$params['pstate']}',`in_permaconty`='{$params['pcountry']}',`in_permapostal`='{$params['ppostalcode']}',`in_worklocation`='{$params['wlocation']}',`in_department`='{$params['department']}',`in_dateofjoining`='{$params['dateofjoin']}',`in_probation`='{$params['probation']}',`in_salary`='{$params['salary']}',`in_payscale`='{$params['payscale']}',`in_panno`='{$params['panno']}',`in_tds`='{$params['tdscheck']}',`in_pfaccess`='{$params['pfcheck']}',`in_pfnumber`='{$params['pfno']}',`in_unnumber`='{$params['unno']}',`in_pfeffective`='{$params['pfdate']}',`in_esiaccess`='{$params['esicheck']}', `in_esinumber`='{$params['esino']}', `in_esiceffective`='{$params['esidate']}', `in_edulevel`='{$params['edulevel']}', `in_eduboard`='{$params['edubord']}', `in_eduyear`='{$params['eduyear']}',`in_edumarks`='{$params['edumarks']}', `in_eduattachment`='{$params['eduattach']}', `in_employer`='{$params['comname']}', `in_lastposition`='{$params['compos']}', `in_jobfrom`='{$params['comfrom']}', `in_jobto`='{$params['comend']}', `in_jobproof`='{$params['comattach']}', $datafiled WHERE `in_empid`='{$params['id']}'";
			
			$res = mysqli_query($this->conn,$sql);

			return $res;
		}
		else
		{
			$sql = "UPDATE `in_employee` SET `in_empid`='{$params['id']}' , `in_groupid`='{$params['role']}',`in_childid`='{$params['wcategory']}',`in_multicom`='{$params['multicom']}',`in_compid`='{$params['comid']}',`in_emprefix`='{$params['preid']}',`in_fname`='{$params['fname']}',`in_lname`='{$params['lname']}',`in_email`='{$params['useremail']}', `in_modifyat`=now(), `in_reporting`='{$params['reporting']}',`in_designation`='{$params['designation']}',`in_mobileno`='{$params['mobileone']}',`in_fathernam`='{$params['fthername']}',`in_dateofbirth`='{$params['dateofbirth']}',`in_gender`='{$params['gender']}',`in_marital`='{$params['marital']}',`in_photo`='{$params['profile']}',`in_localadd1`='{$params['addone']}',`in_localadd2`='{$params['addtwo']}',`in_localcity`='{$params['city']}',`in_localstate`='{$params['cstate']}',`in_localconty`='{$params['country']}',`in_localpostal`='{$params['localpostal']}',`in_parmaadd1`='{$params['paddone']}',`in_permaadd2`='{$params['paddtwo']}',`in_parmacity`='{$params['pcity']}',`in_permastate`='{$params['pstate']}',`in_permaconty`='{$params['pcountry']}',`in_permapostal`='{$params['ppostalcode']}',`in_worklocation`='{$params['wlocation']}',`in_department`='{$params['department']}',`in_dateofjoining`='{$params['dateofjoin']}',`in_probation`='{$params['probation']}',`in_salary`='{$params['salary']}',`in_payscale`='{$params['payscale']}',`in_panno`='{$params['panno']}',`in_tds`='{$params['tdscheck']}',`in_pfaccess`='{$params['pfcheck']}',`in_pfnumber`='{$params['pfno']}',`in_unnumber`='{$params['unno']}',`in_pfeffective`='{$params['pfdate']}',`in_esiaccess`='{$params['esicheck']}', `in_esinumber`='{$params['esino']}', `in_esiceffective`='{$params['esidate']}', `in_edulevel`='{$params['edulevel']}', `in_eduboard`='{$params['edubord']}', `in_eduyear`='{$params['eduyear']}',`in_edumarks`='{$params['edumarks']}', `in_eduattachment`='{$params['eduattach']}', `in_employer`='{$params['comname']}', `in_lastposition`='{$params['compos']}', `in_jobfrom`='{$params['comfrom']}', `in_jobto`='{$params['comend']}', `in_jobproof`='{$params['comattach']}' WHERE `in_empid`='{$params['id']}'";

			
			$res = mysqli_query($this->conn,$sql);

			return $res;
		}
		



	}

	public function updateWithoutpro($params,$datafiled)

	{
		if($datafiled != "")
		{
			$sql = "UPDATE `in_employee` SET `in_empid`='{$params['id']}', `in_groupid`='{$params['role']}',`in_childid`='{$params['wcategory']}',`in_multicom`='{$params['multicom']}',`in_compid`='{$params['comid']}',`in_emprefix`='{$params['preid']}',`in_fname`='{$params['fname']}',`in_lname`='{$params['lname']}',`in_email`='{$params['useremail']}', `in_modifyat`=now(), `in_reporting`='{$params['reporting']}',`in_designation`='{$params['designation']}',`in_mobileno`='{$params['mobileone']}',`in_fathernam`='{$params['fthername']}',`in_dateofbirth`='{$params['dateofbirth']}',`in_gender`='{$params['gender']}',`in_marital`='{$params['marital']}',`in_localadd1`='{$params['addone']}',`in_localadd2`='{$params['addtwo']}',`in_localcity`='{$params['city']}',`in_localstate`='{$params['cstate']}',`in_localconty`='{$params['country']}',`in_localpostal`='{$params['localpostal']}',`in_parmaadd1`='{$params['paddone']}',`in_permaadd2`='{$params['paddtwo']}',`in_parmacity`='{$params['pcity']}',`in_permastate`='{$params['pstate']}',`in_permaconty`='{$params['pcountry']}',`in_permapostal`='{$params['ppostalcode']}',`in_worklocation`='{$params['wlocation']}',`in_department`='{$params['department']}',`in_dateofjoining`='{$params['dateofjoin']}',`in_probation`='{$params['probation']}',`in_salary`='{$params['salary']}',`in_payscale`='{$params['payscale']}',`in_panno`='{$params['panno']}',`in_tds`='{$params['tdscheck']}',`in_pfaccess`='{$params['pfcheck']}',`in_pfnumber`='{$params['pfno']}',`in_unnumber`='{$params['unno']}',`in_pfeffective`='{$params['pfdate']}',`in_esiaccess`='{$params['esicheck']}', `in_esinumber`='{$params['esino']}', `in_esiceffective`='{$params['esidate']}', `in_edulevel`='{$params['edulevel']}', `in_eduboard`='{$params['edubord']}', `in_eduyear`='{$params['eduyear']}',`in_edumarks`='{$params['edumarks']}', `in_eduattachment`='{$params['eduattach']}', `in_employer`='{$params['comname']}', `in_lastposition`='{$params['compos']}', `in_jobfrom`='{$params['comfrom']}', `in_jobto`='{$params['comend']}', `in_jobproof`='{$params['comattach']}', $datafiled WHERE `in_empid`='{$params['id']}'";
			
			$res = mysqli_query($this->conn,$sql);
			
			return $res;
		}
		else
		{
			$sql = "UPDATE `in_employee` SET `in_empid`='{$params['id']}', `in_groupid`='{$params['role']}',`in_childid`='{$params['wcategory']}',`in_multicom`='{$params['multicom']}',`in_compid`='{$params['comid']}',`in_emprefix`='{$params['preid']}',`in_fname`='{$params['fname']}',`in_lname`='{$params['lname']}',`in_email`='{$params['useremail']}', `in_modifyat`=now(), `in_reporting`='{$params['reporting']}',`in_designation`='{$params['designation']}',`in_mobileno`='{$params['mobileone']}',`in_fathernam`='{$params['fthername']}',`in_dateofbirth`='{$params['dateofbirth']}',`in_gender`='{$params['gender']}',`in_marital`='{$params['marital']}',`in_localadd1`='{$params['addone']}',`in_localadd2`='{$params['addtwo']}',`in_localcity`='{$params['city']}',`in_localstate`='{$params['cstate']}',`in_localconty`='{$params['country']}',`in_localpostal`='{$params['localpostal']}',`in_parmaadd1`='{$params['paddone']}',`in_permaadd2`='{$params['paddtwo']}',`in_parmacity`='{$params['pcity']}',`in_permastate`='{$params['pstate']}',`in_permaconty`='{$params['pcountry']}',`in_permapostal`='{$params['ppostalcode']}',`in_worklocation`='{$params['wlocation']}',`in_department`='{$params['department']}',`in_dateofjoining`='{$params['dateofjoin']}',`in_probation`='{$params['probation']}',`in_salary`='{$params['salary']}',`in_payscale`='{$params['payscale']}',`in_panno`='{$params['panno']}',`in_tds`='{$params['tdscheck']}',`in_pfaccess`='{$params['pfcheck']}',`in_pfnumber`='{$params['pfno']}',`in_unnumber`='{$params['unno']}',`in_pfeffective`='{$params['pfdate']}',`in_esiaccess`='{$params['esicheck']}', `in_esinumber`='{$params['esino']}', `in_esiceffective`='{$params['esidate']}', `in_edulevel`='{$params['edulevel']}', `in_eduboard`='{$params['edubord']}', `in_eduyear`='{$params['eduyear']}',`in_edumarks`='{$params['edumarks']}', `in_eduattachment`='{$params['eduattach']}', `in_employer`='{$params['comname']}', `in_lastposition`='{$params['compos']}', `in_jobfrom`='{$params['comfrom']}', `in_jobto`='{$params['comend']}', `in_jobproof`='{$params['comattach']}' WHERE `in_empid`='{$params['id']}'";
			
			$res = mysqli_query($this->conn,$sql);
			
			return $res;
		}
		



	}

	public function updateQuery($table, $data, $cond)

	{

		$sql = "UPDATE $table SET $data WHERE $cond";

		$res = mysqli_query($this->conn,$sql);

		return $res;



	}

	public function addFiled($params)

	{

		



		$type = $params['fieldtype'];

		$flname = $params['clname'];

		switch($type)

		{

			case "text":

			$alter = "ALTER TABLE `in_employee` ADD $flname varchar(255) NOT NULL";

			$rester = mysqli_query($this->conn,$alter);

			break;

			case "checkbox":

			$alter = "ALTER TABLE `in_employee` ADD $flname int(50) NOT NULL";

			$rester = mysqli_query($this->conn,$alter);

			break;

			case "radio":

			$alter = "ALTER TABLE `in_employee` ADD $flname int(50) NOT NULL";

			$rester = mysqli_query($this->conn,$alter);

			break;

			case "file":

			$alter = "ALTER TABLE `in_employee` ADD $flname varchar(255) NOT NULL";

			$rester = mysqli_query($this->conn,$alter);

			break;

			case "date":

			$alter = "ALTER TABLE `in_employee` ADD $flname date NOT NULL";

			$rester = mysqli_query($this->conn,$alter);

			break;

			case "time":

			$alter = "ALTER TABLE `in_employee` ADD $flname time NOT NULL";

			$rester = mysqli_query($this->conn,$alter);

			break;

			case "textarea":

			$alter = "ALTER TABLE `in_employee` ADD $flname text NOT NULL";

			$rester = mysqli_query($this->conn,$alter);

			break;

			case "email":

			$alter = "ALTER TABLE `in_employee` ADD $flname varchar(255) NOT NULL";

			$rester = mysqli_query($this->conn,$alter);

			break;

			case "number":

			$alter = "ALTER TABLE `in_employee` ADD $flname varchar(255) NOT NULL";

			$rester = mysqli_query($this->conn,$alter);

			break;

			case "tel":

			$alter = "ALTER TABLE `in_employee` ADD $flname varchar(255) NOT NULL";

			$rester = mysqli_query($this->conn,$alter);

			break;

		}

		if($rester == true)

		{

			$sql = "INSERT INTO `in_empform`( `in_orderid`, `in_classname`, `in_fieldname`, `in_fieldtype`, `in_mandatory`, `in_holder`, `in_modified`, `in_createdby`, `in_comid`,`in_groupid`, `in_restriction`, `in_column`, `in_status`) VALUES ('{$params['orderid']}', '{$params['parentclass']}', '{$params['fieldname']}','{$params['fieldtype']}','{$params['mandatory']}','{$params['placeholder']}', now(),'{$params['empid']}','{$params['comid']}','{$params['editing']}', '1', '{$params['clname']}', '{$params['fieldactive']}')";

			$res = mysqli_query($this->conn,$sql);

			return $res;

		}

		else

		{

			return false;

		}

		

		

	}

	public function updateFiled($params)

	{

		$sql = "UPDATE `in_empform` SET `in_orderid`='{$params['orderid']}', `in_classname`='{$params['parentclass']}',`in_fieldname`='{$params['fieldname']}',`in_fieldtype`='{$params['fieldtype']}',`in_mandatory`='{$params['mandatory']}',`in_holder`='{$params['placeholder']}',`in_modified`= now(),`in_createdby`='{$params['empid']}',`in_comid`='{$params['comid']}',`in_groupid`='{$params['editing']}', `in_restriction`='1',`in_column`='{$params['clname']}', `in_status`='{$params['fieldactive']}' WHERE `in_sno`='{$params['id']}'";

		
		$res = mysqli_query($this->conn,$sql);

		$old = $params['flname'];

		$type = $params['fieldtype'];

		$flname = strtolower($params['clname']);

		if($res == true)

		{

			switch($type)

			{

				case "text":

				$alter = "ALTER TABLE `in_employee` CHANGE COLUMN $old $flname varchar(255) NOT NULL";

				$rester = mysqli_query($this->conn,$alter);

				break;

				case "checkbox":

				$alter = "ALTER TABLE `in_employee` CHANGE COLUMN $old $flname int(50) NOT NULL";

				$rester = mysqli_query($this->conn,$alter);

				break;

				case "radio":

				$alter = "ALTER TABLE `in_employee` CHANGE COLUMN $old $flname int(50) NOT NULL";

				$rester = mysqli_query($this->conn,$alter);

				break;

				case "file":

				$alter = "ALTER TABLE `in_employee` CHANGE COLUMN $old $flname varchar(255) NOT NULL";

				$rester = mysqli_query($this->conn,$alter);

				break;

				case "date":

				$alter = "ALTER TABLE `in_employee` CHANGE COLUMN $old $flname date NOT NULL";

				$rester = mysqli_query($this->conn,$alter);

				break;

				case "time":

				$alter = "ALTER TABLE `in_employee` CHANGE COLUMN $old $flname time NOT NULL";

				$rester = mysqli_query($this->conn,$alter);

				break;

				case "textarea":

				$alter = "ALTER TABLE `in_employee` CHANGE COLUMN $old $flname text NOT NULL";

				$rester = mysqli_query($this->conn,$alter);

				break;

				case "email":

				$alter = "ALTER TABLE `in_employee` CHANGE COLUMN $old $flname varchar(255) NOT NULL";

				$rester = mysqli_query($this->conn,$alter);

				break;

				case "number":

				$alter = "ALTER TABLE `in_employee` CHANGE COLUMN $old $flname varchar(255) NOT NULL";

				$rester = mysqli_query($this->conn,$alter);

				break;

				case "tel":

				$alter = "ALTER TABLE `in_employee` CHANGE COLUMN $old $flname varchar(255) NOT NULL";

				$rester = mysqli_query($this->conn,$alter);

				break;

			}

		}

		return $res;

	}

	

}