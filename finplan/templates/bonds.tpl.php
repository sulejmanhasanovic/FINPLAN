<?php $pfamenu="block";
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

<h3><?php echo $bds_1;?></h3>

<div style="width:1100px;  overflow:auto;">
<table width="" border="1"  cellspacing="4" cellpadding="0">

    <tr valign="top">

    <td valign="top">
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<form method="post" name="curtypeinf" action="bondsSave.php">
        <tr>
          <th >&nbsp;</th>
        </tr>
        <tr>
          <td ><?php echo $bds_2;?></td>
        </tr>
        <tr>
           <td><?php echo $bds_3;?></td>
        </tr>
		<tr>
           <th ><?php echo $bds_4;?></th>
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
          <th ><?php echo Config2::getData('currencies',$allChunks[$i]);?>(Million)</th>
        </tr>
<?php
		$expval = 'ER_'.$allChunks[$i];
?>      <tr>
          <td>
		  <input type="text" size="10"  id="<?php echo $expval;?>" name="data[<?php echo $expval;?>]"
		  value="<?php echo $ctData[$expval];?>">%
		      </td>
        </tr>
        <tr>
          <td>
            <?php
		$bntval = 'BT_'.$allChunks[$i];
?>
            <input name="data[<?php echo $bntval;?>]" id="<?php echo $bntval;?>" type="text" size="10" value="<?php echo $ctData[$bntval];?>">Year(s)</td>
        </td>

        </tr>

        <tr>
          <th>
            <?php echo $bds_5;?> &nbsp; </th>

        </tr>
        <?php

for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){

if($ahData['timeOpt'] == 'Q'){

for($q=1;$q <= 4; $q++){
	$bndval = 'B_'.$allChunks[$i].'_'.$m.'_Q_'.$q;

?>
        <tr>
			<td><input type="text" size="10"  id="<?php echo $bndval;?>" name="data[<?php echo $bndval;?>]" value="<?php echo $ctData[$bndval];?>"></td>

        </tr>
        <?php }}else{
	$bndval = 'B_'.$allChunks[$i].'_'.$m;

?>
        <tr>
			<td><input type="text" size="10"  id="<?php echo $bndval;?>" name="data[<?php echo $bndval;?>]" value="<?php echo $ctData[$bndval];?>"></td>

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
