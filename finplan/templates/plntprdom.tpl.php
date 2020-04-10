<?php $pltmenu="block";
include TEMPLATE_PATH."header.tpl.php"?>

<h3><?php echo $plntprdom_1;?></h3>
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
$cfDt = $aod->getByfield($row['id'],'pid');?>

  <tr>
    <td><?php echo $row['name']?></td>
    <td><?php echo $row['unitSize']?></td>
    <td><?php echo $row['plantType']?></td>
    <td><?php echo $row['Status']?></td>
    <td><a href="?a=e&id=<?php echo $row['id']?>">
      <?php  echo $plnttable_6;?>
      </a>
	  </td>
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
?>
<div align="right">* Constant Monetary Terms</div>

<div>
  <form name="plntprdsel" action="plntprdomSave.php" method="post" >
<table border="1"  cellspacing="4" cellpadding="0">

    <tr valign="top">
    <td><table border="0" cellpadding="0" cellspacing="0">
          <tr>
            <th ><?php echo $plntprdom_2;?></th>
          </tr>
          <?php
for($i=$startyr;$i <= $endyr; $i++){
 	if($ahData['timeOpt'] == 'Q'){
		for($q=1;$q <= 4; $q++){

 ?>
          <tr>
            <td><?php echo $i;?>&nbsp;Q<?php echo $q;?></td>
          </tr>
          <?php 		}
	}else{
?>
          <tr>
            <td><?php echo $i;?></td>
          </tr>
          <?php	}
}
?>
        </table></td>
      <?php

for($i = 0; $i < count($allChunks); $i++){


?>
    <td valign="top"><table border="0" cellpadding="4" cellspacing="0">
          <tr>
            <th><?php echo Config2::getData('currencies',$allChunks[$i]);?> &nbsp;(Million)</th>
          </tr>
          <?php

			for($m=$startyr;$m <= $endyr; $m++){

				if($ahData['timeOpt'] == 'Q'){
					for($q=1;$q <= 4; $q++){
						$infval = $allChunks[$i].'_'.$m.'_Q_'.$q;
			?>
          <tr>
            <td><input type="text" size="15"  id="<?php echo $infval;?>" name="data[<?php echo $infval;?>]" value="<?php echo $cfData[$infval];?>"></td>
          </tr>
          <?php		}
				}else{
						$infval = $allChunks[$i].'_'.$m;
			?>
          <tr >
            <td>
			<?php if($m==$ceData['FOyear']){?>
				<span id="sprytextfield<?php echo $infval;?>">
			<?php }
      ?>
			<input type="text" size="15"  id="<?php echo $infval;?>" name="data[<?php echo $infval;?>]" value="<?php echo $cfData[$infval];?>">
			<span class="textfieldRequiredMsg">Required</span>
			<span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
			<?php if($m==$ceData['FOyear']){?>
        <script type="text/javascript">
			var sprytextfield<?php echo $infval;?> = new Spry.Widget.ValidationTextField("sprytextfield<?php echo $infval;?>", "real", {useCharacterMasking:true, validateOn:["change"]});
		</script>
        <?php }?>
          </tr>
          <?php	}
			}
			?>
        </table></td>
      <?php
}
?>
  </tr>
</table>
	</div><tr><td>
<?php if(is_array($cfData) && count($cfData) > 0) {?>
<input type="hidden" name="act" value="u">
<input type="hidden" name="data[pid]" value="<?php echo $cfData['pid'];?>">
<?php } else {?>
<input type="hidden" name="act" value="a">
<input type="hidden" name="data[pid]" value="<?php echo $ceData['id'];?>">
<?php } ?>
<input type="hidden" name="eid" value="<?php echo $cfData['id'];?>">
<input type="submit" class='button' name="proceed" id="proceed" value="Save & Proceed"   >
<?php }?>
</td></tr>
</form>
<?php include TEMPLATE_PATH."footer.tpl.php"?>
