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

	 return true;
	 }

return true;


}
</script>

<h3>Open/Create Case Study</h3>

<table align="center" border="1">
<tr><th><?php echo $begin_SelectCase;?></th></tr>
<form name="form" action="" method="post" OnSubmit="return ValidateForm(this.form)">
<tr><td>
<select style="width:100%; overflow:auto" name="caseStudyId" id="caseStudyId" size="<?php echo count($caseStudies);?>" id="fp_exist" >
<?php
if(is_array($caseStudies) && count($caseStudies) > 0){
foreach($caseStudies as $caseStudy){?>
<option value="<?php echo $caseStudy['studyName']?>"><?php echo $caseStudy['studyName']?></option>
<?php
}
}
?>
</select></td></tr>

<tr><td><input type="hidden" name="action" value="s" />
<input type="submit" class='button' value="Proceed" >
</form>
</td>
</tr>

<br>
<tr>
<td><Strong><?php echo $begin_or;?></Strong></td>
</tr>
<form name="frmSelectCaseStudy" action="" method="post" >
<tr>
<td><input name="caseStudyName" type="hidden" value="Enter" >
<br>
<input type="hidden" name="action" value="n">
<input type="submit" class='button' name="proceed" id="proceed" value="Create a New Case Study">
</td>
</tr>
</form>
</table>
