<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target=”_blank”>Open in New Window</a><?php }?>

<h3> Inflation Index</h3>
<table width="600" border="1" cellspacing="2" cellpadding="0">
  <tr valign="top">
    <td valign="top"><table border="1" width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <th >YEAR</th>
        </tr>
		 <tr>
          <th >&nbsp;</th>
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
		<tr>
          <th>Rate(%)</th><th>Index</th>
        </tr>
        <?php
			$ratetypeval = 'RateType';
			$ratetypeval .= $allChunks[$i];
			?>
        <?php 

			for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){

				$infval = $allChunks[$i];
				$infval .= '_';
				$infval .= $m;
				$inflval = 'I_'.$infval;
				?>
        <tr>
          <td><?php echo $ceData[$inflval];?></td>
		  <td class="number"><?php echo round($ceData[$infval],$RoundPlace);?></td>
        </tr>
 <?php	}?>
      </table></td>
    <?php
}
?>
  </tr>
</table>
</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
