<?php 
include "koneksi.php";
$sql = "select * from tbl_ckb";   
$ex = mysqli_query($db_link,$sql); 
$datas = array();  
while($data = mysqli_fetch_object($ex)){
    // echo $data->name;
    $sub_array = array();  
    $sub_array[] = $data->id; 
    $sub_array[] = $data->name;   
    $datas[] = $sub_array;  
}
$output = array("data"=>$datas);
echo json_encode($output);

?>