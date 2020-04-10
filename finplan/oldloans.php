<?php 
		require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	
	$bvd = new XmlData($caseStudyId,$bvxml);
	$pid =1;
	$ctData = $bvd->getByField($pid,'sid'); 
	
	include(TEMPLATE_PATH."oldloans.tpl.php");		
?>
