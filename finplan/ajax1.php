<?php
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	$caseStudies = CaseStudy::getAllCaseStudies();
	require_once(INCLUDE_PATH."/label.php");
	//if form is post

	$filename = $_GET["q"];//get the q parameter from URL
	
	$destdir = DATA_FILE_PATH.'projects/'.$filename;
	if(is_dir($destdir)){//if does not exists create one
		$response="Case ".$filename." already exists !<br>	Change name to proceed";
	}else{
		$response="";
	}

    echo $response;
?>