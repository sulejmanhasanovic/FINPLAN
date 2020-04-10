<?php 
	require_once("./includes/common.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(MODELS_PATH."XmlData.php");
	include(DOC_ROOT_PATH."general.php");
	
	
	$bud = new XmlData($caseStudyId,$buxml);
	
	
	switch($_REQUEST['a']){
		default:
			
		break;	
				
		case 'd':
			if(isset($_REQUEST['id'])){
				$bud->deleteById($_REQUEST['id']);	
				redirectBrowser(HTTP_ROOT."genexpense.php");	
			}		
		break;
		case 'e': //edit
			if(isset($_REQUEST['id'])){
				$ceData = $apd->getById($_REQUEST['id']);
				$cfData = $bud->getByField($_REQUEST['id'],'pid');
			}		
		break;
	}
		
	$data = $apd->getAll();
	
	include(TEMPLATE_PATH."genexpense.tpl.php"); ?>
