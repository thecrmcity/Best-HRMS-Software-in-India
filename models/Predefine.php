<?php



require_once dirname(__DIR__).'/config/Database.php';





class Predefine extends Database

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

	public function masterSetup()

	{

		global $comDetails, $salaryDetails, $empPayroll, $basicInfo, $bankDetails, $eduDoc, $proDoc;

		global $emailRec, $passReset, $leaveGrant, $logEdit;

	    

	}

	public function shiftCreation()

	{

		global $coms, $cotid, $shname, $intime, $outime, $lunch, $break, $check;

	}

	public function themeConfig()

	{

		global $headfix, $sidefixed, $sidecollpse, $flatstyle, $legacystyle, $compact, $topheader;

        global $mainsidebar, $sidebarmenu, $brandlogo, $pageload, $preloader;

	}

	public function companyInfo()

	{

		global $comname, $comemail, $comphone, $website, $address, $city, $state;

		global $code, $fevicon, $logo, $probation, $notice, $intime, $outime, $lunch, $tea, $retirement;

	}
	public function majorVariable()
	{
		global $comid, $fullname, $desig, $empid, $grid;
		global $chckinCard, $recentLogin, $empcard, $attend, $salcard, $levcard, $rptcard, $holcard, $evencard, $teamcard;
	}
	



}