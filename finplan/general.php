<?php

require_once("./includes/common.php");
require_once(MODELS_PATH."/XmlData.php");
require_once(MODELS_PATH."/XmlCollection.php");
require_once(INCLUDE_PATH."/Config.class.php");
// require_once(MODELS_PATH."/CaseStudy.php");

$currencies = Config::getData('currencies');
$studyTypes = Config::getData('studytypes');
$financeSources = Config::getData('financesource');
$caseStudyId = $_SESSION['cs']['id'];
//get general information
$cg = 'geninf_data';
$dc = new XmlCollection($caseStudyId,$cg);
$ahData = $dc->getoneById();
$caseStudyName = $ahData['studyName'];
$baseCurr = $ahData['baseCurrency'];
$baseCname = Config2::getData('currencies',$baseCurr);
$forCurr = $ahData['CurTypeSel'];
if($forCurr){
	$bothCurr = $forCurr;
	$bothCurr .= ',';
	$bothCurr .= $baseCurr;
	$base1Curr = $baseCurr.','.$forCurr;
	$CurChunks = explode(",", $forCurr);

}else{
	$bothCurr = $baseCurr;
	$base1Curr = $baseCurr;


}
$allChunks = explode(",", $bothCurr);
$base1Chunks = explode(",", $base1Curr);
$baseChunks = explode(",", $baseCurr);
//Defining width for some tables
$totcurr = count($CurChunks);
$wide = $totcurr * 200;
$wide = $wide +500;
$RoundPlace = 2;// Variable to define the round value for reports
$newwindow =  ""; // Set '?viewid=1' for report without css
$targetwindow = ""; // For report to open in new page value for target
$NoYears = $ahData['endYear'] - $ahData['startYear'];

//XML file names
$loans_data = 'loans_data';
$cal_loans = 'cal_loans';
$aaxml = 'assetliability_data';
$abxml = 'cal_Drawdown';
$acxml = 'cal_Exchange';
$adxml = 'cal_Inflation';
$aexml = 'cal_Investment';
$afxml = 'cal_commloan';
$agxml = 'cal_TotalInvestment';
$ahxml = 'geninf_data';
$aixml = 'exchange_data';
$ajxml = 'inflation_data';
$akxml = 'decomm_data';
$alxml = 'depreciation_data';
$amxml = 'fuelcost_data';
$anxml = 'investment_data';
$aoxml = 'OM_data';
$apxml = 'plant_data';
$aqxml = 'product_data';
$arxml = 'purchase_data';
$asxml = 'source_finance2';
$atxml = 'taxinfo_data';
$auxml = 'termfinance_data';
$avxml = 'cal_balance';
$ayxml = 'cal_sale';
$azxml = 'sale_data';
$baxml = 'cal_purchase';
$bbxml = 'cal_om';
$bcxml = 'cal_fuelcost';
$bdxml = 'cal_totalomcost';
$bexml = 'cal_totalfuelcost';
$bfxml = 'cal_globalinvst';
$bgxml = 'cal_depreciation';
$bhxml = 'cal_purchaseprod';
$bixml = 'cal_production';
$bjxml = 'cal_totalpurchase';// need to remove this
$bkxml = 'cal_totalsale';
$blxml = 'equity_data';
$bmxml = 'bonds_data';
$bnxml = 'project_data';
$boxml = 'otherfin_data';
$bpxml = 'cal_debitdrawdown';
$bqxml = 'cal_debitother';
$brxml = 'comminvest_data';
$bsxml = 'conscontrib_data';
$btxml = 'royalty_data';
$buxml = 'genexpense_data';
$bvxml = 'oldloans_data';
$bxxml = 'oldbonds_data';
$byxml = 'cal_genexpense';
$bzxml = 'cal_totalgenexpense';
$caxml = 'cal_oldloans';
$cbxml = 'cal_oldbonds';
$ccxml = 'cal_bonds';
$cdxml = 'cal_equity';
$cexml = 'cal_deccom';
$cfxml = 'cal_production';
$cgxml = 'cal_totalpurchase';
$chxml = 'cal_totalexport';
$cixml = 'cal_totalcommloan';
$cjxml = 'cal_totalrevenue';
$ckxml = 'cal_royalty';
$clxml = 'cal_forexchange';
$cmxml = 'cal_vat';
$cnxml = 'cal_SAoffunds';
$coxml = 'cal_AELmodule';
$cpxml = 'cal_balancesheet';
$cqxml = 'shareholder_data';
$crxml = 'cal_risk';
$csxml = 'cal_shareholder';
$ctxml = 'cal_financialratios';
$cuxml = 'fixrevotrinc';
$cvxml = 'cal_revenues';
//$ahd = new XmlData($caseStudyId,$ahxml);
$apd = new XmlData($caseStudyId,$apxml);


require_once(INCLUDE_PATH."/label.php");
?>
