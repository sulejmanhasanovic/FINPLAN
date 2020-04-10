<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target=�_blank�>Open in New Window</a><?php }?>
<h3>Taxes & Royalty in Local Currency (Million)</h3>

<table width="100%" border="1" cellspacing="2" cellpadding="0">
  <tr valign="top">
    <td valign="top"><table border="1" width="100" cellpadding="0" cellspacing="0">

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
	<table border="1" width="1300" cellpadding="0" cellspacing="0">
        <tr>
		  <th>Revenues </th>
		  <th>Oper. Costs</th>
		  <th>Depreciation</th>
		  <th>Tot. Interest Paid</th>
		  <th>Interest Earned</th>
		  <th>Royalty</th>
		  <th>Prov. Foreign Loss</th>
		  <th>Taxable Income</th>
		  <th>Cum. Taxable Income</th>

		  <th>Taxloss Carryforward</th>
		  <th>Net Taxable Income</th>

		  <th>Dividend</th>
		  <th>Income Tax</th>

		</tr>
        <?php

	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){

		$RoyVal = 'RLC_'.$m;//Royalty
		$TaxIncVal = 'TaxIL_'.$m;//['TaxIL_'.$fi_i]
		$IncTaxVal = 'ITL_'.$m;//['ITL_'.$fi_i]
		$CumTaxIncVal = 'CTIL_'.$m;//['CTIL_'.$fi_i]
		$RevVal = 'R_'.$m;
		$OprVal = 'O_'.$m;
		$DepVal = 'T_'.$m;
		$IntEarVal = 'SDIL_'.$m;//Short_Deposits_Int_LC
		$TotIntPaiVal = 'TIL_'.$m;
		$ProForLosVal = 'PFLY_'.$m;//foreign exchange loss i.e. $fe_data['PFLY_'.$fe_i]
		$DivVal = 'DivL_'.$m;//dividend

		$TaxLossCF = $cnData['TLCF_'.$m];
		$NetTaxIncome = $cnData['NTI_'.$m];

	?>
        <tr>
		 <td class="number"><?php echo round($cjData[$RevVal],$RoundPlace);?></td>
		 <td class="number"><?php echo round($cjData[$OprVal],$RoundPlace);?></td>
		 <td class="number"><?php echo round($bgData[$DepVal],$RoundPlace);?></td>
		 <td class="number"><?php echo round($cnData[$TotIntPaiVal],$RoundPlace);?></td>
		 <td class="number"><?php echo round($cnData[$IntEarVal],$RoundPlace);?></td>
         <td class="number"><?php echo round($ckData[$RoyVal],$RoundPlace);?></td>
		 <td class="number"><?php echo round($clData[$ProForLosVal],$RoundPlace);?></td>
		 <td class="number"><?php echo round($cnData[$TaxIncVal],$RoundPlace);?></td>
		 <td class="number"><?php echo round($cnData[$CumTaxIncVal],$RoundPlace);?></td>

		 <td class="number"><?php echo round($TaxLossCF,$RoundPlace);?></td>
		 <td class="number"><?php echo round($NetTaxIncome,$RoundPlace);?></td>

		 <td class="number"><?php echo round($cnData[$DivVal],$RoundPlace);?></td>
		 <td class="number"><?php echo round($cnData[$IncTaxVal],$RoundPlace);?></td>


        </tr>
<?php	}	?>
    </table>
	</td>

  </tr>
</table>

</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
