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

		case "addemployee":

		if(isset($_POST['comname']))

		{

			$comname = $_POST['comname'];

		}

		else

		{

			$comname = $comid;

		}

		$params['comid'] = $comname;

		$params['cardprefix'] = @$_POST['cardprefix'];

		$params['emplid'] = $_POST['emplid'];

		$params['fname'] = $_POST['fname'];

		$params['lname'] = @$_POST['lname'];

		$fulltoos = $_POST['fname'].$_POST['lname'];

		$params['usrename'] = strtolower(str_replace(" ", "",$fulltoos));

		$params['fthername'] = $_POST['fthername'];

		$params['useremail'] = $_POST['useremail'];

		$dateofbirths = date('Y-m-d', strtotime(@$_POST['dateofbirth']));

		$params['dateofbirth'] = @$dateofbirths;

		$params['retireage'] = @$_POST['retireage'];



		$dob = @$dateofbirths;

		$tire = @$_POST['retireage'];



		$end = date($dob, strtotime("+$tire years"));

		$params['retiredate'] = $end;



		$params['mobileone'] = $_POST['mobileone'];

		

		$params['gender'] = $_POST['gender'];

		$params['marital'] = $_POST['marital'];





		$params['addone'] = $_POST['addone'];

		$params['addtwo'] = $_POST['addtwo'];

		$params['city'] = $_POST['city'];

		$params['cstate'] = @$_POST['cstate'];

		$params['country'] = $_POST['country'];

		$params['localpostal'] = $_POST['localpostal'];



		if($_POST['paddone'] != "" || $_POST['paddtwo'] != "")

		{

			$params['paddone'] = $_POST['paddone'];

			$params['paddtwo'] = $_POST['paddtwo'];

			$params['pcity'] = $_POST['pcity'];

			$params['pstate'] = $_POST['pstate'];

			$params['pcountry'] = $_POST['pcountry'];

			$params['ppostalcode'] = $_POST['ppostalcode'];

		}

		else

		{

			$params['paddone'] = $_POST['addone'];

			$params['paddtwo'] = $_POST['addtwo'];

			$params['pcity'] = $_POST['city'];

			$params['pstate'] = @$_POST['cstate'];

			$params['pcountry'] = $_POST['country'];

			$params['ppostalcode'] = $_POST['localpostal'];

		}

		

		

		$params['wcategory'] = @$_POST['wcategory'];

		$params['wlocation'] = @$_POST['wlocation'];

		$params['department'] = @$_POST['department'];

		$params['designation'] = @$_POST['designation'];

		$dateofjoins = date('Y-m-d', strtotime(@$_POST['dateofjoin']));

		$params['dateofjoin'] = @$dateofjoins;

		$params['reporting'] = @$_POST['reporting'];

		$params['role'] = @$_POST['role'];



		$multicom = @$_POST['multicom'];

		$molcom = "";

		foreach($multicom as $multi)

		{

			$molcom .= $multi.";";

		}



		$params['multicom'] = rtrim($molcom,';');



		

		$params['salary'] = $_POST['salary'];

		$params['payscale'] = $_POST['payscale'];



		$params['panno'] = @$_POST['panno'];

		$params['tdscheck'] = @$_POST['tdscheck'];

		$params['pfcheck'] = @$_POST['pfcheck'];

		$params['pfno'] = @$_POST['pfno'];

		$params['unno'] = @$_POST['unno'];

		$pfeffective = date('Y-m-d', strtotime( @$_POST['pfdate']));
		$params['pfdate'] = @$pfeffective;

		$params['esicheck'] = @$_POST['esicheck'];

		$params['esino'] = @$_POST['esino'];

		$esieffective = date('Y-m-d', strtotime(@$_POST['esidate']));

		$params['esidate'] = @$esieffective;



		$params['eduname'] = @$_POST['eduname'];

		$params['board'] = @$_POST['board'];

		$params['eduyear'] = @$_POST['eduyear'];

		$params['marks'] = @$_POST['marks'];

		$params['upload'] = @$_FILES['upload']['name'];

		$edufile = @$_FILES['upload']["tmp_name"];



		$params['company'] = @$_POST['company'];

		$params['position'] = @$_POST['position'];

		$params['fromdate'] = @$_POST['fromdate'];

		$params['fromend'] = @$_POST['fromend'];

		$params['uploadcom'] = @$_FILES['uploadcom']['name'];

		$pfefile = @$_FILES['uploadcom']["tmp_name"];



		if(($params['eduname'] != "") || ($params['company'] != ""))

		{

			@$educount = count($params['eduname']);

			@$comcont = count($params['company']);

		

		

		

		$edulevel = "";

		$edubord = "";

		$eduyear = "";

		$edumarks = "";

		$eduattach = "";

		$target_dir = "../uploads/certificate/";

		

		for($x=0;$x<$educount;$x++)

		{

			$target_file = $target_dir . basename($_FILES["upload"]["name"][$x]);

			move_uploaded_file($edufile[$x], $target_file);

			$edulevel .= $params['eduname'][$x].";";

			$edubord .= $params['board'][$x].";";

			$eduyear .= $params['eduyear'][$x].";";

			$edumarks .= $params['marks'][$x].";";

			$eduattach .= $params['upload'][$x].";";

		}

		

		$comname = "";

		$compos = "";

		$comfrom = "";

		$comend = "";

		$comattach = "";

		

		for($j=0;$j<$comcont;$j++)

		{

			$target_file = $target_dir . basename($_FILES["uploadcom"]["name"][$j]);

			move_uploaded_file($pfefile[$j], $target_file);

			$comname .= $params['company'][$j].";";

			$compos .= $params['position'][$j].";";

			$comfrom .= $params['fromdate'][$j].";";

			$comend .= $params['fromend'][$j].";";

			$comattach .= $params['uploadcom'][$j].";";

		}

		

		$params['edulevel'] = $edulevel;

		$params['edubord'] = $edubord;

		$params['eduyear'] = $eduyear;

		$params['edumarks'] = $edumarks;

		$params['eduattach'] = $eduattach;

		$params['comname'] = $comname;

		$params['compos'] = $compos;

		$params['comfrom'] = $comfrom;

		$params['comend'] = $comend;

		$params['comattach'] = $comattach;



		}

		



		$corefiled = "";

		$corevalue = "";

		$table = "in_empform";

		$cond = " `in_status`='1' ";

		$select = new Selectall();

		$field = $select->getallCond($table,$cond);

		if(!empty($field))

		{

			foreach($field as $fld)

			{

				$column = @$fld['in_column'];

				$corefiled .= "`".$column."`, ";



		        $columns = str_replace("in_","",$column);

				$corevalue .= "'".@$_POST[$columns]."', ";





				

			}

		}

		$datafiled = rtrim($corefiled, ", ");

		$datavalue = rtrim($corevalue, ", ");



		

		$desi = @$_POST['designation'];

		$table = "in_master_card";

		$cond = " `in_sno`='$desi' ";

		$select = new Selectall();

		$prob = $select->getcondData($table,$cond);

		if($prob['in_parent'] != "0")

		{

			$params['probation'] = $prob['in_parent'];

		}

		else

		{

			$table = "in_companyinfo";

			$cond = " `in_status`='1' ";

			$select = new Selectall();

			$seData = $select->getcondData($table,$cond);

			$params['probation'] = $seData['in_probation'];

		}

		

		

		$target_dir = "../uploads/others/";

		$table = "in_empform";

		$cond = " `in_status`='1' AND `in_fieldtype`='file' ";

		$select = new Selectall();

		$field = $select->getallCond($table,$cond);

		if(!empty($field))

		{

			foreach($field as $fld)

			{

				$column = @$fld['in_column'];

                $column = str_replace("in_","",$column);



				$params[$column] = @$_FILES[$column]["name"];

				$target_file = $target_dir . basename(@$_FILES[$column]["name"]);

				move_uploaded_file($_FILES[$column]["tmp_name"], $target_file);

			}

		}

		$target_dir = "../uploads/employee/";

		$params['profile'] = @$_FILES["profile"]["name"];

		$target_file = $target_dir . basename($_FILES["profile"]["name"]);

		move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file);





		$empode = new Employee();

		$res = $empode->addEmployee($params,$datafiled,$datavalue);

		header("Location:".VIEW."employee/manage-employee.php?case=save");

		break;

		case "generate":

		$fileName = "employee_format" . date('Ymd') . ".xlsx";

		header("Content-Disposition: attachment; filename=\"$fileName\""); 

		header("Content-Type: application/vnd.ms-excel");



		$fname = @$_POST['fname'];

		$cemail = @$_POST['cemail'];

		

		$dob = @$_POST['dob'];

		$mobile = @$_POST['mobile'];

		$gender = @$_POST['gender'];

		$marital = @$_POST['marital'];

		$depart = @$_POST['depart'];

		$desig = @$_POST['desig'];

		$doj = @$_POST['doj'];

		$manager = @$_POST['manager'];

		





		echo '<table border="1"><thead><th>SNo</th>';

		if($fname == "1")

		{

			echo '<th>FirstName</th><th>LastName</th>';

		}

		

		if($cemail == "1")

		{

			echo '<th>CompanyEmail</th>';

		}

		

		if($dob == "1")

		{

			echo '<th>Birthdate</th>';

		}

		if($mobile == "1")

		{

			echo '<th>Mobile</th>';

		}

		if($gender == "1")

		{

			echo '<th>Gender</th>';

		}

		if($marital == "1")

		{

			echo '<th>MaritalStatus</th>';

		}

		if($depart == "1")

		{

			echo '<th>Department</th>';

		}

		if($desig == "1")

		{

			echo '<th>Designation</th>';

		}

		if($doj == "1")

		{

			echo '<th>JoiningDate</th>';

		}

		if($manager == "1")

		{

			echo '<th>Manager</th>';

		}

		

		echo '</thead><tbody><td>1</td>';

		if($fname == "1")

		{

			echo '<td>First</td><td>Last</td>';

		}

		

		if($cemail == "1")

		{

			echo '<td>Company Email</td>';

		}

		

		if($dob == "1")

		{

			echo '<td>YYYY-MM-DD</td>';

		}

		if($mobile == "1")

		{

			echo '<td>1234567890</td>';

		}

		if($gender == "1")

		{

			echo '<td>Gender</td>';

		}

		if($marital == "1")

		{

			echo '<td>Marital Status</td>';

		}

		if($depart == "1")

		{

			echo '<td>Department ID</td>';

		}

		if($desig == "1")

		{

			echo '<td>Designation ID</td>';

		}

		if($doj == "1")

		{

			echo '<td>YYYY-MM-DD</td>';

		}

		if($manager == "1")

		{

			echo '<td>Manager ID</td>';

		}

		

		echo '</tbody></table>';

		

		break;

		case "resetpass":

		if(isset($_GET['id']))

		{

			$id = $_GET['id'];

			$table = "in_employee";

			$data = " `in_password`='', `in_passaccess`='0' ";

			$cond = " `in_empid`='$id' ";

			$emp = new Employee();

			$emp->updateQuery($table, $data, $cond);

			header("Location:".VIEW."employee/manage-employee.php");



		}

		break;

		case "updateEmp":

		$comsid = $_POST['comsid'];
		$empsid = $_POST['emplid'];

		$params['id'] = $_POST['emplid'];
		$params['preid'] = $_POST['preid'];
		$params['comid'] = $_POST['comsid'];

		$table = "in_employee";
		$cond = " `in_compid`='$comsid' AND `in_empid`='$empsid' ";
		$select = new Selectall();
		$emis = $select->getcondData($table,$cond);
		if($emis != "")
		{
			$emi = $emis;
		}

		$table = "in_controller";
		$cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='empName' AND `in_action`='0'";
		$select = new Selectall();
		$fileds = $select->getcondData($table,$cond);
		if($fileds == "")
		{
			$params['fname'] = @$_POST['fname'];
			$params['lname'] = @$_POST['lname'];
			$fulltoos = @$_POST['fname'].@$_POST['lname'];
		}
		else
		{
			$params['fname'] = $emi['in_fname'];
			$params['lname'] = $emi['in_lname'];
		}
		$table = "in_controller";
		$cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='empFather' AND `in_action`='0'";
		$select = new Selectall();
		$fileds = $select->getcondData($table,$cond);
		if($fileds == "")
		{
			$params['fthername'] = @$_POST['fthername'];
		}
		else
		{
			$params['fthername'] = $emi['in_fathernam'];
		}
		$table = "in_controller";
		$cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='companyEmail' AND `in_action`='0'";
		$select = new Selectall();
		$fileds = $select->getcondData($table,$cond);
		if($fileds == "")
		{
			$params['useremail'] = @$_POST['useremail'];
		}
		else
		{
			$params['useremail'] = $emi['in_email'];
		}
		$table = "in_controller";
		$cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='birthDay' AND `in_action`='0'";
		$select = new Selectall();
		$fileds = $select->getcondData($table,$cond);
		if($fileds == "")
		{
			$dateofbirths = date('Y-m-d', strtotime(@$_POST['dateofbirth']));

			$params['dateofbirth'] = @$dateofbirths;
		}
		else
		{
			$params['dateofbirth'] = $emi['in_dateofbirth'];
		}
		$table = "in_controller";
		$cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='phoneNumber' AND `in_action`='0'";
		$select = new Selectall();
		$fileds = $select->getcondData($table,$cond);
		if($fileds == "")
		{
			$params['mobileone'] = @$_POST['mobileone'];
		}
		else
		{
			$params['mobileone'] = $emi['in_mobileno'];
		}
		$table = "in_controller";
		$cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='empGender' AND `in_action`='0'";
		$select = new Selectall();
		$fileds = $select->getcondData($table,$cond);
		if($fileds == "")
		{
			$params['gender'] = @$_POST['gender'];
		}
		else
		{
			$params['gender'] = $emi['in_gender'];
		}
		$table = "in_controller";
		$cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='maritalStatus' AND `in_action`='0'";
		$select = new Selectall();
		$fileds = $select->getcondData($table,$cond);
		if($fileds == "")
		{
			$params['marital'] = $_POST['marital'];
		}
		else
		{
			$params['marital'] = $emi['in_marital'];
		}
		$table = "in_controller";
		$cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='profilePic' AND `in_action`='0'";
		$select = new Selectall();
		$fileds = $select->getcondData($table,$cond);
		if($fileds == "")
		{
			$params['profile'] = @$_FILES["profile"]["name"];
		}
		else
		{
			$params['profile'] = $emi['in_photo'];
		}
		$table = "in_controller";
		$cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='category' AND `in_action`='0'";
		$select = new Selectall();
		$fileds = $select->getcondData($table,$cond);
		if($fileds == "")
		{
			$params['wcategory'] = @$_POST['wcategory'];
		}
		else
		{
			$params['wcategory'] = $emi['in_childid'];
		}
		$table = "in_controller";
		$cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='joiningDate' AND `in_action`='0'";
		$select = new Selectall();
		$fileds = $select->getcondData($table,$cond);
		if($fileds == "")
		{
			$dateofjoins = date('Y-m-d', strtotime(@$_POST['dateofjoin']));

			$params['dateofjoin'] = @$dateofjoins;
		}
		else
		{
			$params['dateofjoin'] = $emi['in_dateofjoining'];
		}
		$table = "in_controller";
		$cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='workLocation' AND `in_action`='0'";
		$select = new Selectall();
		$fileds = $select->getcondData($table,$cond);
		if($fileds == "")
		{
			$params['wlocation'] = @$_POST['wlocation'];
		}
		else
		{
			$params['wlocation'] = $emi['in_worklocation'];
		}
		$table = "in_controller";
		$cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='empDepart' AND `in_action`='0'";
		$select = new Selectall();
		$fileds = $select->getcondData($table,$cond);
		if($fileds == "")
		{
			$params['department'] = @$_POST['department'];
		}
		else
		{
			$params['department'] = $emi['in_department'];
		}
		$table = "in_controller";
		$cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='empDesig' AND `in_action`='0'";
		$select = new Selectall();
		$fileds = $select->getcondData($table,$cond);
		if($fileds == "")
		{
			$params['designation'] = @$_POST['designation'];
		}
		else
		{
			$params['designation'] = $emi['in_designation'];
		}
		$table = "in_controller";
		$cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='empReporting' AND `in_action`='0'";
		$select = new Selectall();
		$fileds = $select->getcondData($table,$cond);
		if($fileds == "")
		{
			$params['reporting'] = @$_POST['reporting'];
		}
		else
		{
			$params['reporting'] = $emi['in_reporting'];
		}
		$table = "in_controller";
		$cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='empRole' AND `in_action`='0'";
		$select = new Selectall();
		$fileds = $select->getcondData($table,$cond);
		if($fileds == "")
		{
			$params['role'] = @$_POST['role'];
		}
		else
		{
			$params['role'] = $emi['in_groupid'];
		}
		$table = "in_controller";
		$cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='empSalary' AND `in_action`='0'";
		$select = new Selectall();
		$fileds = $select->getcondData($table,$cond);
		if($fileds == "")
		{
			$params['salary'] = $_POST['salary'];
		}
		else
		{
			$params['salary'] = $emi['in_salary'];
		}
		$table = "in_controller";
		$cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='empPayscale' AND `in_action`='0'";
		$select = new Selectall();
		$fileds = $select->getcondData($table,$cond);
		if($fileds == "")
		{
			$params['payscale'] = $_POST['payscale'];
		}
		else
		{
			$params['payscale'] = $emi['in_payscale'];
		}
		$table = "in_controller";
		$cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='panNumber' AND `in_action`='0'";
		$select = new Selectall();
		$fileds = $select->getcondData($table,$cond);
		if($fileds == "")
		{
			$params['panno'] = @$_POST['panno'];
		}
		else
		{
			$params['panno'] = $emi['in_panno'];
		}
		
		
		
		$table = "in_controller";
		$cond = " `in_comid`='$comid' AND `in_groupid`='$grid' AND `in_slug`='phoneNumber' AND `in_action`='0'";
		$select = new Selectall();
		$filedp = $select->getcondData($table,$cond);
		if($filedp == "")
		{
			$params['mobileone'] = @$_POST['mobileone'];
		}
		else
		{
			$params['mobileone'] = $emi['in_mobileno'];
		}
			

		$params['tdscheck'] = @$_POST['tdscheck'];

		$params['pfcheck'] = @$_POST['pfcheck'];

		$params['pfno'] = @$_POST['pfno'];

		$params['unno'] = @$_POST['unno'];

		$pfeffective = date('Y-m-d', strtotime( @$_POST['pfdate']));
		$params['pfdate'] = @$pfeffective;

		$params['esicheck'] = @$_POST['esicheck'];

		$params['esino'] = @$_POST['esino'];

		$esieffective = date('Y-m-d', strtotime(@$_POST['esidate']));

		$params['esidate'] = @$esieffective;


		$params['addone'] = $_POST['addone'];

		$params['addtwo'] = $_POST['addtwo'];

		$params['city'] = $_POST['city'];

		$params['cstate'] = @$_POST['cstate'];

		$params['country'] = $_POST['country'];

		$params['localpostal'] = $_POST['localpostal'];



		if($_POST['paddone'] != "" || $_POST['paddtwo'] != "")

		{

			$params['paddone'] = $_POST['paddone'];

			$params['paddtwo'] = $_POST['paddtwo'];

			$params['pcity'] = $_POST['pcity'];

			$params['pstate'] = @$_POST['pstate'];

			$params['pcountry'] = $_POST['pcountry'];

			$params['ppostalcode'] = $_POST['ppostalcode'];

		}

		else

		{

			$params['paddone'] = $_POST['addone'];

			$params['paddtwo'] = $_POST['addtwo'];

			$params['pcity'] = $_POST['city'];

			$params['pstate'] = @$_POST['cstate'];

			$params['pcountry'] = $_POST['country'];

			$params['ppostalcode'] = $_POST['localpostal'];

		}

		

		$params['eduname'] = @$_POST['eduname'];

		$params['board'] = @$_POST['board'];

		$params['eduyear'] = @$_POST['eduyear'];

		$params['marks'] = @$_POST['marks'];

		$params['upload'] = @$_POST['upload'];



		$params['company'] = @$_POST['company'];

		$params['position'] = @$_POST['position'];

		$params['fromdate'] = @$_POST['fromdate'];

		$params['fromend'] = @$_POST['fromend'];

		$params['uploadcom'] = @$_POST['uploadcom'];





		$multicom = @$_POST['multicom'];

		if(!empty($multicom))

		{

			$molcom = "";

			foreach($multicom as $multi)

			{

				$molcom .= $multi.";";

			}



			$params['multicom'] = rtrim($molcom,';');

		}

		else

		{

			$params['multicom'] = "";

		}

		

		$params['eduname'] = @$_POST['eduname'];

		$params['board'] = @$_POST['board'];

		$params['eduyear'] = @$_POST['eduyear'];

		$params['marks'] = @$_POST['marks'];

		$params['upload'] = @$_FILES['upload']['name'];

		$edufile = @$_FILES['upload']["tmp_name"];



		$params['company'] = @$_POST['company'];

		$params['position'] = @$_POST['position'];

		$params['fromdate'] = @$_POST['fromdate'];

		$params['fromend'] = @$_POST['fromend'];

		$params['uploadcom'] = @$_FILES['uploadcom']['name'];

		$pfefile = @$_FILES['uploadcom']["tmp_name"];



		if(($params['eduname'] != "") || ($params['company'] != ""))

		{

			@$educount = count($params['eduname']);

			@$comcont = count($params['company']);

		

		

		

		$edulevel = "";

		$edubord = "";

		$eduyear = "";

		$edumarks = "";

		$eduattach = "";

		$target_dir = "../uploads/certificate/";

		

		for($x=0;$x<$educount;$x++)

		{

			$target_file = $target_dir . basename($_FILES["upload"]["name"][$x]);

			move_uploaded_file($edufile[$x], $target_file);

			$edulevel .= $params['eduname'][$x].";";

			$edubord .= $params['board'][$x].";";

			$eduyear .= $params['eduyear'][$x].";";

			$edumarks .= $params['marks'][$x].";";

			$eduattach .= $params['upload'][$x].";";

		}

		

		$comname = "";

		$compos = "";

		$comfrom = "";

		$comend = "";

		$comattach = "";

		

		for($j=0;$j<$comcont;$j++)

		{

			$target_file = $target_dir . basename($_FILES["uploadcom"]["name"][$j]);

			move_uploaded_file($pfefile[$j], $target_file);

			$comname .= $params['company'][$j].";";

			$compos .= $params['position'][$j].";";

			$comfrom .= $params['fromdate'][$j].";";

			$comend .= $params['fromend'][$j].";";

			$comattach .= $params['uploadcom'][$j].";";

		}


		$params['edulevel'] = $edulevel;

		$params['edubord'] = $edubord;

		$params['eduyear'] = $eduyear;

		$params['edumarks'] = $edumarks;

		$params['eduattach'] = $eduattach;

		$params['comname'] = $comname;

		$params['compos'] = $compos;

		$params['comfrom'] = $comfrom;

		$params['comend'] = $comend;

		$params['comattach'] = $comattach;



		}



		$corefiled = "";

		$corevalue = "";

		$table = "in_empform";

		$cond = " `in_status`='1' ";

		$select = new Selectall();

		$field = $select->getallCond($table,$cond);

		if(!empty($field))

		{

			foreach($field as $fld)

			{

				$column = @$fld['in_column'];

				$columns = str_replace("in_","",$column);

				$corefiled .= "`".$column."`='".@$_POST[$columns]."', ";

			}

		}

		$datafiled = rtrim($corefiled,", ");



		

		$desi = @$_POST['designation'];

		$table = "in_master_card";

		$cond = " `in_sno`='$desi' ";

		$select = new Selectall();

		$prob = $select->getcondData($table,$cond);

		if($prob['in_parent'] != "0")

		{

			$params['probation'] = $prob['in_parent'];

		}

		else

		{

			$params['probation'] = $_POST['probation'];

		}

		

		

		$target_dir = "../uploads/others/";

		$table = "in_empform";

		$cond = " `in_status`='1' AND `in_fieldtype`='file' ";

		$select = new Selectall();

		$field = $select->getallCond($table,$cond);

		if(!empty($field))

		{

			foreach($field as $fld)

			{

				$column = @$fld['in_column'];

                $column = str_replace("in_","",$column);



				$params[$column] = @$_FILES[$column]["name"];

				$target_file = $target_dir . basename(@$_FILES[$column]["name"]);

				move_uploaded_file($_FILES[$column]["tmp_name"], $target_file);

			}

		}

		$target_dir = "../uploads/employee/";

		

		if($params['profile'] != "")

		{

			$target_file = $target_dir . basename($_FILES["profile"]["name"]);

			move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file);

			$empode = new Employee();

			$res = $empode->updateEmployee($params,$datafiled);

		}

		else

		{

			$empode = new Employee();

			$res = $empode->updateWithoutpro($params,$datafiled);

		}


		header("Location:".VIEW."dashboard/?case=save");

		break;

		case "bulkaction":

		$bulk = $_POST['bulk'];

		switch($bulk)

		{

			case "active":

			$cantrash = $_POST['cantrash'];

			if($cantrash != "")

			{

				foreach($cantrash as $cans)

				{

					$table = "in_employee";

					$data = " `in_delete`='1' ";

					$id = " `in_empid`='$cans'";

					$fun = new Functions();

					$fun->updateData($table,$data,$id);

				}

				header("Location:".VIEW."employee/manage-employee.php");

			}

			else

			{

				header("Location:".VIEW."employee/manage-employee.php?case=sel");

			}

			

			break;

			case "inactive":

			$cantrash = $_POST['cantrash'];

			if($cantrash != "")

			{

				foreach($cantrash as $cans)

				{

					$table = "in_employee";

					$data = " `in_delete`='0', `in_inactivedate`='$cdate' ";

					$id = " `in_empid`='$cans'";

					$fun = new Functions();

					$fun->updateData($table,$data,$id);

				}

				

				header("Location:".VIEW."employee/manage-employee.php");

			}

			else

			{

				header("Location:".VIEW."employee/manage-employee.php?case=sel");

			}

			break;

			case "delete":

			$cantrash = $_POST['cantrash'];

			if($cantrash != "")

			{

				foreach($cantrash as $cans)

				{

					$table = "in_employee";

					$id = " `in_empid`='$cans'";

					$fun = new Functions();

					$fun->delData($table,$id);

				}

				header("Location:".VIEW."employee/manage-employee.php");

			}

			else

			{

				header("Location:".VIEW."employee/manage-employee.php?case=sel");

			}

			break;

		}

		



		break;

		case "modifyform":

		$params['orderid'] = @$_POST['orderid'];

		$params['fieldactive'] = @$_POST['fieldactive'];

		$params['fieldname'] = $_POST['fieldname'];

		$params['mandatory'] = $_POST['mandatory'];

		$params['placeholder'] = $_POST['placeholder'];

		$params['fieldtype'] = $_POST['fieldtype'];

		$params['parentclass'] = $_POST['parentclass'];
		
		$params['editing'] = $_POST['editing'];


		$name = $_POST['fieldname'];

		$name = trim($name," ");

		$name = str_replace(" ", "", $name);

		$name = strtolower($name);

		$params['clname'] = "in_$name";



		$params['empid'] = $empid;

		$params['comid'] = $comid;

		$emp = new Employee();

		$res = $emp->addFiled($params);

		if($res == true)

		{

			header("Location:".VIEW."employee/modify-form.php");

		}

		else

		{

			header("Location:".VIEW."employee/modify-form.php?case=dberr");	

		}

		

		break;

		case "editform":

		$params['id'] = $_GET['id'];

		$params['flname'] = $_GET['cl'];

		$params['orderid'] = @$_POST['orderid'];

		if(@$_POST['fieldactive'] == "1")

		{

			$params['fieldactive'] = "1";

		}

		else

		{



		 $params['fieldactive'] = "0";

		}

		$params['fieldname'] = $_POST['fieldname'];

		$params['mandatory'] = @$_POST['mandatory'];

		$params['placeholder'] = @$_POST['placeholder'];

		$params['fieldtype'] = $_POST['fieldtype'];

		$params['parentclass'] = $_POST['parentclass'];

		$params['editing'] = $_POST['editing'];

		$name = $_POST['fieldname'];

		$name = trim($name," ");

		$name = str_replace(" ", "", $name);

		$name = strtolower($name);

		$params['clname'] = "in_$name";



		$params['empid'] = $empid;

		$params['comid'] = $comid;

		$emp = new Employee();

		$emp->updateFiled($params);

		header("Location:".VIEW."employee/modify-form.php");

		break;

		case "empinactive":

		$id = $_GET['id'];
		$inativedate = $_POST['inativedate'];
		$comment = $_POST['comment'];
		$fnfcheck = $_POST['fnfcheck'];
		$fnfdate = $_POST['fnfdate'];
		if($fnfcheck == "1")
		{
			$table = "in_employee";
			$data = " `in_delete`='0', `in_inactivedate`='$inativedate', `in_inactreason`='$comment' ,`in_fnf`='1', `in_fnfdate`='$fnfdate' ";
			$cond = " `in_empid`='$id' ";

			$fun = new Functions();
			$fun->updateCond($table,$data,$cond);
			header("Location:".VIEW."employee/manage-employee.php");

		}
		else
		{
			$table = "in_employee";
			$data = " `in_delete`='0', `in_inactivedate`='$inativedate', `in_inactreason`='$comment' ";
			$cond = " `in_empid`='$id' ";

			$fun = new Functions();
			$fun->updateCond($table,$data,$cond);
			header("Location:".VIEW."employee/manage-employee.php");
		}

		
		break;

		

	}

}