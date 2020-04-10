<?php 
	require_once("./includes/common.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(MODELS_PATH."XmlData.php");
	include(DOC_ROOT_PATH."general.php");
	
	$aud = new XmlData($caseStudyId,$auxml);
	
	
	switch($_POST['act']){
		default:
			
		break;	
		
		case 'a'://add
			$aud->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."termfinance.php?fs=".$_POST['Nme']);	
			
		break;
		
		
		break;
		
		case 'u'://update submitted
			//$d->updates($_POST['data'],'pid');
			$dtData = $aud->deleteById($_POST['eid']);
			$aud->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."termfinance.php?fs=".$_POST['Nme']);	
					
		break;
	}?>