<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target=�_blank�>Open in New Window</a><?php }?>
<h3>New Bonds by Currency (Million)</h3>

<?php 


$ccd = new XmlData($caseStudyId,$ccxml);
$ccData = $ccd->getByField(1,'sid');
?>
<br>

<table border="1" cellspacing="2" cellpadding="0">
  <tr valign="top">
    <td valign="top">
	<table border="1" cellpadding="0" cellspacing="0">
	<tr>
          <th>Year</th>
    </tr>
	<tr>
          <th>&nbsp;</th>
    </tr>
    <?php for($i=$ahData['startYear'];$i <= $ahData['endYear']; $i++){?>
        <tr>
          <td><?php echo "$i";?></td>
        </tr>
    <?php }?>
    </table>
	</td>
<?php
for($c = 0; $c < count($allChunks); $c++){ ?>
    <td valign="top">
	<table border="1" cellpadding="0" cellspacing="0">
		<tr>
			<th colspan=4><?php echo Config2::getData('currencies',$allChunks[$c]);?> </th>
		</tr>
	
        <tr>
		  <th>Issue</th>
		  <th>Outstanding</th>
		  <th>Interest</th>
		  <th>Repayments</th>
		</tr>
<?php 
	for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){
		$bval = 'B_'.$allChunks[$c].'_'.$m;
		$oval = 'O_'.$allChunks[$c].'_'.$m;
		$ival = 'I_'.$allChunks[$c].'_'.$m;
		$rval = 'R_'.$allChunks[$c].'_'.$m;
?>
       <tr>
         <td class="number"><?php echo round($ccData[$bval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($ccData[$oval],$RoundPlace);?></td>
		 <td class="number"><?php echo round($ccData[$ival],$RoundPlace);?></td>
		 <td class="number"><?php echo round($ccData[$rval],$RoundPlace);?></td>
		
        </tr>
<?php	}?>
      </table></td>
<?php }?>

  </tr>
</table>

</div>
<!-- end #page -->
<?php include TEMPLATE_PATH."footer.tpl.php"?>
