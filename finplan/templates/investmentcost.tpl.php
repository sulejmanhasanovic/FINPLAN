<?php $pltmenu="block";
include TEMPLATE_PATH."header.tpl.php"?>
<script language="Javascript">


function limitText(frm,limitField,curr,yr,limitNum) {
	var textbox = document.getElementById('Tot_'+curr);
	var textbox1 = document.getElementById(limitField);
	var textbox2 = document.getElementById(curr+'_'+yr+'t');
	if (textbox1.value > 100) {
		textbox1.value =0;

	}else{
		calvalue = 0;
		calvalue = (textbox1.value*1) * (textbox.value*1/100);
		document.getElementById(curr+'_'+yr+'t').innerHTML = calvalue;

	}
}
function limitText2(frm,cperiod,curr) {
	var textbox3 = document.getElementById('Tot_'+curr);

	for (n=1;n<=cperiod;n++){

		 var textbox5 = document.getElementById('data['+curr+'_'+n+']');
		 calvalue = 0;
		 calvalue = (textbox3.value*1) * (textbox5.value*1/100);
		 document.getElementById(curr+'_'+n+'t').innerHTML = calvalue;

	}
}

function check_distribution(currencies,total_years) {
	var submit_flag = true;
  for (var i = 0; i < currencies.length; i++) {
    var sum = 0;
    for (j=1; j<=total_years; j++) {
      var distro = document.getElementById(currencies[i]+'_'+j);
      sum = +sum + +distro.value;
    }
    if (sum != 100 && sum != 0) {
      var distro_text = document.getElementById(currencies[i]+'_'+'distro');
      distro_text.innerHTML = 'Does not add up to 100';
			submit_flag = false;
    }
  }
	return submit_flag;
}
</script>
<body >

<h3><?php echo $invstco_1;?></h3>
Inflation will be applied to investment costs.
<table>
  <tr>
    <th><strong>
      <?php  echo $plnttable_1;?>
      </strong></th>
    <th><?php  echo $plnttable_2;?></th>
    <th><?php  echo $plnttable_3;?></th>
    <th><?php  echo $plnttable_4;?></th>
    <th><?php  echo $plnttable_5;?></th>
  </tr>
  <?php
if(is_array($data) && count($data) > 0){
foreach($data as $row){?>
  <tr>
    <td><?php echo $row['name']?></td>
    <td><?php echo $row['unitSize']?></td>
    <td><?php echo $row['plantType']?></td>
    <td><?php echo $row['Status']?></td>
    <td><a href="?a=e&id=<?php echo $row['id']?>">
      <?php  echo $plnttable_6;?>
      </a> </td>
  </tr>
  <?php
}
}else{
echo "<tr><td colspan='5'>No Records</td></tr>";
}
?>
</table>

<?php 	if(isset($_REQUEST['id'])){?>
<div>
  <form name="plntprdsel" action="investmentcostSave.php" method="post" >
<table border="1"  cellspacing="4" cellpadding="0">


  <tr valign="top">
    <td><table border="0" cellpadding="0" cellspacing="2">
        <tr>
          <th >&nbsp;</th>
        </tr>
        <tr>
          <td><div align="center"><?php echo $invstco_2;?></div></td>
        </tr>
        <tr>
          <th><div align="center"><?php echo $invstco_3;?></div></th>
        </tr>
        <?php
$coYear = $ceData['FOyear']-$ceData['CPeriod'];
for($i=1;$i <= $ceData['CPeriod']; $i++){
	if($ahData['timeOpt'] == 'Q'){
		for($q=1;$q <= 4; $q++){
		 ?>
        <tr>
          <td ><?php echo $i;?>&nbsp;Q<?php echo $q;?></td>
        </tr>
        <?php      }
    }else{
?>
        <tr>
			<td ><?php echo $i;?>:<?php echo $coYear;?></td>

        </tr>
        <?php  $coYear++;
		}
}
?>
      </table></td>
    <?php
$totcurr = count($allChunks);?>
    <input  type="hidden"  size="3"  name="totcurr" id="totcurr" value="<?php echo $totcurr;?>">
    <?php

for($i = 0; $i < count($allChunks); $i++){

	$finfval = 'Tot_'.$allChunks[$i];
	?>
    <td valign="top"><table border="0" cellpadding="0" cellspacing="2">
        <tr>
          <th ><?php echo Config2::getData('currencies',$allChunks[$i]);?>&nbsp;(Million)</th>
        </tr>
        <tr>
          <td ><div align="center">
			<span id="sprytextfield<?php echo $finfval;?>">
              <input type="text" size="15" id='<?php echo $finfval;?>' name="data[<?php echo $finfval;?>]" value="<?php echo $cfData[$finfval];?>"
			  onKeyDown="limitText2(this.form,'<?php echo $ceData['CPeriod'];?>','<?php echo $allChunks[$i];?>');"
			  onKeyUp="limitText2(this.form,'<?php echo $ceData['CPeriod'];?>','<?php echo $allChunks[$i];?>');" >
			   <span class="textfieldRequiredMsg">Required</span>
			   <span class="textfieldInvalidFormatMsg">Invalid format.</span>
			   <span class="textfieldMinValueMsg">Min Value:0 </span>
			   </span>
            </div></td>
        </tr>
	<script type="text/javascript">
	var sprytextfield<?php echo $finfval;?> = new Spry.Widget.ValidationTextField("sprytextfield<?php echo $finfval;?>", "real", {useCharacterMasking:true, validateOn:["change"], minValue:0.0});
	</script>
        <tr>
          <th><div align="center"><?php echo $invstco_4;?></div></th>
        </tr>
        <?php

		for($m=1;$m <= $ceData['CPeriod']; $m++){
			if($ahData['timeOpt'] == 'Q'){
				for($q=1;$q <= 4; $q++){
					 $infval = $allChunks[$i].'_'.$m.'Q'.$q;
		?>
        <tr >
          <td ><input type="text" size="15"  id="<?php echo $infval;?>"
		  name="data[<?php echo $infval;?>]" value="<?php echo $cfData[$infval];?>"></td>

         </tr>
		<?php }}else{

		 $infval = $allChunks[$i].'_'.$m;?>

		<tr >
          <td >
		  <span id="sprytextfield<?php echo $infval;?>">
		  <input type="text" size="15"  id="<?php echo $infval;?>"
		  name="data[<?php echo$infval;?>]" value="<?php echo $cfData[$infval];?>" onKeyDown="limitText(this.form,'<?php echo $infval; ?>','<?php echo $allChunks[$i];?>',<?php echo $m;?>,3);" onKeyUp="limitText(this.form,'<?php echo $infval; ?>','<?php echo $allChunks[$i];?>',<?php echo $m;?>,3);">
			<span class="textfieldRequiredMsg">Required</span>
			<span class="textfieldInvalidFormatMsg">Invalid format.</span>
			<span class="textfieldMaxValueMsg">Max Value:100 </span>
			</span>
			<?php
			/*
		  <span id="<?php echo $infval;?>t"></span></td>
			*/
			?>
		</tr>
	<script type="text/javascript">
	var sprytextfield<?php echo $infval;?> = new Spry.Widget.ValidationTextField("sprytextfield<?php echo $infval;?>", "real", {isRequired:false, useCharacterMasking:true, validateOn:["change"], maxValue:100});
	</script>
        <?php }}

?>
      </table><div id="<?php echo $allChunks[$i].'_distro'; ?>"></div></td>
    <?php
 }
?>

  </tr>
</table></div>
<?php if(is_array($cfData) && count($cfData) > 0) {?>
<input type="hidden" name="act" value="u">
<input type="hidden" name="data[pid]" value="<?php echo $cfData['pid'];?>">
<?php } else {?>
<input type="hidden" name="act" value="a">
<input type="hidden" name="data[pid]" value="<?php echo $ceData['id'];?>">
<?php } ?>
<input type="hidden" name="eid" value="<?php echo $cfData['id'];?>">
<input type="submit" class="button" name="proceed" id="proceed" value="Save & Proceed" onClick='return check_distribution(<?php echo json_encode($allChunks).','.$ceData['CPeriod']; ?>);' >
<?php }?>
</td>
</tr>
</table>

</form>
<?php include TEMPLATE_PATH."footer.tpl.php"?>
