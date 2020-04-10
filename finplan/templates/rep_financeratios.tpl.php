<?php if(!isset($_REQUEST['viewid'])){
	$resmenu="block";
	include TEMPLATE_PATH."header.tpl.php";
	}else{
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=financeratios.xls");
		include TEMPLATE_PATH."header_xls.tpl.php";
	}?>
</head>
<body>
	<?php	
	if(!isset($_REQUEST['viewid'])){?>
		<a href="rep_financeratios.php?viewid=1"><img src='images/excel.jpg' title="Export to Excel"border='0' /></a>
<?php	}?>	
<h3>Financial Ratios</h3>

<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr valign="top">
    <td valign="top">
<table border="1" width="100%" cellpadding="0" cellspacing="0">
       
        <tr>
          <th >Study Year</th>
        </tr>

    <tr><td>Working Capital</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Leverage</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Equipment Renewal</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Gross Profit Rate</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Debt Repayment Time</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Exchange Risk</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Breakeven Point</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Interest Charge Weight</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Global Index</td></tr>
    <tr><td>Self Financing Ratio</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Debt Equity Ratio</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Debt Service Coverage</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>ROR on Rev Assets</td></tr>
    <tr><td>&nbsp;</td></tr>
    </table></td>
   
        <?php 
			
	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){
				
		$aval = 'R1_'.$m;
		$aaval = 'R1S_'.$m;
		$bval = 'R2_'.$m;
		$bbval = 'R2S_'.$m;
		$cval = 'R3_'.$m;
		$ccval = 'R3S_'.$m;		
		$dval = 'R4_'.$m;
		$ddval = 'R4S_'.$m;
		$eval = 'R5_'.$m;
		$eeval = 'R5S_'.$m;
		$fval = 'R6_'.$m;
		$ffval = 'R6S_'.$m;
		$gval = 'R7_'.$m;
		$ggval = 'R7S_'.$m;
		$hval = 'R8_'.$m;
		$hhval = 'R8S_'.$m;
		$ival = 'R9_'.$m;
		$iival = 'R9S_'.$m;
		$jval = 'R10_'.$m;
		$jjval = 'R10S_'.$m;
		$kval = 'R11_'.$m;
		$kkval = 'R11S_'.$m;
		$lval = 'R12_'.$m;
		$llval = 'R12S_'.$m;
		$mval = 'GI_'.$m;
?>

    <td Valign="top">
	<table border="0" width="100%" cellpadding="2" cellspacing="2">

			<tr><th><?php echo "$m";?></th></tr>
        		<tr><td class="number"><?php echo round($ctData[$aval],$RoundPlace);?></td></tr><tr><td><?php echo $ctData[$aaval];?></td></tr>
        		<tr><td class="number"><?php echo round($ctData[$bval],$RoundPlace);?></td></tr><tr><td><?php echo $ctData[$bbval];?></td></tr>
			<tr><td class="number"><?php echo round($ctData[$cval],$RoundPlace);?></td></tr><tr><td><?php echo $ctData[$ccval];?></td></tr>
			<tr><td class="number"><?php echo round($ctData[$dval],$RoundPlace);?></td></tr><tr><td><?php echo $ctData[$ddval];?></td></tr>
			<tr><td class="number"><?php echo round($ctData[$eval],$RoundPlace);?></td></tr><tr><td><?php echo $ctData[$eeval];?></td></tr>
			<tr><td class="number"><?php echo round($ctData[$fval],$RoundPlace);?></td></tr><tr><td><?php echo $ctData[$ffval];?></td></tr>
			<tr><td class="number"><?php echo round($ctData[$gval],$RoundPlace);?></td></tr><tr><td><?php echo $ctData[$ggval];?></td></tr>
			<tr><td class="number"><?php echo round($ctData[$hval],$RoundPlace);?></td></tr><tr><td><?php echo $ctData[$hhval];?></td></tr>
			<tr><td class="number"><?php echo round($ctData[$mval],$RoundPlace);?></td></tr>
			<tr><td class="number"><?php echo round($ctData[$ival],$RoundPlace);?></td></tr><tr><td><?php echo $ctData[$iival];?></td></tr>
			<tr><td class="number"><?php echo round($ctData[$jval],$RoundPlace);?></td></tr><tr><td><?php echo $ctData[$jjval];?></td></tr>
			<tr><td class="number"><?php echo round($ctData[$kval],$RoundPlace);?></td></tr><tr><td><?php echo $ctData[$kkval];?></td></tr>
			<tr><td class="number"><?php echo round($ctData[$lval],$RoundPlace);?></td></tr><tr><td><?php echo $ctData[$llval];?></td></tr>

      </table></td><?php }?>
 
</table>

</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
