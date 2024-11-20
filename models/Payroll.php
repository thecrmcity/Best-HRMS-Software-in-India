<?php

require_once dirname(__DIR__).'/config/Database.php';


class Payroll extends Database
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
	
	public function delData($table,$id)
	{
		$sql = "DELETE FROM $table WHERE $id";
		
		$res = mysqli_query($this->conn,$sql);
		return $res;
	}
	public function insertSalarysetup($id,$params)
	{
		$compo = $params['compo'];
		$comnum = count($compo);
		
		
		for($b=0;$b<$comnum;$b++)
		{
			
	        $sql = "INSERT INTO `in_salarysetup`(`in_comid`, `in_payscale`, `in_compoid`, `in_calculation`, `in_calcubase`, `in_flatamount`, `in_percentage`, `in_esi`, `in_pf`, `in_tds`, `in_tdsrefrence`, `in_roundoff`, `in_createdat`, `in_modifiedat`, `in_status`) VALUES ('$this->comid','$id','{$params['compo'][$b]}','{$params['calcu'][$b]}','{$params['base'][$b]}','{$params['flamout'][$b]}','{$params['flper'][$b]}','{$params['flesi'][$b]}','{$params['flpf'][$b]}','{$params['fltds'][$b]}','{$params['tdsref'][$b]}','{$params['rdoff'][$b]}','{$params['fuldate']}',now(),'1')";
	        

	        $res = mysqli_query($this->conn,$sql);
	        
	        
		}
		return $res;

	}
	public function addRatesetup($params)
	{
		$sql = "INSERT INTO `in_ratesetup`(`in_comid`,`in_epfvalue`, `in_epfcutoff`, `in_penfund`, `in_epfund`, `in_esivalue`, `in_esicutoff`, `in_employee`, `in_employer`, `in_modified`, `in_status`) VALUES ('$this->comid', '{$params['epvalue']}','{$params['pfcutoff']}','{$params['penfund']}','{$params['epfund']}','{$params['esivalue']}','{$params['esicutoff']}','{$params['employee']}','{$params['employer']}',now(),'1')";
		$res = mysqli_query($this->conn,$sql);
		return $res;
	}
	public function updateRatesetup($params)
	{
		$sql = "UPDATE `in_ratesetup` SET `in_epfvalue`='{$params['epvalue']}',`in_epfcutoff`='{$params['pfcutoff']}',`in_penfund`='{$params['penfund']}',`in_epfund`='{$params['epfund']}',`in_esivalue`='{$params['esivalue']}',`in_esicutoff`='{$params['esicutoff']}',`in_employee`='{$params['employee']}',`in_employer`='{$params['employer']}',`in_modified`=now() WHERE `in_sno`='1'";
		$res = mysqli_query($this->conn,$sql);
		return $res;
	}
}