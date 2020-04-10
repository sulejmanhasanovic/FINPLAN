<?php 
	require_once("./includes/common.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(MODELS_PATH."XmlData.php");
	include(DOC_ROOT_PATH."general.php");
	
	$bud = new XmlData($caseStudyId,$buxml);
	
	$ahData = $bud->getByfield($_POST['id'],'pid');
	
	switch($_POST['act']){
		default:
			
		break;	
		
		case 'a'://add
			$bud->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."genexpense.php");
		break;
		
				
		case 'u'://update submitted
			//$amd->updates($_POST['data'],'pid');
			$ahData = $bud->deleteById($_POST['eid']);
			$bud->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."genexpense.php");
					
		break;
	}?>