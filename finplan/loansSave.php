<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	
	$bmd = new XmlData($caseStudyId,$loans_data);
		
	switch($_POST['act']){
		default:
			
		break;	
		
		case 'a'://add
			$bmd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."loans.php");
		break;
		
		case 'd':
			
		break;
		
		case 'e': //edit
				
		break;
		
		case 'u'://update submitted
			$ahData = $bmd->deleteById($_POST['eid']);
			$bmd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."loans.php");
					
		break;
	}?>