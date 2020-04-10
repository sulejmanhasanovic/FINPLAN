<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target=”_blank”>Open in New Window</a><?php }?>
<h3>Depreciation </h3>
<table>
  <tr>
    <th><strong>Plant</strong></th>
    <th>Action</th>
  </tr>
  <?php
if(is_array($caData) && count($caData) > 0){
	foreach($caData as $row){
		$plntid=$row['pid'];
		$cptData = $apd->getById($plntid);
?>
  <tr>
    <td><?php echo $cptData['name']?></td>
    <td><a href="?a=e&id=<?php echo $row['id']?>&pid=<?php echo $cptData['id']?>">View</a> </td>
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
<h3>Plant : <?php echo $cpData['name'];?>&nbsp; </h3>
<table width="600" border="1" cellspacing="2" cellpadding="0">
  <tr valign="top">
    <td valign="top"><table border="1" width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <th >Study Year</th>
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
    <td valign="top"><table border="1" width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <th>Global Fixed Assets</th>
          <th>Depreciation</th>
          <th>Net Fixed Assets</th>
        </tr>
        <?php 
			for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){
				$depval = 'D_'.$m;
				$gfaval = 'FA_'.$m;
				$nfaval = $cfData[$gfaval]-$ceData[$depval];
				?>
        <tr>
          <td class="number"><?php echo round($cfData[$gfaval],$RoundPlace);?></td>
          <td class="number"><?php echo round($ceData[$depval],$RoundPlace);?></td>
          <td class="number"><?php echo round($nfaval,$RoundPlace); ?></td>
        </tr>
        <?php			}
				
	?>
      </table></td>
    <?php


?>
  </tr>
</table>
<?php }?>
</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
