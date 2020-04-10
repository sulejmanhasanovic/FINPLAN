<h3>Balance Sheet in Local Currency (Million)</h3>

<table  border="1" cellspacing="0" cellpadding="0">
  <tr valign="top">
    <td valign="top">
	<table border="1" width="80" cellpadding="0" cellspacing="0">
         <tr>
          <th >Study Year</th>
        </tr>
		<tr>
          <th >&nbsp;</th>
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

	<table border="1" width="1200" cellpadding="0" cellspacing="0">
         <tr>
			<Th colspan=7>Assets</Th>
		</tr>
		 <tr>
			<Th>Gross Fixed Assets</Th>
			 <Th>Depreciation</Th>
			 <Th>Consumer Contribution</Th>
			 <Th>Net Fixed Assets</Th>
			 <Th>Work In Progress</Th>
			 <Th>Receivables</Th>
			 <Th>Short Term Deposits</Th>
		</tr>
					
        <?php 
			
	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){
				
		$aval = 'GFA_'.$m;//Gross_Fixed_Assets
		$bval = 'CD_'.$m;//Cum_Depreciation
		$cval = 'CC_'.$m;//Con_contribution
		$dval = 'NFA_'.$m;//Net_Fixed_Assets
		$eval = 'WPL_'.$m;
		$fval = 'R_'.$m;//Receivable
		$gval = 'SDBL_'.$m;//Short_Deposits_Balance_LC

?>
       <tr>
         <td><?php echo $coData[$aval];?></td>
		 <td><?php echo $coData[$bval];?></td>
		 <td><?php echo $coData[$cval];?></td>
		 <td><?php echo $coData[$dval];?></td>
		 <td><?php echo $agData[$eval];?></td>
		 <td><?php echo $coData[$fval];?></td>
		 <td><?php echo $cnData[$gval];?></td>
     
        </tr>
<?php	}	?>
    </table>
	</td>
 <td valign="top">

	<table border="1" width="1200" cellpadding="0" cellspacing="0">
		<tr>
			<Th colspan=6>Equity and Liabilities</Th>
		</tr>
         <tr>
			<Th>Equity</Th>
			<Th>Retained Earnings</Th>
			<Th>Bonds Outstanding</Th>
			<Th>Net Loans Outstanding</Th>
			<Th>Cons Dep Decom Reserve</Th>
			<Th>Current Maturity</Th>

		</tr>
					
        <?php 
			
	for($n = $ahData['startYear'];$n <= $ahData['endYear']; $n++){
				
		$hval = 'NEOL_'.$n;//Net_Equity_Outstand_LC
		$ival = 'AREL_'.$n;//Add_Retained_Earn_LC
		$jval = 'NBOL_'.$n;//Net_Bonds_Outstand_LC
		$kval = 'NLOL_'.$n;//Net_Loan_Outstand_LC
		$lval = 'CDDFL_'.$n;//Cons_Dep_Decom_Fund_LC
		$mval = 'CML_'.$n;//

?>
       <tr>
         <td><?php echo $coData[$hval];?></td>
		 <td><?php echo $cnData[$ival];?></td>
		 <td><?php echo $coData[$jval];?></td>
		 <td><?php echo $coData[$kval];?></td>
		 <td><?php echo $agData[$lval];?></td>
		 <td><?php echo $coData[$mval];?></td>
	
     
        </tr>
<?php	}	?>
    </table>
	</td>    
  </tr>
</table>

</div>

