<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	$bvd = new XmlData($caseStudyId,$bvxml);
		
	switch($_POST['act']){
		default:
			
		break;	
		
		case 'a'://add
			$bvd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."oldloans.php");
		break;
		
		case 'd':
			
		break;
		
		case 'e': //edit
				
		break;
		
		case 'u'://update submitted
			$ahData = $bvd->deleteById($_POST['eid']);
			$bvd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."oldbonds.php");
					
		break;
	}?>