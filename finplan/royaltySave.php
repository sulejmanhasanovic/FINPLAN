<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	
	$btd = new XmlData($caseStudyId,$btxml);
	
		
	switch($_POST['act']){
		default:
			
		break;	
		
		case 'a'://add
			$btd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."royalty.php");
		break;
		
		case 'd':
			
		break;
		
		case 'e': //edit
				
		break;
		
		case 'u'://update submitted
			$ahData = $btd->deleteById($_POST['eid']);
			$btd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."royalty.php");
					
		break;
	}?>