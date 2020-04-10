<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target="_blank">Open in New Window</a><?php }?>
<h3>Total New Loans in Local Currency (Million)</h3>

<table border="1" cellspacing="2" cellpadding="0">
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
         <td class="number"><?php echo round($ciData[$dval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($ciData[$bval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($ciData[$ival],$RoundPlace);?></td>
		 <td class="number"><?php echo round($ciData[$rval],$RoundPlace);?></td>
		
        </tr>
<?php	}	?>
    </table>
	</td>
    
  </tr>
</table>

</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
