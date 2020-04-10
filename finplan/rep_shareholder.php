<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	
	$cdd = new XmlData($caseStudyId,$cdxml);
	$cdData = $cdd->getByField('1','sid');//
	
	$cnd = new XmlData($caseStudyId,$cnxml);
	$cnData = $cnd->getByField(1,'sid');

	$csd = new XmlData($caseStudyId,$csxml);
	$csData = $csd->getByField(1,'sid');
	
	include(TEMPLATE_PATH."rep_shareholder.tpl.php");		
?>
