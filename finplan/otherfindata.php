<?php 
	require_once("./includes/common.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(MODELS_PATH."XmlData.php");
	include(DOC_ROOT_PATH."general.php");
	$productTypes = Config::getData('producttype');
	
	$bod = new XmlData($caseStudyId,$boxml);
	
	$cfData = $bod->getByfield(1,'sid');


	switch($_REQUEST['a']){
		default:
			
		break;	
		
		case 'a'://add
			$bod->add($_POST['data']);
		break;
		
		case 'd':
			if(isset($_REQUEST['id'])){
				$ceData = $apd->deleteById($_REQUEST['id']);	
				redirectBrowser(HTTP_ROOT."decommissioning.php");	
			}		
		break;
		
		case 'e': //edit
				$cpData = $apd->getById($_REQUEST['id']);
				$cfData = $bod->getByfield(1,'sid');
					break;
		
		case 'u'://update submitted
			$bod->deleteById($_REQUEST['pid']);
			$bod->add($_POST['data']);		
		break;
	}
		
	
	
	include(TEMPLATE_PATH."otherfindata.tpl.php"); ?>
