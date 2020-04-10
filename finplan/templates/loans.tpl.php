<?php $pfamenu="block";
include TEMPLATE_PATH."header.tpl.php"?>
</head>

<body>
<h3><?php echo $lns_1;?></h3>

<form method="post" name="curtypeinf" action="loansSave.php">
<div><table>
    <tr valign="top"><td valign="top">
	<table>
        <tr><th>&nbsp;</th></tr>
        <tr><td><?php echo $lns_2;?></td></tr>
        <tr><td><?php echo $lns_3;?></td></tr>
	<tr><th><?php echo $lns_4;?></th></tr>
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
      </table></td>
    <?php

for($i = 0; $i < count($allChunks); $i++){

?>
    <td valign="top">
      <table>
        <tr>
          <th ><?php echo Config2::getData('currencies',$allChunks[$i]);?> (Million)</th>
        </tr>
<!-- <?php
		$interest = 'I_'.$allChunks[$i];
?>      <tr>
          <td>
		  <input size="5" name="data[<?php echo $interest;?>]" value="<?php echo $ctData[$interest];?>"> %
		      </td>
        </tr>
-->
	     <tr><td>
	     <?php $spread = 'S_'.$allChunks[$i];?>
	     <input name="data[<?php echo $spread;?>]" id="<?php echo $spread;?>" type="text" size="5" value="<?php echo $ctData[$spread];?>" /> %
	     </td></tr>

        <tr>
          <td>
            <?php
		$term = 'T_'.$allChunks[$i];
?>
            <input name="data[<?php echo $term;?>]" id="<?php echo $term;?>" type="text" size="5" value="<?php echo $ctData[$term];?>"> Year(s)</td>
        </tr>

        <tr>
          <th>
            <?php echo $lns_5;?> &nbsp; </th>

        </tr>
        <?php

for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){

if($ahData['timeOpt'] == 'Q'){

for($q=1;$q <= 4; $q++){
	$amount = 'A_'.$allChunks[$i].'_'.$m.'_Q_'.$q;

?>
        <tr>
			<td><input type="text" size="5"  id="<?php echo $amount;?>" name="data[<?php echo $amount;?>]" value="<?php echo $ctData[$amount];?>"></td>

        </tr>
        <?php }}else{
	$amount = 'A_'.$allChunks[$i].'_'.$m;

?>
        <tr>
			<td><input type="text" size="5"  id="<?php echo $amount;?>" name="data[<?php echo $amount;?>]" value="<?php echo $ctData[$amount];?>"></td>

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
</table></div>

<?php if(is_array($ctData) && count($ctData) > 0) {?>
<input type="hidden" name="act" value="u">
<input type="hidden" name="eid" value="<?php echo $ctData['id']?>">
<?php } else {?>
<input type="hidden" name="act" value="a">
<?php } ?>

<input type="hidden" name="data[sid]" value="1">
<div><input type="submit" class='button' name="proceed" id="proceed" value="Save & Proceed"></div>
</form>


<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
