<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	
	
	
	$bfd = new XmlData($caseStudyId,$bfxml);
	$bgd = new XmlData($caseStudyId,$bgxml);
	$caData = $bgd->getAll();
	
	switch($_REQUEST['a']){
		default:
			
		break;	
			
				
		case 'e': //edit
				$ceData = $bgd->getById($_REQUEST['id']);
				$cfData = $bfd->getByField($_REQUEST['pid'],'pid');
				$cpData = $apd->getById($_REQUEST['pid']);
		break;
			
	}	 
	
	
	include(TEMPLATE_PATH."rep_ntfxdasset.tpl.php");		
?>
