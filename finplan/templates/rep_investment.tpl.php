<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target=”_blank”>Open in New Window</a><?php }?>
<h3> Investments &nbsp;(Million)</h3>
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
<?php if(isset($_REQUEST['id'])){?>
<br>
<h3>Plant : <?php echo $cpData['name'];?>&nbsp; </h3>
<table width="600" border="1" cellspacing="2" cellpadding="0">
  <tr valign="top">
    <td valign="top"><table border="1" width="150" cellpadding="0" cellspacing="0">
        <tr>
          <th >Construction Year</th>
        </tr>
        <tr>
          <th >&nbsp;</th>
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
      </table></td>
    <?php 

for($i = 0; $i < count($allChunks); $i++){
	?>
    <td valign="top">
	<table border="1" width="300" cellpadding="0" cellspacing="0">
        <tr>
          <th colspan=2><?php echo Config2::getData('currencies',$allChunks[$i]);?></th>
        </tr>
        <tr>
          <th>In Constant Prices</th>
          <th>In Current Prices</th>
        </tr>
        <?php 
			$cYear = $cpData['FOyear']-$cpData['CPeriod'];
			for($m=1;$m <= $cpData['CPeriod']; $m++){
				$invstval = 'I_';
				$invstval .= $allChunks[$i];
				$invstval .= '_';
				$invstval .= $m;
				$einvstval = 'EI_';
				$einvstval .= $allChunks[$i];
				$einvstval .= '_';
				$einvstval .= $cYear;
				$cYear ++;
				?>
        <tr>
          <td class="number"><?php echo round($ceData[$invstval],$RoundPlace);?></td>
          <td class="number"><?php echo round($ceData[$einvstval],$RoundPlace);?></td>
        </tr>
        <?php			}
			
		?>
      </table></td>
    <?php
}
?>
  </tr>
</table>
<?php }?>
</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
