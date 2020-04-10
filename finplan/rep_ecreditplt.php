<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	
	
	$avd = new XmlData($caseStudyId,$avxml);
	
	$caData = $avd->getAll();
	
	switch($_REQUEST['a']){
		default:
			
		break;	
			
				
		case 'e': //edit
				$avData = $avd->getById($_REQUEST['id']);
				$cpData = $apd->getById($_REQUEST['pid']);
		break;
			
	}	 
//	    echo "bal_Data";
//    echo "<pre>";
//    print_r($avData);
//    echo "</pre>";
//    echo "bal_Data";
//    echo "<pre>";
//    print_r($cpData);
//    echo "</pre>";


//die();
	
	include(TEMPLATE_PATH."rep_ecreditplt.tpl.php");		
?>
