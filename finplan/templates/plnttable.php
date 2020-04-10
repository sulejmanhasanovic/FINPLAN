<table>
  <tr>
    <th><strong>
      <?php  echo $plnttable_1;?>
      </strong></th>
    <th><?php  echo $plnttable_2;?></th>
    <th><?php  echo $plnttable_3;?></th>
    <th><?php  echo $plnttable_4;?></th>
    <th><?php  echo $plnttable_5;?></th>
  </tr>
  <?php
if(is_array($data) && count($data) > 0){
foreach($data as $row){?>
  <tr>
    <td><?php echo $row['name']?></td>
    <td><?php echo $row['unitSize']?></td>
    <td><?php echo $row['plantType']?></td>
    <td><?php echo $row['Status']?></td>
    <td><a href="?a=e&id=<?php echo $row['id']?>">
      <?php  echo $plnttable_6;?>
      </a>&nbsp;/ <a href="?a=d&id=<?php echo $row['id']?>" onclick="return confirm('Are you sure you want to delete?');"><?php echo $del_opt;?></a> </td>
  </tr>
  <?php
}
}else{
echo "<tr><td colspan='4'>No Records</td></tr>";
}
?>
</table>
