<?php 
	require_once("./includes/common.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(MODELS_PATH."XmlData.php");
	include(DOC_ROOT_PATH."general.php");
	
	

	$cud = new XmlData($caseStudyId,$cuxml);
	
	
	switch($_POST['act']){
		default:
			
		break;	
		
		case 'a'://add
			$cud->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."fixrevotrinc.php");
		break;
		
				
				
		case 'u'://update submitted
			$cud->deleteById($_REQUEST['eid']);
			$cud->add($_POST['data']);	
			redirectBrowser(HTTP_ROOT."fixrevotrinc.php");	
		break;
	}
		
	
	include(TEMPLATE_PATH."fixrevotrinc.tpl.php"); ?>
