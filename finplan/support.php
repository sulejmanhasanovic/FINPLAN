<?php
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	$caseStudies = CaseStudy::getAllCaseStudies();
	require_once(INCLUDE_PATH."/label.php");
	
	
	include(TEMPLATE_PATH."support.tpl.php");
	
	
?>