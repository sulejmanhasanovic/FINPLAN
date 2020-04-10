<?php $pltmenu="block";
include TEMPLATE_PATH."header.tpl.php"?>
<script language="Javascript">

function autoInterestRate(frm,chk)
{
  var textbox1 = document.getElementById('InterestRate');
  var textbox2 = document.getElementById('InterestSpreadRate');

  if(chk=='C'){
    textbox2.disabled = true;
    textbox2.value = 0.0;
    textbox1.disabled = false;
    textbox2.style.backgroundColor = '#D8D8D8';
    textbox1.style.backgroundColor = '';
  }else{
    textbox1.value = 0.0;
    textbox1.disabled = true;
    textbox2.disabled = false;
    textbox1.style.backgroundColor = '#D8D8D8';
    textbox2.style.backgroundColor = '';
  }
}

function autoIDC(frm,chk)
{
  var textbox3 = document.getElementById('data[IDCLoan]');
  var textbox4 = document.getElementById('data[IDCTerm]');
  var textbox5 = document.getElementById('data[IDCRate]');

  if(chk=='Y'){
    textbox3.disabled = false;
    textbox4.disabled = false;
    textbox5.disabled = false;
    frm.IDCRepayment[0].disabled = false;
    frm.IDCRepayment[1].disabled = false;
    textbox3.style.backgroundColor = '';
    textbox4.style.backgroundColor = '';
    textbox5.style.backgroundColor = '';
  }else{
    textbox3.disabled = true;
    textbox4.disabled = true;
    textbox5.disabled = true;
    frm.IDCRepayment[0].disabled = true;
    frm.IDCRepayment[1].disabled = true;
    textbox3.style.backgroundColor = '#D8D8D8';
    textbox4.style.backgroundColor = '#D8D8D8';
    textbox5.style.backgroundColor = '#D8D8D8';
  }
}

function autoFEE(frm,txt,rad)
{
  var textbox3 = document.getElementById(txt);
  var textbox4 = document.getElementById(rad);

  if (textbox4.checked==true) {
    textbox3.disabled = false;
    textbox3.style.backgroundColor = '';
  } else {
    textbox3.disabled = true;
    textbox3.style.backgroundColor = '#D8D8D8';
  }
}

</script>
<body >
<?php

$ec_version = 0;
$fsName = Config2::getData('financesource',$_REQUEST['fs']);
if ($fsName) {
  $ec_version = substr($fsName,strlen($fsName)-1,strlen($fsName));
}

?>
<h3>Terms of Financing: Project Loans</h3>
<table>
  <tr>
    <th><strong>Plant</strong></th>
    <th>Currency Type</th>
    <th>Action</th>
  </tr>
  <?php
if(is_array($data) && count($data) > 0){
	foreach($data as $row){
		if($row[$_REQUEST['fs']]=='YES'){
			$plntid = $row['pid'];
			$cptData = $apd->getById($plntid);
			$fid = $row['fid'];
			$fid = explode("_", $fid);
			$cName = Config2::getData('currencies',$fid[0]);

?>
  <tr>
    <td><?php echo $cptData['name']?></td>
    <td><?php echo $cName;?></td>
    <td><a href="?a=e&id=<?php echo $row['id']?>&pid=<?php echo $cptData['id']?>&fs=<?php echo $_REQUEST['fs'];?>
			&cur=<?php echo $fid[0];?>">Edit</a> </td>
  </tr>
  <?php
		}
	}
}else{
	echo "<tr><td colspan='4'>No Records</td></tr>";
}
?>
</table>
<?php
if(isset($_REQUEST['id'])){
	if(is_array($ctData) && count($ctData) > 0) {?>

	<!--<div align="right">
	<a href="?a=d&id=<?php echo $ctData['id']?>&fs=<?php echo $_REQUEST['fs'];?>" onclick="return confirm('Are you sure you want to delete?');"><?php echo $del_opt2;?>	</a>
	</div>--><?php
	}?>
<form method="post" action="termfinanceSave2.php">
  <table width="600" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <th ><?php echo $terfin_1 ;?></th>
      <th><?php echo $cpData['name'];?>
        <INPUT TYPE="hidden" NAME="data[Name]" value="<?php echo $_REQUEST['fs'];?>">
		<INPUT TYPE="hidden" NAME="Nme" value="<?php echo $_REQUEST['fs'];?>"></th>
    </tr>
    <tr>
      <th ><?php echo $terfin_2 ;?></th>
      <th><?php $cuName = Config2::getData('currencies',$_REQUEST['cur']);echo $cuName;?>
        <INPUT TYPE="hidden" NAME="data[Currency]" value="<?php echo $_REQUEST['cur'];?>"></th>
    </tr>
    <tr>
      <th > <?php echo $terfin_3 ;?> </th>
      <th >
        <?php
if($cfData[$_REQUEST['fs']]=='YES'){
	$amount =0;
	for($i=1;$i <= $cpData['CPeriod']; $i++){
		$sfval = $_REQUEST['fs'];
		$sfval .= '_';
		$sfval .= $i;
		$infval = 'Tot_';
		$infval .= $_REQUEST['cur'];
		$perval = $_REQUEST['cur'];
		$perval .= '_';
		$perval .= $i;
		$perc = $ciData[$perval];
		$totcost = $ciData[$infval];
		$tot = $perc * $totcost/100 ;
		$amount = $amount + $tot*$cfData[$sfval]/100;
	}
}Else{
$amount = 0;
}
echo $amount;
?>
      (Million)</th>
    </tr>
	<tr>
      <td ><div align="right" ><?php echo $terfin_5 ;?></td>
      <td >
      <span id="sprytextfield1">  <INPUT TYPE="text" NAME="data[MaturityTime]" value="<?php echo $ctData['MaturityTime'];?>">(Years)
	  <span class="textfieldRequiredMsg">Required</span>
	    <span class="textfieldInvalidFormatMsg">Invalid format.</span>
		<span class="textfieldMinValueMsg">Min Value:0 </span></td>
    </tr>
   <?php if($ctData['InterestOption']=='C'){
			$RateDis = '';
			$SprdDis = 'disabled';
		}else{
			$RateDis = 'disabled';
			$SprdDis = '';
		}?>

    <tr>
      <td ><div align="right" ><?php echo $terfin_23 ;?>  </td>
      <td > <input type="radio" name="data[InterestOption]" id="InterestOption" value="C" <?php echo $ctData['InterestOption']=='C'?'checked="checked"':'' ?> onClick="autoInterestRate(this.form,'C')">
        <?php echo $terfin_24 ;?>
        <input type="radio" name="data[InterestOption]" id="InterestOption" value="F" <?php echo $ctData['InterestOption']=='F'?'checked="checked"':'' ?> onClick="autoInterestRate(this.form,'F')" >
        <?php echo $terfin_25 ;?> </td>
   </tr>
    <tr id="Interest1"  style="display:">
      <td ><div align="right" ><?php echo $terfin_12 ;?></td>
      <td ><span id="sprytextfield2">
        <INPUT TYPE="text" NAME="data[InterestRate]" id="InterestRate" value="<?php echo $ctData['InterestRate'];?>" <?php echo $RateDis;?>> %
		<span class="textfieldRequiredMsg">Required</span>
	    <span class="textfieldInvalidFormatMsg">Invalid format.</span>
		<span class="textfieldMinValueMsg">Min Value:0 </span>
		</td>
    </tr>
	 </tr>
	 <tr >
      <td ><div align="right" ><?php echo $terfin_13 ;?></td>
      <td><span id="sprytextfield3">
        <INPUT TYPE="text" NAME="data[InterestSpreadRate]" id="InterestSpreadRate" value="<?php echo $ctData['InterestSpreadRate'];?>" <?php echo $SprdDis;?>> %
		<span class="textfieldRequiredMsg">Required</span>
	    <span class="textfieldInvalidFormatMsg">Invalid format.</span>
		<span class="textfieldMinValueMsg">Min Value:0 </span></td>
	</tr>
     <tr>
      <td ><div align="right" ><?php echo $terfin_29 ;?></td>
      <td ></td>
    </tr>
    <tr>
    <td valign=center><div align="right" >
	  <input type="checkBox"  id="OTInitial" name="data[OTInitial]" value="YES" <?php echo $ctData['OTInitial']=='YES'?'checked="checked"':'' ?>
	  ONCLICK="autoFEE(this.form,'OTIRate','OTInitial')">
	  <?php echo $terfin_18 ;?>	</td>
      <td ><?php if($ctData['OTInitial']=='YES'){$DupDis = '';}else{$DupDis = 'disabled';}?>
        <span id="sprytextfield4">
		<INPUT TYPE="text" id="OTIRate" NAME="data[OTIRate]" value="<?php echo $ctData['OTIRate'];?>"<?php echo $DupDis;?>> Millions
		<span class="textfieldRequiredMsg">Required</span>
	    <span class="textfieldInvalidFormatMsg">Invalid format.</span>
		<span class="textfieldMinValueMsg">Min Value:0 </span></td>
    </tr>
    <tr>
      <td ><div align="right" ><input type="checkBox"  id="DUpfront" name="data[DUpfront]" value="YES" <?php echo $ctData['DUpfront']=='YES'?'checked="checked"':'' ?>
	  ONCLICK="autoFEE(this.form,'DURate','DUpfront')">
	  <?php echo $terfin_19 ;?></td>
      <td ><?php if($ctData['DUpfront']=='YES'){$DurDis = '';}else{$DurDis = 'disabled';}?>
        <span id="sprytextfield5">
		<INPUT TYPE="text" id="DURate" NAME="data[DURate]" value="<?php echo $ctData['DURate'];?>" <?php echo $DurDis;?>> %
		<span class="textfieldRequiredMsg">Required</span>
	    <span class="textfieldInvalidFormatMsg">Invalid format.</span>
		<span class="textfieldMinValueMsg">Min Value:0 </span></td>
    </tr>
	<tr>
    <td ><div align="right" ><input type="checkBox"  id="PDrawdown" name="data[PDrawdown]" value="YES" <?php echo $ctData['PDrawdown']=='YES'?'checked="checked"':'' ?>
	  ONCLICK="autoFEE(this.form,'PDRate','PDrawdown')">
	  <?php echo $terfin_20 ;?>		</td><?php if($ctData['PDrawdown']=='YES'){$pdDis = '';}else{$pdDis = 'disabled';}?>
    <td ><span id="sprytextfield6"><INPUT TYPE="text" id="PDRate" NAME="data[PDRate]" value="<?php echo $ctData['PDRate'];?>"<?php echo $pdDis;?>> %
		<span class="textfieldRequiredMsg">Required</span>
	    <span class="textfieldInvalidFormatMsg">Invalid format.</span>
		<span class="textfieldMinValueMsg">Min Value:0 </span>
	</td>
    </tr>



	  </td>
    </tr>
  </table>
    <tr>
      <td><?php if(is_array($ctData) && count($ctData) > 0) {?>
        <input type="hidden" name="act" value="u">
        <input type="hidden" name="data[pid]" value="<?php echo $ctData['pid'];?>">
        <input type="hidden" name="data[fid]" value="<?php echo $ctData['fid'];?>">

        <?php } else {?>
        <input type="hidden" name="act" value="a">
        <input type="hidden" name="data[pid]" value="<?php echo $cpData['id'];?>">
        <input type="hidden" name="data[fid]" value="<?php echo $_REQUEST['cur'];?>_<?php echo $cpData['id'];?>_<?php echo $_REQUEST['fs'];?>">
        <?php } ?>
		<input type="hidden" name="data[RepaymentOption]" value="UI">
        <input type="hidden" name="eid" value="<?php echo $ctData['id'];?>">
        <input type="submit" class='button' name="proceed" id="proceed" value="Save & Proceed"   >
        <?php }?>
      </td>
    </tr>

</form>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
<script type="text/javascript">
	var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "real", {isRequired:true, useCharacterMasking:true, validateOn:["change"], hint:"0.0",maxValue:100});
	var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "real", {isRequired:true, useCharacterMasking:true, validateOn:["change"], hint:"0.0",maxValue:100});
	var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "real", {isRequired:true, useCharacterMasking:true, validateOn:["change"], hint:"0.0",maxValue:100});
	var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "real", {isRequired:true, useCharacterMasking:true, validateOn:["change"], hint:"0.0"});
	var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "real", {isRequired:true, useCharacterMasking:true, validateOn:["change"], hint:"0.0",maxValue:100});
	var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "real", {isRequired:true, useCharacterMasking:true, validateOn:["change"], hint:"0.0",maxValue:100});
</script>
