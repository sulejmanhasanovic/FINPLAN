<?php 
	require_once("./includes/common.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(MODELS_PATH."XmlData.php");
	include(DOC_ROOT_PATH."general.php");
	$productTypes = Config::getData('producttype');
	
	$aqd = new XmlData($caseStudyId,$aqxml);
	
	
	switch($_REQUEST['a']){
		default:
			
		break;	
		
		case 'd':
			if(isset($_REQUEST['id'])){
				$aqd->deleteById($_REQUEST['id']);
				redirectBrowser(HTTP_ROOT."plntproduct.php");	
			}		
		break;
		case 'e': //edit
			
				$ceData = $apd->getById($_REQUEST['id']);
				$cfData = $aqd->getByfield($_REQUEST['id'],'pid');
				
		break;
		
	}
		
	$data = $apd->getAll();
	
	include(TEMPLATE_PATH."plntproduct.tpl.php"); ?>
