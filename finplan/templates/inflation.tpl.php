<?php $defmenu="block";
include TEMPLATE_PATH."header.tpl.php"?>
<script language="Javascript">

function autoinflt(frm,start,end,stead,box)
{
     for (n=start+1;n<=end;n++)
	{
		 var textbox = document.getElementById(stead+'_'+ n);
		 var textbox2 = document.getElementById('SteadyInf_'+stead);

		 if (box =='SR')
		{
		 textbox.disabled = true;
		 textbox2.disabled = false;
		 textbox.style.backgroundColor = '#D8D8D8';
		 textbox2.style.backgroundColor = '';
		}
		if (box =='YR')
		{
		 textbox.disabled = false;
		 textbox2.disabled = true;
		 textbox.style.backgroundColor = '';
		 textbox2.style.backgroundColor = '#D8D8D8';
		}

	}
}
</script>
</head>
<body>
<h3><?php echo $inlft_1;?></h3>
A value entered for one year will also be applicable for subsequent years, until a new value is entered for a future year.
<div>
  <form method="post" name="curtypeinf" action="inflationSave.php">
<table border="1"  cellspacing="4" cellpadding="0">

    <tr valign="top">

    <td valign="top">
	<table border="0" cellpadding="0" cellspacing="0">
        <tr>
          <th ><?php echo $inlft_2;?></th>
        </tr>
        <tr>
          <td ><?php echo $ahData['startYear'];?>(1st Year)</td>
        </tr>
        <tr>
          <th >&nbsp;</th>
        </tr>
		<tr>
          <th >&nbsp;</th>
        </tr>
        <?php
for($i=$ahData['startYear']+1;$i <= $ahData['endYear']; $i++){
if($ahData['timeOpt'] == 'Q'){

for($q=1;$q <= 4; $q++){
?>
        <tr bgcolor="#FFFF99">
          <td><?php echo "$i";?>&nbsp;Q<?php echo "$q";?></td>
        </tr>
        <?php } }else {

?>
        <tr bgcolor="#FFFF99">
          <td><?php echo "$i";?></td>
        </tr>
        <?php }
}
?>
        </tr>

      </table></td>
    <?php

for($i = 0; $i < count($allChunks); $i++){

?>
    <td valign="top">
      <table border="0" cellpadding="0" cellspacing="0">
        <tr>
          <th><?php echo Config2::getData('currencies',$allChunks[$i]);?></th>
        </tr>
<?php
if($ahData['timeOpt'] == 'Q'){

	for($q=1;$q <= 4; $q++){
		$infval = $allChunks[$i].'_'.$ahData['startYear'].'_Q_'.$q;
?>
        <tr>
        <td><input type="text" size="3"  id="<?php echo $infval;?>" name="data[<?php echo $infval;?>]" value="<?php echo $ceData[$infval];?>"></td>
        </tr>
<?php	}
}else{
		$infval = $allChunks[$i].'_'.$ahData['startYear'];
?>      <tr>
        <td> <span id="sprytextfield<?php echo $i+1;?>">
		  <input type="text" size="3"  id="<?php echo $infval;?>" name="data[<?php echo $infval;?>]" value="<?php echo $ceData[$infval];?>"> %
		      <span class="textfieldRequiredMsg">Required</span>
			<span class="textfieldInvalidFormatMsg">Invalid format.</span>
			<span class="textfieldMaxValueMsg">Maximum is 40%.</span>
			<span class="textfieldMinValueMsg">Minimum is 0%.</span>
</span></td>
        </tr>
<?php  }  ?>

        <script type="text/javascript">

		var sprytextfield<?php echo $i+1;?> =
			new Spry.Widget.ValidationTextField("sprytextfield<?php echo $i+1;?>", "real",
				{useCharacterMasking:true, validateOn:["change"], minValue:0, maxValue:40});


				</script>
        <?php


		$ratetypeval = 'RateType';
		$ratetypeval .= $allChunks[$i];
		if($ceData[$ratetypeval]=='SR'){
			$yearlydis = 'disabled';
			$steadydis = '';
		}elseif($ceData[$ratetypeval]=='YR'){
			$steadydis = 'disabled';
			$yearlydis = '';
		}else{
			$steadydis = '';
			$chk= "checked";
			$yearlydis = 'disabled';
		}
?>
        <tr>
          <td><INPUT TYPE="Radio" NAME="data[<?php echo $ratetypeval;?>]" id="<?php echo $ratetypeval;?>" ONCLICK="autoinflt(this.form,<?php echo $ahData['startYear'];?>,<?php echo $ahData['endYear'];?>,'<?php echo $allChunks[$i];?>','SR')" value="SR" <?php echo $ceData[$ratetypeval]=='SR'?'checked="checked"':'' ;echo $chk;?> ><?php  echo $inlft_3;?> &nbsp;
<?php
			$steadyrateval = 'SteadyInf_';
			$steadyrateval .=  $allChunks[$i];

?>			<span id="sprytextfield<?php echo $steadyrateval;?>">
            <input name="data[<?php echo $steadyrateval;?>]" id="<?php echo $steadyrateval;?>" type="text" size="3" value="<?php echo $ceData[$steadyrateval];?>" <?php echo $steadydis;?>>% per year
			 <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
        </td>

			<script type="text/javascript">
			var sprytextfield<?php echo $steadyrateval;?> = new Spry.Widget.ValidationTextField("sprytextfield<?php echo $steadyrateval;?>", "real", {useCharacterMasking:true, validateOn:["change"]});
			</script>

        </tr>

        <tr>
          <td><INPUT TYPE="Radio" NAME="data[<?php echo $ratetypeval;?>]" id="<?php echo $ratetypeval;?>" ONCLICK="autoinflt(this.form,<?php echo $ahData['startYear'];?>,<?php echo $ahData['endYear'];?>,'<?php echo $allChunks[$i];?>','YR')" value="YR" <?php echo $ceData[$ratetypeval]=='YR'?'checked="checked"':'' ?> ><?php echo $inlft_4;?> &nbsp; </td>
        </tr>

        <?php

for($m=$ahData['startYear']+1;$m <= $ahData['endYear']; $m++){

	if($ahData['timeOpt'] == 'Q'){

		for($q=1;$q <= 4; $q++){
			$infval = $allChunks[$i].'_'.$m.'_Q_'.$q;
		?>
			<tr>
			<td><input type="text" size="3"  id="<?php echo $infval;?>" name="data[<?php echo $infval;?>]" value="<?php echo $ceData[$infval];?>"></td>
			</tr>
	<?php	}
	}else{
			$infval = $allChunks[$i].'_'.$m;
	?>     <tr>
			<td>

				<span id="sprytextfield<?php echo $infval;?>">

			<input type="text" size="3"  id="<?php echo $infval;?>" name="data[<?php echo $infval;?>]" value="<?php echo $ceData[$infval];?>" <?php echo $yearlydis;?>>
<?php			if($m==$ahData['startYear']+1){ ?>
				<span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>
				<script type="text/javascript">
					var sprytextfield<?php echo $infval;?> = new Spry.Widget.ValidationTextField("sprytextfield<?php echo $infval;?>", "real", {useCharacterMasking:true, validateOn:["change"]});
				</script>
<?php			}else{?>
				<span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>
				<script type="text/javascript">
					var sprytextfield<?php echo $infval;?> = new Spry.Widget.ValidationTextField("sprytextfield<?php echo $infval;?>", "real", {isRequired:false,useCharacterMasking:true, validateOn:["change"]});
				</script>
<?php }	?>
			</td>
			</tr>
	<?php	}
}

?>
      </table>
      </td>
      <?php
}
?>
    </tr>
	  </table>
	</div>
    <tr>
      <td>
    <?php if(is_array($ceData) && count($ceData) > 0) {?>
    <input type="hidden" name="act" value="u">
    <?php } else {?>
    <input type="hidden" name="act" value="a">
    <?php } ?>
    <input type="hidden" name="eid" value="<?php echo $ceData['id'];?>">
	<input type="hidden" name="data[sid]" value=1>
    <tr>
      <td><input type="submit" class='button' name="proceed" id="proceed" value="Save & Proceed"   >
      </td>
    </tr>
</form>


<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
