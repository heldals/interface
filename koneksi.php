<?php 
	$conn = mysqli_connect('localhost' , 'root' , '' , 'import_csv');
	if(mysqli_connect_errno()){
		echo "koneksi gagal" . mysqli_connect_error();
	}
 ?>