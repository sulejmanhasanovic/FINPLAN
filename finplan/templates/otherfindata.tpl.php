<?php $pfamenu="block";
include TEMPLATE_PATH."header.tpl.php"?>
<body >
<h3>Other Fin Data</h3>
<form name="plntprdsel"action="otherfinSave.php" method="post" >
<table width="650" border="1"  cellspacing="4" cellpadding="0">

	<tr>
	  <th Colspan=2></th>
	</tr>
	<tr>
	  <td>Spread for Short Term Deposits (%) Above Local Inflation</td>
	  <td><span id="sprytextfield1"><input type="text" name="data[STDeposit]" value="<?php echo $cfData['STDeposit'];?>">
	  <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span>
	  <span class="textfieldMaxValueMsg">Max Value:100</span></span></td>
	</tr>
	<tr>
	  <td>Spread for Stand-by Facility (%) Above Local Inflation</td>
	  <td> <span id="sprytextfield2"><input type="text" name="data[SBFacility]" value="<?php echo $cfData['SBFacility'];?>">
	  <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span>
	  <span class="textfieldMaxValueMsg">Max Value:100</span></span></td>
	</tr>
	<tr>
	  <td>Short Loans Outstanding Initial (Million <?php echo $baseCname;?> )</td>
	  <td><span id="sprytextfield3"> <input type="text" name="data[SLInitial]" value="<?php echo $cfData['SLInitial'];?>">
	  <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span>
	  <span class="textfieldMaxValueMsg">Max Value:100</span></span></td>
	</tr>


	  </table>

    <tr>
      <td><?php if(is_array($cfData) && count($cfData) > 0) {?>
        <input type="hidden" name="act" value="u">
        <input type="hidden" name="data[sid]" value="<?php echo $cfData['sid'];?>">
        <?php } else {?>
        <input type="hidden" name="act" value="a">
        <input type="hidden" name="data[sid]" value="1">
        <?php } ?>
        <input type="hidden" name="eid" value="<?php echo $cfData['id'];?>">
        <input type="submit" class='button' name="proceed" id="proceed" value="Save & Proceed"   >
      </td>
    </tr>

</form>

<?php include TEMPLATE_PATH."footer.tpl.php"?>
<script type="text/javascript">

var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "real", {useCharacterMasking:true, validateOn:["change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "real", {useCharacterMasking:true, validateOn:["change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "real", {useCharacterMasking:true, validateOn:["change"]});

</script>
