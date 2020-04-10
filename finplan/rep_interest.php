<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	$financeSources = Config::getData('financesource');
	
	$abd = new XmlData($caseStudyId,$abxml);
	
	$avd = new XmlData($caseStudyId,$avxml);
	$caData = $abd->getAll();
	
	switch($_REQUEST['a']){
		default:
			
		break;	
			
				
		case 'e': //edit
				$ceData = $avd->getByField($_REQUEST['pid'],'pid');
				$cpData = $apd->getById($_REQUEST['pid']);
		break;
			
	}	 
	
	
	include(TEMPLATE_PATH."rep_interest.tpl.php");		
?>
