<?php 
	require_once("./includes/common.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(MODELS_PATH."XmlData.php");
	include(DOC_ROOT_PATH."general.php");
	$productTypes = Config::getData('producttype');
	

	$cqd = new XmlData($caseStudyId,$cqxml);
	
	
	switch($_POST['act']){
		default:
			
		break;	
		
		case 'a'://add
			$cqd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."shareholderreturn.php");
		break;
		
				
				
		case 'u'://update submitted
			$cqd->deleteById($_REQUEST['eid']);
			$cqd->add($_POST['data']);	
			redirectBrowser(HTTP_ROOT."shareholderreturn.php");	
		break;
	}
		
	
	include(TEMPLATE_PATH."shareholderreturn.tpl.php"); ?>
