<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target=�_blank�>Open in New Window</a><?php }?>
<h3>Foreign Currencies Outstanding (Million)</h3>


<table border="1" cellspacing="2" cellpadding="0">
  <tr valign="top">
    <td valign="top">
	<table border="1" cellpadding="0" cellspacing="0">
	<tr>
          <th>&nbsp;</th>
    </tr>
	<tr>
          <th>Year</th>
    </tr>
    <?php for($i=$ahData['startYear'];$i <= $ahData['endYear']; $i++){?>
        <tr>
          <td><?php echo "$i";?></td>
        </tr>
    <?php }?>
    </table>
	</td>
<?php
for($c = 0; $c < count($CurChunks); $c++){ ?>
    <td valign="top">
	<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><div><?php }?>
	<table border="1" cellpadding="0" cellspacing="0">
		<tr>
			<th colspan=7><div align="center"><?php echo Config2::getData('currencies',$CurChunks[$c]);?></div> </th>
		</tr>
		<tr>
			<th>Export Credit</th>
			<th>New Loans</th>
			<th>Old Loans</th>
			<th>Old Bonds</th>
			<th>New Bonds</th>
			<th>Equity</th>
			<th>Total</th>
		 </tr>
<?php
	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){
		$aval = 'B_'.$CurChunks[$c].'_'.$m;
		$bval = 'L_'.$CurChunks[$c].'_'.$m;
		$cval = 'E_'.$CurChunks[$c].'_'.$m;
		$eval = 'O_'.$CurChunks[$c].'_'.$m;

		?>
       <tr>
	     <td class="number"><?php echo round($chData[$aval],$RoundPlace);?></td>
         <td class="number"><?php echo round($ciData[$aval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($caData[$lval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($cbData[$aval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($ccData[$eval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($cdData[$cval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($clData[$eval],$RoundPlace);?></td>

        </tr>
<?php	}?>
      </table>
	  </div></td>
<?php }?>

  </tr>
</table>

</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
