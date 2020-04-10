<?php $defmenu="block";
include TEMPLATE_PATH."header.tpl.php"?>
<script language="Javascript">


function limitText2(frm,limitField,curr,yr,limitNum) {
	var textbox = document.getElementById('data[GrossFixedAssets]');
	var textbox1 = document.getElementById('data[LessDepreciation]');
	var textbox2 = document.getElementById('data[ConsumerContribution]');
	var textbox3 = document.getElementById('data[NetFxdAsst]');
		textbox3.value = 0;
		textbox3.value = (textbox.value*1) - ((textbox1.value*1)+(textbox2.value*1));
}
</script>
<body>
<h3><?php echo $al_1;?></h3>
<table width="800" align="center" border="0" cellpadding="2" cellspacing="0" bgcolor="white">
  <form method="post" name="assetliability" action="assetliability.php">
    <tr valign="top">
      <td><table width="100%" border="1" cellpadding="4" cellspacing="0">
          <tr>
            <th colspan="2"><div align="Center"><?php echo $al_2;?><?php echo $ahData['startYear']-1;?>&nbsp;<?php echo $al_19;?><?php echo $baseCname;?>) </div></th>
          </tr>
          <tr>
            <th><div align="Center"><?php echo $al_3;?></div></th>
            <th><div align="Center"><?php echo $al_4;?></div></th>
          </tr>
          <tr>
            <td><div align="right"><?php echo $al_5;?>&nbsp;<span id="sprytextfield1">
                <input type="text" name="data[GrossFixedAssets]" id="data[GrossFixedAssets]" value="<?php echo $ctData['GrossFixedAssets'];?>"
				onKeyDown="limitText2(this.form);" onKeyUp="limitText2(this.form);"  >
                <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></div></td>
            <td><div align="right"><?php echo $al_6;?> &nbsp;<span id="sprytextfield8">
                <input type="text" name="data[Equity]" value="<?php echo $ctData['Equity'];?>" >
                <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></div></td>
          </tr>
          <tr>
            <td><div align="right"><?php echo $al_7;?>&nbsp;<span id="sprytextfield2">
                <input type="text" name="data[LessDepreciation]" id="data[LessDepreciation]" value="<?php echo $ctData['LessDepreciation'];?>"onKeyDown="limitText2(this.form);" 
			  onKeyUp="limitText2(this.form);" >
                <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></div></td>
            <td><div align="right"><?php echo $al_8;?> &nbsp;<span id="sprytextfield9">
                <input type="text" name="data[RetainedEarning]" value="<?php echo $ctData['RetainedEarning'];?>">
                <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></div></td>
          </tr>
          <tr>
		  <td><div align="right"><?php echo $al_11;?> &nbsp;<span id="sprytextfield4">
                <input type="text" name="data[ConsumerContribution]" id="data[ConsumerContribution]" value="<?php echo $ctData['ConsumerContribution'];?>"
				onKeyDown="limitText2(this.form);" onKeyUp="limitText2(this.form);" >
                <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></div></td>
           <td><div align="right"><?php echo $al_10;?> &nbsp;<span id="sprytextfield10">
                <input type="text" name="data[NetBondsOut]" value="<?php echo $ctData['NetBondsOut'];?>" disabled>
                <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></div></td>
			
          </tr>
		   <tr>
             <td><div align="right"><?php echo $al_9a;?> &nbsp;<span id="sprytextfield3">
                <input type="text" name="data[NetFxdAsst]" id="data[NetFxdAsst]" value="<?php echo $ctData['NetFxdAsst'];?>" readonly>
                <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></div></td>
			<td><div align="right"><?php echo $al_14a;?> &nbsp;<span id="sprytextfield6">
                <input type="text" name="data[NetloanOut]" value="<?php echo $ctData['NetloanOut'];?>" disabled>
                <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></div></td>	
          </tr>
          <tr>
             <td><div align="right"><?php echo $al_9;?> &nbsp;<span id="sprytextfield3">
                <input type="text" name="data[WorkProgress]" value="<?php echo $ctData['WorkProgress'];?>">
                <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></div></td>
			 <td><div align="right"><?php echo $al_12;?> &nbsp;<span id="sprytextfield11">
                <input type="text" name="data[ConsumerDeposits]" value="<?php echo $ctData['ConsumerDeposits'];?>">
                <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></div></td>
          </tr>
          
          <tr>
            <td><div align="right"><?php echo $al_14;?> &nbsp;<span id="sprytextfield6">
	    	  <input type="text" name="data[Receivables]" value="<?php echo $ctData['Receivables'];?>">
                <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span>
	    </span></div></td>

            <td><div align="right"><?php echo $al_12a;?> &nbsp;<span id="sprytextfield11">
                <input type="text" name="data[Currentmaturity]" value="<?php echo $ctData['Currentmaturity'];?>" >
                <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></div></td>
          </tr>

          <tr>
            <td><div align="right"><?php echo $al_15;?> &nbsp;<span id="sprytextfield7">
                <input type="text" name="data[ShortTermDeposits]" value="<?php echo $ctData['ShortTermDeposits'];?>">
                <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></div></td>
            <td><div align="right">&nbsp; </div></td>
          </tr>
          <tr>
            <th colspan="2"><div align="Center"><?php echo $al_16;?></div></th>
          </tr>
          <tr>
            <td><div align="right"><?php echo $al_17;?> &nbsp;
                <INPUT TYPE="checkbox" NAME="data[OptionReEvaluation]" value="Y" 
			<?php echo $ctData['OptionReEvaluation']=='Y'?'checked = "checked"':'' ?>>
              </div></td>
            <td><div align="right"><?php echo $al_18;?> &nbsp;
                <INPUT TYPE="text" NAME="data[TaxableReEvaluation]" value="<?php echo $ctData['TaxableReEvaluation'];?>">
              </div></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td><div align="right">
        <?php if(is_array($ctData) && count($ctData) > 0) {?>
        <input type="hidden" name="act" value="u">
        <?php } else {?>
        <input type="hidden" name="act" value="a">
        <?php } ?>
        <input type="hidden" name="eid" value="<?php echo $ctData['id'];?>">
		<input type="hidden" name="data[sid]" value=1>
        <input type="submit" class='button' name="proceed" id="proceed" value="Save & Proceed"   >
  </form>
  </div>
  
  </td>
  
  </tr>
  
</table>
<?php include TEMPLATE_PATH."footer.tpl.php"?>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "real", {validateOn:["change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "real", {validateOn:["change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "real", {validateOn:["change"], useCharacterMasking:true});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "real", {validateOn:["change"], useCharacterMasking:true});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "real", {validateOn:["change"], useCharacterMasking:true});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "real", {validateOn:["change"], useCharacterMasking:true});
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "real", {validateOn:["change"], useCharacterMasking:true});
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8", "real", {validateOn:["change"], useCharacterMasking:true});
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9", "real", {validateOn:["change"], useCharacterMasking:true});
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "real", {validateOn:["change"]});
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11", "real", {validateOn:["change"], useCharacterMasking:true});
//-->
</script>
