<?php 
	require_once("./includes/common.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(MODELS_PATH."XmlData.php");
	include(DOC_ROOT_PATH."general.php");
	
	
	$cud = new XmlData($caseStudyId,$cuxml);
	
	$cuData = $cud->getByfield(1,'sid');
	
	include(TEMPLATE_PATH."fixrevotrinc.tpl.php"); ?>
