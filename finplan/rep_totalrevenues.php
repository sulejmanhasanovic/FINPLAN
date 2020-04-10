<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	
	$bkd = new XmlData($caseStudyId,$bkxml);
	$bkData = $bkd->getByField(1,'sid');
	
	
	/*switch($_REQUEST['a']){
		default:
			
		break;	
			
				
		case 'e': //edit
				$ceData = $ayd->getById($_REQUEST['id']);
				$cpData = $apd->getById($_REQUEST['pid']);
		break;
			
	}	 
	
	*/
	include(TEMPLATE_PATH."rep_totalrevenues.tpl.php");		
?>
