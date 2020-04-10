<?php include TEMPLATE_PATH."header2.tpl.php"?>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
var xmlhttp

function showHint(str)
{
if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
xmlhttp=GetXmlHttpObject();
if (xmlhttp==null)
  {
  alert ("Your browser does not support XMLHTTP!");
  return;
  }
var stdy =  document.getElementById("StudyName");
var url="ajax1.php";
url=url+"?q="+stdy.value;
url=url+"&sid="+Math.random();
xmlhttp.onreadystatechange=stateChanged;
xmlhttp.open("GET",url,true);
xmlhttp.send(null);
return false;
}

function stateChanged()
{
if (xmlhttp.readyState==4)
  {
  document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
  if (xmlhttp.responseText.length==0)
	  {
	  document.getElementById("namechk").value="Y";
	  }else{
	  document.getElementById("namechk").value="N";
	  }
 
  }
}

function GetXmlHttpObject()
{
if (window.XMLHttpRequest)
  {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  return new XMLHttpRequest();
  }
if (window.ActiveXObject)
  {
  // code for IE6, IE5
  return new ActiveXObject("Microsoft.XMLHTTP");
  }
return null;
}
function ValidateForm(form)
{
	var textbox = document.getElementById('namechk');
	
   if (textbox.value =='N') 
   { 
      alert('Please Change the \'Full Name of Study\'');
        return false;
   }else{
   
	 return true;
	 }
 } 
 function ValidateForm(form)
{
	var textbox1 = document.getElementById('data[CurTypeSel]');
	var textbox2 = document.getElementById('data[startYear]');
	var textbox3 = document.getElementById('data[endYear]');
	var textbox4 = document.getElementById('data[studyName]');	
	
	if(textbox4.value ==''){
		alert("Please Enter Study Name !");
		return (false)
	}
	if (textbox2.value =='' || textbox2.value < 2000) 
   { 
		alert("Start Year is Empty or Less Than 2000")
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
<body onLoad="opt.init(document.forms[0])">
<h3><?php echo $crt_1;?></h3>
<form method="post" action="createSave.php" OnSubmit="return ValidateForm(this.form)" >
  <table width="100%" align="center" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td class="bodyText"><table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr>
          <td nowrap ><div align="right" ><?php echo $crt_2;?>&nbsp;&nbsp;</div></td>
          <td ><span id="sprytextfield1">
            <input style="width:50%" name="data[studyName]" id="studyName" type="text" class="selectValidState" id="StudyName" value="<?php echo $_REQUEST['snme'];?>" size="50" onBlur="showHint(this.value)" />
             <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>
			 <font color="#882D2D"><span id="txtHint"></span></font></td>
	  <td><?php if ($_POST['filename_ok'] === 'no') echo "Case study name is too similar to an existing one"; ?></td>
        </tr>
        <tr>
          <td ><div align="right" ><?php echo $crt_3;?>&nbsp;&nbsp;</div></td>
          <td ><div align="left"><span id="FPNote" >
              <textarea style="width: 420px;" name="data[note]" id="Note" cols="45" rows="5" ></textarea>
              </span></div></td>
        </tr>
        <tr>
          <td ><div align="right" ><?php echo $crt_4;?>&nbsp;&nbsp;</div></td>
		  <td ><span id="sprytextfield2">
		  <input  name="data[startYear]" type="text" id="data[startYear]" size="5"  maxlength="4">
		  <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span>
			<span class="textfieldMinValueMsg">minimum Required:2000</span>
			</span>
		  </td>
        
        </tr>
        <tr>
          <td ><div align="right" ><?php echo $crt_5;?>&nbsp;&nbsp;</div></td>
           <td ><span id="sprytextfield3">
		   <input  name="data[endYear]" type="text" id="data[endYear]" size="5" maxlength="4">
		    <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span>
			<span class="textfieldMinValueMsg">minimum Required:2001</span>
		  </td>
       	 </tr> 
		
        <tr>
          <td ><div align="right" ><?php echo $crt_9;?>&nbsp;&nbsp;</div></td>
          <td ><span id="FPTimeOpt">
            <select name="data[studyType]">
              <?php
						  	foreach($studyTypes as $studyType){?>
              <option value="<?php echo $studyType['value']?>"> <?php echo $studyType['value']?></option>
              <?php
							}
						  ?>
            </select>
            </span></td>
        </tr>
        <tr>
          <td ><div align="right" ><?php echo $crt_10;?>&nbsp;&nbsp;</div></td>
          <td ><span id="FPTimeOpt">
            <select name="data[baseCurrency]">
              <?php
						  	foreach($currencies as $currency){?>
              <option value="<?php echo $currency['id']?>"><?php echo $currency['value']?></option>
              <?php
							}
						  ?>
            </select>
            </span></td>
        </tr>
      </table></td>
  </tr>
  <tr>
  <td class="bodyText">
  <p align="center"><?php echo $crt_11;?></p>
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
          <INPUT TYPE="button"  class='button' NAME="right" VALUE="Add &gt;&gt;" ONCLICK="opt.transferRight()" style="width: 110px;" class='fp_button'>
          <BR>
          <BR>
          <INPUT TYPE="button" class='button' NAME="left" VALUE="Remove &lt;&lt;" ONCLICK="opt.transferLeft()" style="width: 110px;" class='fp_button'>
          <BR>
          <BR>
          <INPUT TYPE="button"  class='button' NAME="left" VALUE="Remove All" ONCLICK="opt.transferAllLeft()" style="width: 110px;" class='fp_button'>
        </div></td>
      <td><div align="center">
          <select style="width: 230px;" name="CurSel" id="CurSel" size="10" multiple="multiple">
          </select>
        </div></td>
      <input type="hidden" name="action" value="s">
    </tr>
    <input type="hidden" name="data[CurTypeSel]" id="data[CurTypeSel]" value="">
    
	 <input type="hidden" name="namechk" id="namechk" value="">
	<input type="hidden" name="data[timeOpt]" value="A" >
	<input type="hidden" name="data[caseid]" id="data[caseid]" value="<?php echo $caseData['id'];?>" >
	
    <br>
    <tr>
      <td class="bodyText"><div align="center">
          <input type="submit" class='button' name="proceed" id="proceed" value="Save & Proceed"  >
        </div></td>
    </tr>
    </td>
    </tr>
    
  </table>
</form>
<!-- footer starts here -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "custom", {validateOn:["change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "real", {useCharacterMasking:true, validateOn:["change"], minValue:2000});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "real", {useCharacterMasking:true, validateOn:["change"], minValue:2001});
//-->
</script>
