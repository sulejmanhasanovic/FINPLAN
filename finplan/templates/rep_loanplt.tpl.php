<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target=”_blank”>Open in New Window</a><?php }?>
<h3>New Loans by Plant (Million) </h3>
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
<table border="1" cellspacing="2" cellpadding="0">
  <tr valign="top">
    <td valign="top"><table border="1" cellpadding="0" cellspacing="0">
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
    <td valign="top"><table border="1" cellpadding="0" cellspacing="0">
        <tr>
          <th colspan=4><?php echo Config2::getData('currencies',$allChunks[$i]);?></th>
        </tr>
        <tr>
		  <th>Drawdowns</th>
		  <th>Balance</th>
		  <th>Interest</th>
		  <th>Repayments</th>
		</tr>
        <?php 
			
			for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){
				
				$dval = 'DD_'.$allChunks[$i].'_L1_'.$m;
				$bval = 'Bal_'.$allChunks[$i].'_L1_'.$m;
				$ival = 'Int_'.$allChunks[$i].'_L1_'.$m;
				$rval = 'Repy_'.$allChunks[$i].'_L1_'.$m.'_'.$_REQUEST['id'];
			

				?>
        <tr>
         <td class="number"><?php echo round($afData[$dval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($afData[$bval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($afData[$ival],$RoundPlace);?></td>
		 <td class="number"><?php echo round($afData[$rval],$RoundPlace);?></td>
		
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
