<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target=”_blank”>Open in New Window</a><?php }?>
<h3> Balance For Each Plant</h3>
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
	foreach($financeSources as $financesource){
		$countlabel = strlen($financesource['value']);
		$tablewidth = $countlabel * 11;
				
?>
    <td valign="top"><table border="1" width="<?php echo $tablewidth;?>" cellpadding="0" cellspacing="0">
        <tr >
          <th><?php echo $financesource['value'];?> </th>
        </tr>
        <div >
        
        <?php		for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){
			$ddval = 'Bal_'.$_REQUEST['cid'].'_'.$financesource['id'].'_'.$m;
?>
        <tr>
          <td class="number"><?php echo round($ceData[$ddval],$RoundPlace);?></td>
        </tr>
        <?php		} 
		//$totddval = 'TotBal_'.$_REQUEST['cid'].'_'.$financesource['id'];
?>
       
      </table></td>
    <?php  }
?>
    </td>
  </tr>
</table>
* In Current Prices
<?php }?>
<?php include TEMPLATE_PATH."footer.tpl.php"?>
