<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target=”_blank”>Open in New Window</a><?php }?>
<h3> Drawndown For Each Plant</h3>
<table>
  <tr>
    <th><strong>Plant</strong></th>
    <th><strong>Currency</strong></th>
    <th>Action</th>
  </tr>
  <?php
if(is_array($caData) && count($caData) > 0){
	foreach($caData as $row){
		$plntid=$row['pid'];
		$curtok=$row['fid'];
		$Curid = explode("_", $curtok);
		$cuname = Config2::getData('currencies',$Curid[0]);
		$cptData = $apd->getById($plntid);
?>
  <tr>
    <td><?php echo $cptData['name']?></td>
    <td><?php echo $cuname;?></td>
    <td><a href="?a=e&id=<?php echo $row['id']?>&pid=<?php echo $row['pid']?>&cid=<?php echo $Curid[0];?>">View</a> </td>
  </tr>
  <?php
	}
}else{
	echo "<tr><td colspan='4'>No Records</td></tr>";
}
?>
</table>
<?php 
if(isset($_REQUEST['id'])){?>
<br>
<h3>Plant : <?php echo $cpData['name'];?></h3>
Currency :<?php echo Config2::getData('currencies',$_REQUEST['cid']);?>&nbsp;(Million)*
<table width="100%" border="4"  cellspacing="0" cellpadding="0">
  <tr >
    <td><table width="100" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <th><div align="center">Year</div></th>
        </tr>
        <?php  $coYear = $cpData['FOyear']-$cpData['CPeriod'];
	for($i=1;$i <= $cpData['CPeriod']; $i++){
?>
        <tr>
          <td><?php echo "$i";?>&nbsp;:&nbsp;<?php echo $coYear;?></td>
        </tr>
        <?php  $coYear++;
	}
?>
        <tr>
          <th >Total</th>
        </tr>
      </table></td>
    <?php
		
	foreach($financeSources as $financesource){
		$countlabel = strlen($financesource['value']);
		$tablewidth = $countlabel * 11;
				
?>
    <td valign="top"><table border="1" width="<?php echo $tablewidth;?>" cellpadding="0" cellspacing="0">
        <tr >
          <th><?php echo $financesource['value'];?> </th>
        </tr>
        <div >
        
        <?php		for($i=1;$i <= $cpData['CPeriod']; $i++){
			$ddval = $financesource['id'].'_'.$i;
?>
        <tr>
          <td><?php echo $ceData[$ddval];?></td>
        </tr>
        <?php		} 
		$totddval = 'Tot_'.$financesource['id'];
?>
        <tr>
          <th class="number"><?php echo round($ceData[$totddval],$RoundPlace);?></th>
        </tr>
      </table></td>
    <?php  }
?>
    </td>
  </tr>
</table>
* In Current Prices
<?php }?>
<?php include TEMPLATE_PATH."footer.tpl.php"?>
