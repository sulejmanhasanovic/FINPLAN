<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	$TaxType = Config::getData('TaxType');


	$atd = new XmlData($caseStudyId,$atxml);
	
	switch($_POST['act']){
		default:
			
		break;	
		
		case 'a'://add
			$atd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."assetliability.php");
		break;
		
		case 'd':
					
		break;
		
		case 'e': //edit
	
		break;
		
		case 'u'://update submitted
			$atd->deleteById($_REQUEST['id']);
			$atd->add($_POST['data']);	
			redirectBrowser(HTTP_ROOT."assetliability.php");	
		break;
	}
	
	include(TEMPLATE_PATH."taxinfo.tpl.php");		
?>
