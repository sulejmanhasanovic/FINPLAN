<?php $pltmenu="block";
include TEMPLATE_PATH."header.tpl.php"?>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<body >
<h3><?php echo $plntprdsel_1;?> </h3>
A value entered for one year will also be applicable for subsequent years, until a new value is entered for a future year.
<table>
  <tr>
    <th><strong>
      <?php  echo $plnttable_1;?>
      </strong></th>
    <th><?php  echo $plnttable_2;?></th>
    <th><?php  echo $plnttable_3;?></th>
    <th><?php  echo $plnttable_4;?></th>
    <th><?php  echo $plnttable_5;?></th>
  </tr>
  <?php
if(is_array($data) && count($data) > 0){
foreach($data as $row){
$cfDt = $aqd->getByfield($row['id'],'pid');?>

  <tr>
    <td><?php echo $row['name']?></td>
    <td><?php echo $row['unitSize']?></td>
    <td><?php echo $row['plantType']?></td>
    <td><?php echo $row['Status']?></td>
    <td><a href="?a=e&id=<?php echo $row['id']?>">
      <?php  echo $plnttable_6;?>
      </a> </td>
  </tr>
  <?php
}
}else{
echo "<tr><td colspan='5'>No Records</td></tr>";
}
?>
</table>

<?php
		if(isset($_REQUEST['id'])){?>
  <form name="plntprdsel"action="plntprdSave.php" method="post" >
<table border="1" cellspacing="0" cellpadding="0">


  <tr valign="top">
    <td><table border="0" cellpadding="0" cellspacing="2">
        <tr>
          <th ><?php echo $plntprdsel_2;?></th>
        </tr>
    <?php

if($ceData['Status'] != 'Existing'){
	$startyr = $ceData['FOyear'];
}
else{
	$startyr = $ahData['startYear'];
}
$plantlife = $ceData['Plantlife'];
$plntyr = $startyr+$plantlife-1;

if ($ahData['endYear'] < $plntyr){
	$endyr = $ahData['endYear'];
	}
else{
	$endyr = $plntyr;
	}

for($i=$startyr;$i <= $endyr; $i++){
 	if($ahData['timeOpt'] == 'Q'){
		for($q=1;$q <= 4; $q++){?>
        <tr>
          <td ><?php echo $i;?>&nbsp;Q<?php echo $q;?></td>
        </tr>
        <?php		}
	}else{
?>
        <tr>
          <td ><?php echo $i;?></td>
        </tr>
        <?php	}
}
?>
      </table></td>
    <?php
$ProTypeSel = $ceData['CurTypeSel'] ;
$ProChunks = explode(",", $ProTypeSel);

for($i = 0; $i < count($ProChunks); $i++){
	foreach($productTypes as $productType){
		if ($productType['id'] == $ProChunks[$i]) {
?>
    <td valign="top"><table border="0" cellpadding="0" cellspacing="2">
        <tr>
          <th ><?php echo $productType['value']?> (<?php echo $productType['unit'];?>)</th>
        </tr>
        <?php

		for($m=$startyr;$m <= $endyr; $m++){
			$amtval = $productType['id'].'_'.$m;

			if($ahData['timeOpt'] == 'Q'){
				for($q=1;$q <= 4; $q++){
					$amtval = $productType['id'].'_'.$m.'_Q_'.$q;
		?>			<tr>
					  <td><?php if($m==$ceData['FOyear']){?>
						<span id="sprytextfield<?php echo $i+1;?>">
						<?php } ?>
						<input type="text" size="15"  id="<?php echo $amtval;?>" name="data[<?php echo $amtval;?>]" value="<?php echo $cfData[$amtval];?>">
						<?php if($m==$ceData['FOyear']){?>
							<span class="textfieldRequiredMsg">Required</span>
							<span class="textfieldInvalidFormatMsg">Invalid format.</span></span>
						<?php } ?></td>
					</tr>
        <?php 		}
			}else{
				$amtval = $productType['id'].'_'.$m;
		?>		<tr>
				  <td>
					<span id="sprytextfield<?php echo $amtval;?>">
					<input type="text" size="15"  id="<?php echo $amtval;?>" name="data[<?php echo $amtval;?>]" value="<?php echo $cfData[$amtval];?>">
					<span class="textfieldRequiredMsg">Required</span>
					<span class="textfieldInvalidFormatMsg">Invalid format.</span></span>

				</tr>
        <?php  }
		 if($m==$ceData['FOyear']){?>
        <script type="text/javascript">
			var sprytextfield<?php echo $amtval;?> = new Spry.Widget.ValidationTextField("sprytextfield<?php echo $amtval;?>", "real", {isRequired:true,useCharacterMasking:true, validateOn:["change"]});
		</script>
        <?php }
		} ?>
      </table></td>
    <?php		}
	}
}
?>
    </td>
  </tr>
</table>
<input type="hidden" name="data[pid]" value="<?php echo $ceData['id'];?>">
<?php if(is_array($cfData) && count($cfData) > 0) {?>
<input type="hidden" name="act" value="u">
<?php } else {?>
<input type="hidden" name="act" value="a">
<?php } ?>
<input type="hidden" name="id" value="<?php echo $cfData['id']?>">
<input type="submit" class='button' name="proceed" id="proceed" value="Save & Proceed"   >
<?php }?>
</form>
<?php include TEMPLATE_PATH."footer.tpl.php"?>
