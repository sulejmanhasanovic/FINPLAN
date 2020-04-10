<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target=”_blank”>Open in New Window</a><?php }?>
<h3>Equity & Dividend in Local Currency (Million)</h3>

<table border="1" cellspacing="2" cellpadding="0">
  <tr valign="top">
    <td valign="top"><table border="1" cellpadding="0" cellspacing="0">
       
        <tr>
          <th >Study Year</th>
        </tr>
		<tr>
          <td><?php echo $ahData['startYear']-1;?></td>
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
		  <th>Eq.Drawdown</th>
		  <th>Eq.Outstanding</th>
		  <th>Eq.Repayments</th>
		  <th>Dividend</th>
		</tr>
		<tr>
         <td class="number">0</td>
		 <td class="number"><?php echo round($cdData['IE'],$RoundPlace);?></td>
		 <td class="number">0</td>
		 <td class="number">0</td>
		
        </tr>
			
        <?php 
			
	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){
				
		$bval = 'N_'.$m;
		$oval = 'T_'.$m;
		$rval = 'E_'.$m;
		$dval = 'DivL_'.$m;
?>
       <tr>
         <td class="number"><?php echo round($cdData[$bval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($cdData[$oval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($cdData[$rval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($cnData[$dval],$RoundPlace);?></td>
		
     
        </tr>
<?php	}	?>
    </table>
	</td>
    
  </tr>
</table>

</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
