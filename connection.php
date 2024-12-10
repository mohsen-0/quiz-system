<?php
$servername='localhost';
$username='root';
$pass='';
$db_name='quiz';

$conn= new mysqli($servername,$username,$pass,$db_name);
if($conn->connect_error){
	die("Connection Faild" . $conn->connect_error);
}
echo "Connection Successfully";

