<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body>
<h3>General Expenses (Million)</h3>
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
    <td valign="top"><table border="1" width="150" cellpadding="0" cellspacing="0">
        <tr>
          <th >Study Year</th>
        </tr>
        <tr>
          <th >&nbsp;</th>
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

for($i = 0; $i < count($allChunks); $i++){
	?>
    <td valign="top"><table border="1" width="300" cellpadding="0" cellspacing="0">
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
          <td class="number"><?php echo round($ceData[$omval],$RoundPlace);?></td>
          <td class="number"><?php echo round($ceData[$eomval],$RoundPlace);?></td>
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
