<?php 
	require_once("./includes/common.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(MODELS_PATH."XmlData.php");
	include(DOC_ROOT_PATH."general.php");
	$productTypes = Config::getData('producttype');
	
	$cqd = new XmlData($caseStudyId,$cqxml);
	
	$cfData = $cqd->getByfield(1,'sid');
	
	include(TEMPLATE_PATH."shareholderreturn.tpl.php"); ?>
