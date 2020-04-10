<?php $pltmenu="block";
include TEMPLATE_PATH."header.tpl.php"?>
<body>
<h3><?php echo $dec_1;?></h3>
No interest applied to external trust. Internal fund refers to funds set aside within the company. Total amount refers to amount in constant monetary terms, to which inflation will be applied.
<br>

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
foreach($data as $row){?>
  <tr>
    <td><?php echo $row['name']?></td>
    <td><?php echo $row['unitSize']?></td>
    <td><?php echo $row['plantType']?></td>
    <td><?php echo $row['Status']?></td>
    <td><a href="?a=e&id=<?php echo $row['id']?>">
      <?php  echo $plnttable_6;?>
      </a></td>
  </tr>
  <?php
}
}else{
echo "<tr><td colspan='5'>No Records</td></tr>";
}
?>
</table>

<?php
if(isset($_REQUEST['id'])){		?>
<form name="plntprdsel"action="decommissioningSave.php" method="post" >
<table width="650" border="1"  cellspacing="4" cellpadding="0">

		<tr>
		  <th Colspan=2><?php echo $dec_2;?>&nbsp;<?php echo $cpData['name'];?></th>
		</tr>
		<tr>
		  <td><?php echo $dec_1;?></td>
		  <td><INPUT TYPE="radio" NAME="data[fund]" value="T" <?php echo $cfData['fund']=='T'?'checked="checked"':'' ?> checked>
        Ext. Trust&nbsp;
        <INPUT TYPE="radio" NAME="data[fund]" value="F" <?php echo $cfData['fund']=='F'?'checked="checked"':'' ?>> Int. Fund
		</tr>
		<tr>
		  <td>Start Year of Payment</td>
		   <td>
		   <span id="sprytextfield1">
		   <INPUT TYPE="Text" NAME="data[startyear]" value="<?php echo $cfData['startyear'];?>">
		   <span class="textfieldRequiredMsg">Required</span>
	    <span class="textfieldInvalidFormatMsg">Invalid format.</span>
		<span class="textfieldMaxValueMsg">Max Value:9999 </span></td>
		</tr>
		<tr>
		  <td>Last Year of Payment</td>
		  <td><span id="sprytextfield2">
		  <INPUT TYPE="Text" NAME="data[deccyear]" value="<?php echo $cfData['deccyear'];?>">
		  <span class="textfieldRequiredMsg">Required</span>
	    <span class="textfieldInvalidFormatMsg">Invalid format.</span>
		<span class="textfieldMaxValueMsg">Max Value:9999 </span></td>
		</tr>

		<?php

  for($i = 0; $i < count($allChunks); $i++){

	$fundamount = $allChunks[$i].'_famount';
		?>

      <td >Total Amount</th>
          <td><span id="sprytextfield<?php echo $allChunks[$i];?>">
		  <INPUT TYPE="Text" NAME="data[<?php echo $fundamount;?>]" value="<?php echo $cfData[$fundamount];?>">  &nbsp;(Million <?php echo Config2::getData('currencies',$allChunks[$i]);?>)
		<span class="textfieldRequiredMsg">Required</span>
	    <span class="textfieldInvalidFormatMsg">Invalid format.</span>
		<span class="textfieldMinValueMsg">Min Value:0 </span></td>
    </tr>
<script type="text/javascript">
var sprytextfield<?php echo $allChunks[$i];?> = new Spry.Widget.ValidationTextField("sprytextfield<?php echo $allChunks[$i];?>", "real", {isRequired:true, useCharacterMasking:true, validateOn:["change"], hint:"0.0"});
</script>
	 <?php

	 }?>

	  </table>
  </td>

    <tr>
      <td><?php if(is_array($cfData) && count($cfData) > 0) {?>
        <input type="hidden" name="act" value="u">
        <input type="hidden" name="data[pid]" value="<?php echo $cfData['pid'];?>">
        <?php } else {?>
        <input type="hidden" name="act" value="a">
        <input type="hidden" name="data[pid]" value="<?php echo $cpData['id'];?>">
        <?php } ?>
        <input type="hidden" name="eid" value="<?php echo $cfData['id'];?>">
        <input type="submit" class='button' name="proceed" id="proceed" value="Save & Proceed"   >
      </td>
    </tr>

</form>
<?php }?>
<?php include TEMPLATE_PATH."footer.tpl.php"?>
<script type="text/javascript">
	var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "real", {isRequired:true, useCharacterMasking:true, validateOn:["change"], hint:"0.0",maxValue:9999});
	var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "real", {isRequired:true, useCharacterMasking:true, validateOn:["change"], hint:"0.0",maxValue:9999});
	var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "real", {isRequired:true, useCharacterMasking:true, validateOn:["change"], hint:"0.0"});

</script>
