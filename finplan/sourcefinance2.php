<?php 
	require_once("./includes/common.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(MODELS_PATH."XmlData.php");
	include(DOC_ROOT_PATH."general.php");
	
	$financeSources = Config::getData('financesource');
	
	$and = new XmlData($caseStudyId,$anxml);
	$asd = new XmlData($caseStudyId,$asxml);
	$add = new XmlData($caseStudyId,$adxml);	
	
	
	switch($_REQUEST['a']){
		default:
			
		break;	
		
		case 'a'://add
		break;
		
		case 'd':
			if(isset($_REQUEST['id'])){
				$asd->deleteById($_REQUEST['id']);	
				$caiData = $add->getByField('1','sid');//get inflation index
				redirectBrowser(HTTP_ROOT."sourcefinance2.php?cur=".$_REQUEST['cur']);					

			}		
		break;
		
		case 'e': //edit
				$fid = $_REQUEST['cur'];
				$fid .= '_';
				$fid .= $_REQUEST['pid'];
				$ciData = $and->getById($_REQUEST['id']);
				$cfData = $asd->getByField($fid,'fid');
				$cpData = $apd->getById($_REQUEST['pid']);	
				$caiData = $add->getByField('1','sid');//get inflation index	
				if(is_array($caiData) && count($caiData) > 0) {
				$a=1;
				}else{
				 redirectBrowser(HTTP_ROOT."inflation.php?msg=Please Enter Inflation Data");
				}
		break;
		
		case 'u'://update submitted
					
		break;
	}
		
	$data = $and->getAll();
	
	include(TEMPLATE_PATH."sourcefinance2.tpl.php"); ?>
