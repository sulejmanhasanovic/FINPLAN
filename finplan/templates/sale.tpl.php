<?php $defmenu="block";
include TEMPLATE_PATH."header.tpl.php"?>
<script language="Javascript">

function autosale(frm,start,end,box,text_caption)
{
 var textbox1 = document.getElementById('PriceFixed');
 var textbox2 = document.getElementById('AmountFixed');
 var price_caption = document.getElementById('price_caption');

  for (n=start;n<=end;n++)
	{
		var textbox3 = document.getElementById('Amt_'+n);
		var textbox4 = document.getElementById('Pri_'+n);

		 if (box=='FD')
		{
		 textbox2.disabled = false;
		 textbox3.disabled = true;
		 textbox3.style.backgroundColor = '#D8D8D8';
		 textbox2.style.backgroundColor = '';

		}
		if (box=='YR')
		{
		 textbox3.disabled = false;
		 textbox2.disabled = true;
		 textbox3.style.backgroundColor = '';
		 textbox2.style.backgroundColor = '#D8D8D8';
		}
		if (box=='YC')
		{
		 textbox4.disabled = false;
		 textbox1.disabled = true;
		 textbox4.style.backgroundColor = '';
		 textbox1.style.backgroundColor = '#D8D8D8';
     price_caption.innerHTML = text_caption;
		}
		if (box=='CP')
		{
		 textbox4.disabled = false;
		 textbox1.disabled = true;
		 textbox4.style.backgroundColor = '';
		 textbox1.style.backgroundColor = '#D8D8D8';
     price_caption.innerHTML = text_caption;
		}
		if (box=='SC')
		{
		 textbox1.disabled = false;
		 textbox4.disabled = true;
		 textbox1.style.backgroundColor = '';
		 textbox4.style.backgroundColor = '#D8D8D8';
     price_caption.innerHTML = text_caption;
		}

	}
}
function autounit()
{
 var shortcut = document.sale
var descriptions=new Array()

//extend this list if neccessary to accomodate more selections
descriptions[0]="Per kWh"
descriptions[1]="Per GJ"
descriptions[2]="Per Cubic Meter"
descriptions[3]="Per Ton"

shortcut.sunit.value=descriptions[shortcut.dataName.selectedIndex]

function gothere(){
location=shortcut.dataName.options[shortcut.dataName.selectedIndex].value
}

function showtext(){
shortcut.sunit.value=descriptions[shortcut.dataName.selectedIndex]
}
//shortcut.sunit.style.backgroundColor = '#D8D8D8';
 }


//-->
</script>
</head>
<body>
<h3><?php echo $sale_1;?></h3>
A value entered for one year will also be applicable for subsequent years, until a new value is entered for a future year.
<table>
  <tr>
    <th><strong><?php echo $sale_2;?></strong></th>
   <!-- <th><?php echo $sale_3;?></th>-->
    <th><?php echo $sale_4;?></th>
    <th><?php echo $sale_5;?></th>
  </tr>
<?php
	if(is_array($Data) && count($Data) > 0){
		foreach($Data as $row){
		$prodName = Config2::getData('producttype',$row['Name']);
		?>
  <tr>
    <td><?php echo $prodName;?></td>
    <td><?php echo $row['ClientName']?></td>
    <td><a href="?a=e&id=<?php echo $row['id']?>"><?php echo $sale_6;?></a> &nbsp;/ <a href="?a=d&id=<?php echo $row['id']?>" onclick="return confirm('Are you sure you want to delete?');"><?php echo $del_opt;?></a></td>
  </tr>
  <?php
		}
	}else{
		echo "<tr><td colspan='4'>No Records</td></tr>";
	}
							?>
</table>
<tr>
  <td><a href="sale.php?e=a"><?php echo $sale_7;?></a> </td>
</tr>
<?php if($_REQUEST['a']=='e' or $_REQUEST['e']=='a'){?>
<form method="post" name="sale" action="saleSave.php">
  <table width="650" align="center" border="0" cellpadding="2" cellspacing="0" bgcolor="white">
    <tr valign="top">
      <td><table width="100%" border="0" cellpadding="4" cellspacing="0">
          <tr>
            <th colspan="2" scope="col"><div align="center"></div></th>
          </tr>
          <tr>
            <td ><div align="right">
              <?php echo $sale_8;?></td>
            <td ><div align="left">
                <select name="data[Name]" id="dataName" ONCHANGE="autounit()">
                  <?php
foreach($productTypes as $productType){?>
                  <option value="<?php echo $productType['id']?>" <?php echo $spData['Name']== $productType['id']?'selected="selected"':'' ?> >
				  <?php echo $productType['value']?>&nbsp;(<?php echo $productType['unit']?>)</option>
                  <?php
}
?>
                </select>
              </div></td>
          </tr>
          <tr>
            <td ><div align="right">
             <?php echo $sale_12;?></td>
            <td ><div align="left">
              <span id="sprytextfield4">
                <input type="text" size="50" name="data[ClientName]" value="<?php echo $spData['ClientName'];?>">
                <span class="textfieldRequiredMsg">Required</span>
                <span class="textfieldInvalidFormatMsg">Invalid format.</span>
              </span></td>
          </tr>
          <tr>
            <td ><div align="right">
              <?php echo $sale_13;?></td>
            <td ><div align="left">
                <select name="data[TradeCurrency]">
                  <option value="<?php echo $baseCurr;?>"
<?php echo $spData['TradeCurrency']== $baseCurr?'selected="selected"':'' ?>><?php echo $baseCname;?></option>
                  <?php
for($i = 0; $i < count($CurChunks); $i++){
?>
                  <option value="<?php echo $CurChunks[$i]?>"
<?php echo $spData['TradeCurrency']== $CurChunks[$i]?'selected="selected"':'' ?>><?php echo Config2::getData('currencies',$CurChunks[$i]);?></option>
                  <?php
}
?>
                </select>
              </div></td>
          </tr>
<?php

	 if($spData['Amount']=='FD'){
			$YearlyAmtDis = 'disabled';
			$FixedAmtDis = '';
		}else{
			$FixedAmtDis = 'disabled';
			$YearlyAmtDis = '';
		}

?>
          <tr>
            <td ><div align="right">
             <?php echo $sale_14;?></td>

            <td >
              <div id="quantity_yr">
              <INPUT TYPE="Radio" NAME="data[Amount]" id="radio_yr" value="YR" <?php echo $spData['Amount']=='YR' || !$spData['Amount'] ?'checked="checked"':'' ?>
			ONCLICK="autosale(this.form,<?php echo $ahData['startYear'];?>,<?php echo $ahData['endYear'];?>,'YR','')"><?php echo $sale_16;?>&nbsp;
              <INPUT TYPE="Radio" NAME="data[Amount]" id="radio_fd" value="FD" <?php echo $spData['Amount']=='FD'?'checked="checked"':'' ?>
			  ONCLICK="autosale(this.form,<?php echo $ahData['startYear'];?>,<?php echo $ahData['endYear'];?>,'FD','')">
              <?php echo $sale_15;?>&nbsp;
              <input type="text" size="10" id="AmountFixed" name="data[AmountFixed]" value="<?php echo $spData['AmountFixed'];?>" <?php echo $FixedAmtDis;?>>
              </div>
            </td>
          </tr>

          <tr>
            <td ><div align="right">
              <?php echo $sale_17;?></td>
            <td ><span id="sprytextfield2">
              <input  type="text" size="10" name="data[PriceBase]" value="<?php echo $spData['PriceBase'];?>">&nbsp;
			  <?php
        //@todo use constants, couldn't find anywhere 'E', 'W', 'H', 'C'
        $sunitArray = array(
          'E'     =>  'Per kWh',
          'H'     =>  'Per GJ',
          'W'     =>  'Per Cubic Meter',
          'C'     =>  'Per Ton'
        );
        $sunitdata = array_key_exists($spData['Name'], $sunitArray) ? $sunitArray[$spData['Name']] : 'Per kWh';
			  ?>
			  <input  type="text" size="20" name="data[sunit]" id="sunit" value="<?php echo $sunitdata;?>" disabled>
              <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
          </tr>
		   <tr>
            <th colspan=2><div align="center"><?php echo $sale_25;?></div</th>
          </tr>
		<?php if($spData['Price']=='SC'){
			$yearlydis = 'disabled';
			$steadydis = '';
		}elseif($spData['Price']=='YC'){
			$steadydis = 'disabled';
			$yearlydis = '';
		}elseif($spData['Price']=='CP'){
			$steadydis = 'disabled';
			$yearlydis = '';
		}

    $tradeCurrency = Config2::getData('currencies',$spData['TradeCurrency']);
    if (!$tradeCurrency) $tradeCurrency = $baseCname;

    ?>
		    <tr>
            <td ><div align="right"><INPUT TYPE="Radio" NAME="data[Price]" id="Price" value="CP" <?php echo $spData['Price']=='CP'?'checked="checked"':'' ?>
			ONCLICK="autosale(this.form,<?php echo $ahData['startYear'];?>,<?php echo $ahData['endYear'];?>,'CP','<?php echo $sale_20.' ('.$tradeCurrency.' '.$sunitdata.')'; ?>')" >
			</td><td ><div align="left">
              <?php echo $sale_20;?><a style="text-decoration: none" title="Press 'Save' to Update Units">*</a></td></tr>
          <tr>
            <td ><div align="right"><INPUT TYPE="Radio" NAME="data[Price]" id="Price" value="YC" <?php echo $spData['Price']=='YC'?'checked="checked"':'' ?>
			ONCLICK="autosale(this.form,<?php echo $ahData['startYear'];?>,<?php echo $ahData['endYear'];?>,'YC','<?php echo $sale_18; ?>')" >
			</td><td ><div align="left">
              <?php echo $sale_18;?></td></tr>
		<tr>
            <td><div align="right"><INPUT TYPE="Radio" NAME="data[Price]" id="Price" value="SC" <?php echo $spData['Price']=='SC' || !$spData['Price'] ?'checked="checked"':'' ?>
			ONCLICK="autosale(this.form,<?php echo $ahData['startYear'];?>,<?php echo $ahData['endYear'];?>,'SC','<?php echo $sale_19; ?> (%)')" ></td>
			  <td ><div align="left">

              <?php echo $sale_19;?>&nbsp;
			  <span id="sprytextfield3">
              <input type="text" size="5" id="PriceFixed" name="data[PriceFixed]"  value="<?php echo $spData['PriceFixed'] ? $spData['PriceFixed'] : 0;?>" <?php echo $steadydis;?>> (%)
			  <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>
            </td>

          </tr>
        </table></td>
    </tr>
    <tr>
      <td class="bodyText">&nbsp;
        <table width="100%" border="1"  cellspacing="0" cellpadding="0">
          <tr>
            <th ><?php echo $sale_22;?></th>
            <th ><?php echo $sale_23;?></th>
            <th >
              <div id="price_caption">
                <?php
                  if ($spData['Price']=='CP') {
                    echo $sale_20.' ('.$tradeCurrency.' '.$sunitdata.')';
                  } elseif ($spData['Price']=='YC') {
                    echo $sale_18;
                  } else {
                    echo $sale_19.' (%)';
                  }
                 ?>
              </div>
            </th>
          </tr>
          <?php
for($i=$ahData['startYear'];$i <= $ahData['endYear']; $i++){

	$ay = 'Amt_'.$i;
	$py = 'Pri_'.$i;
	?>
	<tr >
	<td ><?php echo $i;?></td>
	<td><input  type="text" size="10" id="<?php echo $ay;?>" name="data[Amt_<?php echo $i;?>]"  value="<?php echo $spData[$ay];?>" <?php echo $YearlyAmtDis;?>></td>
	<td><input  type="text" size="10" id="<?php echo $py;?>" name="data[Pri_<?php echo $i;?>]"  value="<?php echo $spData[$py];?>" <?php echo $yearlydis;?>></td>
	</tr>
	<?php
} ?>
        </table></td>
    </tr>
    <?php if(is_array($spData) && count($spData) > 0) {?>
    <input type="hidden" name="act" value="u">
    <input type="hidden" name="did" value="<?php echo $spData['id'];?>">
    <?php } else {?>
    <input type="hidden" name="act" value="a">
    <?php } ?>
    <tr>
      <td><input type="submit" class='button' name="proceed" id="proceed" value="Save & Proceed" >
      </td>
    </tr>
  </table>
</form>
<?php }?>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "real", {useCharacterMasking:true, validateOn:["change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "real", {useCharacterMasking:true, validateOn:["change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "xmlCharacter", {useCharacterMasking:true, validateOn:["change"]});
//-->
</script>
