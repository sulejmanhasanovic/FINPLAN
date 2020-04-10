<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target=�_blank�>Open in New Window</a><?php }?>
<h3>Decommisioning Costs by Plant in Local Currency (Million)</h3>
<table>
  <tr>
    <th><strong>Plant</strong></th>
    <th>Action</th>
  </tr>
  <?php
if(is_array($apData) && count($apData) > 0){
	foreach($apData as $row){
		$plntid=$row['id'];
		?>
  <tr>
    <td><?php echo $row['name']?></td>
    <td><a href="?a=e&name=<?php echo $row['name']?>&pid=<?php echo $row['id']?>">View</a> </td>
  </tr>
  <?php
	}
}else{
	echo "<tr><td colspan='4'>No Records</td></tr>";
}
?>
</table>
<?php
if(isset($_REQUEST['pid'])){?>
<br>
<h3>Plant : <?php echo $_REQUEST['name'];?>&nbsp; </h3>
<table width="600" border="1" cellspacing="2" cellpadding="0">
          <tr>
		  <th>Year</th>
		  <th>External Trust</th>
		  <th>Internal Fund</th>

		</tr>
	<?php 	for($i=$ahData['startYear'];$i <= $ahData['endYear']; $i++){
			$dval = 'DCL_'.$_REQUEST['pid'].'_'.$i;
			$bval = 'ADFL_'.$i;

	?>
        <tr><td><?php echo "$i";?></td>
         <td class="number"><?php echo round($ceData[$dval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($ceData[$bval],$RoundPlace);?></td>


        </tr>


    <?php

}
?></table></td>
<?php }?>
</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
