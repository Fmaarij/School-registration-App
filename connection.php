<?php

$server_name = 'localhost';
$user_name = 'root';
$pass_word = '';
$db = 'school';

$conn =mysqli_connect('localhost','root','','school');

if(!$conn){
die("Unable to connect to the data base, please contact your admin!");
}else {
// echo "You are connected!";
}
