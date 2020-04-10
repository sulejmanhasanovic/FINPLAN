<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target=”_blank”>Open in New Window</a><?php }?>
<h3>Total Depreciation in Local Currency (Million)</h3>

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
		   <th>Total Depreciation</th>
		    
		</tr>
        <?php 
			
	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){
		
		$dval = 'T_'.$m;
		
?>
       <tr>
         
		 <td class="number"><?php echo round($bgData[$dval],$RoundPlace);?></td>
		      
        </tr>
<?php	}	?>
    </table>
	</td>
    
  </tr>
</table>

</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
