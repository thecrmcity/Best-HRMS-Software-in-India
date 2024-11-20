<?php

if(isset($_GET['cmid']))

{

    $cmid = $_GET['cmid'];

    session_start();

    $_SESSION['comid'] = $cmid;

    $bsurl = getformUrl();

    header('Location:'.$bsurl.'views/dashboard');

    // header('Location: '. $_SERVER['HTTP_REFERER'] . '');

    exit();

}



if(isset($_SESSION['empid']) || isset($_SESSION['fname']) || isset($_SESSION['lnmae']) || isset($_SESSION['grid']) || isset($_SESSION['post']) || isset($_SESSION['pemail']) || isset($_SESSION['uname']) || isset($_SESSION['comid']) || isset($_SESSION['preid']))

{



$empid = $_SESSION['empid'];

$fname = $_SESSION['fname'];

$lname = $_SESSION['lnmae'];

$fullname = $fname." ".$lname;

$grid = $_SESSION['grid'];

$desig = $_SESSION['post'];

$pemail = $_SESSION['pemail'];

$uname = $_SESSION['uname'];

$comid = $_SESSION['comid'];

$preid = $_SESSION['preid'];



}


function getformUrl()

{
  $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
  // $domain = $_SERVER['HTTP_HOST'].'/';
 $domain = $_SERVER['HTTP_HOST'].'/hrms/';
  $baseurl = $protocol.$domain;
  
  return $baseurl;

}



date_default_timezone_set('Asia/Kolkata');

$cdate = date('Y-m-d');

$fdate = date('Y-m-d H:i:s');

$ftime = date('H:i:s');

$ydate = date('Y');

$mdate = date('m');

$ddate = date('d');



