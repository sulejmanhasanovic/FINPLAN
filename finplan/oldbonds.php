<?php 
		require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	
	$bxd = new XmlData($caseStudyId,$bxxml);
	$pid =1;
	$ctData = $bxd->getByField($pid,'sid'); 
	
	include(TEMPLATE_PATH."oldbonds.tpl.php");		
?>
