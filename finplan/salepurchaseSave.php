<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	$productTypes = Config::getData('producttype');

	$ard = new XmlData($caseStudyId,$arxml);
	
	switch($_POST['act']){
		default:
			
		break;	
		
		case 'a'://add
			$ard->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."salepurchase.php");
		break;
		
		case 'd':
			if(isset($_REQUEST['id'])){
				$spData = $ard->deleteById($_REQUEST['id']);	
				redirectBrowser(HTTP_ROOT."salepurchase.php");	
			}		
		break;
		
		case 'e': //edit
			if(isset($_REQUEST['id'])){
				$spData = $ard->getById($_REQUEST['id']);
			}		
		break;
		
		case 'u'://update submitted
			$spData = $ard->deleteById($_POST['did']);	
			$ard->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."salepurchase.php");	
					
		break;
	}
		
	
	redirectBrowser(HTTP_ROOT."salepurchase.php");	
	
		
?>
