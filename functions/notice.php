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

		case "notice":

		if(isset($_POST['draft']))

		{
			$priority = $_POST['priority'];

			$noticetitle = $_POST['noticetitle'];

			$contents = $_POST['contents'];

			$p = $_GET['p'];
			$f = $_GET['f'];

			$value = "  `in_comid`, `in_title`, `in_priority`, `in_contents`, `in_active`, `in_date`, `in_createdon`, `in_modified`, `in_flag`, `in_status` ";

			$data = " '$comid','$noticetitle','$priority', '$contents', 'draft', '$cdate', '$fdate', now(), '0','1'";

			$table = "in_notice";

			$funs = new Functions();

			$res = $funs->insertData($table,$value,$data);

			if($res == true)

			{

				header("Location:".VIEW.$f."/".$p.".php?case=save");

			}



		}

		if(isset($_POST['publish']))

		{
			$priority = $_POST['priority'];

			$noticetitle = $_POST['noticetitle'];

			$contents = $_POST['contents'];

			$p = $_GET['p'];

			$f = $_GET['f'];

			
			$value = "  `in_comid`, `in_title`, `in_priority`, `in_contents`, `in_active`, `in_date`, `in_createdon`, `in_modified`, `in_flag`, `in_status` ";

			$data = " '$comid','$noticetitle','$priority', '$contents', 'publish', '$cdate', '$fdate', now(), '0','1'";

			$table = "in_notice";

			$funs = new Functions();

			$res = $funs->insertData($table,$value,$data);



			if($res == true)

			{

				header("Location:".VIEW.$f."/".$p.".php?case=save");

			}



		}

				

		break;

		case "editnot":

		if(isset($_POST['draft']))

		{
			$priority = $_POST['priority'];

			$table = "in_notice";

			$noticetitle = $_POST['noticetitle'];

			$contents = $_POST['contents'];

			$p = $_GET['p'];
			$f = $_GET['f'];

			$id = " in_sno='{$_GET['id']}' ";

			$data = " `in_priority`='$priority', in_title='$noticetitle', in_contents='$contents', `in_active`='draft', `in_modified`= now()";

			$funs = new Functions();

			$res = $funs->updateData($table,$data,$id);

			header("Location:".VIEW.$f."/".$p.".php?case=save");

		}

		if(isset($_POST['publish']))

		{
			$priority = $_POST['priority'];

			$table = "in_notice";

			$noticetitle = $_POST['noticetitle'];

			$contents = $_POST['contents'];

			$p = $_GET['p'];
			$f = $_GET['f'];

			$id = " in_sno='{$_GET['id']}' ";

			$data = " `in_priority`='$priority', in_title='$noticetitle', in_contents='$contents', `in_active`='publish', `in_modified`= now()";

			$funs = new Functions();

			$res = $funs->updateData($table,$data,$id);

			header("Location:".VIEW.$f."/".$p.".php?case=save");

		}

		break;

		case "del":

		$p = $_GET['p'];
		$f = $_GET['f'];

		$table = "in_notice";

		$id = " in_sno='{$_GET['id']}' ";

		$funs = new Functions();

		$res = $funs->delData($table,$id);

		header("Location:".VIEW.$f."/".$p.".php");

		break;

		case "publish":



		$table = "in_notice";

		$p = $_GET['p'];
		$f = $_GET['f'];

		$id = " in_sno='{$_GET['id']}' ";

		$data = " in_active='publish' ";

		$funs = new Functions();

		$res = $funs->updateData($table,$data,$id);

		header("Location:".VIEW.$f."/".$p.".php?case=save");

		break;
		case "star":
		$startype = $_POST['startype'];
		$starmonth = $_POST['starmonth'];
		$empis = $_POST['empis'];
		$staryr = date('Y', strtotime($starmonth));
		$starmon = date('F', strtotime($starmonth));
		
		$table = "in_starmonth";
		$value = " `in_comid`, `in_empid`, `in_startype`, `in_year`, `in_month`, `in_createdat`, `in_status` ";
		$data = " '$comid','$empis','$startype','$staryr','$starmon',now(),'1' ";
		$funs = new Functions();
		$res = $funs->insertData($table,$value,$data);
		header("Location:".VIEW."notice/wall-of-fame.php?case=save");
		break;
		case "stardel":

		$id = " in_sno='{$_GET['id']}' ";

		$table = "in_starmonth";
		$funs = new Functions();
		$res = $funs->delData($table,$id);
		header("Location:".VIEW."notice/wall-of-fame.php?case=save");
		break;

	}

}