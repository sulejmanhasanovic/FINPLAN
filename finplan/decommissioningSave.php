<?php 
	require_once("./includes/common.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(MODELS_PATH."XmlData.php");
	include(DOC_ROOT_PATH."general.php");
	$productTypes = Config::getData('producttype');
	

	$akd = new XmlData($caseStudyId,$akxml);
	
	
	switch($_POST['act']){
		default:
			
		break;	
		
		case 'a'://add
			$akd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."decommissioning.php");
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
				redirectBrowser(HTTP_ROOT."decommissioning.php");
				break;
		
		case 'u'://update submitted
			$akd->deleteById($_POST['eid']);
			$akd->add($_POST['data']);	
			redirectBrowser(HTTP_ROOT."decommissioning.php");	
		break;
	}
		
	$data = $apd->getAll();
	
	include(TEMPLATE_PATH."decommissioning.tpl.php"); ?>
