<?php if(!isset($_REQUEST['viewid'])){
	$resmenu="block";
	include TEMPLATE_PATH."header.tpl.php";
	}else{
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=inflowoutflow.xls");
		include TEMPLATE_PATH."header_xls.tpl.php";
	}?>
</head>
<body>

	<?php
	if(!isset($_REQUEST['viewid'])){?>
		<a href="rep_inoutflow.php?viewid=1"><img src='images/excel.jpg' title="Export to Excel"border='0' /></a>
<?php	}?>
<h3>Cash Inflows and Outflows in Local Currency (Millions)</h3>

<table width="" border="1" cellspacing="0" cellpadding="0">
  <tr valign="top">
    <td valign="top">
	<table border="0" width="100%" cellpadding="2" cellspacing="2">
		<tr><td>Cash Available in Short Term Deposits (at end of previous year)</td></tr>
		<tr><th>Year</th></tr>
		<tr><td><div align="center"><b>INFLOWS :</b></div></td></tr>
		<tr><td>Revenues</td></tr>
		<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;Fixed Revenues</td></tr>
		<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;Sales</td></tr>
		<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;Others</td></tr>
		<tr><td>Interest Earned</td></tr>
		<tr><td>New Equity</td></tr>

		<tr><td>Bonds Issue</td></tr>

		<tr><td>Loans Drawdowns</td></tr>

		<tr><td>Stand-by Facility</td></tr>

		<tr><th>Total Inflows</th></tr>

		<tr><td>Flow from Short Term Deposits</td></tr>

		<tr><th>Total Cash Available</th></tr>

       <tr><td><div align="center"><b>OUTFLOWS :</b></div></td></tr>

		<tr><td>Investment</td></tr>

       <tr><td>O&M + Decommissioning Cost</td></tr>

       <tr><td>Fuel Expenses</td></tr>

       <tr><td>Expenditure on Purchases </td></tr>

       <tr><td>General Expenses</td></tr>

       <tr><td>Interest Paid</td></tr>

       <tr><td>Repayments: Loans & Bonds</td></tr>

       <tr><td>Repayments: Stand-by facility</td></tr>

       <tr><td>Equity Repayment</td></tr>

       <tr><td>Taxes & Royalties</td></tr>

       <tr><td>Dividend</td></tr>

       <tr><td>Flow to Short Term Deposits</td></tr>

       <tr><th>Total Outflows</th></tr>
						  <tr><th>Cash Available (VAT)</th></tr>

      </table></td>
      <?php for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){

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
		$tVal = $agData[$hVal]+$bdData[$iVal]+$beData[$jVal]+$cgData[$kVal]+$bzData[$lVal]+
		$cnData[$mVal]+$cnData[$nVal]+$cnData[$oVal]+$cnData[$pVal]+$qrVal+$cnData[$sVal]+$uVal;

		$totinflow = $aVal + $cnData[$cVal] + $cdData[$dVal] + $cnData[$eVal] + $LoanDrawdown + $gVal;
		$flowstd = max(0,$cnData['SDBL_'.$mm]-$cnData['SDBL_'.$m]);
		$totcash = $totinflow + $flowstd;
		?>
    <td Valign="top">
	<table border="0" width="100%" cellpadding="2" cellspacing="2">

		<tr><td class="number"><?php echo  round($CashAvailSTD[$m],$RoundPlace); ?></td></tr>
		<tr><th><?php echo $m;?></th></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td class="number"><?php echo  round($aVal, $RoundPlace); ?></td></tr>
		<tr><td class="number"><?php echo  round($cvData[$yVal],$RoundPlace); ?></td></tr>
		<tr><td class="number"><?php echo  round($bkData[$bVal],$RoundPlace); ?></td></tr>
		<tr><td class="number"><?php echo  round($cvData[$zVal],$RoundPlace); ?></td></tr>
		<tr><td class="number"><?php echo  round($cnData[$cVal],$RoundPlace); ?></td></tr>
		<tr><td class="number"><?php echo  round($cdData[$dVal],$RoundPlace); ?></td></tr>
		<tr><td class="number"><?php echo  round($cnData[$eVal],$RoundPlace); ?></td></tr>
		<tr><td class="number"><?php echo  round($LoanDrawdown,$RoundPlace); ?></td></tr>
		<tr><td class="number"><?php echo  round($gVal,$RoundPlace); ?></td></tr>
		<tr><th class="number"><?php echo  round($totinflow,$RoundPlace); ?></th></tr>
		<tr><td class="number"><?php echo  round($flowstd,$RoundPlace); ?></td></tr>
		<tr><th class="number"><?php echo  round($totcash,$RoundPlace); ?></th></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td class="number"><?php echo  round($agData[$hVal],$RoundPlace); ?></td></tr>
		<tr><td class="number"><?php echo  round($bdData[$iVal],$RoundPlace); ?></td></tr>
		<tr><td class="number"><?php echo  round($beData[$jVal],$RoundPlace); ?></td></tr>
		<tr><td class="number"><?php echo  round($cgData[$kVal],$RoundPlace); ?></td></tr>
		<tr><td class="number"><?php echo  round($bzData[$lVal],$RoundPlace); ?></td></tr>
		<tr><td class="number"><?php echo  round($cnData[$mVal],$RoundPlace); ?></td></tr>
		<tr><td class="number"><?php echo  round($cnData[$nVal],$RoundPlace); ?></td></tr>
		<tr><td class="number"><?php echo  round($cnData[$oVal],$RoundPlace); ?></td></tr>
		<tr><td class="number"><?php echo  round($cnData[$pVal],$RoundPlace); ?></td></tr>
		<tr><td class="number"><?php echo  round($qrVal,$RoundPlace); ?></td></tr>
		<tr><td class="number"><?php echo  round($cnData[$sVal],$RoundPlace); ?></td></tr>
		<tr><td class="number"><?php echo  round($uVal,$RoundPlace); ?></td></tr>
		<tr><th class="number"><?php echo  round($tVal,$RoundPlace); ?></th></tr>
		<tr><th class="number"><?php echo  round($totcash - $tVal,$RoundPlace); ?></th></tr>

      </table></td><?php }?>

</table>

</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
