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

		case "project":

		$field = $_POST['sfield'];

		$active = $_POST['active'];

		$value = "`in_proname`, `in_category`, `in_status`, `in_createdby`,`in_modified`";

		$data = "'$field','project','$active', '$fullname', now()";

		$table = "in_project";

		$pay = new Payroll();

		$res = $pay->insertData($table,$value,$data);

		header("Location:".VIEW."team-task/add-project.php?case=save");

		break;

		case "task":

		$field = $_POST['sfield'];

		$active = $_POST['active'];

		$value = "`in_proname`, `in_category`, `in_status`, `in_createdby`,`in_modified`";

		$data = "'$field','task','$active','$fullname', now()";

		$table = "in_project";

		$pay = new Payroll();

		$res = $pay->insertData($table,$value,$data);

		header("Location:".VIEW."team-task/add-project.php?case=save");

		break;

		case "catedit":

		$table = "in_project";

		$field = $_POST['sfield'];

		$active = @$_POST['active'];

		$p = $_GET['p'];

		$id = " in_sno='{$_GET['id']}' ";

		$data = " in_proname='$field', in_status='$active' ";

		$pay = new Payroll();

		$res = $pay->updateData($table,$data,$id);

		header("Location:".VIEW."team-task/".$p.".php?case=save");

		break;

		case "del":

		$table = "in_project";

		$id = " in_sno='{$_GET['id']}' ";

		$pay = new Payroll();

		$res = $pay->delData($table,$id);

		header("Location:".VIEW."team-task/add-project.php");

		break;

		case "teamtask":

		$params['comid'] = $comid;

		$params['preid'] = $preid;

		$params['empid'] = $empid;

		$params['project'] = $_POST['project'];

		$params['prodate'] = $_POST['prodate'];

		$params['protime'] = $_POST['protime'];

		$params['startdate'] = $_POST['startdate'];

		$params['billingmonth'] = $_POST['billingmonth'];

		$params['taskmodular'] = $_POST['taskmodular'];

		$params['primaryres'] = $_POST['primaryres'];

		$params['otherrepon'] = $_POST['otherrepon'];



		$params['reportype'] = $_POST['reportype'];

		$params['complete'] = $_POST['complete'];

		$params['enddate'] = $_POST['enddate'];

		$params['parentask'] = $_POST['parentask'];

		$params['subtask'] = $_POST['subtask'];

		$params['dependenci'] = $_POST['dependenci'];

		$remarks = str_replace("'","\'",$_POST['remarks']);

		$params['remarks'] = $remarks;



		$params['created'] = $fdate;

		$params['createdby'] = $fullname;

		$f = $_GET['f'];
		$p = $_GET['p'];

				
		$alertname = "Team Task";
		$alertslug = $p;

		$fun = new Functions();
		$fun->alertcard($alertname, $alertslug);

		$senTask = $fun->insertTask($params);
		

		header("Location:".VIEW."team-task/manage-tasks.php");

		break;

		case "deltask":

		$id = $_GET['id'];

		$table = "in_teamtask";

		$data = " `in_status`='0' ";

		$cond = " `in_sno`='$id' ";

		$fun = new Functions();

		$fun->updateCond($table,$data,$cond);

		header("Location:".VIEW."team-task/manage-tasks.php");

		break;

		

	}

}