<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	
	$crd = new XmlData($caseStudyId,$crxml);
	$crData = $crd->getByField('1','sid');//
	
	$cod = new XmlData($caseStudyId,$coxml);
	$coData = $cod->getByField('1','sid');//
	
		
	include(TEMPLATE_PATH."rep_risk.tpl.php");		
?>
