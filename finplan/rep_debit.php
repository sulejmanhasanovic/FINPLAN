<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	$financeSources = Config::getData('financesource');
	
	$bpd = new XmlData($caseStudyId,$bpxml);
	$bqd = new XmlData($caseStudyId,$bqxml);
	
	
	switch($_REQUEST['a']){
		default:
		
		break;	
						
		case 'e': //edit
			$capData = $bpd->getByField('1','sid');
			$caqData = $bqd->getByField('1','sid');
		break;
			
	}	 
	
	
	include(TEMPLATE_PATH."rep_debit.tpl.php");		
?>
