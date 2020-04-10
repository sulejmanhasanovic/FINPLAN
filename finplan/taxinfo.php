<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	$TaxType = Config::getData('TaxType');

	
	$atd = new XmlData($caseStudyId,$atxml);
	
	$caData = $atd->getAll();
	foreach($caData as $row){
		$tid = $row['id'];
	}
	$ctData = $atd->getById($tid); 	
if(isset($_POST['act'])){
			
			$ctData = $atd->deleteById($_POST['act']);
			$atd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."main.php");

	}
 else {
		include(DOC_ROOT_PATH."general.php");
}
	
	include(TEMPLATE_PATH."taxinfo.tpl.php");		
?>
