<?php 
	require_once("./includes/common.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(MODELS_PATH."XmlData.php");
	include(DOC_ROOT_PATH."general.php");
	
	$aod = new XmlData($caseStudyId,$aoxml);
	
	switch($_POST['act']){
		default:
			
		break;	
		
		case 'a'://add
			$aod->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."plntprdom.php");
		break;
		
		
		case 'u'://update submitted
			//$d->update($_POST['data']);
			$cpData = $aod->deleteById($_POST['eid']);
			$aod->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."plntprdom.php");
					
		break;
	}?>