<h3>Cash Inflows & Outflows in Local Currency (Million)</h3>

<table width="100%" border="1" cellspacing="2" cellpadding="0">
  <tr valign="top">
    <td valign="top"><table border="1" width="80" cellpadding="0" cellspacing="0">
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

	<table border="1" width="900" cellpadding="0" cellspacing="0">
         <tr>
			<Th colspan=7>Inflows</Th>
		</tr>
		 <tr>
			<Th>Fixed Revenues</Th>
			 <Th>Sales</Th>
			 <Th>Interest Earned</Th>
			 <Th>New Equity</Th>
			 <Th>Bonds Issue</Th>
			 <Th>Loans Drawdowns</Th>
			 <Th>Stand-by Facility</Th>
		</tr>
					
        <?php 
			
	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){
				
		$aval = 'GFA_'.$m;//
		$bval = 'LC_'.$m;//Revenue_Sale_LC
		$cval = 'SDIL_'.$m;//Short_Deposits_Int_LC
		$dval = 'N_'.$m;//New_Equity_LC
		$eval = 'TBL_'.$m;//Tot_Bonds_LC
		$fval = 'TCLL_'.$m;//Tot_Comm_Loans_LC
		$gval = 'SLL_'.$m;//Short_Loans_LC

?>
       <tr>
         <td>-</td>
		 <td><?php echo $bkData[$bval];?></td>
		 <td><?php echo $cnData[$cval];?></td>
		 <td><?php echo $cdData[$dval];?></td>
		 <td><?php echo $cnData[$eval];?></td>
		 <td><?php echo $cnData[$fval];?></td>
		 <td><?php echo $cnData[$gval];?></td>
     
        </tr>
<?php	}	?>
    </table>
	</td>
 <td valign="top">

	<table border="1" width="2000" cellpadding="0" cellspacing="0">
		<tr>
			<Th colspan=12>Outflows</Th>
		</tr>
         <tr>
			<th>Investment</th> 
			<th>O&M Costs</th> 
			<th>Fuel Expenses</th> 
			<th>Expenditure on Purchases </th> 
			<th>General Expenses</th> 
			<th>Interest Paid</th> 
			<th>Repayments: Loans & Bonds</th> 
			<th>Repayments: Loans (stand-by facility)</th> 
			<th>Equity Repayment</th> 
			<th>Taxes & Royalties</th> 
			<th>Dividend</th> 
			<th>Total Outflows</th> 
		</tr>
					
        <?php 
			
	for($n = $ahData['startYear'];$n <= $ahData['endYear']; $n++){
				
		$hval = 'GIL_'.$n;// Global_Invest_LC
		$ival = 'LC_'.$n;// Tot_O&M_Cost_LC
		$jval = 'LC_'.$n;// Tot_Fuel_Cost_LC
		$kval = 'LC_'.$n;// Tot_Expenses_Purchase_LC(j)
		$lval = 'LC_'.$n;// Tot_Gen_Exp_LC
		$mval = 'TIL_'.$n;//Tot_Interest_LC
		$nval = 'TRL_'.$n;//Tot_Repay_LC(j)
		$oval = 'SLRL_'.$n;//Short_Loans_Repay_LC
		$pval = 'TERL_'.$n;//Tot_Equity_Repay_LC
		$qval = 'ITL_'.$n;//Income_Tax_LC(j) 
		$rval = 'RLC_'.$n;//+ Royalty_LC(j)
		$qrval = $cnData[$qval] + $ckData[$rval];
		$sval = 'DivL_'.$n;//Tot_Dividend_LC
		
		$tval = $agData[$hval]+$bdData[$ival]+$beData[$jval]+$cgData[$kval]+$bzData[$lval]+$cnData[$mval]+$cnData[$nval]+$cnData[$oval]+$cnData[$pval]+$qrval+$cnData[$sval];
?>		
       <tr>
         <td><?php echo $agData[$hval];?></td>
		 <td><?php echo $bdData[$ival];?></td>
		 <td><?php echo $beData[$jval];?></td>
		 <td><?php echo $cgData[$kval];?></td>
		 <td><?php echo $bzData[$lval];?></td>
		 <td><?php echo $cnData[$mval];?></td>
		 <td><?php echo $cnData[$nval];?></td>
		 <td><?php echo $cnData[$oval];?></td>
		 <td><?php echo $cnData[$pval];?></td>
		 <td><?php echo $qrval;?></td>
		 <td><?php echo $cnData[$sval];?></td>
		 <td><?php echo $tval ;?></td>
     
        </tr>
<?php	}	?>
    </table>
	</td>    
  </tr>
</table>


