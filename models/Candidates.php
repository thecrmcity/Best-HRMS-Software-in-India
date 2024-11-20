<?php

require_once dirname(__DIR__).'/config/Database.php';


class Candidates extends Database
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
	
	public function candidateInfo($params)
	{
		$sql = "INSERT INTO `in_candidates`(`in_comid`, `in_applypost`, `in_caname`, `in_mobile`, `in_email`, `in_city`, `in_ctc`, `in_expected`, `in_notice`, `in_qualification`, `in_dateofjoin`, `in_employer`, `in_designation`, `in_resume`, `in_technology`, `in_feedback`, `in_takkenby`, `in_createdon`, `in_createdby`, `in_modified`, `in_status`) VALUES ('$this->comid','{$params['applypost']}', '{$params['fulname']}','{$params['mobile']}','{$params['email']}','{$params['location']}','{$params['ctc']}','{$params['expected']}','{$params['notice']}','{$params['qulifi']}','{$params['doj']}','{$params['company']}','{$params['postion']}','{$params['resume']}','{$params['techno']}','{$params['feedback']}','','{$params['create']}','$this->empid', now(),'1')";
		$res = mysqli_query($this->conn,$sql);
		return $res;
	}
	public function updateInfo($params)
	{
		$sql = "UPDATE `in_candidates` SET `in_applypost`='{$params['applypost']}', `in_caname`='{$params['fulname']}',`in_mobile`='{$params['mobile']}',`in_email`='{$params['email']}',`in_city`='{$params['location']}',`in_ctc`='{$params['ctc']}',`in_expected`='{$params['expected']}',`in_notice`='{$params['notice']}',`in_qualification`='{$params['qulifi']}',`in_dateofjoin`='{$params['doj']}',`in_employer`='{$params['company']}',`in_designation`='{$params['postion']}',`in_resume`='{$params['resume']}',`in_technology`='{$params['techno']}',`in_feedback`='{$params['feedback']}',`in_createdby`='$this->empid', `in_modified`=now(),`in_status`='1' WHERE `in_sno`='{$params['id']}'";
		$res = mysqli_query($this->conn,$sql);
		return $res;

	}
}
?>