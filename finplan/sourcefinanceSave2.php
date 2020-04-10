<?php 
	require_once("./includes/common.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(MODELS_PATH."XmlData.php");
	include(DOC_ROOT_PATH."general.php");
	
	$asd = new XmlData($caseStudyId,$asxml);
	$sfData = $asd->getByfield($_POST['id'],'pid');
	$add = new XmlData($caseStudyId,$adxml);	
	$caiData = $add->getByField('1','sid');//get inflation index
	
	switch($_POST['act']){
		default:
			
		break;	
		
		case 'a'://add
			$asd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."sourcefinance2.php?cur=".$_REQUEST['currid']);
		break;
		
		case 'd':
			if(isset($_POST['id'])){
				$ahData = $asd->deleteById($_REQUEST['id']);			
			}		
		break;
		
		case 'e': //edit
			if(isset($_POST['id'])){
				$editFlag=true;
				$ahData = $asd->getById($_REQUEST['id']);
			}		
		break;
		
		case 'u'://update submitted
			//$asd->updates($_POST['data'],'pid');
			$sfData = $asd->deleteById($_POST['eid']);
			$asd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."sourcefinance2.php?cur=".$_REQUEST['currid']);
					
		break;
	}?>