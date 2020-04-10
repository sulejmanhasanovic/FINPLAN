<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	
	
	$cad = new XmlData($caseStudyId,$caxml);
	$caData = $cad->getByField(1,'sid');
	$cbd = new XmlData($caseStudyId,$cbxml);
	$cbData = $cbd->getByField(1,'sid');
	$ccd = new XmlData($caseStudyId,$ccxml);
	$ccData = $ccd->getByField(1,'sid');
	$chd = new XmlData($caseStudyId,$chxml);
	$chData = $chd->getByField(1,'sid');
	$cdd = new XmlData($caseStudyId,$cdxml);
	$cdData = $cdd->getByField(1,'sid');
	$cid = new XmlData($caseStudyId,$cixml);
	$ciData = $cid->getByField(1,'sid');
		
	$cld = new XmlData($caseStudyId,$clxml);
	$clData = $cld->getByField(1,'sid');
	
	include(TEMPLATE_PATH."rep_foriegnout.tpl.php");		
?>
