<?php $pfamenu="block";
include TEMPLATE_PATH."header.tpl.php"?>
<body >
<h3><?php echo $shrd_1;?></h3>

 <form name="plntprdsel"action="shareholderreturnSave.php" method="post" >
  <table width="100%" border="0" cellpadding="0" cellspacing="2">
     <tr>
      <th>&nbsp;</th><th>&nbsp;</th>

    </tr>
	<tr>
      <td> <?php echo $shrd_2;?></td>
      <td><span id="sprytextfield1">
	  <INPUT TYPE="Text"  NAME="data[A_ROR]" value="<?php echo $cfData['A_ROR'];?>">%
	  <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span>
	  <span class="textfieldMaxValueMsg">Max Value:100</span></span>
	  </td>
    </tr>
    <tr>
      <td><?php echo $shrd_3;?></td>
      <td><span id="sprytextfield2"><INPUT TYPE="Text" NAME="data[Disposal_Year]" value="<?php echo $cfData['Disposal_Year'];?>">
	  <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
    </tr>
    <tr>
      <td> <?php echo $shrd_4;?></td>
      <td><span id="sprytextfield3"><INPUT TYPE="Text"  NAME="data[D_Rate]" value="<?php echo $cfData['D_Rate'];?>">%
	  <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span>
	  <span class="textfieldMaxValueMsg">Max Value:100</span></span></td>
    </tr>

	 </td>
    </tr>
  </table>
    <tr>
      <td><?php if(is_array($cfData) && count($cfData) > 0) {?>
        <input type="hidden" name="act" value="u">
        <?php } else {?>
        <input type="hidden" name="act" value="a">

        <?php } ?>
		<input type="hidden" name="data[sid]" value=1>
        <input type="hidden" name="eid" value="<?php echo $cfData['id'];?>">
        <input type="submit" class='button' name="proceed" id="proceed" value="Save & Proceed"   >
      </td>
    </tr>

</form>

<?php include TEMPLATE_PATH."footer.tpl.php"?>
  <script type="text/javascript">

var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "real", {useCharacterMasking:true, validateOn:["change"], maxValue:100});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "real", {useCharacterMasking:true, validateOn:["change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "real", {useCharacterMasking:true, validateOn:["change"], maxValue:100});

				</script>
