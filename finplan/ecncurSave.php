<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	$studyTypes = Config::getData('studytypes');
	
	$aid = new XmlData($caseStudyId,$aixml);
	$ceData = $aid->getByField('1','sid');
	
	switch($_POST['act']){
		default:
			
		break;	
		
		case 'a'://add
			$aid->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."taxinfo.php");
		break;
		
		case 'd':
			if(isset($_POST['id'])){
				$ahData = $aid->deleteById($_REQUEST['id']);			
			}		
		break;
		
		case 'e': //edit
			if(isset($_POST['id'])){
				$editFlag=true;
				$ahData = $aid->getById($_REQUEST['id']);
			}		
		break;
		
		case 'u'://update submitted
			$ceData = $aid->deleteById($_POST['eid']);
			$aid->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."taxinfo.php");		
		break;
	}?>