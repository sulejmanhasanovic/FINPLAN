<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	
	$brd = new XmlData($caseStudyId,$brxml);
	
		
	switch($_POST['act']){
		default:
			
		break;	
		
		case 'a'://add
			$brd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."conscontrib.php");
		break;
		
		case 'd':
			
		break;
		
		case 'e': //edit
				
		break;
		
		case 'u'://update submitted
			$ahData = $brd->deleteById($_POST['eid']);
			$brd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."conscontrib.php");
					
		break;
	}?>