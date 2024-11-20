<?php


if(!defined('BSPATH'))

{

	$bspath = dirname(dirname((__DIR__)));

	include_once $bspath.'/core/core.php';

}

if(isset($_GET['case']))
{
    $case = $_GET['case'];
    switch($case)
    {
        case "jobpublish";
        $jugid = $_GET['id'];
        $table = "in_jobapplication";
        $data = " in_publish='1' ";
        $cond = " in_sno='$jugid' ";
        $fun = new Functions();
		$fun->updateCond($table,$data,$cond);
        break;
        case "jobunpublish";
        $jugid = $_GET['id'];
        $table = "in_jobapplication";
        $data = " in_publish='0' ";
        $cond = " in_sno='$jugid' ";
        $fun = new Functions();
		$fun->updateCond($table,$data,$cond);
        break;
        case "jobdelete";
        $jugid = $_GET['id'];
        $table = "in_jobapplication";
        $data = " in_status='0' ";
        $cond = " in_sno='$jugid' ";
        $fun = new Functions();
		$fun->updateCond($table,$data,$cond);
        break;
    }
}