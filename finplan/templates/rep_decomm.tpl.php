<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target=�_blank�>Open in New Window</a><?php }?>
<h3>Total Decommisioning Costs in Local Currency (Million)</h3>

<table width="600" border="1" cellspacing="2" cellpadding="0">
  <tr valign="top">
    <td valign="top"><table border="1" width="100" cellpadding="0" cellspacing="0">

        <tr>
          <th >Study Year</th>
        </tr>
        <?php 	for($i=$ahData['startYear'];$i <= $ahData['endYear']; $i++){?>
				<tr>
				  <td><?php echo "$i";?></td>
				</tr>
        <?php } ?>
      </table></td>
    <?php
?>
    <td valign="top">
	<table border="1" width="500" cellpadding="0" cellspacing="0">
          <tr>
		   <th>External Trust</th>
		   <th>Internal Fund</th>
		</tr>
        <?php

	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){

		$rval = 'TDCL_'.$m;
		$sval = 'ADFL_'.$m;
?>
       <tr>

		 <td class="number"><?php echo round($ceData[$rval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($ceData[$sval],$RoundPlace);?></td>

        </tr>
<?php	}	?>
    </table>
	</td>

  </tr>
</table>

</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
