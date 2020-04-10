<?php $defmenu="block";
include TEMPLATE_PATH."header.tpl.php"?>
<body onLoad="opt.init(document.forms[0])">
<script type="text/javascript">
function ValidateForm(form,max_start)
{
	var textbox1 = document.getElementById('data[CurTypeSel]');
	var textbox2 = document.getElementById('data[startYear]');
	var textbox3 = document.getElementById('data[endYear]');
//	console.log(textbox1);
	if (textbox2.value =='' || textbox2.value < 2000)
   {
		alert("Start Year is Empty or Less Than 2000")
		return false
   }
	 if (textbox2.value =='' || textbox2.value > max_start)
    {
 		alert("Start Year is Empty or Greater Than "+max_start)
 		return false
    }
	if (textbox3.value =='' || textbox3.value < 2001 || textbox3.value <= textbox2.value)
   {
		alert("End Year is Empty or Less Than Start Year")
		return false
	 }
   if (textbox1.value =='')
   {
		var answer = confirm ("Are You Sure You Don't Want to Select Foreign Currency")
		if (answer)
			return true;
		else
			return false;
    }else{

	 return true;
	 }

return true;


}
</script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<?php


	if(is_array($ahData) && count($ahData) > 0){

?>

<h3> General Information</h3>

<?php
$startChanged = $_GET['startChanged'] == 'yes' ? true : false;

 ?>
<form method="post" action="geninfSave.php" OnSubmit="return ValidateForm(this.form,<?php echo $maxStartyear; ?>)" >
<table width="300" align="center" border="1" cellspacing="4" cellpadding="4">

  <tr>
    <td class="bodyText"><table width="100%" border="0"  cellspacing="2" cellpadding="2">
        <tr>
          <td nowrap ><div align="right" ><?php echo $geninf_1;?>&nbsp;&nbsp;</div></td>
          <td ><span id="sprytextfield1">
            <input style="width: 320px;" name="data[studyName]" class="selectValidState" type="text" id="StudyName" value="<?php echo $ahData['studyName'] ?>" size="50" disabled >
             <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>
			 <font color="#882D2D"><span id="txtHint"></span></font></td>
        </tr>
        <tr>
          <td ><div align="right" ><?php echo $geninf_2;?>&nbsp;&nbsp;</div></td>
          <td ><div align="left">
              <textarea style="width: 420px;" name="data[note]" id="Note" cols="45" rows="5" ><?php echo $ahData['note'] ?></textarea>
              </div></td>
        </tr>
        <tr>
          <td ><div align="right" ><?php echo $geninf_3;?>&nbsp;&nbsp;</div></td>
          <td ><span id="sprytextfield2">
			<input  name="data[startYear]" class="selectValidState" type="text" id="data[startYear]" value="<?php echo $ahData['startYear'] ?>" size="5"  maxlength="4">
			<span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span>
			<?php if ($startChanged) echo "<font style=\"font-size:12px;color:red;\">Please update all input data.</font>"; ?>
			</span>
		  </td>
        </tr>
        <tr>
          <td ><div align="right" ><?php echo $geninf_4;?>&nbsp;&nbsp;</div></td>
		  <td ><span id="sprytextfield3">
		  <input  name="data[endYear]" class="selectValidState" type="text" id="data[endYear]" value="<?php echo $ahData['endYear'] ?>" size="5" maxlength="4">
		 <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span>
			<span class="textfieldMinValueMsg">minimum Required:2001</span>
		  </td>
       	 </tr>
       <!-- <tr>
          <td ><div align="right" ><?php echo $geninf_5;?>&nbsp;&nbsp;</div></td>
          <td ><span id="FPTimeOpt">
            <input type="radio" name="data[timeOpt]" value="Q" <?php echo $ahData['timeOpt']=='Q'?'checked="checked"':'' ?>>
            <?php echo $geninf_9;?>
            <input type="radio" name="data[timeOpt]" value="A" <?php echo $ahData['timeOpt']=='A'?'checked="checked"':'' ?>>
            <?php echo $geninf_10;?> </span></td>
        </tr> -->
        <tr>
          <td ><div align="right" ><?php echo $geninf_6;?>&nbsp;&nbsp;</div></td>
          <td >
            <select name="data[studyType]">
              <?php
						  	foreach($studyTypes as $studyType){?>
              <option value="<?php echo $studyType['value']?>"
								<?php echo $ahData['studyType']== $studyType['value']?'selected="selected"':'' ?>> <?php echo $studyType['value']?></option>
              <?php
							}
						  ?>
            </select>
           </td>
        </tr>
        <tr>
          <td ><div align="right" ><?php echo $geninf_7;?>&nbsp;&nbsp;</div></td>
          <td >
            <select name="data[baseCurrency]">
              <?php
						  	foreach($currencies as $currency){?>
              <option value="<?php echo $currency['id']?>"
								<?php echo $ahData['baseCurrency']== $currency['id']?'selected="selected"':'' ?>><?php echo $currency['value']?></option>
              <?php
							}
						  ?>
            </select>
           </td>
        </tr>
      </table></td>
  </tr>
  <tr>
  <td class="bodyText">
  <div align="center"><b><?php echo $geninf_8;?></div>
  <table width="70%" border="0" bordercolor="" cellspacing="0" cellpadding="2">
    <tr>
      <td><div align="center">
          <select style="width: 230px;" name="AllCur" id="AllCur" size="10" multiple="multiple" onDblClick="opt.transferRight()">
            <?php
						  	foreach($currencies as $currency){?>
            <option value="<?php echo $currency['id']?>"><?php echo $currency['value']?></option>
            <?php
							}
						  ?>
          </select>
        </div></td>
      <td><div align="center">
          <INPUT TYPE="button" NAME="right" VALUE="Add &gt;&gt;" ONCLICK="opt.transferRight()" style="width: 110px;" class='fp_button'>
          <BR>
          <BR>
          <INPUT TYPE="button" NAME="left" VALUE="Remove &lt;&lt;" ONCLICK="opt.transferLeft()" style="width: 110px;" class='fp_button'>
          <BR>
          <BR>
          <INPUT TYPE="button" NAME="left" VALUE="Remove All" ONCLICK="opt.transferAllLeft()" style="width: 110px;" class='fp_button'>
        </div></td>
      <td><div align="center">
          <?php $CurTypeSel = $ahData['CurTypeSel'] ;
				        $CurChunks = explode(",", $CurTypeSel);	?>
          <select style="width: 230px;" name="CurSel" id="CurSel" size="10" multiple="multiple">
            <?php

for($i = 0; $i < count($CurChunks); $i++){

	foreach ($currencies as $currency) {
	if ($currency['id'] == $CurChunks[$i]) {?>
            <option value="<?php echo $currency['id']?>"><?php echo $currency['value']?></option>
            <?php } } }?>
          </select>
        </div></td>
      <input type="hidden" name="action" value="s" />
    </tr>
    <input type="hidden" name="data[CurTypeSel]" id="data[CurTypeSel]" value="">
	<input type="hidden" value="u" name="a">
    <input type="hidden" value="<?php echo $ahData['id']?>" name="id">
    <input type="hidden" value="<?php echo $ahData['id']?>" name="data[id]">
	<input type="hidden" value="" name="namechk" id="namechk">
	<input type="hidden" value="<?php echo $ahData['studyName'] ?>" name="sname" id="sname">
	<input type="hidden" name="data[timeOpt]" value="A" >

    </td>
    </tr>

  </table>
  <tr>
      <td class="bodyText"><div align="center">
          <input type="submit" class='button' name="proceed" id="proceed" value="Save & Proceed"  >
        </div></td>
    </tr>
</form>
<?php

							}else{
							?>
<table><tr>
  <td colspan='4'>No Records</td>
</tr>
<tr>
  <td><a href="create.php">Create a New Case Study</a> </td>
  </tr>
  </table>
  <?php
							}
							?>
  <!-- footer starts here -->
  <?php include TEMPLATE_PATH."footer.tpl.php"
	?>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "custom", {validateOn:["change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "integer", {useCharacterMasking:true, validateOn:["change"], minValue:2000<?php echo $maxStartYear != 3000 ? ', maxValue:'.$maxStartYear : ''; ?>});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {useCharacterMasking:true, validateOn:["change"], minValue:2001});
//-->
</script>
