<?php



require_once dirname(__DIR__).'/config/Database.php';





class Settings extends Database

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



	public function companyInfo($params)

	{

		$sql = "INSERT INTO `in_companyinfo`(`in_comid`, `in_comemail`, `in_cospan`, `in_costan`, `in_coscin`, `in_comphone`, `in_comwebsite`, `in_address`, `in_comcity`, `in_comstate`, `in_pincode`, `in_fevicon`, `in_logo`, `in_probation`, `in_notice`, `in_intime`, `in_outime`, `in_fullhours`, `in_halfhours`, `in_latelogin`, `in_deduction`, `in_hours`, `in_lunch`, `in_teatime`, `in_retirement`, `in_salarymonth`, `in_salarydate`, `in_createat`, `in_status`) VALUES ('{$params['company']}','{$params['comemail']}','{$params['cospan']}','{$params['costan']}','{$params['coscin']}','{$params['comphone']}','{$params['comwebsite']}','{$params['comadd']}','{$params['comcity']}','{$params['comstate']}','{$params['pincode']}','{$params['comfevicon']}','{$params['comlogo']}','{$params['probation']}','{$params['notice']}','{$params['intime']}','{$params['outtime']}','{$params['fullday']}','{$params['halfday']}','{$params['latelog']}','{$params['salarydeduct']}','{$params['hours']}','{$params['lunchtime']}','{$params['teatime']}', '{$params['retirement']}', '{$params['salmonth']}', '{$params['salday']}', now(),'1')";



		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function updateInfo($params)

	{

		$sql = "UPDATE `in_companyinfo` SET `in_comid`='{$params['company']}', `in_comemail`='{$params['comemail']}', `in_cospan`='{$params['cospan']}', `in_costan`='{$params['costan']}', `in_coscin`='{$params['coscin']}', `in_comphone`='{$params['comphone']}', `in_comwebsite`='{$params['comwebsite']}', `in_address`='{$params['comadd']}', `in_comcity`='{$params['comcity']}', `in_comstate`='{$params['comstate']}', `in_pincode`='{$params['pincode']}', `in_fevicon`='{$params['comfevicon']}', `in_probation`='{$params['probation']}' , `in_notice`='{$params['notice']}' ,`in_logo`='{$params['comlogo']}', `in_intime`='{$params['intime']}', `in_outime`='{$params['outtime']}', `in_fullhours`='{$params['fullday']}' , `in_halfhours`='{$params['halfday']}' , `in_latelogin`='{$params['latelog']}',`in_deduction`='{$params['salarydeduct']}', `in_hours`='{$params['hours']}', `in_lunch`='{$params['lunchtime']}', `in_teatime`='{$params['teatime']}', `in_retirement`='{$params['retirement']}', `in_salarymonth`='{$params['salmonth']}' , `in_salarydate`='{$params['salday']}' , `in_createat`=now(), `in_status`='1' WHERE `in_sno`='{$params['id']}'";

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function updateInfevi($params)

	{

		$sql = "UPDATE `in_companyinfo` SET `in_comid`='{$params['company']}', `in_comemail`='{$params['comemail']}',`in_cospan`='{$params['cospan']}', `in_costan`='{$params['costan']}', `in_coscin`='{$params['coscin']}', `in_comphone`='{$params['comphone']}', `in_comwebsite`='{$params['comwebsite']}', `in_address`='{$params['comadd']}', `in_comcity`='{$params['comcity']}', `in_comstate`='{$params['comstate']}', `in_pincode`='{$params['pincode']}', `in_fevicon`='{$params['comfevicon']}', `in_probation`='{$params['probation']}' , `in_notice`='{$params['notice']}' , `in_intime`='{$params['intime']}', `in_outime`='{$params['outtime']}',`in_fullhours`='{$params['fullday']}' , `in_halfhours`='{$params['halfday']}' , `in_latelogin`='{$params['latelog']}',`in_deduction`='{$params['salarydeduct']}', `in_hours`='{$params['hours']}', `in_lunch`='{$params['lunchtime']}', `in_teatime`='{$params['teatime']}', `in_retirement`='{$params['retirement']}', `in_salarymonth`='{$params['salmonth']}' , `in_salarydate`='{$params['salday']}', `in_createat`=now(), `in_status`='1' WHERE `in_sno`='{$params['id']}'";

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function updateInfogo($params)

	{

		$sql = "UPDATE `in_companyinfo` SET `in_comid`='{$params['company']}', `in_comemail`='{$params['comemail']}', `in_cospan`='{$params['cospan']}', `in_costan`='{$params['costan']}', `in_coscin`='{$params['coscin']}', `in_comphone`='{$params['comphone']}', `in_comwebsite`='{$params['comwebsite']}', `in_address`='{$params['comadd']}', `in_comcity`='{$params['comcity']}', `in_comstate`='{$params['comstate']}', `in_pincode`='{$params['pincode']}', `in_probation`='{$params['probation']}' , `in_notice`='{$params['notice']}' ,`in_logo`='{$params['comlogo']}', `in_intime`='{$params['intime']}', `in_outime`='{$params['outtime']}', `in_fullhours`='{$params['fullday']}' , `in_halfhours`='{$params['halfday']}' , `in_latelogin`='{$params['latelog']}',`in_deduction`='{$params['salarydeduct']}', `in_hours`='{$params['hours']}', `in_lunch`='{$params['lunchtime']}', `in_teatime`='{$params['teatime']}', `in_retirement`='{$params['retirement']}',`in_salarymonth`='{$params['salmonth']}' , `in_salarydate`='{$params['salday']}', `in_createat`=now(), `in_status`='1' WHERE `in_sno`='{$params['id']}'";

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function updateInfone($params)

	{

		$sql = "UPDATE `in_companyinfo` SET `in_comid`='{$params['company']}', `in_comemail`='{$params['comemail']}', `in_cospan`='{$params['cospan']}', `in_costan`='{$params['costan']}', `in_coscin`='{$params['coscin']}', `in_comphone`='{$params['comphone']}', `in_comwebsite`='{$params['comwebsite']}', `in_address`='{$params['comadd']}', `in_comcity`='{$params['comcity']}', `in_comstate`='{$params['comstate']}', `in_pincode`='{$params['pincode']}', `in_probation`='{$params['probation']}' , `in_notice`='{$params['notice']}' , `in_intime`='{$params['intime']}', `in_outime`='{$params['outtime']}', `in_fullhours`='{$params['fullday']}' , `in_halfhours`='{$params['halfday']}' , `in_latelogin`='{$params['latelog']}',`in_deduction`='{$params['salarydeduct']}', `in_hours`='{$params['hours']}', `in_lunch`='{$params['lunchtime']}', `in_teatime`='{$params['teatime']}', `in_retirement`='{$params['retirement']}', `in_salarymonth`='{$params['salmonth']}' , `in_salarydate`='{$params['salday']}', `in_createat`=now(), `in_status`='1' WHERE `in_sno`='{$params['id']}'";

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function prefixInfo($prefix,$comname,$preavt)

	{

		$sql = "INSERT INTO `in_master_card`(`in_parent`,`in_prefix`, `in_relation`, `in_status`) VALUES ('$comname','$prefix','cardPrefix','$preavt')";

		

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function prefixUpdate($prefix,$comname,$preavt,$id)

	{

		$sql = "UPDATE `in_master_card` SET `in_parent`='$comname', `in_prefix`='$prefix', `in_status`='$preavt' WHERE `in_sno`='$id'";

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function onceInfo($once)

	{

		$sql = "INSERT INTO `in_master_card`(`in_sno`, `in_prefix`, `in_relation`, `in_status`) VALUES ('','onceLogin','empLogin','$once')";

		

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function onceUpdate($once,$id)

	{

		$sql = "UPDATE `in_master_card` SET `in_status`='$once' WHERE `in_sno`='$id'";

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}



	public function outsiderInfo($outsider)

	{

		$sql = "INSERT INTO `in_master_card`(`in_sno`, `in_prefix`, `in_relation`, `in_status`) VALUES ('','restricted','outSider','$outsider')";

		

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function outsiderUpdate($outsider,$id)

	{

		$sql = "UPDATE `in_master_card` SET `in_status`='$outsider' WHERE `in_sno`='$id'";

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}



	public function groupInfo($group)

	{

		$sql = "INSERT INTO `in_master_card`(`in_sno`, `in_prefix`, `in_relation`, `in_status`) VALUES ('','$group','groups','1')";

		

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function departInfo($group)

	{

		$sql = "INSERT INTO `in_master_card`(`in_sno`, `in_prefix`, `in_relation`, `in_status`) VALUES ('','$group','department','1')";

		

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function manageInfo($group)

	{

		$sql = "INSERT INTO `in_master_card`(`in_sno`, `in_prefix`, `in_relation`, `in_status`) VALUES ('','$group','managers','1')";

		

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function desigInfo($group,$notice)

	{

		$sql = "INSERT INTO `in_master_card`(`in_parent`, `in_prefix`, `in_relation`, `in_status`) VALUES ('$notice','$group','designation','1')";

		

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function majorCard($group)

	{

		$sql = "INSERT INTO `in_super_card`(`in_sno`, `in_cardname`, `in_cardrelation`, `in_status`) VALUES ('','$group','majorcard','1')";

		

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	

	public function themeConfig($params)

	{

		$sql = "INSERT INTO `in_themeconfig`(`in_preloader`, `in_pageload`, `in_headfix`, `in_sidefixed`, `in_sidecollpse`, `in_flatstyle`, `in_legacystyle`, `in_compact`, `in_topheader`, `in_mainsidebar`, `in_sidebarmenu`, `in_brandlogo`, `in_comid`, `in_empid`, `in_assignedat`, `in_status`) VALUES ('{$params['preloader']}', '{$params['pageload']}', '{$params['fixedheader']}','{$params['fixedside']}','{$params['sidecollapse']}','{$params['navflat']}','{$params['navlegacy']}','{$params['navcompact']}','{$params['topheader']}','{$params['sidebar']}','{$params['sidebarmen']}','{$params['brandlogo']}','$this->comid','{$params['empid']}','{$params['fdate']}','1')";
		
		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function themeUpdate($params)

	{

		$sql = "UPDATE `in_themeconfig` SET `in_preloader`='{$params['preloader']}', `in_pageload`='{$params['pageload']}', `in_headfix`='{$params['fixedheader']}',`in_sidefixed`='{$params['fixedside']}',`in_sidecollpse`='{$params['sidecollapse']}',`in_flatstyle`='{$params['navflat']}',`in_legacystyle`='{$params['navlegacy']}',`in_compact`='{$params['navcompact']}',`in_topheader`='{$params['topheader']}',`in_mainsidebar`='{$params['sidebar']}',`in_sidebarmenu`='{$params['sidebarmen']}',`in_brandlogo`='{$params['brandlogo']}', `in_assignedat`='{$params['fdate']}' WHERE `in_sno`='{$params['id']}'";

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function resetTheme($params)

	{

		$sql = "UPDATE `in_themeconfig` SET `in_preloader`='', `in_pageload`='', `in_headfix`='',`in_sidefixed`='',`in_sidecollpse`='',`in_flatstyle`='',`in_legacystyle`='',`in_compact`='',`in_topheader`='',`in_mainsidebar`='',`in_sidebarmenu`='',`in_brandlogo`='', `in_assignedat`='{$params['fdate']}' WHERE `in_sno`='{$params['id']}'";

		

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function updateData($table,$data,$id)

	{

		$sql = "UPDATE $table SET $data WHERE `in_sno`=$id";

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function itemDel($table,$id)

	{

		$sql = "DELETE FROM $table WHERE `in_sno`='$id'";

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function manAccess($manacc)

	{

		$sql = "INSERT INTO `in_master_card`(`in_prefix`, `in_relation`, `in_status`)  VALUES('$manacc','manAccess','1')";

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function proAccess($proedit)

	{

		$sql = "INSERT INTO `in_master_card`(`in_prefix`, `in_relation`, `in_status`)  VALUES('$proedit','proAccess','1')";

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function smtpSetup($params)

	{

		$sql = "INSERT INTO `in_smtpsetup`( `in_comid`, `in_empid`, `in_name`, `in_eamil`, `in_host`, `in_port`, `in_username`, `in_password`, `in_ssl`, `in_createdat`, `in_status`) VALUES ('{$params['comid']}','{$params['empid']}', '{$params['fname']}','{$params['smtpemail']}','{$params['hostname']}','{$params['port']}','{$params['smtpuser']}','{$params['smtpass']}','{$params['secrity']}',now(),'1')";

		

		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function updateSmtp($params)

	{

		$sql = "UPDATE `in_smtpsetup` SET `in_empid`='{$params['empid']}', `in_name`='{$params['fname']}',`in_eamil`='{$params['smtpemail']}',`in_host`='{$params['hostname']}',`in_port`='{$params['port']}',`in_username`='{$params['smtpuser']}',`in_password`='{$params['smtpass']}',`in_ssl`='{$params['secrity']}',`in_createdat`=now(),`in_status`='1' WHERE `in_comid`='{$params['comid']}'";



		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function worldCity($params)

	{

		$sql = "INSERT INTO `in_worldcity`(`in_country`, `in_statename`, `in_stateid`, `in_cityname`, `in_status`) VALUES ('{$params['country']}','{$params['state']}','{$params['scode']}','{$params['city']}','{$params['comactive']}')";



		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function updateCity($params)

	{

		$sql = "UPDATE `in_worldcity` SET `in_country`='{$params['country']}',`in_statename`='{$params['state']}',`in_stateid`='{$params['scode']}',`in_cityname`='{$params['city']}',`in_status`='{$params['comactive']}' WHERE `in_sno`='{$params['id']}'";



		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function insertWeekoff($params)

	{

		$eval = $params['numweek'];

		$eday = $params['dayname'];



		switch($eday)

		{

			case "Monday":

			switch($eval)

			{

				case "1":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_firstweek`, `in_status`) VALUES ('{$params['comid']}','1','$eday','{$params['wisoff']}','1')";

				break;

				case "2":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_secndweek`, `in_status`) VALUES ('{$params['comid']}','1','$eday','{$params['wisoff']}','1')";

				break;

				case "3":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_thirdweek`, `in_status`) VALUES ('{$params['comid']}','1','$eday','{$params['wisoff']}','1')";

				break;

				case "4":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_forthweek`, `in_status`) VALUES ('{$params['comid']}','1','$eday','{$params['wisoff']}','1')";

				break;

				case "5":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_fifthweek`, `in_status`) VALUES ('{$params['comid']}','1','$eday','{$params['wisoff']}','1')";

				break;

			}

			break;

			case "Tuesday":

			switch($eval)

			{

				case "1":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_firstweek`, `in_status`) VALUES ('{$params['comid']}','2','$eday','{$params['wisoff']}','1')";

				break;

				case "2":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_secndweek`, `in_status`) VALUES ('{$params['comid']}','2','$eday','{$params['wisoff']}','1')";

				break;

				case "3":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_thirdweek`, `in_status`) VALUES ('{$params['comid']}','2','$eday','{$params['wisoff']}','1')";

				break;

				case "4":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_forthweek`, `in_status`) VALUES ('{$params['comid']}','2','$eday','{$params['wisoff']}','1')";

				break;

				case "5":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_fifthweek`, `in_status`) VALUES ('{$params['comid']}','2','$eday','{$params['wisoff']}','1')";

				break;

			}

			break;

			case "Wednesday":

			switch($eval)

			{

				case "1":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_firstweek`, `in_status`) VALUES ('{$params['comid']}','3','$eday','{$params['wisoff']}','1')";

				break;

				case "2":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_secndweek`, `in_status`) VALUES ('{$params['comid']}','3','$eday','{$params['wisoff']}','1')";

				break;

				case "3":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_thirdweek`, `in_status`) VALUES ('{$params['comid']}','3','$eday','{$params['wisoff']}','1')";

				break;

				case "4":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_forthweek`, `in_status`) VALUES ('{$params['comid']}','3','$eday','{$params['wisoff']}','1')";

				break;

				case "5":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_fifthweek`, `in_status`) VALUES ('{$params['comid']}','3','$eday','{$params['wisoff']}','1')";

				break;

			}

			break;

			case "Thrusday":

			switch($eval)

			{

				case "1":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_firstweek`, `in_status`) VALUES ('{$params['comid']}','4','$eday','{$params['wisoff']}','1')";

				break;

				case "2":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_secndweek`, `in_status`) VALUES ('{$params['comid']}','4','$eday','{$params['wisoff']}','1')";

				break;

				case "3":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_thirdweek`, `in_status`) VALUES ('{$params['comid']}','4','$eday','{$params['wisoff']}','1')";

				break;

				case "4":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_forthweek`, `in_status`) VALUES ('{$params['comid']}','4','$eday','{$params['wisoff']}','1')";

				break;

				case "5":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_fifthweek`, `in_status`) VALUES ('{$params['comid']}','4','$eday','{$params['wisoff']}','1')";

				break;

			}

			break;

			case "Friday":

			switch($eval)

			{

				case "1":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_firstweek`, `in_status`) VALUES ('{$params['comid']}','5','$eday','{$params['wisoff']}','1')";

				break;

				case "2":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_secndweek`, `in_status`) VALUES ('{$params['comid']}','5','$eday','{$params['wisoff']}','1')";

				break;

				case "3":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_thirdweek`, `in_status`) VALUES ('{$params['comid']}','5','$eday','{$params['wisoff']}','1')";

				break;

				case "4":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_forthweek`, `in_status`) VALUES ('{$params['comid']}','5','$eday','{$params['wisoff']}','1')";

				break;

				case "5":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_fifthweek`, `in_status`) VALUES ('{$params['comid']}','5','$eday','{$params['wisoff']}','1')";

				break;

			}

			break;

			case "Saturday":

			switch($eval)

			{

				case "1":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_firstweek`, `in_status`) VALUES ('{$params['comid']}','6','$eday','{$params['wisoff']}','1')";

				break;

				case "2":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_secndweek`, `in_status`) VALUES ('{$params['comid']}','6','$eday','{$params['wisoff']}','1')";

				break;

				case "3":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_thirdweek`, `in_status`) VALUES ('{$params['comid']}','6','$eday','{$params['wisoff']}','1')";

				break;

				case "4":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_forthweek`, `in_status`) VALUES ('{$params['comid']}','6','$eday','{$params['wisoff']}','1')";

				break;

				case "5":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_fifthweek`, `in_status`) VALUES ('{$params['comid']}','6','$eday','{$params['wisoff']}','1')";

				break;

			}

			break;

			case "Sunday":

			switch($eval)

			{

				case "1":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_firstweek`, `in_status`) VALUES ('{$params['comid']}','7','$eday','{$params['wisoff']}','1')";

				break;

				case "2":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_secndweek`, `in_status`) VALUES ('{$params['comid']}','7','$eday','{$params['wisoff']}','1')";

				break;

				case "3":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_thirdweek`, `in_status`) VALUES ('{$params['comid']}','7','$eday','{$params['wisoff']}','1')";

				break;

				case "4":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_forthweek`, `in_status`) VALUES ('{$params['comid']}','7','$eday','{$params['wisoff']}','1')";

				break;

				case "5":

				$sql = "INSERT INTO `in_weekoff`(`in_comid`, `in_orderid`, `in_days`, `in_fifthweek`, `in_status`) VALUES ('{$params['comid']}','7','$eday','{$params['wisoff']}','1')";

				break;

			}

			break;

		}



		$res = mysqli_query($this->conn,$sql);

		return $res;

	}

	public function updateWeekoff($params)

	{

		$eval = $params['numweek'];

		$eday = $params['dayname'];



		switch($eday)

		{

			case "Monday":

			switch($eval)

			{

				case "1":

				$sql = "UPDATE `in_weekoff` SET `in_firstweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

				case "2":

				$sql = "UPDATE `in_weekoff` SET `in_secndweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				

				break;

				case "3":

				$sql = "UPDATE `in_weekoff` SET `in_thirdweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

				case "4":

				$sql = "UPDATE `in_weekoff` SET `in_forthweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

				case "5":

				$sql = "UPDATE `in_weekoff` SET `in_fifthweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

			}

			break;

			case "Tuesday":

			switch($eval)

			{

				case "1":

				$sql = "UPDATE `in_weekoff` SET `in_firstweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

				case "2":

				$sql = "UPDATE `in_weekoff` SET `in_secndweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				

				break;

				case "3":

				$sql = "UPDATE `in_weekoff` SET `in_thirdweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

				case "4":

				$sql = "UPDATE `in_weekoff` SET `in_forthweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

				case "5":

				$sql = "UPDATE `in_weekoff` SET `in_fifthweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

			}

			break;

			case "Wednesday":

			switch($eval)

			{

				case "1":

				$sql = "UPDATE `in_weekoff` SET `in_firstweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

				case "2":

				$sql = "UPDATE `in_weekoff` SET `in_secndweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				

				break;

				case "3":

				$sql = "UPDATE `in_weekoff` SET `in_thirdweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

				case "4":

				$sql = "UPDATE `in_weekoff` SET `in_forthweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

				case "5":

				$sql = "UPDATE `in_weekoff` SET `in_fifthweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

			}

			break;

			case "Thrusday":

			switch($eval)

			{

				case "1":

				$sql = "UPDATE `in_weekoff` SET `in_firstweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

				case "2":

				$sql = "UPDATE `in_weekoff` SET `in_secndweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				

				break;

				case "3":

				$sql = "UPDATE `in_weekoff` SET `in_thirdweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

				case "4":

				$sql = "UPDATE `in_weekoff` SET `in_forthweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

				case "5":

				$sql = "UPDATE `in_weekoff` SET `in_fifthweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

			}

			break;

			case "Friday":

			switch($eval)

			{

				case "1":

				$sql = "UPDATE `in_weekoff` SET `in_firstweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

				case "2":

				$sql = "UPDATE `in_weekoff` SET `in_secndweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				

				break;

				case "3":

				$sql = "UPDATE `in_weekoff` SET `in_thirdweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

				case "4":

				$sql = "UPDATE `in_weekoff` SET `in_forthweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

				case "5":

				$sql = "UPDATE `in_weekoff` SET `in_fifthweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

			}

			break;

			case "Saturday":

			switch($eval)

			{

				case "1":

				$sql = "UPDATE `in_weekoff` SET `in_firstweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

				case "2":

				$sql = "UPDATE `in_weekoff` SET `in_secndweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				

				break;

				case "3":

				$sql = "UPDATE `in_weekoff` SET `in_thirdweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

				case "4":

				$sql = "UPDATE `in_weekoff` SET `in_forthweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

				case "5":

				$sql = "UPDATE `in_weekoff` SET `in_fifthweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

			}

			break;

			case "Sunday":

			switch($eval)

			{

				case "1":

				$sql = "UPDATE `in_weekoff` SET `in_firstweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

				case "2":

				$sql = "UPDATE `in_weekoff` SET `in_secndweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				

				break;

				case "3":

				$sql = "UPDATE `in_weekoff` SET `in_thirdweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

				case "4":

				$sql = "UPDATE `in_weekoff` SET `in_forthweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

				case "5":

				$sql = "UPDATE `in_weekoff` SET `in_fifthweek`='{$params['wisoff']}' WHERE `in_sno`='{$params['id']}'";

				break;

			}

			break;

		}



		$res = mysqli_query($this->conn,$sql);

		return $res;

	}



	

}