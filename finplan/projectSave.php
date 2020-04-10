<?php 
	require_once("./includes/common.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(MODELS_PATH."XmlData.php");
	include(DOC_ROOT_PATH."general.php");
	$productTypes = Config::getData('producttype');
	

	$bnd = new XmlData($caseStudyId,$bnxml);
	
	
	switch($_POST['act']){
		default:
			
		break;	
		
		case 'a'://add
			$bnd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."project.php");
		break;
			
				
		case 'u'://update submitted
			$bnd->deleteById($_REQUEST['eid']);
			$bnd->add($_POST['data']);	
			redirectBrowser(HTTP_ROOT."project.php");	
		break;
	}
		
	$bnData = $bnd->getByField('1','sid');//balace data	
	include(TEMPLATE_PATH."project.tpl.php"); ?>
