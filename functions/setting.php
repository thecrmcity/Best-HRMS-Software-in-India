<?php

if(!defined('BSPATH'))

{

	$bspath = dirname((__DIR__));

	include_once $bspath.'/core/core.php';

}

$params = array();



if(isset($_GET['case']))

{

	$case = $_GET['case'];



	switch($case)

	{

		case "companyinfo":



		$target_dir = "../uploads/";

		



		$params['company'] = $_POST['company'];

		$params['comemail'] = $_POST['comemail'];

		$params['comphone'] = $_POST['comphone'];

		$params['comwebsite'] = $_POST['comwebsite'];

		$params['comadd'] = $_POST['comadd'];

		$params['comcity'] = $_POST['comcity'];

		$params['comstate'] = $_POST['comstate'];

		$params['pincode'] = $_POST['pincode'];

		$params['comfevicon'] = $_FILES['comfevicon']['name'];

		$params['comlogo'] = $_FILES['comlogo']['name'];

		$params['probation'] = $_POST['probation'];

		$params['notice'] = $_POST['notice'];

		$params['intime'] = $_POST['intime'];

		$params['outtime'] = $_POST['outtime'];

		$params['latelog'] = $_POST['latelog'];

		$params['salarydeduct'] = $_POST['salarydeduct'];

		$params['lunchtime'] = $_POST['lunchtime'];

		$params['teatime'] = $_POST['teatime'];

		$params['retirement'] = $_POST['retirement'];

		$nextday = @$_POST['nextday'];

		$params['nextday'] = @$_POST['nextday'];

		$params['fullday'] = $_POST['fullday'];

		$params['halfday'] = $_POST['halfday'];

		$params['cospan'] = $_POST['cospan'];

		$params['costan'] = $_POST['costan'];

		$params['coscin'] = $_POST['coscin'];



		$intime = $_POST['intime'];

		$outime = $_POST['outtime'];



		if($nextday == "1")

		{

			$predat = "2000-01-01";

			$nexdat = "2000-01-02";

		}

		else

		{

			$predat ="";

			$nexdat ="";

		}

		$decimalValue = (strtotime("$nexdat $outime") - strtotime("$predat $intime")) / 3600;

	    $hours = floor($decimalValue);

	    $decimalPart = $decimalValue - $hours;

	    $minutes = floor($decimalPart * 60);

	    $seconds = round(($decimalPart * 60 - $minutes) * 60);

	    $timeFormat = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

	    $params['hours'] = $timeFormat;



	    $f = $_GET['f'];

	    $p = $_GET['p'];



		$cog = new Settings();

		$res = $cog->companyInfo($params);

		if($res == true)

		{

			$target_file = $target_dir . basename($_FILES["comfevicon"]["name"]);

			$target_files = $target_dir . basename($_FILES["comlogo"]["name"]);



			move_uploaded_file($_FILES["comfevicon"]["tmp_name"], $target_file);

			move_uploaded_file($_FILES["comlogo"]["tmp_name"], $target_files);



			header("Location:".VIEW.$f."/".$p.".php?case=save");

		}

		else

		{

			header("Location:".VIEW.$f."/".$p.".php?case=unsave");

		}





		break;

		case "updateinfo":



		$target_dir = "../uploads/";

		

		$f = $_GET['f'];

	    $p = $_GET['p'];

	    $params['id'] = $_GET['id'];



		$params['company'] = $_POST['company'];

		$params['comemail'] = $_POST['comemail'];

		$params['comphone'] = $_POST['comphone'];

		$params['comwebsite'] = $_POST['comwebsite'];

		$params['comadd'] = $_POST['comadd'];

		$params['comcity'] = $_POST['comcity'];

		$params['comstate'] = $_POST['comstate'];

		$params['pincode'] = $_POST['pincode'];

		

		

		$params['probation'] = $_POST['probation'];

		$params['notice'] = $_POST['notice'];

		$params['intime'] = $_POST['intime'];

		$params['outtime'] = $_POST['outtime'];

		$params['latelog'] = $_POST['latelog'];

		$params['salarydeduct'] = $_POST['salarydeduct'];

		$params['lunchtime'] = $_POST['lunchtime'];

		$params['teatime'] = $_POST['teatime'];

		$params['retirement'] = $_POST['retirement'];



		$nextday = @$_POST['nextday'];

		$params['nextday'] = @$_POST['nextday'];



		$params['fullday'] = $_POST['fullday'];

		$params['halfday'] = $_POST['halfday'];

		$params['cospan'] = $_POST['cospan'];

		$params['costan'] = $_POST['costan'];

		$params['coscin'] = $_POST['coscin'];



		$params['salmonth'] = $_POST['salmonth'];

		$params['salday'] = $_POST['salday'];



		$intime = $_POST['intime'];

		$outime = $_POST['outtime'];



		if($nextday == "1")

		{

			$predat = "2000-01-01";

			$nexdat = "2000-01-02";

		}

		else

		{

			$predat ="";

			$nexdat ="";

		}

		$decimalValue = (strtotime("$nexdat $outime") - strtotime("$predat $intime")) / 3600;

	    $hours = floor($decimalValue);

	    $decimalPart = $decimalValue - $hours;

	    $minutes = floor($decimalPart * 60);

	    $seconds = round(($decimalPart * 60 - $minutes) * 60);

	    $timeFormat = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

	    $params['hours'] = $timeFormat;

	    



		if(($_FILES['comfevicon']['name'] != ""))

		{

			

			$params['comfevicon'] = $_FILES['comfevicon']['name'];



			$cog = new Settings();

			$res = $cog->updateInfevi($params);

		}

		elseif(($_FILES['comlogo']['name'] != ""))

		{

			$params['comlogo'] = $_FILES['comlogo']['name'];



			$cog = new Settings();

			$res = $cog->updateInfogo($params);

		}

		elseif(($_FILES['comlogo']['name'] != "") && ($_FILES['comfevicon']['name'] != ""))

		{

			$params['comlogo'] = $_FILES['comlogo']['name'];

			$params['comfevicon'] = $_FILES['comfevicon']['name'];



			$cog = new Settings();

			$res = $cog->updateInfo($params);

		}

		else

		{

			$cog = new Settings();

			$res = $cog->updateInfone($params);

		}



		

		if($res == true)

		{

			$target_file = $target_dir . basename($_FILES["comfevicon"]["name"]);

			$target_files = $target_dir . basename($_FILES["comlogo"]["name"]);



			move_uploaded_file($_FILES["comfevicon"]["tmp_name"], $target_file);

			move_uploaded_file($_FILES["comlogo"]["tmp_name"], $target_files);



			header("Location:".VIEW.$f."/".$p.".php?case=save");

		}

		else

		{

			header("Location:".VIEW.$f."/".$p.".php?case=unsave");

		}





		break;

		case "prefix":

		$prefix = $_POST['prefix'];

		$comname = $_POST['comname'];

		$preavt = $_POST['preavt'];

		$cog = new Settings();

		$res = $cog->prefixInfo($prefix,$comname,$preavt);

		header("Location:".VIEW."global-setting/company-creation.php?case=save");



		break;

		case "predit":

		$id = $_GET['id'];

		$prefix = $_POST['prefix'];

		$comname = $_POST['comname'];

		$cog = new Settings();

		$cog->prefixUpdate($prefix,$comname,$preavt,$id);

		header("Location:".VIEW."global-setting/company-creation.php?case=save");

		break;

		case "delpre":

		$id = $_GET['id'];

		$cog = new Settings();

		$cog->itemDel($table,$id);

		header("Location:".VIEW."global-setting/company-creation.php");

		break;

		case "once":

		$once = $_POST['btnonce'];

		$cond = " `in_relation` ='empLogin'";

		$table = "in_master_card";

		$select = new Selectall();

		$onc = $select->getcondData($table,$cond);



		if($onc != "")

		{

			$id = $onc['in_sno'];

			$cog = new Settings();

			$res = $cog->onceUpdate($once,$id);

			header("Location:".VIEW."global-setting/master-setup.php?case=save");

		}

		else

		{

			$cog = new Settings();

			$res = $cog->onceInfo($once);

			header("Location:".VIEW."global-setting/master-setup.php?case=save");

		}

		

	

		break;

		case "outsider":

		$outsider = $_POST['restricted'];

		$cond = " `in_relation` ='outSider'";

		$table = "in_master_card";

		$select = new Selectall();

		$onc = $select->getcondData($table,$cond);



		if($onc != "")

		{

			$id = $onc['in_sno'];

			$cog = new Settings();

			$res = $cog->outsiderUpdate($outsider,$id);

			header("Location:".VIEW."global-setting/master-setup.php?case=save");

		}

		else

		{

			$cog = new Settings();

			$res = $cog->outsiderInfo($outsider);

			header("Location:".VIEW."global-setting/master-setup.php?case=save");

		}

		

	

		break;
		case "geolocation":

		$geolocation = $_POST['restricted'];

		$cond = " `in_relation` ='geoLocation'";

		$table = "in_master_card";

		$select = new Selectall();

		$onc = $select->getcondData($table,$cond);



		if($onc != "")

		{

			$id = $onc['in_sno'];
			$table = "in_master_card";
			$data = " `in_status`='$geolocation' ";
			$cond = " `in_sno`='$id' ";
			$fun = new Functions();
			$fun->updateCond($table,$data,$cond);
			header("Location:".VIEW."global-setting/master-setup.php?case=save");

		}

		else

		{

			$cog = new Settings();
			$table = "in_master_card";
			$value = " `in_prefix`, `in_relation`, `in_status` ";
			$data = " 'restricted','geoLocation','$geolocation'";
			$fun = new Functions();
			$fun->insertData($table, $value, $data);

			header("Location:".VIEW."global-setting/master-setup.php?case=save");

		}
		
		break;

		case "group":

		$group = $_POST['group'];

		$group = ucwords(trim($group));

		$group = str_replace(" ", "", $group);



		$table = "in_master_card";

		$select = new Selectall();

		$cond = " `in_relation`='groups' ";

		$pre = $select->getcondData($table,$cond);



		if($pre['in_prefix'] != $group)

		{

			$cog = new Settings();

			$res = $cog->groupInfo($group);

			header("Location:".VIEW."global-setting/master-card.php?case=save");

		}

		else

		{

			header("Location:".VIEW."global-setting/master-card.php?case=exist");

		}

		

	

		break;

		case "depart":

		$group = $_POST['group'];

		



		$table = "in_master_card";

		$select = new Selectall();

		$cond = " `in_relation`='department' ";

		$pre = $select->getcondData($table,$cond);



		if($pre['in_prefix'] != $group)

		{

			$cog = new Settings();

			$res = $cog->departInfo($group);

			header("Location:".VIEW."global-setting/master-card.php?case=save");

		}

		else

		{

			header("Location:".VIEW."global-setting/master-card.php?case=exist");

		}

		

	

		break;

		case "manager":

		$group = $_POST['group'];

		

		$table = "in_master_card";

		$select = new Selectall();

		$cond = " `in_relation`='managers' ";

		$pre = $select->getcondData($table,$cond);



		if($pre['in_prefix'] != $group)

		{

			$cog = new Settings();

			$res = $cog->manageInfo($group);

			header("Location:".VIEW."global-setting/master-card.php?case=save");

		}

		else

		{

			header("Location:".VIEW."global-setting/master-card.php?case=exist");

		}

		

	

		break;

		case "manageedit":

		$id = $_GET['id'];



		$data = "in_prefix='{$_POST['group']}'";

		$table = "in_master_card";

		$cog = new Settings();

		$res = $cog->updateData($table,$data,$id);

		header("Location:".VIEW."global-setting/master-card.php?case=save");



		break;

		case "designation":

		$group = $_POST['group'];

		$notice = $_POST['notice'];

		$desigroup = $_POST['desigroup'];

		if($desigroup != "")

		{

			$table = "in_master_card";

			$value = " `in_parent`, `in_prefix`, `in_relation`, `in_status` ";

			$data = " '$notice','$group', 'masterDesignation', '1' ";

			$fun = new Functions();

			$fun->insertData($table, $value, $data);

			header("Location:".VIEW."global-setting/master-card.php?case=save");

		}

		else

		{

			$table = "in_master_card";

			$select = new Selectall();

			$cond = " `in_relation`='designation' ";

			$pre = $select->getcondData($table,$cond);



			if($pre['in_prefix'] != $group)

			{

				$cog = new Settings();

				$res = $cog->desigInfo($group,$notice);

				header("Location:".VIEW."global-setting/master-card.php?case=save");

			}

			else

			{

				header("Location:".VIEW."global-setting/master-card.php?case=exist");

			}

		}

	

	

		break;

		case "desgiedit":	

		$id = $_GET['id'];

		$group = $_POST['group'];

		$notice = $_POST['notice'];

		$desigroup = $_POST['desigroup'];


		if($desigroup != "")
		{
			$table = "in_master_card";

			$select = new Selectall();

			$cond = " `in_prefix`='$group' AND `in_relation`='masterDesignation' ";

			$exitpre = $select->getcondData($table,$cond);

			if($exitpre != "")
			{
				$data = " in_parent='$notice' ,in_prefix='$group', `in_relation`='masterDesignation' ";

				$table = "in_master_card";

				$cog = new Settings();

				$res = $cog->updateData($table,$data,$id);

				header("Location:".VIEW."global-setting/master-card.php?case=save");
			}
			else
			{
				$data = " in_parent='$notice' ,in_prefix='$group', `in_relation`='masterDesignation' ";

				$table = "in_master_card";

				$cog = new Settings();

				$res = $cog->updateData($table,$data,$id);

				header("Location:".VIEW."global-setting/master-card.php?case=save");
			}

		}
		else
		{
			$data = " in_parent='$notice' ,in_prefix='$group' ";

			$table = "in_master_card";

			$cog = new Settings();

			$res = $cog->updateData($table,$data,$id);

			header("Location:".VIEW."global-setting/master-card.php?case=save");
		}
		
		break;

		case "departedit":

		$id = $_GET['id'];



		$data = "in_prefix='{$_POST['group']}'";

		$table = "in_master_card";

		$cog = new Settings();

		$res = $cog->updateData($table,$data,$id);

		header("Location:".VIEW."global-setting/master-card.php?case=save");



		break;

		case "superedit":

		$id = $_GET['id'];



		$data = "in_prefix='{$_POST['group']}'";

		$table = "in_master_card";

		$cog = new Settings();

		$res = $cog->updateData($table,$data,$id);

		header("Location:".VIEW."global-setting/master-card.php?case=save");



		break;

		case "del":

		$id = $_GET['id'];

		$table = $_GET['tbl'];

		$cog = new Settings();

		$res = $cog->itemDel($table,$id);

		header("Location:".VIEW."global-setting/master-card.php");

		break;

		case "resettheme":

		$select = new Selectall();

		$theme = $select->themeconfig();

		$params['id'] = $theme['in_sno'];

		$params['empid'] = $empid;

		$params['fdate'] = $fdate;

		$cong = new Settings();

		$res = $cong->resetTheme($params);

		header("Location:".VIEW."global-setting/configuration.php");

		break;

		

		case "theme":



		$select = new Selectall();

		$theme = $select->themeconfig();



		if($theme != "")

		{

			$params['id'] = $theme['in_sno'];

			$params['preloader'] = $_POST['preloader'];

			$params['pageload'] = $_POST['pageload'];

			$params['fixedheader'] = $_POST['fixedheader'];

			$params['sidecollapse'] = $_POST['sidecollapse'];

			$params['fixedside'] = $_POST['fixedside'];

			$params['navflat'] = $_POST['navflat'];

			$params['navlegacy'] = $_POST['navlegacy'];

			$params['navcompact'] = $_POST['navcompact'];



			$params['topheader'] = $_POST['topheader'];

			$params['sidebar'] = $_POST['sidebar'];

			$params['sidebarmen'] = $_POST['sidebarmen'];

			$params['brandlogo'] = $_POST['brandlogo'];

			$params['empid'] = $empid;

			$params['fdate'] = $fdate;





			$cog = new Settings();

			$res = $cog->themeUpdate($params);

			header("Location:".VIEW."global-setting/configuration.php");

		}

		else

		{

			$params['preloader'] = $_POST['preloader'];

			$params['pageload'] = $_POST['pageload'];

			$params['fixedheader'] = $_POST['fixedheader'];

			$params['sidecollapse'] = $_POST['sidecollapse'];

			$params['fixedside'] = $_POST['fixedside'];

			$params['navflat'] = $_POST['navflat'];

			$params['navlegacy'] = $_POST['navlegacy'];

			$params['navcompact'] = $_POST['navcompact'];



			$params['topheader'] = $_POST['topheader'];

			$params['sidebar'] = $_POST['sidebar'];

			$params['sidebarmen'] = $_POST['sidebarmen'];

			$params['brandlogo'] = $_POST['brandlogo'];

			$params['empid'] = $empid;

			$params['fdate'] = $fdate;



			$cog = new Settings();

			$res = $cog->themeConfig($params);

			header("Location:".VIEW."global-setting/configuration.php");

		}



		break;

		case "addmod":

		$field = $_POST['sfield'];

		$sicon = $_POST['sicon'];

		$active = @$_POST['active'];

		$order = $_POST['order'];

		$field = trim($field, " ");

		$fields = str_replace(" ","-",$field);

		$fields = strtolower($fields);

		$dir = dirname(__DIR__)."/views/".$fields;



		if(is_dir($dir))
		{
			header("Location:".VIEW."global-setting/developer-setup.php?case=filerr");
		}
		else
		{
			mkdir($dir, 0755);

			$value = "`in_relate`,`in_modular`, `in_modicon`, `in_orderid`, `in_status`, `in_createdon`";
			$data = "'parent','$field','$sicon','$order','$active', now()";
			$table = "in_modular";
			$pay = new Payroll();
			$res = $pay->insertData($table,$value,$data);
			header("Location:".VIEW."global-setting/developer-setup.php?case=save");
		}
		

		

		break;

		case "addsubmod":

		$fields = $_POST['sfield'];

		$mainmod = $_POST['mainmod'];

		$access = "";

		$active = @$_POST['active'];

		$order = $_POST['order'];

		

		$table = "in_modular";

		$cond = " `in_sno`='$mainmod' ";

		$select = new Selectall();

		$main = $select->getcondData($table,$cond);

		$mdata = $main['in_modular'];

		$mdata = str_replace(" ", "-",$mdata);

		$mdata = strtolower($mdata);



		$field = str_replace(" ", "-",$fields);

		$field = strtolower($field);





		$fld = VIWS.$mdata;

		$file = $field.".php";

		$path = $fld.'/'.$file;



		if (file_exists($path))

		{

			header("Location:".VIEW."global-setting/developer-setup.php?case=filerr");

		    

		}
		else
		{

			$destfile = BSFILE.'core/basecode.php';

			
			if (file_exists($destfile)) {

			    // Attempt to copy the file to create a duplicate

			    if (copy($destfile, $path))
			    {

			    	
			        $value = "`in_relate`, `in_modular`, `in_mainid`, `in_orderid`, `in_access`, `in_status`, `in_createdon`";
			        $data = "'child','$fields','$mainmod','$order','$access','$active', now()";
			        $table = "in_modular";

					$pay = new Payroll();
					$page = $pay->insertData($table,$value,$data);
					if($page == true)
					{

						header("Location:".VIEW."global-setting/developer-setup.php?case=filedone");

					}

			    }
			    else
			    {

			        
			        header("Location:".VIEW."global-setting/developer-setup.php?case=fileundo");

			    }
			    

			}
			else
			{

			    
			    header("Location:".VIEW."global-setting/developer-setup.php?case=filesrc");
			    

			}
			

		}

		break;

		case "editmod":

		$id = $_GET['id'];

		$table = "in_modular";

		$field = $_POST['sfield'];

		$sicon = $_POST['sicon'];

		$active = @$_POST['active'];

		$order = $_POST['order'];



		$table = "in_modular";

		$cond = " `in_sno`='$id' ";

		$select = new Selectall();

		$getone = $select->getcondData($table,$cond);

		$url = $getone['in_modular'];

		$url = trim($url, " ");

		$url = str_replace(" ","-",$url);

		$url = strtolower($url);

		$dir = dirname(__DIR__)."/views/".$url;



		$fields = trim($field, " ");

		$fields = str_replace(" ","-",$fields);

		$fields = strtolower($fields);

		

		

		if(is_dir($dir))

		{

			rename($dir, dirname($dir).'/'.$fields);

		}

		

		$p = $_GET['p'];

		$id = " in_sno='$id' ";

		$data = " `in_modular`='$field',  `in_modicon`='$sicon', `in_orderid`='$order', `in_status`='$active'";

		$pay = new Payroll();

		$res = $pay->updateData($table,$data,$id);

		header("Location:".VIEW."global-setting/".$p.".php?case=save");

		break;

		case "editsubmod":

		$id = $_GET['id'];

		$table = "in_modular";

		$fields = $_POST['sfield'];

		$mainmod = $_POST['mainmod'];

		$access = "";

		$active = @$_POST['active'];

		$order = $_POST['order'];



		$table = "in_modular";

		$cond = " `in_sno`='$id' ";

		$select = new Selectall();

		$sbmain = $select->getcondData($table,$cond);

		$oldsb = $sbmain['in_modular'];

		$oldsb = str_replace(" ", "-",$oldsb);

		$oldsb = strtolower($oldsb);

		$oid = $sbmain['in_mainid'];

		$table = "in_modular";

		$cond = " `in_sno`='$oid' ";

		$select = new Selectall();

		$sobmain = $select->getcondData($table,$cond);

		$oldfolder = $sobmain['in_modular'];

		$oldfolder = str_replace(" ", "-",$oldfolder);

		$oldfolder = strtolower($oldfolder);




		$table = "in_modular";

		$cond = " `in_sno`='$mainmod' ";

		$select = new Selectall();

		$main = $select->getcondData($table,$cond);

		$mdata = $main['in_modular'];

		$mdata = str_replace(" ", "-",$mdata);

		$mdata = strtolower($mdata);



		$field = str_replace(" ", "-",$fields);

		$field = strtolower($field);





		$ofld = VIWS.$oldfolder;

		$ofile = $oldsb.".php";

		$oldpath = $ofld.'/'.$ofile;

		
		

		$fld = VIWS.$mdata;

		$file = $field.".php";

		$newpath = $fld.'/'.$file;



		if (!file_exists($newpath))

		{

			copy($oldpath, $newpath);
			unlink($oldpath);

		}
		else if(file_exists($oldpath))
		{
			rename($oldpath, $newpath);
		}
		

		



		$p = $_GET['p'];

		$id = " in_sno='{$_GET['id']}' ";

		$data = " `in_modular`='$fields', `in_mainid`='$mainmod', `in_orderid`='$order', `in_access`='$access', `in_status`='$active'";

		$pay = new Payroll();

		$res = $pay->updateData($table,$data,$id);

		header("Location:".VIEW."global-setting/".$p.".php?case=save");

		break;

		case "delmod":

		$id = $_GET['id'];

		$table = "in_modular";

		$cond = " `in_sno`='$id' ";

		$select = new Selectall();

		$sbmain = $select->getcondData($table,$cond);

		$oldsb = $sbmain['in_modular'];

		$mainmod = $sbmain['in_mainid'];

		$oldsb = str_replace(" ", "-",$oldsb);

		$oldsb = strtolower($oldsb);



		$table = "in_modular";

		$cond = " `in_sno`='$mainmod' ";

		$select = new Selectall();

		$main = $select->getcondData($table,$cond);

		$mdata = $main['in_modular'];

		$mdata = str_replace(" ", "-",$mdata);

		$mdata = strtolower($mdata);



		$ofld = VIWS.$mdata;

		$ofile = $oldsb.".php";

		$oldpath = $ofld.'/'.$ofile;



		if (file_exists($oldpath))

		{

			unlink($oldpath);

		    

		}



		$table = "in_modular";

		$id = " in_sno='{$_GET['id']}' ";

		$pay = new Payroll();

		$pay->delData($table,$id);

		header("Location:".VIEW."global-setting/developer-setup.php");

		break;

		case "company":

		$comgroup = "";

		$company = $_POST['company'];

		$comact = @$_POST['comactive'];

		$table = "in_master_card";

		$value = " `in_parent`, `in_prefix`, `in_relation`, `in_status` ";

		$data = " '$comgroup', '$company', 'company', '$comact' ";

		$fun = new Functions();

		$fun->insertData($table, $value, $data);

		header("Location:".VIEW."global-setting/company-creation.php");

		break;

		case "editcompany":

		$id = " `in_sno`='{$_GET['id']}' ";

		$comgroup = "";

		$company = $_POST['company'];

		$comact = @$_POST['comactive'];

		$table = "in_master_card";

		$data = " `in_parent`='$comgroup', `in_prefix`='$company', `in_status`='$comact' ";

		$fun = new Functions();

		$fun->updateData($table,$data,$id);

		header("Location:".VIEW."global-setting/company-creation.php");

		break;



		

		case "location":

		$company = $_POST['location'];

		$comact = @$_POST['comactive'];

		$table = "in_master_card";

		$value = " `in_prefix`, `in_relation`, `in_status` ";

		$data = " '$company', 'workLocation', '$comact' ";

		$fun = new Functions();

		$fun->insertData($table, $value, $data);

		header("Location:".VIEW."global-setting/working-location.php");

		break;

		case "editlog":

		$id = " `in_sno`='{$_GET['id']}' ";

		$company = $_POST['location'];

		$comact = @$_POST['comactive'];

		$table = "in_master_card";

		$data = " `in_prefix`='$company', `in_status`='$comact' ";

		$fun = new Functions();

		$fun->updateData($table,$data,$id);

		header("Location:".VIEW."global-setting/working-location.php");

		break;

		case "delcom":

		$id = " `in_sno`='{$_GET['id']}'";

		$table = "in_master_card";

		$fun = new Functions();

		$fun->delData($table,$id);

		header("Location:".VIEW."global-setting/company-creation.php");

		break;

		case "delcomgrp":

		$id = " `in_sno`='{$_GET['id']}'";

		$table = "in_master_card";

		$fun = new Functions();

		$fun->delData($table,$id);

		header("Location:".VIEW."global-setting/company-creation.php");

		break;

		case "manaccess":

		if(isset($_POST['mangeraccess']))

		{

			$manacc = @$_POST['manacc'];

						

			if($manacc != "")

			{

				$manCont = count($manacc);

				for($i=0;$i<$manCont;$i++)

				{



					$cog = new Settings();

					$cog->manAccess($manacc[$i]);

					

				}

				header("Location:".VIEW."global-setting/master-setup.php");

			}

			else

			{

				header("Location:".VIEW."global-setting/master-setup.php?case=notselect");

			}

			



		}

		break;

		case "editmanac":

		if(isset($_POST['mangeraccess']))

		{

			$manacc = @$_POST['manacc'];

			$prearr = array("emailRec","passReset","leaveGrant","logEdit");

			$diffarr = array_diff($prearr, $manacc);

			$result = array_intersect($prearr, $manacc);



			if($manacc != "")

			{

				if($diffarr != "")

				{

					foreach($diffarr as $diff)

					{

						$table = "in_master_card";

						$data = " `in_status`='0' ";

						$cond = " `in_prefix` = '$diff' AND `in_relation` = 'manAccess' ";

						$fun = new Functions();

						$fun->updateData($table,$data,$cond);

					}

				}

				if($result != "")

				{

					

					foreach($result as $res)

					{

						

						$table = "in_master_card";

						$data = " `in_status`='1' ";

						$cond = " `in_prefix` = '$res' AND `in_relation` = 'manAccess' ";

						$fun = new Functions();

						$fun->updateData($table,$data,$cond);

						

						

					}

					

					

				}

				header("Location:".VIEW."global-setting/master-setup.php");

			}

			

			

			else

			{

				header("Location:".VIEW."global-setting/master-setup.php?case=notselect");

			}

			



		}

		break;

		case "profileaccess":

		if(isset($_POST['proaccess']))

		{

			$proedit = @$_POST['proedit'];



			if($proedit != "")

			{

				$proCont = count($proedit);

				for($i=0;$i<$proCont;$i++)

				{



					$cog = new Settings();

					$cog->proAccess($proedit[$i]);

					

				}

				header("Location:".VIEW."global-setting/master-setup.php");

			}

			else

			{

				header("Location:".VIEW."global-setting/master-setup.php?case=notselect");

			}

		}

		break;

		case "editproac":

		if(isset($_POST['proaccess']))

		{

			$proedit = @$_POST['proedit'];

			$proarry = array("basicInfo","comDetails","salaryDetails","empPayroll","bankDetails","eduDoc","proDoc");

			$diffarr = array_diff($proarry, $proedit);

			$result = array_intersect($proarry, $proedit);



			if($proedit != "")

			{

				if($diffarr != "")

				{

					foreach($diffarr as $diff)

					{

						$table = "in_master_card";

						$data = " `in_status`='0' ";

						$cond = " `in_prefix` = '$diff' AND `in_relation` = 'proAccess' ";

						$fun = new Functions();

						$fun->updateData($table,$data,$cond);

					}

				}

				if($result != "")

				{

					

					foreach($result as $res)

					{

						

						$table = "in_master_card";

						$data = " `in_status`='1' ";

						$cond = " `in_prefix` = '$res' AND `in_relation` = 'proAccess' ";

						$fun = new Functions();

						$fun->updateData($table,$data,$cond);

						

						

					}

					

					

				}

				header("Location:".VIEW."global-setting/master-setup.php");

			}

			else

			{

				header("Location:".VIEW."global-setting/master-setup.php?case=notselect");

			}

		}

		break;

		case "createshift":

		$params['shiftname'] = $_POST['shiftname'];

		$intime = $_POST['intime'];

		$outime = $_POST['outtime'];

		$nextday = @$_POST['nextday'];

		$params['intime']= $_POST['intime'];

		$params['nextday'] = @$_POST['nextday'];

		$params['outime'] = $_POST['outtime'];

		$params['lunch'] = $_POST['lunch'];

		$params['break'] = $_POST['break'];

		$params['comname'] = $_POST['comname'];

		$params['user'] = $empid;

		$params['shiftcheck'] = $_POST['shiftcheck'];



		if($nextday == "1")

		{

			$predat = "2000-01-01";

			$nexdat = "2000-01-02";

		}

		else

		{

			$predat ="";

			$nexdat ="";

		}

		$decimalValue = (strtotime("$nexdat $outime") - strtotime("$predat $intime")) / 3600;

	    $hours = floor($decimalValue);

	    $decimalPart = $decimalValue - $hours;

	    $minutes = floor($decimalPart * 60);

	    $seconds = round(($decimalPart * 60 - $minutes) * 60);

	    $timeFormat = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

	    $params['hours'] = $timeFormat;



		

	    



		$fun = new Functions();

		$fun->insertShift($params);

		header("Location:".VIEW."global-setting/shift-creation.php");

		break;

		case "editshift":

		$params['id'] = $_GET['id'];

		$params['shiftname'] = $_POST['shiftname'];

		$intime = $_POST['intime'];

		$outime = $_POST['outtime'];

		$nextday = @$_POST['nextday'];

		$params['intime']= $_POST['intime'];

		$params['nextday'] = @$_POST['nextday'];

		$params['outime'] = $_POST['outtime'];

		$params['lunch'] = $_POST['lunch'];

		$params['break'] = $_POST['break'];

		$params['comname'] = $_POST['comname'];

		$params['user'] = $empid;

		$params['shiftcheck'] = $_POST['shiftcheck'];



		if($nextday == "1")

		{

			$predat = "2000-01-01";

			$nexdat = "2000-01-02";

		}

		else

		{

			$predat ="";

			$nexdat ="";

		}

		$decimalValue = (strtotime("$nexdat $outime") - strtotime("$predat $intime")) / 3600;

	    $hours = floor($decimalValue);

	    $decimalPart = $decimalValue - $hours;

	    $minutes = floor($decimalPart * 60);

	    $seconds = round(($decimalPart * 60 - $minutes) * 60);

	    $timeFormat = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

	    $params['hours'] = $timeFormat;

		

		

		$fun = new Functions();

		$fun->updateShift($params);

		header("Location:".VIEW."global-setting/shift-creation.php");

		break;

		case "delshift":

		$id = " `in_sno`='{$_GET['id']}'";

		$table = "in_companyshift";

		$fun = new Functions();

		$fun->delData($table,$id);

		header("Location:".VIEW."global-setting/shift-creation.php");

		break;

		case "majorgroup":

		$group = $_POST['group'];

		$table = "in_super_card";

		$select = new Selectall();

		$cond = " `in_cardrelation`='majorgroup' ";

		$pre = $select->getcondData($table,$cond);

		

		if($pre['in_cardname'] != $group)

		{

			$cog = new Settings();

			$res = $cog->majorCard($group);



			$table = "in_super_card";

			$cond = " `in_status`='1' ORDER BY in_sno DESC LIMIT 1";

			$select = new Selectall();

			$setid = $select->getcondData($table,$cond);

			$id = $setid['in_sno'];



			header("Location:".VIEW."global-setting/master-setup.php?case=save");

		}

		else

		{

			header("Location:".VIEW."global-setting/master-setup.php?case=exist");

		}

		break;

		case "bulkdesignation":

		$desid = $_POST['desid'];

		$cantrash = $_POST['cantrash'];

		break;

		case "country":

		$code = $_POST['code'];

		$company = $_POST['company'];

		$comact = @$_POST['comactive'];

		$table = "in_countries";

		$value = " `in_code`, `in_country`, `in_status` ";

		$data = " '$comgroup', $company', 'company', '$comact' ";

		$fun = new Functions();

		$fun->insertData($table, $value, $data);

		header("Location:".VIEW."global-setting/country-code.php");

		break;

		case "editcounty":

		$id = " `in_sno`='{$_GET['id']}' ";

		$code = $_POST['code'];

		$company = $_POST['company'];

		$comact = @$_POST['comactive'];

		$table = "in_countries";

		$data = " `in_code`='$comgroup', `in_country`='$company', `in_status`='$comact' ";

		$fun = new Functions();

		$fun->updateData($table,$data,$id);

		header("Location:".VIEW."global-setting/country-code.php");

		break;

		case "delconty":

		$id = " `in_sno`='{$_GET['id']}'";

		$table = "in_countries";

		$fun = new Functions();

		$fun->delData($table,$id);

		header("Location:".VIEW."global-setting/country-code.php");

		break;

		case "delstate":

		$id = " `in_sno`='{$_GET['id']}'";

		$table = "in_worldcity";

		$fun = new Functions();

		$fun->delData($table,$id);

		header("Location:".VIEW."global-setting/world-city.php");

		break;

		case "delgrp":

		$f = $_GET['f'];

		$p = $_GET['p'];

		$id = " `in_sno`='{$_GET['id']}'";

		$table = "in_super_card";

		$fun = new Functions();

		$fun->delData($table,$id);

		header("Location:".VIEW.$f."/".$p.".php");

		break;

		case "smtpsetup":

		$id = $_GET['id'];

		$params['comid'] = $_GET['id'];

		$params['fname'] = $_POST['fname'];

		$params['smtpemail'] = $_POST['smtpemail'];

		$params['hostname'] = $_POST['hostname'];

		$params['port'] = $_POST['port'];

		$params['smtpuser'] = $_POST['smtpuser'];

		$params['smtpass'] = $_POST['smtpass'];

		$params['secrity'] = $_POST['secrity'];

		$params['empid'] = $empid;

		$sat = new Settings();

		$res = $sat->smtpSetup($params);

		header("Location:".VIEW."global-setting/smtp-setup.php?com=$id");

		break;

		case "editsmtp":

		$id = $_GET['id'];

		$params['comid'] = $_GET['id'];

		$params['fname'] = $_POST['fname'];

		$params['smtpemail'] = $_POST['smtpemail'];

		$params['hostname'] = $_POST['hostname'];

		$params['port'] = $_POST['port'];

		$params['smtpuser'] = $_POST['smtpuser'];

		$params['smtpass'] = $_POST['smtpass'];

		$params['secrity'] = $_POST['secrity'];

		$params['empid'] = $empid;

		$sat = new Settings();

		$res = $sat->updateSmtp($params);

		header("Location:".VIEW."global-setting/smtp-setup.php?com=$id");

		break;

		case "emailtest":



		$id = $_GET['id'];

		$emails = $_POST['email'];

		$content = $_POST['content'];

		$table = "in_smtpsetup";

		$cond = " `in_comid`='$id' ";

		$select = new Selectall();

		$pm = $select->getcondData($table,$cond);

		if($pm != "")

		{

			$name = $pm['in_name'];

			$email = $pm['in_eamil'];

			$host = $pm['in_host'];

			$user = $pm['in_username'];

			$pass = $pm['in_password'];

			$port = $pm['in_port'];

			$ssl = $pm['in_ssl'];

			include_once $bspath.'/functions/emailconfig.php';
			

			$mail->addAddress($emails,'Test');

			$mail->Subject = 'Testing Mail';

			$mail->Body = $content;

			
			if($mail->send())

			{

				

				echo '<script>window.location="'.VIEW.'global-setting/smtp-setup.php?com='.$id.'"; alert("Success")</script>';

			}

			else

			{

				echo '<script>window.location="'.VIEW.'global-setting/smtp-setup.php?com='.$id.'"; alert("Something went wrong")</script>';

			}

		}

		break;

		case "pinkcity":

		$params['country'] = $_POST['country'];

		$params['state'] = $_POST['state'];

		$params['scode'] = $_POST['scode'];

		$params['comactive'] = @$_POST['comactive'];

		$params['city'] = $_POST['city'];



		$sat = new Settings();

		$sat->worldCity($params);

		header("Location:".VIEW."global-setting/world-city.php");

		break;

		case "editcity":

		$params['id'] = $_GET['id'];

		$params['country'] = $_POST['country'];

		$params['state'] = $_POST['state'];

		$params['scode'] = $_POST['scode'];

		$params['comactive'] = @$_POST['comactive'];

		$params['city'] = $_POST['city'];



		$sat = new Settings();

		$sat->updateCity($params);

		header("Location:".VIEW."global-setting/world-city.php");



		break;

		case "mainip":

		$comname = $_POST['comname'];

		$ipaddress = $_POST['ipaddress'];

		$table = "in_master_card";

		$value = " `in_parent`, `in_prefix`, `in_relation`, `in_status` ";

		$data = " '$comname','$ipaddress', 'ipAddress', '1' ";

		$fun = new Functions();

		$fun->insertData($table, $value, $data);

		header("Location:".VIEW."global-setting/master-setup.php?case=save");



		break;

		case "editip":

		$id = " `in_sno`='{$_GET['id']}' ";

		$comname = $_POST['comname'];

		$ipaddress = $_POST['ipaddress'];

		$table = "in_master_card";

		$data = " `in_parent`='$comname', `in_prefix`='$ipaddress' ";

		$fun = new Functions();

		$fun->updateData($table, $data, $id);

		header("Location:".VIEW."global-setting/master-setup.php?case=save");

		break;

		case "controller":

		

		$id = $_GET['id'];

		$f = $_GET['f'];

		$p = $_GET['p'];

		

		$slugs = $_POST;

				

		foreach($slugs as $key => $val)

		{

			

			$table = "in_controller";

			$cond = " `in_comid`='$comid' AND `in_groupid`='$id' AND `in_slug`='$key' ";

			$select = new Selectall();

			$getslug = $select->getcondData($table,$cond);

			if($getslug != "")

			{

				$slid = $getslug['in_sno'];



				$table = "in_controller";

				$data = " `in_action`='$val' ";

				$cond = " `in_sno`='$slid' ";

				$fun = new Functions();

	    		$fun->updateCond($table,$data,$cond);

			}

			else

			{

				$table = "in_controller";

				$value = " `in_comid`, `in_groupid`, `in_slug`, `in_action`, `in_status` ";

				$data = " '$comid', '$id', '$key', '$val', '1' ";

				$fun = new Functions();

			    $fun->insertData($table, $value, $data);

			}

			

		}



		header("Location:".VIEW.$f."/".$p.".php?brand=".$id."&case=save");

		

		

		break;

		case "weekoff":

		$p = $_GET['p'];

		$f = $_GET['f'];

		$params['dayname'] = $_POST['dayname'];

		$params['comid'] = $_POST['comid'];

		$params['numweek'] = $_POST['numweek'];

		$params['wisoff'] = $_POST['wisoff'];



		$table = "in_weekoff";

		$cond = " `in_comid`='{$params['comid']}' AND `in_days`='{$params['dayname']}' AND (`in_firstweek`!='' OR `in_secndweek`!='' OR `in_thirdweek`!='' OR `in_forthweek`!='' OR `in_fifthweek`!='') ";



		$select = new Selectall();

		$wk = $select->getcondData($table,$cond);

		if($wk != "")

		{

			// header("Location:".VIEW.$f."/".$p.".php?com=".$_POST['comid']."&case=dberr");

			$params['id'] = $wk['in_sno'];

			$sat = new Settings();

			$sat->updateWeekoff($params);

			header("Location:".VIEW.$f."/".$p.".php?com=".$_POST['comid']."&case=save");

		}

		else

		{

			$sat = new Settings();

			$sat->insertWeekoff($params);

			header("Location:".VIEW.$f."/".$p.".php?com=".$_POST['comid']."&case=save");



		}



		break;

		case "shiftassign":

		$id = $_GET['id'];

		$p = $_GET['p'];

		$f = $_GET['f'];

		$cantrash = $_POST['cantrash'];

		foreach($cantrash as $can)

		{

			$table = "in_assignedshift";

			$cond = " `in_shiftid`='$id' AND `in_comid`='$comid' AND `in_empid`='$can' ";

			$select = new Selectall();

			$selData = $select->getcondData($table,$cond);

			if($selData != "")

			{

				header("Location:".VIEW.$f."/".$p.".php?case=exist");

			}

			else

			{

				$table = "in_assignedshift";

				$value = " `in_shiftid`, `in_comid`, `in_preid`, `in_empid`, in_assignat, `in_assignby`, `in_status` ";

				$data = " '$id', '$comid', '$preid', '$can', now(), '$empid', '1' ";

				$fun = new Functions();

				$fun->insertData($table, $value, $data);

				header("Location:".VIEW.$f."/".$p.".php?case=save");

			}

			

		}

		

		break;

		case "delshifts":

		$p = $_GET['p'];

		$f = $_GET['f'];

		$cantrash = $_POST['cantrash'];

		foreach($cantrash as $can)

		{

			$table = "in_assignedshift";

			$id = " `in_sno`='$can' ";

			$fun = new Functions();

			$fun->delData($table,$id);

			header("Location:".VIEW.$f."/".$p.".php?case=save");

			

		}

		break;

		case "dashcontrol":

		$gridp = $_POST['grid'];

		$p = $_GET['p'];

		$f = $_GET['f'];

		$params['grid'] = $gridp;

		$params['chckinCard'] = @$_POST['chckinCard'];

		$params['recentLogin'] = @$_POST['recentLogin'];

		$params['empblock'] = @$_POST['empblock'];

		$params['attendblock'] = @$_POST['attendblock'];

		$params['salaryblock'] = @$_POST['salaryblock'];

		$params['leaveblock'] = @$_POST['leaveblock'];

		$params['reportblock'] = @$_POST['reportblock'];

		$params['empHolidays'] = @$_POST['empHolidays'];

		$params['upcoming'] = @$_POST['upcomingEvents'];

		$params['teamTasks'] = @$_POST['teamTasks'];



		$table = "in_dashcontrol";

		$cond = " `in_comid`='$comid' AND `in_groupid`='$gridp' ";

		$select = new Selectall();

		$posts = $select->getcondData($table,$cond);

		if($posts != "")

		{

			$id = $posts['in_sno'];

			$table = "in_dashcontrol";

			$data = " `in_comid`='$comid',`in_groupid`='{$params['grid']}',`in_checkin`='{$params['chckinCard']}',`in_recentlog`='{$params['recentLogin']}',`in_empcard`='{$params['empblock']}',`in_attendcard`='{$params['attendblock']}',`in_salarycard`='{$params['salaryblock']}',`in_leavecard`='{$params['leaveblock']}',`in_reportcard`='{$params['reportblock']}',`in_holidaycard`='{$params['empHolidays']}',`in_eventcard`='{$params['upcoming']}',`in_teamtask`='{$params['teamTasks']}',`in_createdat`=now() ";

			$cond = " `in_sno`='$id' ";

			$fun = new Functions();

			$fun->updateCond($table,$data,$cond);

			header("Location:".VIEW.$f."/".$p.".php?case=save");

		}

		else

		{

			$table = "in_dashcontrol";

			$value = " `in_comid`, `in_groupid`, `in_checkin`, `in_recentlog`, `in_empcard`, `in_attendcard`, `in_salarycard`, `in_leavecard`, `in_reportcard`, `in_holidaycard`, `in_eventcard`, `in_teamtask`, `in_createdat`, `in_status` ";

			$data = " '$comid', '{$params['grid']}', '{$params['chckinCard']}', '{$params['recentLogin']}', '{$params['empblock']}', '{$params['attendblock']}', '{$params['salaryblock']}', '{$params['leaveblock']}', '{$params['reportblock']}', '{$params['empHolidays']}', '{$params['upcoming']}', '{$params['teamTasks']}', now(), '1' ";

			$fun = new Functions();

			$fun->insertData($table, $value, $data);

			header("Location:".VIEW.$f."/".$p.".php?case=save");

		}



		break;
		case "staffbudget":
		$depart = $_POST['depart'];
		$empno = $_POST['empno'];
		$expense = $_POST['expense'];

		$table = "in_staffbudget";
		$value = "  `in_comid`, `in_department`, `in_count`, `in_budget`, `in_createdat`, `in_status` ";
		$data = " '$comid', '$depart', '$empno', '$expense', now(), '1' ";
		$fun = new Functions();
		$fun->insertData($table, $value, $data);
		header("Location:".VIEW."recruiters/staff-budget.php?sec=budget");
		break;
		case "emailtemplate":
		
		$active = $_POST['active'];
		$tmpname = $_POST['tmpname'];
		$contents = $_POST['contents'];
		$contents  = str_replace("'","\'", $contents);

		if($active == '1')
		{
			$table = "in_templates";
			$value = "  `in_comid`, `in_temptype`, `in_tempname`, `in_content`, `in_createdat`, `in_modifydate`, `in_status` ";
			$data = " '$comid', 'email', '$tmpname', '$contents', '$fdate', now(), '1' ";
			
			
		}
		else
		{
			$table = "in_templates";
			$value = "  `in_comid`, `in_temptype`, `in_tempname`, `in_content`, `in_createdat`, `in_modifydate`, `in_status` ";
			$data = " '$comid', 'email', '$tmpname', '$contents', '$fdate', now(), '0' ";
		}
		
		$fun = new Functions();
		$fun->insertData($table, $value, $data);
		header("Location:".VIEW."global-setting/email-templates.php?case=save");
		break;
		case "documentemplate":
		$active = $_POST['active'];
		$tmpname = $_POST['tmpname'];
		$contents = $_POST['contents'];
		$contents  = str_replace("'","\'", $contents);

		$table = "in_templates";
		$value = "  `in_comid`, `in_temptype`, `in_tempname`, `in_content`, `in_createdat`, `in_modifydate`, `in_status` ";
		$data = " '$comid', 'document', '$tmpname', '$contents', '$fdate', now(), '1' ";
		$fun = new Functions();
		$fun->insertData($table, $value, $data);
		header("Location:".VIEW."global-setting/document-templates.php?case=save");
		break;
		case "editemp":
		$id = $_GET['id'];
		$active = $_POST['active'];
		$tmpname = $_POST['tmpname'];
		$contents = $_POST['contents'];
		$contents  = str_replace("'","\'", $contents);

		if($active != "1")
		{
			$table = "in_templates";
			$data = "  `in_tempname`='$tmpname', `in_content`='$contents', `in_modifydate`=now(), `in_status`='0' ";
			
		}
		else
		{
			$table = "in_templates";
			$data = "  `in_tempname`='$tmpname', `in_content`='$contents', `in_modifydate`=now(), `in_status`='1' ";
		}

		$cond = " `in_sno`='$id' ";
		$fun = new Functions();
		$fun->updateCond($table, $data, $cond);
		header("Location:".VIEW."global-setting/email-templates.php?case=save");
		break;
		case "editdocument":
			$id = $_GET['id'];
		$active = $_POST['active'];
		$tmpname = $_POST['tmpname'];
		$contents = $_POST['contents'];
		$contents  = str_replace("'","\'", $contents);

		if($active != "1")
		{
			$table = "in_templates";
			$data = "  `in_tempname`='$tmpname', `in_content`='$contents', `in_modifydate`=now(), `in_status`='0' ";
			
		}
		else
		{
			$table = "in_templates";
			$data = "  `in_tempname`='$tmpname', `in_content`='$contents', `in_modifydate`=now(), `in_status`='1' ";
		}

		$cond = " `in_sno`='$id' ";
		$fun = new Functions();
		$fun->updateCond($table, $data, $cond);
		header("Location:".VIEW."global-setting/document-templates.php?case=save");
		break;
		case "multigroup":
			$cantrash = array();
			$groupname = $_POST['groupname'];
			$grouptype = $_POST['grouptype'];
			$p = $_GET['p'];
			$f = $_GET['f'];
			$cantrash = @$_POST['cantrash'];
			
			if(!empty($cantrash))
			{
				foreach($cantrash as $can)
				{
		
					$table = "in_multigroup";
					$cond = " `in_groupname`='$groupname' AND `in_comid`='$comid' AND `in_empid`='$can' ";
					$select = new Selectall();
					$selData = $select->getcondData($table,$cond);
					if($selData != "")
					{
		
						header("Location:".VIEW.$f."/".$p.".php?case=exist");
		
					}
					else
					{
		
						$table = "in_multigroup";
						$value = " `in_comid`, `in_groupname`, `in_perentid`, `in_preid`, `in_empid`, in_createdate, `in_status` ";
						$data = " '$comid', '$groupname','$grouptype', '$preid', '$can', now(), '1' ";
						$fun = new Functions();
						$fun->insertData($table, $value, $data);
						header("Location:".VIEW.$f."/".$p.".php?case=save");
		
					}
		
					
		
				}
			}
			else
			{
				header("Location:".VIEW.$f."/".$p.".php?case=sel");
			}
	
			
		break;
		case "creategroup":
		$active = $_POST['active'];
		$group = $_POST['grupname'];
		$mapping = $_POST['mapping'];
		if($active == "1")
		{
			$table = "in_multigroup";
			$value = " `in_comid`, `in_groupname`, `in_perentid`, `in_createdate`, `in_status` ";
			$data = " '$comid','$group','$mapping', now(), '1' ";
			$fun = new Functions();
			$fun->insertData($table, $value, $data);
		}
		else
		{
			$table = "in_multigroup";
			$value = " `in_comid`, `in_groupname`, `in_perentid`, `in_createdate`, `in_status` ";
			$data = " '$comid','$group','$mapping', now(), '0' ";
			$fun = new Functions();
			$fun->insertData($table, $value, $data);
		}
		header("Location:".VIEW.$f."/".$p.".php?case=sel");
		break;
		case "insertHierarchy":
		
		$archyname = $_POST['archyname'];
		$archypage = $_POST['archypage'];
		$assignpage = $_POST['assignpage'];

		$table = "in_master_card";
		$cond = " in_prefix='$archyname' AND in_relation='Hierarchy' AND in_status='1' ";
		$select = new Selectall();
		$hire = $select->getcondData($table,$cond);
		if($hire != "")
		{
			$hireid = $hire['in_sno'];

		}
		else
		{
			$table = "in_master_card";
			$value = " in_prefix, in_relation, in_status ";
			$data = " '$archyname', 'Hierarchy', '1' ";
			$fun = new Functions();
			$fun->insertData($table, $value, $data);

			$table = "in_master_card";
			$cond = " in_prefix='$archyname' AND in_relation='Hierarchy' AND in_status='1' ";
			$select = new Selectall();
			$hire = $select->getcondData($table,$cond);
			$hireid = $hire['in_sno'];
		}


		

		$toprepoting1 = $_POST['reporting1'];
		$toprepoting2 = @$_POST['reporting2'];
		$toprepoting3 = @$_POST['reporting3'];

		$toplevel1 = $_POST['heirarchylevel1'];
		$toplevel2 = @$_POST['heirarchylevel2'];
		$toplevel3 = @$_POST['heirarchylevel3'];

		$toplimitday1 = $_POST['limitday1'];
		$toplimitday2 = @$_POST['limitday2'];
		$toplimitday3 = @$_POST['limitday3'];

		
		
		$cantrash = $_POST['cantrash'];
				
		foreach($cantrash as $can)
		{
			$table = "in_hierarchy";
			$value = " `in_comid`, `in_hierarchyid`, `in_hierarchyname`, `in_hierarchyfor`, `in_hierarchyto`, `in_empid`, `in_headid`, `in_headid2`, `in_headid3`, `in_headlevel`, `in_headlevel2`, `in_headlevel3`, `in_limitday`, `in_limitday2`, `in_limitday3`, `in_createdat`, `in_status` ";
			$data = " '$comid', '$hireid', '$archyname', '$archypage', '$assignpage', '$can', '$toprepoting1','$toprepoting2','$toprepoting3', '$toplevel1','$toplevel2','$toplevel3', '$toplimitday1', '$toplimitday2', '$toplimitday3', now(), '1' ";
			$fun = new Functions();
			$fun->insertData($table, $value, $data);
		}
		header("Location:".VIEW."global-setting/approval-hierarchy.php?case=save");
		break;
		case "updateHierarchy":

		$archyname = $_POST['archyname'];
		$archypage = $_POST['archypage'];

		$hireid = $_GET['id'];		

		$toprepoting1 = $_POST['reporting1'];
		$toprepoting2 = @$_POST['reporting2'];
		$toprepoting3 = @$_POST['reporting3'];

		$toplevel1 = $_POST['heirarchylevel1'];
		$toplevel2 = @$_POST['heirarchylevel2'];
		$toplevel3 = @$_POST['heirarchylevel3'];

		$toplimitday1 = $_POST['limitday1'];
		$toplimitday2 = @$_POST['limitday2'];
		$toplimitday3 = @$_POST['limitday3'];

		
		
		$cantrash = $_POST['cantrash'];
				
		foreach($cantrash as $can)
		{
			$table = "in_hierarchy";
			$data = " `in_hierarchyname`='$archyname', `in_hierarchyfor`='$archypage', `in_empid`='$can', `in_headid`='$toprepoting1', `in_headid2`='$toprepoting2', `in_headid3`='$toprepoting3', `in_headlevel`='$toplevel1', `in_headlevel2`='$toplevel2', `in_headlevel3`='$toplevel3', `in_limitday`='$toplimitday1', `in_limitday2`='$toplimitday2', `in_limitday3`='$toplimitday3', `in_createdat`=now(), `in_status`='1' ";
			$cond = " in_hierarchyid='$hireid' ";
			$fun = new Functions();
			$fun->updateCond($table,$data,$cond);
		}
		header("Location:".VIEW."global-setting/approval-hierarchy.php?case=save");

		break;
		case "postedoc":
		$docattach = $_POST['docattach'];
		$assignpage = $_POST['assignpage'];

		$cantrash = $_POST['cantrash'];
				
		foreach($cantrash as $can)
		{
			$table = "in_postedocument";
			$value = " `in_comid`, `in_empid`, `in_docid`, `in_sendtime`, `in_status` ";
			$data = " '$comid', '$can', '$docattach', '$fdate', '1' ";
			$fun = new Functions();
			$fun->insertData($table, $value, $data);
		}
		header("Location:".VIEW."documents/posted-document.php?case=save");
		break;
		case "fromeamil":
			$forname = $_POST['forname'];
			$foremail = $_POST['foremail'];

			

			$content = $forname." (".$foremail.")";

			$table = "in_master_card";
			$value = " `in_prefix`, `in_relation`, `in_status` ";
			$data = " '$content', 'Sendingform', '1' ";
			
			$fun = new Functions();
			$fun->insertData($table, $value, $data);

			header("Location:".VIEW."global-setting/email-setup.php?case=save");
			
		break;
		case "documentemail":
		$emailtype = $_POST['emailtype'];
		$emailfrom = $_POST['emailfrom'];
		$emailcc = $_POST['emailcc'];

		$table = "in_emailsetup";
		$value = " `in_comid`, `in_templateid`, `in_sendingby`, `in_ccemails`, `in_bccemails`, `in_createdat`, `in_status` ";
		$data = " '$comid', '$emailtype', '$emailfrom', '$emailcc', '', now(), '1' ";
		
		$fun = new Functions();
		$fun->insertData($table, $value, $data);
		header("Location:".VIEW."global-setting/email-setup.php?case=save");
		break;



	}

}