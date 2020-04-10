<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	
	
	$cbd = new XmlData($caseStudyId,$cbxml);
	$cbData = $cbd->getByField(1,'sid');

	
	
	include(TEMPLATE_PATH."rep_oldbondscur.tpl.php");		
?>
