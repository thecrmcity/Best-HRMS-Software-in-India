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
		$netsalary = $_POST['salary'];
		$payid = $_POST['payscale'];
		$table = "in_salarysetup";
		$cond = " `in_payscale`='$payid' ";
		$select = new Selectall();
		$paysel = $select->getallCond($table,$cond);
		echo "<pre>";
		if(!empty($paysel))
		{
			foreach($paysel as $pas)
			{
				$comtyp = $pas['in_compotype'];
				$calcubase = $pas['in_calcubase'];
				$flatamount = $pas['in_flatamount'];
				$perceteg = $pas['in_percentage'];

				if($comtyp == "earning")
				{
					switch($calcubase)
					{
						case "ctc":
						if($flatamount != "")
						{
							$oneval = $netsalary-$flatamount;
							echo $oneval."ctcval";
						}
						else
						{
							$oneval = ($perceteg/100)*$netsalary;
							echo $oneval."<br>";
						}
						break;
						case "basic":
						if($flatamount != "")
						{
							$twoval = $oneval-$flatamount;
						}
						else
						{
							$twoval = ($perceteg/100)*$oneval;
						}
						break;
					}
					
				}
				else
				{
					switch($calcubase)
					{
						case "ctc":
						if($flatamount != "")
						{
							$oneval = $netsalary-$flatamount;
						}
						else
						{
							$oneval = ($perceteg/100)*$netsalary;
						}
						break;
						case "basic":
						if($flatamount != "")
						{
							$twoval = $oneval-$flatamount;
						}
						else
						{
							$twoval = ($perceteg/100)*$oneval;
						}
						break;
					}
				}
			}
		}

		break;
		case "slab":
		$salary = $_POST['salary'];
		$payscale = $_POST['payscale'];
		break;
	}
}