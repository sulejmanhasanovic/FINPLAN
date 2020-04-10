<?php $resmenu="block";
include TEMPLATE_PATH."header.tpl.php"?>

<table width="450" align="CENTER" border="2" cellpadding="2" cellspacing="2">
<?php
	$assets = $ctData['GrossFixedAssets']- $ctData['LessDepreciation']-$ctData['ConsumerContribution']+$ctData['WorkProgress']+$ctData['Receivables']+$ctData['ShortTermDeposits'];
	$liability = $ctData['Equity'] + $ctData['RetainedEarning'] + $cbData['IBB'] + $caData['IBL'] + $ctData['ConsumerDeposits'] + $coData['CMBL'];
	if($assets!=$liability){
?>
<tr>
<th><div align="center"><b>Please Check your Data as Assets are not equal to Equity and Liabilities</b></div></th>
</tr>
<?php } else { ?>
<tr>
<th><div align="center">Reports Generated</div></th>
</tr>
<?php }; ?>
</table>

<?php include TEMPLATE_PATH."footer.tpl.php"?>
