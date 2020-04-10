<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	
	
	$afd = new XmlData($caseStudyId,$afxml);
	
	$caData = $afd->getAll();
	
	switch($_REQUEST['a']){
		default:
			
		break;	
			
				
		case 'e': //edit
				$afData = $afd->getById($_REQUEST['id']);
				$cpData = $apd->getById($_REQUEST['pid']);
		break;
			
	}	 
	
	
	include(TEMPLATE_PATH."rep_loanplt.tpl.php");		
?>
