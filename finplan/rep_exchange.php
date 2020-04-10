<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	
	$acd = new XmlData($caseStudyId,$acxml);
	
	$caData = $acd->getAll();
	foreach($caData as $row){
	 $eid = $row['id'];
	 	 }
	$ceData = $acd->getById($eid); 
	
	include(TEMPLATE_PATH."rep_exchange.tpl.php");		
?>
