<?php include TEMPLATE_PATH."header2.tpl.php"?>
           
<table width="600" align="center" border="1" cellspacing="4" cellpadding="4">
	<h3>Data Location</h3>
	<tr><th>Choose Option Below</th></tr>
	<form name="frmSelectCaseStudy" action="" method="post">
	<tr>
		<td>
		<input type="radio" name="uploadedfile">Default Location 
		</td>
	</tr>
	<tr>
		<td>
		<input type="radio" name="uploadedfile" >Set New Location 
		</td>
	</tr>
	<tr>
		<td>
		<input type="radio" name="uploadedfile" >Set Temporary Location (Recommended for portable device)
		</td>
	</tr>
	<tr>
		<td>
		<input type="file" name="uploadedfile" >
		</td>
	</tr>
	<tr>
		<td>
		<input type="hidden" name="action" value="s" >
		<input type="submit" class='button' value="Submit" >
		</td>
	</tr>

	</form>
</table>
<?php include TEMPLATE_PATH."footer.tpl.php"?>