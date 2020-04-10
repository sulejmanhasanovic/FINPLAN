<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target=”_blank”>Open in New Window</a><?php }?>

<h3>Total Old Loans in Local Currency (Million)</h3>

<table border="1" cellspacing="0" cellpadding="0">
  <tr valign="top">
    <td valign="top"><table border="1" cellpadding="0" cellspacing="0">
       
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
	<table border="1" cellpadding="0" cellspacing="0">
          <tr>
		  <th>Committed<br/>Drawdown</th>
		  <th>Outstanding</th>
		  <th>Interest</th>
		  <th>Repayments</th>
		</tr>
        <?php 
			
	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){
		$lval = 'LNL_'.$m;
		$oval = 'LL_'.$m;
		$ival = 'IL_'.$m;
		$rval = 'RL_'.$m;
?>
       <tr>
         <td class="number"><?php echo round($caData[$lval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($caData[$oval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($caData[$ival],$RoundPlace);?></td>
		 <td class="number"><?php echo round($caData[$rval],$RoundPlace);?></td>
		
     
        </tr>
<?php	}	?>
    </table>
	</td>
    
  </tr>
</table>

</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
