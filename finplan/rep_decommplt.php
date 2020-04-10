<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	
	
	$ced = new XmlData($caseStudyId,$cexml);
	
	$apData = $apd->getAll();
	
	switch($_REQUEST['a']){
		default:
			
		break;	
			
				
		case 'e': //edit
				$ceData = $ced->getByField(1,'sid');
		break;
			
	}	 
	
	
	include(TEMPLATE_PATH."rep_decommplt.tpl.php");		
?>
