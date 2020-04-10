<?php if(!isset($_REQUEST['viewid'])){
	$resmenu="block";
	include TEMPLATE_PATH."header.tpl.php";
	}else{
		//header("Pragma: public");
		//header("Expires: 0");
		//header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Disposition: attachment; filename=operaccount.xls");
		header("Content-type: application/vnd.ms-excel");
		header('Content-Type: application/x-msexcel;
		        charset=UTF-8; format=attachment;');
		//header("Cache-Control: no-cache");
	  //header("Pragma: no-cache");
		//header('Pragma: private');
		//header('Cache-control: private, must-revalidate');

		//header('Cache-Control: max-age=0');

		// If you're serving to IE over SSL, then the following may be needed
		//header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		//header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		//header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		//header ('Pragma: public'); // HTTP/1.0
		include TEMPLATE_PATH."header_xls.tpl.php";
	}?>
</head>
<body>

	<?php
	if(!isset($_REQUEST['viewid'])){?>
		<a href="rep_operaccount.php?viewid=1"><img src='images/excel.jpg' title="Export to Excel"border='0' /></a>
<?php	}?>


<h3>Operating Account  in Local Currency (Million)</h3>

<table width="100%" border="0" cellspacing="2" cellpadding="0">
  <tr valign="top">
    <td valign="top">
      <table border="1" width="100" cellpadding="0" cellspacing="0">



        <tr><th>Year</th></tr>
		<tr><td><div align="center"><b>INCOME :</b></div></td></tr>

		<tr><td>Fixed Income + other Income</td></tr>
		<tr><td>Total Sales Revenues</td></tr>
		<tr><td>Interest Earned</td></tr>
		<tr><th>Total Income</th></tr>

		<tr><td><div align="center"><b>EXPENDITURE :</b></div></td></tr>

		 <tr> <td>General Expenses</td></tr>
		 <tr> <td>Expenditure on Purchases</td></tr>
		 <tr> <td>Fuel Costs</td></tr>
		 <tr> <td>O&M Costs</td></tr>
		 <tr> <td>Interest Paid</td></tr>
		 <tr> <td>Foreign Exchange Loss</td></tr>
		 <tr> <td>Decommissioning Expenses</td></tr>
		 <tr> <td>Depreciation</td></tr>
		 <tr> <td>Royalty</td></tr>
		 <tr> <td>Income Tax</td></tr>
		 <tr> <th>Total Expenses</th></tr>
    <tr> <td>&nbsp;</td></tr>
		 <tr> <th>Profit/Loss</th></tr>
    <tr> <td>&nbsp;</td></tr>
		 <tr> <th>Dividends</th></tr>
		 <tr> <th>Retained Earnings</th></tr>
    </table></td>
    <?php 	for($n = $ahData['startYear'];$n <= $ahData['endYear']; $n++){

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
		$TotExpense = $cgData[$hVal] + $bdData[$iVal] + $beData[$jVal] + $bzData[$lVal] + $cnData[$mVal] + $clData[$nVal] + $bgData[$oVal] + $ckData[$qVal] + $cnData[$rVal] + $ceData[$sVal] + $ceData[$tVal] ;
	  $ProfitLoss = $TotIncome - $TotExpense;
		?>

    <td valign="top">
	<table border="1" width="100%" cellpadding="0" cellspacing="0">

   <tr> <th><?php echo "$n";?></th></tr>
   <tr> <td>&nbsp;</td></tr>
		 <tr><td class="number"><?php echo round($cvData['TOI_'.$n],$RoundPlace);?></td></tr> <!--		<tr><td>Other Income</td></tr> -->
		 <tr><td class="number"><?php echo round($bkData[$bval],$RoundPlace);?></td></tr> <!-- 	 <tr><td>Total Sales Revenues</td></tr>-->
		 <tr><td class="number"><?php echo round($cnData[$cval],$RoundPlace);?></td></tr> <!--		<tr><td>Interest Earned</td></tr> -->
		 <tr><th class="number"><?php echo round($TotIncome,$RoundPlace);?></th></tr> <!-- 		<tr><th>Total Income</th></tr>-->
   <tr> <td>&nbsp;</td></tr>
			<tr><td class="number"><?php echo round($bzData[$lVal],$RoundPlace);?></td></tr> <!-- 		 <tr> <td>Gen. Expenses</td></tr> -->
			<tr><td class="number"><?php echo round($cgData[$hVal],$RoundPlace);?></td></tr> <!-- 		 <tr> <td>on Purchases</td></tr> -->
			<tr><td class="number"><?php echo round($beData[$jVal],$RoundPlace);?></td></tr> <!--		 <tr> <td>Fuel Costs</td></tr> -->
			<tr><td class="number"><?php echo round($bdData[$iVal],$RoundPlace);?></td></tr> <!-- 		 <tr> <td>O&M Costs</td></tr> -->
			<tr><td class="number"><?php echo round($cnData[$mVal],$RoundPlace);?></td></tr> <!--		 <tr> <td>Interest Paid</td></tr> -->
			<tr><td class="number"><?php echo round($clData[$nVal],$RoundPlace);?></td></tr> <!-- 		 <tr> <td>Foreign Exch.Loss</td></tr> -->
			<tr><td class="number"><?php echo round($ceData[$tVal],$RoundPlace)+round($ceData[$sVal],$RoundPlace);?></td></tr> <!-- 		 <tr> <td>Contr. To Decomm. Trust</td></tr> -->
			<tr><td class="number"><?php echo round($bgData[$oVal],$RoundPlace);?></td></tr> <!-- 		 <tr> <td>Depreciation</td></tr> -->
			<tr><td class="number"><?php echo round($ckData[$qVal],$RoundPlace);?></td></tr> <!-- 		 <tr> <td>Royalty</td></tr> -->
			<tr><td class="number"><?php echo round($cnData[$rVal],$RoundPlace);?></td></tr> <!-- 		 <tr> <td>Income Tax</td></tr> -->
			<tr><th class="number"><?php echo round($TotExpense,$RoundPlace);?></th></tr> <!-- 		 <tr> <th>Tot Expenses</th></tr> -->
    <tr> <td>&nbsp;</td></tr>
						  <tr> <th class="number"><?php echo round($ProfitLoss,$RoundPlace);?></th></tr>
    <tr> <td>&nbsp;</td></tr>
		 <tr> <td class="number"><?php echo round($cnData['DivL_'.$n],$RoundPlace);?></td></tr>
		 <tr> <td class="number"><?php echo round($cnData['REL_'.$n],$RoundPlace);?></td> </tr>

      </table></td><?php }?>

</table>

</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
