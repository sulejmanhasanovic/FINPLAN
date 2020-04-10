<?php if(!isset($_REQUEST['viewid'])){
	$resmenu="block";
	include TEMPLATE_PATH."header.tpl.php";
	}else{
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=shareholder.xls");
		include TEMPLATE_PATH."header_xls.tpl.php";
	}?>
</head>
<body>

	<?php	
	if(!isset($_REQUEST['viewid'])){?>
		<a href="rep_shareholder.php?viewid=1"><img src='images/excel.jpg' title="Export to Excel"border='0' /></a>
<?php	}?>	
<h3>Shareholders' Return in Local Currency (Million)</h3>
	<?php
		$iVal = 'TFS';// $di_Total_Flowsum;
		$jVal = 'NPV';// $di_NPV_Project;
		$kVal = 'IRR';// $IRR;?>
<table width="300" border="1" cellspacing="1" cellpadding="0">
		<tr>
			<th>NPV Project</th>
			<th>IRR</th>
		</tr>	
		<tr>
			<td><?php echo round($csData[$jVal],2);?></td>
			<td><?php echo round($csData[$kVal],2);?> %</td>
		</tr>	
</table>



<table width="100%" border="0" cellspacing="2" cellpadding="0">
  <tr valign="top">
    <td valign="top">
      <table border="1" width="100" cellpadding="0" cellspacing="0">

        <tr><th>Year</th></tr>
			<tr><td>Initial Equity</td></tr>
			<tr><td>Eq.Increase</td></tr>
			<tr><td>Eq.Repayments</td></tr>
			<tr><td>Dividend</td></tr>
			<tr><td>Final Disposal</td></tr>
			<tr><th>Total Flow</th></tr>
			<tr><td>Return On Equity (%)</td></tr>
   </table></td>

    <td valign="top">
	<table border="1" width="100%" cellpadding="0" cellspacing="0">

   <th><?php echo $ahData['startYear']-1;?></th>
         <tr><td class="number">-<?php echo round($cdData['IE'],$RoundPlace);?></td></tr>
		 <tr><td class="number">-0</td></tr>
		 <tr><td class="number">0</td></tr>
		 <tr><td class="number">0</td></tr>
		 <tr><td class="number">0</td></tr>
		 <tr><th class="number"><?php echo round($csData['TF_'.($ahData['startYear']-1)],$RoundPlace);?></th></tr>
		  <tr><td class="number">0</td></tr>
      </table></td>		

	<?php for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){
				
		$bVal = 'N_'.$m;
		$oVal = 'T_'.$m;
		$rVal = 'E_'.$m;
		$dVal = 'DivL_'.$m;
		$eVal = 'FD_'.$m;//  $di_Final_Disposal[$di_i];
		$fVal = 'TF_'.$m;// $di_Total_Flow[$di_i];
		$gVal = 'RE_'.$m;// $di_Return_OnEquity[$di_i];
//		$hVal = 'RA_'.$m;// $di_Return_OnAssets[$di_i];
?>
    <td valign="top">
	<table border="1" width="100%" cellpadding="0" cellspacing="0">
				  <tr><th><?php echo "$m";?></th></tr>
			<tr><td class="number">0</td></tr>
			<tr><td class="number">-<?php echo round($cdData[$bVal],$RoundPlace);?></td></tr>
			<tr><td class="number"><?php echo round($cdData[$rVal],$RoundPlace);?></td></tr>
			<tr><td class="number"><?php echo round($cnData[$dVal],$RoundPlace);?></td></tr>
			<tr><td class="number"><?php echo round($csData[$eVal],$RoundPlace);?></td></tr>
			<tr><th class="number"><?php echo round($csData[$fVal],$RoundPlace);?></th></tr>
			<tr><td class="number"><?php echo round($csData[$gVal],$RoundPlace);?></td></tr>
	  </table></td><?php }?>		
</table>

</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
