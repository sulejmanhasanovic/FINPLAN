<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	$agd = new XmlData($caseStudyId,$agxml);
	$agData = $agd->getByField('1','sid');//
	
	$bdd = new XmlData($caseStudyId,$bdxml);
	$bdData = $bdd->getByField('1','sid');//
	
	$bed = new XmlData($caseStudyId,$bexml);
	$beData = $bed->getByField('1','sid');//
	
	$bgd = new XmlData($caseStudyId,$bgxml);
	$bgData = $bgd->getByField('1','sid');//
	
	$bkd = new XmlData($caseStudyId,$bkxml);
	$bkData = $bkd->getByField('1','sid');//
	
	$bzd = new XmlData($caseStudyId,$bzxml);
	$bzData = $bzd->getByField('1','sid');//
	
	$cdd = new XmlData($caseStudyId,$cdxml);
	$cdData = $cdd->getByField('1','sid');//
	
	$cgd = new XmlData($caseStudyId,$cgxml);
	$cgData = $cgd->getByField('1','sid');//
	
	$ckd = new XmlData($caseStudyId,$ckxml);
	$ckData = $ckd->getByField('1','sid');//
	
	$cnd = new XmlData($caseStudyId,$cnxml);
	$cnData = $cnd->getByField(1,'sid');
	
	include(TEMPLATE_PATH."view_operaccount.tpl.php");		
?>
