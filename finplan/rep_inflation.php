<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	
	$add = new XmlData($caseStudyId,$adxml);
	
	$caData = $add->getAll();
	foreach($caData as $row){
	 $eid = $row['id'];
	 	 }
	$ceData = $add->getById($eid); 
	
	include(TEMPLATE_PATH."rep_inflation.tpl.php");		
?>
