<?php
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");


	$ckd = new XmlData($caseStudyId,$ckxml);
	$ckData = $ckd->getByField('1','sid');//get royalty lc

	$cnd = new XmlData($caseStudyId,$cnxml);
	$cnData = $cnd->getByField('1','sid');



	$bgd = new XmlData($caseStudyId,$bgxml);
	$bgData = $bgd->getByField('1','sid');//



	$cjd = new XmlData($caseStudyId,$cjxml);
	$cjData = $cjd->getByField('1','sid');//

	$cld = new XmlData($caseStudyId,$clxml);
	$clData = $cld->getByField('1','sid');//


	include(TEMPLATE_PATH."rep_taxroyalty.tpl.php");
?>
