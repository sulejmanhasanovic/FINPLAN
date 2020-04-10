<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body>
<?php }?>
<h3>Stand-by in Local Currency (Million)</h3>



<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><div><?php }?>
<table border="1" cellspacing="0" cellpadding="0">
  <tr valign="top">
    <td valign="top">
	<table border="0" cellpadding="0" cellspacing="0">
		
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
			<table border="0" cellpadding="0" cellspacing="0">
				
				
				<tr>
				  <th>Drawdowns</th>
				  <th>Balance</th>
				  <th>Interest</th>
				 
				  
				</tr>
				
		<?php 
			for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){
						
				$dval = 'SLL_'.$m;
				$bval = 'SLOLC_'.$m;
				$ival = 'SLLI_'.$m;
				$rval = 'SLRL_'.$m;
				
	
		?>
			   <tr>
				 <td class="number"><?php echo round($cnData[$dval],$RoundPlace);?></td>
				 <td class="number"><?php echo round($cnData[$bval],$RoundPlace);?></td>
				 <td class="number"><?php echo round($cnData[$ival],$RoundPlace);?></td>
				 
				
				</tr>
		<?php	}?>
			  </table></td>
  </tr>
</table>

</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
