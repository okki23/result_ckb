<?php 
include "koneksi.php";

$filename ="Report.xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);

$sql = "select * from tbl_ckb";
$ex = mysqli_query($db_link,$sql); 


echo '<table border="1">
<thead>
  <tr>
    <th>ID</th>
    <th>NAME</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td>1</td>
    <td>';
    $sql = "select * from tbl_ckb where id = '1'";
        $ex = mysqli_query($db_link,$sql); 
        while($datas = mysqli_fetch_object($ex)){
            echo $datas->name;
        }
    echo'
    </td>
  </tr>
  <tr>
    <td>2</td>  
    <td>';
    $sql = "select * from tbl_ckb where id = '2'";
        $ex = mysqli_query($db_link,$sql); 
        while($datas = mysqli_fetch_object($ex)){
            echo $datas->name." ";
           
        }
    echo'</td>
  </tr>
  <tr>
  <td>3</td>  
  <td>';
  $sql = "select * from tbl_ckb where id = '3'";
      $ex = mysqli_query($db_link,$sql); 
      while($datas = mysqli_fetch_object($ex)){
          echo $datas->name." ";
         
      }
  echo'</td>
</tr>
</tbody>
</table>'; 
?>