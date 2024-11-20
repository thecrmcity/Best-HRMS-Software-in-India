<?php
if(!defined('BSPATH'))
{
	$bspath = dirname((__DIR__));
	include_once $bspath.'/core/core.php';
}
$params = array();

$table = "in_employee";
$cond = " `in_empid`='$empid' AND `in_email`='$pemail' ";
$select = new Selectall();
$comsid = $select->getcondData($table,$cond);
$params['fname'] = $comsid['in_fname'];
$params['fuser'] = $comsid['in_username'];
$params['femail'] = $comsid['in_email'];
$params['empid'] = $comsid['in_empid'];
$params['preid'] = $comsid['in_emprefix'];
$params['coid'] = $comsid['in_compid'];
$urlog = new Userlogin();
$urlog->userlogout($params);

header('Location:'.BSURL.'index.php');
session_destroy();