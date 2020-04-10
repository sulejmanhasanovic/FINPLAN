<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target=�_blank�>Open in New Window</a><?php }?>
<h3>Foreign Currencies Requirements (Million)</h3>


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
			<th>Investments</Th>
			<Th>Loan & Bonds</Th>
			<Th>Loan & Bond<br/>Repayments</Th>
			<Th>Interest Charges</Th>
			<Th>Operating Costs</Th>
			<Th>Cash Balance</Th>
		 </Tr>

<?php
	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){
		$aval = 'LB_'.$CurChunks[$c].'_'.$m;
		$bval = 'LBR_'.$CurChunks[$c].'_'.$m;
		$cval = 'LBI_'.$CurChunks[$c].'_'.$m;
		$dval = 'OC_'.$CurChunks[$c].'_'.$m;
		$eval = 'CB_'.$CurChunks[$c].'_'.$m;
		$fval = 'FI_'.$CurChunks[$c].'_'.$m;


?>
       <tr>
	     <td class="number"><?php echo round($clData[$fval],$RoundPlace);?></td>
         <td class="number"><?php echo round($clData[$aval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($clData[$bval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($clData[$cval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($clData[$dval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($clData[$eval],$RoundPlace);?></td>

        </tr>
<?php	}?>
      </table>
	  </div></td>
<?php }?>
<td valign="top">
	<table border="1" cellpadding="0" cellspacing="0">
		<tr>
			<th >&nbsp;</th>
		</tr>


			<th>Local Cash</th>
        </tr>
<?php
	for($n = $ahData['startYear']; $n <= $ahData['endYear']; $n++){
		$gval = 'Loc_'.$n;
?>
       <tr>
	     <td class="number"><?php echo round($ctData[$gval],$RoundPlace);?></td>


        </tr>
<?php	}?>
      </table>
	  </td>
  </tr>
</table>

</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
