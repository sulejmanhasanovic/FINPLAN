<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	
	
	$chd = new XmlData($caseStudyId,$chxml);
	$chData = $chd->getByField(1,'sid');
	
	
	include(TEMPLATE_PATH."rep_ecreditwiselc.tpl.php");		
?>
