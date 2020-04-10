<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	
	$ajd = new XmlData($caseStudyId,$ajxml);
	$ahData = $ajd->getByField('1','sid');
	
	switch($_POST['act']){
		default:
			
		break;	
		
		case 'a'://add
			$ajd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."cal_tempinflation.php");
		break;
		
		case 'd':
			if(isset($_POST['id'])){
				$ahData = $ajd->deleteById($_REQUEST['id']);			
			}		
		break;
		
		case 'e': //edit
			if(isset($_POST['id'])){
				$editFlag=true;
				$ahData = $ajd->getById($_REQUEST['id']);
				
			}		
		break;
		
		case 'u'://update submitted
			$ahData = $ajd->deleteById($_POST['eid']);
			$ajd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."cal_tempinflation.php");
		break;
	}?>