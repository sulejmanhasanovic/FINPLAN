<?php
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	$caseStudies = CaseStudy::getAllCaseStudies();
	require_once(INCLUDE_PATH."/label.php");
	//if form is post

$filename = sanitize_filename($_GET["q"]).'.zip';//get the q parameter from URL
$destdir = DATA_FILE_PATH.'projects/backup/'.$filename;
	if(is_file($destdir)){//if does not exists create one
		$response="Backup File ".$destdir." already exists !<br>	Please select option below to proceed";
	}else{
		$response="You can skip below Options !";
		}

    echo $response;
?>