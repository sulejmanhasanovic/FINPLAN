<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	$productTypes = Config::getData('producttype');	
	
	$ard = new XmlData($caseStudyId,$arxml);
	$Data = $ard->getAll();
	
	switch($_REQUEST['a']){
		default:
			
		break;	
		
		case 'a'://add
			$e->add($_POST['data']);
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
			if(isset($_REQUEST['id'])){
			$ard->update($_POST['data']);
			}		
		break;
	}
	include(TEMPLATE_PATH."salepurchase.tpl.php");		
?>
