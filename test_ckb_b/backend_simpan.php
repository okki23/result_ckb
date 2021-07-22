<?php 
include "koneksi.php";
$id = $_POST['id'];
$nama = $_POST['nama'];
$sql = "INSERT INTO tbl_ckb (id,name)
                    VALUES ('$id','$nama') ";
$hasil = mysqli_query($db_link,$sql); 
if($hasil){
    echo "berhasil";
}else{
    echo "tidak";
}
            
?>