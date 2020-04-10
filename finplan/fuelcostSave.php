<?php 
	require_once("./includes/common.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(MODELS_PATH."XmlData.php");
	include(DOC_ROOT_PATH."general.php");
	
	$amd = new XmlData($caseStudyId,$amxml);
	
	$ahData = $amd->getByfield($_POST['id'],'pid');
	
	switch($_POST['act']){
		default:
			
		break;	
		
		case 'a'://add
			$amd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."fuelcost.php");
		break;
		
				
		case 'u'://update submitted
			//$amd->updates($_POST['data'],'pid');
			$ahData = $amd->deleteById($_POST['eid']);
			$amd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."fuelcost.php");
					
		break;
	}?>