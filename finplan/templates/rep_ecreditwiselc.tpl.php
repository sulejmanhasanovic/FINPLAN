<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target=”_blank”>Open in New Window</a><?php }?>
<h3>Export Credits in Local Currency (Million)</h3>



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
foreach($financeSources as $financesource){
	if($financesource['type'] == 'E'){
		$FS = $financesource['id'];
		 ?>
			<td valign="top">
			<table border="1" width="300" cellpadding="0" cellspacing="0">
				<tr>
				  <th colspan=4><?php echo $financesource['value'];?></th>
				</tr>
				
				<tr>
				  <th>Drawdowns</th>
				  <th>Balance</th>
				  <th>Interest</th>
				  <th>Repayments</th>
				</tr>
		<?php 
			for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){
				
				
				$dval = 'LLC_'.$FS.'_'.$m;
				$bval = 'BLC_'.$FS.'_'.$m;
				$ival = 'ILC_'.$FS.'_'.$m;
				$rval = 'RLC_'.$FS.'_'.$m;

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
}
?>

  </tr>
</table>

</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
