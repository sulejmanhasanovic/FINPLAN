<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	
	$brd = new XmlData($caseStudyId,$brxml);
	$pid =1;
	$ctData = $brd->getByField($pid,'sid');
	
	
	include(TEMPLATE_PATH."comminvest.tpl.php");		
?>
