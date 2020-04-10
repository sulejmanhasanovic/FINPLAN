<?php
	require_once("./includes/common.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(MODELS_PATH."XmlData.php");
	include(DOC_ROOT_PATH."general.php");

	$aad = new XmlData($caseStudyId,$aaxml);
	$aaData = $aad->getAll();
	foreach($aaData as $row){
		$tid = $row['id'];
	}
	$ctData = $aad->getById($tid);
	
	$cod = new XmlData($caseStudyId,$coxml);
	$coData = $cod->getByField('1','sid');
	
	$cad = new XmlData($caseStudyId,$caxml);
	$caData = $cad->getByField(1,'sid');
	
	$cbd = new XmlData($caseStudyId,$cbxml);
	$cbData = $cbd->getByField(1,'sid');

	include(TEMPLATE_PATH."report.tpl.php");