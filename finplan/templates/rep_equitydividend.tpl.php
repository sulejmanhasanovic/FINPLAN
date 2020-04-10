<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target=”_blank”>Open in New Window</a><?php }?>

<h3>Equity & Dividend by Currency (Million)</h3>

<br>

<table  border="1" cellspacing="2" cellpadding="0">
  <tr valign="top">
    <td valign="top">
	<table border="1" width="130" cellpadding="0" cellspacing="0">
	<tr>
          <th>Year</th>
    </tr>
	<tr>
          <th>&nbsp;</th>
    </tr>
	<tr>
          <td><?php echo $ahData['startYear']-1;?></td>
        </tr>
    <?php for($i=$ahData['startYear'];$i <= $ahData['endYear']; $i++){?>
        <tr>
          <td><?php echo "$i";?></td>
        </tr>
    <?php }?>
    </table>
	</td>
<?php
for($c = 0; $c < count($allChunks); $c++){ 
$ieval = 'IE_'.$allChunks[$c];
?>
    <td valign="top">
	<table border="1" width="500" cellpadding="0" cellspacing="0">
		<tr>
			<th colspan=4><?php echo Config2::getData('currencies',$allChunks[$c]);?> </th>
		</tr>
	
         <tr>
		  <th>Eq.Drawdown</th>
		  <th>Eq.Outstanding</th>
		  <th>Eq.Repayments</th>
		  <th>Dividend</th>
		</tr>
		<tr>
         <td>0</td>
		 <td class="number"><?php echo round($cdData[$ieval],$RoundPlace);?></td>
		 <td>0</td>
		 <td>0</td>
		
        </tr>
<?php 
	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){
		$bval = 'ED_'.$allChunks[$c].'_'.$m;
		$oval = 'E_'.$allChunks[$c].'_'.$m;
		$rval = 'R_'.$allChunks[$c].'_'.$m;
		$dval = 'Div_'.$allChunks[$c].'_'.$m;
		
?>
       <tr>
         <td class="number"><?php echo round($cdData[$bval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($cdData[$oval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($cdData[$rval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($cnData[$dval],$RoundPlace);?></td>
		
        </tr>
<?php	}?>
      </table></td>
<?php }?>

  </tr>
</table>

</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
