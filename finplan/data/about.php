<?php
	require_once("./includes/common.php");
	require_once(INCLUDE_PATH."Data.class.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(INCLUDE_PATH."/CaseStudy.class.php");
	$caseStudies = CaseStudy::getAllCaseStudies();
	require_once(INCLUDE_PATH."/label.php");
	
	
	include(TEMPLATE_PATH."about.tpl.php");
	
	
?>