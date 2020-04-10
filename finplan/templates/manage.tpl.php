<?php $pltmenu="block";
include TEMPLATE_PATH."header.tpl.php"?>

<body onLoad="opt.init(document.forms[0])">
<h3><?php echo $mange_1;?></h3>

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
    <td><a href="?a=e&id=<?php echo $row['id']?>">Edit</a> / <a href="?a=d&id=<?php echo $row['id']?>" onclick="return confirm('Are you sure you want to delete? This will delete all data related to this plant.');"><?php echo $del_opt;?></a>  </td>
  </tr>
  <?php
}
}else{
echo "<tr><td colspan='5'>No Records</td></tr>";
}
?>
</table>
<tr>
  <td><a href="manage.php?e=a"><?php echo $sale_7;?></a> </td>
</tr>
<?php if($_REQUEST['a']=='e' or $_REQUEST['e']=='a'){?>
<h3><?php echo $mange_2;?> </h3>
<form name="frmNewCaseStudy"  method="post" >
  <table width="100%" border="1" cellspacing="0" cellpadding="4">
  <tr><td>
  <table width="100%" border="1" cellspacing="0" cellpadding="4">

    <tr>
      <td nowrap ><div align="right" ><?php echo $mange_3;?>&nbsp;&nbsp;</div></td>
      <td ><span id="sprytextfield1">
        <input style="width: 320px;" name="data[name]" type="text" class="selectValidState" id="StudyName2" value="<?php echo $ahData['name'] ?>" size="50" >
        <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
    </tr>
    <tr>
      <td ><div align="right" ><?php echo $mange_4;?>&nbsp;&nbsp;</div></td>
      <td ><span id="FPEndYear">
        <select name="data[plantType]">
          <?php
						  	foreach($plantTypes as $plantType){?>
          <option value="<?php echo $plantType['value']?>"
								<?php echo $ahData['plantType']== $plantType['value']?'selected="selected"':'' ?>> <?php echo $plantType['value']?></option>
          <?php
							}
						  ?>
        </select>
        </span></td>
    </tr>
    <tr>
      <td ><div align="right" ><?php echo $mange_5;?>&nbsp;&nbsp;</div></td>
      <td ><span id="FPStatus">
        <select name="data[Status]" id="plant_status">
          <option value="Existing"
								<?php echo $ahData['Status']== 'Existing'?'selected="selected"':'' ?>> <?php echo $mange_12;?></option>
          <option value="Committed"
								<?php echo $ahData['Status']== 'Committed'?'selected="selected"':'' ?>> <?php echo $mange_13;?></option>
          <option value="Future"
								<?php echo $ahData['Status']== 'Future'?'selected="selected"':'' ?>> <?php echo $mange_14;?></option>
        </select>
        </span></td>
    </tr>
    <tr>
      <td ><div align="right" ><?php echo $mange_6;?>&nbsp;&nbsp;</div></td>
      <td ><span id="FPOwnership">
        <select name="data[Ownership]">
          <option value="Utility"
								<?php echo $ahData['Ownership']== 'Utility'?'selected="selected"':'' ?>> <?php echo $mange_15;?></option>
          <option value="IPP"
								<?php echo $ahData['Ownership']== 'IPP'?'selected="selected"':'' ?>> <?php echo $mange_16;?></option>
        </select>
        </span></td>
    </tr>
    <tr>
      <td ><div align="right" ><?php echo $mange_7;?>&nbsp;&nbsp;</div></td>
      <td ><div align="left"><span id="FPNote" ><span id="sprytextfield2">
          <input style="width: 50px;" name="data[unitSize]" type="text" class="selectValidState"
									id="StudyName" value="<?php echo $ahData['unitSize'] ?>" size="10" >
          <span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldRequiredMsg">Required</span>
		  <span class="textfieldMinCharsMsg"></span>
		  <span class="textfieldMinValueMsg">Minimum Required</span></span><?php echo $mange_17;?> </span></div></td>
    </tr>
    <tr>
      <td ><div align="right" ><?php echo $mange_8;?>&nbsp;&nbsp;</div></td>
      <td ><span id="FPFOyear"><span id="sprytextfield3">
        <input name="data[FOyear]" type="text" id="FOyear" size="5" value="<?php echo $ahData['FOyear'] ?>" <?php echo $fostatus; ?> >
        <span class="textfieldRequiredMsg">Required</span>
        <span class="textfieldInvalidFormatMsg">Invalid format.</span>
    		<span class="textfieldMinCharsMsg">YYYY Format</span>
    		<span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.</span></span></td>
    </tr>
    <tr>
      <td ><div align="right" ><?php echo $mange_9;?>&nbsp;&nbsp;</div></td>
      <td ><span id="FPCPeriod"><span id="sprytextfield4">
        <input name="data[CPeriod]" type="text" id="CPeriod" size="10"
									value="<?php echo $ahData['CPeriod'] ?>">
        <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span>
      </td>
    </tr>
    <tr>
      <td ><div align="right" ><?php echo $mange_10;?>&nbsp;&nbsp;</div></td>
      <td ><span id="FPPlantlife"><span id="sprytextfield5">
        <input name="data[Plantlife]" type="text" id="Plantlife" size="10"
									value="<?php echo $ahData['Plantlife'] ?>">
        <span class="textfieldRequiredMsg">Required</span><span class="textfieldInvalidFormatMsg">Invalid format.</span>
		<span class="textfieldMinCharsMsg">Minimum number of characters not met.</span>
		<span class="textfieldMinValueMsg">Minimum Required</span></span></td>
    </tr>
  </table>
  </td></tr>
  <tr>
    <td class="bodyText"><div align="center"><b><?php echo $mange_11;?></B></div>
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
		 <span id="sprytextfield6">
		  <input type="hidden" name="data[CurTypeSel]" id="data[CurTypeSel]" value="">
		   <span class="textfieldRequiredMsg">* Product Type is Required</span></span>
        <tr>
          <td><div align="center">
              <select style="width: 130px;" name="AllCur" id="AllCur" size="10" multiple="multiple" onDblClick="opt.transferRight()">
                <?php
						  	foreach($productTypes as $productType){?>
                <option value="<?php echo $productType['id']?>"><?php echo $productType['value']?></option>
                <?php
							}
						  ?>
              </select>
            </div></td>
          <td><div align="center">
              <INPUT TYPE="button" class='button' NAME="right" VALUE="Add &gt;&gt;" ONCLICK="opt.transferRight()"
					style="width: 110px;" class='fp_button'>
              <BR>
              <BR>
              <INPUT TYPE="button" class='button' NAME="left" VALUE="Remove &lt;&lt;" ONCLICK="opt.transferLeft()"
					  style="width: 110px;" class='fp_button'>
              <BR>
              <BR>
              <INPUT TYPE="button"  class='button' NAME="left" VALUE="Remove All" ONCLICK="opt.transferAllLeft()"
					  style="width: 110px;" class='fp_button'>
            </div></td>
          <td><div align="center">
              <?php $CurTypeSel = $ahData['CurTypeSel'] ;
				        $CurChunks = explode(",", $CurTypeSel);	?>
              <select style="width: 130px;" name="CurSel" id="CurSel" size="10" multiple="multiple">
                <?php

for($i = 0; $i < count($CurChunks); $i++){

	foreach($productTypes as $productType) {
	if ($productType['id'] == $CurChunks[$i]) {?>
                <option value="<?php echo $productType['id']?>"><?php echo $productType['value']?></option>
                <?php } } }?>
              </select>
            </div></td>
          <input type="hidden" name="action" value="s" />
        </tr>

      </table>

    </td>
  </tr>

  <?php
	if($editFlag === true){?>
      <input type="hidden" value="u" name="a" />
      <input type="hidden" value="<?php echo $_REQUEST['id']?>" name="id" />
      <input type="hidden" value="<?php echo $_REQUEST['id']?>" name="data[id]" />
<?php
	} else {?>
      <input type="hidden" value="a" name="a" />
<?php }?>
      <input type="hidden" value="<?php echo $plant?>" name="plant" />


  </table>
  <input type="submit" class='button' value="Save & Proceed" >
</form>
<?php

}

?>
<?php include TEMPLATE_PATH."footer.tpl.php"?>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "custom", {validateOn:["change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "real", {useCharacterMasking:true, validateOn:["change"], hint:"0.00", minValue:0.0001});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {validateOn:["change"], useCharacterMasking:true, minChars:4, maxChars:4, minValue: <?php echo $caseData['startYear']+$ahData['CPeriod'] > 2000? $caseData['startYear']+$ahData['CPeriod'] : 2000; ?>});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "integer", {validateOn:["change"], useCharacterMasking:true, minChars:1, maxChars:4, maxValue: <?php echo $ahData['FOyear']-$caseData['startYear']+1 > 0 ? $ahData['FOyear']-$caseData['startYear'] : 100; ?>, minValue: 0});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "integer", {validateOn:["change"], useCharacterMasking:true, minChars:1, minValue:1});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "custom", {validateOn:["change"]});
//-->
</script>
