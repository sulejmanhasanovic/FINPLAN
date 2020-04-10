<?php $defmenu="block";
include TEMPLATE_PATH."header.tpl.php"?>
<script language="Javascript">

function autoinflt(frm,start,end,stead,box)
{
     for (n=start;n<=end;n++)
	{
		 var textbox = document.getElementById('I_'+stead+'_'+ n);
		 var textbox2 = document.getElementById('Avg_'+stead);
		 
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
<script language="Javascript">

		
function autototal(frm,start,end)
{		var a=new Array;

<?php
		for($i=0;$i<count($allChunks); $i++){
			echo "a[$i]='".$allChunks[$i]."';\n";
		}			
	 ?>
		for(i=0;i<a.length;i++){
			var curn = a[i];
			var textbox6 = document.getElementById('TB_'+ curn);
			var textbox3 = document.getElementById('TR_'+ curn);
			var textbox7 = document.getElementById('OB_'+ curn);

			var OLon = textbox7.value
			var TLon = textbox6.value
			var TRep = textbox3.value
			total1 = 0;
			total2 = 0;
			for (n=start;n<=end;n++){
			var textbox4 = document.getElementById('B_'+curn+'_'+ n);
			var textbox5 = document.getElementById('R_'+curn+'_'+ n);
			total1 = ((total1*1) + (textbox4.value*1));
			total2 = ((total2*1) + (textbox5.value*1));
		}
		textbox6.value = total1;
		textbox3.value = total2;
		check = ((OLon*1) + (textbox6.value*1) - (textbox3.value*1));
		if (check !=0)
		{
		alert("Please Correct the Repayment Amount for Currency :"+curn);
			return false;   
		}
}
}


</script>
</head>
<body>
<h3><?php echo $oldb_1;?></h3>

<div style="width:1100px;  overflow:auto;">
<form method="post" name="curtypeinf" action="oldbondsSave.php" OnSubmit="return autototal(this.form,<?php echo $ahData['startYear'];?>,<?php echo $ahData['endYear'];?>)">
<table width="" border="1"  cellspacing="5" cellpadding="0">
    <tr valign="top">
    <td valign="top">
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <th >&nbsp;</th>
        </tr>
		<tr>
          <td ><?php echo $oldb_9;?></td>
        </tr>
        <tr>
          <td ></td>
        </tr>
		<tr>
          <td ></td>
        </tr>
		<tr>
          <th ><?php echo $oldb_2;?></th>
        </tr>
        <?php 
for($i=$ahData['startYear'];$i <= $ahData['endYear']; $i++){
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
      <table border="0" width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <th colspan="3"><?php echo Config2::getData('currencies',$allChunks[$i]);?>(Million)</th>
        </tr>
<?php
		$oldval = 'OB_'.$allChunks[$i];
?>			<td colspan="3">
        	<span id="sprytextfield<?php echo $oldval;?>">
            <input name="data[<?php echo $oldval;?>]" id="<?php echo $oldval;?>" type="text" size="5" value="<?php echo $ctData[$oldval];?>">
			<span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>
			</td>
        </tr>
		 <script type="text/javascript">
			var sprytextfield<?php echo $oldval;?> = new Spry.Widget.ValidationTextField("sprytextfield<?php echo $oldval;?>", "real", {useCharacterMasking:true, validateOn:["change"], hint:"0.0", minValue:0.0});
		</script>
<?php
		$ratetypeval = 'RateType_'.$allChunks[$i];
		 if($ctData[$ratetypeval]=='SR' or $ctData[$ratetypeval]==''){
			$YearlyRetDis = 'disabled';
			$FixedRetDis = '';
		}if($ctData[$ratetypeval]=='YR'){
			$FixedRetDis = 'disabled';
			$YearlyRetDis = 'enabled';
		}
?>
        <tr>
          <td colspan="3"><INPUT TYPE="Radio" NAME="data[<?php echo $ratetypeval;?>]" id="<?php echo $ratetypeval;?>" 
		  ONCLICK="autoinflt(this.form,<?php echo $ahData['startYear'];?>,<?php echo $ahData['endYear'];?>,'<?php echo $allChunks[$i];?>','SR')" 
		  value="SR" <?php echo $ctData[$ratetypeval]=='SR'?'checked="checked"':''; if($ctData[$ratetypeval]=='') {echo "checked";}?> > <?php echo $oldb_4;?> &nbsp;
<?php 
			$steadyrateval = 'Avg_'.$allChunks[$i];
?>			<span id="sprytextfield<?php echo $steadyrateval;?>">
            <input name="data[<?php echo $steadyrateval;?>]" id="<?php echo $steadyrateval;?>" type="text" size="3" value="<?php echo $ctData[$steadyrateval];?>" <?php echo $FixedRetDis; ?>>% per year
			<span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>
			</td>
        </tr>
         <script type="text/javascript">
			var sprytextfield<?php echo $steadyrateval;?> = new Spry.Widget.ValidationTextField("sprytextfield<?php echo $steadyrateval;?>", "real", {useCharacterMasking:true, validateOn:["change"], hint:"0.0", minValue:0.0});
		</script>
        <tr>
          <td colspan="3">
		  <INPUT TYPE="Radio" NAME="data[<?php echo $ratetypeval;?>]" id="<?php echo $ratetypeval;?>" 
		  ONCLICK="autoinflt(this.form,<?php echo $ahData['startYear'];?>,<?php echo $ahData['endYear'];?>,'<?php echo $allChunks[$i];?>','YR')" 
		  value="YR" <?php echo $ctData[$ratetypeval]=='YR'?'checked="checked"':'' ?> > <?php echo $oldb_5;?> &nbsp; </td>
        </tr>
		
		
		<tr>
          <th ><?php echo $oldb_6;?></th><th ><?php echo $oldb_7;?></th><th ><?php echo $oldb_8;?></th>
        </tr>
        <?php 

for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){

if($ahData['timeOpt'] == 'Q'){

	for($q=1;$q <= 4; $q++){
		$bonval = 'B_'.$allChunks[$i].'_'.$m.'_Q_'.$q;
		$repval = 'R_'.$allChunks[$i].'_'.$m.'_Q_'.$q;
		$intval = 'I_'.$allChunks[$i].'_'.$m.'_Q_'.$q;
	?>
		<tr>
		   <td><input type="text" size="5"  id="<?php echo $bonval;?>" name="data[<?php echo $bonval;?>]" value="<?php echo $ctData[$bonval];?>"></td>
		   <td><input type="text" size="5"  id="<?php echo $repval;?>" name="data[<?php echo $repval;?>]" value="<?php echo $ctData[$repval];?>"></td>
		   <td><input type="text" size="5"  id="<?php echo $intval;?>" name="data[<?php echo $intval;?>]" value="<?php echo $ctData[$intval];?>" <?php echo $YearlyRetDis; ?>></td>
		</tr>
	 <?php
	 }
}else{
	$bonval = 'B_'.$allChunks[$i].'_'.$m;
	$repval = 'R_'.$allChunks[$i].'_'.$m;
	$intval = 'I_'.$allChunks[$i].'_'.$m;
?>
		<tr>
			<td><input type="text" size="5"  id="<?php echo $bonval;?>" name="data[<?php echo $bonval;?>]" value="<?php echo $ctData[$bonval];?>"></td>
			<td><input type="text" size="5"  id="<?php echo $repval;?>" name="data[<?php echo $repval;?>]" value="<?php echo $ctData[$repval];?>"></td>
			<td><input type="text" size="5"  id="<?php echo $intval;?>" name="data[<?php echo $intval;?>]" value="<?php echo $ctData[$intval];?>" <?php echo $YearlyRetDis; ?>></td>
		</tr>
        <?php	}
} 

	$tbonval = 'TB_'.$allChunks[$i];
	$trepval = 'TR_'.$allChunks[$i];
	
?>
	<tr>
		<td><input type="text" size="5"  id="<?php echo $tbonval;?>" name="data[<?php echo $tbonval;?>]" value="<?php echo $ctData[$tbonval];?>"></td>
		<td><input type="text" size="5"  id="<?php echo $trepval;?>" name="data[<?php echo $trepval;?>]" value="<?php echo $ctData[$trepval];?>"></td>
		<td></td>
    </tr>
      </table>
      </td>
      <?php
 }
?>
    </tr>
	  </table>
	</div>
    <tr>
 <?php if(is_array($ctData) && count($ctData) > 0) {?>
    <input type="hidden" name="act" value="u">
	<input type="hidden" name="eid" value="<?php echo $ctData['id']?>">
    <?php } else {?>
    <input type="hidden" name="act" value="a">
    <?php } ?>
    
	<input type="hidden" name="data[sid]" value="1">
    <tr>
      <td><input type="submit" class='button' name="proceed" id="proceed" value="Save & Proceed"   >
      </td>
    </tr>
</form>


<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
