<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	
	$bxd = new XmlData($caseStudyId,$bxxml);
	
		
	switch($_POST['act']){
		default:
			
		break;	
		
		case 'a'://add
			$bxd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."shareholderreturn.php");
		break;
		
		case 'd':
			
		break;
		
		case 'e': //edit
				
		break;
		
		case 'u'://update submitted
			$ahData = $bxd->deleteById($_POST['eid']);
			$bxd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."shareholderreturn.php");
					
		break;
	}?>