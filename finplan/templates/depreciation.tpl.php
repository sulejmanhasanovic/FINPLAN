<?php $pltmenu="block";
include TEMPLATE_PATH."header.tpl.php"?>

<script language="Javascript">

function autodepr(frm,box)
{

		 var textbox = document.getElementById('DepreciationRate');
		 var textbox1 = document.getElementById('SumYears');
		 var textbox2 = document.getElementById('DecliningRate');
		 var textbox3 = document.getElementById('DecliningYears');
		 var textbox4 = document.getElementById('LinearYears');

		if (box =='L')
			{

			 textbox4.disabled = false;
			 textbox.disabled = true;
			 textbox1.disabled = true;
			 textbox2.disabled = true;
			 textbox3.disabled = true;
			 textbox.style.backgroundColor = '#D8D8D8';
			 textbox1.style.backgroundColor = '#D8D8D8';
			 textbox2.style.backgroundColor = '#D8D8D8';
			 textbox3.style.backgroundColor = '#D8D8D8';
			 textbox4.style.backgroundColor = '';
			}
		if (box =='DB')
			{

			 textbox.disabled = false;
			 textbox4.disabled = true;
			 textbox1.disabled = true;
			 textbox2.disabled = true;
			 textbox3.disabled = true;
			 textbox4.style.backgroundColor = '#D8D8D8';
			 textbox1.style.backgroundColor = '#D8D8D8';
			 textbox2.style.backgroundColor = '#D8D8D8';
			 textbox3.style.backgroundColor = '#D8D8D8';
			 textbox.style.backgroundColor = '';
			}
		if (box =='SY')
			{

			 textbox1.disabled = false;
			 textbox4.disabled = true;
			 textbox.disabled = true;
			 textbox2.disabled = true;
			 textbox3.disabled = true;
			 textbox4.style.backgroundColor = '#D8D8D8';
			 textbox.style.backgroundColor = '#D8D8D8';
			 textbox2.style.backgroundColor = '#D8D8D8';
			 textbox3.style.backgroundColor = '#D8D8D8';
			 textbox1.style.backgroundColor = '';
			}
		if (box =='DS')
			{

			 textbox2.disabled = false;
			 textbox4.disabled = true;
			 textbox.disabled = true;
			 textbox1.disabled = true;
			 textbox3.disabled = false;
			 textbox4.style.backgroundColor = '#D8D8D8';
			 textbox.style.backgroundColor = '#D8D8D8';
			 textbox1.style.backgroundColor = '#D8D8D8';
			 textbox3.style.backgroundColor = '';
			 textbox2.style.backgroundColor = '';
			}


}

</script>
<body >
<h3><?php echo $dep_1;?></h3>
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
    <td><a href="?a=e&id=<?php echo $row['id']?>"><?php  echo $plnttable_6;?></a></td>
  </tr>
  <?php
}
}else{
echo "<tr><td colspan='5'>No Records</td></tr>";
}
?>
</table>

<?php
if(isset($_REQUEST['id'])){?>
 <form method="post" action="depreciationSave.php">
  <table align="center" border="1" cellpadding="2" cellspacing="0">

    <tr>
      <th colspan="2" scope="col"><div align="center"><?php echo $dep_2;?></div></th>
    </tr>
	<tr>
      <th> Plant Name &nbsp; </th>
      <th><?php echo $ceData['name'];?> </th>
    </tr>
    <tr>
      <th> <?php echo $dep_3;?> &nbsp; </th>
      <th>&nbsp; </th>
    </tr>
    <tr>
      <td><input type="radio" name="data[Type]" value="L" <?php echo $cfData['Type']=='L'?'checked="checked"':'' ?> onclick="autodepr(this.form,'L')" >
        <?php echo $dep_4;?> &nbsp; </td>
      <td><?php echo $dep_5;?> &nbsp;
       <span id="sprytextfield1"> <input type="text" name="data[LinearYears]" id="LinearYears" value="<?php echo $cfData['LinearYears'];?>" <?php echo $cfData['Type']=='L'?'':'disabled' ?>/> </span>
	   <span class="textfieldRequiredMsg">Required</span>
	    <span class="textfieldInvalidFormatMsg">Invalid format.</span>
		<span class="textfieldMinValueMsg">Min Value:0 </span>
      </td>
    </tr>
    <tr>
      <td><input type="radio" name="data[Type]" value="SY"
		<?php echo $cfData['Type']=='SY'?'checked="checked"':'' ?> onclick="autodepr(this.form,'SY')"/>
        <?php echo $dep_8;?> &nbsp; </td>
      <td><?php echo $dep_9;?> &nbsp;
       <span id="sprytextfield2"> <input type="text" name="data[SumYears]" id="SumYears" value="<?php echo isset($cfData['SumYears'])?$cfData['SumYears']:'0.0';?>" <?php echo $cfData['Type']=='SY'?'':'disabled' ?>/>
	   <span class="textfieldRequiredMsg">Required</span>
	    <span class="textfieldInvalidFormatMsg">Invalid format.</span>
		<span class="textfieldMinValueMsg">Min Value:0 </span>
      </td>
    </tr>
	 <tr>
      <td><input type="radio" name="data[Type]" value="DB"
		<?php echo $cfData['Type']=='DB'?'checked="checked"':'' ?> onclick="autodepr(this.form,'DB')"/>
        <?php echo $dep_6;?> &nbsp; </td>
      <td><?php echo $dep_7;?> &nbsp;
        <span id="sprytextfield3"><input type="text" name="data[DepreciationRate]" id="DepreciationRate" value="<?php echo isset($cfData['DepreciationRate'])?$cfData['DepreciationRate']:'0.0';?>" <?php echo $cfData['Type']=='DB'?'':'disabled' ?>/> %
		<span class="textfieldRequiredMsg">Required</span>
	    <span class="textfieldInvalidFormatMsg">Invalid format.</span>
		<span class="textfieldMinValueMsg">Min Value:0 </span>
      </td>
    </tr>
    <tr>
      <td><input type="radio" name="data[Type]" value="DS"
		<?php echo $cfData['Type']=='DS'?'checked="checked"':'' ?> onclick="autodepr(this.form,'DS')"/>
        <?php echo $dep_10;?> &nbsp; </td>
      <td><?php echo $dep_11;?> &nbsp;
       <span id="sprytextfield4"> <input type="text" name="data[DecliningYears]" id="DecliningYears" size=3 value="<?php echo $cfData['DecliningYears'];?>" <?php echo $cfData['Type']=='DS'?'':'disabled' ?>/>
	   <span class="textfieldRequiredMsg">Required</span>
	    <span class="textfieldInvalidFormatMsg">Invalid format.</span>
		<span class="textfieldMinValueMsg">Min Value:0 </span>
        <?php echo $dep_12;?> &nbsp;
       <span id="sprytextfield5"> <input type="text" name="data[DecliningRate]" id="DecliningRate" size=3 value="<?php echo $cfData['DecliningRate'];?>" <?php echo $cfData['Type']=='DS'?'':'disabled' ?>/>%
	   <span class="textfieldRequiredMsg">Required</span>
	    <span class="textfieldInvalidFormatMsg">Invalid format.</span>
		<span class="textfieldMinValueMsg">Min Value:0 </span>
      </td>
	  </tr>
	    </table>

      <?php if(is_array($cfData) && count($cfData) > 0) {?>
      <input type="hidden" name="act" value="u">
      <input type="hidden" name="data[pid]" value="<?php echo $cfData['pid'];?>">
      <input type="hidden" name="did" value="<?php echo $cfData['id'];?>">
      <?php } else {?>
      <input type="hidden" name="act" value="a">
      <input type="hidden" name="data[pid]" value="<?php echo $ceData['id'];?>">
      <?php } ?>
    <tr>
      <td >
          <input type="submit" class='button' name="proceed" id="proceed" value="Save & Proceed"   ></form>
        </td>
    </tr>
    <?php }?>


<?php include TEMPLATE_PATH."footer.tpl.php"?>
<script type="text/javascript">
	var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "real", {isRequired:true, useCharacterMasking:true, validateOn:["change"], hint:"0.0"});
	var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "real", {isRequired:true, useCharacterMasking:true, validateOn:["change"], hint:"0.0"});
	var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "real", {isRequired:true, useCharacterMasking:true, validateOn:["change"], hint:"0.0",maxValue:100});
	var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "real", {isRequired:true, useCharacterMasking:true, validateOn:["change"], hint:"0.0"});
	var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "real", {isRequired:true, useCharacterMasking:true, validateOn:["change"], hint:"0.0",maxValue:100});

</script>
