<?php
$con= mysqli_connect("localhost","root","","moc") or die("Error: " . mysqli_error($con));
mysqli_query($con, "SET NAMES 'utf8' "); 

/*if(mysqli_connect_errno()){
		echo "ไม่สามารถเชื่อมต่อข้อมูลได้"." ".mysqli_connect_error();
		exit();

	}echo "สำเร็จ";*/
?>