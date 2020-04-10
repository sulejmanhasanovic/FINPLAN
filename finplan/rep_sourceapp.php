<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
    $cbd = new XmlData($caseStudyId,$cbxml);
	$cbData = $cbd->getByField('1','sid');//	

    $ccd = new XmlData($caseStudyId,$ccxml);
	$ccData = $ccd->getByField('1','sid');//	
	
	$cdd = new XmlData($caseStudyId,$cdxml);
	$cdData = $cdd->getByField('1','sid');//	
	
    $chd = new XmlData($caseStudyId,$chxml);
	$chData = $chd->getByField('1','sid');//
	
	$cid = new XmlData($caseStudyId,$cixml);
	$ciData = $cid->getByField('1','sid');//
	
	$cmd = new XmlData($caseStudyId,$cmxml);
	$cmData = $cmd->getByField('1','sid');//
			
	$cnd = new XmlData($caseStudyId,$cnxml);
	$cnData = $cnd->getByField(1,'sid');
	
	$agd = new XmlData($caseStudyId,$agxml);
	$agData = $agd->getByField('1','sid');
	
	$bsd = new XmlData($caseStudyId,$bsxml);
	$bsData = $bsd->getByField('1','sid');

	
	include(TEMPLATE_PATH."rep_sourceapp.tpl.php");		
?>
	
