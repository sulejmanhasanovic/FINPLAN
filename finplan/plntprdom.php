<?php 
	require_once("./includes/common.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(MODELS_PATH."XmlData.php");
	include(DOC_ROOT_PATH."general.php");
	
		
	$aod = new XmlData($caseStudyId,$aoxml);
	
	
	switch($_REQUEST['a']){
		default:
			
		break;	
		
		case 'a'://add
			$apd->add($_POST['data']);
		break;
		
		case 'd':
			if(isset($_REQUEST['id'])){
				$aod->deleteById($_REQUEST['id']);	
				redirectBrowser(HTTP_ROOT."plntprdom.php");	
			}		
		break;
		
		case 'e': //edit
			if(isset($_REQUEST['id'])){
				$ceData = $apd->getById($_REQUEST['id']);
				$cfData = $aod->getByField($_REQUEST['id'],'pid');
			}		
		break;
		
		case 'u'://update submitted
			if(isset($_REQUEST['id'])){
			$apd->update($_POST['data']);
			}		
		break;
	}
		
	$data = $apd->getAll();
	
	include(TEMPLATE_PATH."plntprdom.tpl.php"); ?>
