<?php include TEMPLATE_PATH."header2.tpl.php"?>
<script type="text/javascript">
function ValidateForm()
{
//	var textbox = document.getElementById('caseStudyId');
	var textbox_value = document.forms["frmSelectCaseStudy"]["caseStudyId"].value;
//	var textbox2 = document.getElementById('action');
   if (textbox_value =='') 
   { 
		alert('Please Select a Case Study');
		return false;     
   } else{
		var answer = confirm ("Are You Sure You Want to Delete this Case Study?")
		if (answer)
			return true;
		else
			return false;    
   }
} 
</script>

<table width="300" align="center" border="1" cellspacing="4" cellpadding="4">
<h3>Delete Case Study</h3>
              <tr>
              
              <th > <?php echo $del_Select ;?></th></tr><tr><td>
              <form name="frmSelectCaseStudy" action="" method="post" OnSubmit="return ValidateForm()">
                <select style="width:280px;" name="caseStudyId" size="10" id="fp_exist" >
                  <?php
if(is_array($caseStudies) && count($caseStudies) > 0){
foreach($caseStudies as $caseStudy){?>
                  <option value="<?php echo $caseStudy['id']?>"><?php echo $caseStudy['studyName']?></option>
                  <?php
}
}
?>
                </select>
                </td>
                </tr>
                
                <tr>
                  <td><input type="hidden" name="action" value="s" >
                    <input type="submit" class='button' value="<?php echo $del_but;?>" >
              </form>
              </td>
              </tr>
              
              <br>
              
            </table>
            <?php include TEMPLATE_PATH."footer.tpl.php"?>