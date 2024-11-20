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
		case "payscale":
		$field = $_POST['sfield'];
		$active = $_POST['active'];
		$value = "`in_namescle`, `in_category`, `in_status`, `in_modified`";
		$data = "'$field','payscale','$active', now()";
		$table = "in_payscale";
		$pay = new Payroll();
		$res = $pay->insertData($table,$value,$data);
		header("Location:".VIEW."payroll/salary-structure.php?case=save");
		break;
		case "earning":
		$field = $_POST['sfield'];
		$active = $_POST['active'];
		$value = "`in_namescle`, `in_category`, `in_status`, `in_modified`";
		$data = "'$field','earning','$active', now()";
		$table = "in_payscale";
		$pay = new Payroll();
		$res = $pay->insertData($table,$value,$data);
		header("Location:".VIEW."payroll/components.php?case=save");
		break;
		case "deduction":
		$field = $_POST['sfield'];
		$active = $_POST['active'];
		$value = "`in_namescle`, `in_category`, `in_status`, `in_modified`";
		$data = "'$field','deduction','$active', now()";
		$table = "in_payscale";
		$pay = new Payroll();
		$res = $pay->insertData($table,$value,$data);
		header("Location:".VIEW."payroll/components.php?case=save");
		break;
		case "catedit":
		$table = "in_payscale";
		$field = $_POST['sfield'];
		$active = @$_POST['active'];
		$p = $_GET['p'];
		$id = " in_sno='{$_GET['id']}' ";
		$data = " in_namescle='$field', in_status='$active' ";
		$pay = new Payroll();
		$res = $pay->updateData($table,$data,$id);
		header("Location:".VIEW."payroll/".$p.".php?case=save");
		break;
		case "del":
		$table = "in_payscale";
		$id = " in_sno='{$_GET['id']}' ";
		$pay = new Payroll();
		$res = $pay->delData($table,$id);
		header("Location:".VIEW."payroll/components.php");
		break;
		case "salarysetup":
		if($_POST['compo'] == "")
		{
			header("Location:".VIEW."payroll/salary-setup.php");
		}
		
		$id = $_GET['id'];
		$params['compo'] = $_POST['compo'];
		$params['calcu'] = $_POST['calcu'];
		$params['base'] = $_POST['base'];
		$params['flamout'] = @$_POST['flamout']; 
		$params['flper'] = $_POST['flper'];
		$params['flesi'] = @$_POST['flesi'];
		$params['flpf'] = @$_POST['flpf'];
		$params['fltds'] = @$_POST['fltds'];
		$params['tdsref'] = @$_POST['tdsref'];
		$params['rdoff'] = @$_POST['rdoff'];
		$params['fuldate'] = $fdate;

		$pay = new Payroll();
		$res = $pay->insertSalarysetup($id,$params);
		header("Location:".VIEW."payroll/salary-setup.php");
		break;
		case "editsetup":
		$id = $_GET['id'];
		header("Location:".VIEW."payroll/salary-setup.php?pay=".$id."&case=warn");
		break;
		case "delSal":
		$pays = $_GET['pay'];
		$table = "in_salarysetup";
		$id = " in_sno='{$_GET['id']}' ";
		$pay = new Payroll();
		$res = $pay->delData($table,$id);
		header("Location:".VIEW."payroll/salary-setup.php?pay=$pays");
		break;
		case "ratesetup":
		$params['pfcutoff'] = $_POST['pfcutoff'];
		$params['penfund'] = $_POST['penfund'];
		$params['epfund'] = $_POST['epfund'];
		$params['epvalue'] = ($_POST['penfund'] + $_POST['epfund']);

		$params['esicutoff'] = $_POST['esicutoff'];
		$params['employee'] = $_POST['employee'];
		$params['employer'] = $_POST['employer'];
		$params['esivalue'] = ($_POST['employee'] + $_POST['employer']);

		$table = "in_ratesetup";
		$select = new Selectall();
		$selData = $select->oneSelect($table);
		if($selData != "")
		{
			$pay = new Payroll();
			$res = $pay->updateRatesetup($params);
			header("Location:".VIEW."payroll/salary-structure.php?case=save");
		}
		else
		{
			$pay = new Payroll();
			$res = $pay->addRatesetup($params);
			header("Location:".VIEW."payroll/salary-structure.php?case=save");
		}

		
		break;
		
		
	}
}