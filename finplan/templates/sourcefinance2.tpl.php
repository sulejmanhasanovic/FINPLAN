<?php $pltmenu="block";
include TEMPLATE_PATH."header.tpl.php"?>
<script language="Javascript">

function autofin(frm,rid,rrid)
{
var textbox = document.getElementById('totfinc');
var totbox = document.getElementById('tot'+rid);
var text3box = document.getElementById(rrid);
var end = textbox.value
total = 0;
for (n=1;n<=end;n++){
var textbox2 = document.getElementById(rid+'_'+n);
total = ((total*1) + (textbox2.value*1));
}
if (total >100)
{
alert("Total percentage cannot exceed 100");
text3box.value = 0;

}

}

function autochk(frm,fid,cperiod,fcount)
{
var textbox = document.getElementById(fid);
for (p=1;p<=cperiod;p++){
	var textbox1 = document.getElementById(p+'_'+fcount);
	if(textbox.checked==true){
		textbox1.disabled = false;
	}else{
		textbox1.disabled = true;
	}
}


}
</script>
<body >
<?php
$cuName = Config2::getData('currencies',$_REQUEST['cur']);?>
<h3><?php echo $Scefin_1;?><?php echo $cuName;?></h3>
<table>
  <tr>
    <th><strong><?php echo $Scefin_2;?></strong></th>
    <th><?php echo $Scefin_3;?></th>
    <th><?php echo $Scefin_4;?></th>
  </tr>
  <?php
if(is_array($data) && count($data) > 0){
	foreach($data as $row){
		$plntid=$row['pid'];
		$cptData = $apd->getById($plntid);
		$totalcurrency = 'Tot_'.$_REQUEST['cur'];
?>
  <tr>
    <td><?php echo $cptData['name']?></td>
    <td><?php echo $row[$totalcurrency]?></td>
    <td><a href="sourcefinance2.php?a=e&id=<?php echo $row['id']?>&pid=<?php echo $cptData['id']?>&cur=<?php echo $_REQUEST['cur'];?>"> <?php echo $Scefin_5;?></a> </td>
  </tr>
  <?php
	}
}else{
	echo "<tr><td colspan='4'>No Records</td></tr>";
}
?>
</table>
<?php
if(isset($_REQUEST['id'])){
if(is_array($cfData) && count($cfData) > 0) {?>


	<!--<a href="?a=d&id=<?php echo $cfData['id']?>&cur=<?php echo $_REQUEST['cur'];?>" onclick="return confirm('Are you sure you want to delete?');"><?php echo $del_opt2;?>	</a>
	--><?php
																							    }?><div align="right"><h3>% Distribution</h3></div> <?php if($_REQUEST['cur'] != $baseCurr){?> *Select Finance Source to Enter Percentage <?php }?>
<div>
<table border="1"  cellspacing="1" cellpadding="0">
  <form name="plntprdsel" action="sourcefinanceSave2.php" method="post" >

  <tr >
    <td><table border="1" cellpadding="0" cellspacing="0">
        <tr>
          <th><div align="center"><?php echo $Scefin_6;?></div></th>
          <th><?php echo $Scefin_7;?></th>
        </tr>
        <?php
$coYear = $cpData['FOyear']-$cpData['CPeriod'];
for($i=1;$i <= $cpData['CPeriod']; $i++){

	$infval = 'Tot_'.$_REQUEST['cur'];
	$perval = $_REQUEST['cur'].'_'.$i;
	$perc = $ciData[$perval];
	$totcost = $ciData[$infval];
	$tot = $perc * $totcost/100 ;
	$infindx = $_REQUEST['cur'].'_'.$coYear;
	$inflindxval = $caiData[$infindx];
	if(!$inflindxval){
	$errmsg = "<h3>Please fill Inflation Data !</h3>";
	}
	//	$currtot = $tot * $inflindxval;
	$currtot = $tot;
	?>
        <tr>
          <td ><b><?php echo $i;?>:<?php echo $coYear;?></b></td>
          <td ><input type="text" readonly disabled size="10"  id="tot<?php echo $i;?>" name="tot<?php echo $i;?>"
					value="<?php echo round($currtot,2);?>">
          </td>
        </tr>
        <?php $coYear++;
}
?>
      </table></td>
    <?php
		$fincount = 0;
		foreach($financeSources as $financesource){
			if($_REQUEST['cur'] == $baseCurr and $financesource['type'] =='C'){

					$fincount ++;
					$countlabel = strlen($financesource['value']);
					$tablewidth = $countlabel * 35;

					?>
					<td valign="top"><table border="1" cellpadding="0" cellspacing="0">
					<tr >
					<th><input type="checkBox" id="<?php echo $financesource['id'];?>" name="data[<?php echo $financesource['id'];?>]" value="YES" <?php echo $cfData[$financesource['id']]=='YES'?'checked="checked"':'' ?> OnClick="autochk(this.form,'<?php echo $financesource['id'];?>','<?php echo$cpData['CPeriod'];?>','<?php echo$fincount;?>')">
					<?php echo $financesource['value'];?> </th>
					</tr>
					<div >

					<?php
					if($cfData[$financesource['id']]=='YES'){
						$StateDis = '';
					}else{
						$StateDis = 'disabled';
					}

					for($i=1;$i <= $cpData['CPeriod']; $i++){
						$finfval = $financesource['id'].'_'.$i;
					?>
					<tr id="<?php echo $financesource['id'];?>" style="display:">
					<td><input type="text" size="10" id="<?php echo $i;?>_<?php  echo $fincount;?>" 	name="data[<?php echo $finfval;?>]"
					OnChange="autofin(this.form,<?php echo $i;?>,'<?php echo $i;?>_<?php  echo$fincount;?>')" value="<?php echo $cfData[$finfval];?>" <?php echo $StateDis;?>></td>
					</tr>
					<?php	 }
					?>
				</table></td>
    <?php
			}else{
				if($_REQUEST['cur'] != $baseCurr ){

					$fincount ++;
					$countlabel = strlen($financesource['value']);
					if($financesource['type'] =='C'){
						$tablewidth = $countlabel * 16;
					}else{
						$tablewidth = $countlabel * 11;}

					if($cfData[$financesource['id']]=='YES'){
						$StateDis = '';
					}else{
						$StateDis = 'disabled';
					}
					?>
					<td valign="top"><table border="1" cellpadding="0" cellspacing="0">
					<tr >
					<th><input type="checkBox"  id="<?php echo $financesource['id'];?>" name="data[<?php echo $financesource['id'];?>]" value="YES" <?php echo $cfData[$financesource['id']]=='YES'?'checked="checked"':'' ?> OnClick="autochk(this.form,'<?php echo $financesource['id'];?>','<?php echo$cpData['CPeriod'];?>','<?php echo$fincount;?>')" value="<?php echo $cfData[$finfval];?>" >
					<?php
						if ($financesource['value'] == 'ExportCredit1') {
							echo 'Export Credit 1';
						} elseif ($financesource['value'] == 'ExportCredit2') {
							echo 'Export Credit 2';
						} else {
							echo $financesource['value'];
						}
					?>
					</th>
					</tr>
					<div >

					<?php	for($i=1;$i <= $cpData['CPeriod']; $i++){
							$finfval = $financesource['id'].'_'.$i;
					?>
					<tr id="<?php echo $financesource['id'];?>" style="display:">
					<td><input type="text" size="10" id="<?php echo $i;?>_<?php  echo $fincount;?>" 	name="data[<?php echo $finfval;?>]"
					OnChange="autofin(this.form,<?php echo $i;?>,'<?php echo $i;?>_<?php  echo$fincount;?>')" value="<?php echo $cfData[$finfval];?>" <?php echo $StateDis;?>>%</td>
					</tr>
					<?php	 }
					?>
					</table></td>

    <?php  		}
			}
		}
		echo $errmsg;
	?>
    </td>
  </tr>
</table></div>
<input  type="hidden"  name="totfinc" id="totfinc" value="<?php echo $fincount;?>">
<input type="hidden" name="nme" value="<?php echo $_REQUEST['cur']?>">
<?php if(is_array($cfData) && count($cfData) > 0) {?>
<input type="hidden" name="act" value="u">
<input type="hidden" name="data[pid]" value="<?php echo $cfData['pid'];?>">
<input type="hidden" name="data[fid]" value="<?php echo $cfData['fid'];?>">
<input type="hidden" name="data[cid]" value="<?php echo $cfData['cid'];?>">
<?php } else {?>
<input type="hidden" name="act" value="a">
<input type="hidden" name="data[pid]" value="<?php echo $cpData['id'];?>">
<input type="hidden" name="data[fid]" value="<?php echo $_REQUEST['cur'];?>_<?php echo $cpData['id'];?>">
<input type="hidden" name="data[cid]" value="<?php echo $_REQUEST['cur'];?>">
<?php } ?>
<input type="hidden" name="currid" value="<?php echo $_REQUEST['cur'];?>">
<input type="hidden" name="eid" value="<?php echo $cfData['id'];?>">
<input type="submit" class='button' name="proceed" id="proceed" value="Save & Proceed"   >
</form>
<?php }?>
<?php include TEMPLATE_PATH."footer.tpl.php"?>
