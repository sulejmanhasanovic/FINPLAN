<?php include TEMPLATE_PATH."header2.tpl.php"?>
<script type="text/javascript">
function ValidateForm(form)
{
	var textbox = document.getElementById('caseStudyId');
	var textbox2 = document.getElementById('action');
   if (textbox.value =='') 
   { 
		alert('Please Select a Case Study');
		return false;  
   }else{
		return true;} 
} 
</script>
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
var url="ajax2.php";
url=url+"?q="+str;
url=url+"&sid="+Math.random();
xmlhttp.onreadystatechange=stateChanged;
xmlhttp.open("GET",url,true);
xmlhttp.send(null);
}

function stateChanged()
{
if (xmlhttp.readyState==4)
  {
  document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
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

</script>
<h3>Backup Case Study</h3>
 <table width="600" align="center" border="1" cellspacing="4" cellpadding="4">

<tr><th ><?php echo $back_Select ;?></th></tr>
<form name="form" action="" method="post" OnSubmit="return ValidateForm(this.form)">
<tr><td>
<select style="width:580px;" name="caseStudyId" id="caseStudyId" size="10" id="fp_exist" onClick="showHint(this.value)">
<?php

	if(is_array($caseStudies) && count($caseStudies) > 0){
		foreach($caseStudies as $caseStudy){?>
		  <option value="<?php echo $caseStudy['studyName']?>" ><?php echo $caseStudy['studyName']?></option>
		  <?php
		}
	}
?>
</select>
</td>
</tr>

 <tr><td><font color="red"><span id="txtHint"></span></font></td></tr>
 <tr>
 <td>
 <input type="radio" name="option" value="rep" checked>Replace
 <input type="radio" name="option" value="nex">Next Version
 <input type="radio" name="option" value="ren">SaveAs
 </td></tr>
<tr>
  <td><input type="hidden" name="action" value="s" >
	<input type="submit" class='button' value="<?php echo $back_but;?>" >
	

</td>
</tr>

</form>

</table>

           <?php include TEMPLATE_PATH."footer.tpl.php"?>