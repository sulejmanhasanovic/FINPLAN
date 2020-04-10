<?php $repmenu="block";
include TEMPLATE_PATH."header.tpl.php"?>
<script language="Javascript">


function limitText2(frm,limitField,curr,yr,limitNum) {
	var textbox = document.getElementById('data[GrossFixedAssets]');
	var textbox1 = document.getElementById('data[LessDepreciation]');
	var textbox2 = document.getElementById('data[ConsumerContribution]');
	var textbox3 = document.getElementById('data[NetFxdAsst]');
		textbox3.value = 0;
		textbox3.value = (textbox.value*1) - ((textbox1.value*1)+(textbox2.value*1));
}
</script>
<body>
<h3><?php echo 'Initial Balance Sheet';?></h3>
 <?php
		$assets = $ctData['GrossFixedAssets']- $ctData['LessDepreciation']-$ctData['ConsumerContribution']+$ctData['WorkProgress']+$ctData['Receivables']+$ctData['ShortTermDeposits'];
		$liability = $ctData['Equity'] + $ctData['RetainedEarning'] + $cbData['IBB'] + $caData['IBL'] + $ctData['ConsumerDeposits'] + $coData['CMBL'];
		if($assets!=$liability){
			echo '<b>Please Check your Data as Assets are not equal to Equity and Liabilities</b>';
		}
		?>
<table width="800" align="center" border="0" cellpadding="2" cellspacing="0" bgcolor="white">
      <tr valign="top">
      <td><table width="100%" border="1" cellpadding="4" cellspacing="0">
          <tr>
            <th colspan="4">
			<div align="Center"><?php echo 'Initial Balance Sheet of ';?>
			<?php echo $ahData['startYear']-1;?>&nbsp;<?php echo $al_19;?><?php echo $baseCname;?>)
			</div></th>
          </tr>
          <tr>
            <th colspan="2"><div align="Center"><?php echo $al_3;?></div></th>
            <th colspan="2"><div align="Center"><?php echo $al_4;?></div></th>
          </tr>
          <tr>
            <td><?php echo $al_5;?>&nbsp;</td><td class="number"><?php echo $ctData['GrossFixedAssets'];?>
                </td>
            <td><?php echo $al_6;?> &nbsp;</td><td class="number"><?php echo $ctData['Equity'];?>
                </td>
          </tr>
          <tr>
            <td><?php echo $al_7;?>&nbsp;</td><td class="number"><?php echo $ctData['LessDepreciation'];?></td>
            <td><?php echo $al_8;?> &nbsp;</td><td class="number"><?php echo $ctData['RetainedEarning'];?></td>
          </tr>
          <tr>
		  <td><?php echo $al_11;?> &nbsp;</td><td class="number"><?php echo $ctData['ConsumerContribution'];?></td>
           <td><?php echo $al_10;?> &nbsp;</td><td class="number"><?php echo $cbData['IBB'];?></td>

          </tr>
		   <tr>
             <td><?php echo $al_9a;?> &nbsp;</td><td class="number"><?php echo $ctData['NetFxdAsst'];?></td>
			<td><?php echo $al_14a;?> &nbsp;</td><td class="number"><?php echo $caData['IBL'];?></td>
          </tr>
          <tr>
             <td><?php echo $al_9;?> &nbsp;</td><td class="number"><?php echo $ctData['WorkProgress'];?></td>
			 <td><?php echo $al_12;?> &nbsp;</td><td class="number"><?php echo $ctData['ConsumerDeposits'];?></td>
          </tr>

          <tr>
            <td><?php echo $al_14;?> &nbsp;</td><td class="number"><?php echo $ctData['Receivables'];?></td>
            <td><?php echo $al_12a;?> &nbsp;</td><td class="number"><?php echo $coData['CMBL'];?></td>
          </tr>
          <tr>
            <td><?php echo $al_15;?> </td><td class="number"><?php echo $ctData['ShortTermDeposits'];?></td>
            <td>&nbsp; </td>
          </tr>

		  <tr>
            <th><div align="center"><?php echo 'Total';?> &nbsp;</th><th class="number"><?php echo $assets;?></div></th>
            <th><div align="center"><?php echo 'Total';?> &nbsp;</th><th class="number"><?php echo $liability;?></div></th>

          </tr>
        </table></td>
    </tr>

  </div>

  </td>

  </tr>

</table>
<?php include TEMPLATE_PATH."footer.tpl.php"?>
