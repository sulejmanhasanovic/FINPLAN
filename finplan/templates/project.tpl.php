<?php $pfamenu="block";
include TEMPLATE_PATH."header.tpl.php"?>
<body >
<h3><?php echo $proj_0;?></h3>

	  <form name="risk"action="projectSave.php" method="post" >
  <table width="100%" border="0" cellpadding="0" cellspacing="2">

    <tr>
      <th Colspan=2></th>
    </tr>
    <tr>

	 <td><?php echo $proj_1;?></td>
      <td><span id="sprytextfield1"><INPUT TYPE="Text" NAME="data[DRate]" value="<?php echo $bnData['DRate'];?>">%
	  <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span>
	  <span class="textfieldMaxValueMsg">Max Value:100</span></span></td>
    </tr>
	  <tr>
      <td> <?php echo $proj_2;?></td>
      <td><span id="sprytextfield2"><INPUT TYPE="Text" NAME="data[Loan_Term]" value="<?php echo $bnData['Loan_Term'];?>">Year(s)
	  <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span>
	  <span class="textfieldMaxValueMsg">Max Value:100</span></span></td>
    </tr>
    <tr>
      <td> <?php echo $proj_3;?></td>
      <td><span id="sprytextfield3"><INPUT TYPE="Text" NAME="data[Security_ratio1]" value="<?php echo $bnData['Security_ratio1'];?>">
	  <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span>
	  <span class="textfieldMaxValueMsg">Max Value:100</span></span></td>
    </tr>
	<tr>
      <td> <?php echo $proj_4;?></td>
      <td><span id="sprytextfield4"><INPUT TYPE="Text" NAME="data[Life_Term]" value="<?php echo $bnData['Life_Term'];?>">Year(s)
	  <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span>
	  <span class="textfieldMaxValueMsg">Max Value:100</span></span></td>
    </tr>
    <tr>
      <td><?php echo $proj_5;?></td>
      <td><span id="sprytextfield5"><INPUT TYPE="Text" NAME="data[Security_ratio2]" value="<?php echo $bnData['Security_ratio2'];?>">
	  <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span>
	  <span class="textfieldMaxValueMsg">Max Value:100</span></span>
       </td>
    </tr>
	<tr>
      <td><?php echo $proj_6;?></td>
      <td><span id="sprytextfield6"><INPUT TYPE="Text" NAME="data[FY_Cash_DebtService]" value="<?php echo $bnData['FY_Cash_DebtService'];?>">
	  <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span>
	  <span class="textfieldMaxValueMsg">Max Value:100</span></span>
       </td>
    </tr>
	 </td>
    </tr>
  </table>
    <tr>
      <td><?php if(is_array($bnData) && count($bnData) > 0) {?>
        <input type="hidden" name="act" value="u">

        <?php } else {?>
        <input type="hidden" name="act" value="a">
         <?php } ?>
		<input type="hidden" name="data[sid]" value="1">
        <input type="hidden" name="eid" value="<?php echo $bnData['id'];?>">
        <input type="submit" class='button' name="proceed" id="proceed" value="Save & Proceed"   >
      </td>
    </tr>

</form>

<?php include TEMPLATE_PATH."footer.tpl.php"?>
<script type="text/javascript">

var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "real", {useCharacterMasking:true, validateOn:["change"], maxValue:100});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "real", {useCharacterMasking:true, validateOn:["change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "real", {useCharacterMasking:true, validateOn:["change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "real", {useCharacterMasking:true, validateOn:["change"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "real", {useCharacterMasking:true, validateOn:["change"]});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "real", {useCharacterMasking:true, validateOn:["change"]});
</script>
