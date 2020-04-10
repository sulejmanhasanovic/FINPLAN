<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	
	$agd = new XmlData($caseStudyId,$agxml);
	$agData = $agd->getByField('1','sid');//
	
	$cod = new XmlData($caseStudyId,$coxml);
	$coData = $cod->getByField('1','sid');//
	
	$cnd = new XmlData($caseStudyId,$cnxml);
	$cnData = $cnd->getByField(1,'sid');
	
	include(TEMPLATE_PATH."view_balancesheet.tpl.php");		
?>
