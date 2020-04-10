<?php if(!isset($_REQUEST['viewid'])){
	$resmenu="block";
	include TEMPLATE_PATH."header.tpl.php";
	}else{
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=risk.xls");
		include TEMPLATE_PATH."header_xls.tpl.php";
	}?>
</head>
<body>
	<?php	
	if(!isset($_REQUEST['viewid'])){?>
		<a href="rep_risk.php?viewid=1"><img src='images/excel.jpg' title="Export to Excel"border='0' /></a>
<?php	}?>	
<h3>Project Finance Analysis in Local Currency (Million)</h3>

<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr valign="top">
    <td valign="top">
    <table border="0" width="80" cellpadding="0" cellspacing="0">
       
    <tr><th>Study Year</th></tr>
	
	<tr><td>Loans and Bonds Outstanding</td></tr>
    <tr><th/></tr>
	<tr><td>Cash available during Loan Term</td></tr>
    <tr><td>PV of Cash available during Loan Term</td></tr>
    <tr><td>Maximum Project Finance during Loan Term</td></tr>
    <tr><th/></tr>
    <tr><td>Cash available during Project Life</td></tr>
    <tr><td>PV of Cash available during Project Life</td></tr>
    <tr><td>Maximum Project Finance during Project Life</td></tr>
		
      </table></td>

        <?php 
			
	for($m = $ahData['startYear'];$m <= $ahData['endYear']; $m++){
				
		$aval = 'LL_'.$m; //Loan_during_Life
		$bval = 'LT_'.$m; //Loan_during_Term
		$cval = 'NT_'.$m; //Loan_NPV_Term
		$dval = 'MFLo_'.$m; //MX_Fin_Loan
		$eval = 'NL_'.$m; //Loan_NPV_Life
		$fval = 'MFLi_'.$m; //MX_Fin_Life
		// Add extra info from balancesheet report = sum of Net_Bonds_Outstand_LC and Net_Loan_Outstand_LC to compare with the maximum limits for project finance
		// Label is "Loans and Bonds Outstanding"
		$jval = 'NBOL_'.$m;//Net_Bonds_Outstand_LC
		$kval = 'NLOL_'.$m;//Net_Loan_Outstand_LC
?>

    <td valign="top">
	<table border="0" width="100%" cellpadding="2" cellspacing="2">

		<tr><th><?php echo $m;?></th></tr>
		<tr><td class="number"><?php echo round(($coData[$jval] + $coData[$kval]),$RoundPlace);?></td></tr>
		<tr><th/></tr>
		<tr><td class="number"><?php echo round($crData[$bval],$RoundPlace);?></td></tr>
		 <tr><td class="number"><?php echo round($crData[$cval],$RoundPlace);?></td></tr>
		 <tr><td class="number"><?php echo round($crData[$dval],$RoundPlace);?></td></tr>
		<tr><th/></tr>
		<tr><td class="number"><?php echo round($crData[$aval],$RoundPlace);?></td></tr>
		 <tr><td class="number"><?php echo round($crData[$eval],$RoundPlace);?></td></tr>
		 <tr><td class="number"><?php echo round($crData[$fval],$RoundPlace);?></td></tr>
		       
      </table></td><?php }?>
 
</table>

</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
