<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	
	
	$ccd = new XmlData($caseStudyId,$ccxml);
	
	//$caData = $ccd->getAll();
	
	
	
	include(TEMPLATE_PATH."rep_bondscur.tpl.php");		
?>
