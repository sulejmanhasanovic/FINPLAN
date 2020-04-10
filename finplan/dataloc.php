<?php
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	$caseStudies = CaseStudy::getAllCaseStudies();
	require_once(INCLUDE_PATH."/label.php");
	//if form is post
	if(isset($_POST['action'])){
		$action = $_POST['action'];
		if($action == 's' && isset($_POST['caseStudyId'])){//select
			$_SESSION['cs']['id'] = $_POST['caseStudyId'];
			redirectBrowser(HTTP_ROOT."geninf.php");
		} elseif($action == 'n' && isset($_POST['caseStudyName'])) { //new
			$_SESSION['cs_name'] = $_POST['caseStudyName'];
			$_SESSION['cs'] = NULL;
			redirectBrowser(HTTP_ROOT."create.php");
		}else{ 
			include(TEMPLATE_PATH."begin.tpl.php");
		}
	}else{
	include(TEMPLATE_PATH."dataloc.tpl.php");
	}
	
?>