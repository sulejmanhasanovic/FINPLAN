<?php $defmenu="block";
include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body>
<h3><?php echo $royal_1;?></h3>
A value entered for one year will also be applicable for subsequent years, until a new value is entered for a future year.
<div style="width:700px;  overflow:auto;">
<table width="" border="1"  cellspacing="4" cellpadding="0">
  <form method="post" name="curtypeinf" action="royaltySave.php">
    <tr valign="top">

    <td valign="top">
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
        <tr>
           <th ><?php echo $royal_3;?></th>
        </tr>
		<tr>
           <th >&nbsp;</th>
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

    <td valign="top">
      <table border="0" width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <th colspan="2"><?php echo $baseCname;?></th>
        </tr>



        <tr>
          <th>
            <?php echo $royal_2;?>  </th><th>
            <?php echo $royal_4;?>  </th>
        </tr>
        <?php

for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){

if($ahData['timeOpt'] == 'Q'){

for($q=1;$q <= 4; $q++){
	$rat_val = 'R_'.$m.'_Q_'.$q;//royalty rate
	$cosval = 'C_'.$m.'_Q_'.$q;//royalty cost
?>
        <tr>
			<td><input type="text" size="3"  id="<?php echo $rat_val;?>" name="data[<?php echo $rat_val;?>]" value="<?php echo $ctData[$rat_val];?>"></td>
			<td><input type="text" size="3"  id="<?php echo $cosval;?>" name="data[<?php echo $cosval;?>]" value="<?php echo $ctData[$cosval];?>"></td>
        </tr>
        <?php }}else{
	$rat_val = 'R_'.$m;
	$cosval = 'C_'.$m;
?>
        <tr>
			<td><input type="text" size="3"  id="<?php echo $rat_val?>" name="data[<?php echo $rat_val?>]" value="<?php echo $ctData[$rat_val];?>"></td>
			<td><input type="text" size="3"  id="<?php echo $cosval;?>" name="data[<?php echo $cosval;?>]" value="<?php echo $ctData[$cosval];?>"></td>
        </tr>
        <?php	}
}

?>
      </table>
      </td>

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
