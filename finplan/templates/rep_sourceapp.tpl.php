<?php
	if(!isset($_REQUEST['viewid'])){
	$repmenu="block";
	include TEMPLATE_PATH."header.tpl.php";
	}else{
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=sourceapp.xls");
		include TEMPLATE_PATH."header_xls.tpl.php";
	}?>
</head>
<body>

	<?php
	if(!isset($_REQUEST['viewid'])){?>
		<a href="rep_sourceapp.php?viewid=1"><img src='images/excel.jpg' title="Export to Excel"border='0' /></a>
<?php	}?>
<h3>Sources & Application of Funds in Local Currency (Million)</h3>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr valign="top">
    <td valign="top"><table border="1" width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <th >&nbsp;</th>
        </tr>
        <tr>
          <th >Study Year</th>
        </tr>

        <?php 	for($i=$ahData['startYear'];$i <= $ahData['endYear']; $i++){?>
				<tr>
				  <td><?php echo "$i";?></td>
				</tr>
        <?php } ?>
      </table></td>
    <?php
?>
    <td valign="top">
	<?php $resmenu="block"; if(!isset($_REQUEST['viewid'])){?>
	<div style="width:500px; overflow-x:auto;"><?php }?>
	<table border="1" width="100%" align="center" cellpadding="0" cellspacing="0">
	 <tr>
	  <th colspan=10>Sources of Funds</th>

	</tr>
         <tr>
		  <th>Pre Investment Cash</th>
		  <th>Net Increase in Consumer Contribution</th>
		  <th>Consumer Deposits</th>
		  <th>Interest Earned</th>
		  <th>Cash Available in Short Term Deposits</th>
		  <th>New Equity</th>
		  <th>New+Old Bonds Issue</th>
		  <th>Loan Drawdown</th>
		  <th>Drawdown on Stand-by Facility</th>
		  <th>Total Sources</th>

	</tr>
        <?php

	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){

		$n= $m-1;
		$aval = 'PICL_'.$m;
		$bval = 'C_'.$m;
		$cval = 'D_'.$m;//$bsd
		$dval = 'SDIL_'.$m;
		$eval = 'SDBL_'.$n;
		$fval = 'N_'.$m;
		$gval = 'BLC_'.$m;
		$hval = 'LLC_'.$m;//$ci
		$ival = max(0,$cnData['SLL_'.$m]);		////Short_Loans_LC(j)
		$jval = 'TSL_'.$m;
		$kval = 'TCLL_'.$m;
		$LoanDrawdown = $chData[$hval] + $cnData[$kval]

?>
       <tr>
         <td class="number"><?php echo round($cnData[$aval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($bsData[$bval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($bsData[$cval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($cnData[$dval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($cnData[$eval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($cdData[$fval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($ccData['BLC_'.$m]+$cbData['BDL_'.$m],$RoundPlace);?></td>
		 <td class="number"><?php echo round($LoanDrawdown,$RoundPlace);?></td>
		 <td class="number"><?php echo round($ival,$RoundPlace);?></td>
		 <td class="number"><?php echo round($cnData[$jval],$RoundPlace);?></td>

        </tr>
<?php	}	?>
    </table>
	</div>
	</td>
     <td valign="top">
	<?php $resmenu="block"; if(!isset($_REQUEST['viewid'])){?><div style="width:500px; overflow-x:auto;"><?php }?>
	<table border="1" width="100%" align="center" cellpadding="0" cellspacing="0">
	 <tr>
		  <th colspan=10>Application of Funds</th>

	</tr>
    <tr>
		<th>Global<br/>Investment</th>
		<th>Total<br/>Interest Paid</th>
		<th>Total<br/>Repayment</th>
		<th>Repayment of<br/>Stand-By Facility</th>
		<th>Cash Reinvested in<br/>Short Term Deposits</th>
		<th>Equity<br/>Repayment</th>
		<th>Dividend</th>
		<th>VAT to<br/>Recover</th>
		<th>Export<br/>Credit Fees</th>
		<th>Total<br/>Application</th>

	</tr>
        <?php

	for($n=$ahData['startYear'];$n <= $ahData['endYear']; $n++){



		$mval = 'GIL_'.$n;//Global_Invest_LC(j)  $agd
		$nval = 'TIL_'.$n; // $fi_Tot_Interest_LC[$fi_i];
		$oval = 'TRL_'.$n; // $fi_Tot_Repay_LC[$fi_i];
		$pval = 'SLRL_'.$n; // $fi_Short_Loans_Repay_LC[$fi_i];
		$qval = 'SDBL_'.$n; // $fi_Short_Deposits_Balance_LC[$fi_i];
		$rval = 'TERL_'.$n;	// $fi_cdData['E_'.$fi_i];
		$sval = 'DivL_'.$n;	// $fi_Tot_Dividend_LC[$fi_i];
		$tval = 'TT_'.$n; //cmd
		$uval = 'FLC_'.$n;//$ch
		$wval = 'TAL_'.$n; // $fi_Tot_App_LC[$fi_i];
?>
       <tr>
			<td class="number"><?php echo round($agData[$mval],$RoundPlace);?></td>
			<td class="number"><?php echo round($cnData[$nval],$RoundPlace);?></td>
			<td class="number"><?php echo round($cnData[$oval],$RoundPlace);?></td>
			<td class="number"><?php echo round($cnData[$pval],$RoundPlace);?></td>
			<td class="number"><?php echo round($cnData[$qval],$RoundPlace);?></td>
			<td class="number"><?php echo round($cnData[$rval],$RoundPlace);?></td>
			<td class="number"><?php echo round($cnData[$sval],$RoundPlace);?></td>
			<td class="number"><?php echo round($cmData[$tval],$RoundPlace);?></td>
			<td class="number"><?php echo round($chData[$uval],$RoundPlace);?></td>
			<td class="number"><?php echo round($cnData[$wval],$RoundPlace);?></td>



        </tr>
<?php	}	?>
    </table><?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?></div><?php }?>
	</td>

  </tr>
</table>

</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
