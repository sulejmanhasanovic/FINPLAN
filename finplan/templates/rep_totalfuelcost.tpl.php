<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target=”_blank”>Open in New Window</a><?php }?>
<h3>Total Fuel Costs For All Plants (Million)</h3>
<?php if(is_array($caData) && count($caData) > 0){?>
<table border="0" cellspacing="2" cellpadding="0">
  <tr valign="top">
    <td valign="top"><table border="1" cellpadding="0" cellspacing="0">
        <tr>
          <th >YEAR</th>
        </tr>
        <tr>
          <th >&nbsp;</th>
        </tr>
        <?php 
	for($i=$ahData['startYear'];$i <= $ahData['endYear']; $i++){
?>
        <tr>
          <td><?php echo "$i";?></td>
        </tr>
        <?php
	}
?>
      </table></td>
    <?php 

for($i = 0; $i < count($allChunks); $i++){
	?>
    <td valign="top"><table border="1" cellpadding="0" cellspacing="0">
        <tr>
          <th colspan=2><?php echo Config2::getData('currencies',$allChunks[$i]);?></th>
        </tr>
        <tr>
          <th>In Constant Prices</th>
          <th>In Current Prices</th>
        </tr>
        <?php 
			
			for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){
				$omval = $allChunks[$i].'_'.$m;
				$eomval = 'E_'.$allChunks[$i].'_'.$m;
				
				?>
        <tr>
          <td class="number"><?php echo round($caData[$omval],$RoundPlace); ?></td>
          <td class="number"><?php echo round($caData[$eomval],$RoundPlace); ?></td>
        </tr>
        <?php		
		
	}?>
      </table></td>
    <?php
}
?>
<td valign="top"><table border="1" cellpadding="0" cellspacing="0">
        <tr>
          <th colspan=2>Total Fuel Cost in Local Currency</th>
        </tr>
        <tr>
         <th colspan=2><?php echo $baseCname;?></th>
        </tr>
        <?php 
			
			for($n=$ahData['startYear'];$n <= $ahData['endYear']; $n++){
				$lcval = 'LC_'.$n;
				
				?>
        <tr>
          <td class="number"><?php echo round($caData[$lcval],$RoundPlace);?></td>
        </tr>
        <?php			}
			
			
	?>
      </table></td>
  </tr>
</table>
<?php }

else {

Echo "No Record Found!";
}?>
</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
