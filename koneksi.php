<?php
$koneksi = mysqli_connect("localhost","root","","wahyuekasaputra__311810030");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database tidak berhasil : " . mysqli_connect_error();
}
?>