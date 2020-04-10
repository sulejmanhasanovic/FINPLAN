<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target=�_blank�>Open in New Window</a><?php }?>
<h3>Total Investments For All Plants (Million)</h3>
<?php if(is_array($caData) && count($caData) > 0){?>
<table width="600" border="1" cellspacing="2" cellpadding="0">
  <tr valign="top">
    <td valign="top"><table border="1" width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <th >YEAR</th>
        </tr>
        <?php
	for($i=$ahData['startYear'];$i <= $ahData['endYear']; $i++){
?>
        <tr>
          <td><?php echo "$i";?></td>
        </tr>
        <?php
	}
?>
      </table></td>
    <?php

for($i = 0; $i < count($allChunks); $i++){
	?>
    <td valign="top"><table border="1" width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <th colspan=2><?php echo Config2::getData('currencies',$allChunks[$i]);?></th>
        </tr>
        <?php
			for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){
				$einvstval = 'EI_';
				$einvstval .= $allChunks[$i];
				$einvstval .= '_';
				$einvstval .= $m;
				?>
        <tr>
          <td class="number"><?php echo round($caData[$einvstval],$RoundPlace);?></td>
        </tr>
        <?php
	}?>
      </table></td>
    <?php
}
?>
  </tr>
</table>
<?php }

else {

Echo "No Record Found!";
}?>
</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php";  ?>
