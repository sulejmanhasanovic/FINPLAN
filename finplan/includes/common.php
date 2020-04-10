<?php
/*
	Date: Jan 18 2009
*/
//logical paths
error_reporting(~E_NOTICE);
define("ROOT_FOLDER","/finplan/finplan.ver.1.0/finplan/");
define("HTTP_ROOT","http://".$_SERVER['HTTP_HOST']."/".ROOT_FOLDER);
define("CSS_PATH",HTTP_ROOT."css/");

//physical paths
define("DOC_ROOT_PATH",$_SERVER['DOCUMENT_ROOT'].ROOT_FOLDER);
//define("DOC_ROOT_PATH",ROOT_FOLDER);
define("INCLUDE_PATH",DOC_ROOT_PATH."includes/");
define("TEMPLATE_PATH",DOC_ROOT_PATH."templates/");
define("LIBRARIES_PATH",DOC_ROOT_PATH."libraries/");
define("MODELS_PATH",DOC_ROOT_PATH."models/");
define("SERVICES_PATH",DOC_ROOT_PATH."services/");

define("DATA_FILE_PATH",DOC_ROOT_PATH."data/"); //physical path where xml data files are located
define("COMMON_DATA_FILE_PATH",DATA_FILE_PATH."common/"); //physical path where xml data files are located
define("PROJECT_DATA_FILE_PATH",DATA_FILE_PATH."projects/"); //physical path where xml data files are located
define("DATA_FILE_EXT","xml");

define("XML_FILE_HEAD",'<?xml version="1.0" encoding="utf-8"?>');

define('ACTIVE','1');//
define('INACTIVE','0');//

//start session
session_start();
ob_start();

//general purpose functions
function redirectBrowser($url){
	header("Location:$url");
	exit;
}

function setStatusMessage($msg){
	$_SESSION['__StatusMessage'] = $msg;
}

function getStatusMessage(){
	$msg = $_SESSION['__StatusMessage'];
	$_SESSION['__StatusMessage'] = '';
	return $msg;
}

function pr($v){
	//disabled for prod
	//echo "<pre>";
	//print_r($v);
	//echo "</pre>";
	return true;
}

function prx($v){
	echo "<pre>";
	print_r($v);
	echo "</pre>";
	exit;
}

function sanitize_filename($filename) {
  return preg_replace('%\W%', '_', $filename);
}
