<?php
if(!defined('BSPATH'))
{
	$bspath = dirname((__DIR__));
	include_once $bspath.'/core/core.php';
}
$params = array();

//generateLogs('info','Message : Memory usage '.memoryUsageinKb(1).' File : '.__FILE__.' Line : '.__LINE__);

function memoryUsageinKb($stage = null)
{
	$memory_usage = memory_get_usage();
	$memory_usage_peak = memory_get_peak_usage();

	return '<p> Memory usage stage '.$stage.' : '.round($memory_usage/1024).'kb</p><p> Memory peak Usage Stage '.$stage.' : '.round($memory_usage_peak/1024).'kb</p>';
}
function generateLogs($type = 'error', $message = '')
{
	$logFileDirName = $_SERVER['DOCUMENT_ROOT'].'/logs/'.date('d-M-Y');
	if(!is_dir($logFileDirName))
	{
		mkdir($logFileDirName, 0777, true);
	}

	$logFileData = $logFileDirName.'/log_'.date('d-M-Y').'.log';

	file_put_contents($logFileData, $type.': '.date('d-M-Y h:i:s').':'.$message.'\n'.FILE_APPEND);
}

// ---------------------------------New Code Errors ------------------------------------
error_reporting(E_ALL);
ini_set("display_errors", 0);

function customErrorHandler($errno, $errstr, $errfile, $errline)
{
	$message = "Error: [$errno] $errstr, $errfile, $errline";

	$logFileDirName = $_SERVER['DOCUMENT_ROOT'].'/logs/'.date('d-M-Y');
	if(!is_dir($logFileDirName))
	{
		mkdir($logFileDirName, 0777, true);
	}

	$logFileData = $logFileDirName.'/log_'.date('d-M-Y').'.log';
	error_log($message . PHP_EOL, 3, $logFileData);
}
set_error_handler("customErrorHandler");
?>