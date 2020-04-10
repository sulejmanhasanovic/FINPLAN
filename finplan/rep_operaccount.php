<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	
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
	
	$ced = new XmlData($caseStudyId,$cexml);
	$ceData = $ced->getByField(1,'sid');//

	$cgd = new XmlData($caseStudyId,$cgxml);
	$cgData = $cgd->getByField('1','sid');//
	
	$cld = new XmlData($caseStudyId,$clxml);
	$clData = $cld->getByField('1','sid');//
	
	$ckd = new XmlData($caseStudyId,$ckxml);
	$ckData = $ckd->getByField('1','sid');//
	
	$cnd = new XmlData($caseStudyId,$cnxml);
	$cnData = $cnd->getByField(1,'sid');
	
	$cvd = new XmlData($caseStudyId,$cvxml);
	$cvData = $cvd->getByField(1,'sid');
	
	include(TEMPLATE_PATH."rep_operaccount.tpl.php");		
?>
