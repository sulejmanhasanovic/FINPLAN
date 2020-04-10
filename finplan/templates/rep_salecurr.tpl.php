<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body>
<h3>Sale by Currency (Million)</h3>
<table>
  <tr>
    <th><strong>Currency</strong></th>
    <th>Action</th>
  </tr>
  <?php
if(is_array($caData) && count($caData) > 0){
	for($c = 0; $c < count($allChunks); $c++){
		
?>
  <tr>
    <td><?php echo Config2::getData('currencies',$allChunks[$c]);?></td>
    <td><a href="?a=e&cid=<?php echo $allChunks[$c]?>">View</a> </td>
  </tr>
  <?php
	}
}else{
	echo "<tr><td colspan='4'>No Records</td></tr>";
}
?>
</table>
<?php 
}
if(isset($_REQUEST['cid'])){
$ayd = new XmlData($caseStudyId,$ayxml);
$chkData = $ayd->getByField($_REQUEST['cid'],'TradeCurrency');
if(is_array($chkData) && count($chkData) > 0){?>
<br>
<h3><?php echo Config2::getData('currencies',$_REQUEST['cid']);?> </h3>
<table width="800" border="1" cellspacing="2" cellpadding="0">
  <tr valign="top">
    <td valign="top"><table border="1" width="200" cellpadding="0" cellspacing="0">
        <tr>
          <th >Product-></th>
        </tr>
        <tr>
          <th >ClientName -></th>
        </tr>
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
    <?php        foreach($caData as $row){
		    if($row['TradeCurrency']==$_REQUEST['cid']){
?>
    <td valign="top"><table border="1" width="300" cellpadding="0" cellspacing="0">
        <tr>
          <th colspan=3><?php echo Config2::getData('producttype',$row['Name']);?></th>
        </tr>
        <tr>
          <th colspan=3><?php echo $row['ClientName'];?></th>
        </tr>
        <tr>
          <th>Quantity </th>
          <th>Price </th>
		  <th>Revenues(Million)</th>
        </tr>
        <?php 
			
			for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){
				$qval = 'Q_'.$_REQUEST['cid'].'_'.$m;
				$pval = 'P_'.$_REQUEST['cid'].'_'.$m;
				$rval = 'R_'.$_REQUEST['cid'].'_'.$m;
				
				?>
        <tr>
          <td class="number"><?php echo round($row[$qval],$RoundPlace);?></td>
          <td class="number"><?php echo round($row[$pval],$RoundPlace);?></td>
		  <td class="number"><?php echo round($row[$rval],$RoundPlace);?></td>
        </tr>
        <?php			}
			
		
		
	?>
      </table></td>
    <?php
	}}

?>
  </tr>
</table>
<?php }else{ 
	echo "<table width=200 border=2><tr><th colspan='4'>No Records </th></tr></table>";
	}
	}?>
</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
