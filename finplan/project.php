<?php 
	require_once("./includes/common.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(MODELS_PATH."XmlData.php");
	include(DOC_ROOT_PATH."general.php");
	$productTypes = Config::getData('producttype');
	
	$bnd = new XmlData($caseStudyId,$bnxml);
	
	$bnData = $bnd->getByField('1','sid');//balace data


	switch($_REQUEST['a']){
		default:
			
		break;	
		
	}
		
		
	include(TEMPLATE_PATH."project.tpl.php"); ?>
