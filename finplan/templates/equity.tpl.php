<?php $pfamenu="block";
include TEMPLATE_PATH."header.tpl.php"?>
<script language="Javascript">
function autofill(frm,start,end,box,cur)
{
	var textbox1 = document.getElementById(box+cur);
	if(textbox1.value =='Autofill')
		{
		textbox1.value ='Refresh'
		var textbox2 = document.getElementById('data['+box +cur+'_'+start+']');
		if(textbox2.value =='')
			{
			var textbox4 = 0 ;
		}else{
			var textbox4 = textbox2.value;
			}
		for (n=start;n<=end;n++)
		{
			var textbox3 = document.getElementById('data['+box +cur+'_'+n+']');
			//alert('data['+box +cur + '_ '+n +']');
			 if(textbox3.value =='')
				{
				textbox3.value = textbox4 ;
				}
			var textbox4 = 	textbox3.value;
		}
	}else{
		textbox1.value ='Autofill'
		for (n=start;n<=end;n++)
		{
			var textbox3 = document.getElementById('data['+box +cur+'_'+n+']');
			//alert('data['+box +cur + '_ '+n +']');
			textbox3.value = '' ;

		}
	}
}

function validate()
{
    var startyear = <?php echo $ahData['startYear']; ?>;
    var endyear = <?php echo $ahData['endYear']; ?>;
    var curncies = new Array();

    <?php
    for ($c = 0; $c < count($baseChunks); ++$c)
      echo "curncies[$c] = '".$baseChunks[$c]."';\n";
    ?>

    for (var c = 0; c < curncies.length; ++c) {
	var curncy = curncies[c];
	var eqty = +document.getElementById('IE_' + curncy).value;
	var eqty_rtnd = 0;
	for (var y = startyear; y <= endyear; ++y) {
	    eqty += +document.getElementById('data[E_' + curncy + '_' + y + ']').value;
	    var rtnd_el = document.getElementById('data[ER_' + curncy + '_' + y + ']');
	    eqty_rtnd += +rtnd_el.value;
	    if (eqty_rtnd > eqty){
		rtnd_el.style.backgroundColor = "red";
		return false;
	    }
	}
    }
    return true;
}

</script>
</head>

<body>
<h3><?php echo $equ_1;?></h3>
<div style="width:1100px;  overflow:auto;">
 <form method="post" name="curtypeinf" action="equitySave.php" onsubmit="return validate()">
<table width="" border="1"  cellspacing="4" cellpadding="0">
   <tr valign="top">
    <td valign="top">
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <th >&nbsp;</th>
        </tr>
        <tr>
          <td ><?php echo $equ_2;?></td>
        </tr>
        <tr>
           <td><?php echo $equ_3;?></td>
        </tr>
		<tr>
           <th ><?php echo $equ_4;?></th>
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

for($i = 0; $i < count($baseChunks); $i++){

?>
    <td valign="top">
      <table border="0" width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <th colspan="2"><?php echo Config2::getData('currencies',$baseChunks[$i]);?>(Million)</th>
        </tr>
<?php
		$divval = 'DR_'.$baseChunks[$i];
?>      <tr>
          <td>
		  <span id="sprytextfield<?php echo $divval;?>">
		  <input type="text" size="3"  id="<?php echo $divval;?>" name="data[<?php echo $divval;?>]" value="<?php echo $ctData[$divval];?>">%
		   <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>
		   </td>
		   <td></td>
        </tr>
		 <script type="text/javascript">
			var sprytextfield<?php echo $divval;?> = new Spry.Widget.ValidationTextField("sprytextfield<?php echo $divval;?>", "real", {useCharacterMasking:true, validateOn:["change"], hint:"0.0", minValue:0.0});
		</script>

<?php  	$inival = 'IE_'.$baseChunks[$i]; ?>
		<tr>
          <td>
		<span id="sprytextfield<?php echo $inival;?>">
            <input name="data[<?php echo $inival;?>]" id="<?php echo $inival;?>" type="text" size="3" value="<?php echo $aaData['Equity'];?>" readonly disabled>
			 <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>
			 </td>
        </td><td></td>
        </tr>
         <script type="text/javascript">
			var sprytextfield<?php echo $inival;?> = new Spry.Widget.ValidationTextField("sprytextfield<?php echo $inival;?>", "real", {useCharacterMasking:true, validateOn:["change"], hint:"0.0", minValue:0.0});
		</script>
        <tr>
          <th>
            <?php echo $equ_5;?> &nbsp; </th><th>
            <?php echo $equ_6;?> &nbsp; </th>
        </tr>
        <?php

for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){

if($ahData['timeOpt'] == 'Q'){

for($q=1;$q <= 4; $q++){
	$equval = 'E_'.$baseChunks[$i].'_'.$m.'_Q_'.$q;
	$equretval = 'ER_'.$baseChunks[$i].'_'.$m.'_Q_'.$q;
?>
        <tr>
			<td><input type="text" size="3"  id="data[<?php echo $equval;?>]" name="data[<?php echo $equval;?>]" value="<?php echo $ctData[$equval];?>"></td>
			<td><input type="text" size="3"  id="data[<?php echo $equretval;?>]" name="data[<?php echo $equretval;?>]" value="<?php echo $ctData[$equretval];?>"></td>
        </tr>
        <?php }}else{
	$equval = 'E_'.$baseChunks[$i].'_'.$m;
	$equretval = 'ER_'.$baseChunks[$i].'_'.$m;
?>
        <tr>
			<td><input type="text" size="3"  id="data[<?php echo $equval;?>]" name="data[<?php echo $equval;?>]" value="<?php echo $ctData[$equval];?>"></td>
			<td><input type="text" size="3"  id="data[<?php echo $equretval;?>]" name="data[<?php echo $equretval;?>]" value="<?php echo $ctData[$equretval];?>"></td>
        </tr>
        <?php	}
} ?>

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
