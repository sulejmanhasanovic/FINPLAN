<?php 
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");

	$_loans = new XmlData($caseStudyId,$loans_data);
	$loans = $_loans->getByField('1','sid');

	$_cal_loans = new XmlData($caseStudyId,$cal_loans);
	$cal_loans = $_cal_loans->getByField('1','sid');
?>

<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){
      include TEMPLATE_PATH."header.tpl.php" ?>
</head>
<body><a href="?viewid=1" target="_blank">Open in New Window</a></body>
<?php }?>

<body>

<h3>New Commercial Loans (Million)</h3>

<table border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td><table>
      <tr><th>Year</th></tr>
      <tr><th>&nbsp;</th></tr>      

      <?php for($y = $ahData['startYear']; $y <= $ahData['endYear']; ++$y): ?>
      <tr><td><?php echo $y; ?></td></tr>
      <?php endfor; ?>
    </table></td>

    <?php foreach($allChunks as $curncy): ?>
    <td><table>
      <tr><th colspan="4"><?php echo $curncy; ?></th></tr>
      <tr><th>Drawdown</th><th>Balance</th><th>Interest</th><th>Repayment</th></tr>
      
      <?php for($y = $ahData['startYear']; $y <= $ahData['endYear']; ++$y): ?>
      <tr>
	<td class="number"><?php echo round($loans['A_'.$curncy.'_'.$y], $RoundPlace); ?></td>
	<td class="number"><?php echo round($cal_loans['B_'.$curncy.'_'.$y], $RoundPlace); ?></td>
	<td class="number"><?php echo round($cal_loans['I_'.$curncy.'_'.$y], $RoundPlace); ?></td>
	<td class="number"><?php echo round($cal_loans['R_'.$curncy.'_'.$y], $RoundPlace); ?></td>
      </tr>
      <?php endfor; ?>
    </table></td>
    <?php endforeach; ?>

    <td><table>
      <tr><th colspan="4">Total in <?php echo $baseCurr; ?></th></tr>
      <tr><th>Drawdown</th><th>Balance</th><th>Interest</th><th>Repayment</th></tr>
      
      <?php for($y = $ahData['startYear']; $y <= $ahData['endYear']; ++$y): ?>
      <tr>
	<td class="number"><?php echo round($cal_loans['TD_'.$y], $RoundPlace); ?></td>
	<td class="number"><?php echo round($cal_loans['TB_'.$y], $RoundPlace); ?></td>
	<td class="number"><?php echo round($cal_loans['TI_'.$y], $RoundPlace); ?></td>
	<td class="number"><?php echo round($cal_loans['TR_'.$y], $RoundPlace); ?></td>
      </tr>
      <?php endfor; ?>
    </table></td>

  </tr>
</table>

<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
