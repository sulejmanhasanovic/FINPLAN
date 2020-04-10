<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	
	
	$cld = new XmlData($caseStudyId,$clxml);
	$clData = $cld->getByField(1,'sid');
	$cnd = new XmlData($caseStudyId,$cnxml);
	$cnData = $cnd->getByField(1,'sid');
	$ctd = new XmlData($caseStudyId,$ctxml);
	$ctData = $ctd->getByField(1,'sid');	
	
	
	include(TEMPLATE_PATH."rep_foriegnreq.tpl.php");		
?>
