<?php 
	require_once("./includes/common.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(MODELS_PATH."XmlData.php");
	include(DOC_ROOT_PATH."general.php");
	
	$ald = new XmlData($caseStudyId,$alxml);
		
	switch($_POST['act']){
		default:
			
		break;	
		
		case 'a'://add
			$ald->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."depreciation.php");
		break;
		
		case 'd':
			if(isset($_POST['id'])){
				$cnData = $ald->deleteById($_REQUEST['id']);			
			}		
		break;
		
		case 'e': //edit
			if(isset($_POST['id'])){
				$editFlag=true;
				$cnData = $ald->getById($_REQUEST['id']);
			}		
		break;
		
		case 'u'://update submitted
			//$ald->update($_POST['data']);
			$cnData = $ald->deleteById($_POST['did']);
			$ald->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."depreciation.php");
					
		break;
	}?>