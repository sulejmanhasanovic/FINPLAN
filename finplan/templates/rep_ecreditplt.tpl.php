<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){
include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body>
<h3>Export Credits by Plant (Million) </h3>
<table>
  <tr>
    <th><strong>Plant</strong></th>
    <th>Action</th>
  </tr>
  <?php
  
//      echo "caData";
//    echo "<pre>";
//    print_r($caData);
//    echo "</pre>";
//    die();
if(is_array($caData) && count($caData) > 0){
	foreach($caData as $row){
		$plntid=$row['pid'];
		$cptData = $apd->getById($plntid);
?>
  <tr>
    <td><?php echo $cptData['name']?></td>
    <td><a href="?a=e&id=<?php echo $row['id']?>&pid=<?php echo $cptData['id']?>">View</a> / <a href="?a=e&id=<?php echo $row['id']?>&pid=<?php echo $cptData['id']?>&viewid=1" target=�_blank�>Open in New Window</a> </td>
  </tr>
  <?php
	}
}else{
	echo "<tr><td colspan='4'>No Records</td></tr>";
}
}
?>
</table>
<?php 
if(isset($_REQUEST['id'])){?>
<br>
<h3>Plant : <?php echo $cpData['name'];?>&nbsp; </h3>
<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><div style="width:1200px;  overflow-y:hidden;overflow-x:auto;"><?php }?>
<table border="1" cellspacing="2" cellpadding="0">
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
        <?php 	for($i=$ahData['startYear'];$i <= $ahData['endYear']; $i++){
?>
        <tr>
          <td><?php echo "$i";?></td>
        </tr>
        <?php 
}
?>
      </table></td>
	  

    <?php 
foreach($financeSources as $financesource){
	if($financesource['type'] == 'E'){
		$FS = $financesource['id'];
		for($i = 0; $i < count($CurChunks); $i++){ ?>
			<td valign="top"><table border="1" width="300" cellpadding="0" cellspacing="0">
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
						$rval = 'Repy_'.$CurChunks[$i].'_'.$FS .'_'.$m.'_'.$_REQUEST['id'];
					

						?>
				<tr>
				 <td class="number"><?php echo round($avData[$dval],$RoundPlace);?></td>
				 <td class="number"><?php echo round($avData[$bval],$RoundPlace);?></td>
				 <td class="number"><?php echo round($avData[$ival],$RoundPlace);?></td>
				 <td class="number"><?php echo round($avData[$rval],$RoundPlace);?></td>
				
				</tr>
				<?php			}
					
				
				
			?>
			  </table></td>
			<?php
			
		}
	}
}
?>
  </tr>
</table>
</div>
<?php }?>
</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
