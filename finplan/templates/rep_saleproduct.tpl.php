<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body>
<h3>Sale by Product (Million)</h3>
<table>
  <tr>
    <th><strong>Product</strong></th>
    <th>Action</th>
  </tr>
  <?php
if(is_array($caData) && count($caData) > 0){
	foreach($productTypes as $productType){?>
  <tr>
    <td><?php echo $productType['value']?></td>
    <td><a href="?a=e&prid=<?php echo $productType['id']?>">View</a> </td>
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
if(isset($_REQUEST['prid'])){
$ayd = new XmlData($caseStudyId,$ayxml);
$chkData = $ayd->getByField($_REQUEST['prid'],'Name');
if(is_array($chkData) && count($chkData) > 0){?>
<br>
<h3><?php echo Config2::getData('producttype',$_REQUEST['prid']);?> </h3>
<table width="800" border="1" cellspacing="2" cellpadding="0">
  <tr valign="top">
    <td valign="top"><table border="1" width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <th >Currency-></th>
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
		    if($row['Name']==$_REQUEST['prid']){
?>
    <td valign="top"><table border="1" width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <th colspan=3><?php echo Config2::getData('currencies',$row['TradeCurrency']);?></th>
        </tr>
        <tr>
          <th colspan=3><?php echo $row['ClientName'];?></th>
        </tr>
        <tr>
          <th>Quantity </th>
          <th>Price </th>
		  <th>Revenues (Million)</th>
        </tr>
        <?php 
			
			for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){
				$qval = 'Q_'.$row['TradeCurrency'].'_'.$m;
				$pval = 'P_'.$row['TradeCurrency'].'_'.$m;
				$rval = 'R_'.$row['TradeCurrency'].'_'.$m;
				
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
	}}
?>
</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
