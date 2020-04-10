<?php $defmenu="block";
include TEMPLATE_PATH."header.tpl.php"?>
<script language="Javascript">

function autofillin(frm,start,end,box)
{
     for (n=start;n<=end;n++)
	{
		 var textbox = document.getElementById('Y_'+n);
		 var textbox2 = document.getElementById('SteadyTaxRate');
		 if (box=='SR')
		{
		 textbox2.disabled= false;
		 textbox.disabled = true;
		 textbox.style.backgroundColor = '#D8D8D8';
		 textbox2.style.backgroundColor = '';
		}
		if (box=='YI')
		{
		 textbox2.disabled= true;
		 textbox.disabled = false;
		 textbox2.style.backgroundColor = '#D8D8D8';
		 textbox.style.backgroundColor = '';
		}


}
}

function taxchk(frm,fid)
{
var vatbox1 = document.getElementById(fid);
	if(fid=='VatSales'){
		var vatbox2 = document.getElementById('VATRateInvestment');
		// var vatbox3 = document.getElementById('VATRateSales');
		// var vatbox4 = document.getElementById('InitialVAT');
		//var vatbox5 = document.getElementById('Vattype');
		//var vatbox7 = document.getElementById('Vattype2');
		if(vatbox1.checked==true){
			vatbox2.disabled = false;
			//vatbox3.disabled = false;
			//vatbox4.disabled = false;
			//vatbox5.disabled = false;
			//vatbox7.disabled = false;
		}else{
			vatbox2.disabled = true;
			//vatbox3.disabled = true;
			//vatbox4.disabled = true;
			//vatbox5.disabled = true;
			//vatbox7.disabled = true;
		}
	}else{
		var vatbox6 = document.getElementById('LossBaseYear');
		if(vatbox1.checked==true){
				vatbox6.disabled = false;
			}else{
				vatbox6.disabled = true;
		}
	}
}


</script>
</head>
<body>
<h3><?php echo $taxinfo_1;?></h3>
A value entered for one year will also be applicable for subsequent years, until a new value is entered for a future year.
<form method="post" name="taxinf" action="taxinfoSave.php">
  <table align="center" border="0" cellpadding="2" cellspacing="0" bgcolor="white">
  <tr valign="top">
    <td><table border="1" cellpadding="4" cellspacing="0">
        <tr>
		  <th colspan="2" bgcolor="#EEFFFF"  scope="col">
		  <span id="sprytextfield1">
        Declining Balance Depreciation Rate for Assets of <?php echo $ahData['startYear']-1;?>
		  &nbsp;
		  <INPUT type="text" name="data[YearlyDepreciationRate]" id ="YearlyDepreciationRate" size="3" value="<?php echo $ctData['YearlyDepreciationRate'];?>">
            &nbsp;(%)
			<span class="textfieldRequiredMsg">Required</span>
			<span class="textfieldMaxValueMsg">Max Value:100</span>
			<span class="textfieldInvalidFormatMsg">Invalid format.</span>
			</span></th>

        </tr>
		<tr>
          <th colspan="2" scope="col"><div align="center"><?php echo $taxinfo_3;?></div></th>
        </tr>
		 <tr>
          <td colspan="2">
		  <INPUT type="checkbox" name = "data[VatSales]" id="VatSales" OnClick="taxchk(this.form,'VatSales')" value="VSI" <?php echo $ctData['VatSales']=='VSI'?'checked="checked"':'' ?>>
		  <?php echo $taxinfo_8;?> &nbsp; </td>
        </tr>
		<?php if($ctData['VatSales']=='VSI'){ $VatStatus = ''; }else{$VatStatus = 'disabled';}?>
        <tr>
          <td ><span id="sprytextfield3"><?php echo $taxinfo_9;?> &nbsp;
            <INPUT type="text" size="3" name = "data[VATRateInvestment]" id="VATRateInvestment" value="<?php echo $ctData['VATRateInvestment'];?>" <?php echo $VatStatus;?> > %
			<span class="textfieldRequiredMsg">Required</span>
			<span class="textfieldMaxValueMsg">Max Value:100</span>
			<span class="textfieldInvalidFormatMsg">Invalid format.</span>
          </td>
          <td ><span id="sprytextfield4"><?php echo $taxinfo_10;?>&nbsp;
            <INPUT type="text" size="3" name = "data[VAT_Cover_Inv]" id = "VAT_Cover_Inv" value="<?php echo $ctData['VAT_Cover_Inv'];?>">
			<span class="textfieldRequiredMsg">Required</span>
			<span class="textfieldMaxValueMsg">Max Value:100</span>
			<span class="textfieldInvalidFormatMsg">Invalid format.</span>
          </td>
        </tr>

<!--        <tr>

          <td ><?php echo $taxinfo_4;?> &nbsp;</td>
          <td> <span id="sprytextfield4">
		  <INPUT type="text" size="3" name="data[InitialVAT]" id ="InitialVAT"  value="<?php echo $ctData['InitialVAT'];?>" <?php echo $VatStatus;?>
		  >&nbsp;<?php echo $currname;?>&nbsp;(<?php echo $taxinfo_5;?> <?php echo $baseCname;?>)
		  <span class="textfieldRequiredMsg">Required</span>
			<span class="textfieldMaxValueMsg">Max Value:100</span>
			<span class="textfieldInvalidFormatMsg">Invalid format.</span>
			</span></td>
        </tr>
-->

        <tr>
          <th colspan="2" scope="col"><div align="center"><?php echo $taxinfo_11;?></div></th>
        </tr>
        <tr>
          <td > <INPUT type="Checkbox" name="data[TaxLossForward]" id ="TaxLossForward" OnClick="taxchk(this.form,'TaxLossForward')" value="Y"
		  <?php echo $ctData['TaxLossForward']=='Y'?'checked="checked"':'' ?>>
            <?php echo $taxinfo_12;?> &nbsp; </td>
          <td ><span id="sprytextfield5"><?php echo $taxinfo_13;?>&nbsp;
            <INPUT type="text" size="5" name="data[LossBaseYear]" id="LossBaseYear" value="<?php echo $ctData['LossBaseYear'];?>"  <?php echo $ctData['TaxLossForward']=='Y'?'':'disabled' ?>>&nbsp;(<?php echo $taxinfo_14;?> <?php echo $baseCname;?>)
			<span class="textfieldRequiredMsg">Required</span>
			<span class="textfieldMaxValueMsg">Max Value:100</span>
			<span class="textfieldInvalidFormatMsg">Invalid format.</span></td>
        </tr>
        <tr>
          <td> <?php echo $taxinfo_15;?></td>
		  <td>
         <INPUT type="radio" name="data[TaxType]" id = "TaxType" value="YI" ONCLICK="autofillin(this.form,<?php echo $ahData['startYear'];?>,<?php echo $ahData['endYear'];?>,'YI')" <?php echo $ctData['TaxType']=='YI'?'checked="checked"':'' ?>>
            <?php echo $taxinfo_16;?> &nbsp;
		<INPUT type="radio" name="data[TaxType]" id = "TaxType" value="SR" ONCLICK="autofillin(this.form,<?php echo $ahData['startYear'];?>,<?php echo $ahData['endYear'];?>,'SR')" <?php echo $ctData['TaxType']=='SR'?'checked="checked"':'' ?>>
            &nbsp;<?php echo $taxinfo_15a;?>
			<span id="sprytextfield6">
            <INPUT type="text" size=3 name="data[SteadyTaxRate]" id="SteadyTaxRate"
			value="<?php echo $ctData['SteadyTaxRate'];?>"	<?php if ($ctData['SteadyTaxRate']=='') { echo "disabled" ;} ?>>
            (%)
			<span class="textfieldRequiredMsg">Required</span>
			<span class="textfieldMaxValueMsg">Max Value:100</span>
			<span class="textfieldInvalidFormatMsg">Invalid format.</span>
        </td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td class="bodyText">
      <table width="100%" border="1"  cellspacing="0" cellpadding="0">
        <tr valign="top">
          <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <th ><?php echo $taxinfo_17;?></th>
                <th ><?php echo $taxinfo_18;?> (%)</th>
              </tr>
              <?php
for($i=$ahData['startYear'];$i <= $ahData['endYear']; $i++){

if($ahData['timeOpt'] == 'Q'){
for($q=1;$q <= 4; $q++){
$yi = 'Y_'.$i.'Q_'.$q;?>
              <tr >
                <td><?php echo $i;?>&nbsp;Q<?php echo $q;?></td>
                <td><input  type="text" size="3" id="Y_<?php echo $i;?>Q_<?php echo $q;?>" name="data[Y_<?php echo $i;?>Q_<?php echo $q;?>]" value="<?php echo $ctData[$yi];?>"></td>
              </tr>
              <?php }}else{
$yi = 'Y_'.$i;
?>
              <tr >
                <td><?php echo $i;?></td>
                <td>
				<span id="sprytextfieldY<?php echo $i;?>">
				<input  type="text" size="3" id="Y_<?php echo $i;?>" name="data[Y_<?php echo $i;?>]" value="<?php echo $ctData[$yi];?>"
				<?php if($ctData['TaxType']!='YI'){ echo "disabled";}?>>
				<span class="textfieldRequiredMsg">Required</span>
				<span class="textfieldMaxValueMsg">Max Value:100</span>
				<span class="textfieldInvalidFormatMsg">Invalid format.</span></td>
              </tr>
			  <script type="text/javascript">
			var sprytextfieldY<?php echo $i;?> = new Spry.Widget.ValidationTextField("sprytextfieldY<?php echo $i;?>", "real", {isRequired:false ,useCharacterMasking:true, validateOn:["change"], maxValue:100});
			</script>
              <?php }
} ?>
            </table></td>
        </tr>
      </table>
      <?php if(is_array($ctData) && count($ctData) > 0) {?>
      <input type="hidden" name="act" value="u">
      <input type="hidden" name="id" value="<?php echo $ctData['id'];?>">
      <?php } else {?>
      <input type="hidden" name="act" value="a">
      <?php } ?>
	   <input type="hidden" name="data[sid]" value="1">
      <input type="submit" class='button' name="proceed" id="proceed" value="Save & Proceed" >
</form>
</table>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "real", {isRequired:false ,useCharacterMasking:true, validateOn:["change"], maxValue:100});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "real", {isRequired:false ,useCharacterMasking:true, validateOn:["change"], maxValue:100});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "real", {isRequired:false ,useCharacterMasking:true, validateOn:["change"], maxValue:100});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "real", {isRequired:false ,useCharacterMasking:true, validateOn:["change"], maxValue:100});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "real", {isRequired:false ,useCharacterMasking:true, validateOn:["change"]});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "real", {isRequired:false ,useCharacterMasking:true, validateOn:["change"], maxValue:100});
</script>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
