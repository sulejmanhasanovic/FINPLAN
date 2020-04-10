<?php $repmenu="block"; if(!isset($_REQUEST['viewid'])){?><?php include TEMPLATE_PATH."header.tpl.php"?>
</head>
<body><a href="?viewid=1" target=”_blank”>Open in New Window</a><?php }?>
<h3>  Debt Service</h3>
<table>
  <tr>
    <th><strong>Finance Source</strong></th>
    <th>Action</th>
  </tr>
  <?php

	foreach($financeSources as $financesource){
	
?>
  <tr>
    <td><?php echo $financesource['value'];?></td>
    <td><a href="?a=e&fid=<?php echo $financesource['id'];?>">View</a> </td>
  </tr>
  <?php
	}

?>
</table>
<?php
if($_REQUEST['fid']){?>
<h3> <?php echo Config2::getData('financesource',$_REQUEST['fid']);?>&nbsp;(Million)</h3>
<table width="900" border="1" cellspacing="2" cellpadding="0">
  <tr valign="top">
    <td valign="top"><table border="1" width="100%" cellpadding="0" cellspacing="0">
       <tr>
          <th >&nbsp;</th>
        </tr>
	   <tr>
          <th >YEAR</th>
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

for($i = 0; $i < count($allChunks); $i++){ ?>
	
	<td valign="top"><table border="1" width="400" cellpadding="0" cellspacing="0">
		<tr>
		 <th colspan=4><div align="Center"><?php echo Config2::getData('currencies',$allChunks[$i]);?></div></th>
        </tr>
         <tr>
		 <th >DrawDowns</th>
        
          <th >Ending Balance </th>
       
          <th >Repayment </th>
        
          <th >Interest</td>
        </tr>
        
        <?php 
			$fid = $_REQUEST['fid'];
			
			for($m=$ahData['startYear'];$m <= $ahData['endYear']; $m++){
				$ddval = $fid.'_'.$allChunks[$i].'_'.$m;
				$bal = 'Bal_'.$allChunks[$i].'_'.$fid.'_'.$m;
				$int = 'Int_'.$allChunks[$i].'_'.$fid.'_'.$m;
				$repay = 'Repy_'.$allChunks[$i].'_'.$fid.'_'.$m;				
				?>
      
           <tr>
		
          <td ><?php if(!$capData[$ddval]){ echo '0';} else {echo $capData[$ddval];}?></td>
        
          <td ><?php if(!$caqData[$bal]){ echo '0';} else {echo $caqData[$bal];}?></td>
       
          <td ><?php if(!$caqData[$repay]){ echo '0';} else {echo $caqData[$repay];}?></td>
        
          <td ><?php if(!$caqData[$int]){ echo '0';} else {echo $caqData[$int];}?></td>
        </tr>
      
<?php
}
			
		
		
	?>
      </table></td>
    <?php
}
?>
  </tr>
</table>
<?php } ?>


<?php include TEMPLATE_PATH."footer.tpl.php"?>
