<?php 
	require_once("./includes/common.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(MODELS_PATH."XmlData.php");
	include(DOC_ROOT_PATH."general.php");
	$productTypes = Config::getData('producttype');
	
	$akd = new XmlData($caseStudyId,$akxml);
	



	switch($_REQUEST['a']){
		default:
			
		break;	
		
		case 'a'://add
			$akd->add($_POST['data']);
		break;
		
		case 'd':
			if(isset($_REQUEST['id'])){
				$ceData = $apd->deleteById($_REQUEST['id']);	
				redirectBrowser(HTTP_ROOT."decommissioning.php");	
			}		
		break;
		
		case 'e': //edit
				$cpData = $apd->getById($_REQUEST['id']);
				$cfData = $akd->getByfield($_REQUEST['id'],'pid');
					break;
		
		case 'u'://update submitted
			$akd->deleteById($_REQUEST['pid']);
			$akd->add($_POST['data']);		
		break;
	}
		
	$data = $apd->getAll();
	
	include(TEMPLATE_PATH."decommissioning.tpl.php"); ?>
