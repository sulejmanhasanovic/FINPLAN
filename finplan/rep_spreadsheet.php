<?php
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(LIBRARIES_PATH."./PHPExcel/PHPExcel.php");
	include(DOC_ROOT_PATH."xmlnames.php");
	require_once(MODELS_PATH."/XmlData.php");
	require_once(MODELS_PATH."/XmlCollection.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	//require_once(MODELS_PATH."/Finplan.php");


	//@todo refactor the script

	$caseStudyId = $_SESSION['cs']['id'];

	error_reporting(E_ALL);
	ini_set('display_errors', FALSE);
	ini_set('display_startup_errors', FALSE);
	date_default_timezone_set('Europe/Vienna');

	if (PHP_SAPI == 'cli')
		die('This example should only be run from a Web Browser');

	/** Include PHPExcel */
	//require_once dirname(__FILE__) . '/../Classes/PHPExcel.php';


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

	$agd = new XmlData($caseStudyId,$agxml);
	$agData = $agd->getByField('1','sid');//

	$cod = new XmlData($caseStudyId,$coxml);
	$coData = $cod->getByField('1','sid');//

	$csd = new XmlData($caseStudyId,$csxml);
	$csData = $csd->getByField(1,'sid');

	$ctd = new XmlData($caseStudyId,$ctxml);
	$ctData = $ctd->getByField('1','sid');//

	$cg = 'geninf_data';
	$dc = new XmlCollection($caseStudyId,$cg);
	$ahData = $dc->getoneById();

	$crd = new XmlData($caseStudyId,$crxml);
	$crData = $crd->getByField('1','sid');//

	$tableLength = $ahData['endYear'] - $ahData['startYear'] + 1;

	//$finplan = new Finplan($caseStudyId);

	function getNameFromNumber($num) {
	    $numeric = $num % 26;
	    $letter = chr(65 + $numeric);
	    $num2 = intval($num / 26);
	    if ($num2 > 0) {
	        return getNameFromNumber($num2 - 1) . $letter;
	    } else {
	        return $letter;
	    }
	}

	// Create new PHPExcel object
	$objPHPExcel = new PHPExcel();

	// Set document properties
	$objPHPExcel->getProperties()->setCreator("Department of Nuclear Energy")
								 ->setLastModifiedBy("Department of Nuclear Energy")
								 ->setTitle("Results")
								 ->setSubject("Results")
								 ->setDescription("Results")
								 ->setKeywords("Results")
								 ->setCategory("Results");

	$sharedStyle1 = new PHPExcel_Style();
	$sharedStyle2 = new PHPExcel_Style();

	$sharedStyle1->applyFromArray(
		array('borders' => array(
								'top'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'right'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN)
							)
		 ));
	$sharedStyle2->applyFromArray(
		array('fill' 	=> array(
									'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
									'color'		=> array('argb' => 'FFCCFFCC')
								),
			  'borders' => array(
									'top'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
									'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
									'right'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN)
								)
			 ));

	$objPHPExcel->createSheet(0);
	$objPHPExcel->setActiveSheetIndex(0);
	$sheet = $objPHPExcel->getActiveSheet();
	$sheet->getColumnDimension('A')->setWidth(50);


	$sheet->setSharedStyle($sharedStyle1, implode('', Array('A3:', getNameFromNumber($tableLength), 26)));
	$sheet->setSharedStyle($sharedStyle2, 'A4:A26');
	$sheet->setSharedStyle($sharedStyle2, 'A3:AL3');

	$indexColumn = 1;
	$indexStart = 4;
	$RoundPlace = 2;

	$rowLabels = Array(
		'Year',
		'INCOME :',
		'Fixed Income + other Income',
		'Total Sales Revenues',
		'Interest Earned',
		'Total Income',
		'EXPENDITURE :',
		'General Expenses',
		'Expenditure on Purchases',
		'Fuel Costs',
		'O&M Costs',
		'Contr. To Decomm. Fund',
		'Interest Paid',
		'Foreign Exchange Loss',
		'Contr. To Decomm. Trust',
		'Depreciation',
		'Royalty',
		'Income Tax',
		'Total Expenses',
		'',
		'Profit/Loss',
		'',
		'Dividends',
		'Retained Earnings'
	);
	for ($i = 0; $i<sizeof($rowLabels); $i++) {
		$sheet->setCellValue(implode('', Array('A',$i+$indexStart-1)), $rowLabels[$i]);
	}

	$j = 0;
	for ($i=$ahData['startYear']; $i<=$ahData['endYear']; $i++) {
		$sheet->setCellValue(implode('', Array(getNameFromNumber($j+1),3)), $i);
		$j++;
	}

	$boldRows = Array(3,4,8,9,21,23,25,26);
	foreach ($boldRows as $boldRow) {
		$sheet->getStyle(implode('', Array('A',$boldRow,':AL',$boldRow)))->getFont()->setBold(true);
	}

	for ($n = $ahData['startYear'];$n <= $ahData['endYear']; $n++) {

		$bval = 'LC_'.$n;//Revenue_Sale_LC
		$cval = 'SDIL_'.$n;//Short_Deposits_Int_LC
		$dval = '_'.$n;//Other_Income_LC
		$TotIncome = $bkData[$bval] + $cnData[$cval]+ $cvData['TOI_'.$n];

		$hVal = 'LC_'.$n;// Tot_Expenses_Purchase_LC(j)
		$iVal = 'LC_'.$n;// Tot_O&M_Cost_LC
		$jVal = 'LC_'.$n;// Tot_Fuel_Cost_LC
		$lVal = 'LC_'.$n;// Tot_Gen_Exp_LC
		$mVal = 'TIL_'.$n;//Tot_Interest_LC
		$nVal = 'PFLY_'.$n;//foreign exchange loss i.e. $fe_data['PFLY_'.$fe_i]
		$oVal = 'T_'.$n;// Tot_Dep_LC(j)
		$qVal = 'RLC_'.$n;//+ Royalty_LC(j)
		$rVal = 'ITL_'.$n;//Income_Tax_LC(j)
		$sVal ='ADFL_'.$n;//Ann_Decom_Funds_LC
		$tVal ='TDCL_'.$n;///Total_decom_costs_lc
		$TotExpense = $cgData[$hVal] + $bdData[$iVal] + $beData[$jVal] + $bzData[$lVal] + $cnData[$mVal] + $clData[$nVal] + $bgData[$oVal] + $ckData[$qVal] + $cnData[$rVal] + $ceData[$sVal] + $ceData[$tVal];
		$ProfitLoss = $TotIncome - $TotExpense;

		$sheetColumn = Array(
			round($cvData['TOI_'.$n],$RoundPlace),
			round($bkData[$bval],$RoundPlace),
			round($cnData[$cval],$RoundPlace),
			round($TotIncome,$RoundPlace),
			'',
		  round($bzData[$lVal],$RoundPlace),
		  round($cgData[$hVal],$RoundPlace),
		  round($beData[$jVal],$RoundPlace),
		  round($bdData[$iVal],$RoundPlace),
		  round($ceData[$sVal],$RoundPlace),
		  round($cnData[$mVal],$RoundPlace),
		  round($clData[$nVal],$RoundPlace),
		  round($ceData[$tVal],$RoundPlace),
		  round($bgData[$oVal],$RoundPlace),
		  round($ckData[$qVal],$RoundPlace),
		  round($cnData[$rVal],$RoundPlace),
		  round($TotExpense,$RoundPlace),
			'',
		  round($ProfitLoss,$RoundPlace),
			'',
			round($cnData['DivL_'.$n],$RoundPlace),
			'',
			round($cnData['REL_'.$n],$RoundPlace)
		);

		$excelColumn = getNameFromNumber($indexColumn);
		for ($j=0; $j<sizeof($sheetColumn); $j++) {
				$excelIndex = implode('', Array($excelColumn,$indexStart+$j));
				$sheet->setCellValue($excelIndex, $sheetColumn[$j]);
		}

		$indexColumn++;

	}

	// Rename worksheet
	$sheet->setTitle('Operating Account');
	$sheet->freezePane('B4');

	$objPHPExcel->createSheet(1);
	$objPHPExcel->setActiveSheetIndex(1);
	$sheet = $objPHPExcel->getActiveSheet();

	$sheet->getColumnDimension('A')->setWidth(75);

	$rowLabels = Array(
		'Year',
		'Cash Available in Short Term Deposits (at end of previous year)',
		'INFLOWS :',
		'Revenues',
		'Fixed Revenues',
		'Sales',
		'Others',
		'Interest Earned',
		'New Equity',
		'Bonds Issue',
		'Loans Drawdowns',
		'Stand-by Facility',
		'Total Inflows',
		'Flow from Short Term Deposits',
		'Total Cash Available',
		'OUTFLOWS :',
		'Investment',
		'O&M + Decommissioning Cost',
		'Fuel Expenses',
		'Expenditure on Purchases',
		'General Expenses',
		'Interest Paid',
		'Repayments: Loans & Bonds',
		'Repayments: Stand-by facility',
		'Equity Repayment',
		'Taxes & Royalties',
		'Dividend',
		'Flow to Short Term Deposits',
		'Total Outflows',
		'Cash Available (VAT)'
	);

	$indexColumn = 1;
	$indexStart = 4;
	$RoundPlace = 2;

	$sheet->setSharedStyle($sharedStyle1, implode('', Array('A3:', getNameFromNumber($tableLength), sizeof($rowLabels)+$indexStart-2)));
	$sheet->setSharedStyle($sharedStyle2, implode('', Array('A4:A', sizeof($rowLabels)+$indexStart-2)));
	$sheet->setSharedStyle($sharedStyle2, implode('', Array('A3:', getNameFromNumber($tableLength), 3)));



	for ($i = 0; $i<sizeof($rowLabels); $i++) {
		$sheet->setCellValue(implode('', Array('A',$i+$indexStart-1)), $rowLabels[$i]);
	}

	$j = 0;
	for ($i=$ahData['startYear']; $i<=$ahData['endYear']; $i++) {
		$sheet->setCellValue(implode('', Array(getNameFromNumber($j+1),3)), $i);
		$j++;
	}

	$boldRows = Array(3,5,15,17,18,31,32);
	foreach ($boldRows as $boldRow) {
		$sheet->getStyle(implode('', Array('A',$boldRow,':AL',$boldRow)))->getFont()->setBold(true);
	}

	for ($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++) {
		$mm = $m - 1;
		$nn = $m + 1;
		$bVal = 'LC_'.$m;//Revenue_Sale_LC
		$cVal = 'SDIL_'.$m;//Short_Deposits_Int_LC
		$dVal = 'N_'.$m;//New_Equity_LC
		$eVal = 'TBL_'.$m;//Tot_Bonds_LC
		$gVal = max(0,$cnData['SLL_'.$m]);//Short_Loans_LC
		//		$aaVal = 'SDBL_'.$mm;
		//		$abVal = 'SDBL_'.$m;
		$LoanDrawdown = $chData['LLC_'.$m] + $cnData['TCLL_'.$m];// export DD and Loan DD
		$CashAvailSTD[$m] = $cnData['SDBL_'.$mm];
		$CashAvailSTD[$nn] = $cnData['SDBL_'.$nn];
		$hVal = 'GIL_'.$m;// Global_Invest_LC
		$iVal = 'OMTD_'.$m;// O&M & Trust Decom
		$jVal = 'LC_'.$m;// Tot_Fuel_Cost_LC
		$kVal = 'LC_'.$m;// Tot_Expenses_Purchase_LC(j)
		$lVal = 'LC_'.$m;// Tot_Gen_Exp_LC
		$mVal = 'TIL_'.$m;//Tot_Interest_LC
		$nVal = 'TRL_'.$m;//Tot_Repay_LC(j)
		$oVal = 'SLRL_'.$m;//Short_Loans_Repay_LC
		$pVal = 'TERL_'.$m;//Tot_Equity_Repay_LC
		$qVal = 'ITL_'.$m;//Income_Tax_LC(j)
		$rVal = 'RLC_'.$m;//+ Royalty_LC(j)
		$qrVal = $cnData[$qVal] + $ckData[$rVal];//Income_Tax_LC(j) + Royalty_LC(j)
		$sVal = 'DivL_'.$m;//Tot_Dividend_LC
		$uVal = max(0,$cnData['SDBL_'.$m]-$cnData['SDBL_'.$mm]);
		$yVal = 'FR_'.$m;//Fixed_Revenues (j)
		$zVal = 'OI_'.$m;//Other_Income (j)
							$aVal = $cvData[$yVal] + $bkData[$bVal] + $cvData[$zVal];
		$tVal = $agData[$hVal]+$bdData[$iVal]+$beData[$jVal]+$cgData[$kVal]+$bzData[$lVal]+$cnData[$mVal]+$cnData[$nVal]+$cnData[$oVal]+$cnData[$pVal]+$qrVal+$cnData[$sVal]+$uVal;
		$totinflow = $aVal + $cnData[$cVal] + $cdData[$dVal] + $cnData[$eVal] + $LoanDrawdown + $gVal;
		$flowstd = max(0,$cnData['SDBL_'.$mm]-$cnData['SDBL_'.$m]);
		$totcash = $totinflow + $flowstd;

		$sheetColumn = Array(
			round($CashAvailSTD[$m],$RoundPlace),
			'',
			round($aVal, $RoundPlace),
			round($cvData[$yVal],$RoundPlace),
			round($bkData[$bVal],$RoundPlace),
			round($cvData[$zVal],$RoundPlace),
			round($cnData[$cVal],$RoundPlace),
			round($cdData[$dVal],$RoundPlace),
			round($cnData[$eVal],$RoundPlace),
			round($LoanDrawdown,$RoundPlace),
			round($gVal,$RoundPlace),
			round($totinflow,$RoundPlace),
			round($flowstd,$RoundPlace),
			round($totcash,$RoundPlace),
			'',
			round($agData[$hVal],$RoundPlace),
			round($bdData[$iVal],$RoundPlace),
			round($beData[$jVal],$RoundPlace),
			round($cgData[$kVal],$RoundPlace),
			round($bzData[$lVal],$RoundPlace),
			round($cnData[$mVal],$RoundPlace),
			round($cnData[$nVal],$RoundPlace),
			round($cnData[$oVal],$RoundPlace),
			round($cnData[$pVal],$RoundPlace),
			round($qrVal,$RoundPlace),
			round($cnData[$sVal],$RoundPlace),
			round($uVal,$RoundPlace),
			round($tVal,$RoundPlace),
			round($totcash - $tVal,$RoundPlace)
		);

		$excelColumn = getNameFromNumber($indexColumn);
		for ($j=0; $j<sizeof($sheetColumn); $j++) {
				$excelIndex = implode('', Array($excelColumn,$indexStart+$j));
				$sheet->setCellValue($excelIndex, $sheetColumn[$j]);
		}

		$indexColumn++;
	}

	$sheet->setTitle('Cash Inflows and Outflows');
	$sheet->freezePane('B4');

	$objPHPExcel->createSheet(2);
	$objPHPExcel->setActiveSheetIndex(2);
	$sheet = $objPHPExcel->getActiveSheet();

	$sheet->getColumnDimension('A')->setWidth(75);

	$rowLabels = Array(
		'Study Year',
		'Assets :',
		'Gross Fixed Assets',
		'Less: Accumulated Depreciation',
		'Less: Accumulated Consumer Contribution',
		'Net Fixed Assets',
		'Work In Progress',
		'Receivables',
		'Short Term Deposits',
		'TOTAL',
		'Equity and Liabilities :',
		'Equity',
		'Retained Earnings',
		'Bonds Outstanding',
		'Net Loans Outstanding',
		'Consumer Deposits + Decommissioning Reserve',
		'Current Maturity',
		'TOTAL'
	);

	$indexColumn = 1;
	$indexStart = 4;
	$RoundPlace = 2;

	$sheet->setSharedStyle($sharedStyle1, implode('', Array('A3:', getNameFromNumber($tableLength), sizeof($rowLabels)+$indexStart-2)));
	$sheet->setSharedStyle($sharedStyle2, implode('', Array('A4:A', sizeof($rowLabels)+$indexStart-2)));
	$sheet->setSharedStyle($sharedStyle2, implode('', Array('A3:', getNameFromNumber($tableLength), 3)));

	for ($i = 0; $i<sizeof($rowLabels); $i++) {
		$sheet->setCellValue(implode('', Array('A',$i+$indexStart-1)), $rowLabels[$i]);
	}

	$j = 0;
	for ($i=$ahData['startYear']; $i<=$ahData['endYear']; $i++) {
		$sheet->setCellValue(implode('', Array(getNameFromNumber($j+1),3)), $i);
		$j++;
	}

	$boldRows = Array(3,4,13,20);
	foreach ($boldRows as $boldRow) {
		$sheet->getStyle(implode('', Array('A',$boldRow,':AL',$boldRow)))->getFont()->setBold(true);
	}

	$aval = 'GFA_';//Gross_Fixed_Assets
	$bval = 'CD_';//Cum_Depreciation
	$cval = 'CC_';//Con_contribution
	$dval = 'NFA_';//Net_Fixed_Assets
	$eval = 'WPL_';
	$fval = 'R_';//Receivable
	$gval = 'SDBL_';//Short_Deposits_Balance_LC
	$hval = 'NEOL_';//Net_Equity_Outstand_LC
	$ival = 'AREL_';//Add_Retained_Earn_LC
	$jval = 'NBOL_';//Net_Bonds_Outstand_LC
	$kval = 'NLOL_';//Net_Loan_Outstand_LC
	$lval = 'CDDFL_';//Cons_Dep_Decom_Fund_LC
	$mval = 'CML_';//Current_Maturity

	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++) {
		$tot_asset[$m] = round($coData[$dval.$m] + $agData[$eval.$m] + $coData[$fval.$m] + $cnData[$gval.$m],$RoundPlace);
		$tot_liab[$m] = round($coData[$hval.$m] + $cnData[$ival.$m] + $coData[$jval.$m] + $coData[$kval.$m] + $coData[$lval.$m] + $coData[$mval.$m],$RoundPlace);
		$sheetColumn = Array(
			'',
			round($coData[$aval.$m],$RoundPlace),
			round($coData[$bval.$m],$RoundPlace),
			round($coData[$cval.$m],$RoundPlace),
			round($coData[$dval.$m],$RoundPlace),
			round($agData[$eval.$m],$RoundPlace),
			round($coData[$fval.$m],$RoundPlace),
			round($cnData[$gval.$m],$RoundPlace),
			$tot_asset[$m],
			'',
			round($coData[$hval.$m],$RoundPlace),
			round($cnData[$ival.$m],$RoundPlace),
			round($coData[$jval.$m],$RoundPlace),
			round($coData[$kval.$m],$RoundPlace),
			round($coData[$lval.$m],$RoundPlace),
			round($coData[$mval.$m],$RoundPlace),
			$tot_liab[$m]
		);

		$excelColumn = getNameFromNumber($indexColumn);
		for ($j=0; $j<sizeof($sheetColumn); $j++) {
				$excelIndex = implode('', Array($excelColumn,$indexStart+$j));
				$sheet->setCellValue($excelIndex, $sheetColumn[$j]);
		}

		$indexColumn++;

	}

	$sheet->setTitle('Balance Sheet');
	$sheet->freezePane('B4');

	$objPHPExcel->createSheet(3);
	$objPHPExcel->setActiveSheetIndex(3);
	$sheet = $objPHPExcel->getActiveSheet();

	$sheet->getColumnDimension('A')->setWidth(75);

	$rowLabels = Array(
		'Year',
		'Initial Equity',
		'Eq.Increase',
		'Eq.Repayments',
		'Dividend',
		'Final Disposal',
		'Total Flow',
		'Return On Equity (%)'
	);

	$indexColumn = 1;
	$indexStart = 4;
	$RoundPlace = 2;

	$sheet->setSharedStyle($sharedStyle1, implode('', Array('A3:', getNameFromNumber($tableLength), sizeof($rowLabels)+$indexStart-2)));
	$sheet->setSharedStyle($sharedStyle2, implode('', Array('A4:A', sizeof($rowLabels)+$indexStart-2)));
	$sheet->setSharedStyle($sharedStyle2, implode('', Array('A3:', getNameFromNumber($tableLength), 3)));

	for ($i = 0; $i<sizeof($rowLabels); $i++) {
		$sheet->setCellValue(implode('', Array('A',$i+$indexStart-1)), $rowLabels[$i]);
	}

	$j = 0;
	for ($i=$ahData['startYear']; $i<=$ahData['endYear']; $i++) {
		$sheet->setCellValue(implode('', Array(getNameFromNumber($j+1),3)), $i);
		$j++;
	}

	$boldRows = Array(3,9);
	foreach ($boldRows as $boldRow) {
		$sheet->getStyle(implode('', Array('A',$boldRow,':AL',$boldRow)))->getFont()->setBold(true);
	}

	for ($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++) {

		$bVal = 'N_'.$m;
		$oVal = 'T_'.$m;
		$rVal = 'E_'.$m;
		$dVal = 'DivL_'.$m;
		$eVal = 'FD_'.$m;//  $di_Final_Disposal[$di_i];
		$fVal = 'TF_'.$m;// $di_Total_Flow[$di_i];
		$gVal = 'RE_'.$m;// $di_Return_OnEquity[$di_i];

		$sheetColumn = Array(
			0,
			round($cdData[$bVal],$RoundPlace),
			round($cdData[$rVal],$RoundPlace),
			round($cnData[$dVal],$RoundPlace),
			round($csData[$eVal],$RoundPlace),
			round($csData[$fVal],$RoundPlace),
			round($csData[$gVal],$RoundPlace)
		);

		$excelColumn = getNameFromNumber($indexColumn);
		for ($j=0; $j<sizeof($sheetColumn); $j++) {
				$excelIndex = implode('', Array($excelColumn,$indexStart+$j));
				$sheet->setCellValue($excelIndex, $sheetColumn[$j]);
		}

		$indexColumn++;

	}

	$sheet->setCellValue(implode('', Array('A', sizeof($rowLabels)+5)), implode('', Array('NPV=',round($csData['NPV'],2),' IRR =',round($csData['IRR'],2))));

	$sheet->setTitle('Shareholders\' Return');
	$sheet->freezePane('B4');

	$objPHPExcel->createSheet(4);
	$objPHPExcel->setActiveSheetIndex(4);
	$sheet = $objPHPExcel->getActiveSheet();

	$sheet->getColumnDimension('A')->setWidth(75);

	$rowLabels = Array(
		'Year',
		'Working Capital',
		'',
		'Leverage',
		'',
		'Equipment Renewal',
		'',
		'Gross Profit Rate',
		'',
		'Debt Repayment Time',
		'',
		'Exchange Risk',
		'',
		'Breakeven Point',
		'',
		'Interest Charge Weight',
		'',
		'Global Index',
		'Self Financing Ratio',
		'',
		'Debt Equity Ratio',
		'',
		'Debt Service Coverage',
		'',
		'ROR on Rev Assets',
		''
	);

	$indexColumn = 1;
	$indexStart = 4;
	$RoundPlace = 2;

	$sheet->setSharedStyle($sharedStyle1, implode('', Array('A3:', getNameFromNumber($tableLength), sizeof($rowLabels)+$indexStart-2)));
	$sheet->setSharedStyle($sharedStyle2, implode('', Array('A4:A', sizeof($rowLabels)+$indexStart-2)));
	$sheet->setSharedStyle($sharedStyle2, implode('', Array('A3:', getNameFromNumber($tableLength), 3)));

	for ($i = 0; $i<sizeof($rowLabels); $i++) {
		$sheet->setCellValue(implode('', Array('A',$i+$indexStart-1)), $rowLabels[$i]);
	}

	$j = 0;
	for ($i=$ahData['startYear']; $i<=$ahData['endYear']; $i++) {
		$sheet->setCellValue(implode('', Array(getNameFromNumber($j+1),3)), $i);
		$j++;
	}

	$boldRows = Array(3);
	foreach ($boldRows as $boldRow) {
		$sheet->getStyle(implode('', Array('A',$boldRow,':AL',$boldRow)))->getFont()->setBold(true);
	}

	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++) {

		$aval = 'R1_'.$m;
		$aaval = 'R1S_'.$m;
		$bval = 'R2_'.$m;
		$bbval = 'R2S_'.$m;
		$cval = 'R3_'.$m;
		$ccval = 'R3S_'.$m;
		$dval = 'R4_'.$m;
		$ddval = 'R4S_'.$m;
		$eval = 'R5_'.$m;
		$eeval = 'R5S_'.$m;
		$fval = 'R6_'.$m;
		$ffval = 'R6S_'.$m;
		$gval = 'R7_'.$m;
		$ggval = 'R7S_'.$m;
		$hval = 'R8_'.$m;
		$hhval = 'R8S_'.$m;
		$ival = 'R9_'.$m;
		$iival = 'R9S_'.$m;
		$jval = 'R10_'.$m;
		$jjval = 'R10S_'.$m;
		$kval = 'R11_'.$m;
		$kkval = 'R11S_'.$m;
		$lval = 'R12_'.$m;
		$llval = 'R12S_'.$m;
		$mval = 'GI_'.$m;


		$sheetColumn = Array(
			round($ctData[$aval],$RoundPlace),
			$ctData[$aaval],
	    round($ctData[$bval],$RoundPlace),
			$ctData[$bbval],
			round($ctData[$cval],$RoundPlace),
			$ctData[$ccval],
			round($ctData[$dval],$RoundPlace),
			$ctData[$ddval],
			round($ctData[$eval],$RoundPlace),
			$ctData[$eeval],
			round($ctData[$fval],$RoundPlace),
			$ctData[$ffval],
			round($ctData[$gval],$RoundPlace),
			$ctData[$ggval],
			round($ctData[$hval],$RoundPlace),
			$ctData[$hhval],
			round($ctData[$mval],$RoundPlace),
			round($ctData[$ival],$RoundPlace),
			$ctData[$iival],
			round($ctData[$jval],$RoundPlace),
			$ctData[$jjval],
			round($ctData[$kval],$RoundPlace),
			$ctData[$kkval],
			round($ctData[$lval],$RoundPlace),
			$ctData[$llval]
		);

		$excelColumn = getNameFromNumber($indexColumn);
		for ($j=0; $j<sizeof($sheetColumn); $j++) {
				$excelIndex = implode('', Array($excelColumn,$indexStart+$j));
				$sheet->setCellValue($excelIndex, $sheetColumn[$j]);
		}

		$indexColumn++;

	}

	$sheet->setTitle('Financial Ratios');
	$sheet->freezePane('B4');

	$objPHPExcel->createSheet(5);
	$objPHPExcel->setActiveSheetIndex(5);
	$sheet = $objPHPExcel->getActiveSheet();

	$sheet->getColumnDimension('A')->setWidth(75);

	$rowLabels = Array(
		'Year',
		'Loans and Bonds Outstanding',
		'',
		'Cash available during Loan Term',
		'PV of Cash available during Loan Term',
		'Maximum Project Finance during Loan Term',
		'',
		'Cash available during Project Life',
		'PV of Cash available during Project Life',
		'Maximum Project Finance during Project Life'
	);

	$indexColumn = 1;
	$indexStart = 4;
	$RoundPlace = 2;

	$sheet->setSharedStyle($sharedStyle1, implode('', Array('A3:', getNameFromNumber($tableLength), sizeof($rowLabels)+$indexStart-2)));
	$sheet->setSharedStyle($sharedStyle2, implode('', Array('A4:A', sizeof($rowLabels)+$indexStart-2)));
	$sheet->setSharedStyle($sharedStyle2, implode('', Array('A3:', getNameFromNumber($tableLength), 3)));

	for ($i = 0; $i<sizeof($rowLabels); $i++) {
		$sheet->setCellValue(implode('', Array('A',$i+$indexStart-1)), $rowLabels[$i]);
	}

	$j = 0;
	for ($i=$ahData['startYear']; $i<=$ahData['endYear']; $i++) {
		$sheet->setCellValue(implode('', Array(getNameFromNumber($j+1),3)), $i);
		$j++;
	}

	$boldRows = Array(3);
	foreach ($boldRows as $boldRow) {
		$sheet->getStyle(implode('', Array('A',$boldRow,':AL',$boldRow)))->getFont()->setBold(true);
	}


	for ($m = $ahData['startYear'];$m <= $ahData['endYear']; $m++) {

		$aval = 'LL_'.$m; //Loan_during_Life
		$bval = 'LT_'.$m; //Loan_during_Term
		$cval = 'NT_'.$m; //Loan_NPV_Term
		$dval = 'MFLo_'.$m; //MX_Fin_Loan
		$eval = 'NL_'.$m; //Loan_NPV_Life
		$fval = 'MFLi_'.$m; //MX_Fin_Life
		// Add extra info from balancesheet report = sum of Net_Bonds_Outstand_LC and Net_Loan_Outstand_LC to compare with the maximum limits for project finance
		// Label is "Loans and Bonds Outstanding"
		$jval = 'NBOL_'.$m;//Net_Bonds_Outstand_LC
		$kval = 'NLOL_'.$m;//Net_Loan_Outstand_LC

		$sheetColumn = Array(
			round(($coData[$jval] + $coData[$kval]),$RoundPlace),
			'',
			round($crData[$bval],$RoundPlace),
			round($crData[$cval],$RoundPlace),
			round($crData[$dval],$RoundPlace),
			'',
			round($crData[$aval],$RoundPlace),
			round($crData[$eval],$RoundPlace),
			round($crData[$fval],$RoundPlace)
		);

		$excelColumn = getNameFromNumber($indexColumn);
		for ($j=0; $j<sizeof($sheetColumn); $j++) {
				$excelIndex = implode('', Array($excelColumn,$indexStart+$j));
				$sheet->setCellValue($excelIndex, $sheetColumn[$j]);
		}

		$indexColumn++;

	 }


	$sheet->setTitle('Project Finance Analysis');
	$sheet->freezePane('B4');


	// Set active sheet index to the first sheet, so Excel opens this as the first sheet
	$objPHPExcel->setActiveSheetIndex(0);

	// Redirect output to a client’s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="finplan-results.xls"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');

	// If you're serving to IE over SSL, then the following may be needed
	header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
	header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	header ('Pragma: public'); // HTTP/1.0

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');

	exit;

?>
