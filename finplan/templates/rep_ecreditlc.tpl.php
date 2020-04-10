<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target=”_blank”>Open in New Window</a><?php }?>
<h3>Total Export Credits in Local Currency (Million)</h3>



<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><div><?php }?>
<table border="1" cellspacing="2" cellpadding="0">
  <tr valign="top">
    <td valign="top"><table border="1" cellpadding="0" cellspacing="0">
		
	<tr>
		<th >Year</th>
	</tr>
    <?php for($i=$ahData['startYear'];$i <= $ahData['endYear']; $i++){?>
        <tr>
          <td><?php echo "$i";?></td>
        </tr>
    <?php }?>
    </table>
	</td>
			<td valign="top">
			<table border="1" cellpadding="0" cellspacing="0">
				
				
				<tr>
				  <th>Drawdowns</th>
				  <th>Balance</th>
				  <th>Interest</th>
				  <th>Repayments</th>
				</tr>
		<?php 
			for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){
						
				$dval = 'LLC_'.$m;
				$bval = 'BLC_'.$m;
				$ival = 'ILC_'.$m;
				$rval = 'RLC_'.$m;
	
		?>
			   <tr>
				 <td class="number"><?php echo round($chData[$dval],$RoundPlace);?></td>
				 <td class="number"><?php echo round($chData[$bval],$RoundPlace);?></td>
				 <td class="number"><?php echo round($chData[$ival],$RoundPlace);?></td>
				 <td class="number"><?php echo round($chData[$rval],$RoundPlace);?></td>
				
				</tr>
		<?php	}?>
			  </table></td>
  </tr>
</table>

</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
