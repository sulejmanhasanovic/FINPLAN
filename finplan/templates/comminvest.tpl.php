<?php $defmenu="block";
include TEMPLATE_PATH."header.tpl.php"?>

</head>
<body>
<h3><?php echo $comminv_1;?></h3>
Note that it is assumed that inflation/escalation is already accounted for. Therefore, committed investments need to be entered in nominal terms in the year of expenditure.
<div style="width:1100px;  overflow:auto;" >

<table width="" border="1"  cellspacing="4" cellpadding="0">
<form method="post" name="curtypeinf" action="comminvestSave.php">
    <tr valign="top">

    <td valign="top">
	<table border="0" width="100%" cellpadding="0" cellspacing="0">

		<tr>
           <th ><?php echo $comminv_3;?></th>
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
          <th colspan="2"><?php echo Config2::getData('currencies',$allChunks[$i]);?>(Million)</th>
        </tr>



        <?php

for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){

if($ahData['timeOpt'] == 'Q'){

for($q=1;$q <= 4; $q++){
	$commval = 'C_'.$allChunks[$i].'_'.$m.'_Q_'.$q;

?>
        <tr>
			<td><input type="text" size="3"  id="<?php echo $commval;?>" name="data[<?php echo $commval;?>]" value="<?php echo $ctData[$commval];?>"></td>

        </tr>
        <?php }}else{
	$commval = 'C_'.$allChunks[$i].'_'.$m;

?>
        <tr>
			<td><input type="text" size="3"  id="<?php echo $commval;?>" name="data[<?php echo $commval;?>]" value="<?php echo $ctData[$commval];?>"></td>

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
      <td><input type="submit" class='button' name="proceed" id="proceed" value="Save & Proceed"   ></form>
      </td>
    </tr>



<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
