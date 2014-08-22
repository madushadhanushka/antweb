<?php
session_start();
include_once("header.php");
mysql_connect($db_host,$db_user,$db_pass) or die("Error 101");
mysql_select_db($db_name) or die("Error 102");

$emp_name=$_GET['emp_name'];
$emp_username=$_GET['emp_username'];
$emp_graphic=$_GET['emp_graphic'];
$emp_type=$_GET['emp_type'];
$emp_printing=$_GET['emp_printing'];

echo json_encode(array($emp_name));
?>
