<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target=”_blank”>Open in New Window</a><?php }?>
<h3>Exchange Rates</h3><h2>
 <?php echo $baseCname;?> Per : <?php for($i = 0; $i < count($CurChunks); $i++){ echo  Config2::getData('currencies',$allChunks[$i]).'; ';}?></h2>
<table border="1" cellspacing="2" cellpadding="0">
  <tr valign="top">
    <td valign="top"><table border="1" width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <th >Year</th>
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

for($i = 0; $i < count($CurChunks); $i++){
	?>
    <td valign="top"><table border="1" width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <th><?php echo Config2::getData('currencies',$allChunks[$i]);?></th>
        </tr>
        <?php
			$ratetypeval = 'RateType';
			$ratetypeval .= $CurChunks[$i];
			?>
        <?php 

			for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){

				$infval = $CurChunks[$i];
				$infval .= '_';
				$infval .= $m;
				?>
        <tr>
          <td class="number"><?php echo round($ceData[$infval],$RoundPlace);?></td>
        </tr>
        <?php		
		
	}?>
      </table></td>
    <?php
}
?>
  </tr>
</table>
</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
