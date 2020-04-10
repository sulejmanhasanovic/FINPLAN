<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	
	$btd = new XmlData($caseStudyId,$btxml);
	$ctData = $btd->getByField(1,'sid');
	
	
	include(TEMPLATE_PATH."royalty.tpl.php");		
?>
