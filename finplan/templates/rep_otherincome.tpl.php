<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target=”_blank”>Open in New Window</a><?php }?>
<h3>Other Incomes in Local Currency (Million)</h3>

<table width="600" border="1" cellspacing="2" cellpadding="0">
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
	<table border="1" width="500" cellpadding="0" cellspacing="0">
          <tr>
		   <th>Fixed Revenues</th>
		    <th>Other Income</th>
			<th>Total Other Income</th>
		</tr>
        <?php 
			
	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){
		
		$aval = 'FR_'.$m;
		$bval = 'OI_'.$m;
		$cval = 'TOI_'.$m;
?>
       <tr>
          <td class="number"><?php echo round($cvData[$aval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($cvData[$bval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($cvData[$cval],$RoundPlace);?></td>
     
        </tr>
<?php	}	?>
    </table>
	</td>
    
  </tr>
</table>

</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
