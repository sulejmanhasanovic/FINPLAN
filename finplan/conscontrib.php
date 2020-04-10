<?php
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");


	$bsd = new XmlData($caseStudyId,$bsxml);
	$pid =1;
	$ctData = $bsd->getByField($pid,'sid');


	include(TEMPLATE_PATH."conscontrib.tpl.php");
?>
