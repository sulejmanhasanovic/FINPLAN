<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	$productTypes = Config::getData('producttype');

	$azd = new XmlData($caseStudyId,$azxml);
	
	switch($_POST['act']){
		default:
			
		break;	
		
		case 'a'://add
			$azd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."sale.php");
		break;
		
		case 'd':
			if(isset($_REQUEST['id'])){
				$spData = $azd->deleteById($_REQUEST['id']);	
				redirectBrowser(HTTP_ROOT."sale.php");	
			}		
		break;
		
		case 'e': //edit
			if(isset($_REQUEST['id'])){
				$spData = $azd->getById($_REQUEST['id']);
			}		
		break;
		
		case 'u'://update submitted
			$spData = $azd->deleteById($_POST['did']);	
			$azd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."sale.php");	
					
		break;
	}
		
	
	redirectBrowser(HTTP_ROOT."sale.php");	
	
		
?>
