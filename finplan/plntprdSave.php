<?php 
	require_once("./includes/common.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(MODELS_PATH."XmlData.php");
	include(DOC_ROOT_PATH."general.php");
	$productTypes = Config::getData('producttype');
	
	$aqd = new XmlData($caseStudyId,$aqxml);	
	$ahData = $aqd->getByfield($_POST['id'],'pid');
	
	switch($_POST['act']){
		default:
			
		break;	
		
		case 'a'://add
			$aqd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."plntproduct.php");
		break;
		
		case 'd':
			if(isset($_POST['id'])){
				$ahData = $aqd->deleteById($_REQUEST['id']);			
			}		
		break;
		
				
		case 'u'://update submitted
			
			$aqd->deleteById($_POST['id']);
			$aqd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."plntproduct.php");
		
		break;
	}?>