<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	
	
	$bgd = new XmlData($caseStudyId,$bgxml);
	
	$apData = $apd->getAll();
	
	switch($_REQUEST['a']){
		default:
			
		break;	
					
		case 'e': //edit
				$bgData = $bgd->getByField($_REQUEST['pid'],'pid');
		break;
			
	}	 
	
	
	include(TEMPLATE_PATH."rep_deprplt.tpl.php");		
?>
