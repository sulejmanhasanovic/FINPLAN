<?php $defmenu="block";
include TEMPLATE_PATH."header.tpl.php"?>
<body >
<h3><?php echo $froi_1;?></h3>

 <form name="frm" action="fixrevotrincSave.php" method="post" >
  <table width="100%" border="0" cellpadding="0" cellspacing="2">
     <tr>
      <th>&nbsp;</th><th>&nbsp;</th>
      
    </tr>
	<tr>
      <td> <?php echo $froi_2;?> (Million <?php echo $baseCname;?>)</td>
      <td><span id="sprytextfield1">
	  <INPUT TYPE="Text"  NAME="data[Fixed_Reveneus_initial]" value="<?php echo $cuData['Fixed_Reveneus_initial'];?>">
	  <span class="textfieldRequiredMsg">Required</span>
	  <span class="textfieldInvalidFormatMsg">Invalid format.</span>
	  </span>
	  </td>
    </tr>
    <tr>
      <td><?php echo $froi_3;?></td>
      <td><span id="sprytextfield2">
	  <INPUT TYPE="Text" NAME="data[Grate_FRevenues]" value="<?php echo $cuData['Grate_FRevenues'];?>">%
	  <span class="textfieldRequiredMsg">Required</span>
	  <span class="textfieldInvalidFormatMsg">Invalid format.</span>
	  <span class="textfieldMaxValueMsg">Max Value:100</span></span></td>
    </tr>
    <tr>
      <td> <?php echo $froi_4;?> (Million <?php echo $baseCname;?>)</td>
      <td><span id="sprytextfield3">
	  <INPUT TYPE="Text"  NAME="data[Other_Income_initial]" value="<?php echo $cuData['Other_Income_initial'];?>">
	  <span class="textfieldRequiredMsg">Required</span>
	  <span class="textfieldInvalidFormatMsg">Invalid format.</span>
	 </span></td>
    </tr>
	 <tr>
      <td> <?php echo $froi_5;?></td>
      <td><span id="sprytextfield4">
	  <INPUT TYPE="Text"  NAME="data[Grate_OIncome]" value="<?php echo $cuData['Grate_OIncome'];?>">%
	  <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span>
	  <span class="textfieldMaxValueMsg">Max Value:100</span></span></td>
    </tr>
	 </td>
    </tr>
  </table>
    <tr>
      <td><?php if(is_array($cuData) && count($cuData) > 0) {?>
        <input type="hidden" name="act" value="u">
        <?php } else {?>
        <input type="hidden" name="act" value="a">
     
        <?php } ?>
		<input type="hidden" name="data[sid]" value=1>
        <input type="hidden" name="eid" value="<?php echo $cuData['id'];?>">
        <input type="submit" class='button' name="proceed" id="proceed" value="Save & Proceed"   >
      </td>
    </tr>
  
</form>

<?php include TEMPLATE_PATH."footer.tpl.php"?>
  <script type="text/javascript">
					
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "real", {useCharacterMasking:true, validateOn:["change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "real", {useCharacterMasking:true, validateOn:["change"], maxValue:100});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "real", {useCharacterMasking:true, validateOn:["change"]});		
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "real", {useCharacterMasking:true, validateOn:["change"], maxValue:100});				
				
				</script>