<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");
	
	$agd = new XmlData($caseStudyId,$agxml);
	$agData = $agd->getByField('1','sid');//total investement
	
	$bdd = new XmlData($caseStudyId,$bdxml);
	$bdData = $bdd->getByField('1','sid');//cal_totalomcost
	
	$bed = new XmlData($caseStudyId,$bexml);
	$beData = $bed->getByField('1','sid');//cal_totalfuelcost
	
	$bgd = new XmlData($caseStudyId,$bgxml);
	$bgData = $bgd->getByField('1','sid');//cal_depreciation
	
	$bkd = new XmlData($caseStudyId,$bkxml);
	$bkData = $bkd->getByField('1','sid');//cal_totalsale
	
	$bzd = new XmlData($caseStudyId,$bzxml);
	$bzData = $bzd->getByField('1','sid');//cal_totalgenexpense
	
	$cdd = new XmlData($caseStudyId,$cdxml);
	$cdData = $cdd->getByField('1','sid');//cal_equity
	
	$cgd = new XmlData($caseStudyId,$cgxml);
	$cgData = $cgd->getByField('1','sid');//cal_totalpurchase
	
	$chd = new XmlData($caseStudyId,$chxml);
	$chData = $chd->getByField(1,'sid');//cal_totalexport
	
	$ckd = new XmlData($caseStudyId,$ckxml);
	$ckData = $ckd->getByField('1','sid');//cal_royalty
	
	$cnd = new XmlData($caseStudyId,$cnxml);
	$cnData = $cnd->getByField(1,'sid');//cal_SAoffunds
	
	$cvd = new XmlData($caseStudyId,$cvxml);
	$cvData = $cvd->getByField(1,'sid');//cal_revenues
	
//    echo "cnData";
//    echo "<pre>";
//    print_r($cnData);
//    echo "</pre>";
    
//    foreach ($cnData as $key=>$value)
//    {
//        if ((strpos($key, 'TRL_') === 0)||(strpos($key, 'TIL_') === 0) ) {
//        echo "cnData ". $key ." = ". $value."<br>";
//        }
//    }
    
//        echo "chData";
//    echo "<pre>";
//    print_r($chData);
//    echo "</pre>";

//die();
    
    	include(TEMPLATE_PATH."rep_inoutflow.tpl.php");
?>
