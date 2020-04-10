<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target=”_blank”>Open in New Window</a><?php }?>
<h3>Export Credits by Currency (Million)</h3>



<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><div style="width:800px;  overflow-y:hidden;overflow-x:auto;"><?php }?>
<table width="600" border="1" cellspacing="1" cellpadding="0">
  <tr valign="top">
    <td valign="top"><table border="1" width="50" cellpadding="0" cellspacing="0">
		<tr>
			<th >&nbsp;</th>
		</tr>
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
		for($i = 0; $i < count($CurChunks); $i++){ ?>
			<td valign="top">
			<table border="1" width="250" cellpadding="0" cellspacing="0">
				<tr>
				  <th colspan=4><?php echo $financesource['value'];?></th>
				</tr>
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
						
				$dval = 'DD_'.$CurChunks[$i].'_'.$FS .'_'.$m;
				$bval = 'Bal_'.$CurChunks[$i].'_'.$FS .'_'.$m;
				$ival = 'Int_'.$CurChunks[$i].'_'.$FS .'_'.$m;
				$rval = 'Repy_'.$CurChunks[$i].'_'.$FS .'_'.$m;

		?>
			   <tr>
				 <td class="number"><?php echo round($bqData[$dval],$RoundPlace);?></td>
				 <td class="number"><?php echo round($bqData[$bval],$RoundPlace);?></td>
				 <td class="number"><?php echo round($bqData[$ival],$RoundPlace);?></td>
				 <td class="number"><?php echo round($bqData[$rval],$RoundPlace);?></td>
				
				</tr>
		<?php	}?>
			  </table></td>
	<?php
			
		}
	}
}
?>

  </tr>
</table>

</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
