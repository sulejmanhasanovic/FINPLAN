<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target=”_blank”>Open in New Window</a><?php }?>
<h3>Total Export Credits by Currency (Million)</h3>



<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><div style="width:800px;  overflow-y:hidden;overflow-x:auto;"><?php }?>
<table width="600" border="1" cellspacing="2" cellpadding="0">
  <tr valign="top">
    <td valign="top"><table border="1" width="50" cellpadding="0" cellspacing="0">
		
		<tr>
			<th >&nbsp;</th>
		</tr>
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
<?php
		for($i = 0; $i < count($CurChunks); $i++){ ?>
			<td valign="top">
			<table border="1" width="300" cellpadding="0" cellspacing="0">
				
				<tr>
				  <th colspan=4><?php echo Config2::getData('currencies',$CurChunks[$i]);?></th>
				</tr>
				<tr>
				  <th>Drawdowns</th>
				  <th>Balance</th>
				  <th>Interest</th>
				  <th>Repayments</th>
				</tr>
		<?php 
			for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){
						
				$dval = 'L_'.$CurChunks[$i].'_'.$m;//Tot_Export_Credits(f,j)
				$bval = 'B_'.$CurChunks[$i].'_'.$m;//Tot_Export_Credits_Balance(f,j)
				$ival = 'I_'.$CurChunks[$i].'_'.$m;//Tot_Export_Credits_Interest(f,j)
				$rval = 'R_'.$CurChunks[$i].'_'.$m;//Tot_Export_Credits_Repay(f,j)
				
		?>
			   <tr>
				 <td class="number"><?php echo round($chData[$dval],$RoundPlace);?></td>
				 <td class="number"><?php echo round($chData[$bval],$RoundPlace);?></td>
				 <td class="number"><?php echo round($chData[$ival],$RoundPlace);?></td>
				 <td class="number"><?php echo round($chData[$rval],$RoundPlace);?></td>
				
				</tr>
		<?php	}?>
			  </table></td>
<?php
			
		}

?>

  </tr>
</table>

</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
