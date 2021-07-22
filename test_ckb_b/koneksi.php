<?php
$localhost	= 'localhost'; 
$user		= 'root';  
$pass		= ''; 
$db_name	= 'db_ckb_a';

$db_link	= mysqli_connect($localhost,$user,$pass,$db_name);
if (!$db_link){
	echo 'Tidak dapat terhubung ke database';
}
?>