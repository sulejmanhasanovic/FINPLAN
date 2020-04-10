<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	$productTypes = Config::getData('producttype');
	
	$azd = new XmlData($caseStudyId,$azxml);
	
	$Data = $azd->getAll();
	
	switch($_REQUEST['a']){
		default:
			
		break;	
		
		case 'a'://add
			$e->add($_POST['data']);
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
			if(isset($_REQUEST['id'])){
			$azd->update($_POST['data']);
			}		
		break;
	}
	include(TEMPLATE_PATH."sale.tpl.php");		
?>
