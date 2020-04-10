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
</script>

<h3>Copy Case Study</h3>
 <table width="50%" align="center" border="1" cellspacing="4" cellpadding="4">

<tr><th >Select a Case Study to Copy</th></tr>
<form name="form" action="" method="post" >
<tr><td>
<select style="width:90%;" name="caseStudyId" id="caseStudyId" size="10" id="fp_exist" >
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
 <tr><td>
<?php if ($filename_ok === 'no') echo "Case study name is too similar to an existing one"; ?>

</td></tr>
 <tr>
  <td>Name :<input type="Text" size=50 name="studyName" id="studyName" ><font color="#882D2D"><span id="txtHint"></span></font></td>
</tr>

<tr>
  <td><input type="hidden" name="action" value="s" >
	<input type="submit" class='button' value="Copy" >
	

</td>
</tr>

</form>

</table>

           <?php include TEMPLATE_PATH."footer.tpl.php"?>