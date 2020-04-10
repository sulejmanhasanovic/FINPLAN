<?php $defmenu="block";
include TEMPLATE_PATH."header.tpl.php"?>
<script language="Javascript">

function autofillin(frm,start,end,stead,box)
{
	 var textbox = document.getElementById('YearlyRate' +stead);

     for (n=start+1;n<=end;n++)
	{
		var textbox3 = document.getElementById(stead+'_'+ n);

		 if (box=='SR')
		{
		 textbox3.disabled= true;
		 textbox.disabled = false;
		 textbox3.style.backgroundColor = '#D8D8D8';
		 textbox.style.backgroundColor = '';
		}
		if (box=='II')
		{
		 textbox3.disabled= true;
		 textbox.disabled = true;
		 textbox3.style.backgroundColor = '#D8D8D8';
		 textbox.style.backgroundColor = '#D8D8D8';
		}
		if(box=='YR')
		 {
		 textbox3.disabled= false;
		 textbox.disabled = true;
		 textbox.style.backgroundColor = '#D8D8D8';
		 textbox3.style.backgroundColor = '';
		 }

}
}

function ProcA()
{
	var objTableBlock = document.getElementById('yeartable');
    objTableBlock.style.display= '';
}

</script>
<body>
<?php if($forCurr){?>
<h3><?php echo $encr_1;?></h3>
A value entered for one year will also be applicable for subsequent years, until a new value is entered for a future year.
<div>
  <form method="post" name="curtypeinf" action="ecncurSave.php">
<table border="0"  cellspacing="0" cellpadding="0">

    <tr valign="top">
      <td>
	  <table border="1" cellpadding="0" cellspacing="0" id="yeartable" style="display:">
          <tr><th scope="col"><?php echo $encr_2;?>&nbsp;</th></tr>
		   <tr><td><?php echo $ahData['startYear']-1;?> </td></tr>
		  <tr><td><?php echo $ahData['startYear'];?> (<?php echo $encr_8;?>)</td></tr>
          <tr><td><div align="center">&nbsp;</div></td></tr>
          <tr><td><div align="center">&nbsp;</div></td></tr>
          <tr><td><div align="center">&nbsp;</div></td></tr>

          <?php
for($i=$ahData['startYear']+1;$i <= $ahData['endYear']; $i++){
	if($ahData['timeOpt'] == 'Q'){

		for($q=1;$q <= 4; $q++){
	?>
			  <tr >
				<td ><?php echo $i;?>&nbsp;Q<?php echo $q;?></td>
			  </tr>
	 <?php }
	}else{?>
          <tr >
            <td ><?php echo $i;?></td>
          </tr>
   <?php }
} ?>
        </table></td>
      <?php

for($i = 0; $i < count($CurChunks); $i++){

	?>
      <td valign="top">
	  <table border="1" cellpadding="0" cellspacing="0">
          <tr>
            <th colspan="1" scope="col"><?php echo $baseCname;?>&nbsp;(<?php echo $encr_3;?> <?php echo Config2::getData('currencies',$CurChunks[$i]);?>)</th>
          </tr>
<?php	  	if($ahData['timeOpt'] == 'Q'){
		for($q=1;$q <= 4; $q++){
		$exchval = $CurChunks[$i].'_'.$ahData['startYear'].'Q'.$q;
?>
          <tr >
            <td><span id="sprytextfield<?php echo $i+1;?>">
			<input type="text" size="10" name="data[<?php echo $exchval;?>]" value="<?php echo $ceData[$exchval];?>">
             <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.		</span></span></td>
          </tr>
          <?php
		}
	}else{
			$ii = $ahData['startYear']-1;
			$exchval1 = $CurChunks[$i].'_'.$ii;
			$exchval = $CurChunks[$i].'_'.$ahData['startYear'];
?>
			<tr >
            <td><span id="sprytextfield<?php echo $ii;?>">
			<input type="text" size="10" name="data[<?php echo $exchval1;?>]" value="<?php echo $ceData[$exchval1];?>"> (<?php echo "For Initial BalanceSheet";?>)
             <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
          </tr>
		   <script type="text/javascript">
			var sprytextfield<?php echo $ii;?> = new Spry.Widget.ValidationTextField("sprytextfield<?php echo $ii;?>", "real", {useCharacterMasking:true, validateOn:["change"]});
		   </script>
          <tr >
            <td><span id="sprytextfield<?php echo $i+1;?>">
			<input type="text" size="10" name="data[<?php echo $exchval;?>]" value="<?php echo $ceData[$exchval];?>">
             <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
          </tr>
		   <script type="text/javascript">
			var sprytextfield<?php echo $i+1;?> = new Spry.Widget.ValidationTextField("sprytextfield<?php echo $i+1;?>", "real", {useCharacterMasking:true, validateOn:["change"]});
		   </script>
  <?php	}	?>
          <tr>
            <td><?php
$ratetypeval = 'RateType';
$ratetypeval .= $CurChunks[$i];

?>
<INPUT TYPE="radio" NAME="data[<?php echo $ratetypeval;?>]"ONCLICK="autofillin(this.form,<?php echo $ahData['startYear'];?>,<?php echo $ahData['endYear'];?>,'<?php echo $CurChunks[$i];?>','SR')"
value="SR" <?php echo $ceData[$ratetypeval]=='SR'?'checked="checked"':''; if($ceData[$ratetypeval]==''){echo "checked=checked"; } ?>><?php echo $encr_4;?> &nbsp;
<?php $yearlyrateval = 'YearlyRate'.$CurChunks[$i];?>

<span id="sprytextfield<?php echo $yearlyrateval;?>">
<input name="data[<?php echo $yearlyrateval;?>]" id="<?php echo $yearlyrateval;?>" type="text" size="3" value="<?php echo $ceData[$yearlyrateval];?>" <?php if($ceData[$yearlyrateval]=='' && $ceData[$ratetypeval]!=''){echo "disabled";}?>>&nbsp;<?php echo $encr_7;?>
<span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>

<script type="text/javascript">
var sprytextfield<?php echo $yearlyrateval;?> = new Spry.Widget.ValidationTextField("sprytextfield<?php echo $yearlyrateval;?>", "real", {useCharacterMasking:true, validateOn:["change"]});
</script>
</tr>
<tr>
<td><INPUT TYPE="radio" NAME="data[<?php echo $ratetypeval;?>]" ONCLICK="autofillin(this.form,<?php echo $ahData['startYear'];?>,<?php echo $ahData['endYear'];?>,'<?php echo $CurChunks[$i];?>','II')"
value="II" <?php echo $ceData[$ratetypeval]=='II'?'checked="checked"':'' ?>><?php echo $encr_5;?> &nbsp;</td>
</tr>
<tr>
<td><INPUT TYPE="radio" NAME="data[<?php echo $ratetypeval;?>]" ONCLICK="autofillin(this.form,<?php echo $ahData['startYear'];?>,<?php echo $ahData['endYear'];?>,'<?php echo $CurChunks[$i];?>','YR')"
value="YR" <?php echo $ceData[$ratetypeval]=='YR'?'checked="checked"':'' ?>><?php echo $encr_6;?> &nbsp;</td>
</tr>
          <?php

for($m=$ahData['startYear']+1;$m <= $ahData['endYear']; $m++){
	if($ahData['timeOpt'] == 'Q'){
		for($q=1;$q <= 4; $q++){
		$exchval = $CurChunks[$i].'_'.$m.'Q'.$q;
?>
          <tr>
            <td><input type="text" size="10" id="<?php echo $exchval;?>"  name="data[<?php echo $exchval;?>]" value="<?php echo $ceData[$exchval];?>">
            </td>
          </tr>
          <?php
		}
	}else{
		$exchval = $CurChunks[$i].'_'.$m;
?>
          <tr >
            <td>

				<span id="sprytextfield<?php echo $exchval;?>">

			<input type="text" size="10" id="<?php echo $exchval;?>" name="data[<?php echo $exchval;?>]" value="<?php echo $ceData[$exchval];?>" <?php echo $yearlydis;?> <?php echo $ceData[$ratetypeval]=='YR'?'':'disabled' ?>>
<?php			if($m==$ahData['startYear']+1){ ?>
				<span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>
				<script type="text/javascript">
					var sprytextfield<?php echo $exchval;?> = new Spry.Widget.ValidationTextField("sprytextfield<?php echo $exchval;?>", "real", {useCharacterMasking:true, validateOn:["change"]});
				</script>
<?php			}else{?>
				<span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>
				<script type="text/javascript">
					var sprytextfield<?php echo $exchval;?> = new Spry.Widget.ValidationTextField("sprytextfield<?php echo $exchval;?>", "real", {isRequired:false,useCharacterMasking:true, validateOn:["change"]});
				</script>

<?php }	?>
          </tr>
          <?php	}
}
?>
        </table></td>
      <?php

}
?>
    </tr>
	</table>
</div>
    <tr>
      <td><?php if(is_array($ceData) && count($ceData) > 0) {?>
        <input type="hidden" name="act" value="u">
        <?php } else {?>
        <input type="hidden" name="act" value="a">
        <?php } ?>
        <input type="hidden" name="eid" value="<?php echo $ceData['id'];?>">
		<input type="hidden" name="data[sid]" value=1>
        <input type="submit" class='button' name="proceed" id="proceed" value="Save & Proceed"   >
  </form>
  </tr>
  <?php } else{
   echo "<h3>No Foreign Currency Selected</h3>";
  }?>

<?php include TEMPLATE_PATH."footer.tpl.php"?>
