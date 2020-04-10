<?php 
	require_once("./includes/common.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(MODELS_PATH."XmlData.php");
	include(DOC_ROOT_PATH."general.php");
	
	$and = new XmlData($caseStudyId,$anxml);
	
	$ahData = $and->getByfield($_POST['id'],'pid');
	
	switch($_POST['act']){
		default:
			
		break;	
		
		case 'a'://add
			$and->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."investmentcost.php");
		break;
		
		case 'd':
			if(isset($_POST['id'])){
				$ahData = $and->deleteById($_REQUEST['id']);			
			}		
		break;
		
		case 'e': //edit
			if(isset($_POST['id'])){
				$editFlag=true;
				$ahData = $and->getById($_REQUEST['id']);
			}		
		break;
		
		case 'u'://update submitted
			//$and->updates($_POST['data'],'pid');
			$ahData = $and->deleteById($_POST['eid']);
			$and->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."investmentcost.php");
					
		break;
	}?>