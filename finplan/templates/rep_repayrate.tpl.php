<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target=”_blank”>Open in New Window</a><?php }?>
<h3> Repay Rate :plant wise</h3>
<table>
  <tr>
    <th><strong>Plant </strong></th>
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
<h3>Plant : <?php echo $cpData['name'];?>&nbsp; </h3>
<table width="600" border="1" cellspacing="2" cellpadding="0">
  <tr valign="top">
    <td valign="top"><table border="1" width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <th >Finance Source</th>
        </tr>
        <?php  foreach($financeSources as $financesource){
				
?>
        <tr>
          <td><?php echo $financesource['value'];?></td>
        </tr>
        <?php
	}
?>
      </table></td>
    <?php 

for($i = 0; $i < count($allChunks); $i++){
	?>
    <td valign="top"><table border="1" width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <th><?php echo Config2::getData('currencies',$allChunks[$i]);?></th>
        </tr>
        <?php 
			foreach($financeSources as $financesource){
				$infval = $allChunks[$i]. '_'.$cpData['id'].'_'.$financesource['id'];
				?>
        <tr>
          <td class="number"><?php echo round($ceData[$infval],$RoundPlace);?></td>
        </tr>
        <?php			
		
	}?>
      </table></td>
    <?php
}
?>
  </tr>
</table>
<?php 
}?>
</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
