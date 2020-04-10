<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target=”_blank”>Open in New Window</a><?php }?>
<h3>Investments Expenditures in Local Currency (Million)</h3>

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
		  <th>Total Investments</th>
		  <th>Committed Investments</th>
		  <th>Global Investments</th>
		  
		         </tr>
        <?php 
			
	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){
				
		$tval = 'IL_'.$m;//['IL_'.$tin_i]
		$cval = 'CL_'.$m;//['CL_'.$tin_i]
		$gval = 'GIL_'.$m;//['GIL_'.$tin_i]
	
		
	?>
        <tr>
         <td class="number"><?php echo round($agData[$tval],$RoundPlace); ?></td>
		 <td class="number"><?php echo round($agData[$cval],$RoundPlace); ?></td>
		 <td class="number"><?php echo round($agData[$gval],$RoundPlace); ?></td>
		
        </tr>
<?php	}	?>
    </table>
	</td>
    
  </tr>
</table>

</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
