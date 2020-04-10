<?php if(!isset($_REQUEST['viewid'])){
	$resmenu="block";
	include TEMPLATE_PATH."header.tpl.php";
	}else{
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=balancesheet.xls");
		include TEMPLATE_PATH."header_xls.tpl.php";
	}?>
</head>
<body>

	<?php
	if(!isset($_REQUEST['viewid'])){?>
		<a href="rep_balancesheet.php?viewid=1"><img src='images/excel.jpg' title="Export to Excel"border='0' /></a>
<?php	}?>
<h3>Balance Sheet in Local Currency (Million)</h3>

<?php $Tablewide = $NoYears * 67;?>
<table border="1" width="<?php echo $Tablewide;?>" cellpadding="0" cellspacing="0">

		<?php


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
?>
        <tr>
          <th >Study Year</th>
		  <?php 	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){?>

				  <th><?php echo "$m";?></th>

       <?php }?>
        </tr>
		<tr>
			<th><div align="Left">Assets :</div></th>
			 <?php 	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){?>

				   <th></th>

       <?php }?>
		</tr>
		 <tr>
			<td>Gross Fixed Assets</td>
			 <?php 	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){?>


		 <td class="number"><?php echo round($coData[$aval.$m],$RoundPlace);?></td>




       <?php }?>
			</tr>
		 <tr>
			 <td>Less: Accumulated Depreciation</td>
			  <?php 	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){?>


		 <td class="number"><?php echo round($coData[$bval.$m],$RoundPlace);?></td>




       <?php }?>
			 </tr>
		 <tr>
			 <td>Less: Accumulated Consumer Contribution</td>
			  <?php 	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){?>

				  <td class="number"><?php echo round($coData[$cval.$m],$RoundPlace);?></td>




       <?php }?>
			 </tr>
		 <tr>
			 <td>Net Fixed Assets</td>
			  <?php 	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){?>

				  <td class="number"><?php echo round($coData[$dval.$m],$RoundPlace);?></td>




       <?php }?>
			 </tr>
		 <tr>
			 <td>Work In Progress</td>
			  <?php 	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){?>

				  <td class="number"><?php echo round($agData[$eval.$m],$RoundPlace);?></td>


       <?php }?>
			 </tr>
		 <tr>
			 <td>Receivables</td> <?php 	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){?>

				  <td class="number"><?php echo round($coData[$fval.$m],$RoundPlace);?></td>



       <?php }?></tr>
		 <tr>
			 <td>Short Term Deposits</td> <?php 	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){?>


         <td class="number"><?php echo round($cnData[$gval.$m],$RoundPlace);?></td>





       <?php }?>
		</tr>
		 <tr>
			 <td>TOTAL</td> <?php 	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){

				$tot_asset[$m] = round($coData[$dval.$m] + $agData[$eval.$m] + $coData[$fval.$m] + $cnData[$gval.$m],$RoundPlace);
				?>
         <td class="number"><?php echo $tot_asset[$m];?></td>





       <?php }?>
		</tr>
		<tr>
			<th><div align="Left">Equity and Liabilities :</div></th> <?php 	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){?>

				  <th></th>

       <?php }?>
		</tr>
         <tr>
			<td>Equity</td> <?php 	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){?>

				<td class="number"><?php echo round($coData[$hval.$m],$RoundPlace);?></td>



       <?php }?>
			</tr>
		 <tr>
			<td>Retained Earnings</td> <?php 	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){?>

				  <td class="number"><?php echo round($cnData[$ival.$m],$RoundPlace);?></td>



       <?php }?>
			</tr>
		 <tr>
			<td>Bonds Outstanding</td> <?php 	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){?>

			<td class="number"><?php echo round($coData[$jval.$m],$RoundPlace);?></td>





       <?php }?>
			</tr>
		 <tr>
			<td>Net Loans Outstanding</td> <?php 	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){?>

				 <td class="number"><?php echo round($coData[$kval.$m],$RoundPlace);?></td>




       <?php }?>
			</tr>
		 <tr>
			<td>Consumer Deposits + Decommissioning Reserve</td>
<?php 	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){?>

				<td class="number"><?php echo round($coData[$lval.$m],$RoundPlace);?></td>

       <?php }?>
			</tr>
		 <tr>
			<td>Current Maturity</td> <?php 	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){?>

				<td class="number"><?php echo round($coData[$mval.$m],$RoundPlace);?></td>

       <?php }?>

		</tr>
        <tr>
			<td>TOTAL</td> <?php 	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){
			$tot_liab[$m] = round($coData[$hval.$m] + $cnData[$ival.$m] + $coData[$jval.$m] + $coData[$kval.$m] + $coData[$lval.$m] + $coData[$mval.$m],$RoundPlace);
			?>

				<td class="number"><?php echo $tot_liab[$m];?></td>

       <?php }?>

		</tr>







  </tr>
</table>

</div>

<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
