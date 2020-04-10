<?php include TEMPLATE_PATH."header2.tpl.php"?>



            
<table width="300" align="center" border="1" cellspacing="4" cellpadding="4">
<h3>Restore Case Study</h3>
  <tr>  
	  <th><?php echo $rest_Select  ;?>
	  </th>
  </tr>
<form enctype="multipart/form-data" action="" method="POST">
	<tr>
		<td>
		<input type="file" id="uploaded" name="uploaded" >
		</td>
	</tr>
	<tr>
		<td>
		<input type="hidden" name="action" id="action" value="s" >
		 <input type="submit" class='button' value="<?php echo $rest_but;?>" >
		</form>
		</td>
	</tr>
 </table>
 <?php include TEMPLATE_PATH."footer.tpl.php"?>